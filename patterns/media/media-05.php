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
	'title'         => _x( 'Image with right padding', 'Block pattern title.', 'zooey' ),
	'viewportWidth' => 'alignfull',
) );

// Block pattern content:

$image = Demo::Get_image_url( '21to9' );

?>

<!-- wp:image {"sizeSlug":"full","align":"wide","style":{"color":{"duotone":"var:preset|duotone|primary"}},"className":"is-style-padding-right"} -->
<figure class="wp-block-image alignwide size-full is-style-padding-right"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
<!-- /wp:image -->
