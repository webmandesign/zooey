/**
 * Site Editor modifications.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

( () => {
	'use strict';

	wp.domReady( () => {

		const siteEditor = document.getElementById( 'site-editor' );

		if ( siteEditor ) {

			const { __, _x, sprintf } = wp.i18n;

			/**
			 * Using `MutationObserver` as I don't know of any alternative/proper
			 * approach to modify Styles section currently (202309).
			 *
			 * Inspiration from:
			 * @link  https://github.com/WordPress/gutenberg/issues/32644#issuecomment-1702516697
			 */
			const observer = new MutationObserver( ( mutations ) => {
				mutations.forEach( ( mutation ) => {
					if ( mutation.addedNodes.length ) {
						mutation.addedNodes.forEach( ( node ) => {
							if ( node.querySelector ) {

								// Typography.

									const
										typographySection = node.querySelector( '.edit-site-global-styles-screen-typography' ),
										colorsSection     = node.querySelector( '.edit-site-global-styles-screen-colors' );

									if ( typographySection ) {

										const
											containerTypography = typographySection.parentNode.querySelector( '.edit-site-global-styles-header__description' ),
											paragraphTypography = document.createElement( 'p' );

										paragraphTypography.classList.add( 'edit-site-global-styles-header__description', 'theme-info--customizer' );
										paragraphTypography.innerHTML =
											__( 'Note that this is a very specific, detailed setup.', 'zooey' )
											+ ' '
											+ sprintf(
												_x( 'For more consistent yet flexible typography setup see %s.', '%s: HTML formatted dashboard navigation path.', 'zooey' ),
												'<a href="' + zooeySiteEditor.customizerTypographyURI + '"><strong>'
												+ __( 'Appearance → Customize → Theme Options → Typography', 'zooey' )
												+ '</strong></a>'
											);

										containerTypography.after( paragraphTypography );
									}

								// Colors, gradients, duotones.

									if ( colorsSection ) {

										const
											containerColors = colorsSection.parentNode.querySelector( '.edit-site-global-styles-header__description' ),
											paragraphColors = document.createElement( 'p' );

										paragraphColors.classList.add( 'edit-site-global-styles-header__description', 'theme-info--customizer' );
										paragraphColors.innerHTML =
											sprintf(
												_x( 'Set up automatically generated gradients at %s.', '%s: HTML formatted dashboard navigation path.', 'zooey' ),
												'<a href="' + zooeySiteEditor.customizerGradientsURI + '"><strong>'
												+ __( 'Appearance → Customize → Theme Options → Colors & Background → Gradients', 'zooey' )
												+ '</strong></a>'
											);

										containerColors.after( paragraphColors );
									}
							}
						} );
					}
				} );
			} );

			observer.observe(
				siteEditor,
				{
					childList : true,
					subtree   : true,
				}
			);
		}
	} );
} )();
