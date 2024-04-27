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

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

	<!-- wp:template-part {"align":"wide","slug":"custom-header-top"} /-->

	<!-- wp:spacer {"height":"var:preset|spacing|content"} -->
	<div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"540px","wideSize":"1000px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:post-title {"align":"wide","textAlign":"center","level":1} /-->

		<!-- wp:post-excerpt {"textAlign":"center","className":"is-style-page-summary","fontSize":"l"} /-->

		<!-- wp:group {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"blockGap":"var:preset|spacing|s"}},"className":"is-hidden-on-page","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"},"fontSize":"xs"} -->
		<div class="wp-block-group is-hidden-on-page has-xs-font-size" style="text-transform:uppercase">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:avatar {"size":40} /-->

				<!-- wp:post-author {"showAvatar":false,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}}} /-->

			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph -->
			<p>—</p>
			<!-- /wp:paragraph -->

			<!-- wp:post-date {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}}} /-->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:post-featured-image {"height":"60vh","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"}},"border":{"radius":"1em"}},"className":"is-style-blur-overlay"} /-->

</div>
<!-- /wp:group -->
