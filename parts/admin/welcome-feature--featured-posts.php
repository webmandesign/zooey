<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Featured Posts.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey;

use WebManDesign\Zooey\Loop\Featured_Posts;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=' . Featured_Posts::$theme_mod_id ) ); ?>">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/featured-posts.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Featured Posts', 'zooey' ); ?></h3>
	<p><?php esc_html_e( 'Display important news immediately on top of your blog page in dominant "Featured posts" section.', 'zooey' ); ?></p>

	<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=' . Featured_Posts::$theme_mod_id ) ); ?>" class="button button-hero"><?php esc_html_e( 'Set Featured Posts Tag', 'zooey' ); ?></a></p>

	<p><a href="https://webmandesign.github.io/docs/zooey/#posts-featured"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
