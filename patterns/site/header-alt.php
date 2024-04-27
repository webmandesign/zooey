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
		_x( 'Navigation next to logo', 'Site header context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'logo', 'keyword', 'zooey' ),
		esc_html_x( 'navigation', 'keyword', 'zooey' ),
		esc_html_x( 'site title', 'keyword', 'zooey' ),
		esc_html_x( 'tagline', 'keyword', 'zooey' ),
		esc_html_x( 'social links', 'keyword', 'zooey' ),
		esc_html_x( 'cart', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 'alignfull',
) );

// Block pattern content:

?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"0.62em","bottom":"0.62em"}},"border":{"bottom":{"width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","className":"has-global-padding","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-global-padding has-contrast-alt-color has-text-color has-link-color" style="border-bottom-width:1px;margin-top:0;padding-top:0.62em;padding-bottom:0.62em">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|m"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:site-logo {"width":60} /-->

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">

					<!-- wp:site-title {"level":0,"style":{"typography":{"textTransform":"lowercase"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"xl","fontFamily":"alternative"} -->
					<p class="has-primary-color has-text-color has-link-color has-alternative-font-family has-xl-font-size" style="font-style:normal;font-weight:900;line-height:1.2">.</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:site-tagline {"className":"is-style-screen-reader-text"} /-->

			</div>
			<!-- /wp:group -->

			<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"secondary","overlayTextColor":"contrast-alt","className":"is-style-fixed-mobile-toggle","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1.25rem"},"typography":{"fontStyle":"normal","fontWeight":"600"}},"anchor":"site-navigation","className":"no-centered-submenu"} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:search {"showLabel":false,"buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":"100px"}},"fontSize":"xs"} /-->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
