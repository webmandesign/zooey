export default null;
/**
 * Galleries.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// Overlapped images.
wp.blocks.registerBlockVariation( 'core/gallery', {
	name: 'gallery-overlap',
	title: __( 'Overlap gallery', 'ileana' ),
	keywords: [
		_x( 'photos', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6 16a4 4 0 1 1 2.25-7.3 4.98 4.98 0 0 0 0 6.6c-.64.44-1.42.7-2.25.7Zm6 0a4 4 0 1 1 2.25-7.3 4.98 4.98 0 0 0 0 6.6c-.64.44-1.42.7-2.25.7Zm10-4a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/></svg>,
	scope: [
		'inserter',
	],
	attributes: {
		columns: 3,
		linkTo: 'none',
		style: {
			spacing: {
				blockGap: {
					top: 0,
					left: 0,
				}
			}
		},
		className: 'is-style-overlap',
	},
	innerBlocks: [
		[
			'core/image',
			{
				url: ileanaVariations.image['1to1-1'],
				sizeSlug: 'thumbnail',
				style: {
					shadow: 'var:preset|shadow|s',
				},
				className: 'is-style-rounded'
			}
		],
		[
			'core/image',
			{
				url: ileanaVariations.image['1to1-2'],
				sizeSlug: 'thumbnail',
				style: {
					shadow: 'var:preset|shadow|s',
				},
				className: 'is-style-rounded'
			}
		],
		[
			'core/image',
			{
				url: ileanaVariations.image['1to1-3'],
				sizeSlug: 'thumbnail',
				style: {
					shadow: 'var:preset|shadow|s',
				},
				className: 'is-style-rounded'
			}
		],
	]
} );
