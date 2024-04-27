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
	'title'    => _x( '3 columns of icon with description on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'icons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"margin":{"top":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">

	<!-- wp:heading {"className":"is-style-screen-reader-text"} -->
	<h2 class="wp-block-heading is-style-screen-reader-text"><?php Block_Pattern::the_text( 'title/m' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:columns {"isStackedOnMobile":false} -->
			<div class="wp-block-columns is-not-stacked-on-mobile">

				<!-- wp:column {"width":"60px"} -->
				<div class="wp-block-column" style="flex-basis:60px">

					<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
					<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.64' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"0.5em"}}} -->
				<div class="wp-block-column">

					<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
					<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '70' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:columns {"isStackedOnMobile":false} -->
			<div class="wp-block-columns is-not-stacked-on-mobile">

				<!-- wp:column {"width":"60px"} -->
				<div class="wp-block-column" style="flex-basis:60px">

					<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
					<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.64' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"0.5em"}}} -->
				<div class="wp-block-column">

					<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
					<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '70' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:columns {"isStackedOnMobile":false} -->
			<div class="wp-block-columns is-not-stacked-on-mobile">

				<!-- wp:column {"width":"60px"} -->
				<div class="wp-block-column" style="flex-basis:60px">

					<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
					<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.64' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"0.5em"}}} -->
				<div class="wp-block-column">

					<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
					<h3 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php Block_Pattern::the_text( '70' ); ?></p>
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
