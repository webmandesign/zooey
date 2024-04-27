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
	'title'    => _x( 'Boxed call to action with large title on the side and images above', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to2-2' );
$image_2 = Block_Pattern::get_image_url( '3to2-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0">

	<!-- wp:gallery {"linkTo":"none","align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-default is-cropped">

		<!-- wp:image {"sizeSlug":"medium","style":{"border":{"radius":{"topLeft":"1rem"}}}} -->
		<figure class="wp-block-image size-medium has-custom-border"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-top-left-radius:1rem" /></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"medium","style":{"border":{"radius":{"topRight":"1rem"}}}} -->
		<figure class="wp-block-image size-medium has-custom-border"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-top-right-radius:1rem" /></figure>
		<!-- /wp:image -->

	</figure>
	<!-- /wp:gallery -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"},"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|l","right":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l"}},"border":{"radius":{"bottomLeft":"1rem","bottomRight":"1rem"}}},"backgroundColor":"primary"} -->
	<div class="wp-block-columns alignwide has-primary-background-color has-background" style="border-bottom-left-radius:1rem;border-bottom-right-radius:1rem;margin-top:0;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

		<!-- wp:column {"width":"61.8%","layout":{"type":"constrained"}} -->
		<div class="wp-block-column" style="flex-basis:61.8%">

			<!-- wp:heading {"fontSize":"h-3"} -->
			<h2 class="wp-block-heading has-h-3-font-size"><?php Block_Pattern::the_text( '70' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"38.2%"} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '170' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">

				<!-- wp:button {"backgroundColor":"white"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
