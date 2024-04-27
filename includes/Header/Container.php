<?php
/**
 * Header container class.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Header;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Setup\Site_Editor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Container implements Component_Interface {

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

				add_action( 'tha_body_top', __CLASS__ . '::site_open' );

	} // /init

	/**
	 * Site container: Open.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function site_open() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Output

			echo '<div id="page" class="site wp-site-blocks">' . PHP_EOL;

	} // /site_open

}
