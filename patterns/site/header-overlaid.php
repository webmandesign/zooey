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
	'title'    => sprintf(
		/* translators: %s: context. */
		_x( 'Site header: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Overlaid', 'Site header context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'logo', 'keyword', 'zooey' ),
		esc_html_x( 'navigation', 'keyword', 'zooey' ),
		esc_html_x( 'site title', 'keyword', 'zooey' ),
		esc_html_x( 'tagline', 'keyword', 'zooey' ),
		esc_html_x( 'user account', 'keyword', 'zooey' ),
		esc_html_x( 'cart', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 'alignfull',
) );

// Block pattern content:

?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"0.62em","bottom":"0.62em"}},"border":{"bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"has-global-padding is-style-mobile-hide","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-global-padding is-style-mobile-hide has-white-color has-text-color has-link-color" style="border-bottom-width:1px;margin-top:0;padding-top:0.62em;padding-bottom:0.62em">

	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:site-logo {"width":60,"style":{"color":{"duotone":"var:preset|duotone|white"}}} /-->

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">

					<!-- wp:site-title {"level":0,"style":{"typography":{"textTransform":"lowercase"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"900"}},"fontSize":"xl","fontFamily":"alternative"} -->
					<p class="has-alternative-font-family has-xl-font-size" style="font-style:normal;font-weight:900;line-height:1.2">.</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:site-tagline {"className":"is-style-screen-reader-text"} /-->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"600px"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:600px">

			<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"secondary","overlayTextColor":"contrast-alt","className":"is-style-fixed-mobile-toggle","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1.25rem"},"typography":{"fontStyle":"normal","fontWeight":"600"}},"anchor":"site-navigation"} /-->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
			<div class="wp-block-group">

				<!-- wp:search {"showLabel":false,"buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"style":{"border":{"radius":"100px"}},"backgroundColor":"base"} /-->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}},"border":{"bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"has-global-padding is-style-mobile-only"} -->
<div class="wp-block-group has-global-padding is-style-mobile-only has-white-color has-text-color has-link-color" style="border-bottom-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">

			<!-- wp:site-logo {"width":40,"style":{"color":{"duotone":"var:preset|duotone|white"}}} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:site-title {"level":0,"style":{"typography":{"textTransform":"lowercase"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"900"}},"fontSize":"xl","fontFamily":"alternative"} -->
				<p class="has-alternative-font-family has-xl-font-size" style="font-style:normal;font-weight:900;line-height:1.2">.</p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

			<!-- wp:site-tagline {"className":"is-style-screen-reader-text"} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"overlayMenu":"always","icon":"menu","overlayBackgroundColor":"secondary","overlayTextColor":"contrast-alt","className":"is-style-fixed-mobile-toggle","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1.25rem"},"typography":{"fontStyle":"normal","fontWeight":"600"}},"anchor":"site-navigation-mobile"} /-->

	</div>
	<!-- /wp:group -->

	<!-- wp:search {"showLabel":false,"buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":"100px"},"layout":{"selfStretch":"fill","flexSize":null}}} /-->

</div>
<!-- /wp:group -->
