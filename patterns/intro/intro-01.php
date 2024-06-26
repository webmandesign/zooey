<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.1
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => _x( 'Page title with background image with zoom in animation, features list, and buttons', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-3' );

?>

<!-- wp:cover {"useFeaturedImage":true,"dimRatio":70,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":80,"minHeightUnit":"vh","contentPosition":"bottom center","align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|content","top":"16em"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"is-style-zoom-in","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center is-style-zoom-in has-white-color has-text-color has-link-color" style="padding-top:16em;padding-bottom:var(--wp--preset--spacing--content);min-height:80vh">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide">

			<!-- wp:post-title {"level":1} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"constrained"},"fontSize":"l"} -->
			<div class="wp-block-group has-l-font-size">

				<!-- wp:list {"className":"is-style-checkmark"} -->
				<ul class="is-style-checkmark">
					<!-- wp:list-item -->
					<li><?php Block_Pattern::the_text( '15' ); ?></li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li><?php Block_Pattern::the_text( '30' ); ?></li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li><?php Block_Pattern::the_text( '25' ); ?></li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|l"},"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--l)">

				<!-- wp:button {"backgroundColor":"white","fontSize":"m"} -->
				<div class="wp-block-button has-custom-font-size has-m-font-size"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"fontSize":"m","className":"is-style-outline"} -->
				<div class="wp-block-button has-custom-font-size has-m-font-size is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

</div></div>
<!-- /wp:cover -->
