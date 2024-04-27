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
	'title'    => _x( 'List of rectangular pill-style links with icons', 'Block pattern title.', 'zooey' ),
	'keywords' => array(
		esc_html_x( 'columns', 'keyword', 'zooey' ),
	),
) );

?>

<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide">

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.5em","left":"0.5em"},"padding":{"top":"0.5em","bottom":"0.5em","left":"0.5em","right":"1.5em"}}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group has-primary-background-color has-background" style="padding-top:0.5em;padding-right:1.5em;padding-bottom:0.5em;padding-left:0.5em">

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5em","bottom":"0.5em","left":"0.5em","right":"0.5em"}},"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"secondary-mixed"} -->
		<div class="wp-block-group has-secondary-mixed-background-color has-background" style="padding-top:0.5em;padding-right:0.5em;padding-bottom:0.5em;padding-left:0.5em">

			<!-- wp:image {"align":"center","sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.24' ) ); ?>" alt="" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.1","textDecoration":"none","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"className":"is-style-no-text-wrap","fontSize":"s"} -->
		<p class="is-style-no-text-wrap has-s-font-size" style="font-style:normal;font-weight:600;line-height:1.1;text-decoration:none;text-transform:uppercase"><a href="#0"><?php Block_Pattern::the_text( 'xs' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.5em","left":"0.5em"},"padding":{"top":"0.5em","bottom":"0.5em","left":"0.5em","right":"1.5em"}}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group has-primary-background-color has-background" style="padding-top:0.5em;padding-right:1.5em;padding-bottom:0.5em;padding-left:0.5em">

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5em","bottom":"0.5em","left":"0.5em","right":"0.5em"}},"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"secondary-mixed"} -->
		<div class="wp-block-group has-secondary-mixed-background-color has-background" style="padding-top:0.5em;padding-right:0.5em;padding-bottom:0.5em;padding-left:0.5em">

			<!-- wp:image {"align":"center","sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.24' ) ); ?>" alt="" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.1","textDecoration":"none","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"className":"is-style-no-text-wrap","fontSize":"s"} -->
		<p class="is-style-no-text-wrap has-s-font-size" style="font-style:normal;font-weight:600;line-height:1.1;text-decoration:none;text-transform:uppercase"><a href="#0"><?php Block_Pattern::the_text( 'xs' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0.5em","left":"0.5em"},"padding":{"top":"0.5em","bottom":"0.5em","left":"0.5em","right":"1.5em"}}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group has-primary-background-color has-background" style="padding-top:0.5em;padding-right:1.5em;padding-bottom:0.5em;padding-left:0.5em">

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5em","bottom":"0.5em","left":"0.5em","right":"0.5em"}},"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"secondary-mixed"} -->
		<div class="wp-block-group has-secondary-mixed-background-color has-background" style="padding-top:0.5em;padding-right:0.5em;padding-bottom:0.5em;padding-left:0.5em">

			<!-- wp:image {"align":"center","sizeSlug":"full","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
			<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_attr( Block_Pattern::get_text( 'icon.24' ) ); ?>" alt="" /></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.1","textDecoration":"none","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"className":"is-style-no-text-wrap","fontSize":"s"} -->
		<p class="is-style-no-text-wrap has-s-font-size" style="font-style:normal;font-weight:600;line-height:1.1;text-decoration:none;text-transform:uppercase"><a href="#0"><?php Block_Pattern::the_text( 'xs' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
