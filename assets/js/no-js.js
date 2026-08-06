/**
 * Removing `.no-js` class.
 *
 * This is actually being enqueued inline in `Assets\Scripts::enqueue_inline_no_js_class()`.
 * Keeping this file (and its minified version) for reference.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  2.0.0
 */

( () => {
	'use strict';

	document.querySelectorAll( '.no-js' )
		.forEach( ( item ) => item.classList.remove( 'no-js' ) );
} )();
