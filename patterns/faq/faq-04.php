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
	'title'    => _x( 'Question with answer and an image on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'FAQ', 'keyword', 'zooey' ),
		esc_html_x( 'question', 'keyword', 'zooey' ),
		esc_html_x( 'answer', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image   = Block_Pattern::get_image_url( '3to4-1' );
$image_s = Block_Pattern::get_image_url( 's' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:media-text {"align":"wide","mediaId":<?php echo absint( ZOOEY_DUMMY_ID ); ?>,"mediaType":"image","verticalAlignment":"center","imageFill":true,"style":{"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
	<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center is-image-fill has-primary-background-color has-background" style="border-radius:0.38rem">
		<figure class="wp-block-media-text__media" style="background-image:url(<?php echo esc_url_raw( $image ); ?>);background-position:50% 50%"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" class="wp-image-<?php echo absint( ZOOEY_DUMMY_ID ); ?> size-full" /></figure>
		<div class="wp-block-media-text__content">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l"}},"dimensions":{"minHeight":"62vh"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
			<div class="wp-block-group" style="min-height:62vh;padding-top:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l)">

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"560px"}} -->
				<div class="wp-block-group">

					<!-- wp:heading -->
					<h2 class="wp-block-heading"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'title/l' ); ?>?</h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"dropCap":true,"fontSize":"l"} -->
					<p class="has-drop-cap has-l-font-size"><?php Block_Pattern::the_text( '130' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '120' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:image {"sizeSlug":"thumbnail","style":{"color":{"duotone":"var:preset|duotone|white"}}} -->
					<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_s ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
	</div>
	<!-- /wp:media-text -->

</div>
<!-- /wp:group -->
