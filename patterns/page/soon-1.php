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
	'title'    => sprintf(
		/* translators: %s: additional notes. */
		_x( 'Coming soon page%s', 'Block pattern title.', 'zooey' ),
		_x( ' (use "Content only" template)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-1' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":70,"minHeight":100,"minHeightUnit":"vh","align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|l","padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained","contentSize":"560px"},"className":"is-style-image-blur"} -->
<div class="wp-block-cover alignfull is-style-image-blur" style="padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:100vh">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="<?php Block_Pattern::the_text( 'alt' ); ?>" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">

		<!-- wp:post-title {"level":1} /-->

		<!-- wp:paragraph {"fontSize":"l"} -->
		<p class="has-l-font-size"><?php Block_Pattern::the_text( '135' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-huge-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only"} -->
		<ul class="wp-block-social-links has-huge-icon-size has-icon-color is-style-logos-only">
			<!-- wp:social-link {"url":"#0","service":"instagram"} /-->
			<!-- wp:social-link {"url":"#0","service":"youtube"} /-->
		</ul>
		<!-- /wp:social-links -->

	</div>
</div>
<!-- /wp:cover -->
