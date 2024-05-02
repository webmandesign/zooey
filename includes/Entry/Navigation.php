<?php
/**
 * Entry navigation component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Entry;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Content\Block_Template_Part;
use WebManDesign\Zooey\Setup\Site_Editor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Navigation implements Component_Interface {

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

				add_action( 'tha_entry_after', __CLASS__ . '::display' );

			// Filters

				add_filter( 'the_content', __CLASS__ . '::parted', 15 );

	} // /init

	/**
	 * Post navigation display.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function display() {

		// Variables

			$post_types = array( 'post' );


		// Requirements check

			if (
				Site_Editor::is_enabled()
				|| ! is_single( get_the_ID() )
				|| ! in_array( get_post_type(), $post_types )
			) {
				return;
			}


		// Output

			Block_Template_Part::the_content(
				'entry-navigation',
				array(
					'tag'   => 'div',
					'class' => 'entry-navigation-container',
				)
			);

	} // /display

	/**
	 * Parted post navigation.
	 *
	 * Keeping things backwards compatible (pre-block content).
	 *
	 * @since  1.0.0
	 *
	 * @param  string $content
	 *
	 * @return  string
	 */
	public static function parted( string $content ): string {

		// Requirements check

			if (
				! is_singular()
				|| stripos( $content, 'post-nav-links' )
			) {
				return $content;
			}


		// Output

			return $content . wp_link_pages( array( 'echo' => false ) );

	} // /parted

}
