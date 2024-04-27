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
	'title'    => _x( '3 numbered features', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'steps', 'keyword', 'zooey' ),
		esc_html_x( 'features', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'services', 'keyword', 'zooey' ),
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '1to1-2' );
$image_2 = Block_Pattern::get_image_url( '1to1-3' );
$image_3 = Block_Pattern::get_image_url( '3to2-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","dimRatio":0,"minHeight":50,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-top-left-radius:1rem;border-top-right-radius:1rem;padding-top:var(--wp--preset--spacing--content);padding-right:0;padding-bottom:0;padding-left:0;min-height:50vh">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_1 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:group {"gradient":"transparent-to-primary-v"} -->
					<div class="wp-block-group has-transparent-to-primary-v-gradient-background has-background">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"6em","lineHeight":"1"}}} -->
						<p style="font-size:6em;line-height:1">01</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
			</div>
			<!-- /wp:cover -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"padding":{"top":"0"}},"border":{"radius":{"bottomRight":"1rem","bottomLeft":"1rem"}}},"backgroundColor":"primary"} -->
			<div class="wp-block-group has-primary-background-color has-background" style="border-bottom-left-radius:1rem;border-bottom-right-radius:1rem;padding-top:0">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
				<h2 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '90' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">

					<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
					<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
					<!-- /wp:button -->

				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_2 ); ?>","dimRatio":0,"minHeight":50,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-top-left-radius:1rem;border-top-right-radius:1rem;padding-top:var(--wp--preset--spacing--content);padding-right:0;padding-bottom:0;padding-left:0;min-height:50vh">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_2 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:group {"gradient":"transparent-to-primary-v"} -->
					<div class="wp-block-group has-transparent-to-primary-v-gradient-background has-background">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"6em","lineHeight":"1"}}} -->
						<p style="font-size:6em;line-height:1">02</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
			</div>
			<!-- /wp:cover -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"padding":{"top":"0"}},"border":{"radius":{"bottomRight":"1rem","bottomLeft":"1rem"}}},"backgroundColor":"primary"} -->
			<div class="wp-block-group has-primary-background-color has-background" style="border-bottom-left-radius:1rem;border-bottom-right-radius:1rem;padding-top:0">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
				<h2 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '90' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">

					<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
					<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
					<!-- /wp:button -->

				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_3 ); ?>","dimRatio":0,"minHeight":50,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-top-left-radius:1rem;border-top-right-radius:1rem;padding-top:var(--wp--preset--spacing--content);padding-right:0;padding-bottom:0;padding-left:0;min-height:50vh">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_3 ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:group {"gradient":"transparent-to-primary-v"} -->
					<div class="wp-block-group has-transparent-to-primary-v-gradient-background has-background">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"6em","lineHeight":"1"}}} -->
						<p style="font-size:6em;line-height:1">03</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
			</div>
			<!-- /wp:cover -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"padding":{"top":"0"}},"border":{"radius":{"bottomRight":"1rem","bottomLeft":"1rem"}}},"backgroundColor":"primary"} -->
			<div class="wp-block-group has-primary-background-color has-background" style="border-bottom-left-radius:1rem;border-bottom-right-radius:1rem;padding-top:0">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
				<h2 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '90' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">

					<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
					<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
					<!-- /wp:button -->

				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
