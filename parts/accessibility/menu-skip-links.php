<?php
/**
 * Skip links menu.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<nav class="menu-skip-links" aria-label="<?php esc_attr_e( 'Skip links', 'zooey' ); ?>">
	<ul>
		<?php

		$links = array(
			'site-navigation'        => __( 'Skip to main navigation', 'zooey' ),
			'site-navigation-mobile' => __( 'Skip to main navigation', 'zooey' ),
			'content'                => __( 'Skip to main content', 'zooey' ),
			'colophon'               => __( 'Skip to footer', 'zooey' ),
		);

		$links_script = array();

		foreach ( $links as $html_id => $text ) {

			$uniqid = wp_unique_id( 'sl' );

			$links_script[ $uniqid ] = esc_js( $uniqid ) . 'Target = document.getElementById( "' . esc_js( $html_id ) . '" )';

			echo Accessibility\Component::link_skip_to( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				$html_id,
				$text,
				'',
				'<li>%s</li>',
				'skip-link-' . $uniqid
			);
		}

		?>
	</ul>

	<script>
	document.addEventListener( 'DOMContentLoaded', function() {
		<?php

		echo
			"\t"
			. 'var '
			. implode( ', ', $links_script ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			. ';'
			. PHP_EOL;

		foreach ( $links_script as $uniqid => $target ) :
			?>
			if ( ! <?php echo esc_js( $uniqid ); ?>Target || null === <?php echo esc_js( $uniqid ); ?>Target.offsetParent ) {
				document.getElementById( '<?php echo esc_js( 'skip-link-' . $uniqid ); ?>' ).style.display = 'none';
			}
			<?php
		endforeach;

		?>
	} );
	</script>
</nav>
