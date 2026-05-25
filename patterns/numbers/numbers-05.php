<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.2.5
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'    => _x( 'Simple numbered features', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
		esc_html_x( 'numbers', 'keyword', 'zooey' ),
		esc_html_x( 'steps', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">

		<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1","fontSize":"8em"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|m"}}},"textColor":"primary","fontFamily":"supplemental"} -->
			<p class="has-primary-color has-text-color has-link-color has-supplemental-font-family" style="margin-bottom:var(--wp--preset--spacing--m);font-size:8em;line-height:1">0<?php echo absint( $i ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}}} -->
			<h2 class="wp-block-heading" style="margin-top:0"><?php Block_Pattern::the_text( 'title/s' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php Block_Pattern::the_text( '90' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->
		<?php endfor; ?>

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
