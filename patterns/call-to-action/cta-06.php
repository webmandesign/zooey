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
	'title'    => _x( 'Call to action with testimonial on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-mixed-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"61.8%"} -->
		<div class="wp-block-column" style="flex-basis:61.8%">

			<!-- wp:quote {"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"xxxl"} -->
			<blockquote class="wp-block-quote has-xxxl-font-size" style="line-height:1.2">
				<!-- wp:paragraph -->
				<p><?php Block_Pattern::the_text( '150' ); ?></p>
				<!-- /wp:paragraph -->
				<cite><strong><?php Block_Pattern::the_text( 'people/name' ); ?></strong>,&nbsp;<em><?php Block_Pattern::the_text( 'people/job' ); ?></em></cite>
			</blockquote>
			<!-- /wp:quote -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"38.2%"} -->
		<div class="wp-block-column" style="flex-basis:38.2%">

			<!-- wp:paragraph {"fontSize":"l"} -->
			<p class="has-l-font-size"><?php Block_Pattern::the_text( '150' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
