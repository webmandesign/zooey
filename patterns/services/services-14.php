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
	'title'    => _x( '3 boxed columns with icon, description and a button on a subtle pattern background', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'pattern', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_p = Block_Pattern::get_image_url( 'p' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0"}}},"backgroundColor":"primary"} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_p ); ?>","isRepeated":true,"dimRatio":30,"overlayColor":"primary-mixed","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-cover is-repeated" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
		<span aria-hidden="true" class="wp-block-cover__background has-primary-mixed-background-color has-background-dim-30 has-background-dim"></span>
		<div role="img" class="wp-block-cover__image-background is-repeated" style="background-position:50% 50%;background-image:url(<?php echo esc_url_raw( $image_p ); ?>)"></div>
		<div class="wp-block-cover__inner-container">

			<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
			<div class="wp-block-group alignwide">

				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide">

					<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
					<div class="wp-block-column has-primary-background-color has-background" style="border-radius:0.38rem">

						<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}}} -->
						<figure class="wp-block-image size-full" style="margin-bottom:var(--wp--preset--spacing--m)"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
						<h2 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '85' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button {"className":"is-style-outline"} -->
							<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
					<div class="wp-block-column has-primary-background-color has-background" style="border-radius:0.38rem">

						<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}}} -->
						<figure class="wp-block-image size-full" style="margin-bottom:var(--wp--preset--spacing--m)"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
						<h2 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '85' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button {"className":"is-style-outline"} -->
							<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
					<div class="wp-block-column has-primary-background-color has-background" style="border-radius:0.38rem">

						<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}}} -->
						<figure class="wp-block-image size-full" style="margin-bottom:var(--wp--preset--spacing--m)"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
						<!-- /wp:image -->

						<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
						<h2 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '85' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button {"className":"is-style-outline"} -->
							<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
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
