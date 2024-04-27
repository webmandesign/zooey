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
	'title'    => _x( 'Title with description overlaying parallax image', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gradient', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image   = Block_Pattern::get_image_url( '3to2-2' );
$image_s = Block_Pattern::get_image_url( 's' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","hasParallax":true,"minHeight":80,"minHeightUnit":"vh","gradient":"contrast-alt-cut-transparent-h","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}}} -->
<div class="wp-block-cover alignfull has-parallax" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:80vh">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-contrast-alt-cut-transparent-h-gradient-background"></span>
	<div role="img" class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url_raw( $image ); ?>)"></div>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">

				<!-- wp:column {"width":"50%","backgroundColor":"contrast-alt","style":{"border":{"radius":"0.38rem"}}} -->
				<div class="wp-block-column has-contrast-alt-background-color has-background" style="border-radius:0.38rem;flex-basis:50%">

					<!-- wp:heading -->
					<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/l' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:separator {"className":"is-style-dashed"} -->
					<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
					<!-- /wp:separator -->

					<!-- wp:group {"layout":{"type":"constrained","contentSize":"400px","justifyContent":"left"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '135' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:image {"sizeSlug":"thumbnail","style":{"color":{"duotone":"var:preset|duotone|white"}}} -->
						<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_s ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
						<!-- /wp:image -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"></div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
