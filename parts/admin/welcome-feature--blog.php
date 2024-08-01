<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Blog Layout.
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

	<p><a href="<?php echo esc_url( admin_url( 'site-editor.php?postType=wp_template_part' ) ); ?>"><small><em><?php esc_html_e( 'Edit Templates &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
