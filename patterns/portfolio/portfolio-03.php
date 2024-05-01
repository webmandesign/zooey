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
	'title'    => _x( 'Project image gallery with sticky description on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'details', 'keyword', 'zooey' ),
		esc_html_x( 'images', 'keyword', 'zooey' ),
		esc_html_x( 'page content', 'keyword', 'zooey' ),
		esc_html_x( 'portfolio', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '1to1-3' );
$image_2 = Block_Pattern::get_image_url( '3to4-1' );

?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}},"className":"is-style-mobile-reverse"} -->
	<div class="wp-block-columns alignwide is-style-mobile-reverse">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:gallery {"columns":1,"linkTo":"none","sizeSlug":"medium"} -->
			<figure class="wp-block-gallery has-nested-images columns-1 is-cropped">

				<!-- wp:image {"sizeSlug":"medium"} -->
				<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"medium"} -->
				<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
				<!-- /wp:image -->

			</figure>
			<!-- /wp:gallery -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}}} -->
			<div class="wp-block-group">

				<!-- wp:post-title /-->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '220' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"layout":{"type":"constrained","contentSize":"560px","justifyContent":"left"}} -->
				<div class="wp-block-group">

					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"fontSize":"s","fontFamily":"supplemental"} -->
						<p class="has-s-font-size has-supplemental-font-family" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/xs' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( 's' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

					<!-- wp:separator {"className":"is-style-dashed"} -->
					<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed" />
					<!-- /wp:separator -->

					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"fontSize":"s","fontFamily":"supplemental"} -->
						<p class="has-s-font-size has-supplemental-font-family" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/xs' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( 's' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

					<!-- wp:separator {"className":"is-style-dashed"} -->
					<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed" />
					<!-- /wp:separator -->

					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"fontSize":"s","fontFamily":"supplemental"} -->
						<p class="has-s-font-size has-supplemental-font-family" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/xs' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( 's' ); ?></p>
						<!-- /wp:paragraph -->

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
<!-- /wp:group -->
