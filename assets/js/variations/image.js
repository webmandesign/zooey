export default null;
/**
 * Images.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// Custom Header image.
wp.blocks.registerBlockVariation( 'core/image', {
	name: 'custom-header',
	title: __( 'Use header image', 'zooey' ),
	keywords: [
		_x( 'decoration', 'keyword', 'zooey' ),
		_x( 'custom header', 'keyword', 'zooey' ),
		_x( 'image', 'keyword', 'zooey' ),
		_x( 'intro', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M21 5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3.25L8.2 12c.2.2.5.2.8 0l2.9-2 3.6 3.5c.2.3.7.3 1 0L21 9.13V5Zm-1.5 0v3.6L16 12l-3.5-3.4c-.2-.3-.6-.3-.9-.1l-3 1.9-4.1-3V5c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		align: 'wide',
		sizeSlug: 'full',
		className: 'is-style-use-header-image',
		url: zooeyVariations.getHeaderImage,
		style: {
			spacing: {
				margin: {
					top: '0'
				}
			}
		}
	}
} );

// Custom Header image flipped vertically.
wp.blocks.registerBlockVariation( 'core/image', {
	name: 'custom-header-flip-vertically',
	title: __( 'Use header image (flipped)', 'zooey' ),
	keywords: [
		_x( 'decoration', 'keyword', 'zooey' ),
		_x( 'custom header', 'keyword', 'zooey' ),
		_x( 'image', 'keyword', 'zooey' ),
		_x( 'intro', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M21 19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3.25L8.2 12c.2-.2.5-.2.8 0l2.9 2 3.6-3.5c.2-.3.7-.3 1 0l4.5 4.37V19Zm-1.5 0v-3.6L16 12l-3.5 3.4c-.2.3-.6.3-.9.1l-3-1.9-4.1 3V19c0 .3.2.5.5.5h14c.3 0 .5-.2.5-.5Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		align: 'wide',
		sizeSlug: 'full',
		className: 'is-style-use-header-image-flip-v',
		url: zooeyVariations.getHeaderImage
	}
} );
