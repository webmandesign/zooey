<?php
/**
 * Media setup component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Setup;

use WebManDesign\Zooey\Component_Interface;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Media implements Component_Interface {

	/**
	 * Soft cache for header image URL.
	 *
	 * This prevents rendering random header images on the same page.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     null|string
	 */
	private static $header_image_url = null;

	/**
	 * SVG code soft cache.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $header_image_svg = '';

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

				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme' );
				add_action( 'after_setup_theme', __CLASS__ . '::add_image_size' );

				add_action( 'admin_init', __CLASS__ . '::image_sizes_notice_display' );

			// Filters

				add_filter( 'image_size_names_choose', __CLASS__ . '::image_sizes_select' );

				add_filter( 'zooey/setup/media/get_image_sizes', __CLASS__ . '::set_image_sizes' );

				add_filter( 'get_custom_logo_image_attributes', __CLASS__ . '::custom_logo_image_attributes', 10, 2 );

				add_filter( 'render_block_core/cover', __CLASS__ . '::render__cover_image_size', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block_core/image', __CLASS__ . '::render__image_header', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				add_filter( 'render_block_data', __CLASS__ . '::render__image_header_data', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * After setup theme.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Processing

			/**
			 * @link  https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
			 */
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'post-thumbnails', array(
				'attachment:audio',
				'attachment:video',
			) );

			// Custom header.

				/**
				 * Filters theme custom header setup array.
				 *
				 * @link  https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
				 *
				 * @since  1.0.0
				 *
				 * @param  array $custom_header
				 */
				add_theme_support( 'custom-header', apply_filters( 'zooey/add_theme_support/custom_header', array(
					'default-image' => get_theme_file_uri( 'assets/images/header/svg-fingers.png' ),
					'header-text'   => false,
				) ) );

				// Default custom headers packed with the theme.
				register_default_headers( array(

					// This is default image already, so we don't need to register it.
					// 'svg-fingers' => array(
					// 	'url'           => get_theme_file_uri( 'assets/images/header/svg-fingers.png' ),
					// 	'thumbnail_url' => get_theme_file_uri( 'assets/images/header/svg-fingers.png' ),
					// 	'description'   => esc_html_x( 'Fingers (dynamic color SVG)', 'Header image description.', 'zooey' ),
					// ),

					'svg-blobs' => array(
						'url'           => get_theme_file_uri( 'assets/images/header/svg-blobs.png' ),
						'thumbnail_url' => get_theme_file_uri( 'assets/images/header/svg-blobs.png' ),
						'description'   => esc_html_x( 'Blobs (dynamic color SVG)', 'Header image description.', 'zooey' ),
					),

					'svg-fingers-lines' => array(
						'url'           => get_theme_file_uri( 'assets/images/header/svg-fingers-lines.png' ),
						'thumbnail_url' => get_theme_file_uri( 'assets/images/header/svg-fingers-lines.png' ),
						'description'   => esc_html_x( 'Line Fingers (dynamic color SVG)', 'Header image description.', 'zooey' ),
					),
				) );

	} // /after_setup_theme

	/**
	 * Get theme image sizes setup array.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_image_sizes(): array {

		// Variables

			/**
			 * Filters image sizes setup array.
			 *
			 * Array key stands for image registration ID.
			 * Array values consist of single image size setup array.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $image_sizes
			 */
			$image_sizes = (array) apply_filters( 'zooey/setup/media/get_image_sizes', array() );


		// Processing

			$image_sizes = array_map(
				function( $args = array() ) {

					// Parsing image size setup args.
					$args = wp_parse_args( (array) $args, array(
						'name'        => '', // Human readable image size name.
						'description' => '', // Human readable image size description.
						'width'       => 100,
						'height'      => 100,
						'crop'        => false,
					) );

					if ( ! empty( $args['name'] ) ) {
						return $args;
					}
				},
				$image_sizes
			);

			$image_sizes = array_filter( $image_sizes );


		// Output

			return $image_sizes;

	} // /get_image_sizes

	/**
	 * Setting image sizes.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $image_sizes
	 *
	 * @return  array
	 */
	public static function set_image_sizes( array $image_sizes ): array {

		// Variables

			$layout_width_content = absint( get_theme_mod( 'layout_width_content', 720 ) );


		// Processing

			$image_sizes = array(

				'thumbnail' => array(
					'name'        => esc_html_x( 'Thumbnail size', 'WordPress predefined image size name.', 'zooey' ),
					'description' => esc_html__( 'Used in block patterns in templates and template parts.', 'zooey' ),
					'width'       => 480,
					'height'      => 0,
					'crop'        => false,
				),

				'post-thumbnail' => array(
					'width'  => $layout_width_content,
					'height' => 0,
					'crop'   => false,
				),

				'medium' => array(
					'name'        => esc_html_x( 'Medium size', 'WordPress predefined image size name.', 'zooey' ),
					'description' =>
						esc_html__( 'Used in block patterns in templates and template parts.', 'zooey' )
						. ' '
						. esc_html__( 'By default used as featured image size in posts list.', 'zooey' ),
					'width'       => $layout_width_content,
					'height'      => 0,
					'crop'        => false,
				),

				'large' => array(
					'name'        => esc_html_x( 'Large size', 'WordPress predefined image size name.', 'zooey' ),
					'description' => esc_html__( 'Used in block patterns in templates and template parts.', 'zooey' ),
					'width'       => absint( $GLOBALS['content_width'] ), // layout_width_wide
					'height'      => 0,
					'crop'        => false,
				),
			);


		// Output

			return $image_sizes;

	} // /set_image_sizes

	/**
	 * What are default WordPress image sizes?
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_default_image_sizes(): array {

		// Output

			return array( 'thumbnail', 'medium', 'medium_large', 'large' );

	} // /get_default_image_sizes

	/**
	 * Add custom image sizes.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function add_image_size() {

		// Variables

			$image_sizes = self::get_image_sizes();
			$predefined  = self::get_default_image_sizes();


		// Processing

			foreach ( $image_sizes as $size => $args ) {

				if ( in_array( $size, $predefined ) ) {
					continue;
				}

				add_image_size(
					$size,
					$args['width'],
					$args['height'],
					$args['crop']
				);
			}

	} // /add_image_size

	/**
	 * Adding custom image sizes to image size selector.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $sizes
	 *
	 * @return  array
	 */
	public static function image_sizes_select( array $sizes ): array {

		// Variables

			$image_sizes = self::get_image_sizes();
			$predefined  = self::get_default_image_sizes();


		// Processing

			foreach ( $image_sizes as $size => $args ) {

				if (
					in_array( $size, $predefined )
					|| ! isset( $args[3] )
				) {
					continue;
				}

				$sizes[ $size ] = esc_html( $args[3] );
			}


		// Output

			return $sizes;

	} // /image_sizes_select

	/**
	 * Register recommended image sizes notice.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function image_sizes_notice_display() {

		// Processing

			add_settings_field(
				'recommended-image-sizes',
				'',
				__CLASS__ . '::image_sizes_notice_content',
				'media',
				'default',
				array()
			);

			register_setting(
				'media',
				'recommended-image-sizes',
				'esc_attr'
			);

	} // /image_sizes_notice_display

	/**
	 * Display recommended image sizes notice.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function image_sizes_notice_content() {

		// Processing

			get_template_part( 'parts/admin/media', 'image-sizes' );

	} // /image_sizes_notice_content

	/**
	 * Enabling logo image alt attribute on homepage.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $custom_logo_attr
	 * @param  int   $custom_logo_id
	 *
	 * @return  array
	 */
	public static function custom_logo_image_attributes( array $custom_logo_attr, int $custom_logo_id ): array {

		// Requirements check

			if (
				! is_front_page()
				|| is_paged()
			) {
				return $custom_logo_attr;
			}


		// Processing

			if (
				(bool) get_theme_support( 'custom-logo', 'unlink-homepage-logo' )
				&& empty( $custom_logo_attr['alt'] )
			) {
				$custom_logo_attr['alt'] = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
			}


		// Output

			return $custom_logo_attr;

	} // /custom_logo_image_attributes

	/**
	 * Block output modification: Fixing Cover block image size when displaying featured image.
	 *
	 * By default Cover block loads default `thumbnail` or `post-thumbnail` image size.
	 * This is not ideal and we need to provide means to change the image size.
	 *
	 * For reference of what thumbnail functions Cover block uses, refer to Gutenberg code.
	 * In our case it uses `get_the_post_thumbnail_url()`.
	 *
	 * @see   Gutenberg/render_block_core_cover()
	 * @link  https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/cover/index.php
	 * @link  https://developer.wordpress.org/reference/functions/get_the_post_thumbnail_url/
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__cover_image_size( string $block_content, array $block ): string {

		// Processing

			if ( ! empty( $block['attrs']['useFeaturedImage'] ) ) {

				$size  = null;
				$class = 'has-image-size-';

				if (
					isset( $block['attrs']['className'] )
					&& false !== stripos( $block['attrs']['className'], $class )
				) {

					// Set custom image size is special CSS class is set for Cover block.
					$size = explode( $class, $block['attrs']['className'] );
					$size = explode( ' ', $size[1] );
					$size = (string) $size[0];

				} elseif (
					isset( $block['attrs']['align'] )
					&& 'wide' === $block['attrs']['align']
					&& empty( $block['attrs']['hasParallax'] )
				) {

					// Automatically set `large` image size for wide-aligned Cover block.
					$size = 'large';

				} elseif (
					(
						isset( $block['attrs']['align'] )
						&& 'full' === $block['attrs']['align']
					)
					|| ! empty( $block['attrs']['hasParallax'] )
				) {

					// Automatically set `full` image size for:
					// - full-aligned Cover block,
					// - Cover block with fixed background attachment.
					$size = 'full';
				}

				if ( is_string( $size ) ) {

					$block_content = str_replace(
						esc_url( get_the_post_thumbnail_url() ),
						esc_url( get_the_post_thumbnail_url( null, $size ) ),
						$block_content
					);

					// Not ideal, but we need to remove `sizes` image attribute.
					if ( empty( $block['attrs']['hasParallax'] ) ) {

						$html = new WP_HTML_Tag_Processor( $block_content );

						$html->next_tag( array( 'class_name' => 'wp-block-cover__image-background' ) );
						$html->remove_attribute( 'width' );
						$html->remove_attribute( 'height' );
						$html->remove_attribute( 'sizes' );
						// When `sizes` attribute is removed, we don't need `srcset` attribute either.
						$html->remove_attribute( 'srcset' );

						$block_content = $html->get_updated_html();
					}
				}
			}


		// Output

			return $block_content;

	} // /render__cover_image_size

	/**
	 * Block output modification: Render custom header image in Image block.
	 *
	 * We get these additional block attributes:
	 * - headerImageURL - Contains `get_header_image()` value.
	 * - headerImageSVG - Is false by default. Is true when `headerImageURL` contains
	 *                    `.svg` extension. Is string when `headerImageURL` image file
	 *                    name starts with `svg-`, so we can retrieve actual SVG file
	 *                    content from the (child) theme.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__image_header( string $block_content, array $block ): string {

		// Processing

			if ( ! empty( $block['attrs']['headerImageURL'] ) ) {

				if ( ! empty( $block['attrs']['headerImageSVG'] ) ) {

					if ( empty( self::$header_image_svg ) ) {

						/**
						 * If `headerImageSVG` is boolean TRUE, this means we are displaying
						 * actual `.svg` image. `get_header_image()` function does not pass
						 * image path, so we can not easily and safely obtain the actual
						 * SVG file content.
						 *
						 * But we at least allow filtering the SVG content below so user
						 * can hook onto this via a child theme or a plugin.
						 */
						if ( is_string( $block['attrs']['headerImageSVG'] ) ) {
							ob_start();
							include_once get_theme_file_path( 'assets/images/header/svg/' . $block['attrs']['headerImageSVG'] . '.svg' );
							self::$header_image_svg = ob_get_clean();
						}

						self::$header_image_svg = wp_kses( trim(

							/**
							 * Theme custom header SVG image code.
							 *
							 * @since  1.0.0
							 *
							 * @param  string $header_image_svg
							 * @param  array  $block
							 */
							(string) apply_filters( 'zooey/custom_header/svg', self::$header_image_svg, $block )
						), 'svg' );
					}

					$block_content = str_replace(
						'</figure>',
						self::$header_image_svg . '</figure>',
						$block_content
					);
				}

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag( 'img' );

				if ( empty( self::$header_image_svg ) ) {
					// Just in case the `url` attribute does not change the `src` HTML attribute correctly.
					$html->set_attribute( 'src', esc_url_raw( $block['attrs']['headerImageURL'] ) );
					$html->remove_attribute( 'class' );
				} else {
					$html->remove_attribute( 'src' );
					$html->set_attribute( 'data-src', esc_url_raw( $block['attrs']['headerImageURL'] ) );
					$html->set_attribute( 'class', 'is-hidden' );
					$html->set_attribute( 'hidden', 'hidden' );
				}

				$img_attr_style = $html->get_attribute( 'style' );
				if ( ! empty( $img_attr_style ) ) {
					$html->next_tag( 'svg' );
					$html->set_attribute( 'style', $img_attr_style );
				}

				$block_content = $html->get_updated_html();

			} elseif (
				isset( $block['attrs']['headerImageURL'] )
				&& empty( $block['attrs']['headerImageURL'] )
			) {

				// If user hides the custom header image,
				// we need to remove this block.
				$block_content = '';
			}


		// Output

			return $block_content;

	} // /render__image_header

	/**
	 * Block output modification: Prepare rendering of custom header image in Image block.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $block         The block being rendered.
	 * @param  array $source_block  An un-modified copy of $parsed_block, as it appeared in the source content.
	 *
	 * @return  array
	 */
	public static function render__image_header_data( array $block, array $source_block ): array {

		// Processing

			if (
				'core/image' === $block['blockName']
				&& isset( $block['attrs']['className'] )
				&& false !== stripos( $block['attrs']['className'], 'use-header-image' )
			) {

				unset( $block['attrs']['id'] );

				if ( is_null( self::$header_image_url ) ) {
					self::$header_image_url = explode( '?', (string) get_header_image() )[0];
				}

				$block['attrs']['url'] =
				$block['attrs']['headerImageURL'] = self::$header_image_url;
				$block['attrs']['headerImageSVG'] = false;

				if ( stripos( $block['attrs']['headerImageURL'], 'svg-' ) ) {

					$info = pathinfo( $block['attrs']['headerImageURL'] );
					$file = basename( $block['attrs']['headerImageURL'], '.' . $info['extension'] );

					$block['attrs']['headerImageSVG'] = substr( $file, 4 );
				} elseif ( stripos( $block['attrs']['headerImageURL'], '.svg' ) ) {
					$block['attrs']['headerImageSVG'] = true;
				}
			}


		// Output

			return $block;

	} // /render__image_header_data

}
