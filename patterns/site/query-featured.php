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

use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Loop\Featured_Posts;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => sprintf(
		/* translators: %s: context. */
		_x( 'Query loop: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Featured posts', 'Query loop context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'loop', 'keyword', 'zooey' ),
		esc_html_x( 'list', 'keyword', 'zooey' ),
		esc_html_x( 'items', 'keyword', 'zooey' ),
		esc_html_x( 'posts', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 'alignfull',
) );

// Block pattern content:

$tag = get_term_by( 'name', sanitize_title( Mod::get( Featured_Posts::$theme_mod_id ) ), 'post_tag' );

if (
	! empty( $tag )
	&& ! is_wp_error( $tag )
) {
	$tag_id = $tag->term_id;
} else {
	$tag_id = 0;
}

?>

<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

	<!-- wp:query {"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"taxQuery":{"post_tag":[<?php echo absint( $tag_id ); ?>]},"parents":[]},"align":"wide"} -->
	<div class="wp-block-query alignwide">

		<!-- wp:post-template {"style":{"spacing":{"blockGap":"0"}}} -->

			<!-- wp:template-part {"slug":"entry-query-featured"} /-->

		<!-- /wp:post-template -->

	</div>
	<!-- /wp:query -->

	<!-- wp:query {"query":{"perPage":"2","pages":"1","offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"taxQuery":{"post_tag":[<?php echo absint( $tag_id ); ?>]},"parents":[]},"align":"wide"} -->
	<div class="wp-block-query alignwide">

		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|m"}},"layout":{"type":"grid","columnCount":2}} -->

			<!-- wp:template-part {"slug":"entry-query-featured","style":{"dimensions":{"minHeight":"100%"}}} /-->

		<!-- /wp:post-template -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
