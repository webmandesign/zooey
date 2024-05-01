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
	'title' => _x( 'Description with a title on the side', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
		<!-- /wp:heading -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:paragraph {"fontSize":"l"} -->
		<p class="has-l-font-size"><?php Block_Pattern::the_text( '190' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
