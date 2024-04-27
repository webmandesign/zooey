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
	'title'    => _x( 'Call to action in a large column with blurred background and 2 buttons overlaying a parallax background', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-2' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","hasParallax":true,"dimRatio":0,"minHeight":200,"minHeightUnit":"px","contentPosition":"center center","align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"0","right":"0","left":"0","bottom":"0"}}}} -->
<div class="wp-block-cover alignfull has-parallax" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<div role="img" class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url_raw( $image ); ?>)"></div>
	<div class="wp-block-cover__inner-container">

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
		<div class="wp-block-columns" style="margin-top:0;margin-bottom:0">

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">

				<!-- wp:group {"style":{"dimensions":{"minHeight":"80vh"},"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"textColor":"white","gradient":"backdrop-blur-dark","className":"is-style-backdrop-blur","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
				<div class="wp-block-group is-style-backdrop-blur has-white-color has-backdrop-blur-dark-gradient-background has-text-color has-background" style="border-radius:0px;min-height:80vh;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

					<!-- wp:group {"layout":{"type":"constrained","contentSize":"440px"}} -->
					<div class="wp-block-group">

						<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
						<h2 class="wp-block-heading" style="font-style:normal;font-weight:400"><?php Block_Pattern::the_text( 'title/m' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '90' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|l"},"blockGap":"var:preset|spacing|s"}}} -->
						<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--l)">

							<!-- wp:button {"backgroundColor":"white"} -->
							<div class="wp-block-button"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
							<!-- /wp:button -->

							<!-- wp:button {"className":"is-style-outline"} -->
							<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
							<!-- /wp:button -->

						</div>
						<!-- /wp:buttons -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"></div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
</div>
<!-- /wp:cover -->
