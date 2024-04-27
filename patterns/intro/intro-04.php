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
	'title'    => _x( 'Page title with very large word and text on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
		esc_html_x( 'mega', 'keyword', 'zooey' ),
		esc_html_x( 'giant', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image   = Block_Pattern::get_image_url( '1to1-1' );
$image_s = Block_Pattern::get_image_url( 's' );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:template-part {"align":"wide","slug":"custom-header-top"} /-->

	<!-- wp:spacer {"height":"var:preset|spacing|l"} -->
	<div style="height:var(--wp--preset--spacing--l)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"66.66%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column" style="flex-basis:66.66%">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group">

				<!-- wp:image {"width":"160px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10rem"}}} -->
				<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="border-radius:10rem;width:160px" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">

					<!-- wp:post-title {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"xxl"} /-->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"900","lineHeight":"1","textTransform":"lowercase"}},"textColor":"primary","fontSize":"mega","fontFamily":"supplemental"} -->
					<p class="has-primary-color has-text-color has-supplemental-font-family has-mega-font-size" style="font-style:normal;font-weight:900;line-height:1;text-transform:lowercase"><?php esc_html_e( 'Hello.', 'zooey' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","width":"33.33%"} -->
		<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:33.33%">

			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"contrast-alt","fontSize":"l"} -->
			<p class="has-contrast-alt-color has-text-color has-link-color has-l-font-size" style="font-style:normal;font-weight:500"><?php Block_Pattern::the_text( '100' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:image {"sizeSlug":"thumbnail"} -->
			<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url_raw( $image_s ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
