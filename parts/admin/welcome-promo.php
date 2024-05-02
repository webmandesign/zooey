<?php
/**
 * Admin "Welcome" page content component.
 *
 * Promo.
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

<div class="welcome__section welcome__section--promo" id="welcome-promo">

	<h2>
		<span class="welcome__icon dashicons dashicons-superhero-alt"></span>
		<?php esc_html_e( 'Like the theme?', 'zooey' ); ?>
	</h2>

	<p>
		<?php esc_html_e( 'You are using a fully functional 100% free WordPress theme without any paid upgrade.', 'zooey' ); ?>
		<?php esc_html_e( 'If you find it helpful, please support its updates and technical support service with a donation or by purchasing one of the paid products at WebManDesign.eu.', 'zooey' ); ?>
		<?php esc_html_e( 'Thank you!', 'zooey' ); ?>
	</p>

	<hr>

	<p><a href="https://www.webmandesign.eu/contact/#donation"><strong><?php esc_html_e( 'Visit WebMan Design website now &rarr;', 'zooey' ); ?></strong></a></p>

</div>
