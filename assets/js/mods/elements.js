export default null;
/**
 * Modifying block selectors (of `theme.json/styles.elements`).
 *
 * @since  2.0.1
 */

wp.domReady( () => {

	// Adding theme button selectors.
	if (
		undefined !== wp.blocks.__EXPERIMENTAL_ELEMENTS
		&& undefined !== wp.blocks.__EXPERIMENTAL_ELEMENTS.button
	) {

		/**
		 * We can actually replace the default value as we already
		 * have the selector among our button selectors:
		 * - default = ".wp-element-button, .wp-block-button__link".
		 *
		 * @link  https://github.com/WordPress/gutenberg/blob/trunk/packages/blocks/src/api/constants.ts
		 * @see   Customize\Styles::get_selector()
		 * @see   assets/scss/_setup/_selectors.scss
		 */
		wp.blocks.__EXPERIMENTAL_ELEMENTS.button = zooeyMods.selector.button;
	}
} );
