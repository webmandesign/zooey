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
	'title'    => _x( 'Contact form with image and contact info below', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'address', 'keyword', 'zooey' ),
		esc_html_x( 'email', 'keyword', 'zooey' ),
		esc_html_x( 'phone', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"},"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"}},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center has-primary-background-color has-background" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Get in touch', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s","left":"var:preset|spacing|s","right":"var:preset|spacing|s"}}},"backgroundColor":"base"} -->
			<p class="has-text-align-center has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--s);padding-right:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--s);padding-left:var(--wp--preset--spacing--s)"><?php Block_Pattern::the_text( 'form' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"90%"},"border":{"radius":"0.38rem"}}} -->
			<figure class="wp-block-image size-medium has-custom-border"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:0.38rem" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:heading {"textAlign":"center"} -->
			<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Call us', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","fontSize":"xl"} -->
			<p class="has-text-align-center has-xl-font-size"><a href="tel:8001234567">(800) 123-4567</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:heading {"textAlign":"center"} -->
			<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Visit us', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","fontSize":"xl"} -->
			<p class="has-text-align-center has-xl-font-size"><?php Block_Pattern::the_text( 'contact/address' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:heading {"textAlign":"center"} -->
			<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Email us', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","fontSize":"xl"} -->
			<p class="has-text-align-center has-xl-font-size"><a href="mailto:<?php echo esc_attr( Block_Pattern::get_text( 'contact/email' ) ); ?>"><?php Block_Pattern::the_text( 'contact/email' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
