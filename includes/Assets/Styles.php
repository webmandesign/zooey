<?php
/**
 * Theme styles component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Assets;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Styles implements Component_Interface {

	/**
	 * Associative array of CSS files, as `$handle => $data` pairs.
	 * Do not access this property directly, instead use the `get_css_files()` method.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $css_files;

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

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::enqueue', ZOOEY_ENQUEUE_PRIORITY );

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::register_inline', 0 );
				add_action( 'wp_enqueue_scripts', __CLASS__ . '::enqueue_inline', ZOOEY_ENQUEUE_PRIORITY + 9 );

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::enqueue_child_theme', ZOOEY_ENQUEUE_PRIORITY + 9 );

	} // /init

	/**
	 * Gets all CSS files.
	 *
	 * @since  1.0.0
	 *
	 * @return  array  Associative array of `$handle => $data` pairs.
	 */
	public static function get_css_files(): array {

		// Requirements check

			if ( is_array( self::$css_files ) ) {
				return self::$css_files;
			}


		// Processing

			$css_files = array(

				'zooey-global' => array(
					'src'    => get_theme_file_uri( 'assets/css/global.css' ),
					'global' => true,
				),

				'zooey-blocks' => array(
					'src'    => get_theme_file_uri( 'assets/css/blocks.css' ),
					'deps'   => array( 'wp-block-library' ),
					'global' => true,
				),
			);

			/**
			 * Filters default theme CSS files.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $css_files  Associative array of CSS files.
			 */
			$css_files = (array) apply_filters( 'zooey/assets/styles/get_css_files', $css_files );

			self::$css_files = array();

			foreach ( $css_files as $handle => $data ) {

				if ( is_string( $data ) ) {
					$data = array( 'src' => $data );
				}

				if ( empty( $data['src'] ) ) {
					continue;
				}

				self::$css_files[ $handle ] = wp_parse_args(
					$data,
					array(
						'handle'           => $handle,
						'global'           => false,
						'preload_callback' => null,
					)
				);
			}


		// Output

			return (array) self::$css_files;

	} // /get_css_files

	/**
	 * Registers or enqueues stylesheets.
	 *
	 * Stylesheets that are global are enqueued.
	 * All other stylesheets are only registered, to be enqueued later.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue() {

		// Variables

			$css_files = self::get_css_files();


		// Processing

			foreach ( $css_files as $handle => $data ) {

				/**
				 * Enqueue global stylesheets immediately and register the other ones
				 * for later use (unless preloading stylesheets is disabled, in which
				 * case stylesheets should be immediately enqueued based on whether
				 * they are necessary for the page content).
				 */
				if (
					$data['global']
					|| Factory::is_preloading_styles_disabled()
					&& is_callable( $data['preload_callback'] )
					&& call_user_func( $data['preload_callback'] )
				) {
					Factory::style_enqueue( $data );
				} else {
					Factory::style_register( $data );
				}
			}

	} // /enqueue

	/**
	 * Enqueue child theme `style.css` file late, after parent theme stylesheets.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue_child_theme() {

		// Processing

			if ( is_child_theme() ) {

				wp_enqueue_style(
					'child-theme-stylesheet',
					get_stylesheet_uri(),
					array(),
					filemtime( get_theme_file_path( 'style.css' ) )
				);
			}

	} // /enqueue_child_theme

	/**
	 * Placeholder for adding inline styles: register.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function register_inline() {

		// Processing

			wp_register_style( 'zooey', '' );

	} // /register_inline

	/**
	 * Placeholder for adding inline styles: enqueue.
	 *
	 * This should be loaded after all of the theme stylesheets,
	 * and before the child theme stylesheet are enqueued.
	 * Use the `zooey` handle in `wp_add_inline_style`.
	 *
	 * Early registration is required!
	 * @see  self::register_inline()
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue_inline() {

		// Processing

			wp_enqueue_style( 'zooey' );

	} // /enqueue_inline

}
