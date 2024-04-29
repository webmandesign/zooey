<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => sprintf(
		/* translators: %s: context. */
		_x( 'Query loop: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Default', 'Query loop context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'loop', 'keyword', 'zooey' ),
		esc_html_x( 'list', 'keyword', 'zooey' ),
		esc_html_x( 'items', 'keyword', 'zooey' ),
		esc_html_x( 'posts', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'has_hooks' => true,
	'viewportWidth' => 'alignfull',
) );

?>

<!-- wp:query {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}}} -->
<div class="wp-block-query" style="margin-bottom:var(--wp--preset--spacing--content)">

	<?php do_action( 'tha_content_while_before' ); ?>
	<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|m"}},"layout":{"type":"grid","columnCount":2}} -->

		<!-- wp:template-part {"slug":"entry-query"} /-->

	<!-- /wp:post-template -->
	<?php do_action( 'tha_content_while_after' ); ?>

	<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results {"align":"wide"} -->

		<!-- wp:group {"layout":{"type":"constrained","justifyContent":"center"}} -->
		<div class="wp-block-group">

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'zooey' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:search {"showLabel":false,"buttonUseIcon":true,"className":"is-style-button-outline"} /-->

		</div>
		<!-- /wp:group -->

	<!-- /wp:query-no-results -->

</div>
<!-- /wp:query -->
