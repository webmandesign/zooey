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
		_x( 'Single service page: %1$s%2$s', 'Block pattern title.', 'zooey' ),
		_x( '1. With icons and 2 images with description', 'Page content context.', 'zooey' ),
		_x( ' (use default template)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:pattern {"slug":"zooey/text/text-02"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/services/services-07"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
<h2 class="wp-block-heading is-style-screen-reader-text"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:pattern {"slug":"zooey/media/media-11"} /-->
