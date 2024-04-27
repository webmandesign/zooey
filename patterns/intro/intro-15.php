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
	'title'    => _x( 'Hidden page title with two large image call to actions', 'Block pattern title.', 'zooey' ),
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

$image_1 = Block_Pattern::get_image_url( '3to2-2' );
$image_2 = Block_Pattern::get_image_url( '1to1-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-mixed-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">

	<!-- wp:post-title {"level":1,"className":"is-style-screen-reader-text"} /-->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"61.8%"} -->
		<div class="wp-block-column" style="flex-basis:61.8%">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","dimRatio":70,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","gradient":"primary-to-transparent-v","contentPosition":"top left","style":{"border":{"radius":"0.38rem"}},"layout":{"type":"constrained","contentSize":"520px"}} -->
			<div class="wp-block-cover has-custom-content-position is-position-top-left" style="border-radius:0.38rem;min-height:100%">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-to-transparent-v-gradient-background"></span>
				<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url_raw( $image_1 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:heading -->
					<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/l' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">

						<!-- wp:button {"backgroundColor":"white","fontSize":"m"} -->
						<div class="wp-block-button has-custom-font-size has-m-font-size"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

				</div>
			</div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"38.2%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"custom","style":{"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}}} -->
			<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="" style="border-top-left-radius:1rem;border-top-right-radius:1rem;aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"border":{"radius":{"bottomLeft":"1rem","bottomRight":"1rem"}},"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-primary-background-color has-background" style="border-bottom-left-radius:1rem;border-bottom-right-radius:1rem">

				<!-- wp:heading {"fontSize":"h-3"} -->
				<h2 class="wp-block-heading has-h-3-font-size"><a href="#0"><?php Block_Pattern::the_text( 'title/s' ); ?></a></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 'm' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
