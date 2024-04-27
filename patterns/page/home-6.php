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
		_x( '6. With quote in intro', 'Page content context.', 'zooey' ),
		_x( ' (use "Overlaid header" template)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:pattern {"slug":"zooey/intro/intro-10"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|xl"} --><div style="height:var(--wp--preset--spacing--xl)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/text/text-08"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|xl"} --><div style="height:var(--wp--preset--spacing--xl)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/text/text-04"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/faq/faq-06"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/testimonials/testimonials-04"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:template-part {"align":"wide","slug":"custom-header-bottom"} /-->

<!-- wp:pattern {"slug":"zooey/call-to-action/cta-16"} /-->

<!-- wp:template-part {"align":"wide","slug":"custom-header-top","style":{"spacing":{"margin":{"top":"0"}}}} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/gallery/gallery-01"} /-->

<!-- wp:pattern {"slug":"zooey/call-to-action/cta-04"} /-->
