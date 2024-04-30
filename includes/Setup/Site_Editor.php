<?php
/**
 * Site editor setup class.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Setup;

use WebManDesign\Zooey\Component_Interface;
use WP_Query;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Site_Editor implements Component_Interface {

	/**
	 * Soft cache for Site Editor enabled status.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     null|bool
	 */
	public static $is_enabled = null;

	/**
	 * WordPress PHP template file rendering block theme HTML templates.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $render_template = ABSPATH . WPINC . '/template-canvas.php';

	/**
	 * Theme mod ID.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $theme_mod_id = 'layout_site_editing';

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

				/**
				 * This has to be hooked early, but after `wp_enable_block_templates()` which
				 * is hooked on `after_setup_theme` with priority `1` since WordPress 6.4.
				 * @link  https://github.com/WordPress/WordPress/commit/e5d1fca19850a1d47b4f62303a24aca8797d3efb
				 */
				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme', 2 );

				add_action( 'admin_menu', __CLASS__ . '::admin_menu' );

			// Filters

				add_filter( 'theme_file_path', __CLASS__ . '::bypass_is_block_theme', 10, 2 );

				add_filter( 'pre_get_posts', __CLASS__ . '::user_global_styles' );

	} // /init

	/**
	 * Is Site Editor enabled?
	 *
	 * @since  1.0.0
	 *
	 * @return  boolean
	 */
	public static function is_enabled(): bool {

		// Processing

			if ( null === self::$is_enabled ) {
				self::$is_enabled = (bool) get_theme_mod( self::$theme_mod_id, true );
			}


		// Output

			return (bool) self::$is_enabled;

	} // /is_enabled

	/**
	 * After setup theme.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Processing

			// Adding support for block template parts (via Site Editor).
			add_theme_support( 'block-template-parts' );

			if ( ! self::is_enabled() ) {

				/**
				 * Unfortunately, we really can not enable `block-templates` for classic/hybrid mode.
				 * Enabling the `block-templates` causes WordPress to search for an HTML template
				 * first and then falling back to PHP one. And even though user can not edit
				 * `index.html` in hybrid mode, WordPress still finds this template file and
				 * prioritize it over `index.php`, for example.
				 *
				 * @link  https://developer.wordpress.org/reference/functions/locate_block_template/
				 *
				 * Check also:
				 * - resolve_block_template()
				 * - {$type}_template filter of get_query_template() (used in _add_template_loader_filters())
				 */
				remove_theme_support( 'block-templates' );

				/**
				 * Unfortunately, we can not load separate core block assets.
				 * If we do, front-end styles for site header, footer, etc. would be broken.
				 */
				add_filter( 'should_load_separate_core_block_assets', '__return_false' );

				/**
				 * WordPress caches theme data, including the block theme status.
				 * So, even if we disable Site Editor via theme options, it can
				 * still be enabled due to WordPress theme data cache value.
				 * We need to flush the cache now.
				 *
				 * Unfortunately, hooking this onto `customize_save_after` does
				 * not seem to work.
				 */
				if ( wp_is_block_theme() ) {
					wp_get_theme( get_template() )->cache_delete();
					wp_get_theme( get_stylesheet() )->cache_delete();
				}
			}

	} // /after_setup_theme

	/**
	 * Disabling block theme functionality when needed.
	 *
	 * There is no other way of filtering `wp_is_block_theme()` boolean output
	 * than hooking onto `theme_file_path` filter of the `get_file_path()`
	 * (and `get_theme_file_path()`) function output.
	 * @link  https://developer.wordpress.org/reference/classes/wp_theme/is_block_theme/
	 * @link  https://developer.wordpress.org/reference/classes/wp_theme/get_file_path/
	 * @link  https://developer.wordpress.org/reference/functions/get_theme_file_path/
	 * @link  https://developer.wordpress.org/reference/hooks/theme_file_path/
	 *
	 * @since  1.0.0
	 *
	 * @param  string $path
	 * @param  string $file
	 *
	 * @return  string
	 */
	public static function bypass_is_block_theme( string $path, string $file ): string {

		// Output

			if (
				! self::is_enabled()
				&& 'templates/index.html' === $file
			) {
				return '';
			} else {
				return $path;
			}

	} // /bypass_is_block_theme

	/**
	 * Disables user global style mods when Site Editor is not enabled.
	 *
	 * In classic theme mode we need customizer option values,
	 * not the user global styles.
	 *
	 * This approach works also in Site Editor, not only on
	 * front-end, unlike `wp_theme_json_data_user` filter.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Query $query
	 *
	 * @return  void
	 */
	public static function user_global_styles( WP_Query $query ) {

		// Processing

			if (
				! self::is_enabled()
				&& 'wp_global_styles' === $query->get( 'post_type' )
			) {

				$query->query_vars = array();
			}

	} // /user_global_styles

	/**
	 * Adds additional admin menu links.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function admin_menu() {

		// Requirements check

			if ( ! self::is_enabled() ) {
				return;
			}


		// Variables

			global $submenu;

			$items = array(

				'navigation' => array(
					'label' => __( 'Navigation', 'zooey' ),
					'url'   => admin_url( 'site-editor.php?path=/navigation' ),
				),

				'template_parts' => array(
					'label' => __( 'Template Parts', 'zooey' ),
					'url'   => admin_url( 'site-editor.php?path=/wp_template_part/all' ),
				),

				'templates' => array(
					'label' => __( 'Templates', 'zooey' ),
					'url'   => admin_url( 'site-editor.php?path=/wp_template/all' ),
				),
			);


		// Processing

			$i = 1;
			foreach ( $items as $id => $args ) {

				add_theme_page(
					$args['label'],
					$args['label'],
					'edit_theme_options',
					'zooey_navigation_options_' . $id,
					'__return_empty_string',
					++$i
				);

				// Changing our custom admin menu item target.
				if (
					! empty( $submenu['themes.php'][$i][2] )
					&& 'zooey_navigation_options_' . $id === $submenu['themes.php'][$i][2]
				) {
					$submenu['themes.php'][$i][2] = esc_url( $args['url'] );
				}
			}

	} // /admin_menu

}
