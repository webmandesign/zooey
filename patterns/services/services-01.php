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
	'title'    => _x( 'Description text with 4 boxes of features with icons on the side', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'icons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}},"backgroundColor":"secondary-mixed","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-mixed-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"verticalAlignment":"center","layout":{"type":"constrained","contentSize":"480px","justifyContent":"left"}} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
			<h2 class="wp-block-heading has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"var:preset|spacing|s"}}},"fontSize":"xl","fontFamily":"supplemental"} -->
			<p class="has-supplemental-font-family has-xl-font-size" style="margin-top:var(--wp--preset--spacing--s);font-style:normal;font-weight:700"><?php Block_Pattern::the_text( '70' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:separator -->
			<hr class="wp-block-separator has-alpha-channel-opacity"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '160' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:columns -->
			<div class="wp-block-columns">

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
				<div class="wp-block-column has-primary-background-color has-background" style="border-radius:0.38rem">

					<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
					<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.64' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
					<h3 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"s"} -->
					<p class="has-s-font-size"><?php Block_Pattern::the_text( '70' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
				<div class="wp-block-column has-primary-background-color has-background" style="border-radius:0.38rem">

					<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
					<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.64' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
					<h3 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"s"} -->
					<p class="has-s-font-size"><?php Block_Pattern::the_text( '70' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns">

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
				<div class="wp-block-column has-primary-background-color has-background" style="border-radius:0.38rem">

					<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
					<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.64' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
					<h3 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"s"} -->
					<p class="has-s-font-size"><?php Block_Pattern::the_text( '70' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} -->
				<div class="wp-block-column has-primary-background-color has-background" style="border-radius:0.38rem">

					<!-- wp:image {"sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
					<figure class="wp-block-image size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.64' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"s"} -->
					<h3 class="wp-block-heading has-s-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"s"} -->
					<p class="has-s-font-size"><?php Block_Pattern::the_text( '70' ); ?></p>
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
