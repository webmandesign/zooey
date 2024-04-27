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
	'title'    => _x( 'Contact info for 2 locations', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'email', 'keyword', 'zooey' ),
		esc_html_x( 'phone', 'keyword', 'zooey' ),
		esc_html_x( 'address', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to2-1' );
$image_2 = Block_Pattern::get_image_url( '3to2-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading -->
			<h2 class="wp-block-heading">New York</h2>
			<!-- /wp:heading -->

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-medium is-style-rounded"><a href="https://www.openstreetmap.org/"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></a></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( 'contact/address' ); ?><br><a href="tel:8001234567">(800) 123-4567</a><br><a href="mailto:<?php echo esc_attr( Block_Pattern::get_text( 'contact/email' ) ); ?>"><?php Block_Pattern::the_text( 'contact/email' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xs"} -->
			<p class="has-xs-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><a href="https://www.openstreetmap.org/"><?php esc_html_e( '→ See the location', 'zooey' ) ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading -->
			<h2 class="wp-block-heading">Los Angeles</h2>
			<!-- /wp:heading -->

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-medium is-style-rounded"><a href="https://www.openstreetmap.org/"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></a></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( 'contact/address' ); ?><br><a href="tel:8001234567">(800) 123-4567</a><br><a href="mailto:<?php echo esc_attr( Block_Pattern::get_text( 'contact/email' ) ); ?>"><?php Block_Pattern::the_text( 'contact/email' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xs"} -->
			<p class="has-xs-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><a href="https://www.openstreetmap.org/"><?php esc_html_e( '→ See the location', 'zooey' ) ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
