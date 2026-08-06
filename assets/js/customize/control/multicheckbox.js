export default null;
/**
 * Multiple checkboxes.
 *
 * WordPress customizer uses jQuery.
 * @requires  jQuery
 *
 * @since  2.0.0
 */

( ( $ ) => {

	$( wp.customize ).ready( function() {

		const $checkboxes = $( '.customize-control-multicheckbox input[type="checkbox"]' );
		  let $lastOne    = null;

		$checkboxes
			.on( 'change', function() {

				const
					$this   = $( this ),
					$values = $this
						.closest( '.customize-control' )
						.find( 'input[type="checkbox"]:checked' )
							.map( function() {
								return this.value;
							} )
							.get()
							.join( ',' );

				$this
					.closest( '.customize-control' )
					.find( 'input[type="hidden"]' )
						.val( $values )
						.trigger( 'change' );

			} )
			.on( 'click', function( e ) {

				const $currentOne = $( this );

				if ( ! $lastOne ) {
					$lastOne = $currentOne;
					return;
				}

				if ( e.shiftKey ) {

					const
						$start = $checkboxes.index( $currentOne ),
						$end   = $checkboxes.index( $lastOne );

					$checkboxes
						.slice( Math.min( $start, $end ), Math.max( $start, $end ) + 1 )
						.prop( 'checked', $currentOne.prop( 'checked' ) )
						.trigger( 'change' );
				}

				$lastOne = $currentOne;

			} );

	} );

} )( jQuery );
