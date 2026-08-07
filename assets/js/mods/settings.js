export default null;
/**
 * Block settings modifications.
 *
 * @link  https://make.wordpress.org/core/2024/10/17/roster-of-design-tools-per-block-wordpress-6-6-edition-2/
 *
 * NOTES:
 * //* = Not sure why, but these ALSO have to be enabled via PHP!
 * @see  Content\Block_Mods::settings()
 *
 * //** = Need to provide inline styles via `render_block` filter.
 * @see   Content\Block::render__gap()
 * @link  https://github.com/WordPress/gutenberg/issues/53155
 *
 * //*** = Need to set `[horizontal,vertical]` as it differs from
 *         (potentially already set) `true` value.
 *
 * @since    2.0.0
 * @version  2.0.1
 */

wp.hooks.addFilter(
	'blocks.registerBlockType',
	'zooey/block-mods',
	( settings, name ) => {

		// Processing

			switch( name ) {

				case 'core/column':

					settings = lodash.merge( settings, {
						supports: {
							spacing: {
								margin: [
									'top',
									'bottom',
								],
							},
							background: {
								backgroundImage: true, //*
								backgroundSize: true,
							},
						},
					} );
					break;


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


				case 'core/comment-content':

					settings = lodash.merge( settings, {
						supports: {
							spacing: {
								margin: true, //*
							},
							__experimentalBorder: { //* ///Since WP6.7
								color: true,
								radius: true,
								style: true,
								width: true,
							},
						},
					} );
					break;


				case 'core/comments':

					settings = lodash.merge( settings, {
						supports: {
							layout: {
								allowSizingOnChildren: true, //*
							},
							anchor: true,
						},
					} );
					break;


				case 'core/categories': //**
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
							typography: {
								fontSize: true, // This is actually needed for `core/tag-cloud` only. //*
							},
						},
					} );
					break;


				case 'core/details':

					if ( undefined === settings.supports ) {
						settings.supports = {};
					}

					settings.supports.__experimentalBorder = lodash.merge(
						settings.supports.__experimentalBorder ?? {},
						{
							radius: true,
						}
					);
					break;


				case 'core/group':

					settings = lodash.merge( settings, {
						supports: {
							shadow: true,
							spacing: {
								margin: true, //***
								blockGap: {
									sides: [ //***
										'horizontal',
										'vertical',
									],
								},
							},
						},
					} );
					break;


				case 'core/heading':

					settings = lodash.merge( settings, {
						supports: {
							background: {
								backgroundImage: true, //*
								backgroundSize: true,
							},
							__experimentalBorder: { ///Since WP6.7
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
							color: {
								gradients: true, //*
							},
							spacing: {
								padding: true,
								margin: true, ///Since WP6.7
							},
						},
					} );

					// Adding duotone support for SVG in Image block.
					if (
						undefined !== settings.selectors
						&& undefined !== settings.selectors.filter
						&& undefined !== settings.selectors.filter.duotone
					) {
						settings.selectors.filter.duotone += ', .wp-block-image svg'; //*
					}
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


				case 'core/loginout':

					if ( undefined !== settings.supports.color ) {
						settings.supports.color.text = true; //*
					}
					break;


				case 'core/media-text':

					settings = lodash.merge( settings, {
						supports: {
							filter: {
								duotone: true, //*
							},
							__experimentalBorder: { ///Since WP6.7
								color: true,
								radius: true,
								style: true,
								width: true,
							},
						},
						attributes: {
							align: {
								default: 'none',
							},
						},
						selectors: {
							filter: {
								duotone: '.wp-block-media-text > .wp-block-media-text__media', //*
							}
						}
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
							background: {
								backgroundImage: true, //*
								backgroundSize: true,
							},
						},
					} );
					break;


				case 'core/post-author': //*        ///Since WP6.7
				case 'core/post-comments-form': //* ///Since WP6.7
				case 'core/separator': //*
				case 'core/site-tagline': //*       ///Since WP6.7

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


				case 'core/post-author-biography':

					settings = lodash.merge( settings, {
						supports: {
							spacing: {
								blockGap: true,
							},
							// Required for `blockGap` to work.
							layout: {
								allowEditing: false, //*
							},
						},
					} );
					break;


				case 'core/post-content':

					settings = lodash.merge( settings, {
						supports: {
							anchor: true,
							spacing: {
								margin: [ //*
									'top',
									'bottom',
								],
								padding: true, //* ///Since WP6.7
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


				case 'core/post-excerpt':

					settings = lodash.merge( settings, {
						supports: {
							spacing: {
								blockGap: true,
							},
							// Required for `blockGap` to work.
							layout: {
								allowEditing: false, //*
							},
							__experimentalBorder: { //* ///Since WP6.7
								color: true,
								radius: true,
								style: true,
								width: true,
							},
						},
					} );
					break;


				case 'core/post-featured-image':

					if ( undefined === settings.supports ) {
						settings.supports = {};
					}

					settings.supports.color = lodash.merge(
						settings.supports.color ?? {},
						{
							background: true, //*
							gradients: true, //*
						}
					);
					break;


				case 'core/post-navigation-link':

					settings = lodash.merge( settings, {
						supports: {
							spacing: {
								padding: true, //*
								margin: true, //*
							},
							__experimentalBorder: { //*
								color: true,
								style: true,
								width: true,
								radius: true,
							},
						},
					} );
					break;


				case 'core/post-template':

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
						},
					} );

					settings.supports.spacing = lodash.merge(
						settings.supports.spacing ?? {},
						{
							margin: true, ///Since WP6.7
						}
					);
					break;


				case 'core/search': //*

					settings = lodash.merge( settings, {
						supports: {
							spacing: {
								margin: true, ///Since WP6.7
							},
						},
					} );
					break;


				case 'core/site-logo':

					settings = lodash.merge( settings, {
						supports: {
							__experimentalBorder: { //*
								color: true,
								style: true,
								width: true,
								radius: true,
							},
						},
					} );

					settings.supports.color = lodash.merge(
						settings.supports.color ?? {},
						{
							background: true, //*
							gradients: true, //*
						}
					);
					break;


				case 'core/spacer':

					settings = lodash.merge( settings, {
						supports: {
							spacing: {
								margin: true,
							},
							__experimentalBorder: {
								color: true,
								radius: true,
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
							spacing: {
								margin: [ //*
									'top',
									'bottom',
								],
							},
							dimensions: {
								minHeight: true, //*
							},
							position: {
								sticky: true, //*
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

			// Some blocks have spacing options hidden. This makes them visible.
			settings = lodash.merge( settings, {
				supports: {
					spacing: {
						__experimentalDefaultControls: {
							blockGap: true,
							margin: true,
							padding: true,
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
