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
	'title'    => _x( 'Page title with short description on a blurred background overlaying full screen image', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-1' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":0,"overlayColor":"primary","minHeight":90,"minHeightUnit":"vh","contentPosition":"bottom center","align":"full","style":{"spacing":{"padding":{"top":"16em","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center" style="padding-top:16em;padding-bottom:0;min-height:90vh">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"align":"wide","textColor":"white","layout":{"type":"constrained","justifyContent":"left","contentSize":"700px"}} -->
		<div class="wp-block-group alignwide has-white-color has-text-color">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|l","right":"var:preset|spacing|l"}},"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}},"gradient":"backdrop-blur-dark","className":"is-style-backdrop-blur"} -->
			<div class="wp-block-group is-style-backdrop-blur has-backdrop-blur-dark-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--l);border-top-left-radius:1rem;border-top-right-radius:1rem">

				<!-- wp:post-title {"level":1} /-->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|l"}}},"layout":{"type":"constrained","contentSize":"440px","justifyContent":"left"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--l)">

					<!-- wp:paragraph {"fontSize":"l"} -->
					<p class="has-l-font-size"><?php Block_Pattern::the_text( '120' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

</div></div>
<!-- /wp:cover -->
