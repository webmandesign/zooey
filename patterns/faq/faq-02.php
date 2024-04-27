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
	'title'    => _x( '4 numbered pairs of question and answer in 2 columns with description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'FAQ', 'keyword', 'zooey' ),
		esc_html_x( 'question', 'keyword', 'zooey' ),
		esc_html_x( 'answer', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|l"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-bottom:var(--wp--preset--spacing--xl)">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"dropCap":true,"fontSize":"l"} -->
			<p class="has-drop-cap has-l-font-size"><?php Block_Pattern::the_text( '200' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column"></div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"layout":{"type":"constrained","contentSize":"540px","justifyContent":"left"}} -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"textColor":"primary","fontSize":"giant"} -->
				<p class="has-primary-color has-text-color has-giant-font-size"><strong>01</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator -->
				<hr class="wp-block-separator has-alpha-channel-opacity"/>
				<!-- /wp:separator -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"layout":{"type":"constrained","contentSize":"540px","justifyContent":"left"}} -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"textColor":"primary","fontSize":"giant"} -->
				<p class="has-primary-color has-text-color has-giant-font-size"><strong>02</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator -->
				<hr class="wp-block-separator has-alpha-channel-opacity"/>
				<!-- /wp:separator -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"layout":{"type":"constrained","contentSize":"540px","justifyContent":"left"}} -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"textColor":"primary","fontSize":"giant"} -->
				<p class="has-primary-color has-text-color has-giant-font-size"><strong>03</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator -->
				<hr class="wp-block-separator has-alpha-channel-opacity"/>
				<!-- /wp:separator -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"layout":{"type":"constrained","contentSize":"540px","justifyContent":"left"}} -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"textColor":"primary","fontSize":"giant"} -->
				<p class="has-primary-color has-text-color has-giant-font-size"><strong>04</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator -->
				<hr class="wp-block-separator has-alpha-channel-opacity"/>
				<!-- /wp:separator -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '160' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
