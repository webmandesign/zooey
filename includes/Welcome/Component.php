<?php
/**
 * Welcome page component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Welcome;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Assets;

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

		// Requirements check

			if (
				! is_admin()
				|| ! get_theme_mod( 'admin_welcome_page', true )
			) {
				return;
			}


		// Processing

			// Actions

				add_action( 'admin_enqueue_scripts', __CLASS__ . '::styles' );

				add_action( 'admin_menu', __CLASS__ . '::admin_menu' );

				add_action( 'load-themes.php', __CLASS__ . '::activation_notice_display' );

	} // /init

	/**
	 * Get array of "Welcome" screen section file slugs.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_sections(): array {

		// Output

			/**
			 * Filters theme "Welcome" admin page sections.
			 *
			 * Pairs of section slug/ID and on-page navigation label.
			 * Setting `false` as navigation label will remove the section from on-page navigation.
			 *
			 * @example
			 *   array(
			 *     'header' => false,
			 *     'guide'  => _e( 'Quickstart', 'zooey' ),
			 *     'footer' => false,
			 *   )
			 *
			 * @since  1.0.0
			 *
			 * @param  array $sections
			 */
			return (array) apply_filters( 'zooey/welcome/render/sections', array(
				'header'   => false,
				'features' => __( 'Features', 'zooey' ),
				'guide'    => __( 'Quickstart', 'zooey' ),
				'update'   => __( 'Updates', 'zooey' ),
				'a11y'     => __( 'Accessibility', 'zooey' ),
				'demo'     => __( 'Demo content', 'zooey' ),
				'footer'   => false,
			) );

	} // /get_sections

	/**
	 * Renders "Welcome" screen content.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function render() {

		// Output

			?>

			<div class="wrap welcome__container">

				<?php

				/**
				 * Fires immediately after "Welcome" page wrapper opening tag.
				 *
				 * And before "Welcome" page sections are included.
				 *
				 * @since  1.0.0
				 */
				do_action( 'zooey/welcome/render/top' );

				foreach ( self::get_sections() as $slug => $label ) {
					get_template_part( 'parts/admin/welcome', $slug );
				}

				/**
				 * Fires immediately before "Welcome" page wrapper close tag.
				 *
				 * And after "Welcome" page sections are included.
				 *
				 * @since  1.0.0
				 */
				do_action( 'zooey/welcome/render/bottom' );

				?>

			</div>

			<?php

	} // /render

	/**
	 * Welcome screen CSS styles.
	 *
	 * Enqueues on "Welcome" page and when theme is activated
	 * (to provide activation notice styles).
	 *
	 * @since  1.0.0
	 *
	 * @param  string $hook
	 *
	 * @return  void
	 */
	public static function styles( string $hook ) {

		// Requirements check

			if (
				'appearance_page_zooey-welcome' !== $hook
				&& ! (
					'themes.php' === $hook
					&& isset( $_GET['activated'] )
					&& 'true' === $_GET['activated']
				)
			) {
				return;
			}


		// Processing

			Assets\Factory::style_enqueue( array(
				'handle' => 'zooey-welcome',
				'src'    => get_theme_file_uri( 'assets/css/welcome.css' ),
				'deps'   => array( 'about' ),
			) );

	} // /styles

	/**
	 * Add screen to WordPress admin menu.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function admin_menu() {

		// Processing

			add_theme_page(
				esc_html__( 'Welcome', 'zooey' ),
				esc_html__( 'Welcome', 'zooey' ),
				'edit_theme_options',
				'zooey-welcome',
				__CLASS__ . '::render'
			);

	} // /admin_menu

	/**
	 * Initiate "Welcome" admin notice after theme activation.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function activation_notice_display() {

		// Processing

			global $pagenow;

			if (
				is_admin()
				&& 'themes.php' == $pagenow
				&& isset( $_GET['activated'] )
			) {
				add_action( 'admin_notices', __CLASS__ . '::activation_notice_content', 99 );
			}

	} // /activation_notice_display

	/**
	 * Display "Welcome" admin notice after theme activation.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function activation_notice_content() {

		// Processing

			get_template_part( 'parts/admin/notice', 'welcome' );

	} // /activation_notice_content

	/**
	 * Info text: Rate the theme.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function get_info_like(): string {

		// Output

			return
				sprintf(
					/* translators: %1$s: heart icon, %2$s: star icons. */
					esc_html__( 'If you %1$s love this theme don\'t forget to rate it %2$s.', 'zooey' ),
					'<span class="dashicons dashicons-heart" style="color: red; vertical-align: -.181em;"></span>',
					'<a href="https://themeforest.net/downloads" style="display: inline-block; color: goldenrod; vertical-align: middle;"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></span></a>'
				)
				. ' '
				. esc_html__( 'Thank you!', 'zooey' );

	} // /get_info_like

	/**
	 * Info text: Contact support.
	 *
	 * @since  1.0.0
	 *
	 * @return  string
	 */
	public static function get_info_support(): string {

		// Output

			return
				esc_html__( 'Have a suggestion for improvement or something is not working as it should?', 'zooey' )
				. ' <a href="https://support.webmandesign.eu/forums/forum/zooey/">'
				. esc_html__( '&rarr; Contact support', 'zooey' )
				. '</a>';

	} // /get_info_support

}
