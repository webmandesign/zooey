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
	'inserter' => false,
	'title'    => 'Hidden', // No translation needed.
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-2' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":50,"overlayColor":"black","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|content","top":"var:preset|spacing|content"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-white-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:100vh">
	<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"1000px","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide">

			<!-- wp:heading {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"big"} -->
			<h2 class="wp-block-heading has-big-font-size" style="line-height:1.3"><mark style="background-color:#5f1a37" class="has-inline-color has-base-color"><?php Block_Pattern::the_text( 'title/m' ); ?></mark></h2>
			<!-- /wp:heading -->

			<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-buttons">

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
