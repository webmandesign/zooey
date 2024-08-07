<?php
/**
 * Entry component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.4
 */

namespace WebManDesign\Zooey\Entry;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Setup\Site_Editor;
use WebManDesign\Zooey\Content;
use WP_HTML_Tag_Processor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.1.4
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Entry components.
			Navigation::init();
			Page_Template::init();
			Summary::init();
			Taxonomy::init();

			// Post type support.
			add_post_type_support( 'page', 'excerpt' );
			add_post_type_support( 'attachment:audio', 'thumbnail' );
			add_post_type_support( 'attachment:video', 'thumbnail' );

			// Actions

				add_action( 'tha_entry_top', __CLASS__ . '::header' );

				add_action( 'tha_entry_bottom', __CLASS__ . '::meta' );

				add_action( 'tha_entry_after', __CLASS__ . '::comments' );

			// Filters

				add_filter( 'the_title', __CLASS__ . '::the_title' );

				// Priority has to be `20` for WebManDesign\Zooey\Entry\Navigation::parted().
				add_filter( 'the_content', __CLASS__ . '::content_wrapper', 20 );

				// Allow HTML and blocks for post author bio.
				add_filter( 'get_the_author_description', 'do_blocks', 9 );
				add_filter( 'get_the_author_description', 'wptexturize' );
				add_filter( 'get_the_author_description', 'wpautop' );

				add_filter( 'pre_render_block', __CLASS__ . '::pre_render__comments', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'pre_render_block', __CLASS__ . '::pre_render__entry_header', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'pre_render_block', __CLASS__ . '::pre_render__is_hidden_on', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				add_filter( 'render_block_core/post-content', __CLASS__ . '::render__post_content', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Entry content wrapper container.
	 *
	 * This is identical to block mode's `wp:post-content` (core/post-content) block setup.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $content
	 *
	 * @return  string
	 */
	public static function content_wrapper( string $content ): string {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return $content;
			}


		// Variables

			$classes = array(
				'entry-content',
				'wp-block-post-content',
				'has-global-padding',
				'is-layout-constrained',
				'has-content-margin-bottom',
			);

			/**
			 * Filters list of CSS classes applied on singular content wrapper div.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $classes  List of classes applied on hybrid mode singular content wrapper.
			 */
			$classes = (array) apply_filters( 'zooey/entry/content_wrapper/classes', array_combine( $classes, $classes ) );


		// Output

			if ( ! empty( $classes ) ) {
				return
					'<div class="' . esc_attr( implode( ' ', $classes ) ) . '">'
					. $content
					. '</div>';
			} else {
				return $content;
			}

	} // /content_wrapper

	/**
	 * Entry header.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function header() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Output

			/**
			 * We need to check for primary title display as this
			 * is only relevant for non-block theme.
			 */
			if ( Content\Component::show_primary_title() ) {

				Content\Block_Template_Part::the_content(
					array(
						'intro-' . get_post_type(),
						'intro', // Fallback.
					),
					array(
						'tag'   => 'header',
						'class' => 'is-style-page-header',
					)
				);
			}

	} // /header

	/**
	 * Entry meta top.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function meta() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Variables

			$post_types = array( 'post' );


		// Processing

			if (
				doing_action( 'tha_entry_bottom' )
				&& ! post_password_required()
				&& in_array( get_post_type( get_the_ID() ), $post_types )
			) {

				Content\Block_Template_Part::the_content(
					'entry-meta-bottom',
					array(
						'tag'   => 'div',
						'class' => 'entry-meta-bottom-container',
					)
				);
			}

	} // /meta

	/**
	 * Entry comments.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function comments() {

		// Requirements check

			if ( Site_Editor::is_enabled() ) {
				return;
			}


		// Processing

			comments_template();

	} // /comments

	/**
	 * Boolean for checking if single entry is displayed.
	 *
	 * @since  1.0.0
	 *
	 * @param  int $post_id
	 *
	 * @return  bool
	 */
	public static function is_singular( int $post_id = 0 ): bool {

		// Variables

			if ( ! $post_id ) {
				$post_id = get_the_ID();
			}


		// Output

			return is_singular() && get_queried_object_id() === $post_id;

	} // /is_singular

	/**
	 * Add a title to posts that are missing titles.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $title
	 *
	 * @return  string
	 */
	public static function the_title( string $title ): string {

		// Output

			return ( '' === $title ) ? ( esc_html_x( 'Untitled', 'Added to posts and pages that are missing titles.', 'zooey' ) ) :  ( $title );

	} // /the_title

	/**
	 * Block output modification: Bypass Comments block rendering depending on condition.
	 *
	 * Remove comments when needed.
	 *
	 * @since  1.0.0
	 *
	 * @param  string|null $pre_render  The rendered content. Default null.
	 * @param  array       $block       The block being rendered.
	 *
	 * @return  string|null
	 */
	public static function pre_render__comments( $pre_render, array $block ) {

		// Processing

			if ( 'core/comments' === $block['blockName'] ) {

				if (
					post_password_required()
					|| ! ( comments_open() || get_comments_number() )
				) {
					$pre_render = '';
				}
			}


		// Output

			return $pre_render;

	} // /pre_render__comments

	/**
	 * Block output modification: Page/entry header (intro) rendering.
	 *
	 * Remove page header when needed.
	 *
	 * @since  1.0.0
	 *
	 * @param  string|null $pre_render  The rendered content. Default null.
	 * @param  array       $block       The block being rendered.
	 *
	 * @return  string|null
	 */
	public static function pre_render__entry_header( $pre_render, array $block ) {

		// Processing

			if (
				isset( $block['attrs']['className'] )
				&& false !== stripos( $block['attrs']['className'], 'page-header' )
				&& ! Content\Component::show_primary_title()
			) {
				$pre_render = '';
			}


		// Output

			return $pre_render;

	} // /pre_render__entry_header

	/**
	 * Block output modification: Do not render if `is-hidden-on-#` class is set.
	 *
	 * @since  1.0.0
	 *
	 * @param  string|null $pre_render  The rendered content. Default null.
	 * @param  array       $block       The block being rendered.
	 *
	 * @return  string|null
	 */
	public static function pre_render__is_hidden_on( $pre_render, array $block ) {

		// Processing

			if (
				isset( $block['attrs']['className'] )
				&& false !== stripos( $block['attrs']['className'], 'is-hidden-on-' )
			) {

				$post_type = explode( 'is-hidden-on-', $block['attrs']['className'] );
				$post_type = explode( ' ', $post_type[1] );

				if ( $post_type[0] === get_post_type() ) {
					$pre_render = '';
				}
			}


		// Output

			return $pre_render;

	} // /pre_render__is_hidden_on

	/**
	 * Block output modification: Setting ID for post content container.
	 *
	 * Not sure why, but when enabling `anchor` block support via
	 * JavaScript (and even via `block_type_metadata_settings` PHP hook)
	 * the Post Content block does not render `id` attribute.
	 * We need to fix it here.
	 *
	 * @since  1.1.4
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__post_content( string $block_content, array $block ): string {

		// Processing

			if ( ! empty( $block['attrs']['anchor'] ) ) {

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag();
				$html->set_attribute( 'id', $block['attrs']['anchor'] );

				$block_content = $html->get_updated_html();
			}


		// Output

			return $block_content;

	} // /render__post_content

}
