<?php
/**
 * Content container component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Setup\Site_Editor;
use WebManDesign\Zooey\Entry;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Container implements Component_Interface {

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

				add_action( 'tha_content_top',    __CLASS__ . '::wrapper', 0 );
				add_action( 'tha_content_bottom', __CLASS__ . '::wrapper', 90 );

				add_action( 'tha_content_top',    __CLASS__ . '::wrapper_custom_template_file' );
				add_action( 'tha_content_bottom', __CLASS__ . '::wrapper_custom_template_file' );

	} // /init

	/**
	 * Content wrapper container.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function wrapper() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Output

			if ( doing_action( 'tha_content_top' ) ) {

				$is_singular = Entry\Component::is_singular();

				$classes = array(
					'wp-block-group',
					'has-no-margin-top',
					'site-content',
				);

				/**
				 * Make `<main>` container "constrained" or "flow" layout.
				 *
				 * @since  1.0.0
				 *
				 * @param  bool $is_constrained
				 */
				if ( (bool) apply_filters( 'zooey/content_wrapper_is_constrained', false ) ) {
					$classes[] = 'is-layout-constrained';
				} else {
					$classes[] = 'is-layout-flow';
				}

				if ( $is_singular ) {
					// Post class is required for classic themes (and so for hybrid themes too).
					$classes['post_class'] = implode( ' ', get_post_class() );
				}

				/**
				 * Filter HTML `<main>` classes.
				 *
				 * @since  1.0.0
				 *
				 * @param  array $classes
				 */
				$classes = (array) apply_filters( 'zooey/content_wrapper_classes', $classes );

				echo
					PHP_EOL.PHP_EOL
					. '<main'
					. ' class="' . esc_attr( implode( ' ', $classes ) ) . '"'
					. ( ( $is_singular ) ? ( ' data-id="post-' . esc_attr( get_the_ID() ) . '"' ) : ( '' ) )
					. ' id="content"'
					. '>';

			} elseif ( doing_action( 'tha_content_bottom' ) ) {

				echo
					PHP_EOL
					. '</main>'
					. PHP_EOL.PHP_EOL;
			}

	} // /wrapper

	/**
	 * Wrapping non-theme template file content.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function wrapper_custom_template_file() {

		// Requirements check

			if (
				Site_Editor::is_enabled()
				|| false === stripos( implode( ' ', get_body_class() ), 'is-custom-template-file' )
			) {
				return;
			}


		// Output

			if ( doing_action( 'tha_content_top' ) ) {

				echo
					PHP_EOL
					. '<div class="wp-block-group is-layout-constrained has-global-padding is-custom-content-container">'
					. '<div class="wp-block-group is-layout-flow alignwide">'
					. PHP_EOL . PHP_EOL;

			} elseif ( doing_action( 'tha_content_bottom' ) ) {

				echo
					PHP_EOL . PHP_EOL
					. '</div>'
					. '</div>'
					. PHP_EOL;
			}

	} // /wrapper_custom_template_file

}
