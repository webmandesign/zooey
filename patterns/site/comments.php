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
	'title'    => _x( 'Comments', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'post', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:comments {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-comments" style="margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}}},"layout":{"type":"constrained"},"fontSize":"s"} -->
	<div class="wp-block-group has-s-font-size">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.5em","left":"0.5em"}}}} -->
		<div class="wp-block-group">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php echo esc_html_x( 'Comments', 'Title of comments section', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:comments-title {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"contrast","fontSize":"m","fontFamily":"global"} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:comment-template -->

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"margin":{"bottom":"var:preset|spacing|s"}},"border":{"radius":"0.38rem"}},"backgroundColor":"base-alt"} -->
			<div class="wp-block-columns has-base-alt-background-color has-background" style="border-radius:0.38rem;margin-bottom:var(--wp--preset--spacing--s)">

				<!-- wp:column {"width":"40px"} -->
				<div class="wp-block-column" style="flex-basis:40px">

					<!-- wp:avatar {"size":40} /-->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
				<div class="wp-block-column">

					<!-- wp:group -->
					<div class="wp-block-group">

						<!-- wp:comment-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->

						<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"1em"},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex"},"fontSize":"xs"} -->
						<div class="wp-block-group has-xs-font-size" style="margin-top:0px;margin-bottom:0px;text-transform:uppercase">

							<!-- wp:comment-date /-->

							<!-- wp:comment-edit-link /-->

						</div>
						<!-- /wp:group -->

					</div>
					<!-- /wp:group -->

					<!-- wp:comment-content /-->

					<!-- wp:comment-reply-link {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"xs"} /-->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		<!-- /wp:comment-template -->

		<!-- wp:comments-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- wp:comments-pagination-previous /-->
			<!-- wp:comments-pagination-numbers /-->
			<!-- wp:comments-pagination-next /-->
		<!-- /wp:comments-pagination -->

		<!-- wp:post-comments-form /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:comments -->
