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
	'title'    => _x( 'Wide gallery of 2 images', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
		esc_html_x( 'image', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-3' );
$image_2 = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:0">

	<!-- wp:gallery {"linkTo":"none","align":"wide"} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-default is-cropped">

		<!-- wp:image {"sizeSlug":"medium"} -->
		<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"medium"} -->
		<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

	</figure>
	<!-- /wp:gallery -->

</div>
<!-- /wp:group -->
