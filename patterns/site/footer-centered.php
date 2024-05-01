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

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1600px"}} -->
<div class="wp-block-group" style="margin-top:0;padding-top:0;padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:template-part {"slug":"custom-header-bottom","align":"wide"} /-->

	<!-- wp:site-logo {"width":560,"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|content"}}},"className":"is-logo-footer"} /-->

	<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1.2rem"},"typography":{"textTransform":"uppercase","fontSize":"1em","fontStyle":"normal","fontWeight":"700"}}} -->
		<!-- wp:navigation-link {"label":"Lorem","url":"#0"} /-->
		<!-- wp:navigation-link {"label":"Ipsum","url":"#0"} /-->
		<!-- wp:navigation-link {"label":"Dolor sit","url":"#0"} /-->
		<!-- wp:navigation-link {"label":"Amet","url":"#0"} /-->
	<!-- /wp:navigation -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Copyright &copy; ', 'zooey' ); ?><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></strong>, <?php echo date_i18n( 'Y' ); the_privacy_policy_link( ' &ensp;—&ensp; ' ); ?> &ensp;—&ensp; <a href="#top"><?php esc_html_e( 'To the top &uarr;', 'zooey' ); ?></a></p>
	<!-- /wp:paragraph -->

	<!-- wp:social-links {"iconColor":"primary","size":"has-huge-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-huge-icon-size has-icon-color is-style-logos-only">
		<!-- wp:social-link {"url":"#getzooey","service":"chain"} /-->
		<!-- wp:social-link {"url":"https://www.webmandesign.eu/","service":"chain"} /-->
		<!-- wp:social-link {"url":"https://www.facebook.com/webmandesigneu","service":"facebook"} /-->
		<!-- wp:social-link {"url":"https://twitter.com/webmandesigneu","service":"x"} /-->
	</ul>
	<!-- /wp:social-links -->

</div>
<!-- /wp:group -->
