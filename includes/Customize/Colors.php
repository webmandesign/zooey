<?php
/**
 * Colors component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Customize;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Colors implements Component_Interface {

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

				add_filter( 'zooey/customize/css_variables/get_array/partial', __CLASS__ . '::css_variable', 10, 3 );

	} // /init

	/**
	 * Adding automatic text color CSS variables.
	 *
	 * @since  1.0.0
	 *
	 * @param  array  $css_vars
	 * @param  array  $option
	 * @param  string $value
	 *
	 * @return  array
	 */
	public static function css_variable( array $css_vars = array(), array $option = array(), string $value = '' ): array {

		// Processing

			if (
				isset( $option['css_var']['name'] )
				&& sanitize_hex_color( $value )
			) {

				if ( self::is_dark( $value ) ) {
					$css_vars[ $option['css_var']['name'] . '--bg-text' ]   = 'var(--wp--preset--color--white)';
					$css_vars[ $option['css_var']['name'] . '--bg-border' ] = 'var(--wp--preset--color--white--border)';
				} else {
					$css_vars[ $option['css_var']['name'] . '--bg-text' ]   = 'var(--wp--preset--color--black)';
					$css_vars[ $option['css_var']['name'] . '--bg-border' ] = 'var(--wp--preset--color--black--border)';
				}
			}


		// Output

			return (array) $css_vars;

	} // /css_variable

	/**
	 * Get rgb() or rgba() from the hex color.
	 *
	 * @since  1.0.0
	 *
	 * @link  http://php.net/manual/en/function.hexdec.php
	 *
	 * @param  string     $hex
	 * @param  string|int $alpha  [0-100] or CSS variable.
	 *
	 * @return  string
	 */
	public static function hex_to_rgba( string $hex, $alpha = 100 ): string {

		// Variables

			$output = 'rgba(';

			$rgb = array();

			$hex = preg_replace( '/[^0-9A-Fa-f]/', '', (string) $hex );
			$hex = substr( $hex, 0, 6 );


		// Processing

			// Converting hex color into rgb.
			$color    = (int) hexdec( $hex );
			$rgb['r'] = (int) 0xFF & ( $color >> 0x10 );
			$rgb['g'] = (int) 0xFF & ( $color >> 0x8 );
			$rgb['b'] = (int) 0xFF & $color;
			$output  .= implode( ',', $rgb );

			// Using alpha (rgba)?
			if ( is_integer( $alpha ) ) {
				$output .= ',' . ( $alpha / 100 );
			} else {
				$output .= ',' . $alpha;
			}

			// Closing opening bracket.
			$output .= ')';


		// Output

			return (string) $output;

	} // /hex_to_rgba

	/**
	 * HTML body classes in admin area.
	 *
	 * @link  https://github.com/mexitek/phpColors
	 *
	 * @since  1.0.0
	 *
	 * @param  string $color      Hex color code.
	 * @param  int    $threshold  Darkness threshold for comparison. [ 0 - 255 ]
	 *
	 * @return  boolean
	 */
	public static function is_dark( string $color = '', int $threshold = 127 ): bool {

		// Variables

			$color    = sanitize_hex_color_no_hash( $color );
			$darkness = 255;


		// Processing

			if ( in_array( strlen( $color ), array( 3, 6 ) ) ) {

				$r = hexdec( $color[0] . $color[1] );
				$g = hexdec( $color[2] . $color[3] );
				$b = hexdec( $color[4] . $color[5] );

				$darkness = ( $r * 299 + $g * 587 + $b * 114 ) / 1000;
			}


		// Output

			return $threshold >= $darkness;

	} // /is_dark

}
