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

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

	<!-- wp:template-part {"align":"wide","slug":"custom-header-top"} /-->

	<!-- wp:spacer {"height":"var:preset|spacing|content"} -->
	<div style="height:var(--wp--preset--spacing--content)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:group -->
	<div class="wp-block-group">

		<!-- wp:heading {"textAlign":"center","level":1} -->
		<h1 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Search results', 'zooey' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"1rem"}}},"className":"has-search-results-count"} -->
		<p class="has-text-align-center has-search-results-count" style="margin-top:1rem"><?php

		/* translators: Do not translate `{posts_count}`. It will display posts count, a number. */
		esc_html_e( 'Number of matches found: {posts_count}', 'zooey' );

		?></p>
		<!-- /wp:paragraph -->

		<!-- wp:search {"placeholder":"Search the site","showLabel":false,"buttonUseIcon":true,"className":"is-style-button-outline"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
