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
		_x( 'Blog page', 'Intro context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'blog', 'keyword', 'zooey' ),
		esc_html_x( 'journal', 'keyword', 'zooey' ),
		esc_html_x( 'news', 'keyword', 'zooey' ),
		esc_html_x( 'page header', 'keyword', 'zooey' ),
		esc_html_x( 'title', 'keyword', 'zooey' ),
		esc_html_x( 'heading', 'keyword', 'zooey' ),
		esc_html_x( 'h1', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 'alignfull',
) );

// Block pattern content:

$blog_page_id = get_option( 'page_for_posts' );

?>

<!-- wp:group {"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left","contentSize":"560px","wideSize":"100%"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"align":"wide","level":1} -->
		<h1 class="wp-block-heading alignwide"><?php

			if ( $blog_page_id ) {
				echo get_the_title( $blog_page_id );
			} else {
				echo esc_html_x( 'Blog', 'Fallback blog page title.', 'zooey' );
			}

		?></h1>
		<!-- /wp:heading -->

		<?php if ( has_excerpt( $blog_page_id ) ) : ?>
		<!-- wp:group {"className":"is-style-page-summary","fontSize":"l"} -->
		<div class="wp-block-group is-style-page-summary has-l-font-size">

			<!-- wp:paragraph -->
			<p><?php echo get_the_excerpt( $blog_page_id ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->
		<?php endif; ?>

		<!-- wp:search {"showLabel":false,"buttonUseIcon":true,"className":"is-style-button-outline"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
