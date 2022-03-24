"use strict";

var NHForm = function () {
  'use strict';

  var wpcf7Elm = document.querySelector('.wpcf7-form');

  function init() {
    events();
  }

  function events() {
    MicroModal.init({
      disableFocus: true,
      awaitCloseAnimation: true,
      onClose: function onClose(modal, element, event) {
        event.preventDefault();
        event.stopPropagation();
      }
    });
    wpcf7Elm.addEventListener('wpcf7mailsent', function (event) {
      MicroModal.show('modal-thank-you'); // Need to make this dynamic most likely
    }, false); // Remove the error message from corrected fields

    $('.wpcf7-form').on('focusout', '.wpcf7-form-control', function () {
      if ($(this).val()) {
        $(this).parent().siblings('label').addClass('value');
      } else {
        $(this).parent().siblings('label').removeClass('value');
      }

      if ($('.wpcf7-not-valid-tip', $(this).parent()).length && $(this).val() != '') {
        $('.wpcf7-not-valid-tip', $(this).parent()).remove();
      }
    });
  }

  return {
    init: init
  };
}();