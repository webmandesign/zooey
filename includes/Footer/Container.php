<?php
/**
 * Footer container class.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Footer;

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

				add_action( 'tha_body_bottom', __CLASS__ . '::site_close', 100 );

	} // /init

	/**
	 * Site container: Close
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function site_close() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Output

			echo PHP_EOL . '</div><!-- /#page -->' . PHP_EOL.PHP_EOL;

	} // /site_close

}
