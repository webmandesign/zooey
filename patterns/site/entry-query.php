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
		_x( 'Query entry: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Default', 'Query entry context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'item', 'keyword', 'zooey' ),
		esc_html_x( 'entry', 'keyword', 'zooey' ),
		esc_html_x( 'post', 'keyword', 'zooey' ),
		esc_html_x( 'page', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'postTypes' => 'all', // Available also for post content.
) );

?>

<!-- wp:group {"tagName":"article","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"0","left":"0"}},"border":{"radius":"0.38rem"}}} -->
<article class="wp-block-group" style="border-radius:0.38rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:post-featured-image {"isLink":true,"scale":"contain","sizeSlug":"medium"} /-->

	<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m","top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","textDecoration":"none"}},"layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"xs"} -->
		<div class="wp-block-group has-xs-font-size" style="font-style:normal;font-weight:700;text-decoration:none;text-transform:uppercase">

			<!-- wp:post-date {"isLink":true} /-->

			<!-- wp:paragraph -->
			<p>—</p>
			<!-- /wp:paragraph -->

			<!-- wp:post-terms {"term":"category"} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|s"}},"typography":{"lineHeight":"1.1","textDecoration":"none"}}} /-->

		<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
		<div class="wp-block-group">

			<!-- wp:post-excerpt {"moreText":"<?php esc_html_e( '&rarr; Continue Reading', 'zooey' ); ?>","style":{"spacing":{"blockGap":"var:preset|spacing|s"}},"className":"is-style-truncate-2","fontSize":"s"} /-->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</article>
<!-- /wp:group -->
