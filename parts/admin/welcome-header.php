<?php
/**
 * Admin "Welcome" page content component.
 *
 * Header.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WebManDesign\Zooey\Welcome\Component' ) ) {
	return;
}

?>

<div class="welcome__section welcome__header">

	<h1>
		<?php echo wp_get_theme( 'zooey' )->display( 'Name' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
		<small><?php echo ZOOEY_THEME_VERSION; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></small>
	</h1>

	<p class="welcome__intro">
		<?php

		printf(
			/* translators: 1: theme name, 2: theme developer link. */
			esc_html__( 'Congratulations and thank you for choosing %1$s theme by %2$s!', 'zooey' ),
			'<strong>' . wp_get_theme( 'zooey' )->display( 'Name' ) . '</strong>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'<a href="' . esc_url( wp_get_theme( 'zooey' )->get( 'AuthorURI' ) ) . '"><strong>WebMan Design</strong></a>'
		);

		?>
		<?php esc_html_e( 'Information on this page introduces the theme and provides useful tips.', 'zooey' ); ?>
	</p>

	<nav class="welcome__nav">
		<ul>
			<?php

			foreach ( Welcome\Component::get_sections() as $id => $label ) :
				if ( empty( $label ) ) {
					continue;
				}

			?>
			<li><a href="#welcome-<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</nav>

	<p>
		<a href="https://webmandesign.github.io/docs/zooey/" class="button button-hero button-primary"><?php esc_html_e( 'Documentation &rarr;', 'zooey' ); ?></a>
		<a href="https://support.webmandesign.eu/forums/forum/zooey/" class="button button-hero button-primary"><?php esc_html_e( 'Support Forum &rarr;', 'zooey' ); ?></a>
	</p>

	<p class="welcome__alert welcome__alert--tip">
		<strong class="welcome__badge"><?php echo esc_html_x( 'Tip:', 'Notice, hint.', 'zooey' ); ?></strong>
		<?php echo Welcome\Component::get_info_like(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
	</p>

</div>
