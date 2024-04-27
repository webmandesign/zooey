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
		_x( 'Query entry: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Featured', 'Query entry context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'item', 'keyword', 'zooey' ),
		esc_html_x( 'entry', 'keyword', 'zooey' ),
		esc_html_x( 'post', 'keyword', 'zooey' ),
		esc_html_x( 'page', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'postTypes' => 'all', // Available also for post content.
) );

?>

<!-- wp:group {"tagName":"article","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"dimensions":{"minHeight":"100%"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<article class="wp-block-group has-secondary-background-color has-background" style="border-radius:0.38rem;min-height:100%;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"primary","minHeight":50,"minHeightUnit":"vh","contentPosition":"bottom center","isDark":false,"style":{"spacing":{"padding":{"top":"16em","right":"0","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null},"border":{"radius":"0.38rem"}},"className":"has-image-size-large"} -->
	<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center has-image-size-large" style="border-radius:0.38rem;padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:50vh">
		<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span>
		<div class="wp-block-cover__inner-container">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"var:preset|spacing|m"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"540px"}} -->
			<div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--m);padding-bottom:0;padding-left:0">

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}},"border":{"radius":{"topRight":"1rem"}}},"backgroundColor":"secondary-mixed"} -->
				<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-top-right-radius:1rem">

					<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","textDecoration":"none"}},"fontSize":"xxxl"} /-->

					<!-- wp:post-date {"isLink":true,"style":{"typography":{"textTransform":"uppercase","textDecoration":"none"},"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"fontSize":"xs"} /-->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
	</div>
	<!-- /wp:cover -->

</article>
<!-- /wp:group -->
