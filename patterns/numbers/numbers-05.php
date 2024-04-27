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
	'title'    => _x( 'Stats with image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'percentage', 'keyword', 'zooey' ),
		esc_html_x( 'stats', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|content"}}},"backgroundColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-alt-background-color has-background" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"38.2%","style":{"spacing":{"padding":{"top":"var:preset|spacing|content"}}}} -->
		<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--content);flex-basis:38.2%">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"1em","left":"1em"},"margin":{"top":"var:preset|spacing|l"}}}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--l)">

				<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
				<div class="wp-block-columns is-not-stacked-on-mobile">

					<!-- wp:column {"width":"4em"} -->
					<div class="wp-block-column" style="flex-basis:4em">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}}} -->
						<p style="font-style:normal;font-weight:900">100%</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '85' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

				<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
				<div class="wp-block-columns is-not-stacked-on-mobile">

					<!-- wp:column {"width":"4em"} -->
					<div class="wp-block-column" style="flex-basis:4em">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}}} -->
						<p style="font-style:normal;font-weight:900">365</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '80' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

				<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
				<div class="wp-block-columns is-not-stacked-on-mobile">

					<!-- wp:column {"width":"4em"} -->
					<div class="wp-block-column" style="flex-basis:4em">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}}} -->
						<p style="font-style:normal;font-weight:900">24/7</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '85' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

				<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
				<div class="wp-block-columns is-not-stacked-on-mobile">

					<!-- wp:column {"width":"4em"} -->
					<div class="wp-block-column" style="flex-basis:4em">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}}} -->
						<p style="font-style:normal;font-weight:900">1987</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '80' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"61.8%"} -->
		<div class="wp-block-column" style="flex-basis:61.8%">

			<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}},"className":"is-style-rounded"} -->
			<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
