<?php
/**
 * Colors component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.5
 */

namespace WebManDesign\Zooey\Customize;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Accessibility\Component as A11y;
use WebManDesign\Zooey\Setup\Site_Editor;
use WP_Theme_JSON_Resolver;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Colors implements Component_Interface {

	/**
	 * Names of cached color slugs transients.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     string
	 */
	public static $transient_cache_key = 'zooey_cache_color_palette';

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'customize_save_after',            __CLASS__ . '::transient_cache_flush' );
				add_action( 'save_post_' . 'wp_global_styles', __CLASS__ . '::transient_cache_flush' );
				add_action( 'switch_theme',                    __CLASS__ . '::transient_cache_flush' );
				add_action( 'zooey/upgrade', __CLASS__ . '::transient_cache_flush' );

			// Filters

				add_filter( 'zooey/customize/css_variables/get_array/partial', __CLASS__ . '::css_variable', 10, 3 );

				add_filter( 'zooey/customize/styles/get_css', __CLASS__ . '::get_css' );

	} // /init

	/**
	 * Array of allowed accent color slugs (in a child theme).
	 *
	 * @since  2.0.0
	 *
	 * @return  array
	 */
	public static function get_slugs_accent(): array {

		// Output

			/**
			 * Filters allowed accent color slugs.
			 *
			 * @since  2.0.0
			 *
			 * @param  array $palette
			 */
			return (array) apply_filters( 'zooey/customize/colors/get_slugs_accent', array(
				'primary',
				'secondary',
				'tertiary',
				'quaternary',
				'quinary',
			) );

	} // /get_slugs_accent

	/**
	 * Gets color palette.
	 *
	 * INFO:
	 * `theme` scope colors are processed with `maybe_hash_hex_color`.
	 *
	 * IMPORTANT:
	 * This has to be called after custom background has been set
	 * even with theme code, so after `after_setup_theme` hook!
	 *
	 * IMPORTANT:
	 * We have to use `WP_Theme_JSON_Resolver` here instead of `Editor\Component::get_global_style()`
	 * as this method is called before `init.10` hook in `Editor\Component::set_color_palette()`
	 * which is hooked onto `after_setup_theme` action.
	 *
	 * @since  2.0.0
	 *
	 * @return  array
	 */
	public static function get_palette(): array {

		// Variables

			$palette = get_transient( self::$transient_cache_key );


		// Processing

			if ( ! is_array( $palette ) ) {

				// Using `get_raw_data()` as we also need `black` and `white` color values from default WP palette.
				$data_raw = WP_Theme_JSON_Resolver::get_user_data()->get_raw_data();
				$palette  = array(
					// Order is important here to override WP black and white colors by the theme.
					'custom'  => array(), // User added colors.
					'theme'   => array(), // (User modified) theme colors.
					'default' => array(), // (User modified) WP default colors.
				);

				// First get user modified palettes.
				foreach ( $palette as $scope => $value ) {
					if ( ! empty( $data_raw['settings']['color']['palette'][ $scope ] ) ) {

						$colors = (array) $data_raw['settings']['color']['palette'][ $scope ];

						$palette[ $scope ] = array_combine(
							array_column( $colors, 'slug' ),
							array_column( $colors, 'color' )
						);
					}
				}

				// If user hasn't modify theme palette, get it from code.
				if ( empty( $palette['theme'] ) ) {

					$data_raw = WP_Theme_JSON_Resolver::get_theme_data()->get_raw_data();

					if ( ! empty( $data_raw['settings']['color']['palette']['theme'] ) ) {

						$colors = (array) $data_raw['settings']['color']['palette']['theme'];

						$palette['theme'] = array_combine(
							array_column( $colors, 'slug' ),
							array_column( $colors, 'color' )
						);
					}
				}

				// Get default WordPress palette.
				if ( empty( $palette['default'] ) ) {

					$data_raw = WP_Theme_JSON_Resolver::get_core_data()->get_raw_data();

					if ( ! empty( $data_raw['settings']['color']['palette']['default'] ) ) {

						$colors = (array) $data_raw['settings']['color']['palette']['default'];

						$palette['default'] = array_combine(
							array_column( $colors, 'slug' ),
							array_column( $colors, 'color' )
						);
					}
				}

				// Get actual color hex code if CSS variable used in theme palette.
				foreach ( $palette['theme'] as $slug => $color ) {

					if (
						0 === strpos( $color, 'var' )
						|| ! Site_Editor::is_enabled()
					) {

						// We only get the color based on the slug from theme mods,
						// not the actual CSS variable color (it may differ).
						if ( 'base' === $slug ) {
							$color = get_background_color();
						} else {
							$color = Mod::get( 'color_' . str_replace( '-', '_', $slug ) );
						}
					}

					$palette['theme'][ $slug ] = maybe_hash_hex_color( $color );
				}

				set_transient( self::$transient_cache_key, $palette );
			}


		// Output

			/**
			 * Filters used color palettes.
			 *
			 * @since  2.0.0
			 *
			 * @param  array $palette
			 */
			return (array) apply_filters( 'zooey/customize/colors/get_palette', $palette );

	} // /get_palette

	/**
	 * Gets CSS styles for colors of the palette.
	 *
	 * The `zooey/customize/styles/get_css` filter also passes `$scope`
	 * variable ("editor" or "global"), but this is a global CSS code,
	 * so we don't need to check for it.
	 *
	 * @since  2.0.0
	 *
	 * @param  string $css
	 *
	 * @return  string
	 */
	public static function get_css( string $css = '' ): string {

		// Variables

			$file = get_theme_file_path( 'assets/css/php/colors.css' );


		// Processing

			if ( file_exists( $file ) ) {

				ob_start();
				include $file;
				$css_template = ob_get_clean();
				$placeholder  = '_COLOR_SLUG_';
				$output       = array(
					'1-comment:start' => '/* Color styles: */',
					'3-comment:end'   => '/* END Color styles. */',
				);

				foreach ( self::get_palette() as $scope => $palette ) {
					foreach ( $palette as $slug => $color ) {
						$output[ '2-' . $slug ] = str_replace(
							$placeholder,
							$slug,
							$css_template
						);
					}
				}

				ksort( $output );

				$css .= PHP_EOL . implode( PHP_EOL, $output ) . PHP_EOL;
			}


		// Output

			return $css;

	} // /get_css

	/**
	 * Flush the transient of cached color slugs array.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function transient_cache_flush() {

		// Processing

			delete_transient( self::$transient_cache_key );

	} // /transient_cache_flush

	/**
	 * Adding automatic text color CSS variables.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
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
					$css_vars[ $option['css_var']['name'] . '--bg-text' ] = 'var(--wp--preset--color--white)';
				} else {
					$css_vars[ $option['css_var']['name'] . '--bg-text' ] = 'var(--wp--preset--color--black)';
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
	 * Is color dark?
	 *
	 * @link  https://github.com/mexitek/phpColors
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @param  string $color           Hex color code.
	 * @param  int    $threshold       Darkness threshold for comparison. [ 0 - 255 ]
	 * @param  bool   $check_contrast  Whether to use accessibility color contrast check instead of `$threshold` calculation.
	 *
	 * @return  boolean
	 */
	public static function is_dark( string $color = '', int $threshold = 128, bool $check_contrast = true ): bool {

		// Variables

			$color    = sanitize_hex_color_no_hash( $color );
			$darkness = 255;


		// Processing

			if (
				! $check_contrast
				&& 6 === strlen( (string) $color )
			) {

				$r = hexdec( substr( $color, 0, 2 ) );
				$g = hexdec( substr( $color, 2, 2 ) );
				$b = hexdec( substr( $color, 4, 2 ) );

				$darkness = ( $r * 299 + $g * 587 + $b * 114 ) / 1000;
			}


		// Output

			if ( $check_contrast ) {
				/**
				 * @link  https://www.siegemedia.com/contrast-ratio
				 */
				return 4.5 < A11y::get_color_contrast( $color, '#ffffff' );
			} else {
				return $threshold > $darkness;
			}

	} // /is_dark

	/**
	 * Is color light?
	 *
	 * @since    2.0.0
	 * @version  2.0.5
	 *
	 * @param  string $color      Hex color code.
	 * @param  int    $threshold  Darkness threshold for comparison. [ 0 - 255 ]
	 * @param  bool   $check_contrast  Whether to use accessibility color contrast check instead of `$threshold` calculation.
	 *
	 * @return  boolean
	 */
	public static function is_light( string $color = '', int $threshold = 128, bool $check_contrast = true ): bool {

		// Output

			return ! self::is_dark( $color, $threshold, $check_contrast );

	} // /is_light

}
