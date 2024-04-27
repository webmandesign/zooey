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
	'title'    => _x( 'Page title, call to action with gallery and large vertical text on the side', 'Block pattern title.', 'zooey' ),
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
$image_2 = Block_Pattern::get_image_url( '3to4-3' );
$image_3 = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","minHeight":200,"minHeightUnit":"px","gradient":"secondary-to-transparent-v","contentPosition":"bottom center","align":"full","style":{"spacing":{"padding":{"bottom":"0","top":"0"}},"color":{"duotone":"var:preset|duotone|secondary"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center has-contrast-alt-color has-text-color has-link-color" style="padding-top:0;padding-bottom:0;min-height:200px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-secondary-to-transparent-v-gradient-background"></span>
	<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_1 ); ?>" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">

		<!-- wp:template-part {"align":"wide","slug":"custom-header-top"} /-->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|l"},"margin":{"top":"var:preset|spacing|l"}}},"className":"is-style-mobile-reverse"} -->
		<div class="wp-block-columns alignwide is-style-mobile-reverse" style="margin-top:var(--wp--preset--spacing--l)">

			<!-- wp:column {"verticalAlignment":"bottom","width":"58%"} -->
			<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:58%">

				<!-- wp:gallery {"linkTo":"none","sizeSlug":"thumbnail","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
				<figure class="wp-block-gallery has-nested-images columns-default is-cropped">

					<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}},"className":"is-style-blur-overlay"} -->
					<figure class="wp-block-image size-thumbnail has-custom-border is-style-blur-overlay"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-top-left-radius:1rem;border-top-right-radius:1rem" /></figure>
					<!-- /wp:image -->

					<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}},"className":"is-style-blur-overlay"} -->
					<figure class="wp-block-image size-thumbnail has-custom-border is-style-blur-overlay"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-top-left-radius:1rem;border-top-right-radius:1rem" /></figure>
					<!-- /wp:image -->

				</figure>
				<!-- /wp:gallery -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|content"}}}} -->
			<div class="wp-block-column" style="padding-bottom:var(--wp--preset--spacing--content)">

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"stretch"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"align":"right","style":{"typography":{"textTransform":"lowercase","fontStyle":"normal","fontWeight":"600","writingMode":"vertical-rl","lineHeight":"0.7"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","className":"is-style-no-text-wrap","fontSize":"mega","fontFamily":"supplemental"} -->
					<p class="has-text-align-right is-style-no-text-wrap has-primary-color has-text-color has-link-color has-supplemental-font-family has-mega-font-size" style="font-style:normal;font-weight:600;line-height:0.7;text-transform:lowercase;writing-mode:vertical-rl"><?php esc_html_e( 'Hello.', 'zooey' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"bottom","flexWrap":"nowrap"}} -->
					<div class="wp-block-group">

						<!-- wp:post-title {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->

						<!-- wp:group {"layout":{"type":"constrained","contentSize":"400px","justifyContent":"left"}} -->
						<div class="wp-block-group">

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
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
</div>
<!-- /wp:cover -->
