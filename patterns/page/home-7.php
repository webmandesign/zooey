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
		_x( '7. With sticky intro sections', 'Page content context.', 'zooey' ),
		_x( ' (use "Overlaid header" template)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:post-title {"level":1,"className":"is-style-screen-reader-text"} /-->

	<!-- wp:group {"align":"full","style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull">

		<!-- wp:pattern {"slug":"zooey/call-to-action/cta-18"} /-->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull">

		<!-- wp:pattern {"slug":"zooey/call-to-action/cta-18-alt-hidden"} /-->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}},"heading":{"color":{"text":"var:preset|color|contrast-alt"}}},"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

		<!-- wp:pattern {"slug":"zooey/call-to-action/cta-11"} /-->

		<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

		<!-- wp:pattern {"slug":"zooey/team/team-02"} /-->

		<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

		<!-- wp:pattern {"slug":"zooey/media/media-06"} /-->

		<!-- wp:pattern {"slug":"zooey/call-to-action/cta-17"} /-->

		<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

		<!-- wp:pattern {"slug":"zooey/posts/posts-01"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"zooey/call-to-action/cta-01"} /-->
