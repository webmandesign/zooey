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
	'title'    => _x( '3 descending columns of icons with description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'steps', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"margin":{"top":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"xl"} -->
			<p class="has-xl-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '80' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-decoration:none"><a href="#0">→</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">

			<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"xl"} -->
			<p class="has-xl-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '80' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-decoration:none"><a href="#0">→</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">

			<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"xl"} -->
			<p class="has-xl-font-size" style="line-height:1.4"><?php Block_Pattern::the_text( '80' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"xxxl"} -->
			<p class="has-xxxl-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-decoration:none"><a href="#0">→</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
