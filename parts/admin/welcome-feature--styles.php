<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Block Styles.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="https://webmandesign.github.io/docs/zooey/#block-styles">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/styles.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Block Styles', 'zooey' ); ?></h3>
	<p><?php esc_html_e( 'Change the style of blocks without coding.', 'zooey' ); ?></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#block-styles"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>

	<hr style="margin-block:1.618em;border:0;border-bottom:1px dashed" />
	<p><?php

		printf(
			/* translators: %s: link to "Abs – Additional block styles" plugin. */
			esc_html__( 'Use %s plugin for additional creative block styles.', 'zooey' ),
			'<a href="https://wordpress.org/plugins/additional-block-styles/"><strong>' . esc_html__( 'Abs – Additional block styles', 'zooey' ) . '</strong></a>',
		);

	?></p>
</div>
