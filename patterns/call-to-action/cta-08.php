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
	'title'    => _x( 'Large call to action with image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'portfolio', 'keyword', 'zooey' ),
		esc_html_x( 'projects', 'keyword', 'zooey' ),
		esc_html_x( 'features', 'keyword', 'zooey' ),
		esc_html_x( 'services', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"backgroundColor":"base-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-alt-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="min-height:100%">

				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"xxxl"} -->
				<p class="has-xxxl-font-size" style="line-height:1.3"><?php Block_Pattern::the_text( '180' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"400px","justifyContent":"left"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '90' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">

						<!-- wp:button {"fontSize":"m"} -->
						<div class="wp-block-button has-custom-font-size has-m-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->

					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}},"className":"is-style-rounded"} -->
			<figure class="wp-block-image size-medium is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
