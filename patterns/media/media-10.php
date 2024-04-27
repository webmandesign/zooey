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
	'title'    => _x( 'Heading and description with 2 images, larger image is on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-1' );
$image_2 = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column {"layout":{"type":"constrained","justifyContent":"left","contentSize":"480px"}} -->
	<div class="wp-block-column">

		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '160' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:image {"width":"360px","sizeSlug":"full","linkDestination":"none","style":{"spacing":{"margin":{"top":"var:preset|spacing|content"}}},"className":"is-style-rounded"} -->
		<figure class="wp-block-image size-full is-resized is-style-rounded" style="margin-top:var(--wp--preset--spacing--content)"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="width:360px" /></figure>
		<!-- /wp:image -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-full is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
		<!-- /wp:image -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
