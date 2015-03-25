/**
 * Cross-Browser SkipLinks
 * Ensure a11y skip links work on all browsers.
 *
 * Copyright (c) 2015 Flagship Software, LLC;
 * MIT license
 */
( function() {
	'use strict';

	var focusElement = null,
		userAgent = navigator.userAgent.toLowerCase(),
		isWebkit  = userAgent.indexOf( 'webkit' ) > -1,
		isOpera   = userAgent.indexOf( 'opera' )  > -1,
		isIe      = userAgent.indexOf( 'msie' )   > -1;

	// Bail if we're not on a browser that needs to be fixed.
	if ( ! isWebkit && ! isOpera && ! isIe ) {
		return;
	}

	focusElement = function() {
		var id = location.hash.substring( 1 ), element;

		if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
			return;
		}

		element = document.getElementById( id );

		if ( element ) {
			if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
				element.tabIndex = -1;
			}

			element.focus();
		}
	};

	if ( document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', focusElement, false );
	}
}() );
