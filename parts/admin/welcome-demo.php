<?php
/**
 * Admin "Welcome" page content component.
 *
 * Theme demo.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.0.7
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

	<?php if ( get_option( 'fresh_site' ) ) : ?>
	<div class="welcome__section--starter-content">

		<h3>
			<span class="welcome__icon dashicons dashicons-edit-page"></span>
			<?php esc_html_e( 'Starter content', 'zooey' ); ?>
		</h3>

		<p>
			<?php esc_html_e( 'The theme also provides a simple starter content.', 'zooey' ); ?>
			<?php esc_html_e( 'If you haven\'t created any content yet, open the customizer to preview the starter content.', 'zooey' ); ?>
			<?php esc_html_e( 'Once you publish your customizer settings, the starter content will be imported into your website and you can change it to your needs.', 'zooey' ); ?>
		</p>

		<p><em><small><?php esc_html_e( '(WordPress starter content works with fresh installation of WordPress only.)', 'zooey' ); ?></small></em>		</p>

		<p><a class="button button-hero" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Preview starter content', 'zooey' ); ?></a></p>

	</div>
	<?php endif; ?>

</div>
