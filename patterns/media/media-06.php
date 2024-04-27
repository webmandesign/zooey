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
	'title' => _x( 'Fullwidth parallax image', 'Block pattern title.', 'zooey' ),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-3' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","hasParallax":true,"dimRatio":0,"minHeight":80,"minHeightUnit":"vh","align":"full","style":{"spacing":{"margin":{"top":"0"}}}} -->
<div class="wp-block-cover alignfull has-parallax" style="margin-top:0;min-height:80vh">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<div role="img" class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url_raw( $image ); ?>)"></div>
	<div class="wp-block-cover__inner-container">

		<!-- wp:spacer {"height":"var:preset|spacing|content"} -->
		<div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

	</div>
</div>
<!-- /wp:cover -->
