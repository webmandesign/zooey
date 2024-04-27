<?php
/**
 * Featured posts component.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Loop;

use WebManDesign\Zooey\Component_Interface;
use WebManDesign\Zooey\Customize\Mod;
use WP_Customize_Manager;
use WP_Query;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Featured_Posts implements Component_Interface {

	/**
	 * Theme mod ID.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $theme_mod_id = 'featured_posts_tag';

	/**
	 * Soft cache for queried featured posts.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $posts = array();

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

				add_action( 'customize_register', __CLASS__ . '::option_pointers' );

				add_action( 'pre_get_posts', __CLASS__ . '::pre_get_posts' );

				add_action( 'customize_save_after', __CLASS__ . '::create_tag' );

			// Filters

				add_filter( 'zooey/customize/options/get', __CLASS__ . '::options' );

				add_filter( 'pre_render_block', __CLASS__ . '::pre_render__featured_posts', ZOOEY_RENDER_BLOCK_PRIORITY, 2 );

	} // /init

	/**
	 * Gets featured posts.
	 *
	 * @since  1.0.0
	 *
	 * @return  array|WP_Query
	 */
	public static function get_posts() {

		// Variables

			$tag = Mod::get( self::$theme_mod_id );


		// Processing

			if (
				empty( self::$posts )
				&& ! empty( $tag )
			) {

				/**
				 * Filters featured posts query arguments.
				 *
				 * @since  1.0.0
				 *
				 * @param  array  $args
				 * @param  string $tag   Featured posts tag slug.
				 */
				$args = (array) apply_filters( 'zooey/loop/featured_posts/get_posts', array(
					'post_type'           => 'post',
					'tag'                 => $tag,
					'posts_per_page'      => 3,
					'no_found_rows'       => true,
					'ignore_sticky_posts' => true,
					'post_status'         => 'publish',
				), $tag );

				self::$posts = new WP_Query( $args );
			}


		// Output

			return self::$posts;

	} // /get_posts

	/**
	 * Theme options.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $options
	 *
	 * @return  array
	 */
	public static function options( array $options ): array {

		// Variables

			$tags = get_tags( array(
				'hide_empty' => false,
				'fields'     => 'slugs',
			) );
			if ( is_wp_error( $tags ) ) {
				$tags = array();
			}


		// Processing

			if ( ! isset( $options[ 400 . 'posts' ] ) ) {
				$options[ 400 . 'posts' ] = array(
					'id'             => 'posts',
					'type'           => 'section',
					'create_section' => esc_html_x( 'Posts', 'Customizer section title.', 'zooey' ),
					'in_panel'       => esc_html_x( 'Theme Options', 'Customizer panel title.', 'zooey' ),
				);
			}

			$options[ 400 . 'posts' . 500 ] = array(
				'type'    => 'html',
				'content' =>
					'<h3>'
					. esc_html__( 'Featured posts', 'zooey' )
					. '</h3>',
			);

			$options[ 400 . 'posts' . 510 ] = array(
				'type'              => 'text',
				'id'                => self::$theme_mod_id,
				'label'             => esc_html__( 'Featured posts tag slug', 'zooey' ),
				'description'       =>
					esc_html__( '3 latest posts assigned to this tag will be displayed as featured posts on blog page.', 'zooey' )
					. ' (<a href="' . esc_url_raw( admin_url( 'edit-tags.php?taxonomy=post_tag' ) ) . '" target="_blank"  rel="noopener noreferrer">'
					. esc_html__( 'Open tags manager in a new window now &rarr;', 'zooey' )
					. '</a>)'
					. '<br>'
					. esc_html__( 'NOTE: If you edited "Posts list: Featured posts" template part in Site Editor, this option has no effect as you get full control in template part editing.', 'zooey' ),
				'default'           => esc_html_x( 'featured', '"Featured posts" post tag slug.', 'zooey' ),
				'datalist'          => $tags,
				'sanitize_callback' => 'esc_attr',
				'input_attrs'       => array(
					'placeholder' => esc_attr_x( 'Set featured posts tag slug here', 'Form field placeholder.', 'zooey' ),
				),
				'preview_url' => get_post_type_archive_link( 'post' ),
			);

			$options[ 400 . 'posts' . 520 ] = array(
				'type'        => 'checkbox',
				'id'          => 'featured_posts_remove_from_blog',
				'label'       => esc_html__( 'Remove from blog posts', 'zooey' ),
				'description' => esc_html__( 'Makes sure the featured posts will be removed from posts list on blog page.', 'zooey' ),
				'default'     => false,
				'preview_url' => get_post_type_archive_link( 'post' ),
			);


		// Output

			return $options;

	} // /options

	/**
	 * Setup customizer partial refresh pointers.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 *
	 * @return  void
	 */
	public static function option_pointers( WP_Customize_Manager $wp_customize ) {

		// Processing

			$wp_customize->selective_refresh->add_partial( self::$theme_mod_id, array(
				'selector' => '.is-style-featured-posts',
			) );

	} // /option_pointers

	/**
	 * Remove featured posts from blog posts list.
	 *
	 * This has to be enabled in theme options.
	 *
	 * @since  1.0.0
	 *
	 * @param  WP_Query $query
	 *
	 * @return  void
	 */
	public static function pre_get_posts( WP_Query $query ) {

		// Requirements check

			if (
				! $query->is_home()
				|| ! $query->is_main_query()
				|| empty( Mod::get( 'featured_posts_remove_from_blog' ) )
			) {
				return;
			}


		// Variables

			$featured = self::get_posts();


		// Processing

			if ( ! empty( $featured ) ) {
				$query->set( 'post__not_in', wp_list_pluck( $featured->posts, 'ID' ) );
			}

	} // /pre_get_posts

	/**
	 * Block output modification: Bypass featured posts block rendering depending on condition.
	 *
	 * Remove featured posts section on paged blog.
	 *
	 * @since  1.0.0
	 *
	 * @param  string|null $pre_render  The rendered content. Default null.
	 * @param  array       $block       The block being rendered.
	 *
	 * @return  string|null
	 */
	public static function pre_render__featured_posts( $pre_render, array $block ) {

		// Processing

			if (
				isset( $block['attrs']['className'] )
				&& false !== stripos( $block['attrs']['className'], 'featured-posts' )
				&& ( ! self::get_posts()->have_posts() || is_paged() )
			) {
				$pre_render = '';
			}


		// Output

			return $pre_render;

	} // /pre_render__featured_posts

	/**
	 * Create featured posts tag if it does not exist.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function create_tag() {

		// Variables

			$name = Mod::get( self::$theme_mod_id );


		// Processing

			if (
				! empty( $name )
				&& ! tag_exists( $name )
			) {

				$slug = sanitize_title( $name );
				$name = ucfirst( str_replace(
					array(
						'-',
						'_',
					),
					' ',
					$slug
				) );

				wp_insert_term(
					$name,
					'post_tag',
					array(
						'slug' => $slug,
					)
				);

				set_theme_mod( self::$theme_mod_id, $slug );
			}

	} // /create_tag

}
