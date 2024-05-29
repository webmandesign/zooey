<?php
/**
 * HTML body class component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

namespace WebManDesign\Zooey\Header;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Content;
use WebManDesign\Zooey\Customize\Colors;
use WebManDesign\Zooey\Customize\CSS_Variables;
use WP_Post;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Body_Class implements Component_Interface {

	/**
	 * Soft cache for body classes array.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $body_classes = array();

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

				add_filter( 'body_class', __CLASS__ . '::body_class', 98 );

				add_filter( 'admin_body_class', __CLASS__ . '::body_class_admin' );

	} // /init

	/**
	 * HTML body classes.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  array $classes
	 *
	 * @return  array
	 */
	public static function body_class( array $classes ): array {

		// Processing

			// JS fallback.
			$classes[] = 'no-js';

			// Optional class for CSS variables root.
			$classes[] = CSS_Variables::get_root( 'body_class' ); // Reference: CSS selector root.

			// Singular entry?
			if ( is_singular() ) {

				$classes[] = 'is-singular';
				$classes[] = 'entry';
				$classes[] = sprintf( 'entry-%d', get_the_ID() );
				$classes[] = sprintf( 'entry-type-%s', get_post_type() );

				// Has featured image?
				if ( has_post_thumbnail() ) {
					$classes[] = 'has-post-thumbnail';
				}
			} else {

				// Add a class of hfeed to non-singular pages.
				$classes[] = 'hfeed';
			}

			// Has more than 1 published author?
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			// Is primary title displayed?
			if ( Content\Component::show_primary_title( $classes ) ) {
				$classes[] = 'has-primary-title';
			} else {
				$classes[] = 'no-primary-title';
			}

			// Is generic search?
			if (
				is_search()
				&& 'any' === get_query_var( 'post_type', 'any' )
			) {
				$classes[] = 'search-generic';
			}

			// Sort classes alphabetically.
			asort( $classes );


		// Output

			return array_unique( array_filter( $classes ) );

	} // /body_class

	/**
	 * HTML body classes in admin area.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $classes
	 *
	 * @return  string
	 */
	public static function body_class_admin( string $classes ): string {

		// Requirements check

			global $post;

			if (
				! is_admin()
				|| ! $post instanceof WP_Post
			) {
				return $classes;
			}


		// Processing

			// Dark editor theme class.
			if ( Colors::is_dark( sanitize_hex_color_no_hash( get_background_color() ) ) ) {
				$classes .= ' is-dark-theme';
			}


		// Output

			return $classes;

	} // /body_class_admin

	/**
	 * Retrieves soft cached array of body classes.
	 *
	 * @since  1.0.0
	 *
	 * @param  mixed $classes  Optional additional classes.
	 *
	 * @return  array
	 */
	public static function get_body_class( $classes = array() ): array {

		// Variables

			if ( ! is_array( $classes ) ) {
				$classes = array();
			}

			if ( empty( self::$body_classes ) ) {
				if ( ! doing_filter( 'body_class' ) ) {
					self::$body_classes = get_body_class();
				}
			}


		// Output

			if ( empty( $classes ) ) {
				return self::$body_classes;
			} else {
				return array_unique( array_merge( self::$body_classes, $classes ) );
			}

	} // /get_body_class

}
