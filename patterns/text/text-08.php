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
	'title' => _x( 'Inline list of tags with decorative shape separators', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:pattern {"slug":"zooey/text/text-07"} /-->

<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-alt"}}},"spacing":{"margin":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l"},"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|s"},"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m"}},"typography":{"textDecoration":"none"}},"textColor":"contrast-alt","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"},"fontSize":"h-3","fontFamily":"supplemental"} -->
<div class="wp-block-group alignfull has-contrast-alt-color has-text-color has-link-color has-supplemental-font-family has-h-3-font-size" style="margin-top:var(--wp--preset--spacing--l);margin-bottom:var(--wp--preset--spacing--l);padding-right:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m);text-decoration:none">

	<!-- wp:paragraph -->
	<p><a href="#0"><?php Block_Pattern::the_text( 'xs' ); ?></a></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}}} -->
	<p style="font-style:normal;font-weight:300">—</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph -->
	<p><a href="#0"><?php Block_Pattern::the_text( 'xs' ); ?></a></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}}} -->
	<p style="font-style:normal;font-weight:300">—</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph -->
	<p><a href="#0"><?php Block_Pattern::the_text( 'xs' ); ?></a></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}}} -->
	<p style="font-style:normal;font-weight:300">—</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph -->
	<p><a href="#0"><?php Block_Pattern::the_text( 'xs' ); ?></a></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}}} -->
	<p style="font-style:normal;font-weight:300">—</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph -->
	<p><a href="#0"><?php Block_Pattern::the_text( 'xs' ); ?></a></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"zooey/text/text-07"} /-->
