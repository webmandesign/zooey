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
	'title'    => _x( 'Pricing table', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"border":{"top":{"width":"1px"}},"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0","left":"var:preset|spacing|l"}}}} -->
<div class="wp-block-columns alignwide" style="border-top-width:1px;margin-top:0;margin-bottom:0">

	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"320px"}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">

		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '65' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">

		<!-- wp:list {"className":"is-style-checkmark"} -->
		<ul class="is-style-checkmark">

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 's' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 'm' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 's' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 'm' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 's' ); ?></li>
			<!-- /wp:list-item -->

		</ul>
		<!-- /wp:list -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"12em","backgroundColor":"primary"} -->
	<div class="wp-block-column has-primary-background-color has-background" style="flex-basis:12em">

		<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center","flexWrap":"nowrap"}} -->
		<div class="wp-block-group" style="min-height:100%">

			<!-- wp:paragraph {"fontSize":"big"} -->
			<p class="has-big-font-size">$19</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0.5em"}}},"fontSize":"s"} -->
			<p class="has-s-font-size" style="margin-top:0.5em;text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"1rem"}}}} -->
			<div class="wp-block-buttons" style="margin-top:1rem">

				<!-- wp:button {"backgroundColor":"white","fontSize":"xs"} -->
				<div class="wp-block-button has-custom-font-size has-xs-font-size"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"border":{"top":{"width":"1px"}},"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0","left":"var:preset|spacing|l"}}}} -->
<div class="wp-block-columns alignwide" style="border-top-width:1px;margin-top:0;margin-bottom:0">

	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"320px"}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">

		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '65' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">

		<!-- wp:list {"className":"is-style-checkmark"} -->
		<ul class="is-style-checkmark">

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 's' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 'm' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 's' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 'm' ); ?></li>
			<!-- /wp:list-item -->

		</ul>
		<!-- /wp:list -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"12em","backgroundColor":"primary-mixed"} -->
	<div class="wp-block-column has-primary-mixed-background-color has-background" style="flex-basis:12em">

		<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center","flexWrap":"nowrap"}} -->
		<div class="wp-block-group" style="min-height:100%">

			<!-- wp:paragraph {"fontSize":"big"} -->
			<p class="has-big-font-size">$19</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0.5em"}}},"fontSize":"s"} -->
			<p class="has-s-font-size" style="margin-top:0.5em;text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"1rem"}}}} -->
			<div class="wp-block-buttons" style="margin-top:1rem">

				<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
				<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"border":{"top":{"width":"1px"},"bottom":{"width":"1px"}},"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0","left":"var:preset|spacing|l"}}}} -->
<div class="wp-block-columns alignwide" style="border-top-width:1px;border-bottom-width:1px;margin-top:0;margin-bottom:0">

	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"320px"}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">

		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php Block_Pattern::the_text( '65' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">

		<!-- wp:list {"className":"is-style-checkmark"} -->
		<ul class="is-style-checkmark">

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 's' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 'm' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php Block_Pattern::the_text( 's' ); ?></li>
			<!-- /wp:list-item -->

		</ul>
		<!-- /wp:list -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"12em","backgroundColor":"secondary-mixed"} -->
	<div class="wp-block-column has-secondary-mixed-background-color has-background" style="flex-basis:12em">

		<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center","flexWrap":"nowrap"}} -->
		<div class="wp-block-group" style="min-height:100%">

			<!-- wp:paragraph {"fontSize":"big"} -->
			<p class="has-big-font-size">$19</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0.5em"}}},"fontSize":"s"} -->
			<p class="has-s-font-size" style="margin-top:0.5em;text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"1rem"}}}} -->
			<div class="wp-block-buttons" style="margin-top:1rem">

				<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
				<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
