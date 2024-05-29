<?php
/**
 * Customized styles component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

namespace WebManDesign\Zooey\Customize;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Assets;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Styles implements Component_Interface {

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

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::inline_styles', ZOOEY_ENQUEUE_PRIORITY + 9 );

				add_action( 'customize_save_after',            __CLASS__ . '::customize_timestamp' );
				add_action( 'save_post_' . 'wp_global_styles', __CLASS__ . '::customize_timestamp' );

	} // /init

	/**
	 * Get custom CSS.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function get_css(): string {

		// Output

			/**
			 * Filters PHP generated CSS.
			 *
			 * @since  1.0.0
			 *
			 * @param  string $css  CSS code.
			 */
			return (string) apply_filters( 'zooey/customize/styles/get_css', '' );

	} // /get_css

	/**
	 * Get processed CSS variables string.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @return  string
	 */
	public static function get_css_variables(): string {

		// Variables

			$output = $css_vars = '';

			$root_vars = array(
				'--theme--mod--typography_font_size',
				'--theme--mod--typography_modular_scale',
				'--theme--mod--typography_desktop_multiply',
			);

			$background_color     = maybe_hash_hex_color( get_background_color() );
			$is_dark_base_color   = Colors::is_dark( $background_color );
			$color_base_bg_text   = ( $is_dark_base_color ) ? ( 'var(--wp--preset--color--white)' ) : ( 'var(--wp--preset--color--black)' );
			$color_base_bg_border = ( $is_dark_base_color ) ? ( 'var(--wp--preset--color--white--border)' ) : ( 'var(--wp--preset--color--black--border)' );
			$color_button         = Mod::get( 'color_button' );


		// Processing

			$output .= '/* START CSS variables */';

			// `:root` selector specific, such as typography variables.
			$css_vars = CSS_Variables::get_string( '', $root_vars, 'intersect' );

			if ( $css_vars ) {

				$output .=
					PHP_EOL
					. ':root { ' // Reference: CSS selector root.
					. PHP_EOL
					. trim( $css_vars )
					. PHP_EOL
					. '}'
					. PHP_EOL;
			}

			// For overriding WordPress global styles.
			// Site background:
			$css_vars  = '/* Custom Background: */' . PHP_EOL;
			$css_vars .= '--theme--mod--color_base:' . $background_color . ';';
			$css_vars .= '--wp--preset--color--base--bg-text:' . $color_base_bg_text . ';';
			$css_vars .= '--wp--preset--color--base--bg-border:' . $color_base_bg_border . ';';
			$css_vars .= '--wp--preset--color--base--border:' . Colors::hex_to_rgba( $background_color, 'var(--wp--custom--opacity--border)' ) . ';';
			$css_vars .= PHP_EOL . '/* /CB. */';
			// Theme options:
			$css_vars .= PHP_EOL . CSS_Variables::get_string( '', $root_vars, 'difference' );
			// Button colors:
			$css_vars .= PHP_EOL;
			$css_vars .= '--theme--css--button--color--background: var(--wp--preset--color--' . $color_button . ');';
			$css_vars .= '--theme--css--button--color--text: var(--wp--preset--color--' . $color_button . '--bg-text);';
			// $css_vars .= '--theme--css--button--color--border: var(--wp--preset--color--' . $color_button . '--bg-border);'; // Border is transparent in this theme.

			if ( $css_vars ) {

				$output .=
					PHP_EOL
					. CSS_Variables::get_root() . ' { ' // Reference: CSS selector root.
					. PHP_EOL
					. trim( $css_vars )
					. PHP_EOL
					. '}'
					. PHP_EOL;
			}

			$output .= '/* END CSS variables */';


		// Output

			return (string) $output;

	} // /get_css_variables

	/**
	 * Enqueue HTML head inline styles.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function inline_styles() {

		// Variables

			$css  = (string) self::get_css_variables();
			$css .= (string) self::get_css();


		// Processing

			if ( ! empty( $css ) ) {
				wp_add_inline_style(
					'zooey',
					(string) Assets\Factory::esc_css( $css, 'customize-styles' )
				);
			}

	} // /inline_styles

	/**
	 * Customizer save action timestamp.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function customize_timestamp() {

		// Output

			set_theme_mod( '__customize_timestamp', esc_attr( gmdate( 'ymdHis' ) ) );

	} // /customize_timestamp

}
