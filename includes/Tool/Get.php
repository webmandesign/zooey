<?php
/**
 * Getters class.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  2.0.1
 */

namespace WebManDesign\Zooey\Tool;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Get {

	/**
	 * Accesses an array in depth based on a path of keys.
	 *
	 * Simplified adaptation of `_wp_array_get()` function.
	 * @link  https://developer.wordpress.org/reference/functions/_wp_array_get/
	 *
	 * @since  2.0.1
	 *
	 * @param  array        $input_array
	 * @param  string|array $path
	 * @param  mixed        $default_value
	 *
	 * @return  mixed
	 */
	public static function deep( array $input_array, string|array $path, $default_value = null ) {

		// Variables

			if ( is_string( $path ) ) {
				$path = explode( '.', $path );
			}


		// Processing

			foreach ( $path as $path_element ) {

				if ( ! is_array( $input_array ) ) {
					return $default_value;
				}

				if ( isset( $input_array[ $path_element ] ) ) {
					$input_array = $input_array[ $path_element ];
					continue;
				}

				return $default_value;
			}


		// Output

			return $input_array;

	} // /deep

}
