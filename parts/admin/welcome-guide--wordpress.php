<?php
/**
 * Admin "Welcome" page content component.
 *
 * Guide: WordPress.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column welcome__guide--wordpress">
	<h3>
		<span class="welcome__icon dashicons dashicons-wordpress-alt"></span>
		<?php esc_html_e( 'New to WordPress?', 'zooey' ); ?>
	</h3>
	<p><?php esc_html_e( 'If you are new to WordPress check out info in theme documentation.', 'zooey' ); ?></p>
	<p><a href="https://webmandesign.github.io/docs/zooey/#wordpress"><?php esc_html_e( 'Get to know WordPress &rarr;', 'zooey' ); ?></a></p>
</div>
