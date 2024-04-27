<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Mobile Header.
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
		<a href="https://webmandesign.github.io/docs/zooey/#mobile-header">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/mobile-header.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Mobile Header', 'zooey' ); ?></h3>
	<p>
		<?php esc_html_e( 'Display a different site header for small and large screens.', 'zooey' ); ?>
		<?php esc_html_e( 'Just set a preferred block style for the container block.', 'zooey' ); ?>
	</p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#mobile-header"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
