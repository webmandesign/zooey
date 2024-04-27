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
		_x( 'Gallery page: %1$s%2$s', 'Block pattern title.', 'zooey' ),
		_x( '1. With 3 topical sections', 'Page content context.', 'zooey' ),
		_x( ' (use default template)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:pattern {"slug":"zooey/gallery/gallery-07"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|xxl"} --><div style="height:var(--wp--preset--spacing--xxl)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/text/text-07"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|xxl"} --><div style="height:var(--wp--preset--spacing--xxl)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/gallery/gallery-09"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|xxl"} --><div style="height:var(--wp--preset--spacing--xxl)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/text/text-07"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|xxl"} --><div style="height:var(--wp--preset--spacing--xxl)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/gallery/gallery-07"} /-->
