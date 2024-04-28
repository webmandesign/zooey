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
	'title'    => _x( 'Call to action with 3 columns of images with short description below', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '1to1-1' );
$image_2 = Block_Pattern::get_image_url( '1to1-2' );
$image_3 = Block_Pattern::get_image_url( '1to1-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"backgroundColor":"base-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-alt-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"h-3"} -->
			<h2 class="wp-block-heading has-h-3-font-size" style="font-style:normal;font-weight:400"><?php Block_Pattern::the_text( '55' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"m"} -->
			<div class="wp-block-button has-custom-font-size has-m-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--l)">

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary","className":"has-hidden-overflow"} -->
		<div class="wp-block-column has-hidden-overflow has-primary-background-color has-background" style="border-radius:0.38rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

			<!-- wp:image {"sizeSlug":"thumbnail"} -->
			<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"},"blockGap":{"top":"0.5em","left":"0.5em"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"s"} -->
				<p class="has-s-font-size"><?php Block_Pattern::the_text( '80' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary","className":"has-hidden-overflow"} -->
		<div class="wp-block-column has-hidden-overflow has-primary-background-color has-background" style="border-radius:0.38rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

			<!-- wp:image {"sizeSlug":"thumbnail"} -->
			<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"},"blockGap":{"top":"0.5em","left":"0.5em"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"s"} -->
				<p class="has-s-font-size"><?php Block_Pattern::the_text( '80' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary","className":"has-hidden-overflow"} -->
		<div class="wp-block-column has-hidden-overflow has-primary-background-color has-background" style="border-radius:0.38rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

			<!-- wp:image {"sizeSlug":"thumbnail"} -->
			<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"},"blockGap":{"top":"0.5em","left":"0.5em"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"s"} -->
				<p class="has-s-font-size"><?php Block_Pattern::the_text( '80' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
