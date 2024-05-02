<?php
/**
 * Page template component.
 *
 * Not using `is_page_template()` but rather checking for a page template
 * filename portion in body classes to make the functionality much more
 * flexible (also for custom page templates, for example).
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Entry;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Header\Body_Class;
use WebManDesign\Zooey\Setup\Site_Editor;
use WP_Query;
use WP_Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Page_Template implements Component_Interface {

	/**
	 * Array of CSS classes applied on HTML body when a specific page template is used.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     array
	 */
	public static $page_template_body_class = array(

		'custom-content-only' => array(
			'is-content-only',
			'no-primary-title',
			'no-site-footer',
			'no-site-header',
		),

		'custom-no-intro' => array(
			'no-primary-title',
		),
	);

	/**
	 * Soft cache for whether sidebar was edited.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     null|bool
	 */
	private static $has_sidebar = null;

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'wp', __CLASS__ . '::setup_layout_with_sidebar' );

			// Filters

				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::block_custom_templates' );

				add_filter( 'block_editor_settings_all', __CLASS__ . '::default_block_template' );

				add_filter( 'get_post_metadata', __CLASS__ . '::mode_fallback', 10, 3 );

				add_filter( 'theme_templates', __CLASS__ . '::post_templates', 5, 4 );
				add_filter( 'theme_templates', __CLASS__ . '::toggle_template_with_sidebar' );

				add_filter( 'body_class', __CLASS__ . '::body_class' );

				add_filter( 'zooey/entry/content_wrapper/classes', __CLASS__ . '::content_wrapper_classes' );

				add_filter( 'zooey/header/is_disabled', __CLASS__ . '::is_content_only' );
				add_filter( 'zooey/footer/is_disabled', __CLASS__ . '::is_content_only' );

	} // /init

	/**
	 * Enable block custom templates for public post types.
	 *
	 * Also removing custom HTML templates when in hybrid mode.
	 *
	 * IMPORTANT!:
	 * Do not use PHP variable hints for method attribute and return
	 * as depending on whether Gutenberg plugin is active,
	 * the WP_Theme_JSON_Data can also be WP_Theme_JSON_Data_Gutenberg.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Theme_JSON_Data $theme_json
	 *
	 * @return  WP_Theme_JSON_Data
	 */
	public static function block_custom_templates( $theme_json ) {

		// Variables

			$data = $theme_json->get_data();


		// Processing

			if ( ! Site_Editor::is_enabled() ) {
				unset( $data['customTemplates'] );

			} elseif ( ! empty( $data['customTemplates'] ) ) {

				$data['customTemplates'] = array_map( function( $custom_template ) {

					if (
						! empty( $custom_template['postTypes'] )
						&& 'public-post-types' === $custom_template['postTypes'][0]
					) {

						// If using "magic word", assign to every public post type.
						$custom_template['postTypes'] = get_post_types( array(
							'public' => true,
						) );

						// Except maybe `attachment` post type.
						unset( $custom_template['postTypes']['attachment'] );

						$custom_template['postTypes'] = array_values( $custom_template['postTypes'] );
					}

					return $custom_template;
				}, $data['customTemplates'] );
			}


		// Output

			return $theme_json->update_with( $data );

	} // /block_custom_templates

	/**
	 * Default custom page template content.
	 *
	 * Content for custom page template created in block theme
	 * from page edit screen
	 *
	 * @since  1.0.0
	 *
	 * @param  array $settings
	 *
	 * @return  mixed
	 */
	public static function default_block_template( array $settings ) {

		// Processing

			/**
			 * 20230406, WordPress 6.2
			 *
			 * Unfortunately, getting content from page template
			 * does NOT seem to be working even if we add "theme"
			 * attribute to Template Part block.
			 *
			 * It actually works on front end, but in editor it
			 * displays "This block has encountered an error and
			 * cannot be previewed." error message.
			 *
			 * We will revisit this in the future, meanwhile
			 * using much simple solution below.
			 */
			// $template = get_block_template( get_stylesheet() . '//page' );
			// if ( is_a( $template, 'WP_Block_Template' ) ) {
			// 	$settings['defaultBlockTemplate'] = str_replace(
			// 		'wp:template-part {',
			// 		'wp:template-part {"theme":"zooey",',
			// 		$template->content
			// 	);
			// }

			$settings['defaultBlockTemplate'] = '<!-- wp:post-content {"style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained"}} /-->';


		// Output

			return $settings;

	} // /default_block_template

	/**
	 * Fallback page template depending on theme mode.
	 *
	 * @since  1.0.0
	 *
	 * @param  mixed  $value
	 * @param  int    $post_id   ID of the object metadata is for.
	 * @param  string $meta_key
	 *
	 * @return  mixed
	 */
	public static function mode_fallback( $value, int $post_id, string $meta_key ) {

		// Variables

			$key = '_wp_page_template';


		// Requirements check

			if (
				is_admin()
				|| $key !== $meta_key
			) {
				return $value;
			}


		// Processing

			// Get the actual meta value (hack).
			remove_filter( current_filter(), __METHOD__ );
			$value = get_post_meta( $post_id, $key, true );
			add_filter( current_filter(), __METHOD__, 10, 3 );

			// Modify the page template.
			if (
				is_string( $value )
				&& 4 < strlen( $value )
			) {

				if (
					! Site_Editor::is_enabled()
					&& ! stripos( $value, '.php' )
				) {

					/**
					 * If page template was set in block mode,
					 * convert it to PHP template.
					 */
					$value = 'templates/' . $value . '.php';

				} elseif (
					Site_Editor::is_enabled()
					&& stripos( $value, '.php' )
				) {

					/**
					 * If page template was set in hybrid mode,
					 * convert it to block (HTML) template.
					 */
					$value = str_replace( [ 'templates/', '.php' ], '', $value );

				}
			}


		// Output

			return $value;

	} // /mode_fallback

	/**
	 * Enable post templates for public post types.
	 *
	 * Also removing theme custom PHP templates when in block mode.
	 *
	 * @since  1.0.0
	 *
	 * @param  array        $post_templates  Array of page templates. Keys are filenames, values are translated names.
	 * @param  WP_Theme     $theme           The theme object.
	 * @param  WP_Post|null $post            The post being edited, provided for context, or null.
	 * @param  string       $post_type       Post type to get the templates for.
	 *
	 * @return  array
	 */
	public static function post_templates( array $post_templates, WP_Theme $theme, $post, string $post_type ): array {

		// Requirements check

			if ( ! get_post_type_object( $post_type )->public ) {
				return $post_templates;
			}

			if ( Site_Editor::is_enabled() ) {

				foreach ( $post_templates as $file => $name ) {
					if (
						0 === stripos( $file, 'templates/custom-' )
						&& stripos( $file, '.php' )
					) {
						unset( $post_templates[ $file ] );
					}
				}

				return $post_templates;
			}


		// Variables

			$registered_post_templates = $theme->get_post_templates();

			if ( isset( $registered_post_templates['public-post-types'] ) ) {
				$registered_post_templates = $registered_post_templates['public-post-types'];
			} else {
				$registered_post_templates = array();
			}

			$post_templates = array_filter( array_merge( $post_templates, $registered_post_templates ) );


		// Output

			return $post_templates;

	} // /post_templates

	/**
	 * HTML body classes.
	 *
	 * Allows setting up page template custom body class(es).
	 *
	 * @since  1.0.0
	 *
	 * @param  array $classes
	 *
	 * @return  array
	 */
	public static function body_class( array $classes ): array {

		// Requirements check

			if ( ! in_array( get_post_type() . '-template', $classes ) ) {
				return $classes;
			}


		// Variables

			$classes_string = implode( ' ', $classes );

			/**
			 * Filters CSS classes applied on HTML body when specific page template is used.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $page_template_body_class
			 */
			$page_template_body_class = (array) apply_filters( 'zooey/entry/page_template/body_class', self::$page_template_body_class );


		// Processing

			foreach ( $page_template_body_class as $page_template => $body_class ) {
				if ( false !== stripos( $classes_string, $page_template ) ) {
					$classes = array_merge( $classes, (array) $body_class );
					break;
				}
			}


		// Output

			return array_unique( $classes );

	} // /body_class

	/**
	 * Content wrapper classes.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $classes
	 *
	 * @return  array
	 */
	public static function content_wrapper_classes( array $classes ): array {

		// Processing

			if ( stripos( implode( ' ', Body_Class::get_body_class() ), 'is-content-only' ) ) {

				unset(
					$classes['has-content-margin-top'],
					$classes['has-content-margin-bottom'],
					$classes['has-content-padding-top'],
					$classes['has-content-padding-bottom']
				);

				$classes['has-content-padding'] = 'has-content-padding';
			}


		// Output

			return $classes;

	} // /content_wrapper_classes

	// Page templates with content only.

		/**
		 * Is page template: Content only?
		 *
		 * @since  1.0.0
		 *
		 * @param  mixed $body_classes  Optional forced array of body classes when using the method within `body_class` hook.
		 *
		 * @return  bool
		 */
		public static function is_content_only( $body_classes = array() ): bool {

			// Variables

				$check_body_class = stripos( implode( ' ', Body_Class::get_body_class( $body_classes ) ), 'is-content-only' );


			// Output

				/**
				 * Filters whether we should display only page content.
				 *
				 * @since  1.0.0
				 *
				 * @param  bool $check_body_class  By default it checks for a specific body class name portion.
				 */
				return (bool) apply_filters( 'zooey/entry/page_template/is_content_only', (bool) $check_body_class );

		} // /is_content_only

	// Page templates with sidebar.

		/**
		 * Set up layout when "With sidebar" custom template used.
		 *
		 * @since  1.0.0
		 *
		 * @return  void
		 */
		public static function setup_layout_with_sidebar() {

			// Processing

				if (
					! Site_Editor::is_enabled()
					&& is_page_template()
					&& stripos( implode( ' ', Body_Class::get_body_class() ), 'custom-with-sidebar' )
				) {

					remove_action( 'tha_entry_bottom', __NAMESPACE__ . '\Component::meta' );

					remove_action( 'tha_entry_after', __NAMESPACE__ . '\Component::comments' );
					remove_action( 'tha_entry_after', __NAMESPACE__ . '\Navigation::display' );

					remove_filter( 'the_content', __NAMESPACE__ . '\Component::content_wrapper', 20 );
				}

		} // /setup_layout_with_sidebar

		/**
		 * Enable "With sidebar" custom template only when sidebar was modified.
		 *
		 * @since  1.0.0
		 *
		 * @param  array $post_templates
		 *
		 * @return  array
		 */
		public static function toggle_template_with_sidebar( array $post_templates ): array {

			// Variables

				$slug_template = 'custom-with-sidebar';

				/**
				 * Filters whether sidebar template (part) was modified.
				 *
				 * @since  1.0.0
				 *
				 * @param  null|bool $has_sidebar
				 */
				$has_sidebar = apply_filters( 'zooey/entry/page_template/has_sidebar', self::$has_sidebar );


			// Processing

				if ( null === $has_sidebar ) {

					$post_types = array( 'wp_template_part', 'wp_template' );
					$slugs      = array(
						'sidebar',              // Template part slug (`parts/sidebar.html`).
						'content-with-sidebar', // Template part slug (`parts/content-with-sidebar.html`).
						$slug_template,         // Template slug (`templates/custom-with-sidebar.*`).
					);

					$query = new WP_Query( array(
						'post_type'      => $post_types,
						'post_name__in'  => $slugs,
						'post_status'    => array( 'auto-draft', 'draft', 'publish', 'trash' ),
						'posts_per_page' => 1, // Just one is enough. Now we know the sidebar was edited somehow.
						'no_found_rows'  => true,
						'tax_query'      => array(
							array(
								'taxonomy' => 'wp_theme',
								'field'    => 'name',
								'terms'    => get_stylesheet(),
							),
						),
						'fields' => 'ids',
					) );

					$has_sidebar = self::$has_sidebar = $query->have_posts();
				}

				// Need a new conditional to process variable set above.
				if ( ! $has_sidebar ) {

					unset(
						$post_templates[ 'templates/' . $slug_template . '.php' ],
						$post_templates[ $slug_template ]
					);

					/**
					 * Unfortunately, we have to do something more...
					 * @link  https://github.com/WordPress/gutenberg/issues/54331
					 */
					add_action( 'enqueue_block_editor_assets', function() {
						wp_add_inline_style(
							'zooey-editor-ui',
							'.edit-post-post-template__form option[value="custom-with-sidebar"]{display: none}'
						);
					}, 99 );
				}


			// Output

				return $post_templates;

		} // /toggle_template_with_sidebar

}
