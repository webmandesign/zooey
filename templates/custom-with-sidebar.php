<?php
/**
 * Template Name: With sidebar
 * Template Post Type: page, post
 *
 * Page title (intro) is displayed.
 * Displays page/post content in one column
 * and a sidebar in the other column.
 * Works with "Page" post type only.
 *
 * Used in non-block theme mode.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Modified `singular.php` template:
while ( have_posts() ) :
	the_post();

	do_action( 'tha_entry_before' );
	do_action( 'tha_entry_top' );
	do_action( 'tha_entry_content_before' );

	Block_Template_Part::the_content( 'content-with-sidebar' );

	do_action( 'tha_entry_content_after' );
	do_action( 'tha_entry_bottom' );
	do_action( 'tha_entry_after' );
endwhile;
