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
	'title' => _x( 'Intro paragraph with drop cap and classic paragraph', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:paragraph {"dropCap":true,"fontSize":"l"} -->
<p class="has-drop-cap has-l-font-size"><?php Demo::The_text( '280' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php Demo::The_text( '250' ); ?></p>
<!-- /wp:paragraph -->
