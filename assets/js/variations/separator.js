export default null;
/**
 * Separators.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// Shape.
wp.blocks.registerBlockVariation( 'core/separator', {
	name: 'separator-shape',
	title: __( 'Shape separator', 'zooey' ),
	keywords: [
		_x( 'border', 'keyword', 'zooey' ),
		_x( 'decoration', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M 12 13 L 12 11 L 14 10 L 16 11 L 18 12 L 20 11 L 20 13 L 18 14 L 16 13 L 14 12 L 12 13 Z M 4 13 L 4 11 L 6 10 L 8 11 L 10 12 L 12 11 L 12 13 L 10 14 L 8 13 L 6 12 L 4 13 Z" /></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		align: 'center',
		className: 'is-style-shape',
	}
} );
