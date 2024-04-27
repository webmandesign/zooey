<?php
/**
 * HTML head component.
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

class Head implements Component_Interface {

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

				add_action( 'wp_head', __CLASS__ . '::head', 0 );
				add_action( 'wp_head', __CLASS__ . '::link_pingback' );

	} // /init

	/**
	 * HTML head.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function head() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Processing

			get_template_part( 'parts/header/head' );

	} // /head

	/**
	 * Add a pingback URL auto-discovery header for single posts, pages, or attachments.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function link_pingback() {

		// Output

			if (
				is_singular()
				&& pings_open()
			) {
				echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
			}

	} // /link_pingback

}
