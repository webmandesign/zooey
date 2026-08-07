<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Block Styles & Variations.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.1
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="https://webmandesign.github.io/docs/zooey/#block-styles">
			<img src="<?php echo esc_url( 'https://pic.webmandesign.eu/FEATURES/zooey/' . 'styles.webp' . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Block Styles & Variations', 'zooey' ); ?></h3>
	<p><?php esc_html_e( 'Change the style of blocks without coding.', 'zooey' ); ?></p>
	<p><?php esc_html_e( 'Display blocks on mobile devices only, blur out background images, reveal content on hover, overlap gallery images, overlap sections,&hellip;', 'zooey' ); ?></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#block-styles"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
