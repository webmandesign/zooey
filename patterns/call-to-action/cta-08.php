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
	'title'    => _x( 'Simple call to action with big text description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left","contentSize":"1000px"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"m"} -->
		<h2 class="wp-block-heading has-m-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","fontSize":"h-2"} -->
		<p class="has-contrast-alt-color has-text-color has-link-color has-h-2-font-size" style="font-style:normal;font-weight:700;line-height:1.2"><?php Block_Pattern::the_text( '65' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
