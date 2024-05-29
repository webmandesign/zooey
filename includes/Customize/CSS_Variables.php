<?php
/**
 * CSS variables generator component.
 *
 * Data are being cached in transient as they are global for the website.
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
use WebManDesign\Zooey\Setup\Site_Editor;
use WP_Theme_JSON;
use WP_Theme_JSON_Gutenberg;
use WP_Theme_JSON_Resolver;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class CSS_Variables implements Component_Interface {

	/**
	 * Name of cached data transient.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $transient_cache_key = 'zooey_cache_css_vars';

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

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::enqueue_inline_scrollbar_width', ZOOEY_ENQUEUE_PRIORITY );

				add_action( 'customize_save_after',            __CLASS__ . '::transient_cache_flush' );
				add_action( 'save_post_' . 'wp_global_styles', __CLASS__ . '::transient_cache_flush' );
				add_action( 'switch_theme',                    __CLASS__ . '::transient_cache_flush' );
				add_action( 'zooey/upgrade', __CLASS__ . '::transient_cache_flush' );

	} // /init

	/**
	 * Get CSS variables from theme options as an array.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_array(): array {

		// Variables

			$is_customize_preview = is_customize_preview();

			$css_vars = (array) get_transient( self::$transient_cache_key );
			$css_vars = array_filter( $css_vars, 'trim', ARRAY_FILTER_USE_KEY );


		// Requirements check

			if (
				! empty( $css_vars )
				&& ! $is_customize_preview
			) {
				// The filter is documented below.
				return (array) apply_filters( 'zooey/customize/css_variables/get_array', $css_vars );
			}


		// Processing

			foreach ( (array) Options::get() as $option ) {

				if ( empty( $option['css_var']['name'] ) ) {
					continue;
				}

				if (
					isset( $option['active_callback'] )
					&& stripos( $option['active_callback'], 'is_site_editor_disabled' )
					&& Site_Editor::is_enabled()
				) {
					continue;
				}

				if ( isset( $option['default'] ) ) {
					$value = $option['default'];
				} else {
					$value = '';
				}

				$mod = get_theme_mod( $option['id'] );

				if (
					isset( $option['sanitize_callback'] )
					&& is_callable( $option['sanitize_callback'] )
				) {
					$mod = call_user_func( $option['sanitize_callback'], $mod, $option );
				}

				if (
					! empty( $mod )
					|| 'checkbox' === $option['type']
					|| ( 'color' === $option['type'] && '' === $mod )
				) {

					if ( 'color' === $option['type'] ) {
						$value_check = maybe_hash_hex_color( $value );
						$mod         = maybe_hash_hex_color( $mod );
					} else {
						$value_check = $value;
					}

					// No need to output CSS var if it is the same as default.
					if ( $value_check === $mod ) {
						continue;
					}

					$value = $mod;
				} else {
					// No need to output CSS var if it was not changed in customizer.
					continue;
				}

				// Empty color value fix.
				if (
					'color' === $option['type']
					&& '' === $value
				) {
					$value = 'transparent';
					$option['css_var']['value'] = '[[value]]';
				}

				// Array value to string. Just in case.
				if ( is_array( $value ) ) {
					$value = (string) implode( ',', (array) $value );
				}

				if ( is_callable( $option['css_var']['value'] ) ) {
					$value = call_user_func( $option['css_var']['value'], $value );
				} else {

					$value = str_replace(
						'[[value]]',
						$value,
						(string) $option['css_var']['value']
					);
				}

				// Do not apply `esc_attr()` as it will escape quote marks, such as in background image URL.
				$css_vars[ $option['css_var']['name'] ] = $value;

				/**
				 * Filters CSS variables output partially after each variable processing.
				 *
				 * Allows filtering the whole `$css_vars` array for each option individually.
				 * This way we can add an option related additional CSS variables.
				 *
				 * @since  1.0.0
				 *
				 * @param  string $css_vars  Array of CSS variable name and value pairs.
				 * @param  array  $option    Single theme option setup array.
				 * @param  string $value     Single CSS variable value.
				 */
				$css_vars = apply_filters( 'zooey/customize/css_variables/get_array/partial', $css_vars, $option, $value );
			}

			// Add Site Editor user global styles
			// and cache the results in transient.
			if ( ! $is_customize_preview ) {

				/**
				 * We keep both, customizer CSS vars
				 * and Site Editor user global styles
				 * CSS vars just in case as there may
				 * be a case when user edited customizer
				 * options and then enable Site Editor
				 * but not edited global styles.
				 */
				set_transient(
					self::$transient_cache_key,
					array_merge(
						(array) $css_vars,
						(array) self::get_array_from_global_styles()
					)
				);
			}


		// Output

			/**
			 * Filters CSS variables output in array.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $css_vars  Array of CSS variable name and value pairs.
			 */
			return (array) apply_filters( 'zooey/customize/css_variables/get_array', $css_vars );

	} // /get_array

	/**
	 * Get CSS variables from Site Editor user global styles as an array.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @return  array
	 */
	public static function get_array_from_global_styles(): array {

		// Requirements check

			if ( ! Site_Editor::is_enabled() ) {
				return array();
			}


		// Variables

			// Using `get_raw_data()` as we also need `black` and `white` color values from default WP palette.
			$data_user = WP_Theme_JSON_Resolver::get_user_data()->get_raw_data();
			$css_vars  = array();
			$data      = array(
				'theme'   => array(),
				'default' => array(),
			);


		// Processing

			foreach ( $data as $scope => $value ) {
				if ( ! empty( $data_user['settings']['color']['palette'][ $scope ] ) ) {
					$data[ $scope ] = (array) $data_user['settings']['color']['palette'][ $scope ];
				}
			}

			$data = array_filter( $data );

			if ( ! empty( $data ) ) {

				// Adding a helper "marker" CSS var for our information.
				$css_vars['comment:user_global_styles--start'] = 'Global Styles:';

				foreach ( $data as $scope => $palette ) {
					foreach ( $palette as $args ) {

						// Do not process custom user colors, only theme predefined ones.
						if ( 0 === stripos( $args['slug'], 'custom-' ) ) {
							continue;
						}

						$css_var = '--wp--preset--color--' . $args['slug'];
						$color   = maybe_hash_hex_color( $args['color'] );

						if ( ! empty( $color ) ) {

							// Text color and border color from text.
							if ( Colors::is_dark( $color ) ) {
								$css_vars[ $css_var . '--bg-text' ]   = 'var(--wp--preset--color--white)';
								$css_vars[ $css_var . '--bg-border' ] = 'var(--wp--preset--color--white--border)';
							} else {
								$css_vars[ $css_var . '--bg-text' ]   = 'var(--wp--preset--color--black)';
								$css_vars[ $css_var . '--bg-border' ] = 'var(--wp--preset--color--black--border)';
							}

							/**
							 * Filters CSS variables output from global styles partially after each variable processing.
							 *
							 * Allows filtering the whole `$css_vars` array for each option individually.
							 * This way we can add an option related additional CSS variables.
							 *
							 * @since    1.0.0
							 * @version  1.1.0
							 *
							 * @param  string $css_vars  Array of CSS variable name and value pairs.
							 * @param  array  $args      Global styles palette color setup array.
							 * @param  string $color     Single CSS variable value.
							 * @param  string $scope     User global styles scope being processed.
							 */
							$css_vars = apply_filters( 'zooey/customize/css_variables/get_array_from_global_styles/partial', $css_vars, $args, $color, $scope );
						}
					}
				}

				// Adding a helper closing "marker" CSS var for our information.
				$css_vars['comment:user_global_styles--end'] = '/GS.';
			}


		// Output

			return $css_vars;

	} // /get_array_from_global_styles

	/**
	 * Get CSS variables from theme options in string.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $separator  String implosion separator.
	 * @param  array  $vars       Optional. Narrow down returned variables by variable names from this parameter.
	 * @param  string $action     Optional. If $vars set, this determines the action: 'intersect' or 'difference'.
	 *
	 * @return  string
	 */
	public static function get_string( string $separator = '', array $vars = array(), string $action = 'intersect' ): string {

		// Variables

			$css_vars = (array) self::get_array();


		// Processing

			// Narrow down the variables array.
			if ( ! empty( $vars ) ) {
				if ( 'intersect' === $action ) {
					$css_vars = array_intersect_key( $css_vars, array_flip( $vars ) );
				} elseif ( 'difference' === $action ) {
					$css_vars = array_diff_key( $css_vars, array_flip( $vars ) );
				}
			}

			// CSS syntax.
			$css_vars = array_map(
				function( $variable, $value ) {

					if ( 0 === stripos( $variable, 'comment:' ) ) {
						$css = PHP_EOL . '/* ' . (string) $value . ' */' . PHP_EOL;
					} else {
						// Actual CSS code declaring a variable.
						$css = (string) $variable . ':' . (string) $value . ';';
					}

					if ( '--has-user-global-styles' === $variable ) {
						$css .= PHP_EOL;
					}

					return $css;
				},
				array_keys( $css_vars ), // $variable
				$css_vars // $value
			);

			// Produce a string.
			$css_vars = implode( (string) $separator, $css_vars );


		// Output

			/**
			 * Filters CSS variables output in string.
			 *
			 * @since  1.0.0
			 *
			 * @param  string $css_vars  String of CSS variable name and value pairs ready for CSS code output.
			 */
			return (string) apply_filters( 'zooey/customize/css_variables/get_string', trim( (string) $css_vars ) );

	} // /get_string

	/**
	 * Scrollbar width via JavaScript.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue_inline_scrollbar_width() {

		// Processing

			wp_add_inline_script(
				'zooey-scripts-footer',
				Assets\Factory::strip( "
					( function() {
						'use strict';

						function zooeyScrollbarWidth() {
							var scrollbar_width = window.innerWidth - document.documentElement.clientWidth;

							document.documentElement.style.setProperty(
								'--theme--js--scrollbar_width',
								( 40 > scrollbar_width ) ? ( scrollbar_width + 'px' ) : ( '0px' )
							);
						}

						zooeyScrollbarWidth();

						window.onresize = function() { zooeyScrollbarWidth() };
					} )();
				" )
			);

	} // /enqueue_inline_scrollbar_width

	/**
	 * Flush the transient of cached CSS variables array.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function transient_cache_flush() {

		// Processing

			delete_transient( self::$transient_cache_key );

	} // /transient_cache_flush

	/**
	 * Returns CSS variables root selector based on WP global styles.
	 *
	 * This is required due to backwards compatibility.
	 * WordPress versions older than 6.6 used `body` as root selector
	 * to set up CSS variables in WordPress global styles CSS code.
	 * All the theme options CSS variables had to be defined accordingly.
	 *
	 * @Todo:
	 * This may be removed in later WordPress version (WP6.8) so we can
	 * use just `:root` selector everywhere.
	 *
	 * @since  1.1.0
	 *
	 * @param  string $return  Either 'selector' for CSS code, or 'body_class' for PHP body class setup.
	 *
	 * @return  string
	 */
	public static function get_root( string $return = 'selector' ): string {

		// Variables

			if ( defined( 'WP_Theme_JSON_Gutenberg::ROOT_CSS_PROPERTIES_SELECTOR' ) ) {
				$wp = WP_Theme_JSON_Gutenberg::ROOT_CSS_PROPERTIES_SELECTOR;
			} elseif ( defined( 'WP_Theme_JSON::ROOT_CSS_PROPERTIES_SELECTOR' ) ) {
				$wp = WP_Theme_JSON::ROOT_CSS_PROPERTIES_SELECTOR;
			} else {
				$wp = false;
			}

			if ( ':root' === $wp ) {
				$output = array(
					'selector'   => ':root',
					'body_class' => '',
				);
			} else {
				$output = array(
					// Override WP global styles and allow user overrides. https://jsfiddle.net/3s6Lrqwo/
					'selector'   => 'html :where(.css-var-root)',
					'body_class' => 'css-var-root',
				);
			}


		// Output

			return $output[ $return ]; // Reference: CSS selector root.

	} // /get_root

}
