<?php
/**
 * Classic editor setup.
 *
 * @package    Ileana
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @version  2.0.0
 */

namespace WebManDesign\Ileana\Editor;

use WebManDesign\Ileana\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Classic implements Component_Interface {

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

				add_filter( 'tiny_mce_before_init', __CLASS__ . '::tiny_mce_settings' );

				add_filter( 'mce_buttons_2', __CLASS__ . '::tiny_mce_buttons' );

	} // /init

	/**
	 * Modify TinyMCE settings.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $mce_init  TinyMCE settings.
	 *
	 * @return  array
	 */
	public static function tiny_mce_settings( array $mce_init ): array {

		// Processing

			$mce_init['style_formats_merge'] = true;
			$mce_init['style_formats']       = wp_json_encode( array(

				array(
					'title' => esc_html_x( 'Theme', 'Editor format styles section title.', 'ileana' ),
					'items' => array(

						array(
							'title'    => esc_html__( '(L) Large font size', 'ileana' ),
							'selector' => 'p,h2,h3,h4',
							'classes'  => 'has-l-font-size',
						),

						array(
							'title'    => esc_html__( '(XL) Extra large font size', 'ileana' ),
							'selector' => 'p,h2,h3,h4',
							'classes'  => 'has-xl-font-size',
						),

						array(
							'title'    => esc_html__( 'UPPERCASE', 'ileana' ),
							'selector' => 'p,h2,h3,h4',
							'styles'   => array(
								'text-transform' => 'uppercase',
							),
						),

						array(
							'title'   => esc_html__( 'Paragraph with [D]ropcap', 'ileana' ),
							'block'   => 'p',
							'classes' => 'has-drop-cap',
						),
					),
				),
			) );


		// Output

			return $mce_init;

	} // /tiny_mce_settings

	/**
	 * Modify TinyMCE settings.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $buttons
	 *
	 * @return  array
	 */
	public static function tiny_mce_buttons( array $buttons ): array {

		// Processing

			array_unshift( $buttons, 'styleselect' );


		// Output

			return $buttons;

	} // /tiny_mce_buttons

}
