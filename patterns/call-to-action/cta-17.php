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
	'title'    => _x( 'Call to action with 2 images on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '1to1-2' );
$image_2 = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}},"backgroundColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-alt-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"className":"is-style-mobile-reverse"} -->
	<div class="wp-block-columns alignwide is-style-mobile-reverse">

		<!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%">

			<!-- wp:columns {"isStackedOnMobile":false} -->
			<div class="wp-block-columns is-not-stacked-on-mobile">

				<!-- wp:column -->
				<div class="wp-block-column">

					<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium","className":"is-style-rounded"} -->
					<figure class="wp-block-image size-medium is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="" style="aspect-ratio:1;object-fit:cover" /></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">

					<!-- wp:image {"aspectRatio":"2/3","scale":"cover","sizeSlug":"medium","className":"is-style-rounded"} -->
					<figure class="wp-block-image size-medium is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="" style="aspect-ratio:2/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"33.33%","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/l' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '150' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">

				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
