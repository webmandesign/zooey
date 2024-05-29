<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.0
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => _x( 'Page title with description cut into a featured image cover', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:cover {"useFeaturedImage":true,"hasParallax":true,"dimRatio":0,"isUserOverlayColor":true,"minHeight":70,"minHeightUnit":"vh","contentPosition":"bottom center","align":"full","style":{"spacing":{"padding":{"top":"16em","bottom":"0","right":"0","left":"0"}}}} -->
<div class="wp-block-cover alignfull has-parallax has-custom-content-position is-position-bottom-center" style="padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:70vh">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"gradient":"base-cut-transparent-h","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-cut-transparent-h-gradient-background has-background" style="padding-top:0;padding-bottom:0">

			<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group alignwide">

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|l","right":"var:preset|spacing|l","bottom":"0","left":"0"}},"layout":{"selfStretch":"fixed","flexSize":"920px"},"border":{"radius":"0.38rem"}},"backgroundColor":"base"} -->
				<div class="wp-block-group has-base-background-color has-background" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:0;padding-left:0">

					<!-- wp:post-title {"level":1} /-->

					<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left","contentSize":"480px"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"fontSize":"l"} -->
						<p class="has-l-font-size"><?php Block_Pattern::the_text( '135' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
