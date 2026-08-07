<?php
/**
 * Block patterns component.
 *
 * IMPORTANT!:
 * It is best to use Block Patterns in conjunction with Template Parts
 * in block themes for these reasons:
 * - We need Block Patterns to provide translatable texts.
 * - We need Template Parts to display our Block Patterns because
 *   it is possible to easily select different template part in Site
 *   Editor, so we can provide multiple variants of posts list, for example.
 *   With pure Block Patterns this is not possible, as they are inserted
 *   as is - there is no wrapper holding their content, so they can not be
 *   interchanged.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.5
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Setup\Site_Editor;
use WP_Block_Pattern_Categories_Registry;
use WP_Block_Patterns_Registry;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Block_Pattern implements Component_Interface {

	/**
	 * Theme prefix for patterns registration.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 * @access   public
	 * @var      string
	 */
	public static $prefix_pattern = 'zooey/';

	/**
	 * Theme prefix for categories registration.
	 *
	 * @since   1.0.11
	 * @access  private
	 * @var     string
	 */
	private static $prefix_cat = 'zooey-'; // Can not use "/" here!

	/**
	 * Fallback theme pattern category.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 * @access   public
	 * @var      string
	 */
	public static $fallback_cat = 'zooey';

	/**
	 * Registered pattern categories.
	 *
	 * @since   2.0.0
	 * @access  private
	 * @var     null|array
	 */
	private static $registered_cats = null;

	/**
	 * Pattern IDs soft cache.
	 *
	 * @see  patterns/index.php
	 *
	 * @since   2.0.0
	 * @access  private
	 * @var     null|array
	 */
	private static $pattern_ids = null;

	/**
	 * Lists pattern setup argument arrays.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $pattern_args = array();

	/**
	 * Lists of pattern IDs to skip (not to register).
	 *
	 * @since   2.0.0
	 * @access  private
	 * @var     array
	 */
	private static $disabled = array(
		'cats' => null,
		'ids'  => null,
	);

	/**
	 * Options: Pattern ids and categories soft cache.
	 *
	 * @since   2.0.0
	 * @access  private
	 * @var     null|array
	 */
	private static $option_choices = null;

	/**
	 * Name of cached patterns data transient.
	 *
	 * @since   1.1.8
	 * @access  public
	 * @var     string
	 */
	public static $transient_cache_key = 'zooey_cache_patterns';

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'after_setup_theme', __CLASS__ . '::remove_core_patterns' );

				add_action( 'init', __CLASS__ . '::register_categories' );
				add_action( 'init', __CLASS__ . '::register', 99 );

				/**
				 * Also, need to hook registration late enough so post and query data
				 * are available for pattern inner hooks. (Selected patterns only - the
				 * ones having `'has_hooks' => true` set.)
				 *
				 * This is unfortunate, indeed. But it is only required for hybrid mode,
				 * so there is an early return check in `register()` method below.
				 */
				add_action( 'wp', __CLASS__ . '::register' );

				add_action( 'customize_register', __CLASS__ . '::set_options', 5 );

				add_action( 'customize_save_after',            __CLASS__ . '::transient_cache_flush' );
				add_action( 'save_post_' . 'wp_global_styles', __CLASS__ . '::transient_cache_flush' );
				add_action( 'switch_theme',                    __CLASS__ . '::transient_cache_flush' );
				add_action( 'zooey/upgrade', __CLASS__ . '::transient_cache_flush' );

			// Filters

				// Prevent WordPress automatic pattern file registration. (This prevents PHP notice.)
				add_filter( 'theme_block_pattern_files', '__return_empty_array' );

				add_filter( 'render_block_core/pattern', __CLASS__ . '::render__change_headings', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Gets block pattern data.
	 *
	 * @since    1.1.8
	 * @version  2.0.5
	 *
	 * @return  array Array of patterns data.
	 */
	public static function get_patterns(): array {

		// Variables

			$can_use_cached = ! wp_is_development_mode( 'theme' );
			$patterns       = get_transient( self::$transient_cache_key );

			// Return cache first.
			if ( is_array( $patterns ) ) {

				if ( $can_use_cached ) {
					return $patterns;
				}

				// If in development mode, clear pattern cache.
				self::transient_cache_flush();

			} else {
				$patterns = array_filter( (array) $patterns );
			}

			$hierarchy  = self::get_pattern_ids();
			$categories = self::get_registered_categories();

			// Has to be set up (and thus soft cached) here,
			// after theme options has been loaded.
			if ( null === self::$disabled['cats'] ) {
				self::$disabled['cats'] = array_filter( (array) Mod::get( 'patterns_disable_categories' ) );
			}
			if ( null === self::$disabled['ids'] ) {
				self::$disabled['ids'] = array_filter( (array) Mod::get( 'patterns_disable_ids' ) );
			}


		// Processing

			foreach ( $hierarchy as $category => $ids ) {
				foreach ( $ids as $id ) {

					// Save the original ID.
					$id_raw = $id;

					// Fallback category files are not in a subfolder.
					if ( self::$fallback_cat !== $category ) {
						$id = $category . '/' . $id;
					}

					// Short circuit if the pattern should not be registered.
					if (
						in_array( $id, self::$disabled['ids'] )
						|| in_array( $category, self::$disabled['cats'] )
					) {
						continue;
					}

					// Helpers (for `Demo::the_text()`):
						// Set which pattern is being processed.
						Demo::$processing_pattern = $id;
						// Reset iteration number.
						Demo::$i = 0;

					// Get pattern content and setup arguments.
					ob_start();
					get_template_part( 'patterns/' . $id );
					$content = trim( ob_get_clean() );

					// Why bother if we have no pattern setup arguments, or pattern content?
					if (
						empty( self::$pattern_args[ $id ] )
						|| empty( $content )
					) {
						continue;
					}

					// Assigning pattern arguments.
					$args = self::$pattern_args[ $id ];

					// No need to register all patterns again during `wp` action.
					if (
						doing_action( 'wp' )
						&& empty( $args['has_hooks'] )
					) {
						continue;
					}

					// Setup args defaults.
					$args = wp_parse_args(
						$args,
						array(
							'slug'          => self::$prefix_pattern . $id,
							'title'         => '',
							'content'       => $content,
							'categories'    => null,
							'keywords'      => array(),
							'blockTypes'    => array(),
							'postTypes'     => ( 'site' === $category ) ? ( array( 'wp_template', 'wp_template_part' ) ) : ( array() ),
							'viewportWidth' => null,
						)
					);

					// Why bother if we have no title?
					if ( empty( $args['title'] ) ) {
						continue;
					} else {
						$args['title'] .= ' [' . $id_raw . ']';
					}

					// To make the pattern available for all post types, we can NOT set `postType` argument!
					if (
						empty( $args['postTypes'] )
						|| 'all' === $args['postTypes']
					) {
						unset( $args['postTypes'] );
					}

					// Automatic keywords.
					$keyword_pattern = esc_html_x( 'pattern', 'keyword', 'zooey' );
					$cat_name        = '';
					if ( isset( $categories[ $category ] ) ) {
						$cat_name = $categories[ $category ];
					} elseif ( isset( $categories[ self::$prefix_cat . $category ] ) ) {
						$cat_name = $categories[ self::$prefix_cat . $category ];
					}
					$args['keywords'][] = $keyword_pattern . '/' . $cat_name;
					$args['keywords'][] = $keyword_pattern . '/' . $id_raw;
					$args['keywords'][] = $id_raw;
					if ( 'site' === $category ) {
						$args['keywords'][] = esc_html_x( 'site', 'keyword', 'zooey' );
					}

					// Make sure block types are array.
					if ( ! is_array( $args['blockTypes'] ) ) {
						$args['blockTypes'] = (array) $args['blockTypes'];
					}

					// Automatic block types.
					if ( 0 === stripos( $id, 'site/header' ) ) {
						// Header template part.
						$args['blockTypes'][] = 'core/template-part/header';

					} elseif ( 0 === stripos( $id, 'site/footer' ) ) {
						// Footer template part.
						$args['blockTypes'][] = 'core/template-part/footer';

					} elseif ( 'page' === $category ) {
						// Footer template part.
						$args['blockTypes'][] = 'core/post-content';

					}

					// Viewport.
					if ( ! is_int( $args['viewportWidth'] ) ) {
						$args['viewportWidth'] = self::get_pattern_args_viewport( $args, $category );
					}

					// Categories.
					if ( null === $args['categories'] ) {
						$args['categories'] = self::get_pattern_args_categories( $args, $category );
					}

					// Starter template patterns.
					// @link  https://developer.wordpress.org/news/2024/01/31/adding-starter-patterns-to-your-wordpress-themes/#starter-template-patterns
					if ( 'template' === $category ) {
						$args['postTypes']     = array( 'wp_template' );
						$args['viewportWidth'] = 1920;
					}

					// Automated block metadata.
					$args['content'] = self::get_pattern_args_content_metadata( $args );

					/**
					 * Filters array of single block pattern registration arguments.
					 *
					 * If empty, the pattern is not registered.
					 *
					 * @since    1.0.0
					 * @version  1.1.8
					 *
					 * @param  array  $args      Block pattern registration arguments.
					 * @param  string $id        Block pattern registration ID.
					 * @param  string $category  Block pattern category slug.
					 */
					$args = (array) apply_filters( 'zooey/content/block_pattern/get_patterns/args', $args, $id, $category );

					if ( ! empty( $args ) ) {
						$patterns[ $args['slug'] ] = $args;
					}
				}
			}

			if ( $can_use_cached ) {
				set_transient( self::$transient_cache_key, (array) $patterns );
			}


		// Output

			return (array) $patterns;

	} // /get_patterns

	/**
	 * Register block patterns.
	 *
	 * Inspiration taken from:
	 * @see  _register_theme_block_patterns()
	 *
	 * @since  1.1.8
	 *
	 * @return  void
	 */
	public static function register() {

		// Requirements check

			if (
				doing_action( 'wp' )
				&& Site_Editor::is_enabled()
			) {
				return;
			}


		// Variables

			$patterns = self::get_patterns();
			$registry = WP_Block_Patterns_Registry::get_instance();


		// Processing

			foreach ( $patterns as $pattern_data ) {

				if (
					empty( $pattern_data )
					|| $registry->is_registered( $pattern_data['slug'] )
				) {
					continue;
				}

				register_block_pattern( $pattern_data['slug'], $pattern_data );
			}

	} // /register

	/**
	 * Flush the transient of cached patterns data.
	 *
	 * @since  1.1.8
	 *
	 * @return  void
	 */
	public static function transient_cache_flush() {

		// Processing

			delete_transient( self::$transient_cache_key );

	} // /transient_cache_flush

	/**
	 * Register custom block pattern categories.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function register_categories() {

		// Processing

			foreach ( self::get_custom_categories() as $name => $label ) {

				if ( self::$fallback_cat !== $name ) {
					$name = self::$prefix_cat . $name;
				}

				register_block_pattern_category(
					$name,
					array(
						'label' => $label,
					)
				);
			}

	} // /register_categories

	/**
	 * Adds a block pattern setup array to list.
	 *
	 * This method is used in `patterns/*` files.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $file  Pattern setup file name/path.
	 * @param  array  $args  Pattern setup arguments.
	 *
	 * @return  void
	 */
	public static function add_pattern_args( string $file, array $args ) {

		// Variables

			$dir = basename( dirname( $file ) ) . '/';
			$id  = str_replace( 'pattern/', '', $dir . basename( $file, '.php' ) );


		// Processing

			self::$pattern_args[ $id ] = (array) $args;

	} // /add_pattern_args

	/**
	 * Remove core block patterns.
	 *
	 * @since    1.0.0
	 * @version  1.0.8
	 *
	 * @return  void
	 */
	public static function remove_core_patterns() {

		// Requirements check

			if ( Mod::get( 'patterns_core' ) ) {
				return;
			}


		// Processing

			remove_theme_support( 'core-block-patterns' );

	} // /remove_core_patterns

	/**
	 * Gets array of block pattern IDs/slugs within categories to load.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  array
	 */
	public static function get_pattern_ids(): array {

		// Processing

			if ( null === self::$pattern_ids ) {

				include get_theme_file_path( 'patterns/index.php' );

				if ( ! isset( $pattern_ids ) ) {
					$pattern_ids = array();
				}

				self::$pattern_ids = $pattern_ids;
			}


		// Output

			/**
			 * Filters array of block pattern IDs.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $pattern_ids
			 */
			return (array) apply_filters( 'zooey/content/block_pattern/get_pattern_ids', self::$pattern_ids );

	} // /get_pattern_ids

	/**
	 * Gets custom theme pattern categories.
	 *
	 * @since  2.0.0
	 *
	 * @return  array
	 */
	public static function get_custom_categories() {

		// Output

			return array(
				'faq'      => _x( 'Questions & Answers', 'Block pattern category label.', 'zooey' ),
				'intro'    => _x( 'Intro (Page Title)', 'Block pattern category label.', 'zooey' ),
				'numbers'  => _x( 'Numbers', 'Block pattern category label.', 'zooey' ),
				'page'     => _x( 'Pages', 'Block pattern category label.', 'zooey' ),
				'pricing'  => _x( 'Pricing', 'Block pattern category label.', 'zooey' ),
				'shop'     => _x( 'Shop', 'Block pattern category label.', 'zooey' ),
				'template' => _x( 'Templates', 'Block pattern category label.', 'zooey' ),

				// Site Editor related patterns only.
				'site' => _x( 'Site builder', 'Block pattern category label.', 'zooey' ),

				// Fallback category. Without prefix.
				self::$fallback_cat => _x( 'Zooey theme', 'Block pattern category label.', 'zooey' ),
			);

	} // /get_custom_categories

	/**
	 * Gets all pattern categories registered in WordPress.
	 *
	 * @since  2.0.0
	 *
	 * @return  array
	 */
	public static function get_registered_categories(): array {

		// Processing

			if ( null === self::$registered_cats ) {

				$registered_cats = (array) WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();

				self::$registered_cats = array_combine(
					array_column( $registered_cats, 'name' ),
					array_column( $registered_cats, 'label' )
				);
			}


		// Output

			return self::$registered_cats;

	} // /get_registered_categories

	/**
	 * Gets pattern viewport value.
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @param  array  $args
	 * @param  string $category
	 *
	 * @return  int
	 */
	public static function get_pattern_args_viewport( array $args, string $category ): int {

		// Variables

			global $content_width;

			$viewport = 700;

			if ( ! isset( $args['viewportWidth'] ) ) {
				$args['viewportWidth'] = null;
			}


		// Processing

			// Wide aligned.
			if (
				'alignwide' === $args['viewportWidth']
				|| stripos( $args['content'], '"align":"wide"' )
			) {
				$viewport = $content_width;
			}

			// Full aligned.
			if (
				'page' === $category
				|| 'alignfull' === $args['viewportWidth']
				|| stripos( $args['content'], '"align":"full"' )
			) {
				$viewport = $content_width * 1.2;
			}


		// Output

			return absint( $viewport );

	} // /get_pattern_args_viewport

	/**
	 * Gets pattern categories value.
	 *
	 * @since  2.0.0
	 *
	 * @param  array  $args
	 * @param  string $category
	 *
	 * @return  array
	 */
	public static function get_pattern_args_categories( array $args, string $category ): array {

		// Variables

			$categories = $args['categories'];


		// Processing

			// Set category based on folder
			// or set fallback category.
			if ( empty( $categories ) ) {

				if ( $category ) {
					$categories = array( $category );
				} else {
					$categories = array( self::$fallback_cat );
				}
			}


		// Output

			return array_map(
				function( $category ) {

					if (
						self::$fallback_cat === $category
						|| in_array( $category, array_keys( self::get_registered_categories() ) )
					) {
						return $category;

					} else {
						return self::$prefix_cat . $category;

					}
				},
				(array) $categories
			);

	} // /get_pattern_args_categories

	/**
	 * Gets modified pattern content with automated block metadata.
	 *
	 * Apply automatic block meta name/label based on pattern category.
	 *
	 * NOTE:
	 * Actually, since WP6.6 this is produced automatically in the editor
	 * based on the pattern title, but I think it's better to simplify
	 * this to a category label for better orientation in page structure.
	 *
	 * @since    2.0.0
	 * @version  2.0.5
	 *
	 * @param  array $args
	 *
	 * @return  string
	 */
	public static function get_pattern_args_content_metadata( array $args ): string {

		// Variables

			$content         = trim( $args['content'] );
			$cat             = reset( $args['categories'] );
			$registered_cats = self::get_registered_categories();


		// Processing

			if ( isset( $registered_cats[ $cat ] ) ) {

				$auto_exclude_cats = array(
					'columns',
					'page',
					'site',
					'template',
					'text',
				);

				// Automatic meta data.
				if (
					false === stripos( $content, '"meta":"' )
					&& ! in_array( $cat, $auto_exclude_cats )
				) {

					$wrapper_blocks = array(
						'<!-- wp:group {',
						'<!-- wp:cover {',
						'<!-- wp:columns {',
					);

					foreach ( $wrapper_blocks as $key => $wrapper_block ) {

						if (
							str_starts_with( $content, $wrapper_block )
							&& ! str_starts_with( $content, $wrapper_block . '"meta' )
						) {

							$content =
								$wrapper_block . '"meta":"auto",'
								. substr( $content, strlen( $wrapper_block ) );

							break;
						}
					}
				}

				$content = str_replace(
					array(
						'"meta":"auto"',
						'"meta":"none",',
						'"meta":"none"',
					),
					array(
						'"metadata":{"name":"' . esc_attr( $registered_cats[ $cat ] ) . '"}',
						'',
						'',
					),
					$content
				);
			}


		// Output

			return $content;

	} // /get_pattern_args_content_metadata

	/**
	 * Block output modification: Change heading size in the block content.
	 *
	 * @since  1.1.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__change_headings( string $block_content, array $block ): string {

		// Processing

			if ( ! empty( $block['attrs']['changeHeadings'] ) ) {

				if ( 'up' === $block['attrs']['changeHeadings'] ) {

					$block_content = str_replace(
						array(
							'<h2', '/h2>',
							'<h3', '/h3>',
							'<h4', '/h4>',
						),
						array(
							'<h1', '/h1>',
							'<h2', '/h2>',
							'<h3', '/h3>',
						),
						$block_content
					);
				} else {

					$block_content = str_replace(
						array(
							'<h4', '/h4>',
							'<h3', '/h3>',
							'<h2', '/h2>',
						),
						array(
							'<h5', '/h5>',
							'<h4', '/h4>',
							'<h3', '/h3>',
						),
						$block_content
					);
				}
			}


		// Output

			return $block_content;

	} // /render__change_headings

	/**
	 * Set block pattern related theme options.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function set_options() {

		// Processing

			add_filter( 'zooey/customize/options/get', __CLASS__ . '::options' );

	} // /set_options

	/**
	 * Theme options.
	 *
	 * @since  2.0.0
	 *
	 * @param  array $options
	 *
	 * @return  array
	 */
	public static function options( array $options ): array {

		// Processing

			$options = array_merge( $options, array(

				/**
				 * Block Patterns.
				 */
				700 . 'patterns' => array(
					'id'             => 'patterns',
					'type'           => 'section',
					'create_section' => esc_html_x( 'Block Patterns', 'Customizer section title.', 'zooey' ),
					'in_panel'       => esc_html_x( 'Theme Options', 'Customizer panel title.', 'zooey' ),
				),

					700 . 'patterns' . 110 => array(
						'type'        => 'checkbox',
						'id'          => 'patterns_core',
						'label'       => esc_html__( 'WordPress core block patterns', 'zooey' ),
						'description' => esc_html__( 'Allows WordPress core block patterns in block editor.', 'zooey' ),
						'default'     => false,
						'preview_js'  => false, // This is to prevent customizer preview reload.
					),

					700 . 'patterns' . 115 => array(
						'type'    => 'html',
						'content' =>
							'<h4>' . esc_html__( 'Manage theme block patterns', 'zooey' ) . '</h4>'
							. '<p class="description">' . esc_html__( 'Speed your creative process by disabling theme patterns you don\'t use.', 'zooey' ) . '</p>',
					),

						700 . 'patterns' . 120 => array(
							'type'        => 'multicheckbox',
							'id'          => 'patterns_disable_categories',
							'label'       => esc_html__( 'Disable patterns by category', 'zooey' ),
							'description' => esc_html__( 'Select a category which patterns will be disabled.', 'zooey' ),
							'preview_js'  => false, // This is to prevent customizer preview reload.
							'default'     => array(),
							'choices'     => self::get_option_choices( 'categories' ),
							'input_attrs' => array(
								'class' => 'is-inline is-negative',
							),
						),

						700 . 'patterns' . 130 => array(
							'type'       => 'multicheckbox',
							'id'         => 'patterns_disable_ids',
							'label'      => esc_html__( 'Disable specific patterns', 'zooey' ),
							'preview_js' => false, // This is to prevent customizer preview reload.
							'default'    => array(),
							'choices'    => self::get_option_choices( 'ids' ),
							'input_attrs' => array(
								'class' => 'is-negative',
							),
						),

			) );


		// Output

			return $options;

	} // /options

	/**
	 * Get choices array for pattern IDs and categories.
	 *
	 * @since  2.0.0
	 *
	 * @param  string $scope
	 *
	 * @return  array
	 */
	public static function get_option_choices( string $scope ): array {

		// Processing

			if ( null === self::$option_choices ) {

				$ids  = self::get_pattern_ids();
				$cats = array_merge(
					// WordPress core categories.
					// @link  https://developer.wordpress.org/reference/functions/_register_core_block_patterns_and_categories/
					array(
						'banner'         => _x( 'Banners', 'Block pattern category', 'zooey' ),
						'buttons'        => _x( 'Buttons', 'Block pattern category', 'zooey' ),
						'columns'        => _x( 'Columns', 'Block pattern category', 'zooey' ),
						'text'           => _x( 'Text', 'Block pattern category', 'zooey' ),
						'query'          => _x( 'Posts', 'Block pattern category', 'zooey' ),
						'featured'       => _x( 'Featured', 'Block pattern category', 'zooey' ),
						'call-to-action' => _x( 'Call to action', 'Block pattern category', 'zooey' ),
						'team'           => _x( 'Team', 'Block pattern category', 'zooey' ),
						'testimonials'   => _x( 'Testimonials', 'Block pattern category', 'zooey' ),
						'services'       => _x( 'Services', 'Block pattern category', 'zooey' ),
						'contact'        => _x( 'Contact', 'Block pattern category', 'zooey' ),
						'about'          => _x( 'About', 'Block pattern category', 'zooey' ),
						'portfolio'      => _x( 'Portfolio', 'Block pattern category', 'zooey' ),
						'gallery'        => _x( 'Gallery', 'Block pattern category', 'zooey' ),
						'media'          => _x( 'Media', 'Block pattern category', 'zooey' ),
						'videos'         => _x( 'Videos', 'Block pattern category', 'zooey' ),
						'audio'          => _x( 'Audio', 'Block pattern category', 'zooey' ),
						'posts'          => _x( 'Posts', 'Block pattern category', 'zooey' ),
						'footer'         => _x( 'Footers', 'Block pattern category', 'zooey' ),
						'header'         => _x( 'Headers', 'Block pattern category', 'zooey' ),
					),
					self::get_custom_categories()
				);

				// Remove specific categories (that we need to keep).
				unset( $ids['site'], $ids['template'] );

				// Set up categories array.
				$cats = array_intersect_key( $cats, $ids );
				asort( $cats );

				self::$option_choices = array(
					'ids'        => array(),
					'categories' => $cats,
				);

				// Set up IDs array.

					$last_category = '';

					foreach ( $ids as $category => $patterns ) {
						foreach ( $patterns as $id ) {

							if ( stripos( $id, '-hidden' ) ) {
								continue;
							}

							$id_raw = $id;

							// Fallback category files are not in a subfolder.
							if ( self::$fallback_cat !== $category ) {
								$id = $category . '/' . $id;
							}

							ob_start();
							get_template_part( 'patterns/' . $id );
							$content = trim( ob_get_clean() );

							if (
								empty( self::$pattern_args[ $id ] )
								|| empty( $content )
							) {
								continue;
							}

							if ( ! empty( self::$pattern_args[ $id ]['title'] ) ) {

								if ( $category !== $last_category ) {

									// Close the previously opened optgroup.
									if ( isset( $cats[ $last_category ] ) ) {
										self::$option_choices['ids'][ '/optgroup:' . $last_category ] = '';
									}

									// Open the new optgroup.
									if ( isset( $cats[ $category ] ) ) {
										self::$option_choices['ids'][ 'optgroup:' . $category ] = $cats[ $category ];
									}
								}

								self::$option_choices['ids'][ $id ] = '<small><code>' . $id_raw . '</code>:</small> ' . self::$pattern_args[ $id ]['title'];

								$last_category = $category;
							}
						}
					}

					if ( isset( $cats[ $last_category ] ) ) {
						// Close the previously opened optgroup.
						self::$option_choices['ids'][ '/optgroup:' . $last_category ] = '';
					}

				/**
				 * Filters choices arrays for pattern management theme options.
				 *
				 * @since  2.0.0
				 *
				 * @param  array $option_choices
				 * @param  array $cats
				 * @param  array $ids
				 */
				self::$option_choices = (array) apply_filters( 'zooey/content/block_pattern/get_option_choices', self::$option_choices, $cats, $ids );
			}


		// Output

			// Do not use `array_filter()` here due to `/optgroup:#` empty values!
			return (array) ( self::$option_choices[ $scope ] ?? array( '' => '' ) );

	} // /get_option_choices

}
