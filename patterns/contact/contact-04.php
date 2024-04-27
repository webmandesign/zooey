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
	'title'    => _x( 'Contact info with giant description and multiple addresses', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'social', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"1000px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"300","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}}},"textColor":"contrast-alt","fontSize":"giant","fontFamily":"supplemental"} -->
		<p class="has-contrast-alt-color has-text-color has-link-color has-supplemental-font-family has-giant-font-size" style="font-style:normal;font-weight:300;line-height:1;text-transform:uppercase"><?php Block_Pattern::the_text( 1, '.' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|xl"}}},"className":"is-style-mobile-reverse"} -->
	<div class="wp-block-columns alignwide is-style-mobile-reverse">

		<!-- wp:column {"width":"38%","style":{"spacing":{"blockGap":"var:preset|spacing|s","padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l","left":"var:preset|spacing|l","right":"var:preset|spacing|l"}},"border":{"radius":"0.38rem"},"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.3"}},"backgroundColor":"secondary-mixed","fontSize":"xxl","fontFamily":"supplemental"} -->
		<div class="wp-block-column has-secondary-mixed-background-color has-background has-supplemental-font-family has-xxl-font-size" style="border-radius:0.38rem;padding-top:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l);padding-left:var(--wp--preset--spacing--l);font-style:normal;font-weight:700;line-height:1.3;flex-basis:38%">

			<!-- wp:paragraph -->
			<p><a href="#0">Facebook</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="#0">Instagram</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="#0">YouTube</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="#0">Twitter</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|l","top":"var:preset|spacing|l"}}}} -->
		<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l)">

			<!-- wp:columns -->
			<div class="wp-block-columns">

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|xl"}}} -->
				<div class="wp-block-column">

					<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
					<div class="wp-block-group">

						<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
						<h2 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( 'contact/address' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
					<div class="wp-block-group">

						<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
						<h2 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( 'contact/address' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|xl"}}} -->
				<div class="wp-block-column">

					<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
					<div class="wp-block-group">

						<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
						<h2 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( 'contact/address' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
					<div class="wp-block-group">

						<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
						<h2 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php Block_Pattern::the_text( 'contact/address' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
