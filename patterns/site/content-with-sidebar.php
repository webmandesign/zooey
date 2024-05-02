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
	'title'    => _x( 'Page/post content with sidebar', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|content","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"66.66%","style":{"spacing":{"blockGap":"var:preset|spacing|content"}}} -->
		<div class="wp-block-column" style="flex-basis:66.66%">

			<!-- wp:post-content {"layout":{"type":"constrained","justifyContent":"left"}} /-->

			<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
			<div class="wp-block-group">

				<!-- wp:template-part {"slug":"entry-meta-bottom","className":"is-hidden-on-page"} /-->

				<!-- wp:template-part {"slug":"entry-navigation","className":"is-hidden-on-page"} /-->

				<!-- wp:template-part {"slug":"comments","tagName":"section"} /-->

			</div>
			<!-- /wp:group -->

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
