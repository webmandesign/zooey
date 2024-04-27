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
	'title' => _x( '3 colored features in 2 columns with an image', 'Block pattern title.', 'zooey' ),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-2' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
	<h2 class="wp-block-heading is-style-screen-reader-text"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"verticalAlignment":"bottom","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-bottom">

		<!-- wp:column {"verticalAlignment":"bottom","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%">

			<!-- wp:image {"sizeSlug":"medium","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-medium is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php Block_Pattern::the_text( 'alt' ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","width":"50%","style":{"border":{"top":{"color":"var:preset|color|primary","width":"0.75em"},"radius":"0.38rem"},"spacing":{"padding":{"right":"var:preset|spacing|l","left":"var:preset|spacing|l","top":"var:preset|spacing|l","bottom":"var:preset|spacing|l"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
		<div class="wp-block-column is-vertically-aligned-bottom has-secondary-mixed-background-color has-background" style="border-radius:0.38rem;border-top-color:var(--wp--preset--color--primary);border-top-width:0.75em;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l);flex-basis:50%">

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '140' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"50%","style":{"border":{"top":{"color":"var:preset|color|primary","width":"0.75em"},"radius":"0.38rem"},"spacing":{"padding":{"right":"var:preset|spacing|l","left":"var:preset|spacing|l","top":"var:preset|spacing|l","bottom":"var:preset|spacing|l"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
		<div class="wp-block-column has-secondary-mixed-background-color has-background" style="border-radius:0.38rem;border-top-color:var(--wp--preset--color--primary);border-top-width:0.75em;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l);flex-basis:50%">

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '140' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%","style":{"border":{"top":{"color":"var:preset|color|primary","width":"0.75em"},"radius":"0.38rem"},"spacing":{"padding":{"right":"var:preset|spacing|l","left":"var:preset|spacing|l","top":"var:preset|spacing|l","bottom":"var:preset|spacing|l"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
		<div class="wp-block-column has-secondary-mixed-background-color has-background" style="border-radius:0.38rem;border-top-color:var(--wp--preset--color--primary);border-top-width:0.75em;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l);flex-basis:50%">

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '140' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
