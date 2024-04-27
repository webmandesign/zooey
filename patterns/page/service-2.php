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
		_x( '2. With gallery and sticky description text', 'Page content context.', 'zooey' ),
		_x( ' (use "No intro" template)', 'Page content additional notes.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page content', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:pattern {"slug":"zooey/intro/intro-03"} /-->

<!-- wp:pattern {"slug":"zooey/gallery/gallery-08"} /-->

<!-- wp:pattern {"slug":"zooey/call-to-action/cta-10"} /-->
