<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.0
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => sprintf(
		/* translators: %s: context. */
		_x( 'Post meta: %s', 'Block pattern title.', 'zooey' ),
		_x( 'After post content', 'Post meta context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'taxonomy', 'keyword', 'zooey' ),
		esc_html_x( 'category', 'keyword', 'zooey' ),
		esc_html_x( 'tags', 'keyword', 'zooey' ),
		esc_html_x( 'author', 'keyword', 'zooey' ),
		esc_html_x( 'bio', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'postTypes' => 'all', // Available also for post content.
) );

?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"xs"} -->
	<div class="wp-block-group has-xs-font-size">

		<!-- wp:post-terms {"term":"post_tag","prefix":"<?php esc_attr_e( 'Tags: ', 'zooey' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}}} /-->

		<!-- wp:paragraph -->
		<p>—</p>
		<!-- /wp:paragraph -->

		<!-- wp:post-terms {"term":"category","prefix":"<?php esc_attr_e( 'Category: ', 'zooey' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}}} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Related posts', 'zooey' ); ?>"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--l);margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:heading {"fontSize":"l"} -->
	<h2 class="wp-block-heading has-l-font-size"><?php esc_html_e( 'Related posts', 'zooey' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"query":{"perPage":"2","pages":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"taxQuery":null,"parents":[]},"className":"is-style-related-posts"} -->
	<div class="wp-block-query is-style-related-posts">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}}},"layout":{"type":"grid","columnCount":2}} -->
			<!-- wp:template-part {"slug":"entry-query"} /-->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
