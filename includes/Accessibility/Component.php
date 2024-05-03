<?php
/**
 * Accessibility component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Accessibility;

use WebManDesign\Zooey\Component_Interface;
use WP_HTML_Tag_Processor;

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

			// Actions

				add_action( 'wp_body_open', __CLASS__ . '::anchor_top_of_page', -999 );
				add_action( 'wp_body_open', __CLASS__ . '::skip_links_body', -10 );

				remove_action( 'wp_enqueue_scripts', 'wp_enqueue_block_template_skip_link' );
				remove_action( 'wp_footer', 'the_block_template_skip_link' );

			// Filters

				add_filter( 'render_block_core/cover', __CLASS__ . '::render__cover', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Anchor for top of the page.
	 *
	 * Should be the first element on the page, before the skip links.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function anchor_top_of_page() {

		// Output

			echo '<a name="top"></a>' . PHP_EOL.PHP_EOL;

	} // /anchor_top_of_page

	/**
	 * Skip link generator.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $id       Link target element ID.
	 * @param  string $text     Link text.
	 * @param  string $class    Additional link CSS classes.
	 * @param  string $html     Output html, use "%s" for actual link output.
	 * @param  string $attr_id  Link `id` attribute.
	 *
	 * @return  string
	 */
	public static function link_skip_to( string $id = 'content', string $text = '', string $class = '', string $html = '%s', string $attr_id = '' ): string {

		// Pre

			/**
			 * Bypass filter for Content::link_skip_to().
			 *
			 * Returning a non-false value will short-circuit the method,
			 * returning the passed value instead.
			 *
			 * @since  1.0.0
			 *
			 * @param  mixed  $pre      Default: false. If not false, method returns this value.
			 * @param  string $id       Link target element ID.
			 * @param  string $text     Link text.
			 * @param  string $class    Additional link CSS classes.
			 * @param  string $html     Output html, use "%s" for actual link output.
			 * @param  string $attr_id  Link `id` attribute.
			 */
			$pre = apply_filters( 'pre/zooey/accessibility/link_skip_to', false, $id, $text, $class, $html, $attr_id );

			if ( false !== $pre ) {
				return $pre;
			}


		// Processing

			if ( empty( $text ) ) {
				$text = __( 'Skip to main content', 'zooey' );
			}

			if ( ! empty( $attr_id ) ) {
				$attr_id = ' id="' . esc_attr( trim( $attr_id ) ) . '"';
			}


		// Output

			return sprintf(
				(string) $html,
				'<a'
				. $attr_id
				. ' class="' . esc_attr( trim( 'skip-link screen-reader-text ' . $class ) ) . '"'
				. ' href="#' . esc_attr( trim( $id ) ) . '">'
				. esc_html( $text )
				. '</a>'
			);

	} // /link_skip_to

	/**
	 * Skip links: Body top.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function skip_links_body() {

		// Output

			get_template_part( 'parts/accessibility/menu', 'skip-links' );

	} // /skip_links_body

	/**
	 * Block output modification: Cover block `role="img"` alternative text.
	 *
	 * Fixing issue reported by AXE evaluation tool (https://www.deque.com/axe/).
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__cover( string $block_content, array $block ): string {

		// Processing

			if ( strpos( $block_content, 'role="img"' ) ) {

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag( array( 'class_name' => 'wp-block-cover__image-background' ) );

				if ( empty( $html->get_attribute( 'aria-label' ) ) ) {
					$html->set_attribute( 'aria-label', esc_attr_x( 'Background image', 'Aria label for Cover block background image with empty alternative text.', 'zooey' ) );

					$block_content = $html->get_updated_html();
				}
			}


		// Output

			return $block_content;

	} // /render__cover

}
