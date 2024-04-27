<?php
/**
 * Block Visibility integration component.
 *
 * @link  https://wordpress.org/plugins/block-visibility/
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Plugin\Block_Visibility;

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

				add_filter( 'block_visibility_settings_defaults', __CLASS__ . '::breakpoints' );

	} // /init

	/**
	 * Screen size breakpoints.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $defaults
	 *
	 * @return  array
	 */
	public static function breakpoints( array $defaults ): array {

		// Variables

			$breakpoints = array(
				'extra_large' => 1600,
				'large'       => 1280,
				'medium'      => 672,
				'small'       => 448,
			);


		// Processing

			foreach ( $breakpoints as $size => $breakpoint ) {
				$defaults['visibility_controls']['screen_size']['breakpoints'][ $size ] = absint( $breakpoint ) . 'px';
			}


		// Output

			return $defaults;

	} // /breakpoints

}
