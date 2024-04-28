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
	'title'    => _x( 'Working hours', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'business hours', 'keyword', 'zooey' ),
		esc_html_x( 'opening hours', 'keyword', 'zooey' ),
		esc_html_x( 'time', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 500,
) );

?>

<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
<div class="wp-block-group">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'date/mon' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:separator {"className":"is-style-dotted"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dotted" />
		<!-- /wp:separator -->
		<!-- wp:paragraph -->
		<p>9:00 - 17:00</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'date/tue' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:separator {"className":"is-style-dotted"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dotted" />
		<!-- /wp:separator -->
		<!-- wp:paragraph -->
		<p>9:00 - 17:00</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'date/wed' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:separator {"className":"is-style-dotted"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dotted" />
		<!-- /wp:separator -->
		<!-- wp:paragraph -->
		<p>9:00 - 17:00</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'date/thu' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:separator {"className":"is-style-dotted"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dotted" />
		<!-- /wp:separator -->
		<!-- wp:paragraph -->
		<p>9:00 - 17:00</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'date/fri' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:separator {"className":"is-style-dotted"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dotted" />
		<!-- /wp:separator -->
		<!-- wp:paragraph -->
		<p>9:00 - 17:00</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'date/sat' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:separator {"className":"is-style-dotted"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dotted" />
		<!-- /wp:separator -->
		<!-- wp:paragraph -->
		<p>9:00 - 12:00</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
		<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 'date/sun' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:separator {"className":"is-style-dotted"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-dotted" />
		<!-- /wp:separator -->
		<!-- wp:paragraph -->
		<p><?php echo esc_html_x( 'Closed', 'As in time, working hours.', 'zooey' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
