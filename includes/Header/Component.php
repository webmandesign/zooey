<?php
/**
 * Header component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Header;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Content\Block_Template_Part;
use WebManDesign\Zooey\Setup\Site_Editor;
use WP_HTML_Tag_Processor;

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

		// Processing

			// HTML body class.
			Body_Class::init();
			// HTML head.
			Head::init();
			// Containers.
			Container::init();

			// Actions

				add_action( 'wp', __CLASS__ . '::disable', 30 );

				add_action( 'tha_html_before', __CLASS__ . '::doctype' );

				add_action( 'tha_header_top', __CLASS__ . '::content' );

			// Filters

				add_filter( 'render_block_core/template-part', __CLASS__ . '::render__site_header', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Disable theme header.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function disable() {

		// Requirements check

			if (
				Site_Editor::is_enabled()
				|| self::is_enabled()
			) {
				return;
			}


		// Processing

			remove_all_actions( 'tha_header_before' );
			remove_all_actions( 'tha_header_top' );
			remove_all_actions( 'tha_header_bottom' );
			remove_all_actions( 'tha_header_after' );

	} // /disable

	/**
	 * Is header disabled?
	 *
	 * To check if header is disabled, use `! Header\Component::is_enabled()` instead.
	 *
	 * @since  1.0.0
	 *
	 * @return  bool
	 */
	public static function is_disabled(): bool {

		// Output

			/**
			 * Filters the header disabling.
			 *
			 * @since  1.0.0
			 *
			 * @param  bool $disabled  If true, header is not displayed. Default: false.
			 */
			return (bool) apply_filters( 'zooey/header/is_disabled', false );

	} // /is_disabled

	/**
	 * Is header enabled?
	 *
	 * @since  1.0.0
	 *
	 * @return  bool
	 */
	public static function is_enabled(): bool {

		// Output

			/**
			 * Filters the header enabling.
			 *
			 * Filtering the negated output of `Header\Component::is_disabled()` here
			 * so we can decide to use either "disabled" or "enabled" filter depending
			 * on circumstances.
			 *
			 * @since  1.0.0
			 *
			 * @param  bool $enabled  If true, header is displayed. Default: ! Header\Component::is_disabled().
			 */
			return (bool) apply_filters( 'zooey/header/is_enabled', ! self::is_disabled() );

	} // /is_enabled

	/**
	 * HTML doctype.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function doctype() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Output

			echo '<!DOCTYPE html>';

	} // /doctype

	/**
	 * Header content.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function content() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Output

			Block_Template_Part::the_content(
				'header',
				array(
					'tag'   => 'header',
					'class' => 'is-style-site-header',
					'id'    => 'masthead',
				),
				'header' // Context for possible modifications.
			);

	} // /content

	/**
	 * Block output modification: Site header.
	 *
	 * Automatic site header template part class (for plugins such as WooCommerce).
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__site_header( string $block_content, array $block ): string {

		// Requirements check

			if ( ! Site_Editor::is_enabled() ) {
				return $block_content;
			}


		// Processing

			if (
				isset( $block['attrs']['slug'] )
				&& 'header' === $block['attrs']['slug']
				&& ! isset( $block['attrs']['className'] )
			) {

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag();
				$html->add_class( 'is-style-site-header' );

				$block_content = $html->get_updated_html();
			}


		// Output

			return $block_content;

	} // /render__site_header

}
