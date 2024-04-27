<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Custom Header Media.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey;

use WebManDesign\Zooey\Setup\Site_Editor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/custom-header.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Decorative Images', 'zooey' ); ?></h3>
	<p>
		<?php esc_html_e( 'Set up header image displayed in dedicated Image blocks.', 'zooey' ); ?>
		<?php esc_html_e( 'Useful for (randomized) decorative image setup, for example.', 'zooey' ); ?>
	</p>

	<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>" class="button button-hero"><?php esc_html_e( 'Set Header Image', 'zooey' ); ?></a></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#custom-header"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
