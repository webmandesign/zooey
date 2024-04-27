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
	'title'    => _x( '4 pairs of question and answer in boxes in 2 columns with description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'FAQ', 'keyword', 'zooey' ),
		esc_html_x( 'question', 'keyword', 'zooey' ),
		esc_html_x( 'answer', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"50%","layout":{"type":"constrained","contentSize":"440px","justifyContent":"left"}} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/m' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '160' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|m"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--xl)">

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary-mixed"} -->
			<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '130' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary-mixed"} -->
			<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '130' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary-mixed"} -->
			<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '130' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary-mixed"} -->
			<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '130' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
