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
	'title'    => _x( 'Altering features with 2 images on the side overlaying a pattern background', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-1' );
$image_2 = Block_Pattern::get_image_url( '1to1-2' );
$image_p = Block_Pattern::get_image_url( 'p' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"0","left":"0"},"margin":{"top":"0"}}},"backgroundColor":"primary"} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_p ); ?>","isRepeated":true,"gradient":"secondary-cut-transparent-h","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-cover is-repeated" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-secondary-cut-transparent-h-gradient-background"></span>
		<div role="img" class="wp-block-cover__image-background is-repeated" style="background-position:50% 50%;background-image:url(<?php echo esc_url_raw( $image_p ); ?>)"></div><div class="wp-block-cover__inner-container">

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">

				<!-- wp:column {"verticalAlignment":"center","width":"38.2%","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem"}},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary"} -->
				<div class="wp-block-column is-vertically-aligned-center has-secondary-background-color has-background" style="border-radius:0.38rem;padding-top:3rem;padding-bottom:3rem;flex-basis:38.2%">

					<!-- wp:heading {"style":{"spacing":{"margin":{"top":"var:preset|spacing|s"}}}} -->
					<h2 class="wp-block-heading" style="margin-top:var(--wp--preset--spacing--s)"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '110' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button -->
						<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"61.8%"} -->
				<div class="wp-block-column" style="flex-basis:61.8%">

					<!-- wp:gallery {"linkTo":"none"} -->
					<figure class="wp-block-gallery has-nested-images columns-default is-cropped">

						<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|black"}},"className":"is-style-rounded"} -->
						<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|black"}},"className":"is-style-rounded"} -->
						<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
						<!-- /wp:image -->

					</figure>
					<!-- /wp:gallery -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:group -->

	</div></div>
	<!-- /wp:cover -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"0","left":"0"},"margin":{"top":"0"}}},"backgroundColor":"primary"} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_p ); ?>","isRepeated":true,"gradient":"transparent-cut-secondary-h","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-cover is-repeated" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-transparent-cut-secondary-h-gradient-background"></span>
		<div role="img" class="wp-block-cover__image-background is-repeated" style="background-position:50% 50%;background-image:url(<?php echo esc_url_raw( $image_p ); ?>)"></div><div class="wp-block-cover__inner-container">

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">

			<!-- wp:columns {"align":"wide","className":"is-style-mobile-reverse"} -->
			<div class="wp-block-columns alignwide is-style-mobile-reverse">

				<!-- wp:column {"width":"61.8%"} -->
				<div class="wp-block-column" style="flex-basis:61.8%">

					<!-- wp:gallery {"linkTo":"none"} -->
					<figure class="wp-block-gallery has-nested-images columns-default is-cropped">

						<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|black"}},"className":"is-style-rounded"} -->
						<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|black"}},"className":"is-style-rounded"} -->
						<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
						<!-- /wp:image -->

					</figure>
					<!-- /wp:gallery -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"38.2%","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem"}},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary"} -->
				<div class="wp-block-column is-vertically-aligned-center has-secondary-background-color has-background" style="border-radius:0.38rem;padding-top:3rem;padding-bottom:3rem;flex-basis:38.2%">

					<!-- wp:heading {"style":{"spacing":{"margin":{"top":"var:preset|spacing|s"}}}} -->
					<h2 class="wp-block-heading" style="margin-top:var(--wp--preset--spacing--s)"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '110' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">
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

	</div></div>
	<!-- /wp:cover -->

</div>
<!-- /wp:group -->
