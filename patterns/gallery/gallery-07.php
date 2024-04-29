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
	'title'    => _x( 'Sticky gallery', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to2-3' );
$image_2 = Block_Pattern::get_image_url( '3to2-2' );
$image_3 = Block_Pattern::get_image_url( '3to2-1' );

?>

<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"right":"0","left":"0"},"margin":{"top":"0"}}}} -->
<div class="wp-block-columns alignfull" style="margin-top:0;padding-right:0;padding-left:0">

	<!-- wp:column {"width":"44%"} -->
	<div class="wp-block-column" style="flex-basis:44%">

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|l","left":"var:preset|spacing|l","top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}},"dimensions":{"minHeight":"100vh"},"position":{"type":"sticky","top":"0px"}},"backgroundColor":"secondary","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
		<div class="wp-block-group has-secondary-background-color has-background" style="min-height:100vh;padding-top:var(--wp--preset--spacing--content);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--content);padding-left:var(--wp--preset--spacing--l)">

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"560px"}} -->
			<div class="wp-block-group">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"m"} -->
				<h2 class="wp-block-heading has-m-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"xxxl"} -->
				<p class="has-xxxl-font-size" style="line-height:1.3"><?php Block_Pattern::the_text( '75' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"is-style-checkmark"} -->
				<ul class="is-style-checkmark">
					<!-- wp:list-item -->
					<li><?php Block_Pattern::the_text( 's' ); ?></li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li><?php Block_Pattern::the_text( 'm' ); ?></li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li><?php Block_Pattern::the_text( 's' ); ?></li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li><?php Block_Pattern::the_text( 'm' ); ?></li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li><?php Block_Pattern::the_text( 's' ); ?></li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
	<div class="wp-block-column">

		<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}}} -->
		<div class="wp-block-group">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium","style":{"border":{"radius":"0px"}},"className":"is-fullwidth"} -->
			<figure class="wp-block-image size-medium has-custom-border is-fullwidth"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:0px;aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}}} -->
		<div class="wp-block-group">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium","style":{"border":{"radius":"0px"}},"className":"is-fullwidth"} -->
			<figure class="wp-block-image size-medium has-custom-border is-fullwidth"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:0px;aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}}} -->
		<div class="wp-block-group">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium","style":{"border":{"radius":"0px"}},"className":"is-fullwidth"} -->
			<figure class="wp-block-image size-medium has-custom-border is-fullwidth"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:0px;aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
