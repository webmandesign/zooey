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
	'title'    => _x( 'Posts list in 3 columns', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'news', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"align":"wide"} -->
		<h2 class="wp-block-heading alignwide"><?php esc_html_e( 'Recent posts', 'zooey' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","textDecoration":"none"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="font-style:normal;font-weight:700;text-decoration:none;text-transform:uppercase"><a href="<?php echo esc_url( home_url( esc_attr_x( '/blog/', '"Blog" page URL relative to home page.', 'zooey' ) ) ); ?>"><?php echo esc_html_x( 'See all →', 'Posts', 'zooey' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":3,"postType":"post","sticky":"exclude","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->

			<!-- wp:pattern {"slug":"zooey/site/entry-query"} /-->

		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
