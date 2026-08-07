<?php
/**
 * Related posts component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  2.0.0
 */

namespace WebManDesign\Zooey\Loop;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Related_Posts implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'render_block_context', __CLASS__ . '::render_context__related_posts', ZOOEY_RENDER_BLOCK_PRIORITY, 3 );

	} // /init

	/**
	 * Block output modification: Related posts query setup.
	 *
	 * @since  2.0.0
	 *
	 * @param  array         $context
	 * @param  array         $parsed_block  Block being rendered, filtered by `render_block_data`.
	 * @param  WP_Block|null $parent_block  If this is a nested block, a reference to the parent block.
	 *
	 * @return  array
	 */
	public static function render_context__related_posts( array $context, array $parsed_block, $parent_block ): array {

		// Processing

			if (
				is_singular()
				&& 'core/post-template' === $parsed_block['blockName']
				&& isset( $parent_block->attributes['className'] )
				&& false !== stripos( $parent_block->attributes['className'], 'related-posts' )
			) {

				/**
				 * Filters taxonomy used for related posts.
				 *
				 * @since  2.0.0
				 *
				 * @param  string $taxonomy  Default: `category`.
				 */
				$taxonomy = (string) apply_filters( 'zooey/loop/render_context__related_posts/taxonomy', 'category' );

				$terms = get_the_terms( false, $taxonomy );

				if (
					$terms
					&& ! is_wp_error( $terms )
				) {

					$tax_query = array(
						$taxonomy => array(),
					);

					foreach ( $terms as $term ) {
						$tax_query[ $taxonomy ][] = $term->term_id;
					}

					$context['query']['postType'] = get_post_type();
					$context['query']['orderBy']  = 'rand';
					$context['query']['taxQuery'] = $tax_query;
					$context['query']['exclude']  = array( get_the_ID() );
				}
			}


		// Output

			return $context;

	} // /render_context__related_posts

}
