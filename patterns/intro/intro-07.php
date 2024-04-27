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
	'title'    => _x( 'Page title with description with an protruding featured image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
		esc_html_x( 'columns', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"},"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="margin-bottom:var(--wp--preset--spacing--content);padding-top:0;padding-bottom:0">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"verticalAlignment":"bottom","width":"50%","style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"},"margin":{"top":"var:preset|spacing|content"}},"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}},"backgroundColor":"primary"} -->
		<div class="wp-block-column is-vertically-aligned-bottom has-primary-background-color has-background" style="border-top-left-radius:1rem;border-top-right-radius:1rem;margin-top:var(--wp--preset--spacing--content);padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l);flex-basis:50%">

			<!-- wp:post-title {"level":1} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"margin":{"top":"var:preset|spacing|l"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--l)">

				<!-- wp:paragraph {"fontSize":"l"} -->
				<p class="has-l-font-size"><?php Block_Pattern::the_text( '120' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"minHeight":100,"minHeightUnit":"%","isDark":false,"style":{"border":{"radius":{"bottomLeft":"1rem","bottomRight":"1rem"}}},"className":"is-style-pull-down-l","className":"has-image-size-medium"} -->
			<div class="wp-block-cover is-light is-style-pull-down-l has-image-size-medium" style="border-bottom-left-radius:1rem;border-bottom-right-radius:1rem;min-height:100%">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<div class="wp-block-cover__inner-container">

					<!-- wp:spacer {"height":"60vh"} -->
					<div style="height:60vh" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->

				</div>
			</div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
