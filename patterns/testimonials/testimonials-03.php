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
	'title'    => _x( 'List of logos with 2 quotes below', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'testimonials', 'keyword', 'zooey' ),
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
		esc_html_x( 'image', 'keyword', 'zooey' ),
		esc_html_x( 'clients', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( 'l-1' );
$image_2 = Block_Pattern::get_image_url( 'l-2' );
$image_3 = Block_Pattern::get_image_url( 'l-3' );
$image_4 = Block_Pattern::get_image_url( '1to1-1' );
$image_5 = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:gallery {"columns":6,"imageCrop":false,"linkTo":"none","align":"wide"} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-6">

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

	</figure>
	<!-- /wp:gallery -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:columns -->
			<div class="wp-block-columns">

				<!-- wp:column {"width":"80px"} -->
				<div class="wp-block-column" style="flex-basis:80px">

					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
					<figure class="wp-block-image size-thumbnail is-resized is-style-rounded"><img src="<?php echo esc_url_raw( $image_4 ); ?>" alt="" style="aspect-ratio:1;object-fit:cover;width:80px"/></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":""} -->
				<div class="wp-block-column">

					<!-- wp:quote {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
					<blockquote class="wp-block-quote" style="font-style:normal;font-weight:400">
						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '160' ); ?></p>
						<!-- /wp:paragraph -->
						<cite><?php Block_Pattern::the_text( 'people/name' ); ?></cite>
					</blockquote>
					<!-- /wp:quote -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:columns -->
			<div class="wp-block-columns">

				<!-- wp:column {"width":"80px"} -->
				<div class="wp-block-column" style="flex-basis:80px">

					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
					<figure class="wp-block-image size-thumbnail is-resized is-style-rounded"><img src="<?php echo esc_url_raw( $image_5 ); ?>" alt="" style="aspect-ratio:1;object-fit:cover;width:80px"/></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":""} -->
				<div class="wp-block-column">

					<!-- wp:quote {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
					<blockquote class="wp-block-quote" style="font-style:normal;font-weight:400">
						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '160' ); ?></p>
						<!-- /wp:paragraph -->
						<cite><?php Block_Pattern::the_text( 'people/name' ); ?></cite>
					</blockquote>
					<!-- /wp:quote -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
