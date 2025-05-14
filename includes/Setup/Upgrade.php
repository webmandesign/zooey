<?php
/**
 * Theme upgrade action component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.2.2
 */

namespace WebManDesign\Zooey\Setup;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Upgrade implements Component_Interface {

	/**
	 * Name of cached data transient.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $transient_cache_version = 'zooey_cache_version';

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

				add_action( 'init', __CLASS__ . '::action' );

	} // /init

	/**
	 * Do action on theme version change.
	 *
	 * @since    1.0.0
	 * @version  1.2.2
	 *
	 * @return  void
	 */
	public static function action() {

		// Variables

			$current_theme_version = get_site_transient( self::$transient_cache_version );
			$new_theme_version     = wp_get_theme( 'zooey' )->get( 'Version' );


		// Processing

			if (
				empty( $current_theme_version )
				|| $new_theme_version != $current_theme_version
			) {

				/**
				 * Fires when theme is being upgraded.
				 *
				 * @since  1.0.0
				 *
				 * @param  string $new_theme_version
				 * @param  string $current_theme_version
				 */
				do_action( 'zooey/upgrade', $new_theme_version, $current_theme_version );

				set_site_transient( self::$transient_cache_version, $new_theme_version );
			}

	} // /action

}
