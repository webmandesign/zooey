<?php
/**
 * Skip links menu.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.2.5
 */

namespace WebManDesign\Zooey;

use WebManDesign\Zooey\Assets\Factory;

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

		$i = 0;
		foreach ( $links as $html_id => $text ) {

			$sl_id = 'sl' . ++$i;

			$links_script[ $sl_id ] = esc_js( $sl_id ) . 'Target = document.getElementById( "' . esc_js( $html_id ) . '" )';

			echo Accessibility\Component::link_skip_to( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the method
				$html_id,
				$text,
				'',
				'<li>%s</li>',
				'skip-link-' . $sl_id
			);
		}

		?>
	</ul>

	<?php

		$js = '';

		/**
		 * Removing (parent) list item containing
		 * a skip link which target is not found.
		 */
		foreach ( $links_script as $sl_id => $target ) {

			$sl_id = esc_js( $sl_id );

			$js .=
				"if ( ! {$sl_id}Target || ! {$sl_id}Target.checkVisibility() ) {"
				. "document.getElementById( 'skip-link-{$sl_id}' ).parentElement.remove();"
				. "}";
		}

		$js =
			"document.addEventListener( 'DOMContentLoaded', function() { "
			. "const " . implode( ', ', $links_script ) . ";" // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above
			. $js
			. "} );";

	?>
	<script><?php echo sanitize_text_field( Factory::strip( $js ) ); ?></script>
</nav>
