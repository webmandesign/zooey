<?php
/**
 * Customized styles component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.4
 */

namespace WebManDesign\Zooey\Customize;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Assets;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Editor\Component as Editor;
use WebManDesign\Zooey\Setup\Site_Editor;

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
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @param  string $scope  CSS code scope for optional filtering.
	 *
	 * @return  string
	 */
	public static function get_css( string $scope = 'global' ): string {

		// Output

			/**
			 * Filters PHP generated CSS.
			 *
			 * @since  1.0.0
			 *
			 * @param  string $css    CSS code.
			 * @param  string $scope  CSS code scope for optional filtering.
			 */
			return (string) apply_filters( 'zooey/customize/styles/get_css', '', $scope );

	} // /get_css

	/**
	 * Get processed CSS variables string.
	 *
	 * @since    1.0.0
	 * @version  2.0.4
	 *
	 * @return  string
	 */
	public static function get_css_variables(): string {

		// Variables

			$output = $css_vars = '';
			$output_template    = str_replace( '|', PHP_EOL, '|selector {|css|}|' );

			$root_vars = array(
				'--theme--mod--typography_font_size',
				'--theme--mod--typography_modular_scale',
				'--theme--mod--typography_desktop_multiply',
			);


		// Processing

			// `:root` selector specific, such as typography variables.

				$css_vars = CSS_Variables::get_string( '', $root_vars, 'intersect' );

				/* translators: Decorative quotation mark. IMPORTANT: Translate cautiously as this affects quote design! It is recommended to keep it untranslated. Takes CSS content value (https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Properties/content). */
				$css_vars .= '--theme--css--quote-decoration-content:' . __( '\'“\'', 'zooey' ) . ';'; // Do not use `esc_attr` here! Escaped in `self::inline_styles()`!

				if ( $css_vars ) {
					$output .= str_replace(
						array( 'selector', 'css' ),
						array( ':root', trim( $css_vars ) ), // Reference: CSS selector root.
						$output_template
					);
				}

			// For overriding WordPress global styles.

				$css_vars = '';
				// Site background (custom background):
				if ( ! Site_Editor::is_enabled() ) {

					$base = maybe_hash_hex_color( get_background_color() );

					$css_vars .= '/* Custom Background: */' . PHP_EOL;
					$css_vars .= '--wp--preset--color--base:' . $base . ';';
					$css_vars .=
						'--wp--preset--color--base--bg-text:'
						. ( Colors::is_dark( $base ) ) ? ( 'var(--wp--preset--color--white)' ) : ( 'var(--wp--preset--color--black)' )
						. ';';
					$css_vars .= PHP_EOL . '/* /CB. */';
				}
				// Theme options:
				$css_vars .= PHP_EOL . CSS_Variables::get_string( '', $root_vars, 'difference' );
				// Button styles:
				$css_vars .= self::get_css_variables_button();

				if ( $css_vars ) {
					$output .= str_replace(
						array( 'selector', 'css' ),
						array( CSS_Variables::get_root(), trim( $css_vars ) ), // Reference: CSS selector root.
						$output_template
					);
				}


		// Output

			return
				'/* START CSS variables */'
				. (string) $output
				. '/* END CSS variables */';

	} // /get_css_variables

	/**
	 * Get CSS variables for button styles.
	 *
	 * @since    2.0.1
	 * @version  2.0.3
	 *
	 * @return  string
	 */
	public static function get_css_variables_button(): string {

		// Variables

			$output = PHP_EOL;
			$sides  = array( 'top', 'right', 'bottom', 'left' );

			$gs_styles = 'USER.styles.elements.button';
			$gs_block  = 'USER.styles.blocks.core/button';
			$bg_block  = Editor::get_global_style( $gs_block . '.color.gradient' ) ?? Editor::get_global_style( $gs_block . '.color.background' );
			$bg_styles = Editor::get_global_style( $gs_styles . '.color.gradient' ) ?? Editor::get_global_style( $gs_styles . '.color.background' );

			$color_button_bg  = (string) ( $bg_block ?? $bg_styles ?? Mod::get( 'color_button' ) );
			$color_button_txt = (string) ( Editor::get_global_style( $gs_block . '.color.text' ) ?? Editor::get_global_style( $gs_styles . '.color.text' ) ); // There is no theme option (mod) for this.


		// Processing

			// Padding:
			foreach ( $sides as $side ) {
				$output .=
					'--theme--css--button--padding--' . $side . ':'
					. (string) Editor::get_global_style( 'styles.elements.button.spacing.padding.' . $side )
					. ';';
			}

			// Colors:

				$output .= PHP_EOL;
				$output .= '--theme--css--button--color--background:';

					if (
						0 === stripos( $color_button_bg, '#' )
						|| 0 === stripos( $color_button_bg, 'var(' )
						|| stripos( $color_button_bg, '-gradient(' )
					) {
						$output .= $color_button_bg;

					// Default button background color from theme mod:
					} else {
						$output .= 'var(--wp--preset--color--' . $color_button_bg . ')';
					}

				$output .= ';';
				$output .= '--theme--css--button--color--text:';

					// Explicitly set button text color:
					if (
						0 === stripos( $color_button_txt, '#' )
						|| 0 === stripos( $color_button_txt, 'var(' )
					) {
						$output .= $color_button_txt . ';';

					// Derive button text color from background color:
					} elseif ( 0 === stripos( $color_button_bg, '#' ) ) {
						$output .= 'var(--wp--preset--color--' . ( Colors::is_dark( $color_button_bg ) ? 'white' : 'black' ) . ')';
					} elseif ( 0 === stripos( $color_button_bg, 'var(--wp--preset--color--' ) ) {
						$output .= trim( $color_button_bg, ')' ) . '--bg-text)';
					} elseif (
						0 === stripos( $color_button_bg, 'var(--wp--preset--gradient--' )
						|| stripos( $color_button_bg, '-gradient(' )
					) {
						$output .= '#fff'; // This is presumption as explicit text color is not set.

					// Default button text color from theme mod:
					} else {
						$output .= 'var(--wp--preset--color--' . $color_button_bg . '--bg-text)';
					}

				$output .= ';';


		// Output

			return (string) $output;

	} // /get_css_variables_button

	/**
	 * @todo  Check the list.
	 * Gets theme CSS selectors.
	 *
	 * @since  2.0.1
	 *
	 * @param  string $scope  Default: 'button'.
	 *
	 * @return  array
	 */
	public static function get_selector( string $scope = 'button' ): array {

		// Variables

			$selector = array(

				/**
				 * Button CSS selectors.
				 *
				 * @see  assets/scss/_setup/_selectors.scss
				 */
				'button' => array(

					// Default WordPress button selectors:
					'.wp-element-button',
					'.wp-block-button__link',

					// Navigation toggle buttons:
					'.wp-block-navigation__responsive-container-open',
					'.wp-block-navigation__responsive-container-close',
					'.wp-block-navigation-overlay-close',

					// Other buttons:
					'.button',
					'.wp-block-file__button',
					'.page-numbers:not(.current,.dots)',
					'.post-page-numbers:not(.current,.dots)',
					'.wp-block-query-pagination-previous',
					'.wp-block-query-pagination-next',
					'.wp-block-comments-pagination-previous',
					'.wp-block-comments-pagination-next',
					'.wp-block-post-comments-form input[type=submit]',
					// '.wp-block-search .wp-block-search__button',

					// `form` selector is required to prevent styling MEJS buttons, for example.
					'form :where(button,[type="button"],[type="reset"],[type="submit"]):not([class*="wp-block-"])',

					// WooCommerce:
					'.cart_totals .checkout-button',
					'.wc-block-product-categories__button',

					// Buttons from block styles:
					'.is-style-buttons-inline a',
					'.is-style-read-more-button .wp-block-post-excerpt__more-link',

					// SCSS: @extend %button_outline:
					'.is-style-read-more-outline .wp-block-post-excerpt__more-link',
					'.wp-block-tag-cloud.is-style-outline .tag-cloud-link',
				),
			);


		// Processing

			if ( ! empty( $selector[ $scope ] ) ) {
				$selector = (array) $selector[ $scope ];
			} else {
				$selector = array();
			}


		// Output

			/**
			 * Filters theme CSS selectors.
			 *
			 * @since  2.0.1
			 *
			 * @param  array  $selector
			 * @param  string $scope     Default: 'button'.
			 */
			return (array) apply_filters( 'zooey/customize/styles/get_selector', $selector, $scope );

	} // /get_selector

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
