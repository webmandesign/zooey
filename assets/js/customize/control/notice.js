export default null;
/**
 * Notices.
 *
 * WordPress customizer uses jQuery.
 * @requires  jQuery
 *
 * @since  2.0.0
 */

( ( $ ) => {

	$( wp.customize ).ready( function() {

		// Site Editor notice.
		wp.customize( 'layout_site_editing', function( value ) {

			value
				.bind( function( to ) {

					const
						wpNoticeContainer  = $( '#customize-notifications-area' ),
						wpSiteEditorNotice = wpNoticeContainer.find( '[data-code="site_editor_block_theme_notice"]' );

					if ( ! to ) {
						wpSiteEditorNotice.hide();
					} else {
						wpSiteEditorNotice.show();
					}

					$( '.wp-full-overlay-sidebar-content' )
						.css(
							'top',
							2 + wpNoticeContainer.height() + $( '#customize-header-actions' ).height()
						);
				} );
		} );

	} );

} )( jQuery );
