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
	'title'    => _x( 'Text in creative columns layout', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"38.2%","layout":{"type":"constrained","contentSize":"320px","justifyContent":"left"}} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"s"} -->
			<p class="has-s-font-size" style="font-style:normal;font-weight:700"><?php Block_Pattern::the_text( '80' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"61.8%"} -->
		<div class="wp-block-column" style="flex-basis:61.8%">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.4"}},"fontSize":"xl"} -->
			<p class="has-xl-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '230' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"},"margin":{"top":"var:preset|spacing|l"}}}} -->
			<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--l)">

				<!-- wp:column -->
				<div class="wp-block-column">

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '140' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '140' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
