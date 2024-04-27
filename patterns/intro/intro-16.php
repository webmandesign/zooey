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
	'title'    => _x( 'Page title with two images on the sides', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-1' );
$image_2 = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:columns {"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"backgroundColor":"secondary-mixed"} -->
<div class="wp-block-columns alignfull has-secondary-mixed-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:column {"width":"40%"} -->
	<div class="wp-block-column" style="flex-basis:40%">

		<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","dimRatio":0,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","contentPosition":"center center","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
		<div class="wp-block-cover is-light" style="padding-top:0;padding-bottom:0;min-height:100%">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url_raw( $image_1 ); ?>" data-object-fit="cover" />
			<div class="wp-block-cover__inner-container">
				<!-- wp:spacer {"height":"25vh"} -->
				<div style="height:25vh" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
			</div>
		</div>
		<!-- /wp:cover -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"center","width":"","layout":{"type":"constrained","contentSize":"920px"}} -->
	<div class="wp-block-column is-vertically-aligned-center">

		<!-- wp:group {"style":{"dimensions":{"minHeight":"90vh"},"spacing":{"padding":{"top":"var:preset|spacing|l","left":"var:preset|spacing|m","right":"var:preset|spacing|m","bottom":"var:preset|spacing|l"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group" style="min-height:90vh;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-top">

				<!-- wp:column {"width":""} -->
				<div class="wp-block-column">

					<!-- wp:post-title {"level":1,"fontSize":"big"} /-->

					<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|l"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
					<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--l)">

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '90' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button -->
							<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"40%"} -->
				<div class="wp-block-column" style="flex-basis:40%">

					<!-- wp:image {"className":"is-style-rounded"} -->
					<figure class="wp-block-image is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="" /></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
