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
	'title' => _x( 'Custom header image (flipped vertically)', 'Block pattern title.', 'zooey' ),
) );

// Block pattern content:

$image = get_header_image();

?>

<!-- wp:image {"sizeSlug":"full","align":"wide","style":{"spacing":{"margin":{"top":"0"}},"border":{"radius":"0.38rem"}},"className":"is-style-use-header-image-flip-v"} -->
<figure class="wp-block-image alignwide size-full has-custom-border is-style-use-header-image-flip-v" style="margin-top:0"><img src="<?php echo esc_url_raw( $image ); ?>" alt="" style="border-radius:0.38rem"/></figure>
<!-- /wp:image -->
