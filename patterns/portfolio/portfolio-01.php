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
	'title'    => _x( 'Project content with sticky details on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'details', 'keyword', 'zooey' ),
		esc_html_x( 'images', 'keyword', 'zooey' ),
		esc_html_x( 'page content', 'keyword', 'zooey' ),
		esc_html_x( 'portfolio', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-1' );

?>

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column {"width":"61.8%"} -->
	<div class="wp-block-column" style="flex-basis:61.8%">

		<!-- wp:image {"sizeSlug":"large","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:columns -->
		<div class="wp-block-columns">

			<!-- wp:column -->
			<div class="wp-block-column">

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '140' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '140' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"38.2%"} -->
	<div class="wp-block-column" style="flex-basis:38.2%">

		<!-- wp:group {"style":{"border":{"radius":"0.38rem"},"spacing":{"blockGap":"var:preset|spacing|s"},"position":{"type":"sticky","top":"0px"}},"backgroundColor":"secondary"} -->
		<div class="wp-block-group has-secondary-background-color has-background" style="border-radius:0.38rem">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Details', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}}} -->
			<p style="margin-bottom:var(--wp--preset--spacing--m)"><?php Block_Pattern::the_text( '160' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group -->
			<div class="wp-block-group">

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs"}}}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xs"} -->
					<p class="has-xs-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( 'm' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs"}}}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xs"} -->
					<p class="has-xs-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( 'm' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
