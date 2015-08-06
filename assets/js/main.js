( function() {
    drop.init({
    toggleActiveClass: 'is-active',
    contentActiveClass: 'is-active',
    toggleClass: 'menu-item-has-children',
    contentClass: 'sub-menu',
        });
})();

/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */

(function () {
  'use strict';

  var querySelector = document.querySelector.bind(document);

  var navdrawerContainer = querySelector('.menu-primary');
  var body = document.body;
  var menuBtn = querySelector('.menu-toggle');
  var navdrawerOverlay = querySelector('.layout__obfuscator');

  function closeMenu() {
    body.classList.remove('is-visible');
    navdrawerOverlay.classList.remove('is-visible');
    navdrawerContainer.classList.remove('is-visible');
  }

  function toggleMenu() {
    body.classList.toggle('is-visible');
    navdrawerOverlay.classList.toggle('is-visible');
    navdrawerContainer.classList.toggle('is-visible');
  }

  navdrawerOverlay.addEventListener('click', closeMenu);
  menuBtn.addEventListener('click', toggleMenu);
  // navdrawerContainer.addEventListener('click', function (event) {
  //   if (event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
  //     closeMenu();
  //   }
  // });
})();







// grab an element
var headerBar = document.querySelector(".site-header");
// construct an instance of Headroom, passing the element
var headroom  = new Headroom(headerBar, {
    // vertical offset in px before element is first unpinned
    offset : 60,
    // scroll tolerance in px before state changes
    //tolerance : 0,
    // or you can specify tolerance individually for up/down scroll
    tolerance : {
        up : 5,
        down : 40
    },
    // css classes to apply
    classes : {
        // when element is initialised
        initial : "header",
        // when scrolling up
        pinned : "header--pinned",
        // when scrolling down
        unpinned : "header--unpinned",
        // when above offset
        top : "header--top",
        // when below offset
        notTop : "header--not-top"
    },
});
headroom.init();
