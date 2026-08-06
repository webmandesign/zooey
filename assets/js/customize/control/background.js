export default null;
/**
 * Background images.
 *
 * Background image control conditional hiding:
 * ============================================
 * If control with the ID ending with "_image" is found in theme options,
 * we conditionally hide corresponding "_attachment", "_position",
 * "_repeat", "_size" and also "_opacity" controls.
 *
 * WordPress customizer uses jQuery.
 * @requires  jQuery
 *
 * @since  2.0.0
 */

( ( $ ) => {

	$( wp.customize ).ready( function() {

		let backgroundImages = [];

		const customBg = [
			'color',
			'image',
				'preset',
				'position',
				'position_x',
				'position_y',
				'size',
				'repeat',
				'attachment',
		];

		// Add a helper class to Custom Background controls.
		customBg.forEach( ( prop ) => {

			const control = $( '#customize-control-background_' + prop );

			// Add `custom-background-control` class to all controls.
			control.addClass( 'custom-background-control' );

			// Add additional `custom-background-image-control` class to all image-related controls.
			if ( 'color' !== prop ) {
				control.addClass( 'custom-background-image-control' );
			}
		} );

		// Get all image control under theme options.
		$.each( $( '.control-section-theme-options [id$="_image"]' ), function( i, o ) {
			backgroundImages.push( $( o ).attr( 'id' ).replace( 'customize-control-', '' ) );
		} );

		// Hide additional background image controls if no image set.
		$.each( backgroundImages, function( i, settingId ) {
			wp.customize( settingId, function( value ) {

				const
					settingIdBase = settingId.substring( 0, settingId.length - 6 ), // Cut out "_image".
					selectors     = [
						'.control-section-theme-options [id$="' + settingIdBase + '_attachment"]',
						'.control-section-theme-options [id$="' + settingIdBase + '_position"]',
						'.control-section-theme-options [id$="' + settingIdBase + '_repeat"]',
						'.control-section-theme-options [id$="' + settingIdBase + '_size"]',
						'.control-section-theme-options [id$="' + settingIdBase + '_preset"]',
						'.control-section-theme-options [id$="' + settingIdBase + '_opacity"]',
					];

				if ( ! _wpCustomizeSettings.settings[ settingId ].value ) {
					$( selectors.join() )
						.hide();
				}

				value
					.bind( function( to ) {
						if ( ! to ) {
							$( selectors.join() )
								.hide();
						} else {
							$( selectors.join() )
								.show();
						}
					} );

			} );
		} );

	} );

} )( jQuery );
