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
	'title'    => _x( 'Contact info with image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'email', 'keyword', 'zooey' ),
		esc_html_x( 'phone', 'keyword', 'zooey' ),
		esc_html_x( 'address', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to4-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
		<div class="wp-block-group">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"m"} -->
				<h2 class="wp-block-heading has-m-font-size" style="text-transform:uppercase"><?php esc_html_e( 'Email us', 'zooey' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"xl"} -->
				<p class="has-xl-font-size"><a href="mailto:<?php echo esc_attr( Block_Pattern::get_text( 'contact/email' ) ); ?>"><?php Block_Pattern::the_text( 'contact/email' ); ?></a></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"m"} -->
				<h2 class="wp-block-heading has-m-font-size" style="text-transform:uppercase"><?php esc_html_e( 'Call us', 'zooey' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"xl"} -->
				<p class="has-xl-font-size"><a href="tel:8001234567">(800) 123-4567</a></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"m"} -->
				<h2 class="wp-block-heading has-m-font-size" style="text-transform:uppercase"><?php esc_html_e( 'Visit us', 'zooey' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"xl"} -->
				<p class="has-xl-font-size"><?php Block_Pattern::the_text( 'contact/address' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

		<!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"medium","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"400px"}}} -->
		<figure class="wp-block-image size-medium has-custom-border"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:3/4;object-fit:cover"/></figure>
		<!-- /wp:image -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
