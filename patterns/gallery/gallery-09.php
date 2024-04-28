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
	'title'    => _x( 'Tiled fullwidth gallery', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'images', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-3' );
$image_2 = Block_Pattern::get_image_url( '3to4-1' );
$image_3 = Block_Pattern::get_image_url( '3to2-3' );
$image_4 = Block_Pattern::get_image_url( '3to2-1' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-group alignfull">

	<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"right":"0","left":"0"}}}} -->
	<div class="wp-block-columns is-not-stacked-on-mobile" style="padding-right:0;padding-left:0">

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"0px"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:0px;aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
			<div class="wp-block-columns is-not-stacked-on-mobile">

				<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
				<div class="wp-block-column">

					<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium","style":{"border":{"radius":"0px"}}} -->
					<figure class="wp-block-image size-medium has-custom-border"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:0px;aspect-ratio:1;object-fit:cover" /></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">

					<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium","style":{"border":{"radius":"0px"}}} -->
					<figure class="wp-block-image size-medium has-custom-border"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:0px;aspect-ratio:1;object-fit:cover" /></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_4 ); ?>","dimRatio":0,"minHeight":50,"minHeightUnit":"%","isDark":false} -->
			<div class="wp-block-cover is-light" style="min-height:50%">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_4 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:spacer {"height":"var:preset|spacing|s"} -->
					<div style="height:var(--wp--preset--spacing--s)" aria-hidden="true" class="wp-block-spacer"></div>
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
