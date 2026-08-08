<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  2.0.5
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => _x( 'Inline call to action with form (newsletter subscription)', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'buttons', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}},"border":{"radius":"0.38rem"}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignwide has-primary-background-color has-background" style="border-radius:0.38rem;margin-top:0;padding-top:var(--wp--preset--spacing--content);padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|xl"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group">

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"constrained","contentSize":"560px"}} -->
		<div class="wp-block-group">

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Newsletter', 'zooey' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Demo::The_text( 'l', '.' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

		<!-- wp:html --><?php Demo::the_text( 'form_subscription' ); ?><!-- /wp:html -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
