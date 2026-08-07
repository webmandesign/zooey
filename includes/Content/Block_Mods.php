<?php
/**
 * Block modifications component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    2.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Assets;
use WebManDesign\Zooey\Customize\Styles;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Block_Mods implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::enqueue_mods' );
				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::enqueue_variations' );

			// Filters

				add_filter( 'block_type_metadata_settings', __CLASS__ . '::settings', 10, 2 );

				add_filter( 'block_editor_settings_all', __CLASS__ . '::settings_editor' );

				add_filter( 'wp_theme_json_get_style_nodes', __CLASS__ . '::button_css_selectors' );

	} // /init

	/**
	 * Enqueues block editor assets for block modifications.
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @return  void
	 */
	public static function enqueue_mods() {

		// Processing

			Assets\Factory::script_enqueue( array(
				'handle'   => 'zooey-block-mods',
				'src'      => get_theme_file_uri( 'assets/js/block-mods.min.js' ),
				'deps'     => array( 'wp-blocks', 'wp-hooks', 'wp-dom-ready', 'lodash' ),
				'localize' => array(
					'zooeyMods' => array(
						'selector' => array(
							'button' => implode( ',', (array) Styles::get_selector( 'button' ) ),
						),
					),
				),
			) );

	} // /enqueue_mods

	/**
	 * Enqueues block editor assets for block variations.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function enqueue_variations() {

		// Variables

			$images = array(
				'1to1-1',
				'1to1-2',
				'1to1-3',
				'3to2-1',
				'p-i',
			);


		// Processing

			Assets\Factory::script_enqueue( array(
				'handle'   => 'zooey-block-variations',
				'src'      => get_theme_file_uri( 'assets/js/block-variations.min.js' ),
				'deps'     => array( 'wp-blocks', 'wp-i18n', 'wp-dom-ready' ),
				'localize' => array(
					'zooeyVariations' => array(
						'image' => array_combine(
							$images,
							array_map( __NAMESPACE__ . '\Demo::get_image_url', $images )
						),
					),
				),
			) );

	} // /enqueue_variations

	/**
	 * Block (block type) settings modification.
	 *
	 * No need to enable specific options,
	 * simply enabling whole groups of options.
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @param  array $settings  Array of determined settings for registering a block type.
	 * @param  array $metadata  Metadata provided for registering a block type.
	 *
	 * @return  array
	 */
	public static function settings( array $settings, array $metadata ): array {

		// Processing

			switch ( $metadata['name'] ) {

				/**
				 * Multi-block setups.
				 */

					/**
					 * Padding + margin.
					 */
					case 'core/post-content':
						$settings['supports']['spacing']['padding'] = ///Since WP6.7
						$settings['supports']['spacing']['margin']  = true;
						break;

					/**
					 * Margin.
					 */
					case 'core/comments-pagination':
					case 'core/query-pagination':
					case 'core/search': ///Since WP6.7
						$settings['supports']['spacing']['margin'] = true;
						break;

					/**
					 * Border.
					 *
					 * //* = Some blocks actually support border setup,
					 * but the support may be partial only. For such cases
					 * we need to enable additional (whole) support here,
					 * but there's no need to do so via JavaScript.
					 * A Column block is one of such blocks (see below).
					 * @link  https://fullsiteediting.com/block-support/__experimentalborder/
					 */
					case 'core/post-author': ///Since WP6.7
					case 'core/post-comments-form': ///Since WP6.7
					case 'core/site-tagline': ///Since WP6.7
						$settings['supports']['__experimentalBorder']['color']  =
						$settings['supports']['__experimentalBorder']['style']  =
						$settings['supports']['__experimentalBorder']['width']  =
						$settings['supports']['__experimentalBorder']['radius'] = true;
						break;

					/**
					 * Block gap.
					 */

						case 'core/post-author-biography':
							$settings['supports']['layout']['allowEditing'] = false;
							break;

					/**
					 * Background image.
					 */

						case 'core/heading':
						case 'core/paragraph':
							$settings['supports']['background']['backgroundImage'] = true;
							break;

				/**
				 * Specific block setups.
				 */

					case 'core/button':
						/**
						 * IMPORTANT:
						 * No need to set this up in JS. It seems to work
						 * everywhere even when set just here.
						 *
						 * We can actually replace the default value as we already
						 * have the (simplified) selector among our button selectors:
						 * - default = ".wp-block-button .wp-block-button__link",
						 * - our     = ".wp-block-button__link".
						 *
						 * @link  https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/button/block.json
						 * @see   Customize\Styles::get_selector()
						 * @see   assets/scss/_setup/_selectors.scss
						 */
						if ( isset( $settings['selectors']['root'] ) ) {
							$settings['selectors']['root'] = implode( ',', (array) Styles::get_selector( 'button' ) );
						}
						break;

					case 'core/column':
						$settings['supports']['background']['backgroundImage'] = true;
						/**
						 * //* = Some blocks actually support border setup,
						 * but the support may be partial only. For such cases
						 * we need to enable additional (whole) support here,
						 * but there's no need to do so via JavaScript.
						 * A Column block is one of such blocks.
						 */
						$settings['supports']['__experimentalBorder']['color']  =
						$settings['supports']['__experimentalBorder']['style']  =
						$settings['supports']['__experimentalBorder']['width']  =
						$settings['supports']['__experimentalBorder']['radius'] = true;
						break;

					case 'core/comment-content':
						$settings['supports']['__experimentalBorder'] = ///Since WP6.7
						$settings['supports']['spacing']['margin']    = true;
						break;

					case 'core/comments':
						$settings['supports']['layout']['allowSizingOnChildren'] = true;
						break;

					case 'core/cover':
						$settings['supports']['color']['__experimentalDuotone'] =
						$settings['selectors']['filter']['duotone']             = '> .wp-block-cover__image-background, > .wp-block-cover__video-background, > .is-blur-wrapper';
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

					case 'core/loginout':
						$settings['supports']['color']['text'] = true;
						break;

					case 'core/media-text':
						$settings['supports']['filter']['duotone']  = true;
						$settings['selectors']['filter']['duotone'] = '.wp-block-media-text > .wp-block-media-text__media';
						break;

					case 'core/post-excerpt':
						$settings['supports']['layout']['allowEditing']         = false;
						///Since WP6.7:
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

					case 'core/tag-cloud':
						$settings['supports']['typography']['fontSize'] = true;
						break;

					case 'core/template-part':
						$settings['supports']['dimensions']['minHeight'] =
						$settings['supports']['position']['sticky']      =
						$settings['supports']['spacing']['margin']       = true;
						break;
			}


		// Output

			return $settings;

	} // /settings

	/**
	 * Modifications for block editor settings.
	 *
	 * @since  2.0.0
	 *
	 * @param  array $settings
	 *
	 * @return  array
	 */
	public static function settings_editor( array $settings ): array {

		// Processing

			$settings['imageDefaultSize'] = 'full';


		// Output

			return $settings;

	} // /settings_editor

	/**
	 * Modify WP global styles selectors: buttons.
	 *
	 * @since    2.0.0
	 * @version  2.0.1
	 *
	 * @param  array $nodes
	 *
	 * @return  array
	 */
	public static function button_css_selectors( array $nodes ): array {

		// Variables

			$buttons = (array) Styles::get_selector( 'button' );
			$states  = array(
				'',
				':active',
				':focus',
				':focus-visible',
				':hover',
			);


		// Processing

			foreach ( $states as $state ) {

				$search_key = array_search(
					// Default button node(s) we are searching for.
					array(
						'path'     => explode( '.', 'styles.elements.button' ),
						'selector' => implode( ', ', array(
							'.wp-element-button' . $state,
							'.wp-block-button__link' . $state,
						) ),
					),
					$nodes
				);

				if ( false !== $search_key ) {

					/**
					 * WordPress treats selectors this way: it appends pseudo element (state)
					 * to each selector in the list of selectors.
					 *
					 * We optimize the code by using `:where()` selectors wrapper.
					 */
					// $selector = implode( ',', array_map( function( $selector ) use ( $state ) { return $selector . $state; }, $buttons ) ); // WP default way.
					$selector = ':where(' . implode( ',', $buttons ) . ')' . $state;

					/**
					 * We can actually replace the default value as we already
					 * have the selector among our button selectors:
					 * - default = ".wp-element-button, .wp-block-button__link".
					 *
					 * @link  https://developer.wordpress.org/reference/hooks/wp_theme_json_get_style_nodes/
					 * @link  https://developer.wordpress.org/reference/classes/wp_theme_json/get_style_nodes/
					 * @link  https://github.com/WordPress/wordpress-develop/blob/trunk/src/wp-includes/class-wp-theme-json.php -> const ELEMENTS
					 * @see   Customize\Styles::get_selector()
					 * @see   assets/scss/_setup/_selectors.scss
					 */
					$nodes[ $search_key ]['selector'] = $selector;
				}
			}


		// Output

			return $nodes;

	} // /button_css_selectors

}
