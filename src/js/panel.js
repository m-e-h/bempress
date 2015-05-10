(function () {
  'use strict';

  var querySelector = document.querySelector.bind(document);

  var schoolsNav = querySelector('#schools-toggle-nav');
  var parishNav = querySelector('#parishes-toggle-nav');
  var dpcNav = querySelector('#dpc-toggle-nav');
  var parishToggle = querySelector('#parish-toggle');
  var dpcToggle = querySelector('#dpc-toggle');
  var schoolsToggle = querySelector('#schools-toggle');
  var menuPrimary = querySelector('.menu-primary');
  var main = querySelector('.site-container');
  var closeButton = querySelector('.panel-close');
  var closeButtonTwo = querySelector('.panel-close2');
  var closeButtonThree = querySelector('.panel-close3');

  function closePanel() {
    schoolsNav.classList.remove('panel-open');
    dpcNav.classList.remove('panel-open');
    parishNav.classList.remove('panel-open');
  }

  function schoolsTogglePanel() {
    dpcNav.classList.remove('panel-open');
    parishNav.classList.remove('panel-open');
    schoolsNav.classList.toggle('panel-open');
  }

  function dpcTogglePanel() {
    schoolsNav.classList.remove('panel-open');
    parishNav.classList.remove('panel-open');
    dpcNav.classList.toggle('panel-open');
  }

  function parishTogglePanel() {
    schoolsNav.classList.remove('panel-open');
    dpcNav.classList.remove('panel-open');
    parishNav.classList.toggle('panel-open');
  }

  menuPrimary.addEventListener('click', closePanel);
  main.addEventListener('click', closePanel);
  closeButton.addEventListener('click', closePanel);
  closeButtonTwo.addEventListener('click', closePanel);
  closeButtonThree.addEventListener('click', closePanel);
  schoolsToggle.addEventListener('click', schoolsTogglePanel);
  parishToggle.addEventListener('click', parishTogglePanel);
  dpcToggle.addEventListener('click', dpcTogglePanel);
})();
