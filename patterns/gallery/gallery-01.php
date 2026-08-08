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
	'title'    => _x( 'Partner logos', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
		esc_html_x( 'image', 'keyword', 'zooey' ),
		esc_html_x( 'clients', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$images = array(
	Demo::get_image_url( 'l-1' ),
	Demo::get_image_url( 'l-2' ),
	Demo::get_image_url( 'l-3' ),
	Demo::get_image_url( 'l-1' ),
	Demo::get_image_url( 'l-3' ),
	Demo::get_image_url( 'l-2' ),
);

?>

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Logos', 'zooey' ); ?>"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
	<h2 class="wp-block-heading is-style-screen-reader-text"><?php Demo::The_text( 'xs' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:gallery {"columns":6,"imageCrop":false,"linkTo":"none","align":"wide"} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-6">

		<?php foreach ( $images as $url ) : ?>
		<!-- wp:image {"sizeSlug":"thumbnail"} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $url ); ?>" alt="<?php echo esc_attr( Demo::Get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->
		<?php endforeach; ?>

	</figure>
	<!-- /wp:gallery -->

</div>
<!-- /wp:group -->
