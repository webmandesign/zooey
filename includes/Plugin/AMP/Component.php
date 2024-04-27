<?php
/**
 * AMP integration component.
 *
 * Navigation block is compatible with AMP out of the box.
 * Keeping this code for classic theme mode (at least).
 *
 * @link  https://wordpress.org/plugins/amp/
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Plugin\AMP;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

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

				add_filter( 'zooey/assets/is_js_disabled',                __CLASS__ . '::is_amp' );
				add_filter( 'zooey/assets/is_preloading_styles_disabled', __CLASS__ . '::is_amp' );

				add_filter( 'body_class', __CLASS__ . '::body_class', 98 );

				add_filter( 'amp_dev_mode_element_xpaths', __CLASS__ . '::dev_mode_xpaths' );

	} // /init

	/**
	 * Determines whether this is an AMP response.
	 *
	 * Note that this must only be called after the `parse_query` action.
	 *
	 * @since  1.0.0
	 *
	 * @return  bool  Whether the AMP plugin is active and the current request is for an AMP endpoint.
	 */
	public static function is_amp(): bool {

		// Output

			return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();

	} // /is_amp

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

			if ( self::is_amp() ) {
				$classes[] = 'is-amp';
			}


		// Output

			return $classes;

	} // /body_class

	/**
	 * XPath queries for elements that should be enabled for AMP dev mode.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $xpaths
	 *
	 * @return  array
	 */
	public static function dev_mode_xpaths( array $xpaths ): array {

		// Processing

			if ( is_customize_preview() ) {
				/**
				 * @see  WebManDesign\Zooey\Customize\Preview::assets()
				 */
				$xpaths[] = '//style[ @id = "zooey-customize-preview-inline-css" ]';
			}


		// Output

			return $xpaths;

	} // /dev_mode_xpaths

}
