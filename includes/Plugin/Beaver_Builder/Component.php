<?php
/**
 * Beaver Builder integration component.
 *
 * @link  https://wordpress.org/plugins/beaver-builder-lite-version/
 * @link  https://www.wpbeaverbuilder.com/
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.9
 */

namespace WebManDesign\Zooey\Plugin\Beaver_Builder;

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

				add_filter( 'fl_builder_upgrade_url', __CLASS__ . '::upgrade_url' );

				add_filter( 'fl_builder_settings_form_defaults', __CLASS__ . '::settings_form_defaults', 10, 2 );

	} // /init

	/**
	 * Upgrade URL.
	 *
	 * @since    1.0.0
	 * @version  1.1.9
	 *
	 * @param  string $url
	 *
	 * @return  string
	 */
	public static function upgrade_url( string $url ): string {

		// Output

			return trailingslashit( FL_BUILDER_STORE_URL ) . 'fla/67/';

	} // /upgrade_url

	/**
	 * Global settings defaults.
	 *
	 * @since  1.0.0
	 *
	 * @param  $defaults
	 * @param  string $form_type
	 *
	 * @return  object
	 */
	public static function settings_form_defaults( $defaults, string $form_type ) {

		// Processing

			if ( 'global' === $form_type ) {

				$defaults->show_default_heading     = '1';
				$defaults->default_heading_selector = implode( ', ', array(
					'.fl-builder .is-style-page-header',
					'.fl-theme-builder-404 .is-style-page-header',
					'.fl-theme-builder-archive .is-style-page-header',
					'.fl-theme-builder-singular .is-style-page-header',
				) );

				$defaults->row_width = $GLOBALS['content_width'];

				$defaults->medium_breakpoint     = 1280;
				$defaults->responsive_breakpoint = 880;
			}


		// Output

			return $defaults;

	} // /settings_form_defaults

}
