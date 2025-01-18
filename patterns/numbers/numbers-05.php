<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.9
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => _x( 'Simple numbered features', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'steps', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1","fontSize":"8em"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}},"textColor":"secondary","fontFamily":"supplemental"} -->
			<p class="has-secondary-color has-text-color has-link-color has-supplemental-font-family" style="margin-bottom:var(--wp--preset--spacing--m);font-size:8em;line-height:1">01</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}}} -->
			<h2 class="wp-block-heading" style="margin-top:0"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1","fontSize":"8em"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}},"textColor":"secondary","fontFamily":"supplemental"} -->
			<p class="has-secondary-color has-text-color has-link-color has-supplemental-font-family" style="margin-bottom:var(--wp--preset--spacing--m);font-size:8em;line-height:1">02</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}}} -->
			<h2 class="wp-block-heading" style="margin-top:0"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1","fontSize":"8em"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}},"textColor":"secondary","fontFamily":"supplemental"} -->
			<p class="has-secondary-color has-text-color has-link-color has-supplemental-font-family" style="margin-bottom:var(--wp--preset--spacing--m);font-size:8em;line-height:1">03</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}}} -->
			<h2 class="wp-block-heading" style="margin-top:0"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
