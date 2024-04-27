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
	'title'    => _x( 'Pricing plans in 3 columns', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"border":{"radius":"0.38rem","width":"2px"},"spacing":{"blockGap":"0"}},"borderColor":"secondary-mixed"} -->
		<div class="wp-block-column has-border-color has-secondary-mixed-border-color" style="border-width:2px;border-radius:0.38rem">

			<!-- wp:group {"style":{"border":{"radius":"0.38rem"}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained","contentSize":"320px"}} -->
			<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem">

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
				<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:separator -->
				<hr class="wp-block-separator has-alpha-channel-opacity"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php Block_Pattern::the_text( '75' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"giant"} -->
				<p class="has-text-align-center has-giant-font-size"><?php Block_Pattern::the_text( 'price' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0.5em"}}},"fontSize":"s"} -->
				<p class="has-text-align-center has-s-font-size" style="margin-top:0.5em;text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5em","padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}}},"layout":{"type":"constrained","contentSize":"320px"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 's' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 'm' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 's' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"border":{"radius":"0.38rem","width":"2px"},"spacing":{"blockGap":"0"}},"borderColor":"primary"} -->
		<div class="wp-block-column has-border-color has-primary-border-color" style="border-width:2px;border-radius:0.38rem">

			<!-- wp:group {"style":{"border":{"radius":"0.38rem"}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"320px"}} -->
			<div class="wp-block-group has-primary-background-color has-background" style="border-radius:0.38rem">

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
				<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:separator -->
				<hr class="wp-block-separator has-alpha-channel-opacity"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php Block_Pattern::the_text( '75' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"giant"} -->
				<p class="has-text-align-center has-giant-font-size"><?php Block_Pattern::the_text( 'price' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0.5em"}}},"fontSize":"s"} -->
				<p class="has-text-align-center has-s-font-size" style="margin-top:0.5em;text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"white"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5em","padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}}},"layout":{"type":"constrained","contentSize":"320px"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 's' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 'm' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 's' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 'm' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"border":{"radius":"0.38rem","width":"2px"},"spacing":{"blockGap":"0"}},"borderColor":"primary-mixed"} -->
		<div class="wp-block-column has-border-color has-primary-mixed-border-color" style="border-width:2px;border-radius:0.38rem">

			<!-- wp:group {"style":{"border":{"radius":"0.38rem"}},"backgroundColor":"primary-mixed","layout":{"type":"constrained","contentSize":"320px"}} -->
			<div class="wp-block-group has-primary-mixed-background-color has-background" style="border-radius:0.38rem">

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
				<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:separator -->
				<hr class="wp-block-separator has-alpha-channel-opacity"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php Block_Pattern::the_text( '75' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"giant"} -->
				<p class="has-text-align-center has-giant-font-size"><?php Block_Pattern::the_text( 'price' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0.5em"}}},"fontSize":"s"} -->
				<p class="has-text-align-center has-s-font-size" style="margin-top:0.5em;text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5em","padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}}},"layout":{"type":"constrained","contentSize":"320px"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 's' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 'm' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 's' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 'm' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-dashed"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( 's' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
