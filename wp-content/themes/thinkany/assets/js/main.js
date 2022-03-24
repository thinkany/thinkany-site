
var taTheme = (function() {

    "use strict";

    var onceInstantiatedModules;
    var $measureLi;
    var $getWidth;
  
    function init($) {

      
      onceInstantiatedModules = ["taTheme", "taHeader"];
  
      taHeader.init();
      init_modules();
      
    }
  
    function init_modules() {
  
      $("body #content-wrapper").addClass("ready");
  
      Object.getOwnPropertyNames(window).forEach(function (name) {
        if (
          name.indexOf("ta") < 0 ||
          onceInstantiatedModules.indexOf(name) > -1 ||
          !window[name].hasOwnProperty("init")
        ) {
          return;
        }
        var _instance = window[name];
  
        _instance.init();
      });
  
      taLazy();
      //expandMenu();
  
      // const iconMenu = document.querySelector(".mobile-ham");
      // const menu = document.querySelector(".mobile-menu");
      // const overlay = document.querySelector(".menu-overlay");
      const main = document.querySelector("#main");
      const foot = document.querySelector("#footer");
  
      // iconMenu.addEventListener('click', function() {
      //     this.classList.toggle('active');
      //     menu.classList.toggle('active');
      //     overlay.classList.toggle('active');
      //     main.classList.toggle('blur');
      //     foot.classList.toggle('blur');
      // });
  
      // $(window).on("orientationchange", function (event) {
      //   location.reload();
      //   AOS.refresh();
      // });


  
      // var svg = document.getElementsByClassName("svg")[0];
      // var bbox = svg.getBBox();
      // var viewBox = [bbox.x, bbox.y, bbox.width, bbox.height].join(" ");
      // svg.setAttribute("viewBox", viewBox);
      // prompt("Copy to clipboard: Ctrl+C, Enter", svg.outerHTML);
  
    } // end init_modules
  
    // function expandMenu() {
    //   $(".site-header__nav ul a .indicator").on("click", function (event) {
    //     event.preventDefault();
  
    //     $("body").toggleClass("open");
  
    //     if ($(this).parent().hasClass("open")) {
    //       $(this).parent().removeClass("open");
    //     } else {
    //       $(this).parent().addClass("open");
    //     }
    //   });
    // }
  
    // function isIE() {
    //   var jscriptVersion = new Function(
    //     "/*@cc_on return @_jscript_version; @*/"
    //   )();
  
    //   return jscriptVersion != undefined ||
    //     (!!window.MSInputMethodContext && !!document.documentMode) ? true : false;
    // }
  
    return {
      init: init,
      init_modules: init_modules,
    };
  })();

// (function($){
  
  $(document).ready( function() {
    taTheme.init();
  });

// });
  