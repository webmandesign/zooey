export default null;
/**
 * Rich text format: span[aria-hidden="true"].is-aria-hidden
 *
 * @since  2.0.4
 */

const
	{ _x } = wp.i18n,
	slug   = 'zooey/span-aria-hidden',
	title  = _x( 'Hidden for assistive technology', 'Text format label.', 'zooey' );

wp.richText.registerFormatType( slug, {
	title: title,
	tagName: 'span',
	className: 'is-aria-hidden',
	attributes: {
		ariaHidden: 'aria-hidden',
	},
	edit: ( { isActive, onChange, value } ) => React.createElement(
		wp.blockEditor.RichTextToolbarButton,
		{
			// @link  https://github.com/WordPress/gutenberg/blob/trunk/packages/icons/src/library/megaphone.svg
			icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="m15.63 3.6-1.76 3.77L5 9.25h-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5H5l1.86.4a3.75 3.75 0 0 0 2.26 3.9l-1.1 2.37 1.1.5 1.2-2.58.72-1.54.75-1.61.65-1.4 2.11-4.53.8-1.7 1.37-2.95ZM18 6.5l-1.19.25-.79 1.7L18.16 8h.34v6.5h-.34l-4.52-.96-1.92 4.14a3.8 3.8 0 0 0 2.45-2.49h-.02L18 16h2V6.5Zm-4.92 2.57-1.85 3.97-5.73-1.22v-1.14Zm-4.74 4.89 2.24.47-.81 1.76a2.25 2.25 0 0 1-1.43-2.23" /></svg>,
			title: title,
			onClick: () => {
				onChange(
					wp.richText.toggleFormat( value, {
						type: slug,
						attributes: {
							ariaHidden: 'true',
						},
					} )
				)
			},
			isActive: isActive
		}
	)
} );
