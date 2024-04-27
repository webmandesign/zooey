<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Privacy (GDPR fonts).
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
		<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=typography_font_family_global' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/privacy.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Privacy Compliant Fonts', 'zooey' ); ?></h3>
	<p>
		<?php esc_html_e( 'Feel free to use any Google Font with this theme.', 'zooey' ); ?>
		<?php esc_html_e( 'Fonts will be loaded from your website, not from Google servers, enhancing privacy of your visitors (GDPR compliant).', 'zooey' ); ?>
	</p>

	<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=typography_font_family_global' ) ); ?>" class="button button-hero"><?php esc_html_e( 'Set Typography', 'zooey' ); ?></a></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#typography"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
