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
	'title'    => sprintf(
		/* translators: %s: context. */
		_x( 'Intro: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Search results page', 'Intro context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 'alignfull',
) );

?>

<!-- wp:group {"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left","contentSize":"560px","wideSize":"100%"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"level":1,"align":"wide"} -->
		<h1 class="wp-block-heading alignwide"><?php esc_html_e( 'Search results', 'zooey' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem"}}},"className":"has-search-results-count"} -->
		<p class="has-search-results-count" style="margin-top:1rem"><?php

		/* translators: Do not translate `{posts_count}`. It will display posts count, a number. */
		esc_html_e( 'Number of matches found: {posts_count}', 'zooey' );

		?></p>
		<!-- /wp:paragraph -->

		<!-- wp:search {"showLabel":false,"buttonUseIcon":true,"className":"is-style-button-outline"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
