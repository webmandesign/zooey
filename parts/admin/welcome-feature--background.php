<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Custom Background.
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
		<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=background_image' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/background.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Site Background Image', 'zooey' ); ?></h3>
	<p>
		<?php esc_html_e( 'Set up global website background image if you like.', 'zooey' ); ?>
		<?php esc_html_e( 'Use repeated pattern image to create interesting background.', 'zooey' ); ?>
	</p>

	<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=background_image' ) ); ?>" class="button button-hero"><?php esc_html_e( 'Set Background', 'zooey' ); ?></a></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#custom-background"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
