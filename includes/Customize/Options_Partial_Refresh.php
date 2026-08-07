<?php
/**
 * Theme option partial refresh component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.0
 */

namespace WebManDesign\Zooey\Customize;

use WebManDesign\Zooey\Component_Interface;
use WP_Customize_Manager;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Options_Partial_Refresh implements Component_Interface {

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

				add_action( 'customize_register', __CLASS__ . '::setup', 100 );

	} // /init

	/**
	 * After setup theme.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Processing

			add_theme_support( 'customize-selective-refresh-widgets' );

	} // /after_setup_theme

	/**
	 * Setup partial refresh.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 *
	 * @return  void
	 */
	public static function setup( WP_Customize_Manager $wp_customize ) {

		// Processing

			// Site title.
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title, .wp-block-site-title',
					'render_callback' => __CLASS__ . '::render__blogname',
				)
			);

			// Site description.
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description, .wp-block-site-tagline',
					'render_callback' => __CLASS__ . '::render__blogdescription',
				)
			);

			// Logo max width preview.
			// @see   Setup\Media::render__logo_data()
			// @see   WP_Customize_Manager::register_controls()
			// @link  https://developer.wordpress.org/reference/classes/wp_customize_manager/register_controls/
			$wp_customize->selective_refresh->add_partial(
				'logo_width',
				array(
					'selector'            => '.custom-logo-link',
					'container_inclusive' => true,
					'render_callback'     => function() {

						// Variables

							$logo_width = absint( Mod::get( 'logo_width' ) );
							$style      = ( $logo_width ) ? ( 'style="max-width:' . $logo_width . 'px" ' ) : ( '' );


						// Output

							return str_replace(
								[ '<img ', '<svg ' ],
								[ '<img ' . $style, '<svg ' . $style ],
								get_custom_logo()
							);

					},
				)
			);

	} // /setup

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function render__blogname() {

		// Output

			bloginfo( 'name' );

	} // /render__blogname

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function render__blogdescription() {

		// Output

			bloginfo( 'description' );

	} // /render__blogdescription

}
