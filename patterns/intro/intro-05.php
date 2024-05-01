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
	'title'    => _x( 'Page title, description, button, and a quote overlaying background image with zoom in animation', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
		esc_html_x( 'testimonials', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-2' );

?>

<!-- wp:cover {"useFeaturedImage":true,"dimRatio":70,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":80,"minHeightUnit":"vh","align":"full","style":{"spacing":{"padding":{"top":"10em","bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:10em;padding-bottom:var(--wp--preset--spacing--content);min-height:80vh">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|xl"}}}} -->
		<div class="wp-block-columns alignwide">

			<!-- wp:column {"width":"61.8%","style":{"spacing":{"padding":{"top":"12vh"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"600px"}} -->
			<div class="wp-block-column" style="padding-top:12vh;flex-basis:61.8%">

				<!-- wp:post-title {"level":1} /-->

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"440px","justifyContent":"left"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"fontSize":"l"} -->
					<p class="has-l-font-size"><?php Block_Pattern::the_text( '120' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"backgroundColor":"white"} -->
						<div class="wp-block-button"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"38.2%"} -->
			<div class="wp-block-column" style="flex-basis:38.2%">

				<!-- wp:quote -->
				<blockquote class="wp-block-quote">
					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '170' ); ?></p>
					<!-- /wp:paragraph -->
					<cite><?php Block_Pattern::the_text( 'people/name' ); ?>, <?php Block_Pattern::the_text( 'people/job' ); ?></cite>
				</blockquote>
				<!-- /wp:quote -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
</div>
<!-- /wp:cover -->
