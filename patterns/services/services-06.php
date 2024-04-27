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
	'title' => _x( '4 text features in 2 columns', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}},"border":{"top":{"color":"var:preset|color|primary","width":"0.5em"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
			<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--primary);border-top-width:0.5em;padding-top:var(--wp--preset--spacing--m)">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '140' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}},"border":{"top":{"color":"var:preset|color|primary","width":"0.5em"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
			<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--primary);border-top-width:0.5em;padding-top:var(--wp--preset--spacing--m)">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '140' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--l)">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}},"border":{"top":{"color":"var:preset|color|primary","width":"0.5em"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
			<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--primary);border-top-width:0.5em;padding-top:var(--wp--preset--spacing--m)">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '140' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|m"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}},"border":{"top":{"color":"var:preset|color|primary","width":"0.5em"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"440px"}} -->
			<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--primary);border-top-width:0.5em;padding-top:var(--wp--preset--spacing--m)">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '140' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
