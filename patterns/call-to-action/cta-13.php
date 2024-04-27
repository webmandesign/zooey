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
	'title'    => _x( '2 images with large text and button below', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 800,
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-1' );
$image_2 = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:group -->
<div class="wp-block-group">

	<!-- wp:gallery {"linkTo":"none","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
	<figure class="wp-block-gallery has-nested-images columns-default is-cropped">

		<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
		<!-- /wp:image -->

	</figure>
	<!-- /wp:gallery -->

	<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","fontSize":"h-3","fontFamily":"supplemental"} -->
	<p class="has-contrast-alt-color has-text-color has-link-color has-supplemental-font-family has-h-3-font-size" style="line-height:1.2"><?php Block_Pattern::the_text( '60' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">

		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
		<!-- /wp:button -->

	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
