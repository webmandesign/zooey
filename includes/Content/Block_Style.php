<?php
/**
 * Block styles component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.7
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Assets;
use WebManDesign\Zooey\Customize\Mod;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Block_Style implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'after_setup_theme', __CLASS__ . '::register' );

				add_action( 'enqueue_block_assets', __CLASS__ . '::responsive_block_styles' );

	} // /init

	/**
	 * Register block styles.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function register() {

		// Variables

			$styles = self::get_styles();


		// Processing

			foreach ( $styles as $class => $args ) {

				if (
					empty( $args['blocks'] )
					|| empty( $args['label'] )
				) {
					continue;
				}

				foreach ( (array) $args['blocks'] as $block ) {
					register_block_style(
						$block,
						array(
							'name'  => sanitize_html_class( $class ),
							'label' => esc_html( $args['label'] ),
						)
					);
				}
			}

	} // /register

	/**
	 * Gets theme block styles setup array.
	 *
	 * IMPORTANT:
	 * Do not set any block style for `core/query-pagination`, `core/query-pagination-previous/next`
	 * and `core/query-pagination-numbers` blocks as pagination appearance is global, used for potential
	 * non-block pagination provided by various plugins (such as WooCommerce).
	 *
	 * @since    1.0.0
	 * @version  1.0.7
	 *
	 * @return  array
	 */
	public static function get_styles(): array {

		// Variables

			$styles = array(

				'backdrop-blur' => array(
					'label'  => _x( 'Backdrop blur', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/column',
						'core/columns',
						'core/group',
					),
				),

				'buttons-inline' => array(
					'label'  => _x( 'Inline buttons', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/categories',
						'core/tag-cloud',
					),
				),

				'button-outline' => array(
					'label'  => _x( 'Outline button', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/search',
					),
				),

				'checkmark' => array(
					'label'  => _x( 'Checkmark', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/list',
					),
				),

				'dashed' => array(
					'label'  => _x( 'Dashed', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/separator',
					),
				),

				'disable-link' => array(
					'label'  => _x( 'Disable link', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/navigation-link',
						'core/navigation-submenu',
					),
				),

				'dotted' => array(
					'label'  => _x( 'Dotted', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/separator',
					),
				),

				'featured-posts' => array(
					'label'  => _x( 'Featured posts', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/template-part',
					),
				),

				'fixed-mobile-toggle' => array(
					'label'  => _x( 'Fixed mobile toggle button', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/navigation',
					),
				),

				'hover-content' => array(
					'label'  => _x( 'Content on hover', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/cover',
					),
				),

				'image' => array(
					'label'  => _x( 'Is image', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/navigation-link',
					),
				),

				'image-blur' => array(
					'label'  => _x( 'Blurred image', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/cover',
					),
				),

				'inline' => array(
					'label'  => _x( 'Inline', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/archives',
						'core/categories',
					),
				),

				'megamenu' => array(
					'label'  => _x( 'Megamenu', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/navigation-submenu',
					),
				),

				'mobile-hide' => array(
					'label'  => _x( 'Hide on small screens', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/button',
						'core/column',
						'core/cover',
						'core/group',
						'core/navigation',
						'core/navigation-submenu',
						'core/search',
						'core/separator',
						'core/spacer',
					),
				),
				'mobile-only' => array(
					'label'  => _x( 'Only on small screens', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/button',
						'core/column',
						'core/cover',
						'core/group',
						'core/navigation',
						'core/navigation-submenu',
						'core/search',
						'core/separator',
						'core/spacer',
					),
				),

				'mobile-reverse' => array(
					'label'  => _x( 'Reverse on small screens', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/columns',
					),
				),

				'no-bullets' => array(
					'label'  => _x( 'No bullets', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/list',
					),
				),

				'no-text-wrap' => array(
					'label'  => _x( 'No line break', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/button',
						'core/heading',
						'core/list',
						'core/list-item',
						'core/paragraph',
					),
				),

				'padding-left' => array(
					'label'  => _x( 'Padding left', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/image',
					),
				),
				'padding-right' => array(
					'label'  => _x( 'Padding right', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/image',
					),
				),

				'page-header' => array(
					'label'  => _x( 'Page intro', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/template-part',
					),
				),

				'page-summary' => array(
					'label'  => _x( 'Page intro summary', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/post-excerpt',
					),
				),

				'pull-down-l' => array(
					'label'  => _x( 'Pull down', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/columns',
						'core/cover',
						'core/group',
						'core/image',
						'core/post-featured-image',
					),
				),
				'pull-up-l' => array(
					'label'  => _x( 'Pull up', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/columns',
						'core/cover',
						'core/group',
						'core/image',
						'core/post-featured-image',
					),
				),

				'read-more-outline' => array(
					'label'  => _x( 'Read more outline', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/post-excerpt',
					),
				),
				'read-more-button' => array(
					'label'  => _x( 'Read more button', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/post-excerpt',
					),
				),

				'screen-reader-text' => array(
					'label'  => _x( 'Accessibly hidden', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/group',
						'core/heading',
						'core/post-title',
						'core/site-tagline',
						'core/site-title',
					),
				),

				'site-header' => array(
					'label'  => _x( 'Site header', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/template-part',
					),
				),

				'site-footer' => array(
					'label'  => _x( 'Site footer', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/template-part',
					),
				),

				'truncate-2' => array(
					'label'  => sprintf(
						/* translators: %d: number of text lines. */
						_nx( 'Truncate to %d line', 'Truncate to %d lines', 2, 'Block style label.', 'zooey' ),
						number_format_i18n( 2 )
					),
					'blocks' => array(
						'core/post-excerpt',
					),
				),

				'use-header-image' => array(
					'label'  => _x( 'Use header image', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/image',
					),
				),
				'use-header-image-flip-v' => array(
					'label'  => _x( 'Use header image (flipped)', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/image',
					),
				),

				'zoom-in' => array(
					'label'  => _x( 'Zoom in', 'Block style label.', 'zooey' ),
					'blocks' => array(
						'core/cover',
					),
				),
			);


		// Output

			/**
			 * Filters block styles setup array.
			 *
			 * @example
			 *   array(
			 *     'css-class' => array(
			 *       'label'  => (string) 'Block style label',
			 *       'blocks' => array( 'core/block-identifier' ),
			 *     ),
			 *   )
			 *
			 * @since  1.0.0
			 *
			 * @param  array $styles
			 */
			return (array) apply_filters( 'zooey/content/block_style/get_styles', $styles );

	} // /get_styles

	/**
	 * Making responsive block style breakpoint editable.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function responsive_block_styles() {

		// Variables

			$breakpoint = Mod::get( 'layout_breakpoint_mobile' );
			$handle     = 'zooey-responsive-block-styles';
			$css        = '';


		// Processing

			$css .=
				'@media (min-width: ' . absint( $breakpoint + 1 ) . 'px) {' // 1024px breakpoint.
				. '.is-style-mobile-only { display: none !important; }'
				. '}';

			$css .=
				'@media (max-width: ' . absint( $breakpoint ) . 'px) {'
				. '.is-style-mobile-hide { display: none !important; }'
				. '}';

			wp_register_style( $handle, '' );

			wp_add_inline_style(
				$handle,
				(string) Assets\Factory::esc_css( $css, 'responsive-block-styles' )
			);

			wp_enqueue_style( $handle );

	} // /responsive_block_styles

}
