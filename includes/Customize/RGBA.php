<?php
/**
 * Theme options RGBA setup component.
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

class RGBA implements Component_Interface {

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

				add_filter( 'zooey/customize/options/get', __CLASS__ . '::customize_preview', 15 );

				add_filter( 'zooey/customize/rgba/get_alphas', __CLASS__ . '::alphas' );

				add_filter( 'zooey/customize/css_variables/get_array/partial',                    __CLASS__ . '::css_variable', 10, 3 );
				add_filter( 'zooey/customize/css_variables/get_array_from_global_styles/partial', __CLASS__ . '::css_variable', 10, 3 );

	} // /init

	/**
	 * Get alpha values (%) for CSS rgba() colors.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_alphas(): array {

		// Output

			/**
			 * Sets an alpha value (%) for CSS rgba() color of a specific theme options.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $alphas  Array of theme option id and alpha value in percent pairs.
			 */
			return (array) apply_filters( 'zooey/customize/rgba/get_alphas', array() );

	} // /get_alphas

	/**
	 * Sets alpha values (%) for CSS rgba() colors.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $alphas
	 *
	 * @return  array
	 */
	public static function alphas( array $alphas ): array {

		// Variables

			$var_prefix = '--wp--preset--color--';
			$var_suffix = '--border';
			$alpha      = 'var(--wp--custom--opacity--border)';


		// Output

			return array(

				'color_base_alt' =>  array(
					array(
						'css_var_name' => $var_prefix . 'base-alt' . $var_suffix,
						'alpha'        => $alpha,
					),
				),

				'color_contrast' =>  array(
					array(
						'css_var_name' => $var_prefix . 'contrast' . $var_suffix,
						'alpha'        => $alpha,
					),
				),

				'color_contrast_alt' =>  array(
					array(
						'css_var_name' => $var_prefix . 'contrast-alt' . $var_suffix,
						'alpha'        => $alpha,
					),
				),

				'color_primary' => array(
					array(
						'css_var_name' => $var_prefix . 'primary' . $var_suffix,
						'alpha'        => $alpha,
					),
					array(
						'css_var_name' => $var_prefix . 'primary-semitransparent',
						'alpha'        => 'var(--wp--custom--opacity--semitransparent)',
					),
				),

				'color_secondary' => array(
					array(
						'css_var_name' => $var_prefix . 'secondary' . $var_suffix,
						'alpha'        => $alpha,
					),
					array(
						'css_var_name' => $var_prefix . 'secondary-semitransparent',
						'alpha'        => 'var(--wp--custom--opacity--semitransparent)',
					),
				),

				// @see  customize-preview.js
				// 'background_color' => array(
				// 	array(
				// 		'css_var_name' => $var_prefix . 'base' . $var_suffix,
				// 		'alpha'        => $alpha,
				// 	),
				// ),
			);

	} // /alphas

	/**
	 * Customize preview RGBA colors.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $options
	 *
	 * @return  array
	 */
	public static function customize_preview( array $options ): array {

		// Variables

			$alphas = self::get_alphas();

			// To override WP global styles it is better to use `body` tag.
			$css_selector_root = 'body';


		// Processing

			foreach ( $options as $key => $option ) {
				if ( isset( $option['css_var'], $alphas[ $option['id'] ] ) ) {

					foreach ( $alphas[ $option['id'] ] as $args ) {

						$alpha = $args['alpha'];
						if ( is_integer( $alpha ) ) {
							$alpha = (float) ( absint( $alpha ) / 100 );
						}

						$options[ $key ]['preview_js']['css'][ $css_selector_root ][] = array(
							'property'         => $args['css_var_name'],
							'prefix'           => 'rgba(',
							'suffix'           => ',' . $alpha . ')',
							'process_callback' => 'zooey.Customize.hexToRgb',
						);
					}
				}
			}


		// Output

			return (array) $options;

	} // /customize_preview

	/**
	 * Adding RGBA CSS variables.
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

		// Variables

			$alphas = self::get_alphas();


		// Processing

			if ( stripos( current_filter(), '_from_global_styles' ) ) {
				$option['id'] = 'color_' . str_replace( '-', '_', $option['slug'] );
			}

			if ( isset( $option['id'], $alphas[ $option['id'] ] ) ) {

				foreach ( $alphas[ $option['id'] ] as $args ) {
					$css_vars[ $args['css_var_name'] ] = esc_attr( Colors::hex_to_rgba( (string) $value, $args['alpha'] ) );
				}
			}


		// Output

			return (array) $css_vars;

	} // /css_variable

}
