export default null;
/**
 * Headings.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// Inline with horizontal line.
wp.blocks.registerBlockVariation( 'core/group', {
	name: 'heading-with-hr',
	title: __( 'Heading with horizontal line', 'zooey' ),
	keywords: [
		_x( 'title', 'keyword', 'zooey' ),
		_x( 'uppercase', 'keyword', 'zooey' ),
		_x( 'letter spacing', 'keyword', 'zooey' ),
		_x( 'separator', 'keyword', 'zooey' ),
		_x( 'border', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M9 11H5V7H3v10h2v-4h4v4h2V7H9v4Zm4 2v-2h8v2h-8Z"/></svg>,
	scope: [
		'inserter',
	],
	attributes: {
		style: {
			spacing: {
				blockGap: {
					top: 'var:preset|spacing|s',
					left: 'var:preset|spacing|s'
				}
			}
		},
		layout: {
			type: 'flex',
			flexWrap: 'nowrap'
		}
	},
	innerBlocks: [
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
		[
			'core/separator',
			{
				style: {
					layout: {
						selfStretch: 'fill',
						flexSize: 'null'
					}
				}
			}
		],
	]
} );

// H2 uppercase.
wp.blocks.registerBlockVariation( 'core/heading', {
	name: 'heading-h2-uppercase',
	title: __( 'Uppercase H2 heading', 'zooey' ),
	keywords: [
		_x( 'title', 'keyword', 'zooey' ),
		_x( 'uppercase', 'keyword', 'zooey' ),
		_x( 'letter spacing', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M8 11.1H4v-4H2v10h2v-4h4v4h2v-10H8v4Zm10 4 1.1-1.1 1.2-1.3.9-1.3c.2-.4.3-.8.3-1.3a3 3 0 0 0-.3-1.3c-.2-.4-.4-.7-.8-1-.3-.3-.7-.5-1.2-.6-.5-.2-1-.2-1.5-.2l-1.1.1-1 .3-.9.5-.8.7 1.2 1.2 1-.7c.4-.2.7-.3 1.2-.3s.9.1 1.3.4c.3.3.5.7.5 1.1 0 .4-.1.8-.4 1.1a4 4 0 0 1-1 1.2L16.1 14a21 21 0 0 1-2.2 1.6v1.5h8v-2H18Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		style: {
			typography: {
				textTransform: 'uppercase'
			}
		},
		fontSize: 'm'
	}
} );

// H3 uppercase.
wp.blocks.registerBlockVariation( 'core/heading', {
	name: 'heading-h3-uppercase',
	title: __( 'Uppercase H3 heading', 'zooey' ),
	keywords: [
		_x( 'title', 'keyword', 'zooey' ),
		_x( 'uppercase', 'keyword', 'zooey' ),
		_x( 'letter spacing', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M8 11H4V7H2v10h2v-4h4v4h2V7H8v4Zm13.3 1.7c-.4-.4-1-.7-1.6-.8v-.1c.6-.2 1.1-.5 1.5-.9a2.02 2.02 0 0 0 .2-2.4c-.2-.3-.5-.6-.8-.8-.4-.2-.8-.4-1.2-.5-.6-.1-1.1-.2-1.6-.2a5.23 5.23 0 0 0-3.4 1.2l1.2 1.4c.4-.2.7-.4 1.1-.6.3-.2.7-.3 1.1-.3.4 0 .8.1 1.1.3.3.2.4.5.4.8 0 .4-.2.7-.6.9-.7.3-1.5.5-2.2.4v1.6c.5 0 1 0 1.5.1l1 .3c.2.1.4.2.5.4.1.2.1.4.1.6 0 .3-.2.7-.5.8-.4.2-.9.3-1.4.3-.5 0-1-.1-1.4-.3-.4-.2-.8-.4-1.2-.7L14 15.6a5.37 5.37 0 0 0 3.9 1.4c.6 0 1.1-.1 1.6-.2.4-.1.9-.2 1.3-.5.4-.2.7-.5.9-.9.2-.4.3-.8.3-1.2 0-.6-.3-1.1-.7-1.5Z"/></svg>,
	scope: [
		'inserter',
		'transform',
	],
	attributes: {
		level: 3,
		style: {
			typography: {
				textTransform: 'uppercase'
			}
		},
		fontSize: 's'
	}
} );
