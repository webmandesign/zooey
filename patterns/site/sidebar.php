<?php
/**
 * Block pattern setup file.
 *
 * No need for Theme Hook Alliance sidebar hooks here
 * as this content is definitely going to be overridden
 * by user content.
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
	'title'    => _x( 'Sidebar', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'widget', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'postTypes' => 'all', // Available also for post content.
) );

// Block pattern content:

/**
 * Accessibility:
 *
 * We can set up `aria-label` for Group block.
 * @link  https://fullsiteediting.com/block-support/arialabel/
 */

$image = Block_Pattern::get_image_url( '1to1-3', 'sidebar-about-me' );

?>

<!-- wp:group {"tagName":"aside","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}}},"layout":{"type":"constrained","contentSize":"480px"}} -->
<aside aria-label="<?php esc_attr_e( 'Sidebar, a secondary content', 'zooey' ); ?>" class="wp-block-group">

	<!-- wp:group {"tagName":"section","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"padding":{"top":"0"}},"border":{"radius":"0.38rem"}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":""}} -->
	<section class="wp-block-group has-primary-background-color has-background" style="border-radius:0.38rem;padding-top:0">

		<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
		<h2 class="wp-block-heading is-style-screen-reader-text"><?php esc_html_e( 'About me', 'zooey' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:image {"width":"240px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"custom","align":"center","style":{"border":{"radius":{"bottomLeft":"20rem","bottomRight":"20rem"}},"spacing":{"margin":{"top":"0"}}}} -->
		<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border" style="margin-top:0"><img src="<?php echo esc_url_raw( $image ); ?>" alt="" style="border-bottom-left-radius:20rem;border-bottom-right-radius:20rem;aspect-ratio:1;object-fit:cover;width:240px" /></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}},"typography":{"lineHeight":"2"}}} -->
		<div class="wp-block-group" style="line-height:2">

			<!-- wp:paragraph {"align":"center","style":{"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"700","lineHeight":"1.3"}},"fontSize":"xl","fontFamily":"supplemental"} -->
			<p class="has-text-align-center has-supplemental-font-family has-xl-font-size" style="font-style:normal;font-weight:700;line-height:1.3;text-decoration:none"><a href="#0"><?php Block_Pattern::the_text( 'people/name' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"xs"} -->
			<p class="has-text-align-center has-xs-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'people/job' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</section>
	<!-- /wp:group -->


	<!-- wp:group {"tagName":"section","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}},"border":{"radius":"0.38rem"}},"backgroundColor":"base-alt"} -->
	<section class="wp-block-group has-base-alt-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:heading {"fontSize":"xl"} -->
		<h2 class="wp-block-heading has-xl-font-size"><?php echo esc_html_x( 'Tags', 'Widget title.', 'zooey' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"fontSize":"s"} -->
		<div class="wp-block-group has-s-font-size">

			<!-- wp:tag-cloud {"numberOfTags":15,"smallestFontSize":"0.85em","largestFontSize":"0.85em","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":{"top":"0.25em","left":"1em"}}}} /-->

		</div>
		<!-- /wp:group -->

	</section>
	<!-- /wp:group -->


	<!-- wp:group {"tagName":"section","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}},"border":{"radius":"0.38rem"}},"backgroundColor":"base-alt"} -->
	<section class="wp-block-group has-base-alt-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:heading {"fontSize":"xl"} -->
		<h2 class="wp-block-heading has-xl-font-size"><?php echo esc_html_x( 'Recent Comments', 'Widget title.', 'zooey' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"fontSize":"s"} -->
		<div class="wp-block-group has-s-font-size">

			<!-- wp:latest-comments {"commentsToShow":3,"displayExcerpt":false} /-->

		</div>
		<!-- /wp:group -->

	</section>
	<!-- /wp:group -->

</aside>
<!-- /wp:group -->
