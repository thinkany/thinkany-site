var NHHeader = (function() {
	'use strict';

	var _$header;
	var $menuParent;
	var $mainMenuTopLink;
	var $body;
	var $buttons;
	var $header;
	var $heroScroller;
	var $heroScrollerID;
	var $iconMenu;
	var $mobileMenu;
	var $footerSlider;
	var $prevScrollpos = window.pageYOffset;
	var debounce_timer;
	var openMobileNav;
	var $menuTracker;
	var $overlay;
	var isOnScreen;



	function init() {

		$body = $('html, body');
		$header = $('#main-header');
		$menuTracker = $('#header-tracker');
		$heroScroller = $( '#main-content-area section:first-child .scroll-indicator' );
		$heroScrollerID = $( '#main-content-area section:first-child' ).attr('id');

		$buttons = $('.sec .container .btn');

		$iconMenu = $('header .mobile-ham');
		$mobileMenu = $('header #menu-main-nav');
		$overlay = $('.menu-overlay');
		$footerSlider = $('#main-footer .container .wrapper-slider');
		
		
		// if ( AOS && AOS !== undefined ) {

		// 	AOS.init({
		// 		once: false,
		// 		startEvent: 'load' // run backward and forward
		// 	});

		// 	window.addEventListener('load', function() {
		// 		AOS.refresh();
		// 	});

		// }

		var bottom = $heroScroller.offset().top + $heroScroller.outerHeight(true) - 300;
		$menuTracker.css({'top': bottom + 'px'});
		
		events();

	}

	function events() {

		// add supportive span to button elements
		if ( $buttons.length ) {
			$.each($buttons, function(){
				$(this).wrapInner('<span></span>');
			});
		}

		// // Handle flyout nav
		// //
		// $iconMenu.on('click', function(e) {
		// 	e.stopImmediatePropagation();
 
		// 	$body.toggleClass('open');		
		// 	$iconMenu.toggleClass('active');
		// 	$mobileMenu.toggleClass('open');

		// });

		// $overlay.on('click', function(e) {
		// 	$body.toggleClass('open');		
		// 	$iconMenu.toggleClass('active');
		// 	$mobileMenu.toggleClass('open');
		// });

		// $mobileMenu.on('click', function(e){
		// 	if ( $('header').hasClass('scrolled') ) {
		// 		setTimeout(function(){
		// 			$body.toggleClass('open');
		// 			$iconMenu.toggleClass('active');
		// 			$mobileMenu.toggleClass('open');
		// 		},350);
		// 	}
		// });

		// $footerSlider.on('click', function(e) {
		// 	e.stopImmediatePropagation();
		// 	$(this).closest('.container').toggleClass('open');
		// });

		// $heroScroller.on('click', function(e){
		// 	$('html,body').animate( { scrollTop: $(this).parents('section').next().offset().top }, 500); 
		// });

		// var winScrollTop = 0;

		// let observer = new IntersectionObserver(entries => {

		// 	winScrollTop = $(this).scrollTop();	

		// 	if (entries[0].boundingClientRect.y < 0) {
		// 		if( !($header.hasClass('scrolled')) ) {
		// 			$('#main-header').addClass('scrolled');
		// 		}
		// 	} else {
		// 		if( ($header.hasClass('scrolled')) ) {
		// 			$('#main-header').removeClass('scrolled');
		// 		}
		// 	}

		// });

		// observer.observe( document.querySelector("#header-tracker") );


		// $.fn.is_on_screen = function(){    
		// 	var win = $(window);
		// 	var viewport = {
		// 		top : win.scrollTop(),
		// 		left : win.scrollLeft()
		// 	};
		// 	//viewport.right = viewport.left + win.width();
		// 	viewport.bottom = viewport.top + win.height();
		
		// 	var bounds = this.offset();
		// 	//bounds.right = bounds.left + this.outerWidth();
		// 	bounds.bottom = bounds.top + this.outerHeight();
		
		// 	return (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom));
		// };
		
		// function parallax() { 
		// var scrolled = $(window).scrollTop();
		// var winHeight = $(window).height();

		//   $('*[data-type="parallax"]').each(function(){ 
		  
		// 	   if ($(this).is_on_screen()) {

		// 		  var firstTop = $(this).offset().top;
		// 		  var depth = $(this).data('depth');
		// 		  var start = $(this).data('start');
		// 		  var stop  = $(this).data('stop');
		// 		  var scrolling =  ( (scrolled + winHeight) - firstTop );
		// 		  var movement = -(scrolling * (depth)) + start;
				  
		// 		  if ( (movement * -1) <= stop ) {
		// 			var transalte3d = 'translate3d(0, ' + movement + 'px, 0)';
		// 			$(this).css("transform",transalte3d);
		// 		  }

		// 	 }
			 
		//   });

		// }
		
		// $(window).scroll(function(e){
		//   parallax();
		// });
		

	}

	return {
		init:init
	};
}());
