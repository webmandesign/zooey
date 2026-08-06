export default null;
/**
 * Preview screen.
 *
 * WordPress customizer uses jQuery.
 * @requires  jQuery
 *
 * @since  2.0.0
 */

( ( $ ) => {

	$( wp.customize ).ready( function() {

		// Navigate to specific page when a control is focused.
		$( '[data-preview-url], [data-preview-url-control] + li input, [data-preview-url-control] + li select, [data-preview-url-control] + li textarea' )
			.on( 'focusin', function() {

				const $this = $( this );

				let	url = $this.data( 'preview-url' );

				if ( 'string' !== typeof url ) {
					url = $this.closest( 'li' ).prev().data( 'preview-url' );
				}

				if (
					'string' === typeof url
					&& url !== wp.customize.previewer.previewUrl()
				) {
					wp.customize.previewer.previewUrl.set( url );
				}
			} );

	} );

} )( jQuery );
