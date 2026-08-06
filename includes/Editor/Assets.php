<?php
/**
 * Editor assets component.
 *
 * @package    Ileana
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.4
 */

namespace WebManDesign\Ileana\Editor;

use WebManDesign\Ileana\Component_Interface;
use WebManDesign\Ileana\Assets\Factory;
use WebManDesign\Ileana\Customize\CSS_Variables;
use WebManDesign\Ileana\Customize\Styles;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Assets implements Component_Interface {

	/**
	 * Soft cache for stylesheet versioning check.
	 *
	 * @link  https://developer.wordpress.org/reference/functions/add_editor_style/#comment-5332 (section "# Local Development + SSL")
	 *
	 * @since   2.0.0
	 * @access  private
	 * @var     null|bool
	 */
	private static $versioning_allowed = null;

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.4
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme' );

				/**
				 * Make sure the first editor stylesheet
				 * is not set as WordPress automatically
				 * adds `-rtl` suffix to it, which we
				 * don't need in this theme.
				 */
				add_action( 'init', function() { add_editor_style( '' ); }, -10 );

				add_action( 'init', __CLASS__ . '::stylesheet' );

				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::ui_stylesheet_block' );
				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::scripts' );

				add_action( 'enqueue_block_assets', __CLASS__ . '::stylesheet_block' );
				add_action( 'enqueue_block_assets', __CLASS__ . '::inline_styles_block' );

			// Filters

				add_filter( 'tiny_mce_before_init', __CLASS__ . '::inline_styles_classic' );

	} // /init

	/**
	 * Theme setup.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Processing

			// Required for classic mode!
			add_theme_support( 'editor-styles' );

	} // /after_setup_theme

	/**
	 * Add main (global) editor stylesheet.
	 *
	 * This stylesheets are enqueued for both
	 * classic and block editor.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public static function stylesheet() {

		// Processing

			self::add_editor_style( 'editor.css' );

	} // /stylesheet

	/**
	 * Add block editor UI stylesheet.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public static function ui_stylesheet_block() {

		// Processing

			Factory::style_enqueue( array(
				'handle' => 'ileana-editor-ui',
				'src'    => get_theme_file_uri( 'assets/css/editor-ui.css' ),
			) );

			// Additional modifications filterable via PHP for easier switching via child theme.

				/**
				 * Filters additional block editor UI CSS code.
				 *
				 * @since    1.0.0
				 * @version  2.0.1
				 *
				 * @param  array $css
				 */
				$css = (array) apply_filters( 'ileana/assets/editor/block/ui', array() );

				if ( array_filter( $css ) ) {
					wp_add_inline_style( 'ileana-editor-ui', trim( implode( '', $css ) ) );
				}

	} // /ui_stylesheet_block

	/**
	 * Enqueues block editor scripts.
	 *
	 * @since  2.0.4
	 *
	 * @return  void
	 */
	public static function scripts() {

		// Processing

			Factory::script_enqueue( array(
				'handle' => 'ileana-block-editor',
				'src'    => get_theme_file_uri( 'assets/js/block-editor.min.js' ),
				'deps'   => array( 'react', 'wp-block-editor', 'wp-i18n', 'wp-rich-text' ),
			) );

	} // /scripts

	/**
	 * Add block editor stylesheet.
	 *
	 * We can not use `add_editor_style()` here as
	 * it does not work in Site Editor when hooked
	 * onto `enqueue_block_editor_assets` action.
	 *
	 * And we need to use `enqueue_block_editor_assets`
	 * action hook to load these stylesheets for
	 * block editor only (and not for classic editor).
	 *
	 * Plus, as the `add_editor_style()` does not work
	 * here, so WordPress will not wrap our CSS in editor
	 * container class, we need to do it ourselves by
	 * providing block editor specific stylesheet(s).
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public static function stylesheet_block() {

		// Requirements check

			// Required check for `enqueue_block_assets` hook.
			if ( ! is_admin() ) {
				return;
			}


		// Processing

			Factory::style_enqueue( array(
				/**
				 * There is some issue with this stylesheet
				 * registration. It seems WP sees the stylesheet
				 * as registered already, but can not enqueue it.
				 * So, we just need to enqueue it without registration.
				 */
				'register' => false,
				'handle'   => 'ileana-blocks-editor',
				'src'      => get_theme_file_uri( 'assets/css/blocks-editor.css' ),
			) );

	} // /stylesheet_block

	/**
	 * Add block editor inline styles.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public static function inline_styles_block() {

		// Requirements check

			// Required check for `enqueue_block_assets` hook.
			if ( ! is_admin() ) {
				return;
			}


		// Variables

			ob_start();
			_custom_background_cb();
			$custom_background = str_replace(
				'body.custom-background',
				'.editor-styles-wrapper',
				trim( strip_tags( ob_get_clean() ) )
			);


		// Processing

			wp_add_inline_style(
				'ileana-blocks-editor', // This works for both page editor and site editor.
				$custom_background
				. str_replace(
					array_unique( array( ':root', CSS_Variables::get_root() ) ), // Reference: CSS selector root.
					':root:root, .editor-styles-wrapper:not(.block-editor-iframe__body)', // Works in editor wrapped both within `div` and/or `iframe`.
					Styles::get_css_variables()
				)
				. Styles::get_css( 'editor' )
			);

	} // /inline_styles_block

	/**
	 * Enqueue inline styles for classic editor.
	 *
	 * Adds styles to the head of the TinyMCE iframe.
	 * Kudos to @Otto42 for the original solution.
	 *
	 * Can not use `esc_js()` below as it uses `_wp_specialchars()` which
	 * converts CSS safe characters into unusable string.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @param  array $mce_init  TinyMCE settings.
	 *
	 * @return  array
	 */
	public static function inline_styles_classic( array $mce_init ): array {

		// Variables

			$css = str_replace(
				array(
					'body {',
					'body{',
					CSS_Variables::get_root() . ' {',
				),
				':root{',
				implode( PHP_EOL, array(
					(string) wp_get_global_stylesheet( [ 'variables', 'styles' ] ),
					(string) Styles::get_css_variables(),
				) )
			);

			ob_start();
			wp_print_font_faces();
			_custom_background_cb();
			$css .= str_replace(
				'body.custom-background',
				'html',
				trim( strip_tags( ob_get_clean() ) )
			);

			$css .= Styles::get_css( 'editor' );


		// Processing

			if ( $css ) {

				$css = preg_replace( '/&#(x)?0*(?(1)27|39);?/i', "'", stripslashes( $css ) );
				$css = str_replace( "\r", '', $css );
				$css = str_replace( "\n", '\\n', addslashes( $css ) );

				if ( ! isset( $mce_init['content_style'] ) ) {
					$mce_init['content_style'] = $css . ' ';
				} else {
					$mce_init['content_style'] .= ' ' . $css . ' ';
				}
			}


		// Output

			return $mce_init;

	} // /inline_styles_classic

	/**
	 * Wrapper for WordPress `add_editor_style()`.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @param  string|array $stylesheets
	 *
	 * @return  void
	 */
	public static function add_editor_style( $stylesheets ) {

		// Variables

			$stylesheets = (array) $stylesheets;
			$version     = ILEANA_THEME_VERSION . '.' . (string) get_theme_mod( '__customize_timestamp', '0' );


		// Processing

			foreach ( $stylesheets as $key => $file ) {

				$file = 'assets/css/' . $file;

				/**
				 * Making sure we pass theme version to flush WP cache on theme/customizer update.
				 *
				 * This is switchable due to SSL issue in local development environment.
				 * @link  https://developer.wordpress.org/reference/functions/add_editor_style/#comment-5332 (section "# Local Development + SSL")
				 *
				 * For disabling editor stylesheet versioning and passing stylesheet as a relative URL
				 * set `define( 'ILEANA_EDITOR_STYLE_VERSIONING', false );` in a child theme/plugin.
				 *
				 * We also do the automatic check (see "TEST" below) for versioning, but still allowing
				 * using this optional `ILEANA_EDITOR_STYLE_VERSIONING` constant to force non-versioned
				 * stylesheets (and bypassing the text) for more optimized dev environment.
				 */
				if ( ILEANA_EDITOR_STYLE_VERSIONING ) {

					$file_versioned = esc_url_raw(
						add_query_arg(
							'ver',
							'v' . $version,
							get_theme_file_uri( $file )
						)
					);

					/**
					 * TEST:
					 * Automatic check if we can use versioning.
					 * (Reducing the load by using admin area only.)
					 *
					 * Check `get_block_editor_theme_styles()` for why we do this.
					 * @link  https://developer.wordpress.org/reference/functions/get_block_editor_theme_styles/
					 * @link  https://developer.wordpress.org/reference/functions/add_editor_style/#comment-5332 (section "# Local Development + SSL")
					 *
					 * Soft caching the result in local variable.
					 */
					if ( is_null( self::$versioning_allowed ) && is_admin() ) {
						self::$versioning_allowed = ! is_wp_error( wp_remote_get( $file_versioned ) );
					}

					if ( self::$versioning_allowed ) {
						$file = $file_versioned;
					}
				}

				$stylesheets[ $key ] = $file;
			}

			add_editor_style( $stylesheets );

	} // /add_editor_style

}
