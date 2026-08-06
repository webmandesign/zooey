export default null;
/**
 * Block styles modifications.
 *
 * @since  2.0.0
 */

// We don't need some core block styles.
wp.domReady( () => {

	wp.blocks.unregisterBlockStyle(
		'core/button',
		[
			'fill',
		]
	);

	wp.blocks.unregisterBlockStyle(
		'core/quote',
		[
			'default',
			'large',
			'plain',
		]
	);

	wp.blocks.unregisterBlockStyle(
		'core/separator',
		[
			'wide',
		]
	);
} );
