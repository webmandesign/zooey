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
	'title'    => _x( 'Personal info card', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'card', 'keyword', 'zooey' ),
		esc_html_x( 'team', 'keyword', 'zooey' ),
		esc_html_x( 'author', 'keyword', 'zooey' ),
		esc_html_x( 'staff', 'keyword', 'zooey' ),
		esc_html_x( 'person', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-1' );

?>

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"}},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
<div class="wp-block-group alignwide has-primary-background-color has-background" style="border-radius:0.38rem;margin-top:0;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:image {"sizeSlug":"medium","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-medium is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
			<div class="wp-block-group" style="min-height:100%">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
				<h2 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'people/name' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"dropCap":true,"fontSize":"l"} -->
					<p class="has-drop-cap has-l-font-size"><?php Block_Pattern::the_text( '175' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '230' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-huge-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only"} -->
					<ul class="wp-block-social-links has-huge-icon-size has-icon-color is-style-logos-only">
						<!-- wp:social-link {"url":"#0","service":"instagram"} /-->
						<!-- wp:social-link {"url":"#0","service":"facebook"} /-->
						<!-- wp:social-link {"url":"#0","service":"youtube"} /-->
					</ul>
					<!-- /wp:social-links -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
