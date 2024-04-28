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
	'title'    => _x( 'Cover with large centered text', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'image', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-2' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":50,"minHeight":62,"minHeightUnit":"vh","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"560px"}} -->
<div class="wp-block-cover alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:62vh">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">

		<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.3","fontStyle":"normal","fontWeight":"700"}},"fontSize":"h-1","fontFamily":"supplemental"} -->
		<p class="has-text-align-center has-supplemental-font-family has-h-1-font-size" style="font-style:normal;font-weight:700;line-height:1.3"><?php Block_Pattern::the_text( 'title/l' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
</div>
<!-- /wp:cover -->
