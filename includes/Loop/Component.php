<?php
/**
 * Loop component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.5
 */

namespace WebManDesign\Zooey\Loop;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Mod;
use WebManDesign\Zooey\Setup\Site_Editor;
use WebManDesign\Zooey\Entry\Component as Entry;
use WP_HTML_Tag_Processor;
use WP_Query;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Component implements Component_Interface {

	/**
	 * Name of cached data transient for blog template edit status.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     string
	 */
	public static $transient_cache_key = 'zooey_cache_has_custom_blog';

	/**
	 * Soft cache for blog template edit status.
	 *
	 * @since   2.0.0
	 * @access  public
	 * @var     mixed
	 */
	public static $has_custom_blog = null;

	/**
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Pagination.
			Pagination::init();
			// Featured posts.
			Featured_Posts::init();
			// Related posts.
			Related_Posts::init();

			// Actions

				add_action( 'pre_get_posts', __CLASS__ . '::posts_per_page', 50 );

				add_action( 'save_post_'   . 'wp_template',      __CLASS__ . '::transient_cache_flush_has_custom_blog' );
				add_action( 'delete_post_' . 'wp_template',      __CLASS__ . '::transient_cache_flush_has_custom_blog' );
				add_action( 'save_post_'   . 'wp_template_part', __CLASS__ . '::transient_cache_flush_has_custom_blog' );
				add_action( 'delete_post_' . 'wp_template_part', __CLASS__ . '::transient_cache_flush_has_custom_blog' );

			// Filters

				add_filter( 'search_template_hierarchy', __CLASS__ . '::search_template_hierarchy', 5 );

				add_filter( 'default_template_types', __CLASS__ . '::template_types' );

				add_filter( 'get_search_form', __CLASS__ . '::render__search_form' );

				add_filter( 'block_type_metadata_settings', __CLASS__ . '::term_description_settings', 10, 2 );

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
	 * Preparing Term Description block for post type description display.
	 *
	 * @since  2.0.0
	 *
	 * @param  array $settings  Array of determined settings for registering a block type.
	 * @param  array $metadata  Metadata provided for registering a block type.
	 *
	 * @return  array
	 */
	public static function term_description_settings( array $settings, array $metadata ): array {

		// Processing

			if ( 'core/term-description' === $metadata['name'] ) {
				$settings['render_callback'] = __CLASS__ . '::render_block_core_term_description';
			}


		// Output

			return $settings;

	} // /term_description_settings

	/**
	 * Renders the `core/term-description` block on the server.
	 *
	 * Modifies default `render_block_core_term_description()`.
	 * Populates Term Description content with custom post type
	 * description when custom post type archive page is displayed.
	 *
	 * @link  https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/term-description/index.php
	 *
	 * @since  2.0.0
	 *
	 * @param  array    $attributes  Block attributes.
	 * @param  string   $content     Block default content.
	 * @param  WP_Block $block       Block instance.
	 *
	 * @return  string
	 */
	public static function render_block_core_term_description( $attributes, $content, $block ): string {

		// Requirements check

			if ( ! is_post_type_archive() ) {
				return render_block_core_term_description( $attributes, $content, $block );
			}


		// Variables

			// Using `get_the_archive_description()` to enable
			// `get_the_archive_description` filter hook.
			$term_description = get_the_archive_description();


		// Processing

			if ( empty( $term_description ) ) {
				return '';
			}

			$classes = array(
				'has-post-type-archive-description',
				'has-archive-description--' . get_post_type(),
			);

			if ( isset( $attributes['textAlign'] ) ) {
				$classes[] = 'has-text-align-' . $attributes['textAlign'];
			}

			if ( isset( $attributes['style']['elements']['link']['color']['text'] ) ) {
				$classes[] = 'has-link-color';
			}

			$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => implode( ' ', $classes ) ) );


		// Output

			return '<div ' . $wrapper_attributes . '>' . $term_description . '</div>';

	} // /render_block_core_term_description

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
	 * @since    1.0.0
	 * @version  2.0.5
	 *
	 * @param  string $block_content  The rendered content. Default null.
	 * @param  array  $block          The block being rendered.
	 *
	 * @return  string
	 */
	public static function render__cover_link( string $block_content, array $block ): string {

		// Processing

			if (
				! empty( $block['attrs']['useFeaturedImage'] )
				&& ! Entry::is_singular()
			) {

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
	 * @since    1.0.0
	 * @version  1.1.7
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
				|| stripos( $html, ' name="post_type' )
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
				$input = '<input type="hidden" name="post_type" value="' . esc_attr( $post_type ) . '"/>';
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
	 * Block output modification: Modify template part slug to display.
	 *
	 * @since    1.0.0
	 * @version  2.0.1
	 *
	 * @param  array $parsed_block  The block being rendered.
	 * @param  array $source_block  An un-modified copy of $parsed_block, as it appeared in the source content.
	 *
	 * @return  array
	 */
	public static function render__blog_layout( array $parsed_block, array $source_block ): array {

		// Processing

			if (
				'core/template-part' === $parsed_block['blockName']
				&& ! empty( $parsed_block['attrs']['slug'] )
				&& in_array( $parsed_block['attrs']['slug'], array( 'query', 'query-with-sidebar' ) )
			) {

				if ( null === self::$has_custom_blog ) {
					self::$has_custom_blog = get_transient( self::$transient_cache_key );
				}

				if ( in_array( self::$has_custom_blog, array( false, 0, '0' ), true ) ) {

					$post_types = array( 'wp_template_part', 'wp_template' );
					$slugs      = array(
						'template-home', // Template part slug (`parts/template-home.html`).
						'home',          // Template slug (`templates/home.html`).
					);

					$query = new WP_Query( array(
						'post_type'      => $post_types,
						'post_name__in'  => $slugs,
						'posts_per_page' => 1, // Just one is enough. Now we know blog template was edited somehow.
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

					self::$has_custom_blog = $query->have_posts();

					// If transient is not altered with a filter hook, we can cache the data.
					if ( ! has_filter( 'pre_transient_' . self::$transient_cache_key ) ) {
						set_transient(
							self::$transient_cache_key,
							(int) self::$has_custom_blog
						);
					}
				}

				/**
				 * Putting requirements check here to prevent multiple
				 * database calls when there's no need for the check.
				 */
				if ( self::$has_custom_blog ) {
					return $parsed_block;
				}

				// Make sure we change this on specific layouts only.

					/**
					 * Filters condition to apply blog layout.
					 *
					 * @since  2.0.1
					 *
					 * @param  bool $where  Where the blog layout will apply.
					 */
					$where = (bool) apply_filters(
						'zooey/loop/blog_layout/where',
						( Mod::get( 'layout_blog_archives' ) ) ? ( is_home() || is_archive() ) : ( is_home() )
					);

					if ( ! $where ) {
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

	/**
	 * Flush the transient of cached `$has_custom_blog` status.
	 *
	 * @since  2.0.0
	 *
	 * @return  void
	 */
	public static function transient_cache_flush_has_custom_blog() {

		// Processing

			delete_transient( self::$transient_cache_key );

	} // /transient_cache_flush_has_custom_blog

}
