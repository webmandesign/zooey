<?php
/**
 * Theme JSON and block editor setup component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey\Editor;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Colors;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Setup\Site_Editor;
use WebManDesign\Zooey\Tool\Get;
use WP_Theme_JSON_Resolver;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Color palette soft cache.
	 *
	 * We can not use Colors::get_palette() here as it would produce
	 * infinite loop.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     array
	 */
	public static $color_palette = array();

	/**
	 * Color palette names soft cache.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     array
	 */
	public static $color_names = array();

	/**
	 * User font families soft cache.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     null|array
	 */
	public static $font_families = null;

	/**
	 * Check if site background is set via Site Editor.
	 *
	 * @since   2.0.1
	 * @access  public
	 * @var     null|bool
	 */
	public static $has_site_background = null;

	/**
	 * Soft cache for merged/user global JSON settings and styles.
	 *
	 * @since   2.0.1
	 * @access  private
	 * @var     null|array
	 */
	private static $global_json = null;

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			Assets::init();
			Cache::init();
			Classic::init();
			Palette::init();
			Gradients::init();
			Duotone::init();

			// Actions

				add_action( 'after_setup_theme', __CLASS__ . '::set_color_palette', 99 );

			// Filters

				/**
				 * We have to use `wp_theme_json_data_theme` hook here due to WordPress issue.
				 * @link  @link  https://github.com/WordPress/gutenberg/issues/56920
				 */
				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::theme_json' );
				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::child_theme_fix', 0 );

	} // /init

	/**
	 * Set color palette soft cache.
	 *
	 * This needs to be hooked somewhere where:
	 * - it does not triggers `_load_textdomain_just_in_time` issue (during theme activation),
	 * - it makes the palette ready for `wp_theme_json_data_theme/user` hooks,
	 * - custom background has been already set (even via theme code).
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function set_color_palette() {

		// Processing

			/**
			 * This gets the (user customized) theme colors.
			 * Have to be outside `wp_theme_json_data_theme/user`
			 * hooks to prevent infinite loop.
			 */
			self::$color_palette = Colors::get_palette();
			self::$color_palette = self::$color_palette['theme']; // `maybe_hash_hex_color` already applied.

	} // /set_color_palette

	/**
	 * Modify `theme.json` options with customizer/user option values.
	 *
	 * Only useful in admin area as it deals with:
	 * - toggles WordPress native palettes display.
	 *
	 * IMPORTANT!:
	 * Do not use PHP variable hints for method attribute and return
	 * as depending on whether Gutenberg plugin is active,
	 * the WP_Theme_JSON_Data can also be WP_Theme_JSON_Data_Gutenberg.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
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


		// Processing

			$data = array(
				'version'  => $data['version'],
				'settings' => array(
					'color' => array(
						// Toggle default WordPress color options.
						'defaultPalette'   => (bool) Mod::get( 'enable_wp_palette' ),
						'defaultGradients' => (bool) Mod::get( 'enable_wp_gradients' ),
						'defaultDuotone'   => (bool) Mod::get( 'enable_wp_duotone' ),
					),
				),
			);


		// Output

			return $theme_json->update_with( $data );

	} // /theme_json

	/**
	 * Fixing `theme.json` data when using a child theme.
	 *
	 * Makes sure the parent theme `theme.json` data are also loaded.
	 *
	 * @link  https://github.com/WordPress/gutenberg/issues/45811#issuecomment-1319599563
	 *
	 * (As of WordPress 6.9, this is still needed.)
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
	 * Check if user sets site background in Site Editor.
	 *
	 * IMPORTANT:
	 * We have to use `WP_Theme_JSON_Resolver` here instead of `self::get_global_style()` as this
	 * method is called before `init.10` hook in `Setup\Component::after_setup_theme()`.
	 *
	 * @since  2.0.1
	 *
	 * @return  bool
	 */
	public static function has_site_background(): bool {

		// Requirements check

			if ( ! Site_Editor::is_enabled() ) {
				return false;
			}


		// Processing

			if ( null === self::$has_site_background ) {

				/**
				 * IMPORTANT:
				 * Do not save this raw merged data in `self::$global_json`!
				 * This (`has_site_background()`) method is being called too early for
				 * all merged JSON data to be soft cached for `self::get_global_style()`.
				 */
				$data = WP_Theme_JSON_Resolver::get_merged_data()->get_raw_data();

				self::$has_site_background = ! empty( $data['styles']['background']['backgroundImage']['url'] );
			}


		// Output

			return (bool) self::$has_site_background;

	} // /has_site_background

	/**
	 * Get the settings from merged core, theme, and user global JSON data.
	 *
	 * IMPORTANT:
	 * Call this after `init.10` action hook!
	 * This is due to using `WP_Theme_JSON_Resolver::get_merged_data()->get_data()`, and
	 * before then the theme colors, duotones, and auto gradients are NOT generated yet.
	 * See "IMPORTANT" below for explanation.
	 * @link  https://developer.wordpress.org/apis/hooks/action-reference/#actions-run-during-a-typical-request
	 *
	 * @see   wp_get_global_settings()
	 * @link  https://developer.wordpress.org/reference/functions/wp_get_global_settings/
	 *
	 * @since  2.0.1
	 *
	 * @param  string $path  JSON (`theme.json`) path to the setting (such as `settings.color.palette`).
	 *
	 * @return  mixed  Default: NULL
	 */
	public static function get_global_style( string $path ) {

		// Requirements check

			if ( empty( $path ) ) {
				return null;
			}


		// Variables

			if ( null === self::$global_json ) {
				/**
				 * IMPORTANT:
				 * This obtains user and theme settings merged into one
				 * without origin separation (which means the theme values
				 * are overwritten with user ones).
				 *
				 * However, this is only available on `init` action hook
				 * with min priority of `10`!
				 *
				 * By then the theme color palette, duotones, and automatically
				 * generated gradients are already available.
				 *
				 * @link  https://developer.wordpress.org/apis/hooks/action-reference/#actions-run-during-a-typical-request
				 */
				self::$global_json = array(
					'merged' => WP_Theme_JSON_Resolver::get_merged_data()->get_data(),
					'user'   => WP_Theme_JSON_Resolver::get_user_data()->get_data(),
				);
			}


		// Processing

			if ( 0 === stripos( $path, 'USER.' ) ) {
				$output = Get::deep( self::$global_json['user'], substr( $path, 5 ), null );
			} else {
				$output = Get::deep( self::$global_json['merged'], $path, null );
			}


		// Output

			return $output;

	} // /get_global

	/**
	 * Get user defined font families.
	 *
	 * IMPORTANT:
	 * Do not use this in `Customize\Options::get/set()` to prevent infinite loop!
	 * See `Customize\Options::init()` for more info.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @param  bool $get_values  Whether to get actual values for theme slug font families.
	 *                           If false (default), only custom font families list is returned.
	 *                           If true, the list of `'theme_slug' => 'value'` pairs is returned.
	 *
	 * @return  array
	 */
	public static function get_user_font_families( bool $get_values = false ): array {

		// Variables

			$output      = array();
			$theme_slugs = array(
				'global',
				'supplemental',
				'alternative',
				'monospace',
				'handwritten',
			);


		// Processing

			if ( null === self::$font_families ) {

				$fonts = (array) self::get_global_style( 'settings.typography.fontFamilies' );

				// Get only custom font families, not the ones predefined by the theme.
				self::$font_families = array_filter( array_unique(
					array_map(
						function( $font ) use ( $theme_slugs ) {
							if ( in_array( $font['slug'], $theme_slugs ) ) {
								return false;
							} else {
								return $font['fontFamily'];
							}
						},
						$fonts
					)
				) );

				// Keep the source data as reference.
				self::$font_families['data'] = $fonts;
			}

			if ( $get_values ) {

				foreach ( self::$font_families['data'] as $args ) {
					if ( in_array( $args['slug'], $theme_slugs ) ) {
						$output[ $args['slug'] ] = $args['fontFamily'];
					}
				}

				// Remove non-customizer options.
				unset(
					$output['monospace'],
					$output['handwritten']
				);

			} else {

				$output = self::$font_families;

				// Remove source data.
				unset( $output['data'] );
			}


		// Output

			return (array) $output;

	} // /get_user_font_families

}
