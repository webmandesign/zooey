<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.8
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => sprintf(
		/* translators: %s: context. */
		_x( 'Site header: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Default', 'Site header context.', 'zooey' )
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

?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|content"},"blockGap":{"top":"var:preset|spacing|content","left":"var:preset|spacing|content"}}},"className":"has-global-padding","layout":{"type":"constrained","contentSize":"1600px"}} -->
<div class="wp-block-group has-global-padding" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:template-part {"slug":"custom-header-top","align":"wide"} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|xl"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}},"layout":{"selfStretch":"fit","flexSize":null}}} -->
		<div class="wp-block-group">

			<!-- wp:site-logo {"width":560,"shouldSyncIcon":false} /-->

			<!-- wp:site-title {"level":0,"style":{"typography":{"lineHeight":"1"}},"className":"is-style-screen-reader-text show-if-no-logo","fontSize":"mega"} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"480px"},"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
		<div class="wp-block-group">

			<!-- wp:site-tagline {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"l"} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|m"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:navigation {"overlayMenu":"always","icon":"menu","overlayBackgroundColor":"secondary","overlayTextColor":"contrast-alt","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1.2rem"},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"supplemental","anchor":"site-navigation"} /-->

				<!-- wp:search {"showLabel":false,"buttonUseIcon":true,"style":{"layout":{"selfStretch":"fill","flexSize":null}},"className":"is-style-button-outline"} /-->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"fontFamily":"supplemental"} -->
			<div class="wp-block-group has-supplemental-font-family">

				<?php if ( defined( 'WMD_THEME_DEMO' ) ) : ?>
				<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex"},"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"1.2rem"}}},"anchor":"secondary-navigation","overlayBackgroundColor":"secondary","overlayTextColor":"contrast-alt"} /-->
				<?php else : // Pages below match `Starter::pages()`. ?>
				<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex"},"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"1.2rem"}}},"anchor":"secondary-navigation","overlayBackgroundColor":"secondary","overlayTextColor":"contrast-alt"} -->
					<!-- wp:navigation-link {"label":"<?php echo esc_html_x( 'Blog', 'Page title', 'zooey' ); ?>","url":"<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"} /-->
					<!-- wp:navigation-link {"label":"<?php echo esc_html_x( 'About us', 'Page title', 'zooey' ); ?>","url":"<?php echo esc_url( get_permalink( get_page_by_path( esc_html_x( 'about-us', 'Page slug', 'zooey' ) ) ) ); ?>"} /-->
					<!-- wp:navigation-link {"label":"<?php echo esc_html_x( 'Services', 'Page title', 'zooey' ); ?>","url":"<?php echo esc_url( get_permalink( get_page_by_path( esc_html_x( 'services', 'Page slug', 'zooey' ) ) ) ); ?>"} /-->
					<!-- wp:navigation-link {"label":"<?php echo esc_html_x( 'Contact', 'Page title', 'zooey' ); ?>","url":"<?php echo esc_url( get_permalink( get_page_by_path( esc_html_x( 'contact', 'Page slug', 'zooey' ) ) ) ); ?>"} /-->
				<!-- /wp:navigation -->
				<?php endif; ?>

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
