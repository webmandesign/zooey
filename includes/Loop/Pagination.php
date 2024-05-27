<?php
/**
 * Pagination component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.7
 */

namespace WebManDesign\Zooey\Loop;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Tool\Arrow;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Pagination implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.0.7
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'paginate_links_output', __CLASS__ . '::paginate_links_output' );
				add_filter( 'paginate_links_output', 'WebManDesign\Zooey\Tool\Arrow::replace' );

				add_filter( 'render_block', __CLASS__ . '::render__pagination', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Fixing pagination container class.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $html
	 *
	 * @return  string
	 */
	public static function paginate_links_output( string $html ): string {

		// Output

			return str_replace(
				"<ul class='page-numbers'>",
				"<ul class='page-numbers-list'>",
				$html
			);

	} // /paginate_links_output

	/**
	 * Block output modification: Pagination block.
	 *
	 * Adding descriptive ARIA labels and helpful current page info data attributes.
	 *
	 * We need to modify output HTML as there is no filter for `paginate_links()` args.
	 * @link  https://developer.wordpress.org/reference/functions/paginate_links/
	 *
	 * @since    1.0.0
	 * @version  1.0.7
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__pagination( string $block_content, array $block ): string {

		// Processing

			switch ( $block['blockName'] ) {

				case 'core/query-pagination-numbers':
				case 'core/comments-pagination-numbers':

					if ( empty( trim( $block_content ) ) ) {
						break;
					}

					if ( 'core/query-pagination-numbers' === $block['blockName'] ) {
						$total   = $GLOBALS['wp_query']->max_num_pages ?? 1;
						$current = absint( max( get_query_var( 'paged' ), 1 ) );
					} elseif ( 'core/comments-pagination-numbers' === $block['blockName'] ) {
						$total   = get_comment_pages_count();
						$current = absint( max( get_query_var( 'cpage' ), 1 ) );
					}

					if (
						$total > 0
						&& $current > 0
					) {

						// Improving accessibility of page numbers.
						preg_match_all(
							'/>\d+</',
							$block_content,
							$matches,
							PREG_SET_ORDER
						);
						foreach ( $matches as $match ) {
							$block_content = str_replace(
								$match[0],
								// The HTML here is correct:
								'><span class="screen-reader-text">' . esc_html_x( 'Page:', 'Pagination page number screen reader label.', 'zooey' ) . ' </span' . $match[0],
								$block_content
							);
						}

						// Other improvements.
						$html = new WP_HTML_Tag_Processor( $block_content );

						$html->next_tag();
						$html->set_attribute(
							'aria-label',
							sprintf(
								/* translators: 1: current page number, 2: total page count. */
								__( 'Page %1$d of %2$d', 'zooey' ),
								$current,
								$total
							)
						);
						$html->set_attribute(
							'data-page',
							sprintf(
								/* translators: 1: current page number, 2: total page count. */
								__( 'Page %1$d of %2$d', 'zooey' ),
								$current,
								$total
							)
						);
						$html->set_attribute( 'data-current', $current );
						$html->set_attribute( 'data-total', $total );

						// Make current page focusable for screen readers.
						$html->next_tag( array( 'tag_name' => 'span', 'class_name' => 'current' ) );
						$html->set_attribute( 'tabindex', 0 );

						$block_content = $html->get_updated_html();
					}
					break;

				case 'core/query-pagination-previous':
				case 'core/query-pagination-next':
				case 'core/comments-pagination-previous':
				case 'core/comments-pagination-next':

					$html = new WP_HTML_Tag_Processor( $block_content );

					$html->next_tag();
					if ( stripos( $block_content, 'is-arrow' ) ) {
						$html->add_class( 'has-arrow' );
					}

					$block_content = $html->get_updated_html();

					if ( stripos( $block_content, 'is-arrow-' ) ) {
						$block_content = Arrow::replace( $block_content );
					}
					break;
			}


		// Output

			return $block_content;

	} // /render__pagination

}
