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
	'title'    => _x( 'Progress bar', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'services', 'keyword', 'zooey' ),
		esc_html_x( 'features', 'keyword', 'zooey' ),
		esc_html_x( 'percentage', 'keyword', 'zooey' ),
		esc_html_x( 'stats', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.38em","left":"0.38em"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"fontSize":"s"} -->
	<p class="has-s-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/m' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"0.38rem"}},"backgroundColor":"primary-mixed","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group has-primary-mixed-background-color has-background" style="border-radius:0.38rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

		<!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"65%"},"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|s","right":"var:preset|spacing|s"}},"border":{"radius":"0.38rem"}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
		<div class="wp-block-group has-primary-background-color has-background" style="border-radius:0.38rem;padding-top:0;padding-right:var(--wp--preset--spacing--s);padding-bottom:0;padding-left:var(--wp--preset--spacing--s)">

			<!-- wp:paragraph {"fontSize":"s"} -->
			<p class="has-s-font-size">65%</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
