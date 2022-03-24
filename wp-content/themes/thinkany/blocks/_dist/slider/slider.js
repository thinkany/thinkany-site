"use strict";

var NHSlider = function ($) {
  'use strict';

  var $slider = $('.sec--slider.default .slider');
  var $prev = $('.sec--slider.default .prev-slick');
  var $next = $('.sec--slider.default .next-slick');
  var $sliderF = $('.sec--slider.fullwidth .slider');
  var $prevF = $('.sec--slider.fullwidth .prev-slick');
  var $nextF = $('.sec--slider.fullwidth .next-slick'); // Initialize dynamic block preview (editor).

  if (window.acf) {
    console.log('acf found..');
    window.acf.addAction('render_block_preview/type=slider', events());
  }

  function init() {
    events();
  }

  function events() {
    if ($slider.length) {
      $slider.slick({
        fade: true,
        // slidesToShow: 1,
        // slidesToScroll: 1,
        variableWidth: false,
        prevArrow: $prev,
        nextArrow: $next
      });
    } // Full width Slider


    if ($sliderF.length) {
      $sliderF.slick({
        centerMode: true,
        centerPadding: '35px',
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        prevArrow: $prevF,
        nextArrow: $nextF
      });
    }
  }

  return {
    init: init
  };
}(jQuery);