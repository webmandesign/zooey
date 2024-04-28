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

	<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
	<h2 class="wp-block-heading is-style-screen-reader-text"><?php esc_html_e( 'Pricing plans', 'zooey' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"},"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base-alt","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
			<div class="wp-block-group has-base-alt-background-color has-background" style="border-radius:0.38rem;min-height:100%;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:list {"className":"is-style-checkmark"} -->
					<ul class="is-style-checkmark">
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 'm' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 's' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 'm' ); ?></li>
						<!-- /wp:list-item -->
					</ul>
					<!-- /wp:list -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"fontSize":"big"} -->
						<p class="has-big-font-size"><?php Block_Pattern::the_text( 'price' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
						<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

					<!-- wp:buttons {"layout":{"type":"flex"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-outline"} -->
						<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"},"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}},"dimensions":{"minHeight":"100%"}},"backgroundColor":"primary","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
			<div class="wp-block-group has-primary-background-color has-background" style="border-radius:0.38rem;min-height:100%;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:list {"className":"is-style-checkmark"} -->
					<ul class="is-style-checkmark">
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 'm' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 's' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 'm' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 's' ); ?></li>
						<!-- /wp:list-item -->
					</ul>
					<!-- /wp:list -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"fontSize":"big"} -->
						<p class="has-big-font-size"><?php Block_Pattern::the_text( 'price' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
						<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

					<!-- wp:buttons {"layout":{"type":"flex"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"backgroundColor":"white"} -->
						<div class="wp-block-button"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"},"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}},"dimensions":{"minHeight":"100%"}},"backgroundColor":"secondary-mixed","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
			<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem;min-height:100%;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l)">

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:list {"className":"is-style-checkmark"} -->
					<ul class="is-style-checkmark">
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 'm' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 's' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 'm' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 's' ); ?></li>
						<!-- /wp:list-item -->
						<!-- wp:list-item -->
						<li><?php Block_Pattern::the_text( 'm' ); ?></li>
						<!-- /wp:list-item -->
					</ul>
					<!-- /wp:list -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"fontSize":"big"} -->
						<p class="has-big-font-size"><?php Block_Pattern::the_text( 'price' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
						<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'xs' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

					<!-- wp:buttons {"layout":{"type":"flex"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-outline"} -->
						<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->

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
