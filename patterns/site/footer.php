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
		_x( 'Default', 'Site footer context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'links', 'keyword', 'zooey' ),
		esc_html_x( 'social links', 'keyword', 'zooey' ),
		esc_html_x( 'info', 'keyword', 'zooey' ),
		esc_html_x( 'copyright', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1600px"}} -->
<div class="wp-block-group" style="margin-top:0;padding-top:0;padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:template-part {"slug":"custom-header-bottom","align":"wide"} /-->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"},"margin":{"top":"var:preset|spacing|l"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--l)">

		<!-- wp:site-logo {"width":320} /-->

		<!-- wp:social-links {"iconColor":"primary","size":"has-huge-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only","layout":{"type":"flex"}} -->
		<ul class="wp-block-social-links has-huge-icon-size has-icon-color is-style-logos-only">
			<!-- wp:social-link {"url":"https://wordpress.org/themes/zooey/","service":"wordpress"} /-->
			<!-- wp:social-link {"url":"https://www.webmandesign.eu/","service":"chain"} /-->
			<!-- wp:social-link {"url":"https://www.facebook.com/webmandesigneu","service":"facebook"} /-->
			<!-- wp:social-link {"url":"https://twitter.com/webmandesigneu","service":"x"} /-->
		</ul>
		<!-- /wp:social-links -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"},"margin":{"top":"var:preset|spacing|l"}}},"className":"is-style-mobile-reverse"} -->
	<div class="wp-block-columns alignwide is-style-mobile-reverse" style="margin-top:var(--wp--preset--spacing--l)">

		<!-- wp:column {"width":"61.8%","layout":{"type":"constrained","contentSize":"560px","justifyContent":"left"}} -->
		<div class="wp-block-column" style="flex-basis:61.8%">

			<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
			<div class="wp-block-group" style="min-height:100%">

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
					<h2 class="wp-block-heading is-style-screen-reader-text"><?php esc_html_e( 'About Us', 'zooey' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '110' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"},"padding":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s","left":"var:preset|spacing|s","right":"var:preset|spacing|s"}},"typography":{"textTransform":"uppercase"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"fontSize":"xs"} -->
				<div class="wp-block-group has-primary-background-color has-background has-xs-font-size" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--s);padding-right:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--s);padding-left:var(--wp--preset--spacing--s);text-transform:uppercase">

					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'Copyright &copy; ', 'zooey' ); ?><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></strong>, <?php echo date_i18n( 'Y' ); the_privacy_policy_link( ' — ' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><a href="#top"><?php esc_html_e( 'To the top &uarr;', 'zooey' ); ?></a></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"38.2%","layout":{"type":"constrained","justifyContent":"right","contentSize":"440px"}} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
			<div class="wp-block-group">

				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">

					<!-- wp:heading {"fontSize":"h-4"} -->
					<h2 class="wp-block-heading has-h-4-font-size">Theme Info</h2>
					<!-- /wp:heading -->

					<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.75em"},"typography":{"textTransform":"uppercase","fontSize":"1em"}}} -->
						<!-- wp:navigation-link {"label":"Get the theme","url":"https://wordpress.org/themes/zooey/","fontSize":"s"} /-->
						<!-- wp:navigation-link {"label":"WebMan Design","url":"https://www.webmandesign.eu/","fontSize":"s"} /-->
						<!-- wp:navigation-link {"label":"Support Forum","url":"https://support.webmandesign.eu/forums/forum/zooey/","fontSize":"s"} /-->
						<!-- wp:navigation-link {"label":"User manual","url":"https://webmandesign.github.io/docs/zooey/","fontSize":"s"} /-->
					<!-- /wp:navigation -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">

					<!-- wp:heading {"fontSize":"h-4"} -->
					<h2 class="wp-block-heading has-h-4-font-size"><?php esc_html_e( 'Services', 'zooey' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.75em"},"typography":{"textTransform":"uppercase","fontSize":"1em"}}} -->
						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'First service', 'zooey' ); ?>","url":"#0","fontSize":"s"} /-->
						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Next service', 'zooey' ); ?>","url":"#0","fontSize":"s"} /-->
						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Another service', 'zooey' ); ?>","url":"#0","fontSize":"s"} /-->
						<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Last service', 'zooey' ); ?>","url":"#0","fontSize":"s"} /-->
					<!-- /wp:navigation -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
