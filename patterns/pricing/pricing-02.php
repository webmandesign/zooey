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
	'title'    => _x( 'Restaurant food menu', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'meals', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-bottom:var(--wp--preset--spacing--l)">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">

			<!-- wp:paragraph {"fontSize":"l"} -->
			<p class="has-l-font-size"><?php Block_Pattern::the_text( '110' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"xs"} -->
			<p class="has-xs-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><a href="#section-1"><?php Block_Pattern::the_text( 'title/s' ); ?></a> — <a href="#section-2"><?php Block_Pattern::the_text( 'title/s' ); ?></a> — <a href="#section-3"><?php Block_Pattern::the_text( 'title/s' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|m"},"margin":{"top":"0"}}}} -->
	<div class="wp-block-group alignwide" id="section-1" style="margin-top:0;padding-top:var(--wp--preset--spacing--m)">

		<!-- wp:group {"style":{"border":{"radius":"0.38rem"}},"gradient":"base-alt-to-transparent-v","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-alt-to-transparent-v-gradient-background has-background" style="border-radius:0.38rem">

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|l","top":"0"}}}} -->
			<h3 class="wp-block-heading" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--l)"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-group">

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group">

					<!-- wp:heading {"level":4,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"l"} -->
					<h4 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/m' ); ?></h4>
					<!-- /wp:heading -->

					<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":"null"}},"className":"is-style-dashed"} -->
					<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed" />
					<!-- /wp:separator -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
					<p style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'price' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left","contentSize":"480px"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"fontSize":"s"} -->
					<p class="has-s-font-size"><?php Block_Pattern::the_text( '120' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|m"},"margin":{"top":"0"}}}} -->
	<div class="wp-block-group alignwide" id="section-2" style="margin-top:0;padding-top:var(--wp--preset--spacing--m)">

		<!-- wp:group {"style":{"border":{"radius":"0.38rem"}},"gradient":"base-alt-to-transparent-v","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-alt-to-transparent-v-gradient-background has-background" style="border-radius:0.38rem">

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|l","top":"0"}}}} -->
			<h3 class="wp-block-heading" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--l)"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-group">

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group">

					<!-- wp:heading {"level":4,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"l"} -->
					<h4 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/m' ); ?></h4>
					<!-- /wp:heading -->

					<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":"null"}},"className":"is-style-dashed"} -->
					<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed" />
					<!-- /wp:separator -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
					<p style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'price' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left","contentSize":"480px"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"fontSize":"s"} -->
					<p class="has-s-font-size"><?php Block_Pattern::the_text( '120' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|m"},"margin":{"top":"0"}}}} -->
	<div class="wp-block-group alignwide" id="section-3" style="margin-top:0;padding-top:var(--wp--preset--spacing--m)">

		<!-- wp:group {"style":{"border":{"radius":"0.38rem"}},"gradient":"base-alt-to-transparent-v","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-alt-to-transparent-v-gradient-background has-background" style="border-radius:0.38rem">

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|l","top":"0"}}}} -->
			<h3 class="wp-block-heading" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--l)"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-group">

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group">

					<!-- wp:heading {"level":4,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"l"} -->
					<h4 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/m' ); ?></h4>
					<!-- /wp:heading -->

					<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":"null"}},"className":"is-style-dashed"} -->
					<hr class="wp-block-separator has-alpha-channel-opacity is-style-dashed" />
					<!-- /wp:separator -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
					<p style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'price' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left","contentSize":"480px"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"fontSize":"s"} -->
					<p class="has-s-font-size"><?php Block_Pattern::the_text( '120' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
