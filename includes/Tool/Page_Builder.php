<?php
/**
 * Page builder component.
 *
 * IMPORTANT:
 * This template is only PHP, not HTML. So, there is no page builder
 * template functionality in block theme mode.
 * If user really needs a page builder when full site editing is enabled,
 * user can create a custom template for this.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Tool;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Header\Body_Class;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Page_Builder implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'zooey/entry/page_template/body_class', __CLASS__ . '::page_template_body_class' );

				add_filter( 'body_class', __CLASS__ . '::body_class', 99 );

				add_filter( 'theme_templates', __CLASS__ . '::remove_page_template' );

				add_filter( 'zooey/customize/options/get', __CLASS__ . '::options' );

				add_filter( 'zooey/content/show_primary_title', __CLASS__ . '::show_primary_title', 20 );

				add_filter( 'zooey/tool/page_builder/is_enabled', __CLASS__ . '::automatic_check' );

	} // /init

	/**
	 * Theme options.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $options
	 *
	 * @return  array
	 */
	public static function options( array $options ): array {

		// Variables

			$is_no_padding_default = class_exists( 'Vc_Manager' ) || class_exists( 'SiteOrigin_Panels' );
			$active_callback       = 'WebManDesign\Zooey\Customize\Options_Conditional::is_site_editor_disabled';


		// Processing

			$options[ 940 . 'page_builders' ] = array(
				'active_callback' => $active_callback,
				'id'              => 'page_builders',
				'type'            => 'section',
				'create_section'  => esc_html_x( 'Page builders', 'Customizer section title.', 'zooey' ),
				'in_panel'        => esc_html_x( 'Theme Options', 'Customizer panel title.', 'zooey' ),
			);

			$options[ 940 . 'page_builders' . 100 ] = array(
				'active_callback' => $active_callback,
				'type'            => 'radio',
				'id'              => 'page_builder_layout_content',
				'label'           => esc_html__( 'Page builder layout', 'zooey' ),
				'description'     => esc_html__( 'Tweaks content area layout when using "Page builder" template.', 'zooey' ) . ' ' . esc_html__( 'As every page builder plugin works differently, set this according to your needs.', 'zooey' ),
				'default'         => ( $is_no_padding_default ) ? ( 'no-padding' ) : ( 'full-width' ),
				'choices'         => array(
					'full-width' => esc_html__( 'Full width content with no padding', 'zooey' ),
					'no-padding' => esc_html__( 'Keep the content width, just remove padding', 'zooey' ),
				),
			);

			$options[ 940 . 'page_builders' . 110 ] = array(
				'active_callback' => $active_callback,
				'type'            => 'checkbox',
				'id'              => 'page_builder_show_primary_title',
				'label'           => esc_html__( 'Show primary title', 'zooey' ),
				'description'     => esc_html__( 'Controls display of page intro section with primary page title when using "Page builder" template.', 'zooey' ),
				'default'         => false,
			);


		// Output

			return $options;

	} // /options

	/**
	 * Setting up CSS classes applied on HTML body when page template is used.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $page_template_body_class
	 *
	 * @return  array
	 */
	public static function page_template_body_class( array $page_template_body_class ): array {

		// Processing

			$page_template_body_class['custom-page-builder'] = array(
				'is-page-builder-ready',
			);


		// Output

			return $page_template_body_class;

	} // /page_template_body_class

	/**
	 * HTML body classes.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $classes
	 *
	 * @return  array
	 */
	public static function body_class( array $classes ): array {

		// Processing

			// Any page builder layout.
			if (
				is_singular()
				&& self::is_enabled( $classes )
			) {

				$content_layout = Mod::get( 'page_builder_layout_content' );

				if ( 'full-width' === $content_layout ) {
					$classes[] = 'has-content-layout-no-padding';
					$classes[] = 'has-content-layout-full-width';
				} elseif ( 'no-padding' === $content_layout ) {
					$classes[] = 'has-content-layout-no-padding';
				}
			}


		// Output

			return array_unique( $classes );

	} // /body_class

	/**
	 * Is page builder template body class used?
	 *
	 * @param  mixed $body_classes  Optional forced array of body classes when using the method within `body_class` hook.
	 *
	 * @since  1.0.0
	 *
	 * @return  bool
	 */
	public static function is_enabled( $body_classes = array() ): bool {

		// Variables

			$check_body_class =
				stripos( implode( ' ', Body_Class::get_body_class( $body_classes ) ), 'is-page-builder-ready' )
				|| stripos( implode( ' ', Body_Class::get_body_class( $body_classes ) ), 'custom-page-builder' );


		// Output

			/**
			 * Filters whether we should apply page builder template.
			 *
			 * @since  1.0.0
			 *
			 * @param  bool $check_body_class  By default it checks for a specific body class name portion.
			 */
			return (bool) apply_filters( 'zooey/tool/page_builder/is_enabled', (bool) $check_body_class );

	} // /is_enabled

	/**
	 * Remove "Page builder" page/post template [custom-page-builder(-*).php].
	 *
	 * The "Page builder" template is present as a file in theme,
	 * but disabled in template selector in favor of automatic
	 * page builder layout detection (see `automatic_check()` below).
	 * In case a non-supported auto-check page builder is used,
	 * it is possible to enable the template by hooking onto
	 * `theme_mod_page_builder_template` filter via child theme.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $post_templates  Array of page templates. Keys are filenames, values are translated names.
	 *
	 * @return  array
	 */
	public static function remove_page_template( array $post_templates ): array {

		// Processing

			if ( ! get_theme_mod( 'page_builder_template', false ) ) {
				foreach ( $post_templates as $file => $name ) {
					if ( 0 === stripos( $file, 'templates/custom-page-builder' ) ) {
						unset( $post_templates[ $file ] );
					}
				}
			}


		// Output

			return $post_templates;

	} // /remove_page_template

	/**
	 * Should we display primary page title?
	 *
	 * @since  1.0.0
	 *
	 * @param  bool $show
	 *
	 * @return  bool
	 */
	public static function show_primary_title( bool $show ): bool {

		// Processing

			if (
				self::is_enabled()
				&& ! Mod::get( 'page_builder_show_primary_title' )
			) {
				$show = false;
			}


		// Output

			return (bool) $show;

	} // /show_primary_title

	/**
	 * Enable page builder layout automatically for selected page builder plugins.
	 *
	 * Works with:
	 * - Beaver Builder
	 * - Elementor
	 *
	 * Does not work with:
	 * - WPBakery Page Builder because there is no way to check if the page was built
	 *   with this page builder except checking for shortcodes in the page content…
	 *
	 * @since  1.0.0
	 *
	 * @param  bool $is_enabled
	 *
	 * @return  bool
	 */
	public static function automatic_check( bool $is_enabled ): bool {

		// Variables

			$beaver_builder = is_callable( 'FLBuilderModel::is_builder_enabled' ) && \FLBuilderModel::is_builder_enabled();
			$elementor = is_callable( 'Elementor\Plugin::instance' ) && \Elementor\Plugin::instance()->db->is_built_with_elementor( get_the_ID() );


		// Processing

			if (
				is_singular()
				&& (
					$beaver_builder
					|| $elementor
				)
			) {
				return true;
			}


		// Output

			return (bool) $is_enabled;

	} // /automatic_check

}
