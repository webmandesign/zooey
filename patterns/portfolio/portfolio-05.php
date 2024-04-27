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
	'title'    => _x( 'Projects list item', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'portfolio', 'keyword', 'zooey' ),
		esc_html_x( 'posts', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 480,
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:group {"tagName":"article","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":{"top":"0","left":"0"}},"dimensions":{"minHeight":"100%"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<article class="wp-block-group has-secondary-background-color has-background" style="border-radius:0.38rem;min-height:100%;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":0,"minHeight":200,"minHeightUnit":"px","contentPosition":"bottom center","style":{"spacing":{"padding":{"bottom":"0","left":"0","right":"0","top":"16em"}},"layout":{"selfStretch":"fill","flexSize":null},"border":{"radius":{"topLeft":"1rem","topRight":"1rem"}}}} -->
	<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-top-left-radius:1rem;border-top-right-radius:1rem;padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
		<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.25em","left":"0.25em"}}},"gradient":"backdrop-blur-dark","className":"is-style-backdrop-blur"} -->
			<div class="wp-block-group is-style-backdrop-blur has-backdrop-blur-dark-gradient-background has-background">

				<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"s"} -->
				<p class="has-s-font-size"><?php Block_Pattern::the_text( '90' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
	</div>
	<!-- /wp:cover -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|s","right":"var:preset|spacing|m","bottom":"var:preset|spacing|s","left":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--s);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--s);padding-left:var(--wp--preset--spacing--m)">

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"}},"fontSize":"xs"} -->
		<p class="has-xs-font-size" style="font-style:normal;font-weight:600;line-height:1;text-transform:uppercase"><?php esc_html_e( 'Category', 'zooey' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":"null"}}} -->
		<hr class="wp-block-separator has-alpha-channel-opacity" />
		<!-- /wp:separator -->

		<!-- wp:paragraph {"style":{"typography":{"textDecoration":"none"}},"className":"is-style-no-text-wrap","fontSize":"s"} -->
		<p class="is-style-no-text-wrap has-s-font-size" style="text-decoration:none"><a href="#0"><?php Block_Pattern::the_text( 'more' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</article>
<!-- /wp:group -->
