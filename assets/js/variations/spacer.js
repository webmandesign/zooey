export default null;
/**
 * Spacers.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// Default Spacer block variation.
wp.blocks.registerBlockVariation( 'core/spacer', {
	isDefault: true,
	name: 'spacer-content-padding',
	title: __( 'Spacer', 'zooey' ),
	keywords: [
		_x( 'gap', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M7 18h4.5v1.5h-7v-7H6V17L17 6h-4.5V4.5h7v7H18V7L7 18Z"/></svg>,
	attributes: {
		height: 'var:preset|spacing|content'
	}
} );
