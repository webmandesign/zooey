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
	'title'    => _x( 'Quote with an image with padding on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'testimonials', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '21to9' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"0"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-mixed-background-color has-background" style="padding-top:var(--wp--preset--spacing--content);padding-bottom:0">

	<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
	<h2 class="wp-block-heading is-style-screen-reader-text"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:quote {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"fontSize":"xl"} -->
	<blockquote class="wp-block-quote has-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)">
		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '180' ); ?></p>
		<!-- /wp:paragraph -->
		<cite><?php Block_Pattern::the_text( 'people/name' ); ?></cite>
	</blockquote>
	<!-- /wp:quote -->

	<!-- wp:image {"align":"wide","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topRight":"1rem"}}},"className":"is-style-padding-right"} -->
	<figure class="wp-block-image alignwide size-full has-custom-border is-style-padding-right"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-top-right-radius:1rem"/></figure>
	<!-- /wp:image -->

</div>
<!-- /wp:group -->
