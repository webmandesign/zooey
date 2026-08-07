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
	'title' => _x( 'Uppercase H2 heading', 'Block pattern title.', 'zooey' ),
) );

?>

<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"m"} -->
<h2 class="wp-block-heading has-m-font-size" style="text-transform:uppercase"><?php Demo::The_text( 'title/m' ); ?></h2>
<!-- /wp:heading -->
