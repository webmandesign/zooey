<?php
/**
 * Admin "Welcome" page content component.
 *
 * Quickstart guide.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WebManDesign\Zooey\Welcome\Component' ) ) {
	return;
}

$guides = array(
	'setup',
	'customize',
	'wordpress',
);

?>

<div class="welcome__section welcome__section--guide" id="welcome-guide">

	<h2><?php esc_html_e( 'Quickstart Guide', 'zooey' ); ?></h2>

	<?php

	foreach ( $guides as $guide ) {
		get_template_part( 'parts/admin/welcome-guide-', $guide );
	}

	?>

</div>
