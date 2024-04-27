<?php
/**
 * Admin "Welcome" page content component.
 *
 * Footer.
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

<div class="welcome__section welcome__footer">
	<p><?php echo Welcome\Component::get_info_like(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></p>
	<p><?php echo Welcome\Component::get_info_support(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></p>
</div>
