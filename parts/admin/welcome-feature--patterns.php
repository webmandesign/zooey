<?php
/**
 * Admin "Welcome" page content component.
 *
 * Feature: Block Patterns.
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

$url_site_editor = false;

if ( Site_Editor::is_enabled() ) {
	$url_site_editor = add_query_arg(
		array(
			'path' => '%2Fpatterns',
		),
		admin_url( 'site-editor.php' )
	);
}

?>

<div class="welcome__column">
	<figure class="welcome__image">
		<a href="https://webmandesign.github.io/docs/zooey/#block-patterns">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/features/patterns.jpg' ) . '?v' . ZOOEY_THEME_VERSION ); ?>" alt="">
		</a>
	</figure>

	<h3><?php esc_html_e( 'Block Patterns', 'zooey' ); ?></h3>
	<p><?php esc_html_e( 'Create your content fast with integrated pre-designed patterns library.', 'zooey' ); ?></p>
	<p>
		<?php

			printf(
				/* translators: %s: block pattern category name ("Pages" by default). */
				esc_html__( 'Simply use patterns from %s category to create whole page content easily!', 'zooey' ),
				'<strong>' . esc_html__( 'Pages', 'zooey' ) . '</strong>',
			);

		?>
		<?php esc_html_e( 'No need to import demo content data anymore.', 'zooey' ); ?>
	</p>

	<?php if ( $url_site_editor ) : ?>
	<p><a href="<?php echo esc_url( $url_site_editor ); ?>" class="button button-hero"><?php esc_html_e( 'Manage Patterns', 'zooey' ); ?></a></p>
	<?php endif; ?>

	<p><a href="https://webmandesign.github.io/docs/zooey/#block-patterns"><small><em><?php esc_html_e( 'Info in documentation &rarr;', 'zooey' ); ?></em></small></a></p>
</div>
