export default null;
/**
 * UNREGISTER.
 * We don't need some core block variations.
 *
 * @since  2.0.0
 */

wp.domReady( () => {

	// We have our own Cover block default variation.
	wp.blocks.unregisterBlockVariation( 'core/cover', 'cover' );
} );
