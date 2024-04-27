<?php
/**
 * Admin "Welcome" page content component.
 *
 * Guide: Setup.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column welcome__guide--settings">
	<h3>
		<span class="welcome__icon dashicons dashicons-admin-settings"></span>
		<?php esc_html_e( 'Setup', 'zooey' ); ?>
	</h3>
	<p>
		<?php esc_html_e( 'Make sure to tweak "Settings" section of your site to your needs.', 'zooey' ); ?>
		<?php esc_html_e( 'Pay attention to:', 'zooey' ); ?>
	</p>
	<ul>
		<li><a href="<?php echo esc_url( admin_url( 'options-general.php' ) ); ?>"><?php esc_html_e( 'Site title and tagline &rarr;', 'zooey' ); ?></a></li>
		<li><a href="<?php echo esc_url( admin_url( 'options-media.php' ) ); ?>"><?php esc_html_e( 'Image size setup &rarr;', 'zooey' ); ?></a></li>
		<li><a href="<?php echo esc_url( admin_url( 'options-permalink.php' ) ); ?>"><?php esc_html_e( 'Permalink structure setup &rarr;', 'zooey' ); ?></a></li>
		<li><a href="<?php echo esc_url( admin_url( 'options-reading.php' ) ); ?>"><?php esc_html_e( 'Homepage setup &rarr;', 'zooey' ); ?></a></li>
	</ul>
	<p><a class="button" href="<?php echo esc_url( admin_url( 'options-general.php' ) ); ?>"><?php esc_html_e( 'All Settings &rarr;', 'zooey' ); ?></a></p>
</div>
