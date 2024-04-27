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
	'title'    => _x( 'List of toggles with heading on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'accordion', 'keyword', 'zooey' ),
		esc_html_x( 'details', 'keyword', 'zooey' ),
		esc_html_x( 'FAQ', 'keyword', 'zooey' ),
		esc_html_x( 'question', 'keyword', 'zooey' ),
		esc_html_x( 'answer', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}},"backgroundColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-alt-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php echo esc_html_x( 'FAQ', 'Frequently Asked Questions', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"contrast-alt"} -->
			<details class="wp-block-details has-contrast-alt-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"fontSize":"s"} -->
				<div class="wp-block-group has-s-font-size" style="padding-left:var(--wp--preset--spacing--m)">
					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '180' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</details>
			<!-- /wp:details -->

			<!-- wp:separator -->
			<hr class="wp-block-separator has-alpha-channel-opacity" />
			<!-- /wp:separator -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"contrast-alt"} -->
			<details class="wp-block-details has-contrast-alt-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"fontSize":"s"} -->
				<div class="wp-block-group has-s-font-size" style="padding-left:var(--wp--preset--spacing--m)">
					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '180' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</details>
			<!-- /wp:details -->

			<!-- wp:separator -->
			<hr class="wp-block-separator has-alpha-channel-opacity" />
			<!-- /wp:separator -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"contrast-alt"} -->
			<details class="wp-block-details has-contrast-alt-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"fontSize":"s"} -->
				<div class="wp-block-group has-s-font-size" style="padding-left:var(--wp--preset--spacing--m)">
					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '180' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</details>
			<!-- /wp:details -->

			<!-- wp:separator -->
			<hr class="wp-block-separator has-alpha-channel-opacity" />
			<!-- /wp:separator -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"contrast-alt"} -->
			<details class="wp-block-details has-contrast-alt-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"fontSize":"s"} -->
				<div class="wp-block-group has-s-font-size" style="padding-left:var(--wp--preset--spacing--m)">
					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '180' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</details>
			<!-- /wp:details -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
