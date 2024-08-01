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
	'title' => _x( '4 columns of features with icons', 'Block pattern title.', 'zooey' ),
) );

// Block pattern content:

$image_p = Block_Pattern::get_image_url( 'p' );

?>

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"}}}} -->
<div class="wp-block-columns alignwide">

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}},"background":{"backgroundImage":{"url":"<?php echo esc_url_raw( $image_p ); ?>","source":"file"},"backgroundSize":"auto"},"border":{"radius":"0.38rem"}},"backgroundColor":"base-alt","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-alt-background-color has-background" style="border-radius:0.38rem">

			<!-- wp:image {"align":"center","sizeSlug":"full"} -->
			<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|s"}}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="margin-top:var(--wp--preset--spacing--s);text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php Block_Pattern::the_text( '40' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}},"background":{"backgroundImage":{"url":"<?php echo esc_url_raw( $image_p ); ?>","source":"file"},"backgroundSize":"auto"},"border":{"radius":"0.38rem"}},"backgroundColor":"base-alt","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-alt-background-color has-background" style="border-radius:0.38rem">

			<!-- wp:image {"align":"center","sizeSlug":"full"} -->
			<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|s"}}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="margin-top:var(--wp--preset--spacing--s);text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php Block_Pattern::the_text( '40' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}},"background":{"backgroundImage":{"url":"<?php echo esc_url_raw( $image_p ); ?>","source":"file"},"backgroundSize":"auto"},"border":{"radius":"0.38rem"}},"backgroundColor":"base-alt","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-alt-background-color has-background" style="border-radius:0.38rem">

			<!-- wp:image {"align":"center","sizeSlug":"full"} -->
			<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|s"}}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="margin-top:var(--wp--preset--spacing--s);text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php Block_Pattern::the_text( '40' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">

		<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}},"background":{"backgroundImage":{"url":"<?php echo esc_url_raw( $image_p ); ?>","source":"file"},"backgroundSize":"auto"},"border":{"radius":"0.38rem"}},"backgroundColor":"base-alt","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-alt-background-color has-background" style="border-radius:0.38rem">

			<!-- wp:image {"align":"center","sizeSlug":"full"} -->
			<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.80' ) ); ?>" alt="<?php echo esc_attr( Block_Pattern::get_text( 'alt' ) ); ?>"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|s"}}},"fontSize":"m"} -->
			<h3 class="wp-block-heading has-text-align-center has-m-font-size" style="margin-top:var(--wp--preset--spacing--s);text-transform:uppercase"><?php Block_Pattern::the_text( 'title/s' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php Block_Pattern::the_text( '40' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
