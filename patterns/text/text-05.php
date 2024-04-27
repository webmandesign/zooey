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
	'title' => _x( 'Centered bold text', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignwide">

	<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xxxl"} -->
	<p class="has-text-align-center has-xxxl-font-size" style="font-style:normal;font-weight:700;line-height:1.2"><?php Block_Pattern::the_text( '160' ); ?></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
