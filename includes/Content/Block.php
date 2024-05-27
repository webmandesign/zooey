<?php
/**
 * Block component.
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
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Block implements Component_Interface {

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

				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::enqueue_editor_mods' );

				add_action( 'init', __CLASS__ . '::styles', ZOOEY_ENQUEUE_PRIORITY );

			// Filters

				add_filter( 'block_type_metadata_settings', __CLASS__ . '::block_settings', 10, 2 );

				add_filter( 'pre_render_block', __CLASS__ . '::pre_render__conditional', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				add_filter( 'render_block', __CLASS__ . '::render__empty', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block', __CLASS__ . '::render__gap', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				add_filter( 'render_block_core/button', __CLASS__ . '::render__button_background', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block_core/search', __CLASS__ . '::render__search_expand', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block_core/social-links', __CLASS__ . '::render__social_links', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Enqueues block editor assets for block modifications.
	 *
	 * @since    1.0.0
	 * @version  1.0.2
	 *
	 * @return  void
	 */
	public static function enqueue_editor_mods() {

		// Variables

			$header_image = get_header_image();

			if ( empty( $header_image ) ) {
				$header_image = get_theme_support( 'custom-header', 'default-image' );
			}


		// Processing

			Assets\Factory::script_enqueue( array(
				'handle' => 'zooey-block-mods',
				'src'    => get_theme_file_uri( 'assets/js/block-mods.min.js' ),
				'deps'   => array( 'wp-blocks', 'wp-hooks', 'wp-dom-ready', 'lodash' ),
			) );

			Assets\Factory::script_enqueue( array(
				'handle'   => 'zooey-block-variations',
				'src'      => get_theme_file_uri( 'assets/js/block-variations.min.js' ),
				'deps'     => array( 'wp-blocks', 'wp-i18n', 'wp-dom-ready' ),
				'localize' => array(
					'zooeyVariations' => array(
						'getTemplateDirectoryURI' => trailingslashit( get_template_directory_uri() ),
						'getHeaderImage'          => esc_url_raw( $header_image ),
					),
				),
			) );

	} // /enqueue_editor_mods

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
	 * Block (block type) settings modification.
	 *
	 * No need to enable specific options,
	 * simply enabling whole groups of options.
	 *
	 * @since    1.0.0
	 * @version  1.0.7
	 *
	 * @param  array $settings  Array of determined settings for registering a block type.
	 * @param  array $metadata  Metadata provided for registering a block type.
	 *
	 * @return  array
	 */
	public static function block_settings( array $settings, array $metadata ): array {

		// Processing

			switch ( $metadata['name'] ) {

				/**
				 * Padding + margin.
				 */
				case 'core/post-content':
					$settings['supports']['spacing']['padding'] =
					$settings['supports']['spacing']['margin']  = true;
					break;

				/**
				 * Margin.
				 */
				case 'core/comments-pagination':
				case 'core/query-pagination':
				case 'core/search':
					$settings['supports']['spacing']['margin'] = true;
					break;

				/**
				 * Border.
				 *
				 * //* = Some blocks actually support border setup,
				 * but the support may be partial only. For such cases
				 * we need to enable additional (whole) support here,
				 * but there's no need to do so via JavaScript.
				 * A Column block is one of such blocks.
				 * @link  https://fullsiteediting.com/block-support/__experimentalborder/
				 */
				case 'core/column':
				case 'core/cover':
				case 'core/post-author':
				case 'core/post-comments-form':
				case 'core/site-tagline':
					$settings['supports']['__experimentalBorder']['color']  =
					$settings['supports']['__experimentalBorder']['style']  =
					$settings['supports']['__experimentalBorder']['width']  =
					$settings['supports']['__experimentalBorder']['radius'] = true;
					break;

				/**
				 * Block gap.
				 */

					case 'core/details':
					case 'core/post-author-biography':
						$settings['supports']['layout']['allowEditing'] = false;
						break;

				/**
				 * Specific setups.
				 */

					case 'core/comment-content':
						$settings['supports']['__experimentalBorder'] =
						$settings['supports']['spacing']['margin']    = true;
						break;

					case 'core/comments':
						// https://make.wordpress.org/core/2023/07/14/layout-updates-in-the-editor-for-wordpress-6-3/
						$settings['supports']['__experimentalLayout']['allowSizingOnChildren'] =
						$settings['supports']['layout']['allowSizingOnChildren']               = true;
						break;

					case 'core/image':
						$settings['supports']['color']['background'] =
						$settings['supports']['color']['text']       =
						$settings['supports']['color']['gradients']  = true;

						// Adding duotone support for SVG in Image block.
						if ( isset( $settings['selectors']['filter']['duotone'] ) ) {
							$settings['selectors']['filter']['duotone'] .= ', .wp-block-image svg';
						}
						break;

					case 'core/post-excerpt':
						$settings['supports']['layout']['allowEditing']         = false;
						$settings['supports']['__experimentalBorder']['color']  =
						$settings['supports']['__experimentalBorder']['style']  =
						$settings['supports']['__experimentalBorder']['width']  =
						$settings['supports']['__experimentalBorder']['radius'] = true;
						break;

					case 'core/post-featured-image':
						$settings['supports']['color']['background'] =
						$settings['supports']['color']['gradients']  = true;
						break;

					case 'core/post-navigation-link':
						$settings['supports']['__experimentalBorder'] =
						$settings['supports']['spacing']['padding']   =
						$settings['supports']['spacing']['margin']    = true;
						break;

					case 'core/site-logo':
						$settings['supports']['__experimentalBorder'] =
						$settings['supports']['color']['background']  =
						$settings['supports']['color']['gradients']   = true;
						break;

					case 'core/template-part':
						$settings['supports']['dimensions']['minHeight'] =
						$settings['supports']['position']['sticky']      =
						$settings['supports']['spacing']['margin']       = true;
						break;
			}


		// Output

			return $settings;

	} // /block_settings

	/**
	 * Block output modification: Bypass block rendering depending on conditional callback return.
	 *
	 * For conditional display, add this to a block:
	 * @example
	 *   <!-- wp:pattern {"slug":"slug-here","condition":{"true":"callback","false":"callback"}} /-->
	 *
	 * @since  1.0.0
	 *
	 * @param  string|null $pre_render  The rendered content. Default null.
	 * @param  array       $block       The block being rendered.
	 *
	 * @return  string|null
	 */
	public static function pre_render__conditional( $pre_render, array $block ) {

		// Processing

			if ( isset( $block['attrs']['condition'] ) ) {

				if (
					isset( $block['attrs']['condition']['true'] )
					&& is_callable( $block['attrs']['condition']['true'] )
					&& ! (bool) call_user_func( $block['attrs']['condition']['true'] )
				) {
					$pre_render = '';
				}

				if (
					isset( $block['attrs']['condition']['false'] )
					&& is_callable( $block['attrs']['condition']['false'] )
					&& (bool) call_user_func( $block['attrs']['condition']['false'] )
				) {
					$pre_render = '';
				}
			}


		// Output

			return $pre_render;

	} // /pre_render__conditional

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
	 * @since  1.0.0
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
				'core/post-excerpt',
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
						$index_to_splice = strrpos( $value, '|' ) + 1;
						$slug            = _wp_to_kebab_case( substr( $value, $index_to_splice ) );
						$value           = 'var(--wp--preset--spacing--' . $slug . ')';
					}

					return $value;

				}, (array) $block['attrs']['style']['spacing']['blockGap'] );

				$html->next_tag();
				$html->add_class( 'has-block-gap' );
				$html->set_attribute( 'style', '--wp--style--block-gap:' . implode( ' ', $gap ) . ';' . (string) $html->get_attribute( 'style' ) );

				$block_content = $html->get_updated_html();
			}


		// Output

			return $block_content;

	} // /render__gap

	/**
	 * Block output modification: Set button background CSS variable.
	 *
	 * This is required for `.has-focus-alt` CSS class.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__button_background( string $block_content, array $block ): string {

		// Processing

			if ( ! empty( $block['attrs']['style']['color']['background'] ) ) {

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag( array( 'class_name' => 'has-background' ) );
				$html->set_attribute( 'style', '--theme--css--button--color--background:' . esc_attr( $block['attrs']['style']['color']['background'] ) . ';' . (string) $html->get_attribute( 'style' ) );

				$block_content = $html->get_updated_html();
			}


		// Output

			return $block_content;

	} // /render__button_background

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
	 * @since  1.0.0
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

			if ( strpos( $block_content, 'https://#' ) ) {
				$block_content = str_replace( 'https://#', '#', $block_content );
			}


		// Output

			return $block_content;

	} // /render__social_links

}
