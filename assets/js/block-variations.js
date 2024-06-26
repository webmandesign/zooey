/**
 * Block variations.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

( () => {
	'use strict';

	const { __, _x } = wp.i18n;

	/**
	 * Site structure.
	 */

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
				className: 'is-style-site-header'
			}
		} );

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
				className: 'is-style-page-header',
				style: {
					spacing: {
						margin: {
							top: '0'
						}
					}
				}
			}
		} );

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
				className: 'is-style-site-footer',
				style: {
					spacing: {
						margin: {
							top: '0'
						}
					}
				}
			}
		} );

	/**
	 * Columns.
	 */

		wp.blocks.registerBlockVariation( 'core/columns', {
			name: 'columns-four',
			title: __( 'Wide 4 columns', 'zooey' ),
			icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M 15 34 L 9 34 L 9 14 L 15 14 L 15 34 Z M 17 34 L 17 14 L 23 14 L 23 34 L 17 34 Z M 25 34 L 25 14 L 31 14 L 31 34 L 25 34 Z M 33 34 L 33 14 L 39 14 L 39 34 L 33 34 Z M 41 14 C 41 12.895 40.104 12 39 12 L 9 12 C 7.895 12 7 12.895 7 14 L 7 34 C 7 35.105 7.895 36 9 36 L 39 36 C 40.104 36 41 35.105 41 34 L 41 14 Z"></path></svg>,
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

		wp.blocks.registerBlockVariation( 'core/columns', {
			name: 'columns-five',
			title: __( 'Wide 5 columns', 'zooey' ),
			icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M 14.4 34 L 9 34 L 9 14 L 14.4 14 Z M 20.55 34 L 15.15 34 L 15.15 14 L 20.55 14 Z M 26.7 34 L 21.3 34 L 21.3 14 L 26.7 14 Z M 32.85 34 L 27.45 34 L 27.45 14 L 32.85 14 Z M 39 34 L 33.6 34 L 33.6 14 L 39 14 Z M 41 14 C 41 12.895 40.104 12 39 12 L 9 12 C 7.895 12 7 12.895 7 14 L 7 34 C 7 35.105 7.895 36 9 36 L 39 36 C 40.104 36 41 35.105 41 34 Z"></path></svg>,
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

		wp.blocks.registerBlockVariation( 'core/columns', {
			name: 'columns-six',
			title: __( 'Wide 6 columns', 'zooey' ),
			icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M 13.33 34 L 9 34 L 9 14 L 13.33 14 Z M 18.464 34 L 14.134 34 L 14.134 14 L 18.464 14 Z M 23.598 34 L 19.268 34 L 19.268 14 L 23.598 14 Z M 28.732 34 L 24.402 34 L 24.402 14 L 28.732 14 Z M 33.866 34 L 29.536 34 L 29.536 14 L 33.866 14 Z M 39 34 L 34.67 34 L 34.67 14 L 39 14 Z M 41 14 C 41 12.895 40.104 12 39 12 L 9 12 C 7.895 12 7 12.895 7 14 L 7 34 C 7 35.105 7.895 36 9 36 L 39 36 C 40.104 36 41 35.105 41 34 Z"></path></svg>,
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

		wp.blocks.registerBlockVariation( 'core/columns', {
			name: 'columns-golden',
			title: __( 'Golden ratio', 'zooey' ),
			icon: <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M 21.5 34 L 21.5 14 L 39 14 L 39 34 Z M 19.5 34 L 9 34 L 9 14 L 19.5 14 Z M 41 14 C 41 12.895 40.104 12 39 12 L 9 12 C 7.895 12 7 12.895 7 14 L 7 34 C 7 35.105 7.895 36 9 36 L 39 36 C 40.104 36 41 35.105 41 34 Z"></path></svg>,
			scope: [
				'block',
			],
			innerBlocks: [
				['core/column', { width: '38.2%' }],
				['core/column', { width: '61.8%' }],
			]
		} );

	/**
	 * Covers.
	 */

		// Default Cover block variation.
		// NOTE: Also have to unregister core Cover block default variation (see "UNREGISTER" section below).
		wp.blocks.registerBlockVariation( 'core/cover', {
			isDefault: true,
			name: 'cover-paragraph-font-size-default',
			title: __( 'Cover', 'zooey' ),
			keywords: [
				_x( 'background', 'keyword', 'zooey' ),
				_x( 'section', 'keyword', 'zooey' ),
			],
			attributes: {
				url: zooeyVariations.getTemplateDirectoryURI + 'assets/images/starter/3to2-1.webp',
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

		wp.blocks.registerBlockVariation( 'core/cover', {
			name: 'cover-hover-content',
			title: __( 'Cover with content on hover', 'zooey' ),
			keywords: [
				_x( 'background', 'keyword', 'zooey' ),
				_x( 'section', 'keyword', 'zooey' ),
				_x( 'portfolio', 'keyword', 'zooey' ),
				_x( 'project', 'keyword', 'zooey' ),
				_x( 'card', 'keyword', 'zooey' ),
			],
			icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M19 3.3v8.527l-1.5-.49V3.3c0-.4-.4-.8-.8-.8h-2.2v5.9L12 5.3 9.5 8.4V2.5H3.3c-.4 0-.8.4-.8.8v13.4c0 .4.4.8.8.8h8.036l.49 1.5H3.3C2 19 1 18 1 16.7V3.3C1 2 2 1 3.3 1h13.4C18 1 19 2 19 3.3Z"/><path d="m19.036 16.462 3.265-1.419a1.166 1.166 0 0 0-.103-2.173L10.526 9.059a1.163 1.163 0 0 0-1.466 1.467l3.81 11.672c.147.461.566.782 1.051.802h.057c.464.002.883-.273 1.066-.699l1.418-3.264 3.622 3.621a1.166 1.166 0 0 0 1.65 0l.924-.924a1.167 1.167 0 0 0 0-1.651l-3.622-3.621ZM13.97 21.84l.004-.003-.004.003Zm6.939-.007-3.622-3.62a1.166 1.166 0 0 0-1.896.358l-1.415 3.257-3.81-11.661 11.658 3.806-3.255 1.417a1.166 1.166 0 0 0-.36 1.895l3.624 3.624-.924.924Z"/></svg>,
			scope: [
				'block',
				'inserter',
				'transform',
			],
			attributes: {
				className: 'is-style-hover-content',
				url: zooeyVariations.getTemplateDirectoryURI + 'assets/images/starter/3to2-1.webp',
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

		wp.blocks.registerBlockVariation( 'core/cover', {
			name: 'cover-image-blur',
			title: __( 'Cover with blurred image', 'zooey' ),
			keywords: [
				_x( 'background', 'keyword', 'zooey' ),
				_x( 'section', 'keyword', 'zooey' ),
			],
			icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M18.7 3H5.3C4 3 3 4 3 5.3v13.4C3 20 4 21 5.3 21h13.4c1.3 0 2.3-1 2.3-2.3V5.3C21 4 20 3 18.7 3zm.8 15.7c0 .4-.4.8-.8.8H5.3a.9.9 0 0 1-.8-.8V5.3c0-.4.4-.8.8-.8h6.2v8.9l2.5-3.1 2.5 3.1V4.5h2.2c.4 0 .8.4.8.8v13.4z"/><path d="M7.3 18c.7 0 1.3-.7 1.3-1.5S8 15 7.3 15c-.7 0-1.3.7-1.3 1.5S6.6 18 7.3 18Zm3.4-.5c.5 0 .9-.4.9-1s-.4-1-.9-1-.8.4-.8 1 .3 1 .8 1Zm3.4 0c.5 0 .9-.4.9-1s-.4-1-.9-1c-.4 0-.8.4-.8 1s.4 1 .8 1Zm3.5-.5c.2 0 .4-.2.4-.5s-.2-.5-.4-.5c-.3 0-.5.2-.5.5s.2.5.5.5ZM7.3 13.5c.7 0 1.3-.7 1.3-1.5s-.6-1.5-1.3-1.5c-.7 0-1.3.7-1.3 1.5s.6 1.5 1.3 1.5Zm3.4-.5c.5 0 .9-.4.9-1s-.4-1-.9-1-.8.4-.8 1 .3 1 .8 1Zm3.4 0c.5 0 .9-.4.9-1s-.4-1-.9-1c-.4 0-.8.4-.8 1s.4 1 .8 1Zm3.5-.5c.2 0 .4-.2.4-.5s-.2-.5-.4-.5c-.3 0-.5.2-.5.5s.2.5.5.5ZM7.3 9c.7 0 1.3-.7 1.3-1.5S8 6 7.3 6C6.6 6 6 6.7 6 7.5S6.6 9 7.3 9Zm3.4-.5c.5 0 .9-.4.9-1 0-.5-.4-1-.9-1s-.8.5-.8 1c0 .6.3 1 .8 1Zm6.9-.5c.2 0 .4-.2.4-.5s-.2-.5-.4-.5c-.3 0-.5.2-.5.5s.2.5.5.5Z"/></svg>,
			scope: [
				'block',
				'inserter',
				'transform',
			],
			attributes: {
				className: 'is-style-image-blur',
				url: zooeyVariations.getTemplateDirectoryURI + 'assets/images/starter/3to2-1.webp',
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

		wp.blocks.registerBlockVariation( 'core/cover', {
			name: 'cover-with-backdrop-blur',
			title: __( 'Cover with backdrop blur column', 'zooey' ),
			keywords: [
				_x( 'background', 'keyword', 'zooey' ),
				_x( 'section', 'keyword', 'zooey' ),
			],
			icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M7.3 18c.7 0 1.3-.7 1.3-1.5S8 15 7.3 15c-.7 0-1.3.7-1.3 1.5S6.6 18 7.3 18Zm3.4-.5c.5 0 .9-.4.9-1s-.4-1-.9-1-.8.4-.8 1 .3 1 .8 1Zm-3.4-4c.7 0 1.3-.7 1.3-1.5s-.6-1.5-1.3-1.5c-.7 0-1.3.7-1.3 1.5s.6 1.5 1.3 1.5Zm3.4-.5c.5 0 .9-.4.9-1s-.4-1-.9-1-.8.4-.8 1 .3 1 .8 1Zm8-10H5.3C4 3 3 4 3 5.3v13.4C3 20 4 21 5.3 21h13.4c1.3 0 2.3-1 2.3-2.3V5.3C21 4 20 3 18.7 3Zm.8 15.7c0 .4-.4.8-.8.8H5.3a.9.9 0 0 1-.8-.8V5.3c0-.4.4-.8.8-.8h6.2v8.9l2.5-3.1 2.5 3.1V4.5h2.2c.4 0 .8.4.8.8v13.4Z"/></svg>,
			scope: [
				'block',
				'inserter',
			],
			attributes: {
				url: zooeyVariations.getTemplateDirectoryURI + 'assets/images/starter/3to2-1.webp',
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

	/**
	 * Groups.
	 */

		wp.blocks.registerBlockVariation( 'core/group', {
			name: 'group-with-backdrop-blur-dark',
			title: __( 'Dark group with backdrop blur', 'zooey' ),
			keywords: [
				_x( 'background', 'keyword', 'zooey' ),
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

		wp.blocks.registerBlockVariation( 'core/group', {
			name: 'group-with-backdrop-blur-light',
			title: __( 'Light group with backdrop blur', 'zooey' ),
			keywords: [
				_x( 'background', 'keyword', 'zooey' ),
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

		wp.blocks.registerBlockVariation( 'core/group', {
			name: 'group-with-backdrop-blur-primary',
			title: __( 'Primary color group with backdrop blur', 'zooey' ),
			keywords: [
				_x( 'background', 'keyword', 'zooey' ),
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

		wp.blocks.registerBlockVariation( 'core/group', {
			name: 'group-with-pattern-background',
			title: __( 'Group with repeating semi-transparent background pattern', 'zooey' ),
			keywords: [
				_x( 'background', 'keyword', 'zooey' ),
				_x( 'image', 'keyword', 'zooey' ),
				_x( 'pattern', 'keyword', 'zooey' ),
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
							url: zooeyVariations.getTemplateDirectoryURI + 'assets/images/starter/p-i.webp',
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

	/**
	 * Headings.
	 */

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
						// className: 'is-style-wide',
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

	/**
	 * Images.
	 */

		wp.blocks.registerBlockVariation( 'core/image', {
			name: 'custom-header',
			title: __( 'Use header image', 'zooey' ),
			keywords: [
				_x( 'decoration', 'keyword', 'zooey' ),
				_x( 'custom header', 'keyword', 'zooey' ),
				_x( 'image', 'keyword', 'zooey' ),
				_x( 'intro', 'keyword', 'zooey' ),
			],
			icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M21 5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3.25L8.2 12c.2.2.5.2.8 0l2.9-2 3.6 3.5c.2.3.7.3 1 0L21 9.13V5Zm-1.5 0v3.6L16 12l-3.5-3.4c-.2-.3-.6-.3-.9-.1l-3 1.9-4.1-3V5c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5Z"/></svg>,
			scope: [
				'inserter',
				'transform',
			],
			attributes: {
				align: 'wide',
				sizeSlug: 'full',
				className: 'is-style-use-header-image',
				url: zooeyVariations.getHeaderImage,
				style: {
					spacing: {
						margin: {
							top: '0'
						}
					}
				}
			}
		} );

		wp.blocks.registerBlockVariation( 'core/image', {
			name: 'custom-header-flip-vertically',
			title: __( 'Use header image (flipped)', 'zooey' ),
			keywords: [
				_x( 'decoration', 'keyword', 'zooey' ),
				_x( 'custom header', 'keyword', 'zooey' ),
				_x( 'image', 'keyword', 'zooey' ),
				_x( 'intro', 'keyword', 'zooey' ),
			],
			icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M21 19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3.25L8.2 12c.2-.2.5-.2.8 0l2.9 2 3.6-3.5c.2-.3.7-.3 1 0l4.5 4.37V19Zm-1.5 0v-3.6L16 12l-3.5 3.4c-.2.3-.6.3-.9.1l-3-1.9-4.1 3V19c0 .3.2.5.5.5h14c.3 0 .5-.2.5-.5Z"/></svg>,
			scope: [
				'inserter',
				'transform',
			],
			attributes: {
				align: 'wide',
				sizeSlug: 'full',
				className: 'is-style-use-header-image-flip-v',
				url: zooeyVariations.getHeaderImage
			}
		} );

	/**
	 * Media & Text.
	 */

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

	/**
	 * Queries.
	 */

		wp.blocks.registerBlockVariation( 'core/query', {
			name: 'query-recent-posts',
			title: __( '3 Recent Posts', 'zooey' ),
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
						layout: {
							type: 'grid',
							columnCount: 3
						}
					},
					[
						// Can not use `core/template-part` block here as it is not available in post/page editor.
						['core/pattern', { slug: 'zooey/site/entry-query' }],
					]
				],
			]
		} );

	/**
	 * Spacer.
	 */

		// Default Spacer block variation.
		wp.blocks.registerBlockVariation( 'core/spacer', {
			isDefault: true,
			name: 'spacer-content-padding',
			title: __( 'Spacer', 'zooey' ),
			keywords: [
				_x( 'gap', 'keyword', 'zooey' ),
			],
			icon: <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"><path d="M7 18h4.5v1.5h-7v-7H6V17L17 6h-4.5V4.5h7v7H18V7L7 18Z"/></svg>,
			attributes: {
				height: 'var:preset|spacing|content'
			}
		} );

	/**
	 * UNREGISTER.
	 * We don't need some core block variations.
	 */
	wp.domReady( () => {

		wp.blocks.unregisterBlockVariation( 'core/cover', 'cover' );

		if ( ! wp.blocks.getBlockVariations( 'core/group' ).some( variation => 'group-grid' === variation.name ) ) {

			wp.blocks.registerBlockVariation( 'core/group', {
				name: 'group-grid',
				title: __( 'Grid', 'zooey' ),
				description: __( 'Arrange blocks in a grid.', 'zooey' ),
				icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m3 5c0-1.10457.89543-2 2-2h13.5c1.1046 0 2 .89543 2 2v13.5c0 1.1046-.8954 2-2 2h-13.5c-1.10457 0-2-.8954-2-2zm2-.5h6v6.5h-6.5v-6c0-.27614.22386-.5.5-.5zm-.5 8v6c0 .2761.22386.5.5.5h6v-6.5zm8 0v6.5h6c.2761 0 .5-.2239.5-.5v-6zm0-8v6.5h6.5v-6c0-.27614-.2239-.5-.5-.5z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>,
				scope: [
					'block',
					'inserter',
					'transform',
				],
				attributes: {
					layout: {
						type: 'grid'
					}
				},
				isActive: ( blockAttributes ) => blockAttributes.layout?.type === 'grid',
			} );
		}
	} );
} )();
