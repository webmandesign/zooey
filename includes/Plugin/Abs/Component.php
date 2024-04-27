<?php
/**
 * Abs – Additional block styles integration component.
 *
 * @link  https://wordpress.org/plugins/additional-block-styles/
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Plugin\Abs;

use WebManDesign\Zooey\Component_Interface;

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

			// Filters

				add_filter( 'abs/register/get_styles', __CLASS__ . '::remove_block_styles' );

				add_filter( 'abs/assets/get_css', __CLASS__ . '::invalidate_a11y_css', 10, 3 );

	} // /init

	/**
	 * Remove obsolete block styles.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $styles
	 *
	 * @return  array
	 */
	public static function remove_block_styles( array $styles ): array {

		// Variables

			$disable_styles = array(
				'alignleft',
				'alignright',
				'hidden-on-tablet',
				'inline',
				'inset-shadow',
				'no-gap-vertical',
				'no-gaps',
				'pull-down',
				'pull-up',
				'screen-reader-text',
				'stacked-on-tablet',
			);


		// Processing

			foreach ( $disable_styles as $style ) {
				unset( $styles[ $style ] );
			}


		// Output

			return $styles;

	} // /remove_block_styles

	/**
	 * Invalidate accessibility CSS in editor as we provide that in theme.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $css
	 * @param  string $block_style
	 * @param  string $file
	 *
	 * @return  string
	 */
	public static function invalidate_a11y_css( string $css, string $block_style, string $file ): string {

		// Processing

			if ( stripos( $file, 'editor.css' ) ) {
				$css = str_replace(
					'screen-reader-text',
					'srt--theme-modified',
					$css
				);
			}


		// Output

			return $css;

	} // /invalidate_a11y_css

}
