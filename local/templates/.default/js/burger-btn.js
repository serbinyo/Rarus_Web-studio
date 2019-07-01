'use strict';

(function () {
  const burgerBtn = document.querySelectorAll('.burger-btn');
  const menu = document.querySelector('.menu');
  const body = document.querySelector('.body');

  burgerBtn.forEach(function (btn) {
    btn.addEventListener('click', function () {
      menu.classList.toggle('menu--close');
      body.classList.toggle('mobile-menu');
    });
  });
})();
