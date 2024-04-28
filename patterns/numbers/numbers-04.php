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
	'title'    => _x( 'History section with years', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'year', 'keyword', 'zooey' ),
		esc_html_x( 'timeline', 'keyword', 'zooey' ),
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'steps', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:heading {"align":"wide"} -->
	<h2 class="wp-block-heading alignwide"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:separator {"align":"wide","className":"is-style-dashed"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-dashed" />
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"900","lineHeight":"1"}},"fontSize":"big"} -->
			<h3 class="wp-block-heading has-big-font-size" style="font-style:normal;font-weight:900;line-height:1">1987</h3>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '230' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-dashed"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-dashed" />
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"900","lineHeight":"1"}},"fontSize":"big"} -->
			<h3 class="wp-block-heading has-big-font-size" style="font-style:normal;font-weight:900;line-height:1">1991</h3>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '230' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-dashed"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-dashed" />
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"900","lineHeight":"1"}},"fontSize":"big"} -->
			<h3 class="wp-block-heading has-big-font-size" style="font-style:normal;font-weight:900;line-height:1"><?php echo esc_html( date( 'Y' ) ); ?></h3>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '230' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
