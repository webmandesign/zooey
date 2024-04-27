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
	'title'    => _x( 'Tiled section links with background images', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'gallery', 'keyword', 'zooey' ),
		esc_html_x( 'cover', 'keyword', 'zooey' ),
		esc_html_x( 'image', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '1to1-1' );
$image_2 = Block_Pattern::get_image_url( '1to1-2' );
$image_3 = Block_Pattern::get_image_url( '1to1-3' );
$icon    = 'data:image/svg+xml,%3Csvg xmlns=&quot;http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg&quot; width=&quot;64&quot; height=&quot;64&quot; viewBox=&quot;0 0 256 256&quot;%3E%3Cpath fill=&quot;currentColor&quot; d=&quot;M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24Zm0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88Zm45.66-93.66a8 8 0 0 1 0 11.32l-32 32a8 8 0 0 1-11.32-11.32L148.69 136H88a8 8 0 0 1 0-16h60.69l-18.35-18.34a8 8 0 0 1 11.32-11.32Z&quot;%2F%3E%3C%2Fsvg%3E';

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
		<div class="wp-block-column">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/m' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_1 ); ?>","dimRatio":0,"overlayColor":"primary","focalPoint":{"x":0.5,"y":0.75},"minHeight":320,"contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"16em","right":"0","bottom":"0","left":"0"}},"border":{"radius":"0.38rem"}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-radius:0.38rem;padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:320px">
				<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_1 ); ?>" style="object-position:50% 75%" data-object-fit="cover" data-object-position="50% 75%"/><div class="wp-block-cover__inner-container">

				<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"var:preset|spacing|m","right":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m"}}},"textColor":"white","gradient":"backdrop-blur-dark","className":"is-style-backdrop-blur","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group is-style-backdrop-blur has-white-color has-backdrop-blur-dark-gradient-background has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","textDecoration":"none"}}} -->
					<p style="font-style:normal;font-weight:700;text-decoration:none;text-transform:uppercase"><a href="#0"><?php Block_Pattern::the_text( 's' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:image {"width":"48px","sizeSlug":"thumbnail","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|white"}}} -->
					<figure class="wp-block-image size-thumbnail is-resized"><a href="#0"><img src="<?php echo esc_attr( $icon ); ?>" alt="" style="width:48px"/></a></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:group -->

			</div></div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">


			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_2 ); ?>","dimRatio":0,"overlayColor":"primary","focalPoint":{"x":0.5,"y":0.75},"minHeight":320,"contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"16em","right":"0","bottom":"0","left":"0"}},"border":{"radius":"0.38rem"}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-radius:0.38rem;padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:320px">
				<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_2 ); ?>" style="object-position:50% 75%" data-object-fit="cover" data-object-position="50% 75%"/><div class="wp-block-cover__inner-container">

				<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"var:preset|spacing|m","right":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m"}}},"textColor":"white","gradient":"backdrop-blur-dark","className":"is-style-backdrop-blur","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group is-style-backdrop-blur has-white-color has-backdrop-blur-dark-gradient-background has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","textDecoration":"none"}}} -->
					<p style="font-style:normal;font-weight:700;text-decoration:none;text-transform:uppercase"><a href="#0"><?php Block_Pattern::the_text( 's' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:image {"width":"48px","sizeSlug":"thumbnail","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|white"}}} -->
					<figure class="wp-block-image size-thumbnail is-resized"><a href="#0"><img src="<?php echo esc_attr( $icon ); ?>" alt="" style="width:48px"/></a></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:group -->

			</div></div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">


			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image_3 ); ?>","dimRatio":0,"overlayColor":"primary","focalPoint":{"x":0.5,"y":0.75},"minHeight":320,"contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"16em","right":"0","bottom":"0","left":"0"}},"border":{"radius":"0.38rem"}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="border-radius:0.38rem;padding-top:16em;padding-right:0;padding-bottom:0;padding-left:0;min-height:320px">
				<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image_3 ); ?>" style="object-position:50% 75%" data-object-fit="cover" data-object-position="50% 75%"/><div class="wp-block-cover__inner-container">

				<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"var:preset|spacing|m","right":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m"}}},"textColor":"white","gradient":"backdrop-blur-dark","className":"is-style-backdrop-blur","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group is-style-backdrop-blur has-white-color has-backdrop-blur-dark-gradient-background has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","textDecoration":"none"}}} -->
					<p style="font-style:normal;font-weight:700;text-decoration:none;text-transform:uppercase"><a href="#0"><?php Block_Pattern::the_text( 's' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:image {"width":"48px","sizeSlug":"thumbnail","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|white"}}} -->
					<figure class="wp-block-image size-thumbnail is-resized"><a href="#0"><img src="<?php echo esc_attr( $icon ); ?>" alt="" style="width:48px"/></a></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:group -->

			</div></div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
