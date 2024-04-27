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

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"0"}}},"backgroundColor":"secondary","textColor":"contrast","layout":{"type":"constrained"},"fontSize":"s"} -->
<div class="wp-block-group has-contrast-color has-secondary-background-color has-text-color has-background has-s-font-size" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:0">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"xxl"} -->
	<div class="wp-block-group alignwide has-xxl-font-size">

		<!-- wp:site-logo {"width":60} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">

			<!-- wp:site-title {"level":0,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}},"typography":{"textTransform":"lowercase"}},"textColor":"contrast-alt"} /-->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"xl","fontFamily":"alternative"} -->
			<p class="has-primary-color has-text-color has-link-color has-alternative-font-family has-xl-font-size" style="font-style:normal;font-weight:900;line-height:1.2">.</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xxl","left":"var:preset|spacing|m"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","contentSize":"440px","justifyContent":"left"}} -->
		<div class="wp-block-column" style="padding-right:0;padding-left:0">

			<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
			<h2 class="wp-block-heading is-style-screen-reader-text"><?php esc_html_e( 'About Us', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
				<p style="font-style:normal;font-weight:500"><?php Block_Pattern::the_text( '200' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"contrast-alt","iconColorValue":"#171f17","size":"has-large-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"margin":{"top":"var:preset|spacing|m"}}},"className":"is-style-logos-only","layout":{"type":"flex"}} -->
				<ul class="wp-block-social-links has-large-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--m)">
					<!-- wp:social-link {"url":"#purchaselink","service":"chain"} /-->
					<!-- wp:social-link {"url":"https://www.webmandesign.eu/","service":"chain"} /-->
					<!-- wp:social-link {"url":"https://www.facebook.com/webmandesigneu","service":"facebook"} /-->
					<!-- wp:social-link {"url":"https://twitter.com/webmandesigneu","service":"x"} /-->
				</ul>
				<!-- /wp:social-links -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"55%"} -->
		<div class="wp-block-column" style="flex-basis:55%">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
			<div class="wp-block-group">

				<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"0"}}}} -->
				<div class="wp-block-columns">

					<!-- wp:column {"width":"30px"} -->
					<div class="wp-block-column" style="flex-basis:30px">

						<!-- wp:image {"sizeSlug":"full"} -->
						<figure class="wp-block-image size-full"><img src="data:image/svg+xml,%3Csvg xmlns=&quot;http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg&quot; width=&quot;20&quot; height=&quot;20&quot; viewBox=&quot;0 0 256 256&quot;%3E%3Cpath fill=&quot;currentColor&quot; d=&quot;M239.2 97.29a16 16 0 0 0-13.81-11L166 81.17l-23.28-55.36a15.95 15.95 0 0 0-29.44 0L90.07 81.17l-59.46 5.15a16 16 0 0 0-9.11 28.06l45.11 39.42l-13.52 58.54a16 16 0 0 0 23.84 17.34l51-31l51.11 31a16 16 0 0 0 23.84-17.34l-13.51-58.6l45.1-39.36a16 16 0 0 0 4.73-17.09m-15.22 5l-45.1 39.36a16 16 0 0 0-5.08 15.71L187.35 216l-51.07-31a15.9 15.9 0 0 0-16.54 0l-51 31l13.46-58.6a16 16 0 0 0-5.08-15.71L32 102.35a.37.37 0 0 1 0-.09l59.44-5.14a16 16 0 0 0 13.35-9.75L128 32.08l23.2 55.29a16 16 0 0 0 13.35 9.75l59.45 5.14v.07Z&quot;%2F%3E%3C%2Fsvg%3E" alt="" /></figure>
						<!-- /wp:image -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column">

						<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","fontSize":"l"} -->
						<h2 class="wp-block-heading has-contrast-alt-color has-text-color has-link-color has-l-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e( 'Services', 'zooey' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.75em"},"typography":{"textTransform":"uppercase","fontSize":"1em"}}} -->
							<!-- wp:navigation-link {"label":"<?php esc_html_e( 'First service', 'zooey' ); ?>","url":"#0","fontSize":"s"} /-->
							<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Next service', 'zooey' ); ?>","url":"#0","fontSize":"s"} /-->
							<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Another service', 'zooey' ); ?>","url":"#0","fontSize":"s"} /-->
							<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Last service', 'zooey' ); ?>","url":"#0","fontSize":"s"} /-->
						<!-- /wp:navigation -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

				<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"0"}}}} -->
				<div class="wp-block-columns">

					<!-- wp:column {"width":"30px"} -->
					<div class="wp-block-column" style="flex-basis:30px">

						<!-- wp:image {"sizeSlug":"full"} -->
						<figure class="wp-block-image size-full"><img src="data:image/svg+xml,%3Csvg xmlns=&quot;http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg&quot; width=&quot;20&quot; height=&quot;20&quot; viewBox=&quot;0 0 256 256&quot;%3E%3Cpath fill=&quot;currentColor&quot; d=&quot;M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m16-40a8 8 0 0 1-8 8a16 16 0 0 1-16-16v-40a8 8 0 0 1 0-16a16 16 0 0 1 16 16v40a8 8 0 0 1 8 8m-32-92a12 12 0 1 1 12 12a12 12 0 0 1-12-12&quot;%2F%3E%3C%2Fsvg%3E" alt="" /></figure>
						<!-- /wp:image -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column">

						<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","fontSize":"l"} -->
						<h2 class="wp-block-heading has-contrast-alt-color has-text-color has-link-color has-l-font-size" style="font-style:normal;font-weight:500">Theme Info</h2>
						<!-- /wp:heading -->

						<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.75em"},"typography":{"textTransform":"uppercase","fontSize":"1em"}}} -->
							<!-- wp:navigation-link {"label":"Get the theme","url":"#purchaselink","fontSize":"s"} /-->
							<!-- wp:navigation-link {"label":"WebMan Design","url":"https://www.webmandesign.eu/","fontSize":"s"} /-->
							<!-- wp:navigation-link {"label":"Support Forum","url":"https://support.webmandesign.eu/forums/forum/zooey/","fontSize":"s"} /-->
							<!-- wp:navigation-link {"label":"User manual","url":"https://webmandesign.github.io/docs/zooey/","fontSize":"s"} /-->
						<!-- /wp:navigation -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

				<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"0"}},"layout":{"selfStretch":"fixed","flexSize":"240px"}}} -->
				<div class="wp-block-columns">

					<!-- wp:column {"width":"30px"} -->
					<div class="wp-block-column" style="flex-basis:30px">

						<!-- wp:image {"sizeSlug":"full"} -->
						<figure class="wp-block-image size-full"><img src="data:image/svg+xml,%3Csvg xmlns=&quot;http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg&quot; width=&quot;20&quot; height=&quot;20&quot; viewBox=&quot;0 0 256 256&quot;%3E%3Cpath fill=&quot;currentColor&quot; d=&quot;M128 64a40 40 0 1 0 40 40a40 40 0 0 0-40-40m0 64a24 24 0 1 1 24-24a24 24 0 0 1-24 24m0-112a88.1 88.1 0 0 0-88 88c0 31.4 14.51 64.68 42 96.25a254.19 254.19 0 0 0 41.45 38.3a8 8 0 0 0 9.18 0a254.19 254.19 0 0 0 41.37-38.3c27.45-31.57 42-64.85 42-96.25a88.1 88.1 0 0 0-88-88m0 206c-16.53-13-72-60.75-72-118a72 72 0 0 1 144 0c0 57.23-55.47 105-72 118&quot;%2F%3E%3C%2Fsvg%3E" alt="" /></figure>
						<!-- /wp:image -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column">

						<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","fontSize":"l"} -->
						<h2 class="wp-block-heading has-contrast-alt-color has-text-color has-link-color has-l-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e( 'Locations', 'zooey' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
						<div class="wp-block-group">

							<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
							<div class="wp-block-group">
								<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
								<h3 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e( 'London', 'zooey' ); ?></h3>
								<!-- /wp:heading -->
								<!-- wp:paragraph {"fontSize":"s"} -->
								<p class="has-s-font-size"><?php Block_Pattern::the_text( 'contact/address_inline' ); ?></p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->

							<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
							<div class="wp-block-group">
								<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
								<h3 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e( 'New York', 'zooey' ); ?></h3>
								<!-- /wp:heading -->
								<!-- wp:paragraph {"fontSize":"s"} -->
								<p class="has-s-font-size"><?php Block_Pattern::the_text( 'contact/address_inline' ); ?></p>
								<!-- /wp:paragraph -->
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

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:spacer {"height":"var:preset|spacing|m"} -->
	<div style="height:var(--wp--preset--spacing--m)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:template-part {"align":"wide","slug":"custom-header-bottom"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l"},"margin":{"top":"0"}},"border":{"top":{"width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="border-top-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l)">

		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"fontSize":"s"} -->
		<div class="wp-block-group alignwide has-s-font-size" style="text-transform:uppercase">

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Copyright &copy; ', 'zooey' ); ?><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></strong>, <?php echo date_i18n( 'Y' ); the_privacy_policy_link( ' — ' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
			<p style="font-style:normal;font-weight:600"><a href="#top"><?php esc_html_e( 'To the top &uarr;', 'zooey' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-alt-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:spacer {"height":"var:preset|spacing|xs"} -->
	<div style="height:var(--wp--preset--spacing--xs)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->
</div>
<!-- /wp:group -->
