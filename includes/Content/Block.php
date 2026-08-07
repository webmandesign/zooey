<?php
/**
 * Block component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.5
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Assets;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Block implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.4
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'init', __CLASS__ . '::styles' );

			// Filters

				add_filter( 'render_block', __CLASS__ . '::render__empty', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block', __CLASS__ . '::render__gap', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				add_filter( 'render_block_core/search', __CLASS__ . '::render__search_expand', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block_core/social-links', __CLASS__ . '::render__social_links', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Registers individual block styles.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function styles() {

		// Variables

			$files = glob( get_template_directory() . '/assets/css/blocks/*.css' );


		// Processing

			foreach ( $files as $file ) {

				$block          = basename( $file, '.css' );
				$handle         = 'zooey-block-' . $block;
				$stylesheet     = 'assets/css/blocks/' . $block . '.css';
				$stylesheet_src = get_theme_file_uri( $stylesheet );
				$args           = array(
					'handle' => $handle,
					'src'    => $stylesheet_src,
					'path'   => get_theme_file_path( $stylesheet ),
				);

				Assets\Factory::style_register( $args );

				$block = ( strpos( $block, '--' ) ) ? ( str_replace( '--', '/', $block ) ) : ( 'core/' . $block );

				wp_enqueue_block_style( $block, $args );
			}

	} // /styles

	/**
	 * Block output modification: Set empty block content class.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__empty( string $block_content, array $block ): string {

		// Variables

			/**
			 * Filters list of blocks that should be checked for empty content.
			 *
			 * IMPORTANT:
			 * Only blocks that contain inner HTML tags are allowed here!
			 *
			 * @since  1.0.0
			 *
			 * @param  array $blocks
			 */
			$blocks = (array) apply_filters( 'zooey/content/block/render__empty', array(
				'core/group',
				'core/query',
			) );


		// Processing

			if ( in_array( $block['blockName'], $blocks ) ) {

				// Strip all whitespace first - it's really not needed.
				$content = preg_replace( '/\s/', '', $block_content );
				$content = explode( '><', trim( $content ) );

				array_shift( $content );
				array_pop( $content );

				if ( empty( array_filter( $content ) ) ) {

					$html = new WP_HTML_Tag_Processor( $block_content );

					$html->next_tag();
					$html->add_class( 'is-empty' );

					$block_content = $html->get_updated_html();
				}
			}


		// Output

			return $block_content;

	} // /render__empty

	/**
	 * Block output modification: Block gap.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__gap( string $block_content, array $block ): string {

		// Variables

			$blocks = array(
				'core/categories',
				'core/navigation',
				'core/tag-cloud',
			);


		// Processing

			if (
				in_array( $block['blockName'], $blocks )
				&& ! empty( $block['attrs']['style']['spacing']['blockGap'] )
			) {

				$html = new WP_HTML_Tag_Processor( $block_content );
				$gap  = array_map( function( $value ) {

					// Get spacing CSS variable from preset value if provided.
					if ( str_contains( $value, 'var:preset|spacing|' ) ) {
						$value =
							'var(--wp--preset--spacing--'
							. _wp_to_kebab_case( str_replace( 'var:preset|spacing|', '', $value ) )
							. ')';
					}

					return $value;

				}, (array) $block['attrs']['style']['spacing']['blockGap'] );

				$html->next_tag();
				$html->add_class( 'has-block-gap' );
				$html->set_attribute( 'style', '--theme--css--block-gap:' . implode( ' ', $gap ) . ';' . (string) $html->get_attribute( 'style' ) );

				$block_content = $html->get_updated_html();
			}


		// Output

			return $block_content;

	} // /render__gap

	/**
	 * Block output modification: Search form expand colors.
	 *
	 * Applies background and text color styles for search
	 * input field with expand behavior is enabled.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__search_expand( string $block_content, array $block ): string {

		// Processing

			if (
				! empty( $block['attrs']['buttonPosition'] )
				&& 'button-only' === $block['attrs']['buttonPosition']
				&& is_callable( 'get_color_classes_for_block_core_search' )
			) {

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag( array( 'class_name' => 'wp-block-search__input' ) );
				$html->add_class( get_color_classes_for_block_core_search( $block['attrs'] ) );

				$block_content = $html->get_updated_html();
			}


		// Output

			return $block_content;

	} // /render__search_expand

	/**
	 * Block output modification: Social Links improvements.
	 *
	 * Adds helpful layout justification CSS class.
	 * Allows using anchor links (starting with `#`).
	 *
	 * @since    1.0.0
	 * @version  2.0.5
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__social_links( string $block_content, array $block ): string {

		// Processing

			if ( ! empty( $block['attrs']['layout']['justifyContent'] ) ) {

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag();
				$html->add_class( 'has-justify-content-' . sanitize_html_class( $block['attrs']['layout']['justifyContent'] ) );

				$block_content = $html->get_updated_html();
			}

			$block_content = str_replace( 'https://#', '#', $block_content );


		// Output

			return $block_content;

	} // /render__social_links

}
