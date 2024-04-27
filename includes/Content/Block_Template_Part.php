<?php
/**
 * Block template part component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Block_Template_Part implements Component_Interface {

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

				add_filter( 'default_wp_template_part_areas', __CLASS__ . '::get_areas' );

				add_filter( 'render_block_core/template-part', __CLASS__ . '::render__template_part', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				add_filter( 'zooey/content/block_template_part/get_content', 'do_blocks', 9 );
				add_filter( 'zooey/content/block_template_part/get_content', 'do_shortcode' );

	} // /init

	/**
	 * Add custom template part areas.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $area_definitions  An array of supported area objects.
	 *
	 * @return  array
	 */
	public static function get_areas( array $area_definitions ): array {

		// Variables

			$areas = array(

				'comments' => array(
					'label'       => esc_html_x( 'Comments', 'Template part area label', 'zooey' ),
					'description' => esc_html_x( 'The Comments template defines an area that displays comments list, navigation and comments form.', 'Template part area description', 'zooey' ),
				),

				'content' => array(
					'label'       => esc_html_x( 'Content', 'Template part area label', 'zooey' ),
					'description' => esc_html_x( 'The Content template defines an area that displays a page content.', 'Template part area description', 'zooey' ),
				),

				'menu' => array(
					'label'       => esc_html_x( 'Navigational Menu', 'Template part area label', 'zooey' ),
					'description' => esc_html_x( 'The Navigational Menu template defines an area that displays a navigational menu, or list of links.', 'Template part area description', 'zooey' ),
				),

				'meta' => array(
					'label'       => esc_html_x( 'Entry Meta', 'Template part area label', 'zooey' ),
					'description' => esc_html_x( 'The Entry Meta template defines an area that displays post meta data, such as post author, publish date, taxonomy terms, or comments count.', 'Template part area description', 'zooey' ),
				),

				'query' => array(
					'label'       => esc_html_x( 'Query Loop', 'Template part area label', 'zooey' ),
					'description' => esc_html_x( 'The Query Loop template defines an area that displays list of posts.', 'Template part area description', 'zooey' ),
				),

				'sidebar' => array(
					'label'       => esc_html_x( 'Sidebar', 'Template part area label', 'zooey' ),
					'description' => esc_html_x( 'The Sidebar template defines an area that displays a sidebar content, sidebar widgets.', 'Template part area description', 'zooey' ),
					'icon'        => 'sidebar',
					'area_tag'    => 'section',
				),

				'template' => array(
					'label'       => esc_html_x( 'Template Content', 'Template part area label', 'zooey' ),
					'description' => esc_html_x( 'The Template Content template part defines an area that displays a template content.', 'Template part area description', 'zooey' ),
				),
			);


		// Processing

			$areas = array_map( function( $args, $area ) {
				return wp_parse_args( $args, array(
					'area'        => 'zooey/' . $area,
					'area_tag'    => 'div',
					'description' => '',
					'icon'        => 'layout',
				) );
			}, $areas, array_keys( $areas ) );


		// Output

			return array_merge( $area_definitions, $areas );

	} // /get_areas

	/**
	 * Block output modification: Template part.
	 *
	 * Do not output block HTML (wrapper) when empty.
	 *
	 * Unfortunately, we can not use `pre_render_block` hook for this
	 * as it does not provide enough information to determine whether
	 * rendered block has no HTML content.
	 *
	 * This is only needed in block theme mode. Classic/hybrid theme mode
	 * does not output empty template parts (see `self::the_content()`).
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__template_part( string $block_content, array $block ): string {

		// Variables

			$html = new WP_HTML_Tag_Processor( $block_content );


		// Processing

			$html->next_tag(); // This is actual Template Part block wrapper.

			// Setting wrapper tag ID (anchor) as WordPress does not do this for us.
			if ( ! empty( $block['attrs']['anchor'] ) ) {
				$html->set_attribute( 'id', (string) $block['attrs']['anchor'] );
			}

			// Checking for no inner HTML tag.
			if ( empty( $html->next_tag() ) ) {
				$block_content = '';
			} else {
				$block_content = $html->get_updated_html();
			}


		// Output

			return $block_content;

	} // /render__template_part

	/**
	 * Gets template part content.
	 *
	 * We create custom functionality instead of using `block_template_part()`
	 * so it is possible to filter the output in various ways.
	 *
	 * Code modified from `block_template_part()`.
	 * @link  https://developer.wordpress.org/reference/functions/block_template_part/
	 * @link  https://developer.wordpress.org/reference/functions/get_block_template/
	 *
	 * @since  1.0.0
	 *
	 * @param  string $slug  Template part slug/name.
	 *
	 * @return  string
	 */
	public static function get_content( string $slug ): string {

		// Variables

			$content       = '';
			$template_part = get_block_template( get_stylesheet() . '//' . $slug, 'wp_template_part' );


		// Processing

			if ( ! empty( $template_part->content ) ) {
				$content = (string) $template_part->content;
			}


		// Output

			/**
			 * Filters block template part content.
			 *
			 * @since  1.0.0
			 *
			 * @param  string $content
			 * @param  string $slug     Template part slug/name.
			 */
			return (string) apply_filters( 'zooey/content/block_template_part/get_content', $content, $slug );

	} // /get_content

	/**
	 * Prints template part content (and optional wrapper container).
	 *
	 * We create custom functionality instead of using `block_template_part()`
	 * so it is possible to filter the output in various ways.
	 *
	 * IMPORTANT:
	 * We can not use `wp_kses_post()` here as, for example,
	 * when we use a Search block in the Site Editor, the form
	 * HTML is stripped out rendering the block incorrectly!
	 *
	 * @since  1.0.0
	 *
	 * @param  string|array $slug     Template part slug/name.
	 *                                Second array item is treated as a fallback content
	 *                                if the original (first item) template part is empty.
	 * @param  array        $wrapper  Wrapper container settings attributes.
	 * @param  string       $context  Optional context.
	 *
	 * @return  void
	 */
	public static function the_content( $slug, array $wrapper = array(), string $context = '' ) {

		// Variables

			/**
			 * Filters template part to render.
			 *
			 * @since  1.0.0
			 *
			 * @param  array|string $slug     Template part slug/name.
			 *                                Second array item is treated as a fallback content
			 *                                if the original (first item) template part is empty.
			 * @param  string       $context  Optional context.
			 * @param  array        $wrapper  Wrapper container settings attributes.
			 */
			$slug = (array) apply_filters( 'zooey/content/block_template_part/the_content/slug', $slug, $context, $wrapper );

			$content = trim( self::get_content( $slug[0] ) );
			$wrapper = wp_parse_args( $wrapper, array(

				// These attributes can be custom set:
				'tag'   => '',
				'class' => '',
				'style' => '',
				'id'    => '',

				// These are helper attributes and will be overwritten below:
				'_open'  => '',
				'_close' => '',
			) );

			if (
				! empty( $slug[1] )
				&& empty( $content )
			) {
				$content = trim( self::get_content( $slug[1] ) );
			}


		// Requirements check

			// No need to output anything if the template part content is empty.
			if ( empty( $content ) ) {
				return;
			}


		// Processing

			if ( ! empty( $wrapper['tag'] ) ) {

				$wrapper['_open'] = '<' . tag_escape( $wrapper['tag'] );

				if ( ! empty( $wrapper['class'] ) ) {
					$wrapper['_open'] .= ' class="' . esc_attr( implode( ' ', (array) $wrapper['class'] ) ) . '"';
				}

				if ( ! empty( $wrapper['style'] ) ) {
					$wrapper['_open'] .= ' style="' . esc_attr( implode( ';', (array) $wrapper['style'] ) ) . '"';
				}

				if ( ! empty( $wrapper['id'] ) ) {
					$wrapper['_open'] .= ' id="' . esc_attr( $wrapper['id'] ) . '"';
				}

				$wrapper['_open'] .= '>';
				$wrapper['_close'] = '</' . tag_escape( $wrapper['tag'] ) . '>';
			}


		// Output

			/**
			 * Filters content of the template part (including optional wrapper) before echoing.
			 *
			 * @since  1.0.0
			 *
			 * @param  string $content  Template part content with optional wrapper.
			 * @param  array  $slug     Template part slug/name.
			 *                          Second array item is treated as a fallback content
			 *                          if the original (first item) template part is empty.
			 * @param  array  $wrapper  Wrapper container settings attributes.
			 * @param  string $context  Optional context.
			 */
			echo (string) apply_filters(
				'zooey/content/block_template_part/the_content',
				$wrapper['_open'] . $content . $wrapper['_close'],
				$slug,
				$wrapper,
				$context
			); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	} // /the_content

}
