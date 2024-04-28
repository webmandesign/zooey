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
	'title'    => _x( 'Quote with contact info on the side and an image below', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'email', 'keyword', 'zooey' ),
		esc_html_x( 'address', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '21to9' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|content","left":"var:preset|spacing|content"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|xl"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">

			<!-- wp:quote {"fontSize":"xxl"} -->
			<blockquote class="wp-block-quote has-xxl-font-size">
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '140' ); ?></p>
				<!-- /wp:paragraph -->
			</blockquote>
			<!-- /wp:quote -->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">

			<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"m"} -->
			<h2 class="wp-block-heading has-m-font-size" style="text-transform:uppercase"><?php esc_html_e( 'Contact', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( 'contact/address' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="mailto:<?php echo esc_attr( Block_Pattern::get_text( 'contact/email' ) ); ?>"><?php Block_Pattern::the_text( 'contact/email' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":0,"minHeight":50,"minHeightUnit":"vh","isDark":false,"align":"wide","style":{"border":{"radius":"0.38rem"}}} -->
	<div class="wp-block-cover alignwide is-light" style="border-radius:0.38rem;min-height:50vh">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
		<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">

			<!-- wp:spacer {"height":"320px"} -->
			<div style="height:320px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

		</div>
	</div>
	<!-- /wp:cover -->

</div>
<!-- /wp:group -->
