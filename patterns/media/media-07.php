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
	'title'    => _x( '3 columns of image with description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to2-1' );
$image_2 = Block_Pattern::get_image_url( '3to2-2' );
$image_3 = Block_Pattern::get_image_url( '3to2-3' );

?>

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '130' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '130' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '130' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
