<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Blog Layout.
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

$url_site_editor = admin_url( 'site-editor.php?path=/wp_template/all' );

if ( ! Site_Editor::is_enabled() ) {
	$url_site_editor = add_query_arg(
		array(
			'postType' => 'wp_template_part',
			'path'     => '/wp_template_part/all',
		),
		admin_url( 'site-editor.php' )
	);
}

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=layout_blog' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/blog.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Blog Layouts', 'zooey' ); ?></h3>
	<p><?php esc_html_e( 'Display blog posts in a list with a sidebar, or in columns layout.', 'zooey' ); ?> <?php esc_html_e( 'Or set completely custom layout for your blog template.', 'zooey' ); ?></p>

	<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=layout_blog' ) ); ?>" class="button button-hero"><?php esc_html_e( 'Set Blog Layout', 'zooey' ); ?></a></p>

	<p><a href="<?php echo esc_url( $url_site_editor ); ?>"><small><em><?php esc_html_e( 'Edit Templates &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
