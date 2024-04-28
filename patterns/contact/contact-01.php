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
	'title'    => _x( 'Simple contact info with large intro text', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'email', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"1000px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:paragraph {"align":"wide","style":{"typography":{"lineHeight":"1.3","fontStyle":"normal","fontWeight":"700"}},"fontSize":"h-3","fontFamily":"supplemental","textColor":"contrast-alt"} -->
		<p class="alignwide has-text-align-wide has-contrast-alt-color has-text-color has-supplemental-font-family has-h-3-font-size" style="font-style:normal;font-weight:700;line-height:1.3"><?php Block_Pattern::the_text( '85' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity" />
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:heading {"fontSize":"l"} -->
			<h2 class="wp-block-heading has-l-font-size"><?php esc_html_e( 'Social networks', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:social-links {"iconColor":"primary","iconColorValue":"#e51c06","size":"has-large-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"className":"is-style-logos-only"} -->
			<ul class="wp-block-social-links has-large-icon-size has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"#0","service":"instagram"} /-->
				<!-- wp:social-link {"url":"#0","service":"youtube"} /-->
			</ul>
			<!-- /wp:social-links -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:heading {"fontSize":"l"} -->
			<h2 class="wp-block-heading has-l-font-size"><?php esc_html_e( 'Get in touch', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><a href="mailto:<?php echo esc_attr( Block_Pattern::get_text( 'contact/email' ) ); ?>"><?php Block_Pattern::the_text( 'contact/email' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:heading {"fontSize":"l"} -->
			<h2 class="wp-block-heading has-l-font-size"><?php esc_html_e( 'Visit us', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( 'contact/address_inline' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
