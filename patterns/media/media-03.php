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
	'title'    => _x( 'Images with description text in 2 columns', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Demo::Get_image_url( '3to4-1' );
$image_2 = Demo::Get_image_url( '3to2-2' );
$image_s = Demo::Get_image_url( 's' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"verticalAlignment":"top"} -->
		<div class="wp-block-column is-vertically-aligned-top">

			<!-- wp:image {"sizeSlug":"medium"} -->
			<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Demo::The_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"l"} -->
			<p class="has-l-font-size"><?php Demo::The_text( '110' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php Demo::The_text( '230' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:image {"sizeSlug":"medium"} -->
			<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph -->
			<p><?php Demo::The_text( '230' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:image {"sizeSlug":"thumbnail"} -->
			<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_s ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
