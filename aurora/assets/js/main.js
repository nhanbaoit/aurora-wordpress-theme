/**
 * Aurora theme scripts: mobile navigation toggle + sticky header state.
 * No dependencies, vanilla JS only.
 */
( function () {
	'use strict';

	var toggle = document.querySelector( '[data-nav-toggle]' );
	var nav = document.querySelector( '[data-nav]' );
	var header = document.querySelector( '[data-header]' );

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			var open = nav.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		} );

		document.addEventListener( 'keydown', function ( event ) {
			if ( 'Escape' === event.key && nav.classList.contains( 'is-open' ) ) {
				nav.classList.remove( 'is-open' );
				toggle.setAttribute( 'aria-expanded', 'false' );
				toggle.focus();
			}
		} );

		// Close the menu when resizing up to desktop widths.
		window.matchMedia( '(min-width: 769px)' ).addEventListener( 'change', function ( event ) {
			if ( event.matches ) {
				nav.classList.remove( 'is-open' );
				toggle.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	}

	if ( header ) {
		var onScroll = function () {
			header.classList.toggle( 'is-scrolled', window.scrollY > 8 );
		};
		onScroll();
		window.addEventListener( 'scroll', onScroll, { passive: true } );
	}
} )();
