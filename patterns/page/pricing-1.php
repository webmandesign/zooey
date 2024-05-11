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
		/* translators: %s: additional notes. */
		_x( 'Pricing page %s', 'Block pattern title.', 'zooey' ),
		_x( '(use "No intro" template)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:pattern {"slug":"zooey/intro/intro-02"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|m"} --><div style="height:var(--wp--preset--spacing--m)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/pricing/pricing-01"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|content"} --><div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:pattern {"slug":"zooey/testimonials/testimonials-02"} /-->