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
	'title'    => _x( 'Call to action with wide offset image below', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '21to9' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"0"},"margin":{"top":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="padding-top:var(--wp--preset--spacing--content);padding-bottom:0;margin-top:0">

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--xl)">

		<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
			<h2 class="wp-block-heading" style="font-style:normal;font-weight:400"><?php Block_Pattern::the_text( '60' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">

			<!-- wp:button {"backgroundColor":"base","fontSize":"m"} -->
			<div class="wp-block-button has-custom-font-size has-m-font-size"><a class="wp-block-button__link has-base-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
			<!-- /wp:button -->

		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:image {"align":"wide","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topRight":"1rem"}}},"className":"is-style-padding-right"} -->
	<figure class="wp-block-image alignwide size-full has-custom-border is-style-padding-right"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-top-right-radius:1rem"/></figure>
	<!-- /wp:image -->

</div>
<!-- /wp:group -->
