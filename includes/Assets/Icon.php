<?php
/**
 * Icon component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Assets;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Icon {

	/**
	 * Relative path to theme SVG icons.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $path = 'assets/images/svg/';

	/**
	 * Soft cache for icons SVG code.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $icons = array();

	/**
	 * Get contents of SVG icon file.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $slug   SVG icon file slug.
	 * @param  string $class  Additional SVG CSS class.
	 *
	 * @return  string
	 */
	public static function get_svg( string $slug, string $class = '' ): string {

		// Pre

			/**
			 * Bypass filter for WebManDesign\Zooey\Assets\Icon::get_svg().
			 *
			 * @since  1.0.0
			 *
			 * @param  mixed  $pre   Default: false. If string, method returns the value.
			 * @param  string $slug  SVG icon file slug.
			 */
			$pre = apply_filters( 'pre/zooey/assets/icon/get_svg', false, $slug );

			if ( is_string( $pre ) ) {
				return (string) $pre;
			}


		// Processing

			if ( empty( self::$icons[ $slug ] ) ) {

				$file = get_theme_file_path( self::$path . $slug . '.svg' );

				if ( file_exists( $file ) ) {

					ob_start();
					include_once $file;

					$svg = new WP_HTML_Tag_Processor( ob_get_clean() );

					$svg->next_tag( 'svg' );
					$svg->add_class( trim( 'svg-icon ' . $class ) );
					$svg->set_attribute( 'width', '1em' );
					$svg->set_attribute( 'aria-hidden', 'true' );

					// Soft cache the icon to prevent multiple file load.
					self::$icons[ $slug ] = $svg->get_updated_html();
				}
			}


		// Output

			/**
			 * Filters the SVG icon code.
			 *
			 * @since  1.0.0
			 *
			 * @param  string $svg_code  Icon SVG code.
			 */
			return (string) apply_filters( 'zooey/assets/icon/get_svg', self::$icons[ $slug ] );

	} // /get_svg

	/**
	 * Print the SVG icon.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $slug  SVG icon file slug.
	 *
	 * @return  void
	 */
	public static function the_svg( string $slug ) {

		// Processing

			echo self::get_svg( $slug );

	} // /the_svg

}
