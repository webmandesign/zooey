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
	'title'    => _x( 'Gallery of framed images with caption on a blurred background', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_0 = Block_Pattern::get_image_url( '3to2-1' );
$image_1 = Block_Pattern::get_image_url( '3to4-1' );
$image_2 = Block_Pattern::get_image_url( '3to4-3' );
$image_3 = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_0 ); ?>","dimRatio":0,"minHeight":80,"minHeightUnit":"vh","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"className":"is-style-image-blur","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light is-style-image-blur" style="padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:80vh">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<img class="wp-block-cover__image-background" src="<?php echo esc_url_raw( $image_0 ); ?>" alt="" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">

		<!-- wp:gallery {"linkTo":"none","align":"wide"} -->
		<figure class="wp-block-gallery alignwide has-nested-images columns-default is-cropped">

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","backgroundColor":"primary","className":"is-style-frame"} -->
			<figure class="wp-block-image size-medium is-style-frame has-primary-background-color has-background">
				<a href="#0"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></a>
				<figcaption class="wp-element-caption"><?php Block_Pattern::the_text( 'title/s' ); ?></figcaption>
			</figure>
			<!-- /wp:image -->

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","backgroundColor":"primary","className":"is-style-frame"} -->
			<figure class="wp-block-image size-medium is-style-frame has-primary-background-color has-background">
				<a href="#0"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></a>
				<figcaption class="wp-element-caption"><?php Block_Pattern::the_text( 'title/s' ); ?></figcaption>
			</figure>
			<!-- /wp:image -->

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","backgroundColor":"primary","className":"is-style-frame"} -->
			<figure class="wp-block-image size-medium is-style-frame has-primary-background-color has-background">
				<a href="#0"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></a>
				<figcaption class="wp-element-caption"><?php Block_Pattern::the_text( 'title/s' ); ?></figcaption>
			</figure>
			<!-- /wp:image -->

		</figure>
		<!-- /wp:gallery -->

	</div>
</div>
<!-- /wp:cover -->
