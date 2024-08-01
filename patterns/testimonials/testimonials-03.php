<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.4
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

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"textColor":"primary","fontSize":"xl"} -->
				<p class="has-primary-color has-text-color has-xl-font-size" style="line-height:1">★★★★★</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|s"}}},"fontSize":"s"} -->
				<h3 class="wp-block-heading has-s-font-size" style="margin-top:var(--wp--preset--spacing--s);text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote -->
				<blockquote class="wp-block-quote">
					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '160' ); ?></p>
					<!-- /wp:paragraph -->
					<cite><?php Block_Pattern::the_text( 'people/name' ); ?>, <a href="#0"><?php Block_Pattern::the_text( 'people/job' ); ?></a></cite>
				</blockquote>
				<!-- /wp:quote -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"textColor":"primary","fontSize":"xl"} -->
				<p class="has-primary-color has-text-color has-xl-font-size" style="line-height:1">★★★★★</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|s"}}},"fontSize":"s"} -->
				<h3 class="wp-block-heading has-s-font-size" style="margin-top:var(--wp--preset--spacing--s);text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote -->
				<blockquote class="wp-block-quote">
					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '160' ); ?></p>
					<!-- /wp:paragraph -->
					<cite><?php Block_Pattern::the_text( 'people/name' ); ?>, <a href="#0"><?php Block_Pattern::the_text( 'people/job' ); ?></a></cite>
				</blockquote>
				<!-- /wp:quote -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"textColor":"primary","fontSize":"xl"} -->
				<p class="has-primary-color has-text-color has-xl-font-size" style="line-height:1">★★★★★</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|s"}}},"fontSize":"s"} -->
				<h3 class="wp-block-heading has-s-font-size" style="margin-top:var(--wp--preset--spacing--s);text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:quote -->
				<blockquote class="wp-block-quote">
					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '160' ); ?></p>
					<!-- /wp:paragraph -->
					<cite><?php Block_Pattern::the_text( 'people/name' ); ?>, <a href="#0"><?php Block_Pattern::the_text( 'people/job' ); ?></a></cite>
				</blockquote>
				<!-- /wp:quote -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
