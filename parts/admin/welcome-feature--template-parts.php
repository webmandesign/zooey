<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Template Parts.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  2.0.0
 */

namespace WebManDesign\Zooey;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="https://webmandesign.github.io/docs/zooey/#site-editor-template-parts">
			<img src="<?php echo esc_url( 'https://pic.webmandesign.eu/FEATURES/zooey/' . 'template-parts.webp' . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Template Parts', 'zooey' ); ?></h3>
	<p>
		<?php esc_html_e( 'Don\'t edit whole templates, edit granular parts.', 'zooey' ); ?>
		<?php esc_html_e( 'Your modifications apply everywhere at once.', 'zooey' ); ?>
		<br>
		<?php esc_html_e( 'Easily swap header and footer for a different predefined designs in no time.', 'zooey' ); ?>
	</p>

	<p>
		<a href="<?php echo esc_url( admin_url( 'site-editor.php?postType=wp_template_part' ) ); ?>" class="button button-hero"><?php esc_html_e( 'Template Parts', 'zooey' ); ?></a>
	</p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#site-editor-template-parts"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
