export default null;
/**
 * UNREGISTER.
 * We don't need some core block variations.
 *
 * @since    2.0.0
 * @version  2.0.6
 */

wp.domReady( () => {

	// We have our own Cover block default variation.
	wp.blocks.unregisterBlockVariation( 'core/cover', 'cover' );

	// We have our own Icon block default variation.
	wp.blocks.unregisterBlockVariation( 'core/icon', 'default' );
} );
