<?php
/**
 * Loading theme functionality.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Constants:

	define( 'ZOOEY_THEME_VERSION', wp_get_theme( 'zooey' )->get( 'Version' ) );

	define( 'ZOOEY_PATH', trailingslashit( get_template_directory() ) );
		define( 'ZOOEY_PATH_INCLUDES', ZOOEY_PATH . 'includes/' );
		define( 'ZOOEY_PATH_VENDOR',   ZOOEY_PATH . 'vendor/' );

	if ( ! defined( 'ZOOEY_ENQUEUE_PRIORITY' ) ) {
		define( 'ZOOEY_ENQUEUE_PRIORITY', 11 );
	}

	if ( ! defined( 'ZOOEY_RENDER_BLOCK_PRIORITY' ) ) {
		define( 'ZOOEY_RENDER_BLOCK_PRIORITY', 15 );
	}

	// Dummy ID used for images in patterns.
	if ( ! defined( 'ZOOEY_DUMMY_ID' ) ) {
		define( 'ZOOEY_DUMMY_ID', 987654321 );
	}

// Load the functionality.
require_once ZOOEY_PATH_INCLUDES . 'Autoload.php';
WebManDesign\Zooey\Theme::init();
