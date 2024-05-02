<?php
/**
 * Admin "Welcome" page content component.
 *
 * Features.
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

$features = array(
	'site-editor',
	'patterns',
	'styles',
	'typography',
	'background',
	'custom-header',
	'blog',
	'privacy',
	'featured-posts',
	'hybrid',
);

?>

<div class="welcome__section welcome__section--features" id="welcome-features">

	<h2><?php esc_html_e( 'Theme Features', 'zooey' ); ?></h2>

	<?php

	foreach ( $features as $feature ) {
		get_template_part( 'parts/admin/welcome-feature-', $feature );
	}

	?>

</div>
