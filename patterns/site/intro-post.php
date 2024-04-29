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
		_x( 'Post', 'Intro context.', 'zooey' )
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

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"560px","wideSize":"100%","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:post-title {"level":1,"align":"wide"} /-->

		<!-- wp:post-excerpt {"className":"is-style-page-summary","fontSize":"l"} /-->

		<!-- wp:group {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"blockGap":"var:preset|spacing|s"}},"className":"is-hidden-on-page","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"},"fontSize":"xs"} -->
		<div class="wp-block-group is-hidden-on-page has-xs-font-size" style="text-transform:uppercase">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:avatar {"size":40} /-->

				<!-- wp:post-author {"showAvatar":false,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}}} /-->

			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph -->
			<p>—</p>
			<!-- /wp:paragraph -->

			<!-- wp:post-date {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}}} /-->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"},"blockGap":{"top":"0","left":"0"}}},"className":"is-featured-image-container"} -->
	<div class="wp-block-group is-featured-image-container" style="margin-top:var(--wp--preset--spacing--xl)">

		<!-- wp:template-part {"slug":"custom-header-bottom"} /-->

		<!-- wp:post-featured-image {"align":"wide"} /-->

		<!-- wp:template-part {"slug":"custom-header-top"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
