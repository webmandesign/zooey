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
	'title'    => _x( 'Person name badge with photo and job position', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'card', 'keyword', 'zooey' ),
		esc_html_x( 'team', 'keyword', 'zooey' ),
		esc_html_x( 'author', 'keyword', 'zooey' ),
		esc_html_x( 'staff', 'keyword', 'zooey' ),
		esc_html_x( 'person', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 480,
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '1to1-3' );

?>

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">

	<!-- wp:image {"aspectRatio":"1","scale":"cover","width":"80px","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-thumbnail is-resized is-style-rounded"><img src="<?php echo esc_url_raw( $image ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" style="width:80px;aspect-ratio:1;object-fit:cover"/></figure>
	<!-- /wp:image -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">

		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"l","fontFamily":"supplemental"} -->
		<p class="has-supplemental-font-family has-l-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'people/name' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'people/job' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
