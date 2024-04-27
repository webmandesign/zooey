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
		_x( 'Site footer: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Centered', 'Site footer context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'links', 'keyword', 'zooey' ),
		esc_html_x( 'social links', 'keyword', 'zooey' ),
		esc_html_x( 'info', 'keyword', 'zooey' ),
		esc_html_x( 'copyright', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 'alignfull',
) );

?>

<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"},"padding":{"top":"var:preset|spacing|content","bottom":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"},"fontSize":"s"} -->
<div class="wp-block-group has-secondary-background-color has-background has-s-font-size" style="padding-top:var(--wp--preset--spacing--content);padding-bottom:0">

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.25em","left":"0.25em"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">

		<!-- wp:site-logo {"align":"center","className":"is-logo-footer"} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group">

			<!-- wp:site-title {"level":0,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}},"typography":{"textTransform":"lowercase"}},"textColor":"contrast-alt","fontSize":"h-2"} /-->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"h-2","fontFamily":"alternative"} -->
			<p class="has-primary-color has-text-color has-link-color has-alternative-font-family has-h-2-font-size" style="font-style:normal;font-weight:900;line-height:1.2">.</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1.25rem"},"typography":{"textTransform":"uppercase","fontSize":"1em","fontStyle":"normal","fontWeight":"500"}}} -->
		<!-- wp:navigation-link {"label":"Lorem","url":"#0"} /-->
		<!-- wp:navigation-link {"label":"Ipsum","url":"#0"} /-->
		<!-- wp:navigation-link {"label":"Dolor sit","url":"#0"} /-->
		<!-- wp:navigation-link {"label":"Amet","url":"#0"} /-->
	<!-- /wp:navigation -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Copyright &copy; ', 'zooey' ); ?><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></strong>, <?php echo date_i18n( 'Y' ); ?> &ensp;—&ensp; <?php the_privacy_policy_link(); ?> &ensp;—&ensp; <a href="#top"><?php esc_html_e( 'To the top &uarr;', 'zooey' ); ?></a></p>
	<!-- /wp:paragraph -->

	<!-- wp:social-links {"iconColor":"contrast-alt","iconColorValue":"#171f17","size":"has-huge-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-huge-icon-size has-icon-color is-style-logos-only">
		<!-- wp:social-link {"url":"#purchaselink","service":"chain"} /-->
		<!-- wp:social-link {"url":"https://www.webmandesign.eu/","service":"chain"} /-->
		<!-- wp:social-link {"url":"https://www.facebook.com/webmandesigneu","service":"facebook"} /-->
		<!-- wp:social-link {"url":"https://twitter.com/webmandesigneu","service":"x"} /-->
	</ul>
	<!-- /wp:social-links -->

	<!-- wp:template-part {"align":"wide","slug":"custom-header-bottom"} /-->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-alt-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:spacer {"height":"var:preset|spacing|xs"} -->
	<div style="height:var(--wp--preset--spacing--xs)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->
</div>
<!-- /wp:group -->
