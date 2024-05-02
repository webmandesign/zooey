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
	'title'    => sprintf(
		/* translators: %s: context. */
		_x( 'Site footer: %s', 'Block pattern title.', 'zooey' ),
		_x( 'Minimal', 'Site footer context.', 'zooey' )
	),
	'keywords' => array(
		esc_html_x( 'links', 'keyword', 'zooey' ),
		esc_html_x( 'social links', 'keyword', 'zooey' ),
		esc_html_x( 'info', 'keyword', 'zooey' ),
		esc_html_x( 'copyright', 'keyword', 'zooey' ),
		esc_html_x( 'site builder', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|content"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1600px"}} -->
<div class="wp-block-group" style="margin-top:0;padding-top:0;padding-bottom:var(--wp--preset--spacing--content)">

	<!-- wp:template-part {"slug":"custom-header-bottom","align":"wide"} /-->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"},"margin":{"top":"var:preset|spacing|content"}},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"fontSize":"s"} -->
	<div class="wp-block-group alignwide has-s-font-size" style="margin-top:var(--wp--preset--spacing--content);text-transform:uppercase">

		<!-- wp:site-logo {"width":320,"style":{"layout":{"selfStretch":"fill","flexSize":null}},"className":"is-logo-footer"} /-->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Copyright &copy; ', 'zooey' ); ?><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></strong>, <?php echo date_i18n( 'Y' ); the_privacy_policy_link( ' — ' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
		<p style="font-style:normal;font-weight:600"><a href="#top"><?php esc_html_e( 'To the top &uarr;', 'zooey' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
