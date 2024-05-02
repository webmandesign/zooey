<?php
/**
 * The template for displaying comments.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Zooey\Content;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (
	! post_password_required()
	&& ( comments_open() || get_comments_number() )
) {

	do_action( 'tha_comments_before' );

	Block_Template_Part::the_content(
		'comments',
		array(
			'tag'   => 'section',
			'class' => 'entry-comments',
		)
	);

	do_action( 'tha_comments_after' );
}
