<?php
/**
 * Content component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.3
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Header\Body_Class;

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

			// Containers.
			Container::init();
			// Blocks.
			Block::init();
			Block_Pattern::init();
			Block_Style::init();
			Block_Template_Part::init();
			// Starter content.
			Starter::init();

			// Filters

				add_filter( 'render_block', __CLASS__ . '::render__h1', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Get the paginated page number info as HTML.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function get_paged_info(): string {

		// Pre

			/**
			 * Bypass filter for WebManDesign\Zooey\Content\Component::get_paged_info().
			 *
			 * Returning a non-false value will short-circuit the method,
			 * returning the passed value instead.
			 *
			 * @since  1.0.0
			 *
			 * @param  mixed $pre  Default: false. If not false, method returns this value.
			 */
			$pre = apply_filters( 'pre/zooey/content/get_paged_info', false );

			if ( false !== $pre ) {
				return $pre;
			}


		// Variables

			global $page, $paged;

			$output    = '';
			$paginated = max( absint( $page ), absint( $paged ) );


		// Processing

			if ( 1 < $paginated ) {
				$output = '<span class="page-number"> ' . sprintf(
					/* translators: Paginated content title suffix. %d: page number. */
					esc_html__( '(page %d)', 'zooey' ),
					number_format_i18n( $paginated )
				) . '</span>';
			}


		// Output

			return $output;

	} // /get_paged_info

	/**
	 * Do we need to display primary title?
	 *
	 * Used to enable/disable main page H1 title.
	 *
	 * @since    1.0.0
	 * @version  1.1.3
	 *
	 * @param  mixed $body_classes  Optional forced array of body classes when using the method within `body_class` hook.
	 *
	 * @return  bool
	 */
	public static function show_primary_title( $body_classes = array() ): bool {

		// Variables

			$show         = ! is_404();
			$body_classes = implode( ' ', Body_Class::get_body_class( $body_classes ) );


		// Processing

			// Body class has the highest priority.
			if ( stripos( $body_classes, 'no-primary-title' ) ) {
				$show = false;
			}


		// Output

			/**
			 * Whether to show content primary title.
			 *
			 * @since  1.0.0
			 *
			 * @param  bool $show
			 */
			return (bool) apply_filters( 'zooey/content/show_primary_title', $show );

	} // /show_primary_title

	/**
	 * Block output modification: Main H1 title block.
	 *
	 * Adds info about pagination to H1 headings.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__h1( string $block_content, array $block ): string {

		// Variables

			$heading_blocks = array(
				'core/heading',
				'core/post-title',
				'core/query-title',
			);


		// Processing

			if (
				in_array( $block['blockName'], $heading_blocks )
				&& ! empty( $block['attrs']['level'] )
				&& 1 == $block['attrs']['level']
			) {

				if ( $paged_suffix = Component::get_paged_info() ) {
					$block_content = str_replace(
						'</h1>',
						$paged_suffix . '</h1>',
						$block_content
					);
				}
			}


		// Output

			return $block_content;

	} // /render__h1

}
