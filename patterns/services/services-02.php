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
	'title' => _x( '4 columns of features with icons', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary"} -->
	<div class="wp-block-column has-secondary-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:image {"align":"center","sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
		<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php Block_Pattern::the_text( '60' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary"} -->
	<div class="wp-block-column has-secondary-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:image {"align":"center","sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
		<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php Block_Pattern::the_text( '60' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary"} -->
	<div class="wp-block-column has-secondary-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:image {"align":"center","sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
		<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php Block_Pattern::the_text( '60' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"},"border":{"radius":"0.38rem"}},"backgroundColor":"secondary"} -->
	<div class="wp-block-column has-secondary-background-color has-background" style="border-radius:0.38rem">

		<!-- wp:image {"align":"center","sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
		<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"m"} -->
		<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php Block_Pattern::the_text( '60' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
