<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'         => _x( 'Archive template', 'Block pattern title.', 'zooey' ),
	'templateTypes' => array(
		'index',
		'archive',
		'author',
		'category',
		'taxonomy',
		'date',
		'tag',
	),
) );

include_once get_theme_file_path( 'templates/' . basename( __FILE__, '.php' ) . '.html' );
