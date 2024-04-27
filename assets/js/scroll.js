/**
 * Scrolling body class.
 *
 * This is actually being enqueued inline in `WebManDesign\Zooey\Assets\Scripts::enqueue_inline_scroll()`.
 * Keeping this file (and its minified version) for reference.
 *
 * @package    Zooey
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

( () => {
	'use strict';

	let
		lastScrollTop = window.scrollY,
		ticking       = false;

	function zooeyScroll() {
		const scrolledY = window.scrollY;

		if ( scrolledY < lastScrollTop ) {
			document.body.classList.add( 'has-scrolled-up' );
		} else {
			document.body.classList.remove( 'has-scrolled-up' );
		}

		if ( scrolledY > 1 ) {
			document.body.classList.add( 'has-scrolled' );
		} else {
			document.body.classList.remove( 'has-scrolled' );
			document.body.classList.remove( 'has-scrolled-up' );
		}

		lastScrollTop = scrolledY;
	}

	zooeyScroll();

	window.addEventListener( 'scroll', ( e ) => {
		if ( ! ticking ) {

			window.requestAnimationFrame( () => {
				zooeyScroll();
				ticking = false;
			} );

			ticking = true;
		}
	} );
} )();
