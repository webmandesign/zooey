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
	'title'    => _x( 'Page title with image and huge call to action on the side', 'Block pattern title.', 'zooey' ),
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

$image_1 = Block_Pattern::get_image_url( '1to1-3' );
$image_2 = Block_Pattern::get_image_url( '1to1-1' );

?>

<!-- wp:columns {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content","left":"var:preset|spacing|m","right":"var:preset|spacing|m"},"blockGap":"var:preset|spacing|s"}},"layout":{"type":"constrained","contentSize":"400px"}} -->
	<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--content);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--content);padding-left:var(--wp--preset--spacing--m)">

		<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"custom","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}},"className":"is-style-rounded"} -->
		<figure class="wp-block-image size-full is-style-rounded" style="margin-bottom:var(--wp--preset--spacing--m)"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="" style="aspect-ratio:1;object-fit:cover" /></figure>
		<!-- /wp:image -->

		<!-- wp:post-title {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"h-2"} /-->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php Block_Pattern::the_text( '125' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","dimRatio":0,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","contentPosition":"bottom left","isDark":false,"style":{"spacing":{"padding":{"bottom":"0","left":"0","top":"16em"}},"border":{"radius":{"bottomLeft":"1rem"}}},"layout":{"type":"constrained","contentSize":"480px"}} -->
		<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="border-bottom-left-radius:1rem;padding-top:16em;padding-bottom:0;padding-left:0;min-height:100%">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url_raw( $image_1 ); ?>" data-object-fit="cover" />
			<div class="wp-block-cover__inner-container">

				<!-- wp:group {"style":{"border":{"radius":{"topRight":"1rem","bottomLeft":"1rem"}},"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"gradient":"backdrop-blur-dark","className":"is-style-backdrop-blur","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-backdrop-blur has-backdrop-blur-dark-gradient-background has-background" style="border-top-right-radius:1rem;border-bottom-left-radius:1rem">

					<!-- wp:heading {"fontSize":"h-4"} -->
					<h2 class="wp-block-heading has-h-4-font-size"><?php Block_Pattern::the_text( 'title/m' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-outline"} -->
						<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:group -->

			</div>
		</div>
		<!-- /wp:cover -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
