<?php
/**
 * Admin "Welcome" page content component.
 *
 * Theme demo.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WebManDesign\Zooey\Welcome\Component' ) ) {
	return;
}

?>

<div class="welcome__section welcome__section--demo" id="welcome-demo">

	<h2>
		<span class="welcome__icon dashicons dashicons-database-add"></span>
		<?php esc_html_e( 'Demo Content = Block Patterns', 'zooey' ); ?>
	</h2>

	<p>
		<?php esc_html_e( 'There is no need to import demo content data anymore.', 'zooey' ); ?>
		<?php

			printf(
				/* translators: %s: block pattern category name ("Pages" by default). */
				esc_html__( 'Simply use patterns from %s category to create whole page content easily!', 'zooey' ),
				'<strong>' . esc_html__( 'Pages', 'zooey' ) . '</strong>',
			);

		?>
	</p>

	<figure class="welcome__image">
		<a href="https://webmandesign.github.io/docs/zooey/#demo-content">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/patterns.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<p><?php esc_html_e( 'Or combine block patterns to your liking to create custom page layouts.', 'zooey' ); ?></p>

	<hr>

	<p><a href="https://webmandesign.github.io/docs/zooey/#demo-content"><?php esc_html_e( 'Use page block patterns &rarr;', 'zooey' ); ?></a></p>

</div>
