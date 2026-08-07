export default null;
/**
 * Columns.
 *
 * @since  2.0.0
 */

const { __ } = wp.i18n;

// 4 columns.
wp.blocks.registerBlockVariation( 'core/columns', {
	name: 'columns-four',
	title: __( 'Wide 4 columns', 'zooey' ),
	icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M0 10c0-1.1.9-2 2-2h6.53c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H2a2 2 0 0 1-2-2V10Zm12.5 0c0-1.1.86-2 1.97-2h7.06c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2h-7.06c-1.1 0-1.97-.9-1.97-2V10ZM25 10c0-1.1.86-2 1.97-2h7.06c1.1 0 1.97.9 1.97 2v28c0 1.1-.87 2-1.97 2h-7.06c-1.1 0-1.97-.9-1.97-2V10Zm12.5 0c0-1.1.86-2 1.97-2H46a2 2 0 0 1 2 2v28a2 2 0 0 1-2 2h-6.53c-1.1 0-1.97-.9-1.97-2V10Z"/></svg>,
	scope: [
		'block',
	],
	attributes: {
		align: 'wide'
	},
	innerBlocks: [
		['core/column'],
		['core/column'],
		['core/column'],
		['core/column'],
	]
} );

// 5 columns.
wp.blocks.registerBlockVariation( 'core/columns', {
	name: 'columns-five',
	title: __( 'Wide 5 columns', 'zooey' ),
	icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M0 10c0-1.1.9-2 2-2h4.03C7.13 8 8 8.9 8 10v28c0 1.1-.86 2-1.97 2H2a2 2 0 0 1-2-2V10Zm10 0c0-1.1.9-2 2-2h4.03c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H12a2 2 0 0 1-2-2V10Zm10 0c0-1.1.9-2 2-2h4.03c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H22a2 2 0 0 1-2-2V10Zm10 0c0-1.1.9-2 2-2h4.03c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H32a2 2 0 0 1-2-2V10Zm10 0c0-1.1.9-2 2-2h4.03c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H42a2 2 0 0 1-2-2V10Z"/></svg>,
	scope: [
		'block',
	],
	attributes: {
		align: 'wide',
		style: {
			spacing: {
				blockGap: {
					top: 'var:preset|spacing|s',
					left: 'var:preset|spacing|s'
				}
			}
		}
	},
	innerBlocks: [
		['core/column'],
		['core/column'],
		['core/column'],
		['core/column'],
		['core/column'],
	]
} );

// 6 columns.
wp.blocks.registerBlockVariation( 'core/columns', {
	name: 'columns-six',
	title: __( 'Wide 6 columns', 'zooey' ),
	icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M0 10.07c0-1.1.9-2 2-2h2.36c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H2a2 2 0 0 1-2-2v-28ZM41.67 10c0-1.1.9-2 2-2h2.36c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2h-2.36a2 2 0 0 1-2-2V10ZM8.33 10c0-1.1.9-2 2-2h2.37c1.1 0 1.96.9 1.96 2v28c0 1.1-.86 2-1.96 2h-2.37a2 2 0 0 1-2-2V10Zm8.34 0c0-1.1.9-2 2-2h2.36c1.1 0 1.97.9 1.97 2v28c0 1.1-.87 2-1.97 2h-2.36a2 2 0 0 1-2-2V10ZM25 10c0-1.1.9-2 2-2h2.36c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H27a2 2 0 0 1-2-2V10Zm8.34 0c0-1.1.9-2 2-2h2.36c1.1 0 1.97.9 1.97 2v28c0 1.1-.87 2-1.97 2h-2.36a2 2 0 0 1-2-2V10Z"/></svg>,
	scope: [
		'block',
	],
	attributes: {
		align: 'wide',
		style: {
			spacing: {
				blockGap: {
					top: 'var:preset|spacing|s',
					left: 'var:preset|spacing|s'
				}
			}
		}
	},
	innerBlocks: [
		['core/column'],
		['core/column'],
		['core/column'],
		['core/column'],
		['core/column'],
		['core/column'],
	]
} );

// Golden ratio columns.
wp.blocks.registerBlockVariation( 'core/columns', {
	name: 'columns-golden',
	title: __( 'Golden ratio', 'zooey' ),
	icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M0 10.07c0-1.1.9-2 2-2h13.03c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H2a2 2 0 0 1-2-2v-28ZM19 10c0-1.1.9-2 2-2h25.03c1.1 0 1.97.9 1.97 2v28c0 1.1-.86 2-1.97 2H21a2 2 0 0 1-2-2V10Z"/></svg>,
	scope: [
		'block',
	],
	innerBlocks: [
		['core/column', { width: '38.2%' }],
		['core/column', { width: '61.8%' }],
	]
} );
