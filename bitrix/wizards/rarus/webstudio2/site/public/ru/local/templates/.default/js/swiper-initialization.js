'use strict';

(function () {
  const containerWidth = document.querySelector('.projects__card-list').offsetWidth;
  let contentWidth = 0;

  document.querySelectorAll('.projects__tab-item').forEach(function (element) {
    contentWidth += element.offsetWidth;
  });

  if (containerWidth < contentWidth) {
    const swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      freeMode: true,
    });
  }
})();
