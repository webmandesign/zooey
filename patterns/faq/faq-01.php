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
	'title'    => _x( 'List of toggles', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'accordion', 'keyword', 'zooey' ),
		esc_html_x( 'details', 'keyword', 'zooey' ),
		esc_html_x( 'FAQ', 'keyword', 'zooey' ),
		esc_html_x( 'question', 'keyword', 'zooey' ),
		esc_html_x( 'answer', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php Block_Pattern::the_text( '140' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"},"margin":{"top":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xl)">

		<!-- wp:details -->
		<details class="wp-block-details">
			<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '230' ); ?></p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details">
			<summary><?php echo esc_html_x( 'Q: ', 'Frequently asked questions: question prefix.', 'zooey' ); Block_Pattern::the_text( 'm', '?' ); ?></summary>
			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '230' ); ?></p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
