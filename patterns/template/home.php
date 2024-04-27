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
	'title'         => _x( 'Blog home template', 'Block pattern title.', 'zooey' ),
	'templateTypes' => array(
		'index',
		'home',
		'front-page',
	),
) );

/**
 * IMPORTANT:
 * Default Home is with sidebar, so we need custom template content.
 */

?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"is-style-site-header","anchor":"masthead"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}}} -->
<main id="content" class="wp-block-group" style="margin-top:0">

	<!-- wp:template-part {"slug":"intro-blog","tagName":"header","className":"is-style-page-header"} /-->

	<!-- wp:template-part {"slug":"query-featured","tagName":"section","style":{"spacing":{"margin":{"top":"var:preset|spacing|content"}}},"className":"is-style-featured-posts"} /-->

	<!-- wp:template-part {"slug":"taxonomy-category-select","style":{"spacing":{"margin":{"top":"var:preset|spacing|content"}}},"className":"is-style-category-selector"} /-->

	<!-- wp:template-part {"slug":"query","style":{"spacing":{"margin":{"top":"var:preset|spacing|content","bottom":"var:preset|spacing|content"}}}} /-->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"is-style-site-footer","style":{"spacing":{"margin":{"top":"0"}}},"anchor":"colophon"} /-->
