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
	'title'    => _x( 'Map image with link to online map', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Demo::Get_image_url( 'map' );

?>

<!-- wp:image {"sizeSlug":"large","linkDestination":"custom","align":"wide","style":{"spacing":{"margin":{"top":"0"}},"color":{"duotone":"var:preset|duotone|primary"}},"className":"is-fullwidth"} -->
<figure class="wp-block-image alignwide size-large is-fullwidth" style="margin-top:0"><a href="https://www.openstreetmap.org/"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></a></figure>
<!-- /wp:image -->
