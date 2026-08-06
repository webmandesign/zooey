<?php
/**
 * Theme JSON cache class.
 *
 * @package    Ileana
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  2.0.0
 */

namespace WebManDesign\Ileana\Editor;

use WebManDesign\Ileana\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Cache {

	/**
	 * Transient name of cached theme JSON data.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     string
	 */
	public static $transient_cache_key = 'ileana_cache_theme_json';

	/**
	 * Theme JSON new data soft cache.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     array
	 */
	public static $data = array();

	/**
	 * Initialization.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'customize_save_after',            __CLASS__ . '::flush' );
				add_action( 'save_post_' . 'wp_global_styles', __CLASS__ . '::flush' );
				add_action( 'switch_theme',                    __CLASS__ . '::flush' );
				add_action( 'ileana/upgrade', __CLASS__ . '::flush' );

	} // /init

	/**
	 * Get data from cache.
	 *
	 * @since  2.0.0
	 *
	 * @param  string $scope
	 *
	 * @return  null|array
	 */
	public static function get( string $scope = '' ) {

		// Requirements check

			if ( isset( self::$data[ $scope ] ) ) {
				return (array) self::$data[ $scope ];
			}


		// Variables

			self::$data = array_filter( (array) get_transient( self::$transient_cache_key ) );


		// Processing

			return self::$data[ $scope ] ?? null;

	} // /cache_get

	/**
	 * Save data to cache.
	 *
	 * @since  2.0.0
	 *
	 * @param  array  $data
	 * @param  string $scope
	 *
	 * @return  void
	 */
	public static function set( string $scope, array $data ) {

		// Processing

			self::$data[ $scope ] = array_filter( (array) $data );

			set_transient( self::$transient_cache_key, self::$data );

	} // /cache_set

	/**
	 * Flush cached data.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function flush() {

		// Processing

			delete_transient( self::$transient_cache_key );

	} // /cache_flush

}
