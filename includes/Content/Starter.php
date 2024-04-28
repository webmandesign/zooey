<?php
/**
 * Theme starter content.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Starter implements Component_Interface {

	/**
	 * Starter content array.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $content = array();

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Requirements check

			/**
			 * Unfortunately, this really only seems to be working
			 * in Customizer, not in Site Editor.
			 */
			if ( ! is_customize_preview() ) {
				return;
			}


		// Processing

			// Loading

				self::attachments();
				self::options();
				self::pages();

			// Setup

				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme' );

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
			 * Filters theme starter content setup array.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $content  WordPress starter content setup array.
			 */
			self::$content = apply_filters( 'zooey/add_theme_support/starter_content', self::$content );

			if ( ! empty( self::$content ) ) {
				add_theme_support( 'starter-content', self::$content );
			}

	} // /after_setup_theme

	/**
	 * Attachments.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function attachments() {

		// Output

			self::$content['attachments'] = array(

				'image-featured' => array(
					'file' => 'assets/images/starter/3to2-1.jpg',
				),
			);

	} // /attachments

	/**
	 * WordPress options.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function options() {

		// Output

			self::$content['options'] = array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{home}}',
				'page_for_posts' => '{{blog}}',
				'posts_per_page' => 6,
			);

	} // /options

	/**
	 * Pages.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function pages() {

		// Variables

			$template_no_intro = 'custom-no-intro';


		// Output

			self::$content['posts'] = array(

				'home' => array(
					'post_type'    => 'page',
					'post_title'   => esc_html_x( 'Home', 'Theme starter content: Homepage title', 'zooey' ),
					'post_content' => '<!-- wp:pattern {"slug":"zooey/page/home-1"} /-->',
					'template'     => $template_no_intro,
					'thumbnail'    => '{{image-featured}}',
				),

				'about' => array(
					'post_type'    => 'page',
					'post_title'   => esc_html_x( 'About', 'Theme starter content: About page title', 'zooey' ),
					'post_content' => '<!-- wp:pattern {"slug":"zooey/page/about-2"} /-->',
					'thumbnail'    => '{{image-featured}}',
				),

				'services' => array(
					'post_type'    => 'page',
					'post_title'   => esc_html_x( 'Services', 'Theme starter content: Services page title', 'zooey' ),
					'post_content' => '<!-- wp:pattern {"slug":"zooey/page/services-1"} /-->',
					'template'     => $template_no_intro,
					'thumbnail'    => '{{image-featured}}',
				),

				'blog' => array(
					'post_type'    => 'page',
					'post_title'   => esc_html_x( 'Blog', 'Theme starter content: Blog page title', 'zooey' ),
					'post_excerpt' => Block_Pattern::get_text( 'm' ) . ' ' . Block_Pattern::get_text( 'l' ),
				),

				'contact' => array(
					'post_type'    => 'page',
					'post_title'   => esc_html_x( 'Contact', 'Theme starter content: Contact page title', 'zooey' ),
					'post_content' => '<!-- wp:pattern {"slug":"zooey/page/contact-1"} /-->',
				),
			);

	} // /pages

}
