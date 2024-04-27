<?php
/**
 * Admin notice: Welcome.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WebManDesign\Zooey\Welcome\Component' ) ) {
	return;
}

$theme_name = wp_get_theme( 'zooey' )->display( 'Name' );

?>

<div class="notice notice-info is-dismissible theme-welcome-notice">

	<h2>
		<?php

		printf(
			/* translators: %s: Theme name. */
			esc_html__( 'Thank you for installing %s theme!', 'zooey' ),
			'<strong>' . $theme_name . '</strong>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);

		?>
	</h2>

	<p>
		<?php esc_html_e( 'Visit "Welcome" page for information on how to set up your website.', 'zooey' ); ?>
		<br class="linebreak">
		<?php echo Welcome\Component::get_info_like(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
	</p>

	<p class="call-to-action">
		<a href="<?php echo esc_url( admin_url( 'themes.php?page=zooey-welcome' ) ); ?>" class="button button-primary button-hero"><?php

			echo esc_html__( 'Let\'s Get Started &rarr;', 'zooey' );

		?></a>
	</p>

</div>
