<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Site Editor.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.1.4
 */

namespace WebManDesign\Zooey;

use WebManDesign\Zooey\Setup\Site_Editor;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$url_site_editor = admin_url( 'site-editor.php' );

if ( ! Site_Editor::is_enabled() ) {
	$url_site_editor = add_query_arg(
		array(
			'postType' => 'wp_template_part',
		),
		$url_site_editor
	);
}

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="<?php echo esc_url( $url_site_editor ); ?>">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/site-editor.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Complete Control', 'zooey' ); ?></h3>
	<p>
		<?php esc_html_e( 'You can edit colors, layout, spacing and typography of every theme section using blocks in Site Editor.', 'zooey' ); ?>
	</p>

	<p><a href="<?php echo esc_url( $url_site_editor ); ?>" class="button button-hero"><?php esc_html_e( 'Open Site Editor', 'zooey' ); ?></a></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#site-editor"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
