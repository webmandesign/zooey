<?php
/**
 * Template Name: Page builder
 * Template Post Type: public-post-types
 *
 * Prepares page/post content for using a page builder plugin.
 * The default content area layout can be set in customizer options.
 * Works with all public post types.
 *
 * No need to create block mode counterpart (the HTML template)
 * as it can easily be custom created in Site Editor.
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
