<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    2.0.1
 * @version  2.0.4
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$title_suffix = ( ! empty( $GLOBALS['wp_version'] ) && version_compare( $GLOBALS['wp_version'], '7.0', '<' ) ) ? ( ' (WordPress 7.0+)' ) : ( '' );

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => _x( 'Navigation overlay', 'Block pattern title.', 'zooey' ) . $title_suffix,
	'keywords' => array(
		esc_html_x( 'navigation', 'keyword', 'zooey' ),
		esc_html_x( 'user account', 'keyword', 'zooey' ),
		esc_html_x( 'cart', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
		esc_html_x( 'responsive', 'keyword', 'zooey' ),
		esc_html_x( 'mobile', 'keyword', 'zooey' ),
		esc_html_x( 'small screen', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 800,
) );

// Block pattern content:

$color_text = Demo::get_value( 'color_primary', 'is_dark', 'white', 'black' );

?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|l","left":"var:preset|spacing|l","top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}},"dimensions":{"minHeight":"100vh"},"border":{"radius":{"topLeft":"0","topRight":"0","bottomLeft":"0","bottomRight":"0"}}},"textColor":"<?php echo esc_attr( $color_text ); ?>","gradient":"primary-to-secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"center"}} -->
<div class="wp-block-group has-<?php echo esc_attr( $color_text ); ?>-color has-primary-to-secondary-gradient-background has-text-color has-background" style="border-top-left-radius:0;border-top-right-radius:0;border-bottom-left-radius:0;border-bottom-right-radius:0;min-height:100vh;padding-top:var(--wp--preset--spacing--xxl);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--xxl);padding-left:var(--wp--preset--spacing--l)">

	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
		<div class="wp-block-group">

			<!-- wp:navigation-overlay-close {
				"style": {
					"spacing": {
						"padding": {
							"top": "var:preset|spacing|s",
							"bottom": "var:preset|spacing|s",
							"left": "var:preset|spacing|s",
							"right": "var:preset|spacing|s"
						}
					}
				},
				"fontSize": "l"
			} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:search {"showLabel":false,"buttonPosition":"button-inside","buttonUseIcon":true} /-->

		<!-- wp:navigation {
			"showSubmenuIcon": false,
			"submenuVisibility": "always",
			"overlayMenu": "never",
			"style": {
				"spacing": {
					"blockGap": "var:preset|spacing|xs"
				},
				"typography": {
					"fontStyle": "normal",
					"fontWeight": "700"
				}
			},
			"fontSize": "xxl",
			"fontFamily": "supplemental",
			"layout": {
				"type": "flex",
				"orientation": "vertical",
				"flexWrap": "nowrap"
			},
			"ariaLabel":"<?php echo esc_attr_x( 'Primary', 'Navigational menu label.', 'zooey' ); ?>"
		} -->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'Home', 'Page title', 'zooey' ); ?>","url":"#0"} /-->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'About us', 'Page title', 'zooey' ); ?>","url":"#0"} /-->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'Our services', 'Page title', 'zooey' ); ?>","url":"#0"} /-->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'Blog', 'Page title', 'zooey' ); ?>","url":"#0"} /-->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'Contact', 'Page title', 'zooey' ); ?>","url":"#0"} /-->
		<!-- /wp:navigation -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
