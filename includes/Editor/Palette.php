<?php
/**
 * Theme JSON color palette setup component.
 *
 * It is very unfortunate, but WordPress does not recognize
 * colors set as CSS variables in `theme.json`, so we need
 * to transform them to actual CSS color values here.
 *
 * @package    Ileana
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    2.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Ileana\Editor;

use WebManDesign\Ileana\Component_Interface;
use WebManDesign\Ileana\Customize\Mod;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Palette implements Component_Interface {

	/**
	 * Theme JSON `settings.color` key.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     string
	 */
	public static $key = 'palette';

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

				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::replace', 20 );

	} // /init

	/**
	 * Replaces `var(--theme-mod)` keyword in color palette for actual color value.
	 *
	 * We have to use CSS variable ("var(--theme-mod)") for compatibility
	 * with Colors::get_palette() code.
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


		// Processing

			foreach ( $data['settings']['color'][ self::$key ]['theme'] as $key => $args ) {

				// Get color value from theme mods based on the color slug.
				if ( 'base' === $args['slug'] ) {
					$theme_mod = get_background_color();
				} else {
					$theme_mod = Mod::get( 'color_' . str_replace( '-', '_', $args['slug'] ) );
				}

				$data['settings']['color'][ self::$key ]['theme'][ $key ]['color'] = str_replace(
					'var(--theme-mod)',
					maybe_hash_hex_color( $theme_mod ),
					$args['color']
				);

				Component::$color_names[ $args['slug'] ] = $data['settings']['color'][ self::$key ]['theme'][ $key ]['name'];
			}

			$data = array(
				'version'  => $data['version'],
				'settings' => array(
					'color' => array(
						self::$key => $data['settings']['color'][ self::$key ]['theme'],
					),
				),
			);

			Cache::set( self::$key, $data );


		// Output

			return $theme_json->update_with( $data );

	} // /replace

}
