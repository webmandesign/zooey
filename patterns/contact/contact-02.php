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
	'title'    => _x( 'Map image with link to online map', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( 'map' );

?>

<!-- wp:image {"align":"wide","sizeSlug":"full","linkDestination":"custom","style":{"spacing":{"margin":{"top":"0"}},"border":{"radius":"0.38rem"},"color":{"duotone":"var:preset|duotone|primary"}},"className":"is-fullwidth"} -->
<figure class="wp-block-image alignwide size-full has-custom-border is-fullwidth" style="margin-top:0"><a href="https://www.openstreetmap.org/"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:0.38rem"/></a></figure>
<!-- /wp:image -->
