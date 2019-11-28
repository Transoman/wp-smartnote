'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  iMask = require('imask'),
  Swiper = require('swiper'),
  fabcybox = require('@fancyapps/fancybox'),
  Rellax = require('rellax');

jQuery(window).on('load', function () {
  let preloader = jQuery('.preloader'),
      loader = preloader.find('.preloader img');
  loader.fadeOut();
  preloader.delay(2500).fadeOut('slow');
  setTimeout(function() {
    jQuery('html').removeClass('loading');
    loader.remove();
    preloader.remove();
  }, 3000);
});

jQuery(document).ready(function($) {
  // Toggle nav menu
  let toggleNav = function () {
    let toggle = $('.nav-toggle');
    let nav = $('.nav');
    let closeNav = $('.nav__close');
    let overlay = $('.nav-overlay');

    toggle.on('click', function (e) {
      e.preventDefault();
      nav.toggleClass('open');
      overlay.toggleClass('is-active');
    });

    closeNav.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      overlay.removeClass('is-active');
    });

    overlay.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      $(this).removeClass('is-active');
    });
  };

  // Modal
  let initModal = function() {
    $('.modal').popup({
      transition: 'all 0.3s',
      scrolllock: true,
      onclose: function() {
        $(this).find('label.error').remove();
        $(this).find('.wpcf7-response-output').hide();
      }
    });
  };

  // Input mask
  let inputMask = function() {
    let phoneInputs = $('input[type="tel"]');
    let maskOptions = {
      mask: '+{7} (000) 000-0000'
    };

    if (phoneInputs) {
      phoneInputs.each(function(i, el) {
        IMask(el, maskOptions);
      });
    }
  };

  // Youtube Video Lazy Load
  function findVideos() {
    var videos = document.querySelectorAll('.video');

    for (var i = 0; i < videos.length; i++) {
      setupVideo(videos[i]);
    }
  }

  function setupVideo(video) {
    var link = video.querySelector('.video__link');
    var button = video.querySelector('.video__button');
    var text = video.querySelector('p');
    var id = parseMediaURL(link);

    video.addEventListener('click', function() {
      if (!this.classList.contains('video--dummy')) {
        var iframe = createIframe(id);

        link.remove();
        button.remove();
        if (text) {
          text.remove();
        }
        video.appendChild(iframe);
      }
    });

    var source = "https://img.youtube.com/vi/"+ id +"/maxresdefault.jpg";

    if (!video.querySelector('.video__media')) {
      var image = new Image();
      image.src = source;
      image.classList.add('video__media');

      image.addEventListener('load', function() {
        link.append( image );
      } (video) );
    }

    link.removeAttribute('href');
    video.classList.add('video--enabled');
  }

  function parseMediaURL(media) {
    var regexp = /^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/;
    var url = media.href;
    var match = url.match(regexp);

    return match[5];
  }

  function createIframe(id) {
    var iframe = document.createElement('iframe');

    iframe.setAttribute('allowfullscreen', '');
    iframe.setAttribute('allow', 'autoplay');
    iframe.setAttribute('src', generateURL(id));
    iframe.classList.add('video__media');

    return iframe;
  }

  function generateURL(id) {
    var query = '?rel=0&showinfo=0&autoplay=1';

    return 'https://www.youtube.com/embed/' + id + query;
  }

  // Slider
  new Swiper('.review-video-slider', {
    spaceBetween: 30,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  let reviewPhotoSlider = new Swiper('.review-photo-slider', {
    slidesPerView: 2,
    spaceBetween: 30,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 3,
      },
      1231: {
        slidesPerView: 4,
      }
    }
  });

  $().fancybox({
    selector: '[data-fancybox="gallery"]',
    hash: false,
    loop: true,
    beforeClose : function(instance) {
      if ($('.review-photo-slider').length) {
        reviewPhotoSlider.slideTo( instance.currIndex);
      }
    }
  });

  // Order
  let order = function() {
    let color = $('.order__color-input:checked').val();
    let colorImage = $('.order__color-input:checked').data('img');
    let size = $('.order__size-input:checked').val();
    let price = $('.order__size-input:checked').data('price');

    $('.order__price-val').text(price);

    createImage(colorImage, color);
    $('.order__img-wrap').addClass('is-enabled');

    $('.order__color-input').change(function() {
      createImage($(this).data('img'), $(this).val());
    });

    $('.order__size-input').change(function() {
      $('.order__price-val').text($(this).data('price'));
    });

    function createImage(source, altName) {
      let image = new Image();
      image.src = source;
      image.alt = 'Блокнот ' + altName;

      image.addEventListener('load', function() {
        $('.order__img-wrap').text('');
        $('.order__img-wrap').append( image );
      } );
    }

    $('.order-modal_open').click(function() {
      let color = $('.order__color-input:checked').val();
      let size = $('.order__size-input:checked').val();

      $('#order-modal').find('input[name=your-color]').val(color);
      $('#order-modal').find('input[name=your-size]').val(size);
    });
  };

  $('a[href*="#"]')
  // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();

          $('nav').removeClass('open');
          $('.nav-overlay').removeClass('is-active');

          let offset = 0;

          if ($(window).width() < 768) {
            offset = $('.header').outerHeight();
          }

          console.log(offset);

          $('html, body').animate({
            scrollTop: target.offset().top - offset
          }, 1000);
        }
      }
    });

  // Fixed header
  let fixedHeader = function(e) {
    let header = $('.header');

    if (e.scrollTop() > 150) {
      header.addClass('fixed');
    }
    else {
      header.removeClass('fixed');
    }
  };

  fixedHeader($(this));

  $(window).scroll(function() {
    fixedHeader($(this));
  });

  // Parallax
  new Rellax('.parallax', {
    center: true
  });



  toggleNav();
  initModal();
  inputMask();
  findVideos();
  order();

  // SVG
  svg4everybody({});
});