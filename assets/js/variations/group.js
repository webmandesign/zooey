export default null;
/**
 * Groups.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// Backdrop blur - dark.
wp.blocks.registerBlockVariation( 'core/group', {
	name: 'group-backdrop-blur-dark',
	title: __( 'Dark group with backdrop blur', 'ileana' ),
	keywords: [
		_x( 'background', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M15.5 7c0 .55-.22 1-.5 1s-.5-.45-.5-1 .22-1 .5-1 .5.45.5 1Zm2.5.5c0 .83-.44 1.5-.97 1.5-.54 0-.98-.67-.98-1.5s.44-1.5.98-1.5c.53 0 .97.67.97 1.5ZM9.46 17c0 .55-.23 1-.5 1-.28 0-.5-.45-.5-1s.22-1 .5-1c.27 0 .5.45.5 1Zm-1.51-.5c0 .83-.44 1.5-.98 1.5-.53 0-.97-.67-.97-1.5s.44-1.5.97-1.5c.54 0 .98.67.98 1.5ZM20 6v7a2 2 0 0 1-2 2h-3v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7c0-1.1.9-2 2-2h3V6c0-1.1.9-2 2-2h7a2 2 0 0 1 2 2Zm-6.5 9H11a2 2 0 0 1-2-2v-2.5H6c-.3 0-.5.2-.5.5v7c0 .3.2.5.5.5h7c.3 0 .5-.2.5-.5Zm0-4c0-.3-.2-.5-.5-.5h-2.5V13c0 .3.2.5.5.5h2.5Zm5-5c0-.3-.2-.5-.5-.5h-7c-.3 0-.5.2-.5.5v3H13a2 2 0 0 1 2 2v2.5h3c.3 0 .5-.2.5-.5Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		gradient: 'backdrop-blur-dark',
		textColor: 'white',
		className: 'is-style-backdrop-blur'
	},
	innerBlocks: [
		['core/paragraph'],
	]
} );

// Backdrop blur - light.
wp.blocks.registerBlockVariation( 'core/group', {
	name: 'group-backdrop-blur-light',
	title: __( 'Light group with backdrop blur', 'ileana' ),
	keywords: [
		_x( 'background', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M15.5 7c0 .55-.22 1-.5 1s-.5-.45-.5-1 .22-1 .5-1 .5.45.5 1Zm2.5.5c0 .83-.44 1.5-.97 1.5-.54 0-.98-.67-.98-1.5s.44-1.5.98-1.5c.53 0 .97.67.97 1.5ZM9.46 17c0 .55-.23 1-.5 1-.28 0-.5-.45-.5-1s.22-1 .5-1c.27 0 .5.45.5 1Zm-1.51-.5c0 .83-.44 1.5-.98 1.5-.53 0-.97-.67-.97-1.5s.44-1.5.97-1.5c.54 0 .98.67.98 1.5ZM20 6v7a2 2 0 0 1-2 2h-3v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7c0-1.1.9-2 2-2h3V6c0-1.1.9-2 2-2h7a2 2 0 0 1 2 2Zm-6.5 9H11a2 2 0 0 1-2-2v-2.5H6c-.3 0-.5.2-.5.5v7c0 .3.2.5.5.5h7c.3 0 .5-.2.5-.5Zm0-4c0-.3-.2-.5-.5-.5h-2.5V13c0 .3.2.5.5.5h2.5Zm5-5c0-.3-.2-.5-.5-.5h-7c-.3 0-.5.2-.5.5v3H13a2 2 0 0 1 2 2v2.5h3c.3 0 .5-.2.5-.5Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		gradient: 'backdrop-blur-light',
		textColor: 'black',
		className: 'is-style-backdrop-blur'
	},
	innerBlocks: [
		['core/paragraph'],
	]
} );

// Backdrop blur - primary.
wp.blocks.registerBlockVariation( 'core/group', {
	name: 'group-backdrop-blur-primary',
	title: __( 'Primary color group with backdrop blur', 'ileana' ),
	keywords: [
		_x( 'background', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M15.5 7c0 .55-.22 1-.5 1s-.5-.45-.5-1 .22-1 .5-1 .5.45.5 1Zm2.5.5c0 .83-.44 1.5-.97 1.5-.54 0-.98-.67-.98-1.5s.44-1.5.98-1.5c.53 0 .97.67.97 1.5ZM9.46 17c0 .55-.23 1-.5 1-.28 0-.5-.45-.5-1s.22-1 .5-1c.27 0 .5.45.5 1Zm-1.51-.5c0 .83-.44 1.5-.98 1.5-.53 0-.97-.67-.97-1.5s.44-1.5.97-1.5c.54 0 .98.67.98 1.5ZM20 6v7a2 2 0 0 1-2 2h-3v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7c0-1.1.9-2 2-2h3V6c0-1.1.9-2 2-2h7a2 2 0 0 1 2 2Zm-6.5 9H11a2 2 0 0 1-2-2v-2.5H6c-.3 0-.5.2-.5.5v7c0 .3.2.5.5.5h7c.3 0 .5-.2.5-.5Zm0-4c0-.3-.2-.5-.5-.5h-2.5V13c0 .3.2.5.5.5h2.5Zm5-5c0-.3-.2-.5-.5-.5h-7c-.3 0-.5.2-.5.5v3H13a2 2 0 0 1 2 2v2.5h3c.3 0 .5-.2.5-.5Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		gradient: 'backdrop-blur-primary',
		textColor: 'white',
		className: 'is-style-backdrop-blur'
	},
	innerBlocks: [
		['core/paragraph'],
	]
} );

// Pattern background, primary.
wp.blocks.registerBlockVariation( 'core/group', {
	name: 'group-pattern-background-primary',
	title: __( 'Group with repeating semi-transparent background pattern', 'ileana' ),
	keywords: [
		_x( 'background', 'keyword', 'ileana' ),
		_x( 'image', 'keyword', 'ileana' ),
		_x( 'pattern', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M21 5.3v13.4c0 1.3-1 2.3-2.3 2.3H5.3C4 21 3 20 3 18.7V5.3C3 4 4 3 5.3 3h13.4C20 3 21 4 21 5.3Zm-1.5 0c0-.4-.4-.8-.8-.8H5.3c-.4 0-.8.4-.8.8v13.4c0 .4.4.8.8.8h13.4c.4 0 .8-.4.8-.8ZM8 7a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-6.7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm3.4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM8 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-6.7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm3.4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM8 13.7a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-6.7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm3.4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM8 10.3a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-6.7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm3.4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		style: {
			background: {
				backgroundImage: {
					url: ileanaVariations.image['p-i'],
					source: 'file',
				},
				backgroundSize: 'auto',
			},
			spacing: {
				padding: {
					top: 'var:preset|spacing|content',
					bottom: 'var:preset|spacing|content',
				}
			}
		},
		backgroundColor: 'primary',
		layout: {
			type: 'constrained'
		}
	},
	innerBlocks: [
		['core/paragraph'],
	]
} );

// Has table (responsive table container).
wp.blocks.registerBlockVariation( 'core/group', {
	name: 'group-has-table',
	title: __( 'Responsive table container', 'ileana' ),
	keywords: [
		_x( 'table', 'keyword', 'ileana' ),
		_x( 'wrapper', 'keyword', 'ileana' ),
		_x( 'container', 'keyword', 'ileana' ),
		_x( 'mobile', 'keyword', 'ileana' ),
		_x( 'responsive', 'keyword', 'ileana' ),
		_x( 'group', 'keyword', 'ileana' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M8 1.5h8c.65.02 1.34.3 1.77.73.42.43.7 1.12.73 1.77v16c-.02.65-.3 1.34-.73 1.77-.43.42-1.12.7-1.77.73H8a2.74 2.74 0 0 1-1.77-.73A2.74 2.74 0 0 1 5.5 20V4c.02-.65.3-1.34.73-1.77A2.74 2.74 0 0 1 8 1.5ZM6.94 2.94c-.3.3-.46.61-.44 1.06v16c-.02.45.14.76.44 1.06.3.3.61.46 1.06.44h8c.45.02.76-.14 1.06-.44.3-.3.46-.61.44-1.06V4a1.3 1.3 0 0 0-.44-1.06A1.3 1.3 0 0 0 16 2.5H8a1.3 1.3 0 0 0-1.06.44ZM6 15.5h12v1H6v-1Zm0-3h12v1H6v-1Zm0-3h12v1H6v-1Zm0-3h12v1H6v-1Zm0 12h12v1H6v-1Zm6.5.52V7h1v12.02h-1Zm-5-.02V6.98h1V19h-1ZM9.48 4c0-.28.22-.5.5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Z"/></svg>,
	scope: [
		'inserter',
	],
	attributes: {
		className: 'has-table',
	},
	innerBlocks: [
		[ 'core/table' ],
	]
} );
