export default null;
/**
 * Range inputs.
 *
 * WordPress customizer uses jQuery.
 * @requires  jQuery
 *
 * @since  2.0.0
 */

( ( $ ) => {

	$( wp.customize ).ready( function() {

		$( 'input[type="range"]' )
			.wrap( '<div class="range-container" />' )
			.after( '<span class="range-value" />' )
			.on( 'input change', function() {

				const
					$this       = $( this ),
					value       = $this.val() * $this.data( 'multiply' ),
					valuePrefix = $this.data( 'prefix' ),
					valueSuffix = $this.data( 'suffix' );

				let decimals = $this.data( 'decimals' );

				if ( 1 > decimals ) {
					decimals = 1;
				} else {
					decimals = Math.pow( 10, decimals );
				}

				$this
					.next()
						.text( valuePrefix + Math.round( value * decimals ) / decimals + valueSuffix );

			} );

		$( '.range-value' )
			.each( function() {

				const
					$this       = $( this ),
					$inputField = $this.prev(),
					value       = $inputField.val() * $inputField.data( 'multiply' ),
					valuePrefix = $inputField.data( 'prefix' ),
					valueSuffix = $inputField.data( 'suffix' );

				let decimals = $inputField.data( 'decimals' );

				if ( 1 > decimals ) {
					decimals = 1;
				} else {
					decimals = Math.pow( 10, decimals );
				}

				$this
					.text( valuePrefix + Math.round( value * decimals ) / decimals + valueSuffix );

			} );

	} );

} )( jQuery );
