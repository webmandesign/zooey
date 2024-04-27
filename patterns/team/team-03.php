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
	'title'    => _x( '3 team members and careers call to action', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'card', 'keyword', 'zooey' ),
		esc_html_x( 'team', 'keyword', 'zooey' ),
		esc_html_x( 'staff', 'keyword', 'zooey' ),
		esc_html_x( 'person', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"verticalAlignment":null,"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">

			<!-- wp:paragraph {"fontSize":"l"} -->
			<p class="has-l-font-size"><?php Block_Pattern::the_text( '140' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"},"margin":{"top":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--xl)">

		<!-- wp:column {"width":"25%"} -->
		<div class="wp-block-column" style="flex-basis:25%">
			<!-- wp:pattern {"slug":"zooey/team/team-06"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"25%"} -->
		<div class="wp-block-column" style="flex-basis:25%">
			<!-- wp:pattern {"slug":"zooey/team/team-06"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"25%"} -->
		<div class="wp-block-column" style="flex-basis:25%">
			<!-- wp:pattern {"slug":"zooey/team/team-06"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}},"border":{"radius":"1em"}},"backgroundColor":"secondary"} -->
		<div class="wp-block-column has-secondary-background-color has-background" style="border-radius:1em;padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);flex-basis:25%">

			<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="min-height:100%">

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}},"fontSize":"l"} -->
				<h3 class="wp-block-heading has-text-align-center has-l-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e( 'Careers', 'zooey' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","fontSize":"s"} -->
				<p class="has-text-align-center has-s-font-size"><?php Block_Pattern::the_text( '60' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|s"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--s)">

					<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
					<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
					<!-- /wp:button -->

				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
