<?php
/**
 * Entry summary component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Entry;

use WebManDesign\Zooey\Component_Interface;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Summary implements Component_Interface {

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

				add_filter( 'excerpt_length', __CLASS__ . '::excerpt_length' );

				add_filter( 'excerpt_more', __CLASS__ . '::excerpt_more' );

				add_filter( 'render_block_core/post-excerpt', __CLASS__ . '::render__excerpt', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block_core/post-excerpt', __CLASS__ . '::render__read_more_link', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Excerpt length.
	 *
	 * The number of words. Default 55.
	 *
	 * @since  1.0.0
	 *
	 * @return  int
	 */
	public static function excerpt_length(): int {

		// Output

			return 32;

	} // /excerpt_length

	/**
	 * Excerpt more.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function excerpt_more(): string {

		// Output

			return '&hellip;';

	} // /excerpt_more

	/**
	 * Block output modification: Post Excerpt.
	 *
	 * Removing content when used as page summary and no custom excerpt
	 * is set for the post or page.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__excerpt( string $block_content, array $block ): string {

		// Processing

			if (
				Component::is_singular()
				&& ! has_excerpt()
				&& isset( $block['attrs']['className'] )
				&& false !== stripos( $block['attrs']['className'], 'page-summary' )
			) {

				// Remove auto-generated excerpt in page header on singular pages.
				$block_content = '';
			}


		// Output

			return $block_content;

	} // /render__excerpt

	/**
	 * Block output modification: Post Excerpt read more link.
	 *
	 * Adding descriptive ARIA label.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__read_more_link( string $block_content, array $block ): string {

		// Variables

			$class_more_link = 'wp-block-post-excerpt__more-link';


		// Processing

			if ( stripos( $block_content, $class_more_link ) ) {

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag( array( 'class_name' => $class_more_link ) );
				$html->set_attribute(
					'aria-label',
					sprintf(
						/* translators: %s: Name of current post */
						__( 'Continue reading "%s"', 'zooey' ),
						the_title_attribute( array( 'echo' => false ) )
					)
				);

				$block_content = $html->get_updated_html();
			}


		// Output

			return $block_content;

	} // /render__read_more_link

}
