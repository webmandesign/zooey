<?php
/**
 * Menu component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey\Menu;

use WebManDesign\Zooey\Component_Interface;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'render_block', __CLASS__ . '::render__navigation', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				/**
				 * Fix font size class.
				 *
				 * By default WordPress applies font size class on the navigation container,
				 * as well as on submenu list items...
				 * WordPress is basically presuming everyone uses `rem` units to set font sizes.
				 *
				 * @link  https://github.com/WordPress/gutenberg/issues/76416
				 *
				 * The solution I provided in the GitHub issue comment is elegant, but also
				 * much slower than this simpler solution here. So, for PHP optimization
				 * we use this faster solution (faster on execution time (after measuring
				 * the microtime in PHP)).
				 *
				 * @link  https://github.com/WordPress/gutenberg/issues/76416#issuecomment-4056733214
				 */
				add_filter( 'render_block_core/navigation', __CLASS__ . '::render__font_size_fix', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Block output modification: Navigation menu block.
	 *
	 * Adding HTML ID attributes.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__navigation( string $block_content, array $block ): string {

		// Requirements check

			if ( empty( trim( $block_content ) ) ) {
				return $block_content;
			}


		// Processing

			switch ( $block['blockName'] ) {

				case 'core/navigation':
				case 'core/navigation-submenu':

					// Modify and style page list menu fallback.
					if ( stripos( $block_content, 'wp-block-page' ) ) {

						$block_content = str_replace(
							array(
								'wp-block-page-list',
								'wp-block-page',
							),
							array(
								'wp-block-navigation__container wp-block-page-list',
								'mod-wp-block-page',
							),
							$block_content
						);

						wp_enqueue_style( 'zooey-block-navigation-link' );
						wp_enqueue_style( 'zooey-block-navigation-submenu' );
					}
					// No break, fall through.

				case 'core/navigation':

					$has_overlay_menu = false;
					$html             = new WP_HTML_Tag_Processor( $block_content );

					// Navigation container can be `<nav>` or `<div>` (in custom menu overlay),
					// so we need to target the first element (with the class).
					// (The class is actually being used also on actual menu `<ul>`...)
					$html->next_tag( array( 'class_name' => 'wp-block-navigation' ) );

					// Set class based on responsive overlay menu status (enabled by default).
					if (
						! isset( $block['attrs']['overlayMenu'] )
						|| 'never' !== $block['attrs']['overlayMenu']
					) {

						$html->add_class( 'has-overlay-menu' );

						if ( empty( $block['attrs']['overlay'] ) ) {
							$has_overlay_menu = true; // Only when no custom overlay.
						} else {
							$html->add_class( 'has-overlay-menu-custom' );
						}

					} else {
						$html->add_class( 'no-overlay-menu' );
					}

					/**
					 * For block gap setup:
					 * @see  Content\Block::render__gap()
					 */

					// Set IDs for the navigation (for skip links).
					// (Note: Anchor is supported in WP7.0+ by default.)
					if ( ! empty( $block['attrs']['anchor'] ) ) {
						$html->set_attribute( 'id', $block['attrs']['anchor'] );

						// Apply custom ID to overlay navigation toggle button.
						// (We need to target both desktop and mobile navigation
						// as there might be overlay navigation displayed on large
						// screens too (instead of classic navigational menu).)
						if ( in_array( $block['attrs']['anchor'], array( 'site-navigation', 'site-navigation-mobile' ) ) ) {
							$html->next_tag( array( 'class_name' => 'wp-block-navigation__responsive-container-open' ) );
							$html->set_attribute( 'id', $block['attrs']['anchor'] . '-toggle' );
						}
					}

					$block_content = $html->get_updated_html();

					// Blurred mobile menu background.
					if (
						$has_overlay_menu
						&& function_exists( 'block_core_navigation_build_css_colors' )
					) {

						$colors  = block_core_navigation_build_css_colors( $block['attrs'] );
						$overlay =
							'<div class="wp-block-navigation__responsive-overlay">'
								. '<div'
									. ' class="' . esc_attr( implode( ' ', $colors['overlay_css_classes'] ) ) . '"'
									. ' style="' . esc_attr( $colors['overlay_inline_styles'] ) . '"'
								. '></div>'
							. '</div>';

						$block_content = str_replace(
							array(
								'<div class="wp-block-navigation__responsive-close" tabindex="-1">',
								// This is correct - check the code removing `tabindex` above:
								'<div class="wp-block-navigation__responsive-close" >',
							),
							array(
								$overlay . '<div class="wp-block-navigation__responsive-close" tabindex="-1">',
								// This is correct - check the code removing `tabindex` above:
								$overlay . '<div class="wp-block-navigation__responsive-close" >',
							),
							$block_content
						);

						$block_content = str_replace(
							'wp-block-navigation__responsive-container ',
							'wp-block-navigation__responsive-container is-blurred ',
							$block_content
						);
					}
					break;
			}


		// Output

			return $block_content;

	} // /render__navigation

	/**
	 * Fix font size class: 2) Remove font size CSS class propagation in Navigation block.
	 *
	 * IMPORTANT:
	 * Don't use solution from the link below. It is slower to execute (see explanation above).
	 * @link  https://github.com/WordPress/gutenberg/issues/76416#issuecomment-4056733214
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__font_size_fix( string $block_content, array $block ): string {

		// Requirements check

			if (
				empty( trim( $block_content ) )
				|| empty( $block['attrs']['fontSize'] )
			) {
				return $block_content;
			}


		// Variables

			$html = new WP_HTML_Tag_Processor( $block_content );
			$size = $block['attrs']['fontSize'];


		// Processing

			// Navigation container can be `<nav>` or `<div>` (in custom menu overlay),
			// so we need to target the first element (with CSS class).
			// (The same CSS class is actually being used also on menu `<ul>`.)
			$html->next_tag( array( 'class_name' => 'wp-block-navigation' ) );

			// Helper: Rename font size CSS class on container. (Will be changed below.)
			// Also add `.has-modified-font-size-class` CSS class for reference.
			$html->remove_class( 'has-' . $size . '-font-size' );
			$html->add_class( 'has-this-' . $size . '-font-size has-modified-font-size-class' );

			// Invalidate font size CSS class applied on children
			// and rename our helper CSS class set above.
			$block_content = str_replace(
				array(
					'has-' . $size . '-font-size',
					'has-this-' . $size . '-font-size',
				),
				array(
					'',
					'has-' . $size . '-font-size',
				),
				$html->get_updated_html()
			);


		// Output

			return $block_content;

	} // /render__font_size_fix

}
