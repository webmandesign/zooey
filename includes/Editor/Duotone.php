<?php
/**
 * Theme JSON duotone setup component.
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

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Duotone implements Component_Interface {

	/**
	 * Theme JSON `settings.color` key.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     string
	 */
	public static $key = 'duotone';

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

				add_filter( 'wp_theme_json_data_theme', __CLASS__ . '::replace', 40 );

	} // /init

	/**
	 * Set `theme.json` duotone color slugs with actual color values.
	 *
	 * Duotone values need to be actual hex color codes,
	 * not CSS variables. This is required also for front-end.
	 * That's why we don't use CSS variables in `theme.json` for
	 * setting up duotone palette - WordPress would throw a PHP error.
	 *
	 * This function allows us to use color slugs when setting up
	 * automated (unknown, user-editable palette) color values in
	 * duotone setup.
	 * When using "?" instead of color slug, the color value is
	 * calculated based on the darkness of the other color in
	 * duotone setup.
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

			/**
			 * Filters array of duotone color replacements.
			 *
			 * @since  1.0.0
			 *
			 * @param  array  $color_replace
			 */
			$color_replace = (array) apply_filters(
				'zooey/editor/duotone/replace',
				array_merge(
					Component::$color_palette,
					array(
						'?' => '',
					)
				)
			);


		// Processing

			// Need to sort color replacement array by slug descending
			// to prevent replacing only "main" in "main-modifier" slugs.
			krsort( $color_replace );

			// Replacing CSS variables for duotones.
			foreach ( $data['settings']['color'][ self::$key ]['theme'] as $key => $args ) {

				$colors = array();

				// Replace slugs for actual color hex code.
				foreach ( $args['colors'] as $color_value ) {
					$colors[] = str_replace(
						array_keys( $color_replace ),
						array_values( $color_replace ),
						$color_value
					);
				}

				// Generate the other color (the empty value) automatically based on the first color darkness.
				if ( 1 === count( array_filter( $colors ) ) ) {
					$color = implode( '', $colors );

					// Duotone colors array: [ 0:Shadows, 1:Highlights ]
					if ( Colors::is_dark( $color ) ) {
						$colors = array(
							$color,    // Shadows
							'#ffffff', // Highlights
						);
					} else {
						$colors = array(
							'#000000', // Shadows
							$color,    // Highlights
						);
					}
				}

				$data['settings']['color'][ self::$key ]['theme'][ $key ]['colors'] = $colors;
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
