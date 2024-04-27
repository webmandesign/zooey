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
	'title'    => _x( 'Numbers in 4 columns with description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'stats', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-mixed-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"50%","layout":{"type":"constrained","contentSize":"440px","justifyContent":"left"}} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '150' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--l)">

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}},"border":{"width":"1px","radius":"0.38rem"}}} -->
		<div class="wp-block-column" style="border-width:1px;border-radius:0.38rem;padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"fontSize":"big","fontFamily":"supplemental"} -->
			<p class="has-supplemental-font-family has-big-font-size" style="line-height:1">12+</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
			<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 's' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}},"border":{"width":"1px","radius":"0.38rem"}}} -->
		<div class="wp-block-column" style="border-width:1px;border-radius:0.38rem;padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"fontSize":"big","fontFamily":"supplemental"} -->
			<p class="has-supplemental-font-family has-big-font-size" style="line-height:1">34+</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
			<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 's' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}},"border":{"width":"1px","radius":"0.38rem"}}} -->
		<div class="wp-block-column" style="border-width:1px;border-radius:0.38rem;padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"fontSize":"big","fontFamily":"supplemental"} -->
			<p class="has-supplemental-font-family has-big-font-size" style="line-height:1">56+</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
			<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 's' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}},"border":{"width":"1px","radius":"0.38rem"}}} -->
		<div class="wp-block-column" style="border-width:1px;border-radius:0.38rem;padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"fontSize":"big","fontFamily":"supplemental"} -->
			<p class="has-supplemental-font-family has-big-font-size" style="line-height:1">789+</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
			<p class="has-s-font-size" style="text-transform:uppercase"><?php Block_Pattern::the_text( 's' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
