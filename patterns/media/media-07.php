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
	'title'    => _x( '3 columns of image with description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Demo::Get_image_url( '3to2-1' );
$image_2 = Demo::Get_image_url( '3to2-2' );
$image_3 = Demo::Get_image_url( '3to2-3' );

?>

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:image {"sizeSlug":"large"} -->
		<figure class="wp-block-image size-large"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph -->
			<p><?php Demo::The_text( '110' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:image {"sizeSlug":"large"} -->
		<figure class="wp-block-image size-large"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph -->
			<p><?php Demo::The_text( '110' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:image {"sizeSlug":"large"} -->
		<figure class="wp-block-image size-large"><img src="<?php echo esc_url_raw( $image_3 ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph -->
			<p><?php Demo::The_text( '110' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
