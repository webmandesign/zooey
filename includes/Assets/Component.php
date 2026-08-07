<?php
/**
 * Assets component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey\Assets;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Theme assets.
			Styles::init();
			Scripts::init();

			// Filters

				add_filter( 'zooey/assets/esc_css', 'wp_strip_all_tags' );

	} // /init

}
