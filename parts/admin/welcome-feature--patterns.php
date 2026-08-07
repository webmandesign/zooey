<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Block Patterns.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="https://webmandesign.github.io/docs/zooey/#block-patterns">
			<img src="<?php echo esc_url( 'https://pic.webmandesign.eu/FEATURES/zooey/' . 'patterns.webp' . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Block Patterns', 'zooey' ); ?></h3>
	<p><?php esc_html_e( 'Create your content fast with integrated pre-designed patterns library.', 'zooey' ); ?></p>
	<p>
		<?php

			printf(
				/* translators: %s: block pattern category name ("Pages" by default). */
				esc_html__( 'Simply use patterns from %s category to create whole page content easily!', 'zooey' ),
				'<strong>' . esc_html__( 'Pages', 'zooey' ) . '</strong>',
			);

		?>
		<?php esc_html_e( 'No need to import demo content data anymore.', 'zooey' ); ?>
	</p>

	<p>
		<a href="<?php echo esc_url( admin_url( 'site-editor.php?path=/patterns' ) ); ?>" class="button button-hero"><?php esc_html_e( 'Block Patterns', 'zooey' ); ?></a>
		&ndash;
		<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=patterns_disable_categories' ) ); ?>" class="button"><?php esc_html_e( 'Toggle Patterns', 'zooey' ); ?></a>
	</p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#block-patterns"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
