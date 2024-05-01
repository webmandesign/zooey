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
	'title'    => _x( 'Simple center aligned call to action with big text on a parallax image', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'cover', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_p = Block_Pattern::get_image_url( 'p-i' );
$image   = Block_Pattern::get_image_url( '3to2-1' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","hasParallax":true,"dimRatio":60,"overlayColor":"primary","isUserOverlayColor":true,"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0"}}}} -->
<div class="wp-block-cover alignfull has-parallax" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span>
	<div class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url_raw( $image ); ?>)"></div>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}},"dimensions":{"minHeight":"62vh"}},"gradient":"primary-cut-transparent-h","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center","flexWrap":"nowrap"}} -->
		<div class="wp-block-group has-primary-cut-transparent-h-gradient-background has-background" style="min-height:62vh;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">

				<!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"m","fontFamily":"global"} -->
				<h2 class="wp-block-heading has-text-align-center has-global-font-family has-m-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.2"}},"fontSize":"h-3","fontFamily":"supplemental"} -->
				<p class="has-text-align-center has-supplemental-font-family has-h-3-font-size" style="line-height:1.2"><?php Block_Pattern::the_text( 2, '.' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">

					<!-- wp:button {"backgroundColor":"white"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
					<!-- /wp:button -->

				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
