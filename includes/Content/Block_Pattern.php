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
 * @version  1.1.3
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Setup\Site_Editor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Block_Pattern implements Component_Interface {

	/**
	 * Array of pattern file slugs (IDs) organized in folders (categories).
	 *
	 * @since    1.0.0
	 * @version  1.0.1
	 * @access   private
	 * @var      array
	 */
	private static $pattern_ids = array(

		'call-to-action' => array(
			'cta-01',
			'cta-02',
			'cta-03',
			'cta-04',
			'cta-05',
			'cta-06',
			'cta-07',
			'cta-08',
			'cta-09',
			'cta-10',
		),

		'columns' => array(
			'columns-01',
			'columns-02',
			'columns-03',
			'columns-04',
		),

		'contact' => array(
			'contact-01',
			'contact-02',
			'contact-03',
			'contact-04',
			'contact-05',
		),

		'faq' => array(
			'faq-01',
			'faq-02',
			'faq-03',
			'faq-04',
		),

		'gallery' => array(
			'gallery-01',
			'gallery-02',
			'gallery-03',
			'gallery-04',
			'gallery-05',
			'gallery-06',
			'gallery-07',
			'gallery-08',
			'gallery-09',
		),

		'intro' => array(
			'intro-01',
			'intro-02',
			'intro-03',
			'intro-04',
			'intro-05',
			'intro-06',
		),

		'media' => array(
			'media-01',
			'media-02',
			'media-03',
			'media-04',
			'media-05',
			'media-06',
			'media-07',
			'media-08',
			'custom-header-top',
			'custom-header-bottom',
		),

		'numbers' => array(
			'numbers-01',
			'numbers-02',
			'numbers-03',
			'numbers-04',
			'numbers-05',
		),

		'page' => array(
			'about-1',
			'contact-1',
			'faq-1',
			'gallery-1',
			'home-1',
			'home-2',
			'home-3',
			'portfolio-1',
			'project-1',
			'pricing-1',
			'services-1',
			'service-1',
			'soon-1',
			'team-1',
			'testimonials-1',
		),

		'portfolio' => array(
			'portfolio-01',
			'portfolio-02',
			'portfolio-03',

			'portfolio-00',
		),

		'posts' => array(
			'posts-01',
			'posts-02',
			'posts-03',

			'posts-00',
		),

		'pricing' => array(
			'pricing-01',
			'pricing-02',
		),

		'services' => array(
			'services-01',
			'services-02',
			'services-03',
			'services-04',
			'services-05',
			'services-06',
		),

		'site' => array(
			'comments',
			'content-404',
			'content-with-sidebar',
			'entry-meta-bottom',
			'entry-navigation',
			'entry-query',
			'entry-query-featured',
			'footer',
			'footer-centered',
			'footer-minimal',
			'header',
			'header-alt',
			'intro',
			'intro-archive',
			'intro-blog',
			'intro-post',
			'intro-search',
			'query',
			'query-search',
			'query-featured',
			'query-with-sidebar',
			'sidebar',
			'taxonomy-category-select',
		),

		'team' => array(
			'team-01',
			'team-02',
			'team-03',
			'team-04',

			'team-00',
		),

		'template' => array(
			'404',
			'archive',
			'archive-with-sidebar',
			'custom-with-sidebar',
			'home',
			'home-with-sidebar',
			'page',
			'search',
			'single',
		),

		'testimonials' => array(
			'testimonials-01',
			'testimonials-02',
			'testimonials-03',
			'testimonials-04',
		),

		'text' => array(

			'heading-01',
			'heading-02',
			'heading-03',

			'text-01',
			'text-02',
			'text-03',
			'text-04',
		),
	);

	/**
	 * Theme prefix for patterns registration.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $prefix = 'zooey/';

	/**
	 * Theme prefix for categories registration.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $prefix_cat = 'zooey-'; // Can not use "/" here!

	/**
	 * Lists pattern setup arrays.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $pattern_args = array();

	/**
	 * List of predefined pattern categories in WordPress.
	 *
	 * @link  https://developer.wordpress.org/reference/functions/_register_core_block_patterns_and_categories/
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $default_cats = array(
		'about',          // Introduce yourself.
		'banner',         // ? Probably for covers.
		'buttons',        // Patterns that contain buttons and call to actions.
		'call-to-action', // Sections whose purpose is to trigger a specific action.
		'columns',        // Multi-column patterns with more complex layouts.
		'contact',        // Display your contact information.
		'featured',       // A set of high quality curated patterns.
		'footer',         // A variety of footer designs displaying information and site navigation.
		'gallery',        // Different layouts for displaying images.
		'header',         // A variety of header designs displaying your site title and navigation.
		'media',          // Different layouts containing video or audio.
		'portfolio',      // Showcase your latest work.
		'posts',          // Display your latest posts in lists, grids or other layouts.
		'query',          // IMPORTANT: Do not use this as WP treats it as alias for "posts" category.
		'services',       // Briefly describe what your business does and how you can help.
		'team',           // A variety of designs to display your team members.
		'testimonials',   // Share reviews and feedback about your brand/business.
		'text',           // Patterns containing mostly text.
	);

	/**
	 * Fallback theme pattern category.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $fallback_cat = 'zooey';

	/**
	 * Helper: Pattern being processed.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $processing_pattern = '';

	/**
	 * Helper: Iteration number.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     int
	 */
	private static $i = 0;

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.1.3
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

			// Filters

				add_filter( 'render_block_core/pattern', __CLASS__ . '::render__change_headings', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Remove core block patterns.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function remove_core_patterns() {

		// Requirements check

			if ( Mod::get( 'core_block_patterns' ) ) {
				return;
			}


		// Processing

			remove_theme_support( 'core-block-patterns' );

	} // /remove_core_patterns

	/**
	 * Register block patterns.
	 *
	 * @since  1.0.0
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

			global $content_width;

			$patterns_hierarchy = self::get_pattern_ids();


		// Processing

			foreach ( $patterns_hierarchy as $category => $patterns ) {
				foreach ( $patterns as $id ) {

					// Helpers (for `self::the_text()`):
						// Set which pattern is being processed.
						self::$processing_pattern = $id;
						// Reset iteration number.
						self::$i = 0;

					// Fallback category files are not in a subfolder.
					if ( self::$fallback_cat !== $category ) {
						$id = $category . '/' . $id;
					}

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

					// Viewport setup.
					// Unfortunately, pattern preview does not work the same way it did
					// with pre-WP6.3, so we need to set these accordingly.
					$viewport = 700;

						// Wide aligned.
						if (
							stripos( $content, 'alignwide' )
							|| (
								isset( $args['viewportWidth'] )
								&& 'alignwide' === $args['viewportWidth']
							)
						) {
							$viewport = $content_width;
						}

						// Full aligned.
						if (
							stripos( $content, 'alignfull' )
							|| (
								isset( $args['viewportWidth'] )
								&& 'alignfull' === $args['viewportWidth']
							)
							|| 'page' === $category
						) {
							$viewport = absint( $content_width * 1.2 );
						}

						// Override any non-numeric viewport width value.
						if (
							isset( $args['viewportWidth'] )
							&& ! is_numeric( $args['viewportWidth'] )
						) {
							$args['viewportWidth'] = $viewport;
						}

					// Setup args defaults.
					$args = wp_parse_args(
						$args,
						array(
							'title'         => '',
							'content'       => $content,
							'categories'    => null,
							'keywords'      => array(),
							'blockTypes'    => array(),
							'postTypes'     => ( 'site' === $category ) ? ( array( 'wp_template', 'wp_template_part' ) ) : ( array() ),
							'viewportWidth' => $viewport,
						)
					);

					// Why bother if we have no title?
					if ( empty( $args['title'] ) ) {
						continue;
					}

					// To make the pattern available for all post types, we can NOT set `postType` argument!
					if (
						empty( $args['postTypes'] )
						|| 'all' === $args['postTypes']
					) {
						unset( $args['postTypes'] );
					}

					// Automatic keywords.
					if ( 'site' === $category ) {
						$args['keywords'][] = esc_html_x( 'site', 'keyword', 'zooey' );
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

					// Automatic categories.
					if ( empty( $args['categories'] ) ) {
						if ( $category ) {
							$args['categories'] = array( $category );
						} else {
							$args['categories'] = array( self::$fallback_cat );
						}
					}
					$args['categories'] = array_map( function( $category ) {
						if (
							self::$fallback_cat === $category
							|| in_array( $category, self::$default_cats )
						) {
							return $category;
						} else {
							return self::$prefix_cat . $category;
						}
					}, $args['categories'] );

					// Starter template patterns.
					// @link  https://developer.wordpress.org/news/2024/01/31/adding-starter-patterns-to-your-wordpress-themes/#starter-template-patterns
					if ( 'template' === $category ) {
						$args['postTypes']     = array( 'wp_template' );
						$args['viewportWidth'] = 1920;
					}

					/**
					 * Filters array of block pattern registration arguments.
					 *
					 * If empty, the pattern is not registered.
					 *
					 * @since  1.0.0
					 *
					 * @param  array  $args      Block pattern registration arguments.
					 * @param  string $id        Block pattern registration ID.
					 * @param  string $category  Block pattern category slug.
					 */
					$args = (array) apply_filters( 'zooey/content/block_pattern/register/args', $args, $id, $category );

					if ( ! empty( $args ) ) {
						register_block_pattern( self::$prefix . $id, $args );
					}
				}
			}

	} // /register

	/**
	 * Register custom block pattern categories.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function register_categories() {

		// Variables

			$content_pattern_categories = array(
				'faq'      => _x( 'Questions & Answers', 'Block pattern category label.', 'zooey' ),
				'intro'    => _x( 'Intro (Page Title)', 'Block pattern category label.', 'zooey' ),
				'numbers'  => _x( 'Numbers', 'Block pattern category label.', 'zooey' ),
				'page'     => _x( 'Pages', 'Block pattern category label.', 'zooey' ),
				'pricing'  => _x( 'Pricing', 'Block pattern category label.', 'zooey' ),
				'template' => _x( 'Templates', 'Block pattern category label.', 'zooey' ),
			);


		// Processing

			// Content patterns.
			foreach ( $content_pattern_categories as $name => $label ) {
				register_block_pattern_category(
					self::$prefix_cat . $name,
					array(
						'label' => $label,
					)
				);
			}

			// Site Editor related patterns only.
			register_block_pattern_category(
				self::$prefix_cat . 'site',
				array(
					'label' => esc_html_x( 'Site builder', 'Block pattern category label.', 'zooey' ),
				)
			);

			// Fallback category. Without prefix.
			register_block_pattern_category(
				self::$fallback_cat,
				array(
					'label' => esc_html_x( 'Zooey theme', 'Block pattern category label.', 'zooey' ),
				)
			);

	} // /register_categories

	/**
	 * Gets array of block pattern IDs/slugs within categories to load.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_pattern_ids(): array {

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
	 * Adds a block pattern setup array to list.
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
	 * Get starter content image URL.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $filename
	 * @param  string $context
	 *
	 * @return  string
	 */
	public static function get_image_url( string $filename = '', string $context = '' ): string {

		// Variables

			if ( false === stripos( $filename, '.' ) ) {
				$filename .= '.webp';
			}

			$url = add_query_arg(
				'ver',
				'v' . ZOOEY_THEME_VERSION,
				get_theme_file_uri( 'assets/images/starter/' . $filename )
			);


		// Output

			/**
			 * Filters URL of demo text based on the context string provided.
			 *
			 * @since  1.0.0
			 *
			 * @param  string $url
			 * @param  string $context
			 */
			return (string) apply_filters( 'zooey/demo_image', $url, $context );

	} // /get_image_url

	/**
	 * Get starter content texts.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $scope
	 *
	 * @return  string
	 */
	public static function get_text( string $scope ): string {

		// Variables

			$output = '---';
			$scope  = explode( '/', $scope );

			/**
			 * Filters array of demo texts used in block patterns and starter content.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $texts
			 */
			$texts = (array) apply_filters( 'zooey/demo_texts', array(

				// Basic texts:
				'xs' => _x( 'Some text', 'Demo text.', 'zooey' ),
				's'  => _x( 'Just a short sentence', 'Demo text.', 'zooey' ),
				'm'  => _x( 'Write your own copy text here', 'Demo text.', 'zooey' ),
				'l'  => _x( 'This is just a demo text you should overwrite', 'Demo text.', 'zooey' ),

				'title' => array(
					'xs' => _x( 'Title', 'Demo text.', 'zooey' ),
					's'  => _x( 'This is title', 'Demo text.', 'zooey' ),
					'm'  => _x( 'Write some title text here', 'Demo text.', 'zooey' ),
					'l'  => _x( 'This is title text and it may be a bit long', 'Demo text.', 'zooey' ),
					'xl' => _x( 'The ideal length of the title text in here should be maybe a bit longer', 'Demo text.', 'zooey' ),
				),

				'contact' => array(
					'address'        => _x( '123 Street Name<br>Cityname 56789<br>COUNTRY', 'Demo text.', 'zooey' ),
					'address_inline' => _x( '123 Street Name, Cityname 56789, COUNTRY', 'Demo text.', 'zooey' ),
					'email'          => _x( 'example@example.com', 'Demo text.', 'zooey' ),
					'phone'          => _x( '+1 (123) 456-7890', 'Demo text.', 'zooey' ),
				),

				'date' => array(
					'event'   => _x( '10:30 am on Monday, July 1, 2021', 'Demo text.', 'zooey' ),
					'weekday' => _x( 'Mon - Fri', 'Demo text. Week days.', 'zooey' ),
					'weekend' => _x( 'Sat - Sun', 'Demo text. Weekend days.', 'zooey' ),
					'mon'     => _x( 'Monday', 'Demo text.', 'zooey' ),
					'tue'     => _x( 'Tuesday', 'Demo text.', 'zooey' ),
					'wed'     => _x( 'Wednesday', 'Demo text.', 'zooey' ),
					'thu'     => _x( 'Thursday', 'Demo text.', 'zooey' ),
					'fri'     => _x( 'Friday', 'Demo text.', 'zooey' ),
					'sat'     => _x( 'Saturday', 'Demo text.', 'zooey' ),
					'sun'     => _x( 'Sunday', 'Demo text.', 'zooey' ),
				),

				'people' => array(
					'name' => array(
						_x( 'Vincent van Gogh', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Edward Hopper', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Pablo Picasso', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Mary Cassatt', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Frida Kahlo', 'Demo text. Name of a person.', 'zooey' ),
						_x( 'Berthe Morisot', 'Demo text. Name of a person.', 'zooey' ),
					),
					'job'  => _x( 'Founder', 'Demo text. Occupation, job title.', 'zooey' ),
				),

				// Others:
				'alt'    => _x( 'Image alternative description text', 'Demo text. Image alt text.', 'zooey' ),
				'button' => _x( 'Click here &rarr;', 'Demo text. Button label.', 'zooey' ),
				'more'   => _x( 'Read more &rarr;', 'Demo text. Button label.', 'zooey' ),
				'price'  => _x( '$19', 'Demo text. Price.', 'zooey' ),
				// @link  https://icon-sets.iconify.design/ph/potted-plant-duotone/
				'icon'   => 'data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" width="100" height="100" viewBox="0 0 256 256"%3E%3Cg fill="currentColor"%3E%3Cpath d="m184 152l-14.61 65.74a8 8 0 0 1-7.81 6.26H94.42a8 8 0 0 1-7.81-6.26L72 152Z" opacity=".2"%2F%3E%3Cpath d="M200 144h-76.7l2.35-2.35l20.06-20.06a59.55 59.55 0 0 0 26.1 6.36a49.56 49.56 0 0 0 25.89-7.22c23.72-14.36 36.43-47.6 34-88.92a8 8 0 0 0-7.52-7.52c-41.32-2.42-74.56 10.28-88.93 34c-9.35 15.45-9.59 34.11-.86 52L120 124.68l-12.21-12.21c6-13.25 5.57-27-1.39-38.48C95.53 56 70.6 46.4 39.73 48.22a8 8 0 0 0-7.51 7.51C30.4 86.6 40 111.52 58 122.4a38.22 38.22 0 0 0 20 5.6a45 45 0 0 0 18.52-4.19L108.69 136l-8 8H56a8 8 0 0 0 0 16h9.59l13.21 59.47A15.89 15.89 0 0 0 94.42 232h67.17a15.91 15.91 0 0 0 15.62-12.53L190.42 160H200a8 8 0 0 0 0-16m-51-77.42c10.46-17.26 35.23-27 67-26.57c.41 31.81-9.31 56.58-26.57 67c-11.51 7-25.4 6.54-39.28-1.18C142.42 92 142 78.09 149 66.58m-56.89 41.53c-9.2 4.92-18.31 5.15-25.83.6C54.78 101.74 48.15 85.31 48 64c21.31.15 37.75 6.78 44.71 18.28c4.56 7.52 4.29 16.63-.6 25.83M161.59 216H94.42L82 160h92Z"%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E',
				'form'   =>
					'<a href="' . esc_attr_x( 'https://wordpress.org/plugins/search/form+block/', 'Demo text. Form block plugin URL.', 'zooey' ) . '">'
					. _x( 'Use a form block here ↗', 'Demo text.', 'zooey' )
					. '</a>',

			) );


		// Processing

			foreach ( $scope as $category ) {

				if ( isset( $texts[ $category ] ) ) {
					$texts = $texts[ $category ];

				} elseif ( 0 === stripos( $category, 'icon' ) ) {

					// Removes `icon.`, where `.` can be any character followed with a number.
					$size  = substr( $category, 5 );
					$texts = str_replace(
						'width="100" height="100"',
						'width="' . absint( $size ) . '" height="' . absint( $size ) . '"',
						$texts['icon']
					);
				}
			}

			if ( is_array( $texts ) ) {
				$texts = $texts[ array_rand( $texts ) ];
			}

			if ( is_string( $texts ) ) {
				$output = $texts;
			}


		// Output

			return $output;

	} // /get_text

	/**
	 * Echos starter content texts.
	 *
	 * @since  1.0.0
	 *
	 * @param  int|string|array $scope
	 * @param  string           $suffix
	 *
	 * @return  void
	 */
	public static function the_text( $scope, string $suffix = '' ) {

		// Variables

			$output = array();


		// Processing

			if ( is_array( $scope ) ) {
			// $scope = [ 'l', 's', 'people/name' ]

				// Get all texts defined with multiple scopes in an array.
				foreach ( $scope as $text ) {
					$output[] = self::get_text( $text ) . $suffix;
				}

			} elseif ( intval( $scope ) ) {
			// $scope = 5 -> 5 sentences from sequence
			// $scope = '32' -> max 32 characters long string from sequence

				$sequence = array(
					's','l','m','l','m',
					's','l','m','l','m',
					's','l','m','l','m',
					's','l','m','l','m',
				);

				if (
					is_string( $scope )
					&& empty( $suffix )
				) {
					$suffix = '.';
				}

				// Get specific number of various length sentences.
				$sentences = array_slice(
					$sequence,
					0,
					min( absint( $scope ), count( $sequence ) )
				);
				foreach ( $sentences as $text ) {
					$output[] = self::get_text( $text ) . $suffix;
				}

				// Get specific number of characters, but don't cut words.
				if ( is_string( $scope ) ) {
					$string = implode( ' ', $output );
					$output = array(
						substr(
							$string,
							0,
							strpos( wordwrap( $string, absint( $scope ) - 1, PHP_EOL ), PHP_EOL )
						)
						. '…'
					);
				}

			} elseif ( is_string( $scope ) ) {
			// $scope = 'people/name'

				// Get direct text defined with string scope.
				$output = array( self::get_text( $scope ) . $suffix );
			}

			/**
			 * Filters array of starter text by context.
			 *
			 * @since  1.0.0
			 *
			 * @param  array            $output
			 * @param  int|array|string $scope
			 * @param  string           $context  By default this is set to block pattern ID being rendered.
			 * @param  int              $i        Iteration number in scope of the current `$context`.
			 */
			$output = (array) apply_filters( 'zooey/demo_text', $output, $scope, self::$processing_pattern, ++self::$i );


		// Output

			echo wp_kses( trim( implode( ' ', $output ) ), 'inline' );

	} // /the_text

	/**
	 * Block output modification: Change heading size in the block content.
	 *
	 * @since  1.1.3
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

}
