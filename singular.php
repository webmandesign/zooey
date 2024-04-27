<?php
/**
 * The template for displaying singular entries.
 *
 * `the_post()` is still required for plugins (such as page builders).
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

while ( have_posts() ) :
	the_post();

	do_action( 'tha_entry_before' );
	do_action( 'tha_entry_top' );
	do_action( 'tha_entry_content_before' );

	the_content();

	do_action( 'tha_entry_content_after' );
	do_action( 'tha_entry_bottom' );
	do_action( 'tha_entry_after' );
endwhile;
