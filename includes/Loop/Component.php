<?php
/**
 * Loop component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Loop;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Setup\Site_Editor;
use WP_HTML_Tag_Processor;
use WP_Query;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Soft cache for whether blog template was edited.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     null|bool
	 */
	private static $has_custom_blog_template = null;

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Pagination.
			Pagination::init();
			// Featured posts.
			Featured_Posts::init();

			// Actions

				add_action( 'pre_get_posts', __CLASS__ . '::posts_per_page', 50 );

			// Filters

				add_filter( 'search_template_hierarchy', __CLASS__ . '::search_template_hierarchy', 5 );

				add_filter( 'default_template_types', __CLASS__ . '::template_types' );

				add_filter( 'get_search_form', __CLASS__ . '::render__search_form' );

				add_filter( 'render_block', __CLASS__ . '::render__search_results_count', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				add_filter( 'render_block_core/cover', __CLASS__ . '::render__cover_link', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block_core/search', __CLASS__ . '::render__search_form', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );
				add_filter( 'render_block_core/template-part', __CLASS__ . '::render__blog_category_select', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

				add_filter( 'render_block_data', __CLASS__ . '::render__blog_layout', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Set posts per page count for different post lists.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Query $query
	 *
	 * @return  void
	 */
	public static function posts_per_page( WP_Query $query ) {

		// Requirements check

			if (
				is_admin()
				|| ! $query->is_main_query()
			) {
				return;
			}


		// Processing

			// Search results.
			if ( $query->is_search() ) {

				if ( 'any' === $query->get( 'post_type', 'any' ) ) {
					// Generic search: no post type is specified.
					$query->set( 'posts_per_page', absint( Mod::get( 'search_per_page' ) ) );
				} else {
					$query->set( 'posts_per_page', absint( Mod::get( 'search_per_page_alt' ) ) );
				}
			}

			// Archive (non-blog) pages.
			if ( $query->is_archive() ) {

				$query->set( 'posts_per_page', absint( Mod::get( 'archive_per_page' ) ) );
			}

	} // /posts_per_page

	/**
	 * Add post type specific Search template(s) to template hierarchy.
	 *
	 * @since  1.0.0
	 *
	 * @param  string[] $templates  A list of template candidates, in descending order of priority.
	 *
	 * @return  array
	 */
	public static function search_template_hierarchy( array $templates ): array {

		// Variables

			$post_type = get_query_var( 'post_type', 'any' );

			/**
			 * Filters condition to add new search templates.
			 *
			 * @since  1.0.0
			 *
			 * @param  bool   $condition
			 * @param  string $post_type
			 */
			$condition = (bool) apply_filters(
				'zooey/loop/search_template_hierarchy/condition',
				! empty( $post_type ) && 'any' !== $post_type,
				$post_type
			);


		// Processing

			if ( $condition ) {

				$extension = ( Site_Editor::is_enabled() ) ? ( '.html' ) : ( '.php' );

				// Fallback template for all/multiple post type search results.
				array_unshift( $templates, 'search-post-type' . $extension );

				// Specific post type search results template.
				if ( 1 === count( (array) $post_type ) ) {
					array_unshift( $templates, 'search-' . current( (array) $post_type ) . $extension );
				}
			}


		// Output

			return $templates;

	} // /search_template_hierarchy

	/**
	 * Add post type specific Search template type(s).
	 *
	 * @since  1.0.0
	 *
	 * @param  array $template_types
	 *
	 * @return  array
	 */
	public static function template_types( array $template_types ): array {

		// Processing

			$template_types['search-post-type'] = array(
				'title'       => esc_html_x( 'Search Post Type', 'Template name', 'zooey' ),
				'description' => esc_html__( 'Displays search results for a specific post type search.', 'zooey' ),
			);


		// Output

			return $template_types;

	} // /template_types

	/**
	 * Block output modification: Search results count.
	 *
	 * Replace `{posts_count}` with actual number in content
	 * of a block with CSS class of `has-search-results-count`.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__search_results_count( string $block_content, array $block ): string {

		// Processing

			// Search results count.
			if (
				isset( $block['attrs']['className'] )
				&& false !== stripos( $block['attrs']['className'], 'has-search-results-count' )
				&& stripos( $block_content, '{posts_count}' )
			) {

				$block_content = str_ireplace(
					'{posts_count}',
					(int) $GLOBALS['wp_query']->found_posts,
					$block_content
				);
			}


		// Output

			return $block_content;

	} // /render__search_results_count

	/**
	 * Block output modification: Cover image link.
	 *
	 * When Cover block displays post featured image,
	 * we should link to the post.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__cover_link( string $block_content, array $block ): string {

		// Processing

			if ( ! empty( $block['attrs']['useFeaturedImage'] ) ) {

				$tag  = $block['attrs']['tagName'] ?? 'div';
				$tag  = '</' . tag_escape( $tag ) . '>';
				$link =
					'<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" class="wp-block-cover__post-link">'
					. '<span class="screen-reader-text">'
					. get_the_title( get_the_ID() )
					. '</span>'
					. '</a>';

				$html = new WP_HTML_Tag_Processor( $block_content );

				$html->next_tag();
				$html->add_class( 'has-post-link' );

				$block_content = substr( trim( $html->get_updated_html() ), 0, -1 * strlen( $tag ) ) . $link . $tag;
			}


		// Output

			return $block_content;

	} // /render__cover_link

	/**
	 * Search form modification.
	 *
	 * Works also with Search block.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $html   The rendered block or search form content.
	 * @param  array  $block  The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__search_form( string $html, array $block = array() ): string {

		// Variables

			$post_type = get_query_var( 'post_type', 'any' );


		// Requirements check

			if (
				empty( $post_type )
				|| 'any' === $post_type
			) {
				return $html;
			}


		// Processing

			if ( is_array( $post_type ) ) {
				$input = implode( '', array_map(
					function( $item ) {
						return '<input '
						. 'type="hidden" '
						. 'name="post_type[]" '
						. 'value="' . esc_attr( $item ) . '" '
						. '/>';
					},
					array_filter( (array) $post_type )
				) );
			} else {
				$input = '<input type="hidden" name="post_type" value="' . esc_attr( $post_type ) . '"/></form>';
			}


		// Output

			return str_replace(
				'</form>',
				$input . '</form>',
				$html
			);

	} // /render__search_form

	/**
	 * Block output modification: Blog category selector display.
	 *
	 * Remove category selector when disabled in theme options.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__blog_category_select( string $block_content, array $block ): string {

		// Processing

			if (
				isset( $block['attrs']['className'] )
				&& false !== stripos( $block['attrs']['className'], 'category-selector' )
				&& ! Mod::get( 'category_selector' )
			) {

				$block_content = '';
			}


		// Output

			return $block_content;

	} // /render__blog_category_select

	/**
	 * Block output modification: Blog category selector display.
	 *
	 * Remove category selector when disabled in theme options.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $parsed_block  The block being rendered.
	 * @param  array $source_block  An un-modified copy of $parsed_block, as it appeared in the source content.
	 *
	 * @return  array
	 */
	public static function render__blog_layout( array $parsed_block, array $source_block ): array {

		// Processing

			if (
				is_home()
				&& 'core/template-part' === $parsed_block['blockName']
				&& ! empty( $parsed_block['attrs']['slug'] )
				&& in_array( $parsed_block['attrs']['slug'], array( 'query', 'query-with-sidebar' ) )
			) {

				if ( null === self::$has_custom_blog_template ) {

					$query = new WP_Query( array(
						'post_type'      => 'wp_template',
						'post_name__in'  => array( 'home' ),
						'posts_per_page' => 1, // Just one is enough.
						'no_found_rows'  => true,
						'tax_query'      => array(
							array(
								'taxonomy' => 'wp_theme',
								'field'    => 'name',
								'terms'    => get_stylesheet(),
							),
						),
						'fields' => 'ids',
					) );

					self::$has_custom_blog_template = $query->have_posts();
				}

				/**
				 * Putting requirements check here to prevent multiple
				 * database calls when there's no need for the check.
				 */
				if ( self::$has_custom_blog_template ) {
					return $parsed_block;
				}

				$parsed_block['attrs']['slug'] = implode(
					'-',
					array_filter( array(
						'query',
						Mod::get( 'layout_blog' )
					) )
				);
			}


		// Output

			return $parsed_block;

	} // /render__blog_layout

}
