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
	'title' => _x( 'Process table with icons', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"},"margin":{"top":"0","bottom":"var:preset|spacing|m"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--m)">

	<!-- wp:separator {"align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity" />
	<!-- /wp:separator -->

	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"120px"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:120px">

			<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '250' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"},"margin":{"top":"0","bottom":"var:preset|spacing|m"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--m)">

	<!-- wp:separator {"align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity" />
	<!-- /wp:separator -->

	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"120px"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:120px">

			<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '250' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"},"margin":{"top":"0","bottom":"var:preset|spacing|m"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--m)">

	<!-- wp:separator {"align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity" />
	<!-- /wp:separator -->

	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"120px"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:120px">

			<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '250' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity" />
	<!-- /wp:separator -->

</div>
<!-- /wp:group -->
