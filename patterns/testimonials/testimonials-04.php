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
	'title'    => _x( '2 columns of quotes on a background image', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'testimonials', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-1' );
$image_2 = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","dimRatio":90,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":62,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:62vh">
				<span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-90 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url_raw( $image_1 ); ?>" data-object-fit="cover"/>
				<div class="wp-block-cover__inner-container">

					<!-- wp:quote {"textColor":"black","fontSize":"xl"} -->
					<blockquote class="wp-block-quote has-black-color has-text-color has-xl-font-size">
						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '190' ); ?></p>
						<!-- /wp:paragraph -->
						<cite><?php Block_Pattern::the_text( 'people/name' ); ?></cite>
					</blockquote>
					<!-- /wp:quote -->

				</div>
			</div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_2 ); ?>","dimRatio":90,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":62,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content);min-height:62vh">
				<span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-90 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url_raw( $image_2 ); ?>" data-object-fit="cover"/>
				<div class="wp-block-cover__inner-container">

					<!-- wp:quote {"textColor":"black","fontSize":"xl"} -->
					<blockquote class="wp-block-quote has-black-color has-text-color has-xl-font-size">
						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( '190' ); ?></p>
						<!-- /wp:paragraph -->
						<cite><?php Block_Pattern::the_text( 'people/name' ); ?></cite>
					</blockquote>
					<!-- /wp:quote -->

				</div>
			</div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
