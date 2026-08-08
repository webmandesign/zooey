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
	'title'    => _x( '3 descending columns of icons with description', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'steps', 'keyword', 'zooey' ),
	),
) );

// Block pattern content:

$image_duotone = Demo::get_value( 'color_secondary', 'is_dark', ',"style":{"color":{"duotone":"var:preset|duotone|white"}}', '' );

ob_start(); ?>

	<!-- wp:image {"sizeSlug":"full"<?php echo $image_duotone; // phpcs:ignore -- escaping is irrelevant ?>} -->
	<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Demo::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Demo::get_text( 'alt' ) ); ?>"/></figure>
	<!-- /wp:image -->

	<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"xl"} -->
	<p class="has-xl-font-size" style="line-height:1.4"><?php Demo::The_text( '65' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><a href="#0"><?php Demo::The_text( 'change' ); ?></a></p>
	<!-- /wp:paragraph -->

<?php $item = ob_get_clean(); ?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"},"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">
			<?php echo $item; // phpcs:ignore -- escaping is irrelevant ?>
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">
			<?php echo $item; // phpcs:ignore -- escaping is irrelevant ?>
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">
			<?php echo $item; // phpcs:ignore -- escaping is irrelevant ?>
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
