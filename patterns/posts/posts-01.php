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
	'title'    => _x( 'Posts list in 3 columns with description, list of categories and a button', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'news', 'keyword', 'zooey' ),
		esc_html_x( 'filter', 'keyword', 'zooey' ),
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"constrained","contentSize":"540px"}} -->
		<div class="wp-block-group">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '120' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"layout":{"type":"flex"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( esc_attr_x( '/blog/', '"Blog" page URL relative to home page.', 'zooey' ) ) ); ?>"><?php echo esc_html_x( 'See all →', 'Posts', 'zooey' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:categories {"showPostCounts":true,"align":"wide","className":"is-style-inline","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|l"}}},"fontSize":"xs"} /-->

	<!-- wp:query {"queryId":0,"query":{"perPage":3,"postType":"post","sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":3},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template -->

			<!-- wp:pattern {"slug":"zooey/site/entry-query"} /-->

		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
