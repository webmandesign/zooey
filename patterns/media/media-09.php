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
	'title'    => _x( 'Banner text with image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'image', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-2' );

?>

<!-- wp:media-text {"align":"wide","mediaPosition":"right","mediaId":<?php echo absint( ZOOEY_DUMMY_ID ); ?>,"mediaType":"image","mediaWidth":38,"imageFill":true,"style":{"border":{"radius":"0.38rem"}},"backgroundColor":"secondary"} -->
<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-image-fill has-secondary-background-color has-background" style="border-radius:0.38rem;grid-template-columns:auto 38%">
	<div class="wp-block-media-text__content">

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"400px","wideSize":"600px"}} -->
		<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">

			<!-- wp:heading {"textAlign":"center","align":"wide","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
			<h2 class="wp-block-heading alignwide has-text-align-center" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","fontSize":"l"} -->
			<p class="has-text-align-center has-l-font-size"><?php Block_Pattern::the_text( '60' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<figure class="wp-block-media-text__media" style="background-image:url(<?php echo esc_url_raw( $image ); ?>);background-position:50% 50%"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" class="wp-image-<?php echo absint( ZOOEY_DUMMY_ID ); ?> size-full" /></figure>
</div>
<!-- /wp:media-text -->
