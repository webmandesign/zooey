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
	'title'    => _x( 'Boxes with title on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'FAQ', 'keyword', 'zooey' ),
		esc_html_x( 'question', 'keyword', 'zooey' ),
		esc_html_x( 'answer', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column {"width":"38.2%"} -->
	<div class="wp-block-column" style="flex-basis:38.2%">

		<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
		<div class="wp-block-group">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '130' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"61.8%"} -->
	<div class="wp-block-column" style="flex-basis:61.8%">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary-mixed"} -->
		<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
			<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:separator -->
			<hr class="wp-block-separator has-alpha-channel-opacity"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '200' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary-mixed"} -->
		<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
			<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:separator -->
			<hr class="wp-block-separator has-alpha-channel-opacity"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '200' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary-mixed"} -->
		<div class="wp-block-group has-secondary-mixed-background-color has-background" style="border-radius:0.38rem">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"l"} -->
			<h3 class="wp-block-heading has-l-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:separator -->
			<hr class="wp-block-separator has-alpha-channel-opacity"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '200' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
