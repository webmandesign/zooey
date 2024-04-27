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
		_x( 'Split', 'Site footer context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'links', 'keyword', 'zooey' ),
		esc_html_x( 'social links', 'keyword', 'zooey' ),
		esc_html_x( 'info', 'keyword', 'zooey' ),
		esc_html_x( 'copyright', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

global $content_width;

$image = Block_Pattern::get_image_url( '3to2-2' );

?>

<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"},"fontSize":"s"} -->
<div class="wp-block-group has-secondary-background-color has-background has-s-font-size" style="padding-top:0;padding-bottom:0">

	<!-- wp:columns {"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":{"top":"0","left":"0"}}}} -->
	<div class="wp-block-columns alignfull" style="padding-right:0;padding-left:0">

		<!-- wp:column {"width":"50%","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content","right":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained","justifyContent":"right","contentSize":"<?php echo absint( $content_width / 2 ); ?>px"}} -->
		<div class="wp-block-column has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--content);padding-right:0;padding-bottom:var(--wp--preset--spacing--content);flex-basis:50%">

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"4vw","left":"0"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"480px"}} -->
			<div class="wp-block-group" style="padding-right:4vw;padding-left:0">

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">

					<!-- wp:site-title {"level":0,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}},"typography":{"textTransform":"lowercase"}},"textColor":"contrast-alt","fontSize":"h-3"} /-->

					<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"h-3","fontFamily":"alternative"} -->
					<p class="has-primary-color has-text-color has-link-color has-alternative-font-family has-h-3-font-size" style="font-style:normal;font-weight:900;line-height:1.2">.</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:site-tagline {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0.5em"}}},"fontSize":"m"} /-->

				<!-- wp:paragraph {"fontSize":"l"} -->
				<p class="has-l-font-size"><?php Block_Pattern::the_text( 2, '.' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"primary","iconColorValue":"#5f1a37","size":"has-large-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links has-large-icon-size has-icon-color is-style-logos-only">
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

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":80,"overlayColor":"primary","minHeight":100,"minHeightUnit":"%","contentPosition":"center center","style":{"spacing":{"padding":{"right":"4vw","left":"0px","top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}},"color":{"duotone":"var:preset|duotone|gray"},"border":{"radius":{"bottomLeft":"1rem"}}},"layout":{"type":"constrained","contentSize":"<?php echo absint( $content_width / 2 ); ?>px"}} -->
			<div class="wp-block-cover" style="border-bottom-left-radius:1rem;padding-top:var(--wp--preset--spacing--content);padding-right:4vw;padding-bottom:var(--wp--preset--spacing--content);padding-left:0px;min-height:100%">
				<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">

					<!-- wp:columns {"style":{"spacing":{"padding":{"left":"10%"},"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|m"}}}} -->
					<div class="wp-block-columns" style="padding-left:10%">

						<!-- wp:column -->
						<div class="wp-block-column">

							<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
							<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
							<!-- /wp:heading -->

							<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.62em"}},"fontSize":"m"} -->
								<!-- wp:navigation-link {"label":"Lorem ipsum","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Dolor sit","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Amet lorem","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Ipsum sit","url":"#0"} /-->
							<!-- /wp:navigation -->

						</div>
						<!-- /wp:column -->

						<!-- wp:column -->
						<div class="wp-block-column">

							<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
							<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
							<!-- /wp:heading -->

							<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.62em"}},"fontSize":"m"} -->
								<!-- wp:navigation-link {"label":"Lorem ipsum","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Dolor sit","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Amet lorem","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Ipsum sit","url":"#0"} /-->
							<!-- /wp:navigation -->

						</div>
						<!-- /wp:column -->

						<!-- wp:column -->
						<div class="wp-block-column">

							<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
							<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
							<!-- /wp:heading -->

							<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.62em"}},"fontSize":"m"} -->
								<!-- wp:navigation-link {"label":"Lorem ipsum","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Dolor sit","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Amet lorem","url":"#0"} /-->
								<!-- wp:navigation-link {"label":"Ipsum sit","url":"#0"} /-->
							<!-- /wp:navigation -->

						</div>
						<!-- /wp:column -->

					</div>
					<!-- /wp:columns -->

			</div></div>
			<!-- /wp:cover -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"},"margin":{"top":"var:preset|spacing|l"}},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"fontSize":"s"} -->
	<div class="wp-block-group alignwide has-s-font-size" style="margin-top:var(--wp--preset--spacing--l);text-transform:uppercase">

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Copyright &copy; ', 'zooey' ); ?><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></strong>, <?php echo date_i18n( 'Y' ); the_privacy_policy_link( ' — ' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
		<p style="font-style:normal;font-weight:600"><a href="#top"><?php esc_html_e( 'To the top &uarr;', 'zooey' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"var:preset|spacing|l"} -->
	<div style="height:var(--wp--preset--spacing--l)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

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
