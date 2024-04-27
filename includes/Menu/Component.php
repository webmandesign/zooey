<?php
/**
 * Menu component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
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
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'render_block', __CLASS__ . '::render__navigation', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Block output modification: Navigation menu block.
	 *
	 * Adding HTML ID attributes.
	 *
	 * @since  1.0.0
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

				case 'core/navigation-link':

					// Helper HTML wrapper for current menu item decoration.
					//
					// No need to target `core/navigation-submenu` block here
					// as it does not support menu item description anyway
					// and we can target it directly with CSS (see `assets/scss/blocks/navigation-link.scss`).
					if (
						! empty( $block['attrs']['label'] )
						&& false === stripos( $block_content, 'wp-block-navigation-item__label' )
						&& stripos( $block_content, 'current-menu-item' )
					) {

						$label = wp_kses_post( $block['attrs']['label'] );

						$block_content = str_replace(
							$label,
							'<span class="wp-block-navigation-item__label">' . $label . '</span>',
							$block_content
						);
					}
					// No break, fall through.

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

					$html = new WP_HTML_Tag_Processor( $block_content );

					$html->next_tag();

					// Set class based on responsive overlay menu status (enabled by default).
					if (
						! isset( $block['attrs']['overlayMenu'] )
						|| 'never' !== $block['attrs']['overlayMenu']
					) {
						$html->add_class( 'has-overlay-menu' );
					}

					// Set ID for the navigation wrapper.
					if ( ! empty( $block['attrs']['anchor'] ) ) {
						$html->set_attribute( 'id', $block['attrs']['anchor'] );
					}

					// Not sure why there is `tabindex` set, but it seems redundant.
					$html->next_tag( array( 'class_name' => 'wp-block-navigation__responsive-close' ) );
					$html->remove_attribute( 'tabindex' );

					$block_content = $html->get_updated_html();
					break;

				case 'core/navigation-submenu':

					$html = new WP_HTML_Tag_Processor( $block_content );

					// Fix submenu parent item class (so it's not duplicate - on submenu container and submenu parent).
					if ( $html->next_tag( array( 'tag_name' => 'li', 'class' => 'wp-block-navigation-submenu' ) ) ) {
						$html->remove_class( 'wp-block-navigation-submenu' );
						$html->add_class( 'has-wp-block-navigation-submenu' );
					}

					$block_content = $html->get_updated_html();
					break;
			}


		// Output

			return $block_content;

	} // /render__navigation

}
