/**
 * Customizer custom controls scripts.
 *
 * WordPress customizer uses jQuery.
 * @requires  jQuery
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

( ( $ ) => {
	'use strict';

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

		// Range inputs.

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

		// Background images.

			/**
			 * Background image control conditional hiding:
			 * ============================================
			 * If control with the ID ending with "_image" is found in theme options,
			 * we conditionally hide corresponding "_attachment", "_position",
			 * "_repeat", "_size" and also "_opacity" controls.
			 */

			let backgroundImages = [];

			// Get all image control under theme options.
			$.each( $( '.control-section-theme-options [id$="_image"]' ), function( i, o ) {
				backgroundImages.push( $( o ).attr( 'id' ).replace( 'customize-control-', '' ) );
			} );

			// Hide additional background image controls if no image set.
			$.each( backgroundImages, function( i, settingId ) {
				wp.customize( settingId, function( value ) {

					const selectors = [
						'[id$="' + settingId + '_attachment"]',
						'[id$="' + settingId + '_opacity"]',
						'[id$="' + settingId + '_position"]',
						'[id$="' + settingId + '_repeat"]',
						'[id$="' + settingId + '_size"]',
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

		// Multiple checkboxes.

			$( '.customize-control-multicheckbox' )
				.on( 'change', 'input[type="checkbox"]', function() {

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

				} );

	} );
} )( jQuery );
