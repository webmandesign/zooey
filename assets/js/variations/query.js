export default null;
/**
 * Queries.
 *
 * @since    2.0.0
 * @version  2.0.1
 */

const { __, _x } = wp.i18n;

// Recent posts.
wp.blocks.registerBlockVariation( 'core/query', {
	name: 'query-recent-posts',
	title: __( 'Blog Posts', 'zooey' ),
	keywords: [
		_x( 'latest posts', 'keyword', 'zooey' ),
		_x( 'news', 'keyword', 'zooey' ),
		_x( 'inline', 'keyword', 'zooey' ),
		_x( 'row', 'keyword', 'zooey' ),
		_x( 'columns', 'keyword', 'zooey' ),
	],
	icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M4 17h12v8H4v-8Zm1-3H4v1h1v-1Zm6 0H6v1h5v-1Zm5 13H4v1h12v-1Zm0 2H4v1h12v-1Zm-4 2H4v1h8v-1Zm4-20H4v2h12v-2Zm2 6h12v8H18v-8Zm1-3h-1v1h1v-1Zm6 0h-5v1h5v-1Zm5 13H18v1h12v-1Zm0 2H18v1h12v-1Zm-4 2h-8v1h8v-1Zm4-20H18v2h12v-2Zm2 6h12v8H32v-8Zm1-3h-1v1h1v-1Zm6 0h-5v1h5v-1Zm5 13H32v1h12v-1Zm0 2H32v1h12v-1Zm-4 2h-8v1h8v-1Zm4-20H32v2h12v-2Z"/><path d="M10.5 34.5h-6v2h6v-2Zm14 0h-6v2h6v-2Zm14 0h-6v2h6v-2Z"/></svg>,
	scope: [
		'block',
	],
	attributes: {
		query: {
			perPage: 3,
			postType: 'post',
			sticky: 'exclude',
			inherit: false
		},
		displayLayout: {
			type: 'flex',
			columns: 3
		},
		align: 'wide'
	},
	innerBlocks: [
		[
			'core/post-template',
			{
				style: {
					spacing: {
						blockGap: {
							top: 'var:preset|spacing|m',
							left: 'var:preset|spacing|m'
						}
					}
				},
				layout: {
					type: 'grid',
					columnCount: 3
				}
			},
			[
				// Can not use `core/template-part` block here
				// as it is not available in post/page editor.
				[ 'core/pattern', { slug: 'zooey/site/entry-query' } ]
			]
		],
	]
} );

// Recent posts alt.
wp.blocks.registerBlockVariation( 'core/query', {
	name: 'query-recent-posts-alt',
	title: __( 'Alternative Posts', 'zooey' ),
	keywords: [
		_x( 'latest posts', 'keyword', 'zooey' ),
		_x( 'news', 'keyword', 'zooey' ),
		_x( 'inline', 'keyword', 'zooey' ),
		_x( 'row', 'keyword', 'zooey' ),
		_x( 'columns', 'keyword', 'zooey' ),
	],
	icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><path d="M32 17h12v8H32v-8Zm0 15V17h12v15H32Zm11-14H33v13h10V18Zm-1 8h-8v2h8v-2Zm-2 3h-4v1h4v-1Zm-5 0h-1v1h1v-1ZM18 17h12v8H18v-8Zm0 15V17h12v15H18Zm11-14H19v13h10V18Zm-1 8h-8v2h8v-2Zm-2 3h-4v1h4v-1Zm-5 0h-1v1h1v-1ZM4 17h12v8H4v-8Zm0 15V17h12v15H4Zm11-14H5v13h10V18Zm-1 8H6v2h8v-2Zm-2 3H8v1h4v-1Zm-5 0H6v1h1v-1Z"></path></svg>,
	scope: [
		'block',
	],
	attributes: {
		query: {
			perPage: 3,
			postType: 'post',
			sticky: 'exclude',
			inherit: false
		},
		displayLayout: {
			type: 'flex',
			columns: 3
		},
		align: 'wide'
	},
	innerBlocks: [
		[
			'core/post-template',
			{
				style: {
					spacing: {
						blockGap: {
							top: 'var:preset|spacing|m',
							left: 'var:preset|spacing|m'
						}
					}
				},
				layout: {
					type: 'grid',
					columnCount: 3
				}
			},
			[
				// Can not use `core/template-part` block here
				// as it is not available in post/page editor.
				[ 'core/pattern', { slug: 'zooey/site/entry-query-alt' } ]
			]
		],
	]
} );
