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
	'title'    => _x( 'Description with heading on the side and wide image below', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '21to9' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"blockGap":{"top":"var:preset|spacing|content","left":"var:preset|spacing|content"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-mixed-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"38.2%"} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"xl"} -->
			<h2 class="wp-block-heading has-xl-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"61.8%"} -->
		<div class="wp-block-column" style="flex-basis:61.8%">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="line-height:1.3"><?php Block_Pattern::the_text( '170' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:image {"align":"wide","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image alignwide size-large is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
	<!-- /wp:image -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"38.2%"} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '120' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"61.8%"} -->
		<div class="wp-block-column" style="flex-basis:61.8%"></div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
