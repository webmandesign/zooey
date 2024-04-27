<?php
/**
 * Theme option conditionals class.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Customize;

use WebManDesign\Zooey\Setup\Site_Editor;
use WP_Customize_Control;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Options_Conditional {

	/**
	 * Is site editor enabled?
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Customize_Control $control
	 *
	 * @return  bool
	 */
	public static function is_site_editor_enabled( WP_Customize_Control $control ): bool {

		// Variables

			$option = $control->manager->get_setting( Site_Editor::$theme_mod_id );


		// Output

			return (bool) $option->value();

	} // /is_site_editor_enabled

	/**
	 * Is site editor disabled?
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Customize_Control $control
	 *
	 * @return  bool
	 */
	public static function is_site_editor_disabled( WP_Customize_Control $control ): bool {

		// Variables

			$option = $control->manager->get_setting( Site_Editor::$theme_mod_id );


		// Output

			return ! (bool) $option->value();

	} // /is_site_editor_disabled

}
