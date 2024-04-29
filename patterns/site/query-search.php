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
		_x( 'Search results', 'Query loop context.', 'zooey' )
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

<!-- wp:query {"layout":{"type":"constrained"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}}} -->
<div class="wp-block-query" style="margin-bottom:var(--wp--preset--spacing--content)">

	<?php do_action( 'tha_content_while_before' ); ?>
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}},"layout":{"type":"default","columnCount":1}} -->

		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|s"}},"border":{"bottom":{"width":"1px"}}}} -->
		<div class="wp-block-group" style="border-bottom-width:1px;min-height:100%;padding-bottom:var(--wp--preset--spacing--s)">

			<!-- wp:post-title {"isLink":true,"style":{"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"700"}},"fontSize":"h-4"} /-->

		</div>
		<!-- /wp:group -->

	<!-- /wp:post-template -->
	<?php do_action( 'tha_content_while_after' ); ?>

	<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results {"align":"wide"} -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php esc_html_e( 'It looks like nothing was found.', 'zooey' ); ?><br><?php esc_html_e( 'Check out our latest news:', 'zooey' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:query {"query":{"perPage":3,"postType":"post","sticky":"exclude","inherit":false},"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-query" style="margin-top:var(--wp--preset--spacing--m)">

			<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|m"}},"layout":{"type":"grid","columnCount":3}} -->

				<!-- wp:template-part {"slug":"entry-query","style":{"dimensions":{"minHeight":"100%"}}} /-->

			<!-- /wp:post-template -->

		</div>
		<!-- /wp:query -->

	<!-- /wp:query-no-results -->

</div>
<!-- /wp:query -->
