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
	'title'         => _x( 'Image with right padding', 'Block pattern title.', 'zooey' ),
	'viewportWidth' => 'alignfull',
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '21to9' );

?>

<!-- wp:image {"align":"wide","sizeSlug":"full","style":{"border":{"radius":{"topRight":"1rem","bottomRight":"1rem"}}},"className":"is-style-padding-right"} -->
<figure class="wp-block-image alignwide size-full has-custom-border is-style-padding-right"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-top-right-radius:1rem;border-bottom-right-radius:1rem" /></figure>
<!-- /wp:image -->
