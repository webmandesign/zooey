/**
 * Customize preview scripts.
 *
 * No need for dynamic change of 'blogname' and 'blogdescription' as these are being
 * treated as partial refresh (so there is an edit icon displayed in customizer).
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

/**
 * Theme mods.
 *
 * Customizer scripts use jQuery.
 * @requires  jQuery
 */
( ( $ ) => {
	'use strict';

	wp.customize( 'background_color', ( value ) => {
		value
			.bind( function( to ) {
				$( '#zooey-inline-css' )
					.append(
						'body{'
						+ '--theme--mod--color_base:' + to + ';'
						+ '--wp--preset--color--base--border:rgba(' + zooey.Customize.hexToRgb( to ) + ',var(--wp--custom--opacity--border));'
						+ '}'
					);
			} );
	} );

} )( jQuery );

/**
 * Customizer live preview helper functions.
 *
 * @see  WebManDesign\Zooey\Customize\RGBA::customize_preview()
 */
( ( window ) => {
	'use strict';

	window.zooey = window.zooey || {};

	/**
	 * Theme customizer preview helper functions.
	 *
	 * @since  1.0.0
	 */
	window.zooey.Customize = {

		/**
		 * Convert hex color into RGB array.
		 *
		 * @since  1.0.0
		 */
		hexToRgbArray : function( $hex = '' ) {
			const $rgb = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( $hex );

			return ( $rgb ) ? ( [
				parseInt( $rgb[1], 16 ),
				parseInt( $rgb[2], 16 ),
				parseInt( $rgb[3], 16 )
			] ) : ( [] );
		},

		/**
		 * Convert hex color into RGB string.
		 *
		 * RGB values are separated with comma.
		 *
		 * @since  1.0.0
		 */
		hexToRgb : function( $hex = '' ) {
			return this.hexToRgbArray( $hex ).join();
		}

	}
} )( window );
