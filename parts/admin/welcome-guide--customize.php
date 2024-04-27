<?php
/**
 * Admin "Welcome" page content component.
 *
 * Guide: Customize.
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

$url_site_editor = admin_url( 'site-editor.php' );

if ( ! Site_Editor::is_enabled() ) {
	$url_site_editor = add_query_arg(
		array(
			'postType' => 'wp_template_part',
			'path'     => '/wp_template_part/all',
		),
		$url_site_editor
	);
}

?>

<div class="welcome__column welcome__guide--customize">
	<h3>
		<span class="welcome__icon dashicons dashicons-admin-customizer"></span>
		<?php esc_html_e( 'Customize Anything', 'zooey' ); ?>
	</h3>
	<p>
		<?php esc_html_e( 'Modify theme options with live-preview customizer and edit template parts with drag&nbsp;&&nbsp;drop Site Editor.', 'zooey' ); ?>
	</p>
	<p>
		<a class="button" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Customizer &rarr;', 'zooey' ); ?></a>
		<a class="button" href="<?php echo esc_url( $url_site_editor ); ?>"><?php esc_html_e( 'Site Editor &rarr;', 'zooey' ); ?></a>
	</p>
</div>
