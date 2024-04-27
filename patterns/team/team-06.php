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
	'title'    => _x( 'Single person info card', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'card', 'keyword', 'zooey' ),
		esc_html_x( 'team', 'keyword', 'zooey' ),
		esc_html_x( 'staff', 'keyword', 'zooey' ),
		esc_html_x( 'person', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 480,
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
<div class="wp-block-group">

	<!-- wp:image {"sizeSlug":"thumbnail","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
	<!-- /wp:image -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
		<h3 class="wp-block-heading has-text-align-center has-l-font-size" style="font-style:normal;font-weight:500;text-transform:none"><?php Block_Pattern::the_text( 'people/name' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-text-align-center has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'people/job' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:social-links {"iconColor":"primary","iconColorValue":"#964f4c","size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
		<!-- wp:social-link {"url":"#0","service":"instagram"} /-->
		<!-- wp:social-link {"url":"#0","service":"facebook"} /-->
		<!-- wp:social-link {"url":"#0","service":"youtube"} /-->
	</ul>
	<!-- /wp:social-links -->

</div>
<!-- /wp:group -->
