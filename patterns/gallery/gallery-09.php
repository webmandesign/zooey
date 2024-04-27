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
	'title'    => _x( '3 columns with images and text', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-1' );
$image_2 = Block_Pattern::get_image_url( '3to4-2' );
$image_3 = Block_Pattern::get_image_url( '3to2-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"33.33%","layout":{"type":"constrained","contentSize":"320px","justifyContent":"left"}} -->
		<div class="wp-block-column" style="flex-basis:33.33%">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '160' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:gallery {"linkTo":"none"} -->
			<figure class="wp-block-gallery has-nested-images columns-default is-cropped">

				<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
				<!-- /wp:image -->

			</figure>
			<!-- /wp:gallery -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"verticalAlignment":"bottom","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-bottom">

		<!-- wp:column {"verticalAlignment":"bottom","width":"66.66%"} -->
		<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:66.66%">

			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","layout":{"type":"constrained","contentSize":"320px","justifyContent":"right"}} -->
		<div class="wp-block-column is-vertically-aligned-bottom">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '95' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
