<?php
/**
 * Taxonomy component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Entry;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Taxonomy implements Component_Interface {

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

				add_filter( 'wp_list_categories', __CLASS__ . '::posts_count_badge', 10, 2 );
				add_filter( 'wp_tag_cloud',       __CLASS__ . '::posts_count_badge', 10, 2 );

	} // /init

	/**
	 * Wraps posts count as a badge.
	 *
	 * @since  1.0.0
	 *
	 * @param  string       $output
	 * @param  array|string $args
	 *
	 * @return  string
	 */
	public static function posts_count_badge( string $output, $args ): string {

		// Processing

			if ( ! empty( $args['show_count'] ) ) {

				$replace = ( doing_filter( 'wp_tag_cloud' ) ) ? ( '$3' ) : ( ' <span class="cat-item-count">$3</span>' );

				$output = preg_replace(
					'/(\s)(\()(\d+)(\))/m',
					$replace,
					$output
				);
			}


		// Output

			return $output;

	} // /posts_count_badge

}
