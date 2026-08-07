<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Hybrid Mode.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.1
 */

namespace WebManDesign\Zooey;

use WebManDesign\Zooey\Setup\Site_Editor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=' . Site_Editor::$theme_mod_id ) ); ?>">
			<img src="<?php echo esc_url( 'https://pic.webmandesign.eu/FEATURES/zooey/' . 'hybrid.webp' . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Hybrid Theme', 'zooey' ); ?></h3>
	<p><?php echo wp_kses( __( 'Choose preferred edit mode: edit <dfn title="Full site editing experience">all templates</dfn> or <dfn title="Classic theme experience">their parts only</dfn> using Site Editor.', 'zooey' ), 'inline' ); ?></p>

	<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=' . Site_Editor::$theme_mod_id ) ); ?>" class="button button-hero"><?php esc_html_e( 'Choose Site Editing Experience', 'zooey' ); ?></a></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#disable-fse"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
