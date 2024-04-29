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
		_x( 'With sidebar', 'Query loop context.', 'zooey' )
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

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%">

			<!-- wp:query -->
			<div class="wp-block-query">

				<?php do_action( 'tha_content_while_before' ); ?>
				<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|l"}}} -->

					<!-- wp:template-part {"slug":"entry-query"} /-->

				<!-- /wp:post-template -->
				<?php do_action( 'tha_content_while_after' ); ?>

				<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"left"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"}}}} -->
					<!-- wp:query-pagination-previous /-->
					<!-- wp:query-pagination-numbers /-->
					<!-- wp:query-pagination-next /-->
				<!-- /wp:query-pagination -->

				<!-- wp:query-no-results -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'zooey' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:search {"showLabel":false,"buttonUseIcon":true,"className":"is-style-button-outline"} /-->

				<!-- /wp:query-no-results -->

			</div>
			<!-- /wp:query -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%">
			<!-- wp:template-part {"slug":"sidebar","style":{"position":{"type":"sticky","top":"0px"}}} /-->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
