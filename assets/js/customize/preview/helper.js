export default null;
/**
 * Customizer live preview helper functions.
 *
 * @see  Customize\RGBA::customize_preview()
 *
 * @since  2.0.0
 */

( () => {

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
		hexToRgbArray : ( $hex = '' ) => {
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
		 * @since    1.0.0
		 * @version  2.0.0
		 */
		hexToRgb : ( $hex = '' ) => {
			return zooey.Customize.hexToRgbArray( $hex ).join();
		},
	}
} )();
