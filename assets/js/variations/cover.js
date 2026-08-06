export default null;
/**
 * Covers.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// Default Cover block variation.
// NOTE: Also have to unregister core Cover block default variation (see "UNREGISTER" section below).
wp.blocks.registerBlockVariation( 'core/cover', {
	isDefault: true,
	name: 'cover-paragraph-font-size-default',
	title: __( 'Cover', 'ileana' ),
	keywords: [
		_x( 'background', 'keyword', 'ileana' ),
		_x( 'section', 'keyword', 'ileana' ),
	],
	attributes: {
		url: ileanaVariations.image['3to2-1'],
		dimRatio: 70,
		minHeight: 40,
		minHeightUnit: 'vh',
		layout: {
			type: 'constrained'
		}
	},
	innerBlocks: [
		['core/paragraph', { align: 'center' }],
	]
} );

// Hover content.
wp.blocks.registerBlockVariation( 'core/cover', {
	name: 'cover-hover-content',
	title: __( 'Cover with content on hover', 'ileana' ),
	keywords: [
		_x( 'background', 'keyword', 'ileana' ),
		_x( 'section', 'keyword', 'ileana' ),
		_x( 'portfolio', 'keyword', 'ileana' ),
		_x( 'project', 'keyword', 'ileana' ),
		_x( 'card', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M19 3.3v8.527l-1.5-.49V3.3c0-.4-.4-.8-.8-.8h-2.2v5.9L12 5.3 9.5 8.4V2.5H3.3c-.4 0-.8.4-.8.8v13.4c0 .4.4.8.8.8h8.036l.49 1.5H3.3C2 19 1 18 1 16.7V3.3C1 2 2 1 3.3 1h13.4C18 1 19 2 19 3.3Z"/><path d="m19.036 16.462 3.265-1.419a1.166 1.166 0 0 0-.103-2.173L10.526 9.059a1.163 1.163 0 0 0-1.466 1.467l3.81 11.672c.147.461.566.782 1.051.802h.057c.464.002.883-.273 1.066-.699l1.418-3.264 3.622 3.621a1.166 1.166 0 0 0 1.65 0l.924-.924a1.167 1.167 0 0 0 0-1.651l-3.622-3.621ZM13.97 21.84l.004-.003-.004.003Zm6.939-.007-3.622-3.62a1.166 1.166 0 0 0-1.896.358l-1.415 3.257-3.81-11.661 11.658 3.806-3.255 1.417a1.166 1.166 0 0 0-.36 1.895l3.624 3.624-.924.924Z"/></svg>,
	scope: [
		'block',
		'inserter',
		'transform',
	],
	attributes: {
		className: 'is-style-hover-content',
		url: ileanaVariations.image['3to2-1'],
		dimRatio: 70,
		overlayColor: 'primary',
		layout: {
			type: 'constrained'
		}
	},
	innerBlocks: [
		['core/paragraph', { align: 'center' }],
	]
} );

// Blurred background.
wp.blocks.registerBlockVariation( 'core/cover', {
	name: 'cover-image-blur',
	title: __( 'Cover with blurred image', 'ileana' ),
	keywords: [
		_x( 'background', 'keyword', 'ileana' ),
		_x( 'section', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M18.7 3H5.3C4 3 3 4 3 5.3v13.4C3 20 4 21 5.3 21h13.4c1.3 0 2.3-1 2.3-2.3V5.3C21 4 20 3 18.7 3zm.8 15.7c0 .4-.4.8-.8.8H5.3a.9.9 0 0 1-.8-.8V5.3c0-.4.4-.8.8-.8h6.2v8.9l2.5-3.1 2.5 3.1V4.5h2.2c.4 0 .8.4.8.8v13.4z"/><path d="M7.3 18c.7 0 1.3-.7 1.3-1.5S8 15 7.3 15c-.7 0-1.3.7-1.3 1.5S6.6 18 7.3 18Zm3.4-.5c.5 0 .9-.4.9-1s-.4-1-.9-1-.8.4-.8 1 .3 1 .8 1Zm3.4 0c.5 0 .9-.4.9-1s-.4-1-.9-1c-.4 0-.8.4-.8 1s.4 1 .8 1Zm3.5-.5c.2 0 .4-.2.4-.5s-.2-.5-.4-.5c-.3 0-.5.2-.5.5s.2.5.5.5ZM7.3 13.5c.7 0 1.3-.7 1.3-1.5s-.6-1.5-1.3-1.5c-.7 0-1.3.7-1.3 1.5s.6 1.5 1.3 1.5Zm3.4-.5c.5 0 .9-.4.9-1s-.4-1-.9-1-.8.4-.8 1 .3 1 .8 1Zm3.4 0c.5 0 .9-.4.9-1s-.4-1-.9-1c-.4 0-.8.4-.8 1s.4 1 .8 1Zm3.5-.5c.2 0 .4-.2.4-.5s-.2-.5-.4-.5c-.3 0-.5.2-.5.5s.2.5.5.5ZM7.3 9c.7 0 1.3-.7 1.3-1.5S8 6 7.3 6C6.6 6 6 6.7 6 7.5S6.6 9 7.3 9Zm3.4-.5c.5 0 .9-.4.9-1 0-.5-.4-1-.9-1s-.8.5-.8 1c0 .6.3 1 .8 1Zm6.9-.5c.2 0 .4-.2.4-.5s-.2-.5-.4-.5c-.3 0-.5.2-.5.5s.2.5.5.5Z"/></svg>,
	scope: [
		'block',
		'inserter',
		'transform',
	],
	attributes: {
		className: 'is-style-image-blur',
		url: ileanaVariations.image['3to2-1'],
		dimRatio: 50,
		overlayColor: 'primary',
		align: 'full',
		style: {
			spacing: {
				padding: {
					top: 'var:preset|spacing|content',
					bottom: 'var:preset|spacing|content'
				}
			}
		},
		layout: {
			type: 'constrained'
		}
	},
	innerBlocks: [
		['core/paragraph', { align: 'center' }],
	]
} );

// With backdrop blur column.
wp.blocks.registerBlockVariation( 'core/cover', {
	name: 'cover-with-backdrop-blur',
	title: __( 'Cover with backdrop blur column', 'ileana' ),
	keywords: [
		_x( 'background', 'keyword', 'ileana' ),
		_x( 'section', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M7.3 18c.7 0 1.3-.7 1.3-1.5S8 15 7.3 15c-.7 0-1.3.7-1.3 1.5S6.6 18 7.3 18Zm3.4-.5c.5 0 .9-.4.9-1s-.4-1-.9-1-.8.4-.8 1 .3 1 .8 1Zm-3.4-4c.7 0 1.3-.7 1.3-1.5s-.6-1.5-1.3-1.5c-.7 0-1.3.7-1.3 1.5s.6 1.5 1.3 1.5Zm3.4-.5c.5 0 .9-.4.9-1s-.4-1-.9-1-.8.4-.8 1 .3 1 .8 1Zm8-10H5.3C4 3 3 4 3 5.3v13.4C3 20 4 21 5.3 21h13.4c1.3 0 2.3-1 2.3-2.3V5.3C21 4 20 3 18.7 3Zm.8 15.7c0 .4-.4.8-.8.8H5.3a.9.9 0 0 1-.8-.8V5.3c0-.4.4-.8.8-.8h6.2v8.9l2.5-3.1 2.5 3.1V4.5h2.2c.4 0 .8.4.8.8v13.4Z"/></svg>,
	scope: [
		'block',
		'inserter',
	],
	attributes: {
		url: ileanaVariations.image['3to2-1'],
		dimRatio: 0,
		overlayColor: 'primary',
		align: 'full',
		style: {
			spacing: {
				padding: {
					top: 'var:preset|spacing|content',
					bottom: 'var:preset|spacing|content'
				}
			}
		},
		layout: {
			type: 'constrained'
		}
	},
	innerBlocks: [
		[
			'core/columns',
			{
				align: 'wide'
			},
			[
				[
					'core/column',
					{
						width: '38.2%'
					},
					[
						[
							'core/group',
							{
								gradient: 'backdrop-blur-dark',
								textColor: 'white',
								className: 'is-style-backdrop-blur'
							},
							[
								['core/paragraph'],
							]
						],
					]
				],
				[
					'core/column',
					{
						width: '61.8%'
					}
				],
			]
		],
	]
} );
