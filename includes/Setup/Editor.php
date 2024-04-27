<?php
/**
 * Block editor setup.
 *
 * It is very unfortunate, but WordPress does not recognize
 * colors set as CSS variables in `theme.json`, so we need
 * to transform them to actual CSS color values here.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Setup;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Colors;
use WebManDesign\Zooey\Customize\Mod;
use WP_Theme_JSON_Resolver;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Editor implements Component_Interface {

	/**
	 * Color theme options used for gradients.
	 *
	 * @see  WebManDesign\Zooey\Customize\Options::set()
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     array
	 */
	public static $color_options_special = array(
		'color_base',
		'color_primary',
		'color_primary_semitransparent',
		'color_primary_mixed',
		'color_secondary',
		'color_secondary_semitransparent',
		'color_secondary_mixed',
	);

	/**
	 * User JSON data soft cache.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     null|array
	 */
	public static $json_user = null;

	/**
	 * User font families soft cache.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     null|array
	 */
	public static $font_families = null;

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

				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::child_theme_fix', 0 );

				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::theme_json' );
				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::duotones' );

	} // /init

	/**
	 * Fixing `theme.json` data when using a child theme.
	 *
	 * Makes sure the parent theme `theme.json` data are also loaded.
	 *
	 * @link  https://github.com/WordPress/gutenberg/issues/45811#issuecomment-1319599563
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Theme_JSON_Data $theme_json
	 *
	 * @return  WP_Theme_JSON_Data
	 */
	public static function child_theme_fix( $theme_json ) {

		// Requirements check

			if ( ! is_child_theme() ) {
				return $theme_json;
			}


		// Output

			if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'theme.json' ) ) {

				return $theme_json->update_with(
					array_replace_recursive(
						wp_json_file_decode(
							trailingslashit( get_template_directory() ) . 'theme.json',
							array( 'associative' => true )
						),
						wp_json_file_decode(
							trailingslashit( get_stylesheet_directory() ) . 'theme.json',
							array( 'associative' => true )
						)
					)
				);
			} else {

				return $theme_json->update_with(
					wp_json_file_decode(
						trailingslashit( get_template_directory() ) . 'theme.json',
						array( 'associative' => true )
					)
				);
			}

	} // /child_theme_fix

	/**
	 * Modify `theme.json` options with customizer/user option values.
	 *
	 * Only useful in admin area as it deals with:
	 * - toggles WordPress native palettes display,
	 * - replaces color (and other) CSS variables with real values
	 *   for correct block editor option control rendering.
	 *
	 * IMPORTANT!:
	 * Do not use PHP variable hints for method attribute and return
	 * as depending on whether Gutenberg plugin is active,
	 * the WP_Theme_JSON_Data can also be WP_Theme_JSON_Data_Gutenberg.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Theme_JSON_Data $theme_json
	 *
	 * @return  WP_Theme_JSON_Data
	 */
	public static function theme_json( $theme_json ) {

		// Requirements check

			if ( ! is_admin() ) {
				return $theme_json;
			}


		// Variables

			$data = $theme_json->get_data();

			/**
			 * This is a workaround for Site Editor issue.
			 * @link  https://github.com/WordPress/gutenberg/issues/56920
			 */
			if ( is_null( self::$json_user ) ) {
				self::$json_user = WP_Theme_JSON_Resolver::get_user_data_from_wp_global_styles( get_stylesheet() );
				self::$json_user = ( isset( self::$json_user['post_content'] ) ) ? ( json_decode( self::$json_user['post_content'], true ) ) : ( array() );
			}


		// Processing

			// Toggle default WordPress palette and gradients?
			$data['settings']['color']['defaultPalette']   = (bool) Mod::get( 'enable_wp_palette' );
			$data['settings']['color']['defaultGradients'] = (bool) Mod::get( 'enable_wp_gradients' );
			$data['settings']['color']['defaultDuotone']   = (bool) Mod::get( 'enable_wp_duotone' );

			// Replacing CSS variables for color palette.
			if ( ! empty( $data['settings']['color']['palette']['theme'] ) ) {
				foreach ( $data['settings']['color']['palette']['theme'] as $key => $args ) {

					$option  = 'color_' . str_replace( '-', '_', $args['slug'] );
					$css_var = 'var(--theme--mod--' . $option . ')';

					if ( 'color_base' === $option ) {
						$theme_mod = maybe_hash_hex_color( get_background_color() );
					} else {
						$theme_mod = maybe_hash_hex_color( Mod::get( $option ) );
					}
					if ( empty( $theme_mod ) ) {
						$theme_mod = 'transparent';
					}

					$data['settings']['color']['palette']['theme'][ $key ]['color'] = str_replace(
						$css_var,
						$theme_mod,
						$args['color']
					);
				}
			}

			// First get user JSON colors if we have some.
			if ( isset( self::$json_user['settings']['color']['palette']['theme'] ) ) {
				foreach ( self::$json_user['settings']['color']['palette']['theme'] as $args ) {
					$user_colors[ 'color_' . str_replace( '-', '_', $args['slug'] ) ] = $args['color'];
				}
			} else {
				$user_colors = array();
			}

			// Replacements array.
			$color_replace = array(
				// Gradient stop is configurable via customizer.
				'var(--theme--css--gradient-stop--hard)' => absint( Mod::get( 'gradient_stop_hard' ) ) . '%',
				'var(--theme--css--gradient-stop--soft)' => absint( Mod::get( 'gradient_stop_soft' ) ) . '%',
			);

			// Setting semi-transparent opacity value.
			// Though, we need to add this to the end of color replacements array - see below.
			$semitransparent = 1;
			if ( ! empty( $data['settings']['custom']['opacity']['semitransparent'] ) ) {
				$semitransparent = $data['settings']['custom']['opacity']['semitransparent'];
			}

			// Theme option colors.
			foreach ( self::$color_options_special as $option ) {

				if ( stripos( $option, '_semitransparent' ) ) {

					$key = str_replace( '_semitransparent', '', $option );

					$value = $user_colors[ $key ] ?? Mod::get( $key );
					$value = maybe_hash_hex_color( $value );
					$value = Colors::hex_to_rgba( $value, 'var(--wp--custom--opacity--semitransparent)' );

				} elseif ( 'color_base' === $option ) {

					$value = $user_colors[ $option ] ?? get_background_color();
					$value = maybe_hash_hex_color( $value );

				} else {

					$value = $user_colors[ $option ] ?? Mod::get( $option );
					$value = maybe_hash_hex_color( $value );
				}

				if ( empty( $value ) ) {
					$value = 'transparent';
				}

				$wp_slug = _wp_to_kebab_case( str_replace( 'color_', '', $option ) );

				/**
				 * Yes, this is correct: gradients have to use WP CSS variables,
				 * not the theme CSS ones (the `--theme--mod--color` prefix).
				 *
				 * Making the theme a hybrid one requires using both CSS variable
				 * prefixes, but the theme ones should be only used for defining
				 * color in `theme.json`. And then we have to use those WP generated
				 * CSS variables everywhere we style colors, including gradients.
				 */
				$color_replace[ 'var(--wp--preset--color--' . $wp_slug . ')' ] = $value;
			}

			// Adding semi-transparent opacity value for replacement at last.
			$color_replace[ 'var(--wp--custom--opacity--semitransparent)' ] = $semitransparent;

			/**
			 * Filters array of gradient color replacements.
			 *
			 * @since  1.0.0
			 *
			 * @param  array  $color_replace
			 */
			$color_replace = (array) apply_filters( 'zooey/setup/editor/color_replace/gradients', $color_replace );

			// Replacing CSS variables for gradients.
			if ( ! empty( $data['settings']['color']['gradients']['theme'] ) ) {
				foreach ( $data['settings']['color']['gradients']['theme'] as $key => $args ) {
					$data['settings']['color']['gradients']['theme'][ $key ]['gradient'] = str_replace(
						array_keys( $color_replace ),
						array_values( $color_replace ),
						$args['gradient']
					);
				}
			}


		// Output

			return $theme_json->update_with( $data );

	} // /theme_json

	/**
	 * Modify `theme.json` duotone options with customizer/user option values.
	 *
	 * Duotone values need to be actual hex color codes,
	 * not CSS variables. This is required also for front-end.
	 *
	 * That's why we don't use CSS variables in `theme.json` for
	 * setting up duotone palette - WordPress would throw a PHP error.
	 *
	 * We use these color aliases instead of CSS variables:
	 * - #000010 = Primary,
	 * - #00001f = Primary mixed,
	 * - #000020 = Secondary,
	 * - #00002f = Secondary mixed.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Theme_JSON_Data $theme_json
	 *
	 * @return  WP_Theme_JSON_Data
	 */
	public static function duotones( $theme_json ) {

		// Variables

			$data = $theme_json->get_data();

			// No need to continue if we have no theme defined duotone presets.
			if ( empty( $data['settings']['color']['duotone']['theme'] ) ) {
				return $theme_json;
			}

			// This is described in `self::theme_json()`.
			if ( is_null( self::$json_user ) ) {
				self::$json_user = WP_Theme_JSON_Resolver::get_user_data_from_wp_global_styles( get_stylesheet() );
				self::$json_user = ( isset( self::$json_user['post_content'] ) ) ? ( json_decode( self::$json_user['post_content'], true ) ) : ( array() );
			}


		// Processing

			// First get user JSON colors if we have some.
			if ( isset( self::$json_user['settings']['color']['palette']['theme'] ) ) {
				foreach ( self::$json_user['settings']['color']['palette']['theme'] as $args ) {
					$user_colors[ 'color_' . str_replace( '-', '_', $args['slug'] ) ] = $args['color'];
				}
			} else {
				$user_colors = array();
			}

			// Replacements array.
			$color_replace = array_map( 'maybe_hash_hex_color', array(
				'#000010' => $user_colors['color_primary']         ?? Mod::get( 'color_primary' ),
				'#00001f' => $user_colors['color_primary_mixed']   ?? Mod::get( 'color_primary_mixed' ),
				'#000020' => $user_colors['color_secondary']       ?? Mod::get( 'color_secondary' ),
				'#00002f' => $user_colors['color_secondary_mixed'] ?? Mod::get( 'color_secondary_mixed' ),
			) );

			/**
			 * Filters array of duotone color replacements.
			 *
			 * @since  1.0.0
			 *
			 * @param  array  $color_replace
			 */
			$color_replace = (array) apply_filters( 'zooey/setup/editor/color_replace/duotone', $color_replace );

			// Replacing CSS variables for duotones.
			foreach ( $data['settings']['color']['duotone']['theme'] as $key => $args ) {
				foreach ( $args['colors'] as $color_key => $color_value ) {
					$data['settings']['color']['duotone']['theme'][ $key ]['colors'][ $color_key ] = str_replace(
						array_keys( $color_replace ),
						array_values( $color_replace ),
						$color_value
					);
				}
			}


		// Output

			return $theme_json->update_with( $data );

	} // /duotones

	/**
	 * Get user defined font families.
	 *
	 * IMPORTANT:
	 * Do not use this in `Customize\Options::get/set()` to prevent infinite loop!
	 * See `Customize\Options::init()` for more info.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_user_font_families(): array {

		// Processing

			if ( is_null( self::$font_families ) ) {

				$fonts_theme = WP_Theme_JSON_Resolver::get_theme_data()->get_data();
				$fonts_theme = $fonts_theme['settings']['typography']['fontFamilies'] ?? array();

				$fonts_user = WP_Theme_JSON_Resolver::get_user_data()->get_data();
				$fonts_user = $fonts_user['settings']['typography']['fontFamilies'] ?? array();

				self::$font_families = array_filter( array_unique(
					array_map( function( $font ) {

						$theme_slugs = array(
							'global',
							'supplemental',
							'alternative',
							'monospace',
						);

						if ( in_array( $font['slug'], $theme_slugs ) ) {
							return false;
						} else {
							return $font['fontFamily'];
						}
					}, array_merge( $fonts_theme, $fonts_user ) )
				) );
			}


		// Output

			return (array) self::$font_families;

	} // /get_user_font_families

}
