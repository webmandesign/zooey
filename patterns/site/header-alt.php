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

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|content"},"blockGap":{"top":"var:preset|spacing|content","left":"var:preset|spacing|content"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","className":"has-global-padding","layout":{"type":"constrained","contentSize":"1600px"}} -->
<div class="wp-block-group has-global-padding has-contrast-alt-color has-text-color has-link-color" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:template-part {"slug":"custom-header-top","align":"wide"} /-->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|m"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">

			<!-- wp:group -->
			<div class="wp-block-group">

				<!-- wp:site-logo {"width":480,"shouldSyncIcon":false} /-->

				<!-- wp:site-title {"level":0,"isLink":false,"className":"is-style-screen-reader-text"} /-->

				<!-- wp:site-tagline {"className":"is-style-screen-reader-text"} /-->

			</div>
			<!-- /wp:group -->

			<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"secondary","overlayTextColor":"contrast-alt","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1.2rem"},"typography":{"fontStyle":"normal","fontWeight":"500"}},"anchor":"site-navigation","className":"is-style-fixed-mobile-toggle"} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:search {"showLabel":false,"buttonUseIcon":true,"className":"is-style-button-outline"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
