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
	'title' => _x( 'Simple, text-only list of recent posts', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( esc_attr_x( '/blog/', '"Blog" page URL relative to home page.', 'zooey' ) ) ); ?>"><?php echo esc_html_x( 'See all →', 'Posts', 'zooey' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"1em","left":"1em"}}}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:query {"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
		<div class="wp-block-query">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"1em"}}} -->

				<!-- wp:separator {"style":{"spacing":{"margin":{"top":"0","bottom":"1em"}}},"backgroundColor":"contrast-3"} -->
				<hr class="wp-block-separator has-text-color has-contrast-3-color has-alpha-channel-opacity has-contrast-3-background-color has-background" style="margin-top:0;margin-bottom:1em" />
				<!-- /wp:separator -->

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.5em","left":"var:preset|spacing|xl"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group">

					<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textDecoration":"none","textTransform":"uppercase"}},"fontSize":"l"} /-->

					<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.25em","left":"0.25em"}}},"layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"s"} -->
					<div class="wp-block-group has-s-font-size">

						<!-- wp:post-date /-->

						<!-- wp:paragraph -->
						<p>—</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph -->
						<p><?php echo esc_html_x( 'by', 'As in "written by [author name]".', 'zooey' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:post-author {"showAvatar":false} /-->

						<!-- wp:paragraph -->
						<p><?php echo esc_html_x( 'in', 'In category.', 'zooey' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:post-terms {"term":"category"} /-->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->

		<!-- wp:separator -->
		<hr class="wp-block-separator has-alpha-channel-opacity" />
		<!-- /wp:separator -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
