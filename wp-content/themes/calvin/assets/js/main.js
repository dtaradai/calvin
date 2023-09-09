/* ===================================================================
 * Calvin 1.0.0 - Main JS
 *
 * ------------------------------------------------------------------- */

(function ($) {

  "use strict";

  // A $( document ).ready() block.
  $(function () {
    const form = $('#cForm');
    const action = form.attr('action');

    const success = ` <div class="alert-box alert-box--success">
                        <p>Success Message. Your Message Goes Here.</p>
                        <span class="alert-box__close"></span>
                      </div>`;

    const error = `   <div class="alert-box alert-box--error">
                        <p>Error Message. Your Message Goes Here.</p>
                        <span class="alert-box__close"></span>
                      </div>`;

    // Устанавливаем обработчик потери фокуса для всех полей ввода текста
    $('input#name, input#email, textarea#message').unbind().blur(function () {

      // Для удобства записываем обращения к атрибуту и значению каждого поля в переменные
      var id = $(this).attr('id');
      var val = $(this).val();

      // После того, как поле потеряло фокус, перебираем значения id, совпадающие с id данного поля
      switch (id) {
        // Проверка поля "Имя"
        case 'name':
          var rv_name = /^[a-zA-Zа-яА-Я]+$/; // используем регулярное выражение

          // Eсли длина имени больше 2 символов, оно не пустое и удовлетворяет рег. выражению,
          // то добавляем этому полю класс .not_error,
          // и ниже в контейнер для ошибок выводим слово " Принято", т.е. валидация для этого поля пройдена успешно

          if (val.length > 2 && val != '' && rv_name.test(val)) {
            $(this).addClass('not_error');
            $(this).next('.error-box').text('Принято')
              .css('color', 'green')
              .animate({ 'paddingLeft': '10px' }, 400)
              .animate({ 'paddingLeft': '5px' }, 400);
          }

          // Иначе, мы удаляем класс not-error и заменяем его на класс error, говоря о том что поле содержит ошибку валидации,
          // и ниже в наш контейнер выводим сообщение об ошибке и параметры для верной валидации

          else {
            $(this).removeClass('not_error').addClass('error');
            $(this).next('.error-box').html('поле "Имя" обязательно для заполнения<br>, длина имени должна составлять не менее 2 символов<br>, поле должно содержать только русские или латинские буквы')
              .css('color', 'red')
              .animate({ 'paddingLeft': '10px' }, 400)
              .animate({ 'paddingLeft': '5px' }, 400);
          }
          break;

        // Проверка email
        case 'email':
          var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
          if (val != '' && rv_email.test(val)) {
            $(this).addClass('not_error');
            $(this).next('.error-box').text('Принято')
              .css('color', 'green')
              .animate({ 'paddingLeft': '10px' }, 400)
              .animate({ 'paddingLeft': '5px' }, 400);
          }
          else {
            $(this).removeClass('not_error').addClass('error');
            $(this).next('.error-box').html('поле "Email" обязательно для заполнения<br>, поле должно содержать правильный email-адрес<br>')
              .css('color', 'red')
              .animate({ 'paddingLeft': '10px' }, 400)
              .animate({ 'paddingLeft': '5px' }, 400);
          }
          break;


        // Проверка поля "Сообщение"
        case 'message':
          if (val != '' && val.length < 5000) {
            $(this).addClass('not_error');
            $(this).next('.error-box').text('Принято').css('color', 'green')
              .animate({ 'paddingLeft': '10px' }, 400)
              .animate({ 'paddingLeft': '5px' }, 400);
          }
          else {
            $(this).removeClass('not_error').addClass('error');
            $(this).next('.error-box').html('поле "Текст письма" обязательно для заполнения')
              .css('color', 'red')
              .animate({ 'paddingLeft': '10px' }, 400)
              .animate({ 'paddingLeft': '5px' }, 400);
          }
          break;

      } // end switch(...)

    }); // end blur()


    form.on('submit', function (e) {
      e.preventDefault();
      const formData = {
        name: $('#name').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        message: $('#message').val()
      }

      $.ajax({
        url: action,
        type: 'POST',
        data: formData,
        error: function (request, txtstatus, errorThrown) {
          form.html(error);
        },
        success: function () {
          form.html(success);
        }
      });



    })
  });

  const cfg = {
    scrollDuration: 800, // smoothscroll duration
    mailChimpURL: ''   // mailchimp url
  };

  // Add the User Agent to the <html>
  // will be used for IE10/IE11 detection (Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; rv:11.0))
  // const doc = document.documentElement;
  // doc.setAttribute('data-useragent', navigator.userAgent);


  /* Preloader
   * -------------------------------------------------- */
  const ssPreloader = function () {

    const preloader = document.querySelector('#preloader');
    if (!preloader) return;

    document.querySelector('html').classList.add('ss-preload');

    window.addEventListener('load', function () {

      document.querySelector('html').classList.remove('ss-preload');
      document.querySelector('html').classList.add('ss-loaded');

      preloader.addEventListener('transitionend', function (e) {
        if (e.target.matches("#preloader")) {
          this.style.display = 'none';
        }
      });
    });

    // force page scroll position to top at page refresh
    // window.addEventListener('beforeunload' , function () {
    //     window.scrollTo(0, 0);
    // });

  }; // end ssPreloader


  /* Mobile Menu
   * ---------------------------------------------------- */
  const ssMobileMenu = function () {

    const $navWrap = $('.s-header__nav-wrap');
    const $closeNavWrap = $navWrap.find('.s-header__overlay-close');
    const $menuToggle = $('.s-header__toggle-menu');
    const $siteBody = $('body');

    $menuToggle.on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();

      $siteBody.addClass('nav-wrap-is-visible');
    });

    $closeNavWrap.on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();

      if ($siteBody.hasClass('nav-wrap-is-visible')) {
        $siteBody.removeClass('nav-wrap-is-visible');
      }
    });

    // open (or close) submenu items in mobile view menu. 
    // close all the other open submenu items.
    $('.s-header__nav .has-children').children('a').on('click', function (e) {
      e.preventDefault();

      if ($(".close-mobile-menu").is(":visible") == true) {

        $(this).toggleClass('sub-menu-is-open')
          .next('ul')
          .slideToggle(200)
          .end()
          .parent('.has-children')
          .siblings('.has-children')
          .children('a')
          .removeClass('sub-menu-is-open')
          .next('ul')
          .slideUp(200);

      }
    });

  }; // end ssMobileMenu


  /* Search
   * ------------------------------------------------------ */
  const ssSearch = function () {

    const searchWrap = document.querySelector('.s-header__search');
    const searchTrigger = document.querySelector('.s-header__search-trigger');

    if (!(searchWrap && searchTrigger)) return;

    const searchField = searchWrap.querySelector('.s-header__search-field');
    const closeSearch = searchWrap.querySelector('.s-header__overlay-close');
    const siteBody = document.querySelector('body');

    searchTrigger.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();

      siteBody.classList.add('search-is-visible');
      setTimeout(function () {
        searchWrap.querySelector('.s-header__search-field').focus();
      }, 100);
    });

    closeSearch.addEventListener('click', function (e) {
      e.stopPropagation();

      if (siteBody.classList.contains('search-is-visible')) {
        siteBody.classList.remove('search-is-visible');
        setTimeout(function () {
          searchWrap.querySelector('.s-header__search-field').blur();
        }, 100);
      }
    });

    searchWrap.addEventListener('click', function (e) {
      if (!(e.target.matches('.s-header__search-inner'))) {
        closeSearch.dispatchEvent(new Event('click'));
      }
    });

    searchField.addEventListener('click', function (e) {
      e.stopPropagation();
    })

    searchField.setAttribute('placeholder', 'Search for...');
    searchField.setAttribute('autocomplete', 'off');

  }; // end ssSearch


  /* Masonry
   * ------------------------------------------------------ */
  const ssMasonry = function () {
    const containerBricks = document.querySelector('.bricks-wrapper');
    if (!containerBricks) return;

    imagesLoaded(containerBricks, function () {

      const msnry = new Masonry(containerBricks, {
        itemSelector: '.entry',
        columnWidth: '.grid-sizer',
        percentPosition: true,
        resize: true
      });

    });

  }; // end ssMasonry


  /* Slick Slider
   * ------------------------------------------------------ */
  const ssSlickSlider = function () {

    const $animateEl = $('.animate-this');
    const $heroSlider = $('.s-hero__slider');

    $heroSlider.on('init', function (event, slick) {
      setTimeout(function () {
        $animateEl.first().addClass('animated');
      }, 500);
    });

    $heroSlider.slick({
      arrows: false,
      dots: true,
      speed: 1000,
      fade: true,
      cssEase: 'linear',
      autoplay: false,
      autoplaySpeed: 5000,
      pauseOnHover: false
    });

    $heroSlider.on('beforeChange', function (event, slick, currentSlide) {
      $animateEl.removeClass('animated');
    });
    $heroSlider.on('afterChange', function (event, slick, currentSlide) {
      $animateEl.addClass('animated');
    });

    $('.s-hero__arrow-prev').on('click', function () {
      $heroSlider.slick('slickPrev');
    });

    $('.s-hero__arrow-next').on('click', function () {
      $heroSlider.slick('slickNext');
    });

  }; // end ssSlickSlider


  /* Animate on Scroll
   * ------------------------------------------------------ */
  const ssAOS = function () {

    AOS.init({
      offset: 100,
      duration: 800,
      easing: 'ease-in-out',
      delay: 400,
      once: true,
      disable: 'mobile'
    });

  }; // end ssAOS


  /* Alert Boxes
   * ------------------------------------------------------ */
  const ssAlertBoxes = function () {

    const boxes = document.querySelectorAll('.alert-box');

    boxes.forEach(function (box) {

      box.addEventListener('click', function (e) {
        if (e.target.matches(".alert-box__close")) {
          e.stopPropagation();
          e.target.parentElement.classList.add("hideit");

          setTimeout(function () {
            box.style.display = "none";
          }, 500)
        }
      });

    })

  }; // end ssAlertBoxes


  /* Smooth Scrolling
   * ------------------------------------------------------ */
  const ssSmoothScroll = function () {

    $('.smoothscroll').on('click', function (e) {
      const target = this.hash;
      const $target = $(target);

      e.preventDefault();
      e.stopPropagation();

      $('html, body').stop().animate({
        'scrollTop': $target.offset().top
      }, cfg.scrollDuration, 'swing').promise().done(function () {
        window.location.hash = target;
      });
    });

  }; // end ssSmoothScroll


  /* Back to Top
   * ------------------------------------------------------ */
  const ssBackToTop = function () {

    const pxShow = 900;
    const goTopButton = document.querySelector(".ss-go-top");

    if (!goTopButton) return;

    // Show or hide the button
    if (window.scrollY >= pxShow) goTopButton.classList.add("link-is-visible");

    window.addEventListener('scroll', function () {
      if (window.scrollY >= pxShow) {
        if (!goTopButton.classList.contains('link-is-visible')) goTopButton.classList.add("link-is-visible")
      } else {
        goTopButton.classList.remove("link-is-visible")
      }
    });

  }; // end ssBackToTop



  /* initialize
   * ------------------------------------------------------ */
  (function ssInit() {

    ssPreloader();
    ssMobileMenu();
    ssSearch();
    ssMasonry();
    ssSlickSlider();
    ssAOS();
    ssAlertBoxes();
    ssSmoothScroll();
    ssBackToTop();

  })();

})(jQuery);