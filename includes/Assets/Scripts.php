<?php
/**
 * Theme scripts component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Assets;

use WebManDesign\Zooey\Component_Interface;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Scripts implements Component_Interface {

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

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::enqueue_inline', 0 );
				add_action( 'wp_enqueue_scripts', __CLASS__ . '::enqueue_inline_no_js_class', ZOOEY_ENQUEUE_PRIORITY );

				add_action( 'comment_form_before', __CLASS__ . '::enqueue_comment_reply' );

	} // /init

	/**
	 * Placeholders for adding inline scripts.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue_inline() {

		// Requirements check

			if ( Factory::is_js_disabled() ) {
				return;
			}


		// Processing

			// Placeholder for adding footer scripts.
			wp_register_script( 'zooey-scripts-footer', '', array(), false, true );
			wp_enqueue_script( 'zooey-scripts-footer' );

	} // /enqueue_inline

	/**
	 * Enqueue comment reply script the right way.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue_comment_reply() {

		// Requirements check

			if ( Factory::is_js_disabled() ) {
				return;
			}


		// Processing

			if (
				is_singular()
				&& comments_open()
				&& get_option( 'thread_comments' )
			) {

				/**
				 * This script should be registered by now
				 * with `wp_default_scripts()`.
				 */
				wp_enqueue_script( 'comment-reply' );
			}

	} // /enqueue_comment_reply

	/**
	 * Remove "no-js" class from elements.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue_inline_no_js_class() {

		// Processing

			wp_add_inline_script(
				'zooey-scripts-footer',
				Factory::strip( "
					( function() {
						'use strict';

						document.querySelectorAll( '.no-js' ).forEach( function( e ) { e.classList.remove( 'no-js' ) } );
					} )();
				" )
			);

	} // /enqueue_inline_no_js_class

}
