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
	'title'    => _x( 'Wide gallery of 2 images', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
		esc_html_x( 'image', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$images = array(
	Demo::Get_image_url( '3to4-3' ),
	Demo::Get_image_url( '3to4-2' ),
);

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:0">

	<!-- wp:gallery {"linkTo":"none","align":"wide"} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-default is-cropped">

		<?php foreach ( $images as $url ) : ?>
		<!-- wp:image {"sizeSlug":"medium"} -->
		<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $url ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->
		<?php endforeach; ?>

	</figure>
	<!-- /wp:gallery -->

</div>
<!-- /wp:group -->
