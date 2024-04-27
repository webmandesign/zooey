<?php
/**
 * Plugin compatibility/integration component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Plugin;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Setup\Site_Editor;

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

			// Loading plugins:

				if ( class_exists( 'WebManDesign\ABS\Register' ) ) {
					Abs\Component::init();
				}

				if ( function_exists( 'amp_is_enabled' ) ) {
					AMP\Component::init();
				}

				if ( class_exists( 'FLBuilder' ) ) {
					Beaver_Builder\Component::init();
				}

				if ( class_exists( 'Block_Visibility' ) ) {
					Block_Visibility\Component::init();
				}

			// Integration with theme builders (Beaver Themer & Elementor Pro Theme Builder).

				if (
					is_callable( 'WebManDesign\IFBT\Loader::init' )
					|| is_callable( 'WebManDesign\IFETB\Loader::init' )
				) {
					add_filter( 'theme_mod_' . Site_Editor::$theme_mod_id, '__return_false' );
				}

	} // /init

}
