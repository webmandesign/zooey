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
	'title'    => _x( 'Call to action in a column with blurred background overlaying an image', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image = Block_Pattern::get_image_url( '3to2-3' );

?>

<!-- wp:cover {"url":"<?php echo esc_url_raw( $image ); ?>","dimRatio":0,"minHeight":200,"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light" style="margin-top:0;padding-top:0;padding-bottom:0;min-height:200px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" src="<?php echo esc_url_raw( $image ); ?>" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">

		<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
		<div class="wp-block-columns alignwide">

			<!-- wp:column -->
			<div class="wp-block-column"></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content","left":"var:preset|spacing|l","right":"var:preset|spacing|l"}}},"textColor":"white","gradient":"backdrop-blur-primary","className":"is-style-backdrop-blur","layout":{"type":"constrained","contentSize":"560px"}} -->
				<div class="wp-block-group is-style-backdrop-blur has-white-color has-backdrop-blur-primary-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--content);padding-right:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--content);padding-left:var(--wp--preset--spacing--l)">

					<!-- wp:heading {"fontSize":"h-3"} -->
					<h2 class="wp-block-heading has-h-3-font-size"><?php Block_Pattern::the_text( 'title/l' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"l"} -->
					<p class="has-l-font-size"><?php Block_Pattern::the_text( '140' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">

						<!-- wp:button {"backgroundColor":"white"} -->
						<div class="wp-block-button"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="#0"><?php Block_Pattern::the_text( 'button' ); ?></a></div>
						<!-- /wp:button -->

					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

</div></div>
<!-- /wp:cover -->
