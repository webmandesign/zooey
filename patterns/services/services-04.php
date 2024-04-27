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
	'title'    => _x( 'Columns of features with large letters instead of icons', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'call to action', 'keyword', 'zooey' ),
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"},"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"backgroundColor":"contrast-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-alt-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"33.33%","style":{"border":{"radius":"0.38rem"},"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"}}},"backgroundColor":"primary"} -->
		<div class="wp-block-column has-primary-background-color has-background" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l);flex-basis:33.33%">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/xs' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"s"} -->
			<p class="has-s-font-size"><?php Block_Pattern::the_text( '140' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column" style="flex-basis:33.33%">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"6em","lineHeight":"1","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} -->
			<p style="font-size:6em;font-style:normal;font-weight:700;line-height:1">A</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"l"} -->
			<p class="has-l-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="margin-top:0;text-decoration:none"><a href="#0">→</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column" style="flex-basis:33.33%">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"6em","lineHeight":"1","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} -->
			<p style="font-size:6em;font-style:normal;font-weight:700;line-height:1">B</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"l"} -->
			<p class="has-l-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="margin-top:0;text-decoration:none"><a href="#0">→</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"33.33%","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column" style="flex-basis:33.33%">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"6em","lineHeight":"1","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} -->
			<p style="font-size:6em;font-style:normal;font-weight:700;line-height:1">C</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"l"} -->
			<p class="has-l-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="margin-top:0;text-decoration:none"><a href="#0">→</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column" style="flex-basis:33.33%">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"6em","lineHeight":"1","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} -->
			<p style="font-size:6em;font-style:normal;font-weight:700;line-height:1">D</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"l"} -->
			<p class="has-l-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="margin-top:0;text-decoration:none"><a href="#0">→</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%","style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column" style="flex-basis:33.33%">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"6em","lineHeight":"1","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} -->
			<p style="font-size:6em;font-style:normal;font-weight:700;line-height:1">E</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"l"} -->
			<p class="has-l-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="margin-top:0;text-decoration:none"><a href="#0">→</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
