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
	'title'    => _x( '2 columns of quotes with description and decorative image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'testimonials', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:heading {"align":"wide"} -->
	<h2 class="wp-block-heading alignwide"><?php Block_Pattern::the_text( 'title/m' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"440px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '90' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"},"margin":{"top":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--xl)">

		<!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%">

			<!-- wp:image {"width":"320px","aspectRatio":"1","scale":"cover","sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"20rem"},"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image size-medium is-resized has-custom-border"><img src="<?php echo esc_url_raw( $image ); ?>" alt="" style="border-radius:20rem;aspect-ratio:1;object-fit:cover;width:320px"/></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|l"}}} -->
		<div class="wp-block-column">

			<!-- wp:quote -->
			<blockquote class="wp-block-quote">
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->
				<cite><strong><?php Block_Pattern::the_text( 'people/name' ); ?></strong></cite>
			</blockquote>
			<!-- /wp:quote -->

			<!-- wp:quote -->
			<blockquote class="wp-block-quote">
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->
				<cite><strong><?php Block_Pattern::the_text( 'people/name' ); ?></strong></cite>
			</blockquote>
			<!-- /wp:quote -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|l"}}} -->
		<div class="wp-block-column">

			<!-- wp:quote -->
			<blockquote class="wp-block-quote">
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->
				<cite><strong><?php Block_Pattern::the_text( 'people/name' ); ?></strong></cite>
			</blockquote>
			<!-- /wp:quote -->

			<!-- wp:quote -->
			<blockquote class="wp-block-quote">
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->
				<cite><strong><?php Block_Pattern::the_text( 'people/name' ); ?></strong></cite>
			</blockquote>
			<!-- /wp:quote -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
