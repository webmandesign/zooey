<?php
/**
 * Theme upgrade action component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.0
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
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function action() {

		// Variables

			$stylesheet      = get_stylesheet();
			$current_version = get_site_transient( self::$transient_cache_version );
			$new_version     = array(
				'zooey' => wp_get_theme( 'zooey' )->get( 'Version' ),
				'child'     => array(
					$stylesheet => wp_get_theme()->get( 'Version' ),
				),
			);


		// Processing

			if (
				empty( $current_version )
				|| is_string( $current_version ) // Upgrade old values.
			) {
				$current_version = array(
					'zooey' => '',
					'child'     => array(
						$stylesheet => '',
					),
				);
			}

			if ( empty( $current_version['child'][ $stylesheet ] ) ) {
				$current_version['child'][ $stylesheet ] = '';
			}

			if (
				$new_version['zooey'] != $current_version['zooey']
				|| $new_version['child'][ $stylesheet ] != $current_version['child'][ $stylesheet ]
			) {

				/**
				 * Fires when theme is being upgraded.
				 *
				 * @since  1.0.0
				 *
				 * @param  string $new_version
				 * @param  string $current_version
				 */
				do_action( 'zooey/upgrade', $new_version, $current_version );

				// Keep it this way as there can be multiple child themes on WP network.
				$current_version['zooey'] = $new_version['zooey'];
				$current_version['child'][ $stylesheet ] = $new_version['child'][ $stylesheet ];

				set_site_transient( self::$transient_cache_version, $current_version );
			}

	} // /action

}
