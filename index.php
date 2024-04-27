<?php
/**
 * The main template file.
 *
 * Contains content for blog, archive and search results pages.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$context = 'index';

if ( is_home() ) {
	$context = 'home';
} elseif ( is_archive() ) {
	$context = 'archive';
} elseif ( is_search() ) {
	$context = 'search';
}

Block_Template_Part::the_content( 'template-' . $context );
