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
	'title'    => _x( '3 covers with buttons in tiled layout', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
		esc_html_x( 'cover', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '1to1-1' );
$image_2 = Block_Pattern::get_image_url( '1to1-2' );
$image_3 = Block_Pattern::get_image_url( '1to1-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","dimRatio":0,"minHeight":100,"minHeightUnit":"%","contentPosition":"bottom center","isDark":false,"style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"left":"0","bottom":"0","right":"0","top":"16em"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center" style="border-radius:0.38rem;padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:100%">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_1 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group has-white-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--s)">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"xl"} -->
						<p class="has-xl-font-size" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'title/s' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">

							<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
							<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
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

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_2 ); ?>","dimRatio":0,"minHeight":40,"minHeightUnit":"vh","contentPosition":"bottom center","isDark":false,"style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"left":"0","bottom":"0","right":"0","top":"16em"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center" style="border-radius:0.38rem;padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:40vh">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_2 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group has-white-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--s)">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"xl"} -->
						<p class="has-xl-font-size" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'title/s' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">

							<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
							<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
							<!-- /wp:button -->

						</div>
						<!-- /wp:buttons -->

					</div>
					<!-- /wp:group -->

				</div>
			</div>
			<!-- /wp:cover -->

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_3 ); ?>","dimRatio":0,"minHeight":40,"minHeightUnit":"vh","contentPosition":"bottom center","isDark":false,"style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"left":"0","bottom":"0","right":"0","top":"16em"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center" style="border-radius:0.38rem;padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:40vh">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_3 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group has-white-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--s)">

						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"xl"} -->
						<p class="has-xl-font-size" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'title/s' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">

							<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
							<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
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

</div>
<!-- /wp:group -->
