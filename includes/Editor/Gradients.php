<?php
/**
 * Theme JSON and block editor gradients setup component.
 *
 * It is very unfortunate, but WordPress does not recognize
 * colors set as CSS variables in `theme.json`, so we need
 * to transform them to actual CSS color values here.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    2.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey\Editor;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Colors;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Customize\RGBA;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Gradients implements Component_Interface {

	/**
	 * Theme JSON `settings.color` key.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     string
	 */
	public static $key = 'gradients';

	/**
	 * Initialization.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::add', 30 );
				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::replace', 35 );

	} // /init

	/**
	 * Adds automatically generated gradients to `theme.json`.
	 *
	 * You can set position for generated gradients
	 * by adding `{ "gradient" : "GENERATED" },` into `theme.json`.
	 *
	 * IMPORTANT!:
	 * Do not use PHP variable hints for method attribute and return
	 * as depending on whether Gutenberg plugin is active,
	 * the WP_Theme_JSON_Data can also be WP_Theme_JSON_Data_Gutenberg.
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @param  WP_Theme_JSON_Data $theme_json
	 *
	 * @return  WP_Theme_JSON_Data
	 */
	public static function add( $theme_json ) {

		// Requirements check

			if ( ! (bool) Mod::get( 'enable_theme_gradients' ) ) {
				return $theme_json;
			}

			/**
			 * This is required check as after resetting modified global
			 * styles in Site Editor, this runs in the background without
			 * obtaining proper color palette values and thus saving cache
			 * with wrong (non-replaced) data.
			 * Having this check forces rerun and caching the correct data.
			 *
			 * Not sure why, but this check is also required here...
			 */
			if ( empty( Component::$color_palette ) ) {
				return $theme_json;
			}

			if ( is_array( Cache::get( self::$key ) ) ) {
				// This is important. Otherwise the WP global CSS is not affected.
				return $theme_json->update_with( Cache::get( self::$key ) );
			}


		// Variables

			$data = $theme_json->get_data();

			// No need to continue if we have nothing to modify.
			if ( empty( $data['settings']['color'][ self::$key ]['theme'] ) ) {
				Cache::set( self::$key, array() );
				return $theme_json;
			}

			$gradients      = array();
			$gradient_types = self::get_types();
			$gradient_args  = self::get_args();
			$accent_colors  = Colors::get_slugs_accent();


		// Processing

			foreach ( Component::$color_palette as $slug => $color ) {

				// What gradient types should be generated for this color.
				$types = array();

				// All colors.
				if ( array_key_exists( 'ALL', $gradient_args ) ) { // Case sensitive.
					$types = array_merge( $types, $gradient_args['ALL'] );
				}

				// Accent colors.
				if (
					array_key_exists( 'ACCENT', $gradient_args )
					&& in_array( $slug, $accent_colors )
				) {
					$types = array_merge( $types, $gradient_args['ACCENT'] );
				}

				// Add gradient types for this color.
				foreach ( $types as $type ) {
					$gradients[] = array(
						'name'     => str_replace( '%s', Component::$color_names[ $slug ], $gradient_types[ $type ]['name'] ),
						'slug'     => str_replace( 'COLORSLUG', $slug, $type ),
						'gradient' => str_replace( 'COLORSLUG', $slug, $gradient_types[ $type ]['gradient'] ),
					);
				}
			}

			// You can set position for generated gradients by adding `{ "gradient" : "GENERATED" },` into `theme.json`.
			$position = array_search(
				'GENERATED',
				array_column( $data['settings']['color'][ self::$key ]['theme'], 'gradient' )
			);
			if ( false !== $position ) {

				array_splice( // PHP8+
					$data['settings']['color'][ self::$key ]['theme'],
					$position,
					1,
					$gradients
				);

				$gradients = $data['settings']['color'][ self::$key ]['theme'];
			} else {

				// By default, append to existing gradients setup.
				$gradients = array_merge(
					$data['settings']['color'][ self::$key ]['theme'],
					$gradients
				);
			}

			$data = array(
				'version'  => $data['version'],
				'settings' => array(
					'color' => array(
						self::$key => $gradients,
					),
				),
			);

			Cache::set( self::$key, $data );


		// Output

			return $theme_json->update_with( $data );

	} // /add

	/**
	 * Replacing CSS variables in gradients for actual values.
	 *
	 * This is needed in editor (in admin) only.
	 * We need to keep CSS variables on front-end for compatibility with Customizer.
	 *
	 * IMPORTANT!:
	 * Do not use PHP variable hints for method attribute and return
	 * as depending on whether Gutenberg plugin is active,
	 * the WP_Theme_JSON_Data can also be WP_Theme_JSON_Data_Gutenberg.
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @param  WP_Theme_JSON_Data $theme_json
	 *
	 * @return  WP_Theme_JSON_Data
	 */
	public static function replace( $theme_json ) {

		// Requirements check

			if ( ! is_admin() ) {
				return $theme_json;
			}

			/**
			 * This is required check as after resetting modified global
			 * styles in Site Editor, this runs in the background without
			 * obtaining proper color palette values and thus saving cache
			 * with wrong (non-replaced) data.
			 * Having this check forces rerun and caching the correct data.
			 */
			if ( empty( Component::$color_palette ) ) {
				return $theme_json;
			}

			$cahe_key = self::$key . '.' . __FUNCTION__;

			if ( is_array( Cache::get( $cahe_key ) ) ) {
				// This is important. Otherwise the WP global CSS is not affected.
				return $theme_json->update_with( Cache::get( $cahe_key ) );
			}


		// Variables

			$data = $theme_json->get_data();

			// No need to continue if we have nothing to modify.
			if ( empty( $data['settings']['color'][ self::$key ]['theme'] ) ) {
				Cache::set( $cahe_key, array() );
				return $theme_json;
			}

			$semitransparent = $data['settings']['custom']['opacity']['semitransparent'] ?? 1;
			$rgba_setup      = RGBA::get_alphas();

			// Replacements array.

				$color_replace = array(
					// Gradient stops are configurable via customizer.
					'var(--theme--css--gradient-stop--hard)' => absint( Mod::get( 'gradient_stop_hard' ) ) . '%',
					'var(--theme--css--gradient-stop--soft)' => absint( Mod::get( 'gradient_stop_soft' ) ) . '%',
				);

				foreach ( Component::$color_palette as $slug => $color ) {

					$color_replace[ 'var(--wp--preset--color--' . $slug . ')' ] = $color;

					$slug = 'color_' . str_replace( '-', '_', $slug );
					if ( isset( $rgba_setup[ $slug ] ) ) {
						foreach ( $rgba_setup[ $slug ] as $args ) {
							$color_replace[ 'var(' . $args['css_var_name'] . ')' ] = esc_attr( Colors::hex_to_rgba( (string) $color, $args['alpha'] ) );
						}
					}
				}

				// Semi-transparent opacity value for replacement has to be the last one!
				$color_replace[ 'var(--wp--custom--opacity--semitransparent)' ] = $semitransparent;


		// Processing

			/**
			 * Filters array of gradient color replacements.
			 *
			 * @since  2.0.0
			 *
			 * @param  array $color_replace
			 */
			$color_replace = (array) apply_filters( 'zooey/editor/gradients/replace', $color_replace );

			foreach ( $data['settings']['color'][ self::$key ]['theme'] as $key => $args ) {
				$data['settings']['color'][ self::$key ]['theme'][ $key ]['gradient'] = str_replace(
					array_keys( $color_replace ),
					array_values( $color_replace ),
					$args['gradient']
				);
			}

			$data = array(
				'version'  => $data['version'],
				'settings' => array(
					'color' => array(
						self::$key => $data['settings']['color'][ self::$key ]['theme'],
					),
				),
			);

			Cache::set( $cahe_key, $data );


		// Output

			return $theme_json->update_with( $data );

	} // /replace

	/**
	 * Gets setup array for different gradient types.
	 *
	 * Setup explanation:
	 * - `COLORSLUG` will be replaced with actual color slug.
	 * - `%s` in name sting will be replaced with actual color name.
	 * - Using CSS variables is recommended so the gradients automatically
	 *   adapt even in Customizer. (Otherwise it is not needed.)
	 * - In block editor only, CSS variables will be replaced with
	 *   actual values (based on theme mods and auto-generated colors).
	 *
	 * @since  2.0.0
	 *
	 * @return  array
	 */
	public static function get_types(): array {

		// Output

			/**
			 * Filters gradient types array.
			 *
			 * @since  2.0.0
			 *
			 * @param  array $gradient_types
			 */
			return (array) apply_filters( 'zooey/editor/gradients/get_types', array(

				'backdrop-blur-COLORSLUG' => array(
					'name'     => esc_html_x( '%s: For backdrop blur', '%s: Placeholder for color name.', 'zooey' ),
					'gradient' => 'linear-gradient( var(--wp--preset--color--COLORSLUG-semitransparent), var(--wp--preset--color--COLORSLUG-semitransparent) )',
				),

				'COLORSLUG-cut-transparent-h' => array(
					'name'     => esc_html_x( '%s: Color cut to transparent, horizontally', '%s: Placeholder for color name.', 'zooey' ),
					'gradient' => 'linear-gradient( to right, var(--wp--preset--color--COLORSLUG) var(--theme--css--gradient-stop--hard), transparent var(--theme--css--gradient-stop--hard) )',
				),
				'transparent-cut-COLORSLUG-h' => array(
					'name'     => esc_html_x( '%s: Transparent cut to color, horizontally', '%s: Placeholder for color name.', 'zooey' ),
					'gradient' => 'linear-gradient( to left, var(--wp--preset--color--COLORSLUG) var(--theme--css--gradient-stop--hard), transparent var(--theme--css--gradient-stop--hard) )',
				),

				'COLORSLUG-cut-transparent-v' => array(
					'name'     => esc_html_x( '%s: Color cut to transparent, vertically', '%s: Placeholder for color name.', 'zooey' ),
					'gradient' => 'linear-gradient( to bottom, var(--wp--preset--color--COLORSLUG) var(--theme--css--gradient-stop--hard), transparent var(--theme--css--gradient-stop--hard) )',
				),
				'transparent-cut-COLORSLUG-v' => array(
					'name'     => esc_html_x( '%s: Transparent cut to color, vertically', '%s: Placeholder for color name.', 'zooey' ),
					'gradient' => 'linear-gradient( to top, var(--wp--preset--color--COLORSLUG) var(--theme--css--gradient-stop--hard), transparent var(--theme--css--gradient-stop--hard) )',
				),

				'COLORSLUG-to-transparent-v' => array(
					'name'     => esc_html_x( '%s: Color to transparent, vertically', '%s: Placeholder for color name.', 'zooey' ),
					'gradient' => 'linear-gradient( to bottom, var(--wp--preset--color--COLORSLUG) var(--theme--css--gradient-stop--soft), transparent 100% )',
				),
				'transparent-to-COLORSLUG-v' => array(
					'name'     => esc_html_x( '%s: Transparent to color, vertically', '%s: Placeholder for color name.', 'zooey' ),
					'gradient' => 'linear-gradient( to top, var(--wp--preset--color--COLORSLUG) var(--theme--css--gradient-stop--soft), transparent 100% )',
				),
			) );

	} // /get_types

	/**
	 * Gets setup array for generating automatic gradients.
	 *
	 * Setup explanation:
	 * - Array key should be a color slug. There are several keywords (case sensitive)
	 * you can use instead:
	 *   - `ALL` is keyword for all colors. These gradients will be applied
	 *     on all colors.
	 *   - `ACCENT` is keyword for Colors::get_slugs_accent() colors. If you
	 *     need to target modifications, use `accent-mixed`, for example.
	 *
	 * @since  2.0.0
	 *
	 * @return  array
	 */
	public static function get_args(): array {

		// Output

			/**
			 * Filters setup array for generating automatic gradients.
			 *
			 * @since  2.0.0
			 *
			 * @param  array $gradient_args
			 */
			return (array) apply_filters( 'zooey/editor/gradients/get_args', array(

				'ACCENT' => array(
					'backdrop-blur-COLORSLUG',
				),

				'ALL' => array(
					'COLORSLUG-cut-transparent-h', 'transparent-cut-COLORSLUG-h',
					'COLORSLUG-cut-transparent-v', 'transparent-cut-COLORSLUG-v',
					'COLORSLUG-to-transparent-v',  'transparent-to-COLORSLUG-v',
				),
			) );

	} // /get_args

}
