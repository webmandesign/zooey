<?php
/**
 * Template Name: Content only
 * Template Post Type: public-post-types
 *
 * Displays only page content.
 * Removes site header and site footer.
 * Removes page/post intro.
 * Works with all public post types.
 *
 * Used in non-block theme mode.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_template_part( 'singular' );
