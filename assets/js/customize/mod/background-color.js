export default null;
/**
 * Theme mod: background_color.
 *
 * No need for dynamic change of 'blogname'
 * and 'blogdescription' as these are being
 * treated as partial refresh (so there is
 * an edit icon displayed in customizer).
 *
 * WordPress customizer uses jQuery.
 * @requires  jQuery
 *
 * @since  2.0.0
 */

( ( $ ) => {

	wp.customize( 'background_color', ( value ) => {
		value
			.bind( ( to ) => {

				$( '#ileana-inline-css' )
					.append(
						ileanaCustomizePreview.cssVarRoot + '{'
						+ '--wp--preset--color--base:' + to + ';'
						+ '}'
					);

			} );
	} );

} )( jQuery );
