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
		/* translators: %s: context. */
		_x( 'Intro: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Archive page', 'Intro context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 'alignfull',
) );

?>

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left","contentSize":"560px","wideSize":"100%"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:query-title {"type":"archive","align":"wide"} /-->

		<!-- wp:term-description {"className":"is-style-page-summary","fontSize":"l"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
