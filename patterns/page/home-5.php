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
	'title'    => sprintf(
		/* translators: %1$s: context, %2$s: additional notes. */
		_x( 'Home page: %1$s%2$s', 'Block pattern title.', 'zooey' ),
		_x( '5. Fullscreen sections', 'Page content context.', 'zooey' ),
		_x( ' (use "Overlaid header" template, change H1 to H2 for each section)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:post-title {"level":1,"className":"is-style-screen-reader-text"} /-->

	<!-- wp:pattern {"slug":"zooey/intro/intro-14"} /-->
	<!-- wp:pattern {"slug":"zooey/intro/intro-14-alt-hidden"} /-->
	<!-- wp:pattern {"slug":"zooey/intro/intro-14"} /-->

</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"zooey/call-to-action/cta-01"} /-->
