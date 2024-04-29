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
	'title'    => _x( 'Next/previous post navigation', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'link', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
	'postTypes' => 'all', // Available also for post content.
) );

?>

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|content"},"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|s"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:post-navigation-link {"type":"previous","showTitle":true,"linkLabel":true,"arrow":"arrow","style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}},"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"700"},"layout":{"selfStretch":"fit","flexSize":null},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} /-->

	<!-- wp:post-navigation-link {"showTitle":true,"linkLabel":true,"arrow":"arrow","style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m","left":"var:preset|spacing|m","right":"var:preset|spacing|m"}},"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"700"},"border":{"radius":"0.38rem"}},"backgroundColor":"primary"} /-->

</div>
<!-- /wp:group -->
