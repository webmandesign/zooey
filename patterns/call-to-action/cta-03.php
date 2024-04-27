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
	'title'    => _x( 'Call to action with description and list of question and answer toggles', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
		esc_html_x( 'accordion', 'keyword', 'zooey' ),
		esc_html_x( 'details', 'keyword', 'zooey' ),
		esc_html_x( 'questions & answers', 'keyword', 'zooey' ),
		esc_html_x( 'faq', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">

			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"h-3"} -->
			<h2 class="wp-block-heading has-h-3-font-size" style="font-style:normal;font-weight:400"><?php Block_Pattern::the_text( '70' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"m"} -->
			<div class="wp-block-button has-custom-font-size has-m-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"fontSize":"l"} -->
			<p class="has-l-font-size"><?php Block_Pattern::the_text( '140' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '240' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:details -->
			<details class="wp-block-details">
				<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '200' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details">
				<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '200' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details">
				<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '200' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
