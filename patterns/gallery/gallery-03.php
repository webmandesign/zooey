<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.5
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => _x( 'Smaller image with caption accompanied with larger image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
		esc_html_x( 'image', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Demo::Get_image_url( '3to4-3' );
$image_2 = Demo::Get_image_url( '1to1-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:image {"sizeSlug":"medium"} -->
			<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:image {"width":"480px","sizeSlug":"thumbnail","linkDestination":"none","align":"center","style":{"border":{"radius":{"topLeft":"20rem","topRight":"20rem"}}},"gradient":"primary-cut-transparent-v"} -->
			<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border has-primary-cut-transparent-v-gradient-background has-background"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>" style="border-top-left-radius:20rem;border-top-right-radius:20rem;width:480px" />
				<figcaption class="wp-element-caption"><?php Demo::The_text( 'l' ); ?></figcaption>
			</figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
