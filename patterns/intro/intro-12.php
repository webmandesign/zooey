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
	'title'    => _x( 'Split page title with short description, button, and image on the side on a solid color background', 'Block pattern title.', 'zooey' ),
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

$image = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:columns {"verticalAlignment":null,"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"0","left":"0"}}},"backgroundColor":"primary","className":"is-style-mobile-reverse"} -->
<div class="wp-block-columns alignfull is-style-mobile-reverse has-primary-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":0,"minHeight":100,"minHeightUnit":"%","layout":{"type":"constrained"}} -->
		<div class="wp-block-cover" style="min-height:100%">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<img class="wp-block-cover__image-background" alt="<?php Block_Pattern::the_text( 'alt' ); ?>" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover" />
			<div class="wp-block-cover__inner-container">

				<!-- wp:spacer {"height":"62vh"} -->
				<div style="height:62vh" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

			</div>
		</div>
		<!-- /wp:cover -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"center","layout":{"type":"constrained"}} -->
	<div class="wp-block-column is-vertically-aligned-center">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"},"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
		<div class="wp-block-group" style="min-height:100%;padding-top:var(--wp--preset--spacing--content);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--content);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:post-title {"level":1} /-->

			<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '100' ); ?></p>
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
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
