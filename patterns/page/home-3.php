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
		_x( 'Home page: %1$s %2$s', 'Block pattern title.', 'zooey' ),
		_x( 'With intro hover zoom', 'Page content context.', 'zooey' ),
		_x( '(use "No intro" template)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:pattern {"slug":"zooey/intro/intro-01"} /-->

<!-- wp:pattern {"slug":"zooey/services/services-06"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/text/text-01"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/numbers/numbers-03"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|m"} --><div style="height:var(--wp--preset--spacing--m)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/media/custom-header-top"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:heading {"align":"wide","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"fontSize":"m"} -->
<h2 class="wp-block-heading alignwide has-m-font-size" style="margin-bottom:var(--wp--preset--spacing--xs);text-transform:uppercase">Lorem ipsum</h2>
<!-- /wp:heading -->

<!-- wp:pattern {"slug":"zooey/gallery/gallery-08"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/media/media-04"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/posts/posts-02"} /-->
