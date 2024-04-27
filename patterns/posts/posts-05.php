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
	'title'    => _x( 'Posts list item', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'news', 'keyword', 'zooey' ),
	),
	'viewportWidth' => 480,
) );

?>

<!-- wp:pattern {"slug":"zooey/site/entry-query"} /-->
