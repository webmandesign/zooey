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
	'title'    => _x( 'Page title with description and 3 features overlapping parallax featured image background', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'icons', 'keyword', 'zooey' ),
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:cover {"useFeaturedImage":true,"hasParallax":true,"dimRatio":60,"contentPosition":"bottom center","align":"full","style":{"spacing":{"padding":{"bottom":"0","top":"16em"},"margin":{"bottom":"var:preset|spacing|content"}}},"className":"has-visible-overflow","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-parallax has-custom-content-position is-position-bottom-center has-visible-overflow" style="margin-bottom:var(--wp--preset--spacing--content);padding-top:16em;padding-bottom:0">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--xl)">

			<!-- wp:post-title {"level":1} /-->

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"480px","justifyContent":"left"}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"fontSize":"l"} -->
				<p class="has-l-font-size"><?php Block_Pattern::the_text( '90' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}},"className":"is-style-pull-down-l"} -->
		<div class="wp-block-columns alignwide is-style-pull-down-l" style="margin-bottom:var(--wp--preset--spacing--content)">

			<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"}},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary","className":"is-style-backdrop-blur","layout":{"type":"constrained"}} -->
			<div class="wp-block-column is-style-backdrop-blur has-secondary-background-color has-background" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}}} -->
				<figure class="wp-block-image size-full" style="margin-bottom:var(--wp--preset--spacing--m)"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
				<h2 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '70' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"}},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary","className":"is-style-backdrop-blur","layout":{"type":"constrained"}} -->
			<div class="wp-block-column is-style-backdrop-blur has-secondary-background-color has-background" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}}} -->
				<figure class="wp-block-image size-full" style="margin-bottom:var(--wp--preset--spacing--m)"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
				<h2 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '70' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"}},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary","className":"is-style-backdrop-blur","layout":{"type":"constrained"}} -->
			<div class="wp-block-column is-style-backdrop-blur has-secondary-background-color has-background" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}}} -->
				<figure class="wp-block-image size-full" style="margin-bottom:var(--wp--preset--spacing--m)"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
				<h2 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '70' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
</div>
<!-- /wp:cover -->
