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
	'title'    => _x( 'Call to action with bottom aligned gallery', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to2-3' );
$image_2 = Block_Pattern::get_image_url( '3to2-2' );
$image_3 = Block_Pattern::get_image_url( '3to4-1' );
$image_4 = Block_Pattern::get_image_url( '1to1-2' );
$image_5 = $image_1;

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|content","bottom":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:0">

	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|l"}}},"layout":{"type":"constrained","contentSize":"540px","wideSize":"800px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--l)">

		<!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="wp-block-heading alignwide has-text-align-center"><?php Block_Pattern::the_text( 'title/m' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php Block_Pattern::the_text( '100' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">

			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
			<!-- /wp:button -->

		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"isStackedOnMobile":false,"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
	<div class="wp-block-columns alignwide is-not-stacked-on-mobile">

		<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column is-vertically-aligned-bottom">

			<!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:3/2;object-fit:cover" /></figure>
			<!-- /wp:image -->

			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column is-vertically-aligned-bottom">

			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column is-vertically-aligned-bottom">

			<!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_4 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:3/2;object-fit:cover" /></figure>
			<!-- /wp:image -->

			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_5 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
