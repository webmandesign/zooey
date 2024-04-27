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

<!-- wp:group {"layout":{"type":"constrained"},"condition":{"false":"post_password_required"}} -->
<div class="wp-block-group">

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"xs"} -->
	<div class="wp-block-group has-xs-font-size">

		<!-- wp:post-terms {"term":"post_tag","prefix":"<?php esc_attr_e( 'Tags: ', 'zooey' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"}}} /-->

		<!-- wp:paragraph -->
		<p>—</p>
		<!-- /wp:paragraph -->

		<!-- wp:post-terms {"term":"category","prefix":"<?php esc_attr_e( 'Category: ', 'zooey' ); ?>","style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"}}} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
