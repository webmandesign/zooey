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
	'title'    => _x( 'Wide featured image followed with post date, title and intro text', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:post-featured-image {"height":"20em","sizeSlug":"large","align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|l"}}}} /-->

	<!-- wp:post-date {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} /-->

	<!-- wp:post-title {"level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|l","top":"var:preset|spacing|s"}}}} /-->

	<!-- wp:paragraph {"dropCap":true,"fontSize":"l"} -->
	<p class="has-drop-cap has-l-font-size"><?php Block_Pattern::the_text( '210' ); ?></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
