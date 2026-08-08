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
	'title'    => _x( '3 images with description on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$images = array(
	Demo::get_image_url( '3to4-1' ),
	Demo::get_image_url( '3to4-2' ),
	Demo::get_image_url( '3to4-3' ),
);

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"verticalAlignment":null,"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"75%"} -->
		<div class="wp-block-column" style="flex-basis:75%">

			<!-- wp:gallery {"linkTo":"none"} -->
			<figure class="wp-block-gallery has-nested-images columns-default is-cropped">

				<?php foreach ( $images as $url ) : ?>
				<!-- wp:image {"sizeSlug":"thumbnail"} -->
				<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $url ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
				<!-- /wp:image -->
				<?php endforeach; ?>

			</figure>
			<!-- /wp:gallery -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","width":"25%"} -->
		<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:25%">

			<!-- wp:paragraph -->
			<p><?php Demo::The_text( '150' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
