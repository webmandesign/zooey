<?php
/**
 * Admin "Welcome" page content component.
 *
 * Theme update guide.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (
	! class_exists( 'WebManDesign\Zooey\Welcome\Component' )
	|| function_exists( 'envato_market' )
) {
	return;
}

?>

<div class="welcome__section welcome__section--update" id="welcome-update">

	<h2>
		<span class="welcome__icon dashicons dashicons-update"></span>
		<?php esc_html_e( 'Automatic Theme Updates', 'zooey' ); ?>
	</h2>

	<p>
		<?php esc_html_e( 'WordPress can automatically update only themes from WordPress.org repository.', 'zooey' ); ?>
		<?php esc_html_e( 'As you have obtained this premium theme via Envato Market, you need to enable automatic theme updates with a dedicated plugin.', 'zooey' ); ?>
	</p>

	<hr>

	<p><a href="https://webmandesign.github.io/docs/zooey/#update"><?php esc_html_e( 'Get automatic theme updates &rarr;', 'zooey' ); ?></a></p>

</div>
