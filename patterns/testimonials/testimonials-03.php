<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.5
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => _x( 'Quotes with star rating, title and source info', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'testimonials', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Reviews', 'zooey' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
			<div class="wp-block-group">

				<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"},"border":{"radius":"100px"},"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|s","right":"var:preset|spacing|s"}}},"backgroundColor":"primary","fontSize":"xl"} -->
					<p class="has-primary-background-color has-background has-xl-font-size" style="border-radius:100px;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--s);line-height:1">★★★⯪☆</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"s"} -->
					<h3 class="wp-block-heading has-s-font-size" style="text-transform:uppercase"><?php Demo::The_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

				</div>
				<!-- /wp:group -->

				<!-- wp:quote -->
				<blockquote class="wp-block-quote">
					<!-- wp:paragraph -->
					<p><?php Demo::The_text( '160' ); ?></p>
					<!-- /wp:paragraph -->
					<cite><?php Demo::The_text( 'people/name' ); ?>, <a href="#0"><?php Demo::The_text( 'people/job' ); ?></a></cite>
				</blockquote>
				<!-- /wp:quote -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->
		<?php endfor; ?>

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
