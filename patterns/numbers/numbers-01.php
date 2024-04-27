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
	'title'    => _x( 'Numbers in 2 columns with large text description on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'stats', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:heading {"align":"wide","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
	<h2 class="wp-block-heading alignwide has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"","layout":{"type":"constrained","contentSize":"540px","justifyContent":"left"}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","lineHeight":"1.3","fontStyle":"normal","fontWeight":"700"}},"textColor":"contrast-alt","fontSize":"xxl"} -->
			<p class="has-contrast-alt-color has-text-color has-xxl-font-size" style="font-style:normal;font-weight:700;line-height:1.3;text-transform:uppercase"><?php Block_Pattern::the_text( '120' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|m"}}}} -->
			<div class="wp-block-columns">

				<!-- wp:column -->
				<div class="wp-block-column">

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1"}},"textColor":"primary","fontSize":"big"} -->
					<p class="has-primary-color has-text-color has-big-font-size" style="font-style:normal;font-weight:700;line-height:1">24/7</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '80' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xs"} -->
					<p class="has-xs-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><a href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1"}},"textColor":"primary","fontSize":"big"} -->
					<p class="has-primary-color has-text-color has-big-font-size" style="font-style:normal;font-weight:700;line-height:1">365</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '80' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xs"} -->
					<p class="has-xs-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><a href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
