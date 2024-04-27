/**
 * Block modifications.
 *
 * NOTES:
 * //* = Not sure why, but these ALSO have to be enabled via PHP!
 * @see  WebManDesign\Zooey\Content\Block::block_settings()
 *
 * //** = Need to provide inline styles via `render_block` filter.
 * @see   WebManDesign\Zooey\Content\Block::render__gap()
 * @link  https://github.com/WordPress/gutenberg/issues/53155
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

( () => {
	'use strict';

	// Modify block supports.
	wp.hooks.addFilter(
		'blocks.registerBlockType',
		'zooey/block-mods',
		( settings, name ) => {

			// Processing

				switch( name ) {

					case 'core/column':
					case 'core/comments-pagination': //*
					case 'core/list-item':
					case 'core/query-pagination': //*
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									margin: [
										'top',
										'bottom',
									],
								},
							},
						} );
						break;

					case 'core/comment-content': //*
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									margin: true,
								},
								__experimentalBorder: {
									color: true,
									style: true,
									width: true,
									radius: true,
								},
							},
						} );
						break;

					case 'core/comments': //*
						settings = lodash.merge( settings, {
							supports: {
								layout: {
									allowSizingOnChildren: true,
								},
								// https://make.wordpress.org/core/2023/07/14/layout-updates-in-the-editor-for-wordpress-6-3/
								__experimentalLayout: {
									allowSizingOnChildren: true,
								},
							},
						} );
						break;

					case 'core/categories': //**
					case 'core/group':
					case 'core/tag-cloud': //**
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									blockGap: {
										sides: [
											'horizontal',
											'vertical',
										],
									},
								},
							},
						} );
						break;

					case 'core/cover': //*
					case 'core/heading':
					case 'core/post-comments-form': //*
						settings = lodash.merge( settings, {
							supports: {
								__experimentalBorder: {
									color: true,
									style: true,
									width: true,
									radius: true,
								},
							},
						} );
						break;

					case 'core/details': //**
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									blockGap: true,
								},
								layout: {
									allowEditing: false, // Required for `blockGap` to work.
								},
								__experimentalBorder: {
									color: true,
									style: true,
									width: true,
									radius: true,
								},
							},
						} );
						break;

					case 'core/image':
						settings = lodash.merge( settings, {
							supports: {
								color: { //*
									gradients: true,
								},
								spacing: {
									padding: true,
									margin: true,
								},
							},
						} );
						break;

					case 'core/list':
						settings = lodash.merge( settings, {
							supports: {
								align: [
									'center',
									'left',
									'right',
								],
							},
						} );
						break;

					case 'core/media-text': //*
						settings = lodash.merge( settings, {
							supports: {
								__experimentalBorder: {
									color: true,
									style: true,
									width: true,
									radius: true,
								},
							},
							attributes: {
								align: {
									default: 'none',
								},
							},
						} );
						break;

					case 'core/navigation':
						settings = lodash.merge( settings, {
							supports: {
								anchor: true,
							},
							attributes: {
								anchor: {
									type: 'string',
									default: '',
								},
							},
						} );
						break;

					case 'core/paragraph':
						settings = lodash.merge( settings, {
							supports: {
								align: [
									'wide',
								],
							},
						} );
						break;

					case 'core/post-author-biography': //**
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									blockGap: true,
								},
								layout: {
									allowEditing: false, // Required for `blockGap` to work.
								},
							},
						} );
						break;

					case 'core/post-content': //*
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									margin: [
										'top',
										'bottom',
									],
									padding: [
										'top',
										'bottom',
									],
								},
							},
						} );
						break;

					case 'core/post-excerpt': //*
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									blockGap: true,
								},
								__experimentalBorder: {
									color: true,
									style: true,
									width: true,
									radius: true,
								},
							},
						} );
						break;

					case 'core/post-featured-image': //*
						settings.supports.color = lodash.merge( settings.supports.color, {
							background: true,
							gradients: true,
						} );
						break;

					case 'core/post-navigation-link': //*
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									padding: true,
									margin: true,
								},
								__experimentalBorder: {
									color: true,
									style: true,
									width: true,
									radius: true,
								},
							},
						} );
						break;

					case 'core/query':
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									padding: true,
									margin: [
										'top',
										'bottom',
									],
								},
								color: {
									gradients: true,
									link: true,
									__experimentalDefaultControls: {
										background: true,
										text: true
									},
								},
								anchor: true,
								tagName: true,
								ariaLabel: true,
							},
						} );
						break;

					case 'core/quote':
						settings = lodash.merge( settings, {
							supports: {
								align: [
									'wide',
									'full',
								],
								spacing: {
									margin: [
										'top',
										'bottom',
									],
								},
							},
						} );
						break;

					case 'core/search':
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									margin: true,
								},
							},
						} );
						break;

					case 'core/site-logo': //*
						settings.supports.color = lodash.merge( settings.supports.color, {
							background: true,
							gradients: true,
						} );
						settings = lodash.merge( settings, {
							supports: {
								__experimentalBorder: {
									color: true,
									style: true,
									width: true,
									radius: true,
								},
							},
						} );
						break;

					case 'core/spacer':
						settings = lodash.merge( settings, {
							supports: {
								spacing: {
									margin: true,
								},
								__experimentalBorder: {
									color: true,
									style: true,
									width: true,
								},
							},
						} );
						break;

					case 'core/template-part':
						settings = lodash.merge( settings, {
							supports: {
								anchor: true,
								spacing: { //*
									margin: [
										'top',
										'bottom',
									],
								},
								dimensions: { //*
									minHeight: true,
								},
								position: {
									sticky: true,
								},
							},
							attributes: {
								anchor: {
									type: 'string',
									default: '',
								},
							},
						} );
						break;
				}

				// Allow `condition` attribute for all blocks.
				settings = lodash.merge( settings, {
					attributes: {
						condition: {
							type: 'object',
							default: {},
						},
					},
				} );

				// Make spacing options visible by default.
				settings = lodash.merge( settings, {
					supports: {
						spacing: {
							__experimentalDefaultControls: {
								padding: true,
								margin: true,
								blockGap: true,
							}
						},
					},
				} );


			// Output

				return settings;

		},
		// Need to use low priority here so WordPress can hook with default
		// priority of 10 to add required `attributes` for us.
		5
	);

	// We don't need some core block styles.
	wp.domReady( () => {

		wp.blocks.unregisterBlockStyle(
			'core/button',
			[
				'fill',
			]
		);

		wp.blocks.unregisterBlockStyle(
			'core/quote',
			[
				'default',
				'large',
				'plain',
			]
		);

		wp.blocks.unregisterBlockStyle(
			'core/separator',
			[
				'wide',
			]
		);
	} );

} )();
