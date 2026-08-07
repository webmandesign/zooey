<?php
/**
 * Admin "Welcome" page content component.
 *
 * Footer.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.4
 */

namespace WebManDesign\Zooey;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WebManDesign\Zooey\Welcome\Component' ) ) {
	return;
}

// Get changelog content.
if ( version_compare( ZOOEY_THEME_VERSION, '1.0.0', '>' ) ) {

	global $wp_filesystem;

	if ( empty( $wp_filesystem ) ) {
		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' );
		}
		WP_Filesystem();
	}

	$file      = get_parent_theme_file_path( 'changelog.md' );
	$changelog = array( '', '' );

	if ( $wp_filesystem->exists( $file ) ) {

		// Get whole changelog content.
		$changelog[1] = $wp_filesystem->get_contents( $file ) ?? '–';

		// Get recent version changelog.
		$changelog[0] = explode( PHP_EOL . '## ', $changelog[1] );
		$changelog[0] = '## ' . trim( (string) ( $changelog[0][1] ?? '–' ) );

		// Remove recent version changelog from whole content.
		$changelog[1] = str_replace( $changelog[0], '', $changelog[1] );

		// Remove first 3 lines (H1, empty line, and empty H2) from whole content.
		$changelog[1] = explode( PHP_EOL, $changelog[1] );
		array_splice( $changelog[1], 0, 3 );
		$changelog[1] = trim( implode( PHP_EOL, $changelog[1] ) );
	}
}

?>

<div class="welcome__section welcome__footer">
	<p><?php echo Welcome\Component::get_info_like(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></p>
	<p><?php echo Welcome\Component::get_info_support(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></p>
</div>

<?php if ( version_compare( ZOOEY_THEME_VERSION, '1.0.0', '>' ) ) : ?>
<details class="welcome__section welcome__section--changelog" id="changelog">
	<summary><?php esc_html_e( 'Theme changelog', 'zooey' ); ?></summary>
	<pre class="welcome__changelog--new"><?php echo esc_html( $changelog[0] ); ?></pre>

	<details>
		<summary><?php esc_html_e( 'Previous theme versions', 'zooey' ); ?></summary>
		<pre class="welcome__changelog--old"><?php echo esc_html( $changelog[1] ); ?></pre>
	</details>

</details>
<?php endif; ?>

<p><a href="#header"><?php esc_html_e( 'To the top', 'zooey' ); ?><span aria-hidden="true" class="is-aria-hidden"> ↑</span></a></p>
