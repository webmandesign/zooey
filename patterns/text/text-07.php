<?php
/**
 * Block pattern setup file.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add block pattern setup args.
Block_Pattern::add_pattern_args( __FILE__, array(
	'title'         => _x( 'Fullwidth separator with decorative shape', 'Block pattern title.', 'zooey' ),
	'viewportWidth' => 1000,
) );

?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
	<hr class="wp-block-separator has-alpha-channel-opacity" />
	<!-- /wp:separator -->

	<!-- wp:separator {"className":"is-style-shape"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-shape" />
	<!-- /wp:separator -->

	<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
	<hr class="wp-block-separator has-alpha-channel-opacity" />
	<!-- /wp:separator -->

</div>
<!-- /wp:group -->
