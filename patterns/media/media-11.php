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
	'title'    => _x( 'Project content in 2 columns with images', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'portfolio', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_1 = Block_Pattern::get_image_url( '3to4-3' );
$image_2 = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"backgroundColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-alt-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|content","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"61.8%","layout":{"type":"constrained","contentSize":"600px","justifyContent":"left"}} -->
		<div class="wp-block-column" style="flex-basis:61.8%">

			<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","flexWrap":"nowrap","justifyContent":"stretch"}} -->
			<div class="wp-block-group" style="min-height:100%">

				<!-- wp:image {"sizeSlug":"medium","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-medium is-style-rounded"><img src="<?php echo esc_url_raw( $image_1 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '140' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"38.2%"} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"}},"fontSize":"l"} -->
			<p class="has-l-font-size" style="font-style:normal;font-weight:600;line-height:1.4"><?php Block_Pattern::the_text( '150' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|content"}}}} -->
			<p style="margin-top:var(--wp--preset--spacing--content)"><?php Block_Pattern::the_text( '120' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:image {"sizeSlug":"medium","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-medium is-style-rounded"><img src="<?php echo esc_url_raw( $image_2 ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
