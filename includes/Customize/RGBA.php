<?php
/**
 * Theme options RGBA setup component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

namespace WebManDesign\Zooey\Customize;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class RGBA implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'zooey/customize/options/get', __CLASS__ . '::customize_preview', 15 );

				add_filter( 'zooey/customize/rgba/get_alphas', __CLASS__ . '::alphas' );

				add_filter( 'zooey/customize/css_variables/get_array/partial',                    __CLASS__ . '::css_variable', 10, 3 );
				add_filter( 'zooey/customize/css_variables/get_array_from_global_styles/partial', __CLASS__ . '::css_variable', 10, 4 );

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
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  array $alphas
	 *
	 * @return  array
	 */
	public static function alphas( array $alphas ): array {

		// Output

			return array(

				/**
				 * Base color border setup is required for
				 * @see  WebManDesign\Zooey\Customize\CSS_Variables::get_array_from_global_styles()
				 *
				 * For additional `color_base` setup
				 * @see  WebManDesign\Zooey\Customize\Styles::get_css_variables()
				 *
				 * @see  customize-preview.js
				 * 'background_color' => array( self::get_alfa_args_border( 'base' ) ),
				 */
				'color_base' => array(
					self::get_alfa_args_border( 'base' ),
				),

				'color_base_alt' => array(
					self::get_alfa_args_border( 'base-alt' ),
				),

				'color_contrast' => array(
					self::get_alfa_args_border( 'contrast' ),
				),

				'color_contrast_alt' => array(
					self::get_alfa_args_border( 'contrast-alt' ),
				),

				'color_primary' => array(
					self::get_alfa_args_border( 'primary' ),
					self::get_alfa_args_semitransparent( 'primary' ),
				),

					'color_primary_mixed' => array(
						self::get_alfa_args_border( 'primary-mixed' ),
					),

				'color_secondary' => array(
					self::get_alfa_args_border( 'secondary' ),
					self::get_alfa_args_semitransparent( 'secondary' ),
				),

					'color_secondary_mixed' => array(
						self::get_alfa_args_border( 'secondary-mixed' ),
					),
			);

	} // /alphas

	/**
	 * Customize preview RGBA colors.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  array $options
	 *
	 * @return  array
	 */
	public static function customize_preview( array $options ): array {

		// Variables

			$alphas = self::get_alphas();

			// Overriding WP global styles.
			$css_selector_root = CSS_Variables::get_root(); // Reference: CSS selector root.


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
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  array  $css_vars
	 * @param  array  $option
	 * @param  string $value
	 * @param  string $scope
	 *
	 * @return  array
	 */
	public static function css_variable( array $css_vars = array(), array $option = array(), string $value = '', string $scope = 'theme' ): array {

		// Variables

			$alphas = self::get_alphas();


		// Processing

			if (
				! isset( $option['id'] )
				&& isset( $option['slug'] )
			) {

				$option['id'] = 'color_' . str_replace( '-', '_', $option['slug'] );
			}

			if ( isset( $alphas[ $option['id'] ] ) ) {

				foreach ( $alphas[ $option['id'] ] as $args ) {
					$css_vars[ $args['css_var_name'] ] = esc_attr( Colors::hex_to_rgba( (string) $value, $args['alpha'] ) );
				}
			}

			// Default WordPress color palette has been modified,
			// so we need to provide border CSS variable for the colors.
			if ( 'default' === $scope ) {

				$args = self::get_alfa_args_border( $option['slug'] );

				$css_vars[ $args['css_var_name'] ] = esc_attr( Colors::hex_to_rgba( (string) $value, $args['alpha'] ) );
			}


		// Output

			return (array) $css_vars;

	} // /css_variable

	/**
	 * Get border CSS variable setup args.
	 *
	 * @since  1.1.0
	 *
	 * @param  string $slug  Color slug used in border CSS variable name.
	 *
	 * @return  array
	 */
	public static function get_alfa_args_border( string $slug ): array {

		// Output

			return array(
				'css_var_name' => '--wp--preset--color--' . $slug . '--border',
				'alpha'        => 'var(--wp--custom--opacity--border)',
			);

	} // /get_alfa_args_border

	/**
	 * Get semitransparent CSS variable setup args.
	 *
	 * @since  1.1.0
	 *
	 * @param  string $slug  Color slug used in semitransparent CSS variable name.
	 *
	 * @return  array
	 */
	public static function get_alfa_args_semitransparent( string $slug ): array {

		// Output

			return array(
				'css_var_name' => '--wp--preset--color--' . $slug . '-semitransparent',
				'alpha'        => 'var(--wp--custom--opacity--semitransparent)',
			);

	} // /get_alfa_args_semitransparent

}
