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
	'title'    => _x( '3 columns of steps or features', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'services', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0">

	<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"contrast-alt"} -->
	<div class="wp-block-column has-contrast-alt-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"fontSize":"h-1"} -->
		<p class="has-h-1-font-size" style="line-height:1">01</p>
		<!-- /wp:paragraph -->

		<!-- wp:separator {"className":"is-style-dashed"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
		<!-- /wp:separator -->

		<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
		<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '85' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"contrast-alt"} -->
	<div class="wp-block-column has-contrast-alt-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"fontSize":"h-1"} -->
		<p class="has-h-1-font-size" style="line-height:1">02</p>
		<!-- /wp:paragraph -->

		<!-- wp:separator {"className":"is-style-dashed"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
		<!-- /wp:separator -->

		<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
		<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '85' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"contrast-alt"} -->
	<div class="wp-block-column has-contrast-alt-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"fontSize":"h-1"} -->
		<p class="has-h-1-font-size" style="line-height:1">03</p>
		<!-- /wp:paragraph -->

		<!-- wp:separator {"className":"is-style-dashed"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
		<!-- /wp:separator -->

		<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
		<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '85' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
