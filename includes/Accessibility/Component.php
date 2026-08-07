<?php
/**
 * Accessibility component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey\Accessibility;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Mod;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'wp_body_open', __CLASS__ . '::anchor_top_of_page', -999 );
				add_action( 'wp_body_open', __CLASS__ . '::skip_links_body', -10 );

				remove_action( 'wp_enqueue_scripts', 'wp_enqueue_block_template_skip_link' );
				remove_action( 'wp_footer', 'the_block_template_skip_link' );

			// Filters

				add_filter( 'body_class', __CLASS__ . '::body_class' );

				add_filter( 'zooey/content/block_style/get_styles', __CLASS__ . '::block_style' );

				add_filter( 'render_block_core/cover', __CLASS__ . '::render__cover', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Anchor for top of the page.
	 *
	 * Should be the first element on the page, before the skip links.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function anchor_top_of_page() {

		// Output

			echo '<a name="top"></a>' . PHP_EOL.PHP_EOL;

	} // /anchor_top_of_page

	/**
	 * Skip link generator.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $id       Link target element ID.
	 * @param  string $text     Link text.
	 * @param  string $class    Additional link CSS classes.
	 * @param  string $html     Output html, use "%s" for actual link output.
	 * @param  string $attr_id  Link `id` attribute.
	 *
	 * @return  string
	 */
	public static function link_skip_to( string $id = 'content', string $text = '', string $class = '', string $html = '%s', string $attr_id = '' ): string {

		// Pre

			/**
			 * Bypass filter for Content::link_skip_to().
			 *
			 * Returning a non-false value will short-circuit the method,
			 * returning the passed value instead.
			 *
			 * @since  1.0.0
			 *
			 * @param  mixed  $pre      Default: false. If not false, method returns this value.
			 * @param  string $id       Link target element ID.
			 * @param  string $text     Link text.
			 * @param  string $class    Additional link CSS classes.
			 * @param  string $html     Output html, use "%s" for actual link output.
			 * @param  string $attr_id  Link `id` attribute.
			 */
			$pre = apply_filters( 'pre/zooey/accessibility/link_skip_to', false, $id, $text, $class, $html, $attr_id );

			if ( false !== $pre ) {
				return $pre;
			}


		// Processing

			if ( empty( $text ) ) {
				$text = __( 'Skip to main content', 'zooey' );
			}

			if ( ! empty( $attr_id ) ) {
				$attr_id = ' id="' . esc_attr( trim( $attr_id ) ) . '"';
			}


		// Output

			return sprintf(
				(string) $html,
				'<a'
				. $attr_id
				. ' class="' . esc_attr( trim( 'skip-link screen-reader-text ' . $class ) ) . '"'
				. ' href="#' . esc_attr( trim( $id ) ) . '">'
				. esc_html( $text )
				. '</a>'
			);

	} // /link_skip_to

	/**
	 * Skip links: Body top.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function skip_links_body() {

		// Output

			get_template_part( 'parts/accessibility/menu', 'skip-links' );

	} // /skip_links_body

	/**
	 * HTML body classes.
	 *
	 * @since  2.0.0
	 *
	 * @param  array $classes
	 *
	 * @return  array
	 */
	public static function body_class( array $classes ): array {

		// Processing

			/**
			 * Temporary a11y fix to prevent broken focus trap on mobile menu submenus.
			 *
			 * @todo  Remove this once WordPress fixes Navigation block JS.
			 * @link  https://github.com/WordPress/gutenberg/issues/63033
			 * @see   assets/scss/blocks/_navigation-mobile.scss
			**/
			if ( Mod::get( 'a11y_fix_navigation' ) ) {
				$classes[] = 'a11y-fix-navigation';
			}

			// Removing "Fixed mobile toggle button" based on theme option.
			if ( ! Mod::get( 'a11y_fixed_mobile_navigation' ) ) {
				$classes[] = 'a11y-disable-fixed-mobile-toggle';
			}


		// Output

			return $classes;

	} // /body_class

	/**
	 * Modifying block styles.
	 *
	 * @since  2.0.0
	 *
	 * @param  array $styles
	 *
	 * @return  array
	 */
	public static function block_style( array $styles ): array {

		// Processing

			// Removing "Fixed mobile toggle button" based on theme option.
			if ( ! Mod::get( 'a11y_fixed_mobile_navigation' ) ) {
				unset( $styles['fixed-mobile-toggle'] );
			}


		// Output

			return $styles;

	} // /block_style

	/**
	 * Block output modification: Cover block `role="img"` alternative text.
	 *
	 * Fixing issue reported by AXE evaluation tool (https://www.deque.com/axe/).
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__cover( string $block_content, array $block ): string {

		// Processing

			if ( strpos( $block_content, 'role="img"' ) ) {

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag( array( 'class_name' => 'wp-block-cover__image-background' ) );

				if ( empty( $html->get_attribute( 'aria-label' ) ) ) {
					$html->set_attribute( 'aria-label', esc_attr_x( 'Background image', 'Aria label for Cover block background image with empty alternative text.', 'zooey' ) );

					$block_content = $html->get_updated_html();
				}
			}


		// Output

			return $block_content;

	} // /render__cover

	/**
	 * Accessibility color contrast calculator.
	 * @link  https://epiph.yt/en/blog/2024/the-only-valid-color-contrast-function-in-php-and-scss/
	 */

		/**
		 * Get color contrast against a (black) color.
		 *
		 * @since  2.0.1
		 *
		 * @param  string $color    Hex color code.
		 * @param  string $against  Hex color code to check the contrast against. Default: #000000, black.
		 *
		 * @return  float
		 */
		public static function get_color_contrast( string $color = '', string $against = '#000000' ): float {

			// Variables

				$color   = sanitize_hex_color_no_hash( $color );
				$against = sanitize_hex_color_no_hash( $against );
				$output  = 0;


			// Processing

				if ( 6 === strlen( (string) $color ) ) {

					$bg  = self::get_color_luminance( $color );
					$txt = self::get_color_luminance( $against );

					$output = ( max( $bg, $txt ) + .05 ) / ( min( $bg, $txt ) + .05 );
				}


			// Output

				return $output;

		} // /get_color_contrast

		/**
		 * Get color luminance.
		 *
		 * @see  https://github.com/breadthe/php-contrast/blob/master/src/HexColorPair.php#L92-L112
		 *
		 * @since  2.0.1
		 *
		 * @param  string $color  Hex color code.
		 *
		 * @return  float
		 */
		public static function get_color_luminance( string $color = '' ): float {

			// Variables

				$color  = sanitize_hex_color_no_hash( $color );
				$output = 0;


			// Processing

				if ( 6 === strlen( (string) $color ) ) {

					$r = hexdec( substr( $color, 0, 2 ) );
					$g = hexdec( substr( $color, 2, 2 ) );
					$b = hexdec( substr( $color, 4, 2 ) );

					// Get sRGB values.
					$r_srgb = $r / 255;
					$g_srgb = $g / 255;
					$b_srgb = $b / 255;

					// Calculate luminance.
					$r = ( $r_srgb <= .03928 ) ? $r_srgb / 12.92 : pow( ( ( $r_srgb + .055 ) / 1.055 ), 2.4 );
					$g = ( $g_srgb <= .03928 ) ? $g_srgb / 12.92 : pow( ( ( $g_srgb + .055 ) / 1.055 ), 2.4 );
					$b = ( $b_srgb <= .03928 ) ? $b_srgb / 12.92 : pow( ( ( $b_srgb + .055 ) / 1.055 ), 2.4 );

					$output = .2126 * $r + .7152 * $g + .0722 * $b;
				}


			// Output

				return $output;

		} // /get_color_luminance

}
