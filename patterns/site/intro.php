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
		_x( 'Page', 'Intro context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 'alignfull',
) );

?>

<!-- wp:group {"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"560px","wideSize":"100%","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:post-title {"level":1,"align":"wide"} /-->

		<!-- wp:post-excerpt {"className":"is-style-page-summary","fontSize":"l"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"},"blockGap":{"top":"0","left":"0"}}},"className":"is-featured-image-container","layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group alignwide is-featured-image-container" style="margin-top:var(--wp--preset--spacing--xl)">

	<!-- wp:template-part {"slug":"custom-header-bottom"} /-->

	<!-- wp:post-featured-image {"align":"wide"} /-->

	<!-- wp:template-part {"slug":"custom-header-top"} /-->

</div>
<!-- /wp:group -->
