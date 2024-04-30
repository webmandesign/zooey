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
	'title' => _x( 'Giant text', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:paragraph {"align":"wide","style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"textColor":"contrast-alt","fontSize":"giant","fontFamily":"supplemental"} -->
<p class="alignwide has-text-align-wide has-contrast-alt-color has-text-color has-supplemental-font-family has-giant-font-size" style="font-style:normal;font-weight:900"><?php Block_Pattern::the_text( '60' ); ?></p>
<!-- /wp:paragraph -->
