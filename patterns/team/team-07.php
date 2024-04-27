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
	'title'    => _x( '"About me" page content', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'card', 'keyword', 'zooey' ),
		esc_html_x( 'team', 'keyword', 'zooey' ),
		esc_html_x( 'staff', 'keyword', 'zooey' ),
		esc_html_x( 'person', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:template-part {"align":"wide","slug":"custom-header-top"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|content"},"margin":{"top":"var:preset|spacing|l"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:post-title {"level":1} /-->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}}} -->
			<p style="margin-top:var(--wp--preset--spacing--xs);font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'people/job' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '200' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"margin":{"top":"var:preset|spacing|xl"}}}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xl)">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
				<h2 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 'contact/adress_inline' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="mailto:<?php Block_Pattern::the_text( 'contact/email' ); ?>"><?php Block_Pattern::the_text( 'contact/email' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"primary","iconColorValue":"#5f1a37","size":"has-large-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links has-large-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#0","service":"instagram"} /-->
					<!-- wp:social-link {"url":"#0","service":"youtube"} /-->
					<!-- wp:social-link {"url":"#0","service":"facebook"} /-->
				</ul>
				<!-- /wp:social-links -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
