<?php
/**
 * Pagination component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Loop;

use WebManDesign\Zooey\Component_Interface;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Pagination implements Component_Interface {

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

				add_filter( 'paginate_links_output', __CLASS__ . '::paginate_links_output' );
				add_filter( 'paginate_links_output', __CLASS__ . '::replace_arrows' );

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
	 * Replacing text arrows and chevron with SVG icons.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $html
	 *
	 * @return  string
	 */
	public static function replace_arrows( string $html ): string {

		// Variables

			$svg = array(

				'→' => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="m224.49 136.49l-72 72a12 12 0 0 1-17-17L187 140H40a12 12 0 0 1 0-24h147l-51.49-51.52a12 12 0 0 1 17-17l72 72a12 12 0 0 1-.02 17.01"/></svg>',

				'←' => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H69l51.52 51.51a12 12 0 0 1-17 17l-72-72a12 12 0 0 1 0-17l72-72a12 12 0 0 1 17 17L69 116h147a12 12 0 0 1 12 12"/></svg>',

				'»' => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="m144.49 136.49l-80 80a12 12 0 0 1-17-17L119 128L47.51 56.49a12 12 0 0 1 17-17l80 80a12 12 0 0 1-.02 17m80-17l-80-80a12 12 0 1 0-17 17L199 128l-71.52 71.51a12 12 0 0 0 17 17l80-80a12 12 0 0 0 .01-17Z"/></svg>',

				'«' => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M208.49 199.51a12 12 0 0 1-17 17l-80-80a12 12 0 0 1 0-17l80-80a12 12 0 0 1 17 17L137 128ZM57 128l71.52-71.51a12 12 0 0 0-17-17l-80 80a12 12 0 0 0 0 17l80 80a12 12 0 0 0 17-17Z"/></svg>',
			);


		// Output

			return str_replace(
				array(
					'→', '&rarr;',
					'←', '&larr;',
					'»', '&raquo;',
					'«', '&laquo;',
				),
				array(
					$svg['→'], $svg['→'],
					$svg['←'], $svg['←'],
					$svg['»'], $svg['»'],
					$svg['«'], $svg['«'],
				),
				$html
			);

	} // /replace_arrows

	/**
	 * Block output modification: Pagination block.
	 *
	 * Adding descriptive ARIA labels and helpful current page info data attributes.
	 *
	 * We need to modify output HTML as there is no filter for `paginate_links()` args.
	 * @link  https://developer.wordpress.org/reference/functions/paginate_links/
	 *
	 * @since  1.0.0
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
						$block_content = self::replace_arrows( $block_content );
					}
					break;
			}


		// Output

			return $block_content;

	} // /render__pagination

}
