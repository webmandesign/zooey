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

$image = Block_Pattern::get_image_url( '1to1-3' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|content","top":"var:preset|spacing|l"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"border":{"radius":"0.38rem","width":"2px"},"spacing":{"padding":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-primary-border-color" style="border-width:2px;border-radius:0.38rem;padding-top:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium"} -->
				<figure class="wp-block-image size-medium"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="aspect-ratio:1;object-fit:cover" /></figure>
				<!-- /wp:image -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:post-title {"level":1} /-->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}},"typography":{"textTransform":"uppercase"}}} -->
			<p style="margin-top:var(--wp--preset--spacing--xs);text-transform:uppercase"><strong><?php Block_Pattern::the_text( 'people/job' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '200' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"margin":{"top":"var:preset|spacing|xl"}}}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xl)">

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"l"} -->
				<h2 class="wp-block-heading has-l-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 'contact/address_inline' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="mailto:<?php Block_Pattern::the_text( 'contact/email' ); ?>"><?php Block_Pattern::the_text( 'contact/email' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"primary","size":"has-large-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only"} -->
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
