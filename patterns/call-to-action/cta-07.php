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
	'title'    => _x( 'Call to action with image and fullwidth button on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'portfolio', 'keyword', 'zooey' ),
		esc_html_x( 'projects', 'keyword', 'zooey' ),
		esc_html_x( 'features', 'keyword', 'zooey' ),
		esc_html_x( 'services', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"61.8%","style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"540px"}} -->
		<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);flex-basis:61.8%">

			<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="min-height:100%">

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
				<div class="wp-block-group">

					<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
					<h2 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","fontSize":"h-4","fontFamily":"supplemental"} -->
					<p class="has-contrast-alt-color has-text-color has-link-color has-supplemental-font-family has-h-4-font-size" style="font-style:normal;font-weight:700;line-height:1.2"><?php Block_Pattern::the_text( '50' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '170' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"38.2%"} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">

				<!-- wp:button {"width":100} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
