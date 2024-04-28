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
	'title'    => _x( 'Category selector', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'taxonomy', 'keyword', 'zooey' ),
		esc_html_x( 'category', 'keyword', 'zooey' ),
		esc_html_x( 'selector', 'keyword', 'zooey' ),
		esc_html_x( 'dropdown', 'keyword', 'zooey' ),
		esc_html_x( 'blog', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'postTypes' => 'all', // Available also for post content.
) );

?>

<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group">

	<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
	<h2 class="wp-block-heading is-style-screen-reader-text"><?php esc_html_e( 'Browse by topic:', 'zooey' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:categories {"showPostCounts":true,"showOnlyTopLevel":true,"className":"is-style-buttons-inline","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} /-->

</div>
<!-- /wp:group -->

