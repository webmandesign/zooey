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
	'title'    => _x( '2 columns of quotes', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'testimonials', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:quote -->
		<blockquote class="wp-block-quote">
			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '260' ); ?></p>
			<!-- /wp:paragraph -->
			<cite><?php Block_Pattern::the_text( 'people/name' ); ?></cite>
		</blockquote>
		<!-- /wp:quote -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:quote -->
		<blockquote class="wp-block-quote">
			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '260' ); ?></p>
			<!-- /wp:paragraph -->
			<cite><?php Block_Pattern::the_text( 'people/name' ); ?></cite>
		</blockquote>
		<!-- /wp:quote -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
