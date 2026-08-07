<?php
/**
 * Theme starter content.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.0
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
	 * @since    1.0.0
	 * @version  1.2.3
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

			// Actions

				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme' );

	} // /init

	/**
	 * After setup theme.
	 *
	 * @since    1.0.0
	 * @version  1.2.3
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Requirements check

			if ( empty( get_option( 'fresh_site' ) ) ) {
				return;
			}


		// Processing

			self::attachments();
			self::options();
			self::pages();

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
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function attachments() {

		// Output

			self::$content['attachments'] = array(

				'image-featured' => array(
					'file' => 'assets/images/demo/3to2-2.webp',
				),

				'logo' => array(
					'file' => 'assets/images/demo/logo.png',
				),
			);

	} // /attachments

	/**
	 * WordPress options.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function options() {

		// Output

			self::$content['options'] = array(
				'show_on_front'   => 'page',
				'page_on_front'   => '{{home}}',
				'page_for_posts'  => '{{blog}}',
				'posts_per_page'  => 6,
				'blogdescription' => esc_html__( 'Welcome to our website!', 'zooey' ),
				'custom_logo'     => '{{logo}}',
			);

	} // /options

	/**
	 * Pages.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function pages() {

		// Variables

			$template_no_intro = 'custom-no-intro';


		// Output

			self::$content['posts'] = array(

				'home' => array(
					'post_type'      => 'page',
					'post_title'     => esc_html_x( 'Home', 'Page title', 'zooey' ),
					'post_name'      => esc_html_x( 'home', 'Page slug', 'zooey' ),
					'post_content'   => '<!-- wp:pattern {"slug":"zooey/page/home-1"} /-->',
					'template'       => $template_no_intro,
					'thumbnail'      => '{{image-featured}}',
					'comment_status' => 'closed',
				),

				'about' => array(
					'post_type'      => 'page',
					'post_title'     => esc_html_x( 'About us', 'Page title', 'zooey' ),
					'post_name'      => esc_html_x( 'about-us', 'Page slug', 'zooey' ),
					'post_content'   => '<!-- wp:pattern {"slug":"zooey/page/about-1"} /-->',
					'template'       => $template_no_intro,
					'thumbnail'      => '{{image-featured}}',
					'comment_status' => 'closed',
				),

				'services' => array(
					'post_type'      => 'page',
					'post_title'     => esc_html_x( 'Services', 'Page title', 'zooey' ),
					'post_name'      => esc_html_x( 'services', 'Page slug', 'zooey' ),
					'post_content'   => '<!-- wp:pattern {"slug":"zooey/page/services-1"} /-->',
					'template'       => $template_no_intro,
					'thumbnail'      => '{{image-featured}}',
					'comment_status' => 'closed',
				),

				'blog' => array(
					'post_type'    => 'page',
					'post_title'   => esc_html_x( 'Blog', 'Theme starter content: Blog page title', 'zooey' ),
					'post_name'    => esc_html_x( 'blog', 'Page slug', 'zooey' ),
					'post_excerpt' => Demo::Get_text( 'm' ) . ' ' . Demo::Get_text( 'l' ),
				),

				'contact' => array(
					'post_type'      => 'page',
					'post_title'     => esc_html_x( 'Contact', 'Page title', 'zooey' ),
					'post_name'      => esc_html_x( 'contact', 'Page slug', 'zooey' ),
					'post_content'   => '<!-- wp:pattern {"slug":"zooey/page/contact-1"} /-->',
					'template'       => $template_no_intro,
					'thumbnail'      => '{{image-featured}}',
					'comment_status' => 'closed',
				),

				'nav' => array(
					'post_type'    => 'wp_navigation',
					'post_title'   => esc_html_x( 'Site Navigation', 'Page title', 'zooey' ),
					'post_content' => str_replace(
						'./',
						home_url( '/' ),
						''
						. '<!-- wp:navigation-link {'
						. '"label":"' . esc_html_x( 'Home', 'Page title', 'zooey' ) . '",'
						. '"url":"./",'
						. '"kind":"custom"} /-->'

						. '<!-- wp:navigation-link {'
						. '"label":"' . esc_html_x( 'About us', 'Page title', 'zooey' ) . '",'
						. '"url":"./' . esc_html_x( 'about-us', 'Page slug', 'zooey' ) . '/",'
						. '"kind":"custom"} /-->'

						. '<!-- wp:navigation-link {'
						. '"label":"' . esc_html_x( 'Services', 'Page title', 'zooey' ) . '",'
						. '"url":"./' . esc_html_x( 'services', 'Page slug', 'zooey' ) . '/",'
						. '"kind":"custom"} /-->'

						. '<!-- wp:navigation-link {'
						. '"label":"' . esc_html_x( 'Blog', 'Page title', 'zooey' ) . '",'
						. '"url":"./' . esc_html_x( 'blog', 'Page slug', 'zooey' ) . '/",'
						. '"kind":"custom"} /-->'

						. '<!-- wp:navigation-link {'
						. '"label":"' . esc_html_x( 'Contact', 'Page title', 'zooey' ) . '",'
						. '"url":"./' . esc_html_x( 'contact', 'Page slug', 'zooey' ) . '/",'
						. '"kind":"custom"} /-->'

						. '',
					),
				),
			);

	} // /pages

}
