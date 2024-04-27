<?php
/**
 * Main template wrapper.
 *
 * Now we don't have to repeat `get_header()` and `get_footer()`
 * in theme template files all the time.
 *
 * Inspiration:
 * @link  https://scribu.net/wordpress/theme-wrappers.html
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Tool;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$template_path = Wrapper::$path;

get_header(
	/**
	 * Filters get_header() parameter.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $name           The name of the specialized header, the get_header() parameter.
	 * @param  string $template_path  The template path requesting the header.
	 */
	(string) apply_filters( 'zooey/get_header', '', $template_path )
);

if ( $template_path ) {
	/**
	 * WordPress uses `include` to load the template.
	 * @see  wp-includes/template-loader.php
	 */
	include $template_path; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
}

get_footer(
	/**
	 * Filters get_footer() parameter.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $name           The name of the specialized footer, the get_footer() parameter.
	 * @param  string $template_path  The template path requesting the footer.
	 */
	(string) apply_filters( 'zooey/get_footer', '', $template_path )
);
