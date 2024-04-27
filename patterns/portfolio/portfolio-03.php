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
	'title'    => _x( 'List of projects', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'portfolio', 'keyword', 'zooey' ),
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'posts', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:pattern {"slug":"zooey/portfolio/portfolio-05"} /-->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:pattern {"slug":"zooey/portfolio/portfolio-05"} /-->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:pattern {"slug":"zooey/portfolio/portfolio-05"} /-->
	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
