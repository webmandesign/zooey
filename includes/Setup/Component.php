<?php
/**
 * Theme setup component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.7
 */

namespace WebManDesign\Zooey\Setup;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Theme upgrade action.
			Upgrade::init();
			// Editor setup.
			Editor::init();
			// Media setup.
			Media::init();
			// Site Editor setup.
			Site_Editor::init();

			// Actions

				add_action( 'after_setup_theme', __CLASS__ . '::content_width', 0 );
				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme' );

	} // /init

	/**
	 * Theme setup.
	 *
	 * @since    1.0.0
	 * @version  1.0.7
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Variables

			$support = array(

				/**
				 * @link  https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
				 */
				'background' => array(
					// This becomes `color_base`, CSS variable `--wp--preset--color--base`:
					'default-color' => sanitize_hex_color_no_hash( Customize\Options::$theme_mods['color_base'] ),
				),

				/**
				 * @link  https://developer.wordpress.org/reference/functions/add_theme_support/#html5
				 */
				'html5' => array(
					'caption',
					'comment-form',
					'comment-list',
					'gallery',
					'navigation-widgets',
					'search-form',
					'script',
					'style',
				),

				/**
				 * @link  https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
				 */
				'logo' => array(
					'unlink-homepage-logo' => ! Customize\Mod::get( 'link_homepage_logo' ),
				),
			);


		// Processing

			load_theme_textdomain( 'zooey', get_template_directory() . '/languages' );

			add_theme_support( 'html5', $support['html5'] );
			add_theme_support( 'title-tag' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'custom-logo', $support['logo'] );
			add_theme_support( 'responsive-embeds' );

			/**
			 * Filters theme custom background setup array.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $custom_background
			 */
			add_theme_support( 'custom-background', apply_filters( 'zooey/add_theme_support/custom_background', $support['background'] ) );

			/**
			 * Custom theme support for child theme stylesheet automatic enqueuing.
			 * @link  https://github.com/webmandesign/child-theme
			 */
			add_theme_support( 'child-theme-stylesheet' );

	} // /after_setup_theme

	/**
	 * Sets the $content_width in pixels, based on the theme design.
	 *
	 * $content_width variable defines the maximum allowed width for images,
	 * videos, and oEmbeds displayed within a theme.
	 *
	 * @since  1.0.0
	 *
	 * @global  int $content_width
	 *
	 * @return  void
	 */
	public static function content_width() {

		// Processing

			/**
			 * We cannot use WebManDesign\Zooey\Customize\Mod::get() here as we are setting
			 * these before the actual theme options are declared.
			 */
			$content_width = absint( get_theme_mod( 'layout_width_wide', Customize\Options::$theme_mods['layout_width_wide'] ) );

			// Allow filtering.
			$GLOBALS['content_width'] = absint(
				/**
				 * Filters WordPress $content_width global variable.
				 *
				 * @since  1.0.0
				 *
				 * @param  int $content_width
				 */
				apply_filters( 'zooey/setup/content_width', $content_width )
			);

	} // /content_width

}
