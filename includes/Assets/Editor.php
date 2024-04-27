<?php
/**
 * Editor assets component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Assets;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Styles;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Editor implements Component_Interface {

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

				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme' );

				/**
				 * Make sure the first editor stylesheet
				 * is not set as WordPress automatically
				 * adds `-rtl` suffix to it, which we
				 * don't need in this theme.
				 */
				add_action( 'init', function() { add_editor_style( '' ); }, -10 );

				add_action( 'init', __CLASS__ . '::editor_stylesheet' );

				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::editor_ui_stylesheet_block' );
				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::editor_mods' );

				add_action( 'enqueue_block_assets', __CLASS__ . '::editor_stylesheet_block' );
				add_action( 'enqueue_block_assets', __CLASS__ . '::editor_inline_styles_block' );

			// Filters

				add_filter( 'tiny_mce_before_init', __CLASS__ . '::editor_inline_styles_classic' );

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
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function editor_stylesheet() {

		// Processing

			self::add_editor_style( 'editor.css' );

	} // /editor_stylesheet

	/**
	 * Add block editor UI stylesheet.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function editor_ui_stylesheet_block() {

		// Processing

			Factory::style_enqueue( array(
				'handle' => 'zooey-editor-ui',
				'src'    => get_theme_file_uri( 'assets/css/editor-ui.css' ),
			) );

			// Additional modifications filterable via PHP for easier switching via child theme.

				/**
				 * Filters additional block editor UI CSS code.
				 *
				 * @since  1.0.0
				 *
				 * @param  array $css
				 */
				$css = (array) apply_filters( 'zooey/assets/editor/block/ui', array(

					/**
					 * Removing all Styles → Colors → Palette → Gradient → Theme.
					 * These options are really not needed as the theme calculates gradient
					 * colors automatically from palette colors.
					 */
					'site-editor/styles-colors-gradients' => '.edit-site-global-styles-gradient-palette-panel > div:first-child{display:none}',

					/**
					 * Removing all Styles → Colors → Palette → Gradient → Duotone.
					 * These options are really not needed as the theme calculates duotone
					 * colors automatically from palette colors.
					 */
					'site-editor/styles-colors-duotones' => '.edit-site-global-styles-gradient-palette-panel > div:last-child{display:none}',

					/**
					 * Removing all Styles → Colors.
					 * These options are really not needed in this theme.
					 * @link  https://github.com/WordPress/gutenberg/issues/53947
					 */
					'site-editor/styles-colors-elements' => '.edit-site-global-styles-screen-colors .color-block-support-panel{display:none}',

					/**
					 * Removing "Button" from Styles → Typography.
					 */
					'site-editor/styles-typography-button' => '.edit-site-global-styles-screen-typography .components-item-group > div:last-child{display:none}',

					/**
					 * Patterns modal height fix.
					 */
					'post-editor/patterns-modal-height' => '.is-full-screen .block-editor-block-patterns-explorer__sidebar{height:calc(100% - 76px)}',
				) );

				if ( array_filter( $css ) ) {
					wp_add_inline_style( 'zooey-editor-ui', trim( implode( '', $css ) ) );
				}

	} // /editor_ui_stylesheet_block

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
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function editor_stylesheet_block() {

		// Requirements check

			// Required check for `enqueue_block_assets` hook.
			if ( ! is_admin() ) {
				return;
			}


		// Processing

			Factory::style_enqueue( array(
				/**
				 * There is some issue with this stylesheet
				 * registration. It seems WP see the stylesheet
				 * as registered already, but can not enqueue it.
				 * So, we just need to enqueue it without registration.
				 */
				'register' => false,
				'handle'   => 'zooey-blocks-editor',
				'src'      => get_theme_file_uri( 'assets/css/blocks-editor.css' ),
			) );

	} // /editor_stylesheet_block

	/**
	 * Add block editor inline styles.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function editor_inline_styles_block() {

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
				'zooey-blocks-editor', // This works for both page editor and site editor.
				$custom_background
				. str_replace(
					array( ':root', 'body' ),
					':root .editor-styles-wrapper',
					Styles::get_css_variables()
				)
			);

	} // /editor_inline_styles_block

	/**
	 * Enqueue inline styles for classic editor.
	 *
	 * Adds styles to the head of the TinyMCE iframe.
	 * Kudos to @Otto42 for the original solution.
	 *
	 * Can not use `esc_js()` below as it uses `_wp_specialchars()` which
	 * converts CSS safe characters into unusable string.
	 *
	 * @since  1.0.0
	 *
	 * @param array $mce_init TinyMCE styles.
	 *
	 * @return  array
	 */
	public static function editor_inline_styles_classic( array $mce_init ): array {

		// Variables

			$css = str_replace(
				array( 'body {', 'body{' ),
				':root{',
				(string) wp_get_global_stylesheet( [ 'variables', 'styles' ] )
				. (string) Styles::get_css_variables()
			);

			ob_start();
			_custom_background_cb();
			$css .= str_replace(
				'body.custom-background',
				'html',
				trim( strip_tags( ob_get_clean() ) )
			);


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

	} // /editor_inline_styles_classic

	/**
	 * Wrapper for WordPress `add_editor_style()`.
	 *
	 * @since  1.0.0
	 *
	 * @param  string|array $stylesheets
	 *
	 * @return  void
	 */
	public static function add_editor_style( $stylesheets ) {

		// Variables

			$stylesheets = (array) $stylesheets;


		// Processing

			// Making sure we pass theme version too.
			foreach ( $stylesheets as $key => $file ) {
				$stylesheets[ $key ] = esc_url_raw(
					add_query_arg(
						'ver',
						'v' . ZOOEY_THEME_VERSION . '.' . (string) get_theme_mod( '__customize_timestamp', '0' ),
						get_theme_file_uri( 'assets/css/' . $file )
					)
				);
			}

			add_editor_style( $stylesheets );

	} // /add_editor_style

	/**
	 * Enqueues site editor modifications.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function editor_mods() {

		// Variables

			$current_screen = get_current_screen();


		// Requirements check

			if (
				empty( $current_screen->base )
				|| 'site-editor' !== $current_screen->base
			) {
				return;
			}


		// Processing

			Factory::script_enqueue( array(
				'handle'   => 'zooey-site-editor-mods',
				'src'      => get_theme_file_uri( 'assets/js/site-editor.min.js' ),
				'deps'     => array( 'wp-i18n', 'wp-dom' ),
				'localize' => array(
					'zooeySiteEditor' => array(
						'customizerTypographyURI' => esc_url( admin_url( 'customize.php?autofocus[control]=typography_font_size' ) ),
						'customizerGradientsURI'  => esc_url( admin_url( 'customize.php?autofocus[control]=gradient_stop_hard' ) ),
					),
				),
			) );

	} // /editor_mods

}
