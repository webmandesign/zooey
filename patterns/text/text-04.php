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
	'title'    => _x( 'Big text on the side with highlighted word', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'mark', 'as highlight; keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-3' );

?>

<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left","contentSize":"960px"}} -->
<div class="wp-block-group alignwide">

	<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","fontSize":"big","fontFamily":"supplemental"} -->
	<p class="has-contrast-alt-color has-text-color has-link-color has-supplemental-font-family has-big-font-size" style="font-style:normal;font-weight:700;line-height:1.1">Lorem <mark class="has-inline-color has-primary-color">ipsum dolor</mark> ✨ sit amet primis 🔥 ultricies ex netus magna</p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
