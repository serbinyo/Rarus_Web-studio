'use strict';

(function () {
  const anchorServicesLink = document.querySelector('.anchor-link--services');
  const anchorFeedbackLink = document.querySelectorAll('.anchor-link--feedback');
  const anchorProjectsLink = document.querySelector('.anchor-link--projects');
  const slideBottomBtn = document.querySelector('.lead__anchor');
  const projectBar = document.querySelector('.bar__project');
  const screenSizeValue = 1180;
  let scrollPosition = 0;
  let screenSize = document.documentElement.clientWidth;

  if (screenSize >= screenSizeValue) {
    const optionalScrollToTop = function() {
      projectBar.classList.remove('bar__project--hide');

      $('.body').animatescroll(
        {
          scrollSpeed: 1300,
          easing: 'easeInOutQuint',
        }
      );

      setTimeout(function () {
        scrollPosition = 0;
        document.addEventListener('scroll', listenScrollDirection);
      }, 1300);
    };

    const optionalScrollToBottom = function(place) {
      projectBar.classList.add('bar__project--hide');
      slideBottomBtn.classList.add('hide-js');
      document.querySelector('.lead').style = 'height: 100%;';

      $(place).animatescroll(
        {
          scrollSpeed: 1300,
          easing: 'easeInOutQuint'
        }
      );

      // setTimeout(function () {
      //   scrollPosition = window.pageYOffset;
      //   document.addEventListener('scroll', listenTopScrollDirection);
      // }, 1300);
    };

    const listenTopScrollDirection = function(){
      if (window.pageYOffset < scrollPosition) {
        document.removeEventListener('scroll', listenTopScrollDirection);
        optionalScrollToTop();
      }
    };

    const listenScrollDirection = function(){
      if (window.pageYOffset > scrollPosition) {
        document.removeEventListener('scroll', listenScrollDirection);
        optionalScrollToBottom('.projects', true);
      }
    };

    document.addEventListener('scroll', listenScrollDirection);

    slideBottomBtn.addEventListener('click', function (evt) {
      evt.preventDefault();

      document.removeEventListener('scroll', listenScrollDirection);
      optionalScrollToBottom('.projects', true);
    });

    anchorProjectsLink.addEventListener('click', function (evt) {
      evt.preventDefault();

      document.removeEventListener('scroll', listenScrollDirection);
      optionalScrollToBottom('.projects', true);
    });

    anchorServicesLink.addEventListener('click', function (evt) {
      evt.preventDefault();

      document.removeEventListener('scroll', listenScrollDirection);
      optionalScrollToBottom('.services');
    });

    anchorFeedbackLink.forEach(function (link) {
      link.addEventListener('click', function (evt) {
        evt.preventDefault();

        document.removeEventListener('scroll', listenScrollDirection);
        optionalScrollToBottom('.feedback--contacts');
      });
    });
  }
})();
