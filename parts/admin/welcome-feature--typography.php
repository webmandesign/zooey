<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Typography Setup.
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
		<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=typography_modular_scale' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/typography.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Harmonious Typography', 'zooey' ); ?></h3>
	<p>
		<?php esc_html_e( 'This theme applies harmonious typography to assure the best readability.', 'zooey' ); ?>
		<?php esc_html_e( 'Set up base font size, custom fonts, and tweak the typography ratio to your liking.', 'zooey' ); ?>
	</p>

	<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=typography_modular_scale' ) ); ?>" class="button button-hero"><?php esc_html_e( 'Set Typography', 'zooey' ); ?></a></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#typography"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
