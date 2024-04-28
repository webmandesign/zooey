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
	'title'    => _x( '3 columns of images with hover content', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
		esc_html_x( 'cover', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-1' );
$image_2 = Block_Pattern::get_image_url( '3to4-2' );
$image_3 = Block_Pattern::get_image_url( '3to4-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":62,"minHeightUnit":"vh","style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}},"border":{"radius":"0.38rem"}},"className":"is-style-hover-content","layout":{"type":"constrained","contentSize":"240px"}} -->
			<div class="wp-block-cover is-style-hover-content" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:62vh">
				<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_1 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
					<h3 class="wp-block-heading has-text-align-center has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.25","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xxxl"} -->
					<p class="has-text-align-center has-xxxl-font-size" style="font-style:normal;font-weight:700;line-height:1.25"><?php Block_Pattern::the_text( 1, '.' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
					<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">

						<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
						<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->

					</div>
					<!-- /wp:buttons -->

				</div>
			</div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_2 ); ?>","dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":62,"minHeightUnit":"vh","style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}},"border":{"radius":"0.38rem"}},"layout":{"type":"constrained","contentSize":"240px"}} -->
			<div class="wp-block-cover" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:62vh">
				<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_2 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
					<h3 class="wp-block-heading has-text-align-center has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.25","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xxxl"} -->
					<p class="has-text-align-center has-xxxl-font-size" style="font-style:normal;font-weight:700;line-height:1.25"><?php Block_Pattern::the_text( 1, '.' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
					<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">
						<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
						<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

				</div>
			</div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_3 ); ?>","dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":62,"minHeightUnit":"vh","style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}},"border":{"radius":"0.38rem"}},"className":"is-style-hover-content","layout":{"type":"constrained","contentSize":"240px"}} -->
			<div class="wp-block-cover is-style-hover-content" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:62vh">
				<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_3 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
					<h3 class="wp-block-heading has-text-align-center has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.25","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xxxl"} -->
					<p class="has-text-align-center has-xxxl-font-size" style="font-style:normal;font-weight:700;line-height:1.25"><?php Block_Pattern::the_text( 1, '.' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
					<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">

						<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
						<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->

					</div>
					<!-- /wp:buttons -->

				</div>
			</div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
