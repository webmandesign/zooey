<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.5
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

$images_logo = array(
	Demo::get_image_url( 'l-1' ),
	Demo::get_image_url( 'l-2' ),
	Demo::get_image_url( 'l-3' ),
	Demo::get_image_url( 'l-1' ),
	Demo::get_image_url( 'l-3' ),
	Demo::get_image_url( 'l-2' ),
);

$images = array(
	Demo::get_image_url( '1to1-1' ),
	Demo::get_image_url( '1to1-2' ),
);

?>

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Logos & testimonials', 'zooey' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:gallery {"columns":6,"imageCrop":false,"linkTo":"none","align":"wide"} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-6">

		<?php foreach ( $images_logo as $url ) : ?>
		<!-- wp:image {"sizeSlug":"thumbnail","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $url ); ?>" alt="<?php echo esc_attr( Demo::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->
		<?php endforeach; ?>

	</figure>
	<!-- /wp:gallery -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<?php foreach ( $images as $url ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|m"}}}} -->
			<div class="wp-block-columns">

				<!-- wp:column {"width":"80px"} -->
				<div class="wp-block-column" style="flex-basis:80px">

					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail"} -->
					<figure class="wp-block-image size-thumbnail is-resized"><img src="<?php echo esc_url_raw( $url ); ?>" alt="" style="aspect-ratio:1;object-fit:cover;width:80px"/></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":""} -->
				<div class="wp-block-column">

					<!-- wp:quote -->
					<blockquote class="wp-block-quote">
						<!-- wp:paragraph -->
						<p><?php Demo::The_text( '140' ); ?></p>
						<!-- /wp:paragraph -->
						<cite><?php Demo::The_text( 'people/name' ); ?></cite>
					</blockquote>
					<!-- /wp:quote -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
