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
	'title'    => _x( 'Image gallery with sticky description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '1to1-1' );
$image_2 = Block_Pattern::get_image_url( '1to1-2' );
$image_3 = Block_Pattern::get_image_url( '3to4-2' );
$image_4 = Block_Pattern::get_image_url( '21to9' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"25%"} -->
		<div class="wp-block-column" style="flex-basis:25%">

			<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

			<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?> img 1 3to4" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"25%"} -->
		<div class="wp-block-column" style="flex-basis:25%">

			<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"dropCap":true} -->
				<p class="has-drop-cap"><?php Block_Pattern::the_text( '150' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '200' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-medium is-style-rounded"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:image {"align":"wide","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topRight":"1rem","bottomRight":"1rem"}}},"className":"is-style-padding-right"} -->
	<figure class="wp-block-image alignwide size-full has-custom-border is-style-padding-right"><img src="<?php echo esc_url_raw( $image_4 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-top-right-radius:1rem;border-bottom-right-radius:1rem" /></figure>
	<!-- /wp:image -->

</div>
<!-- /wp:group -->
