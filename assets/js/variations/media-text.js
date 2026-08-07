export default null;
/**
 * Media & Text.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// With heading and paragraph.
wp.blocks.registerBlockVariation( 'core/media-text', {
	name: 'media-text-with-heading-and-paragraph',
	title: __( 'Media & Text with heading and paragraph', 'zooey' ),
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M3 6v11.5h8V6H3Zm18 5.5h-7V9h7v2.5ZM14 15h7v-1.5h-7V15Z"/></svg>,
	innerBlocks: [
		[
			'core/group',
			{},
			[
				['core/heading'],
				['core/paragraph'],
			]
		],
	]
} );

// Feature with icon and description.
wp.blocks.registerBlockVariation( 'core/media-text', {
	name: 'media-text-feature-with-icon',
	title: __( 'Media & Text with icon and description', 'zooey' ),
	keywords: [
		_x( 'feature', 'keyword', 'zooey' ),
		_x( 'service', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M9 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm12-.5H11V9h10Zm-10 2h10V15H11Z"/></svg>,
	attributes: {
		mediaWidth: 20,
		verticalAlignment: 'top',
		isStackedOnMobile: false
	},
	innerBlocks: [
		[
			'core/group',
			{
				style: {
					spacing: {
						blockGap: {
							top: 'var:preset|spacing|s',
							left: 'var:preset|spacing|s'
						}
					}
				}
			},
			[
				[
					'core/heading',
					{
						style: {
							typography: {
								textTransform: 'uppercase'
							}
						},
						fontSize: 'l'
					}
				],
				['core/paragraph'],
			]
		],
	]
} );

// Text & Media (flipped order).
wp.blocks.registerBlockVariation( 'core/media-text', {
	name: 'text-media',
	title: __( 'Text & Media', 'zooey' ),
	keywords: [
		_x( 'media & text', 'keyword', 'zooey' ),
		_x( 'media', 'keyword', 'zooey' ),
		_x( 'text', 'keyword', 'zooey' ),
		_x( 'image', 'keyword', 'zooey' ),
		_x( 'video', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M21 17.5V6h-8v11.5h8Zm-11-3H3V16h7v-1.5ZM3 11h7v1.5H3V11Zm7-3.5H3V9h7V7.5Z"/></svg>,
	attributes: {
		mediaPosition: 'right'
	},
	isActive: [
		'mediaPosition',
	]
} );
