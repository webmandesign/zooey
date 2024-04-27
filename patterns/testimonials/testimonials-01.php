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
	'title'    => _x( 'Large quote with a person photo and decorative image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'testimonials', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-1' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"backgroundColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-alt-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|xl"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:image {"width":"400px","aspectRatio":"1","scale":"cover","sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"20rem"},"color":{"duotone":"var:preset|duotone|primary"}},"className":"is-resized"} -->
		<figure class="wp-block-image size-medium is-resized has-custom-border"><img src="<?php echo esc_url_raw( $image ); ?>" alt="" style="border-radius:20rem;aspect-ratio:1;object-fit:cover;width:400px"/></figure>
		<!-- /wp:image -->

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">

			<!-- wp:quote {"fontSize":"xl"} -->
			<blockquote class="wp-block-quote has-xl-font-size">
				<!-- wp:paragraph {"fontSize":"l"} -->
				<p class="has-l-font-size"><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->
			</blockquote>
			<!-- /wp:quote -->

			<!-- wp:pattern {"slug":"zooey/team/team-04"} /-->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
