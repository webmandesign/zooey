export default null;
/**
 * Site structure.
 *
 * @since  2.0.0
 */

const { __, _x } = wp.i18n;

// Header.
wp.blocks.registerBlockVariation( 'core/template-part', {
	name: 'site-header',
	title: __( 'Site header', 'zooey' ),
	icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M18.5 10.5H10v8h8a.5.5 0 00.5-.5v-7.5zm-10 0h-3V18a.5.5 0 00.5.5h2.5v-8zM6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z"></path></svg>,
	scope: [
		'block',
		'inserter',
		'transform',
	],
	attributes: {
		tagName: 'header',
		area: 'header',
		className: 'is-style-site-header',
		anchor: 'masthead'
	}
} );

// Intro (page header).
wp.blocks.registerBlockVariation( 'core/template-part', {
	name: 'page-header',
	title: __( 'Intro (page header)', 'zooey' ),
	icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M19 3H5c-.6 0-1 .4-1 1v7c0 .5.4 1 1 1h14c.5 0 1-.4 1-1V4c0-.6-.4-1-1-1zM5.5 10.5v-.4l1.8-1.3 1.3.8c.3.2.7.2.9-.1L11 8.1l2.4 2.4H5.5zm13 0h-2.9l-4-4c-.3-.3-.8-.3-1.1 0L8.9 8l-1.2-.8c-.3-.2-.6-.2-.9 0l-1.3 1V4.5h13v6zM4 20h9v-1.5H4V20zm0-4h16v-1.5H4V16z"></path></svg>,
	scope: [
		'block',
		'inserter',
		'transform',
	],
	keywords: [
		_x( 'page title', 'keyword', 'zooey' ),
	],
	attributes: {
		tagName: 'header',
		className: 'is-style-page-header'
	}
} );

// Footer.
wp.blocks.registerBlockVariation( 'core/template-part', {
	name: 'site-footer',
	title: __( 'Site footer', 'zooey' ),
	icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="M18 5.5h-8v8h8.5V6a.5.5 0 00-.5-.5zm-9.5 8h-3V6a.5.5 0 01.5-.5h2.5v8zM6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z"></path></svg>,
	scope: [
		'block',
		'inserter',
		'transform',
	],
	attributes: {
		tagName: 'footer',
		area: 'footer',
		className: 'is-style-site-footer has-mobile-padding-bottom',
		style: {
			spacing: {
				margin: {
					top: '0'
				}
			}
		},
		anchor: 'colophon'
	}
} );
