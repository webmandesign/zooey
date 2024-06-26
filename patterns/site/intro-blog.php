<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.3
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

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"}}},"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left","contentSize":"560px","wideSize":"100%"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"align":"wide","level":1} -->
		<h1 class="wp-block-heading alignwide"><?php

			if ( $blog_page_id ) {
				echo get_the_title( $blog_page_id );
			} else {
				printf(
					/* translators: %s: site title. */
					esc_html__( '%s blog', 'zooey' ),
					get_bloginfo( 'name', 'display' )
				);
			}

		?></h1>
		<!-- /wp:heading -->

		<?php if ( $blog_page_id && has_excerpt( $blog_page_id ) ) : ?>
		<!-- wp:group {"className":"is-style-page-summary","fontSize":"l"} -->
		<div class="wp-block-group is-style-page-summary has-l-font-size">

			<!-- wp:paragraph -->
			<p><?php echo get_the_excerpt( $blog_page_id ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->
		<?php else : ?>
		<!-- wp:group {"className":"is-style-page-summary","fontSize":"l"} -->
		<div class="wp-block-group is-style-page-summary has-l-font-size">

			<!-- wp:site-tagline /-->

		</div>
		<!-- /wp:group -->
		<?php endif; ?>

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
