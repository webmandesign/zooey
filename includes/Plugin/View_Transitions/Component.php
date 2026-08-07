<?php
/**
 * View Transitions integration component.
 *
 * @link  https://wordpress.org/plugins/view-transitions/
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  2.0.0
 */

namespace WebManDesign\Zooey\Plugin\View_Transitions;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Filters

				add_filter( 'after_setup_theme', __CLASS__ . '::setup' );

	} // /init

	/**
	 * Setup.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function setup() {

		// Processing

			add_theme_support( 'view-transitions', array(
				'default-animation'       => 'wipe-from-top',
				'global-transition-names' => array(
					'#masthead' => 'header',
					'main'      => 'main',
				),
			) );

	} // /remove_block_styles

}
