// Lazy load BG images
function NHLazy(){

    // document.addEventListener("DOMContentLoaded", function() {
      var lazyloadImages;    
  
      if ("IntersectionObserver" in window) {
  
        const config = {
          rootMargin: '200px 0px 200px 0px',
          threshold: 0  
        };
  
        lazyloadImages = document.querySelectorAll(".lazy");
  
        var imageObserver = new IntersectionObserver(function(entries, observer) {
  
          entries.forEach(function(entry) {
            if (entry.isIntersecting) {
  
              var image = entry.target;
              image.src = image.dataset.src;
              image.classList.remove("lazy");
              imageObserver.unobserve(image);
  
            }
          });
  
        }, config );
  
        lazyloadImages.forEach(function(image) {
          imageObserver.observe(image);
        });
  
      } else { 
  
        var lazyloadThrottleTimeout;
        lazyloadImages = document.querySelectorAll(".lazy");
        init(lazyloadImages);
  

  
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
  
      }
  
  
    // });//event listener
  
  }

  function init(lazyloadImages) {
  
    var scrollTop = window.pageYOffset;
    for ( var i = 0; i < lazyloadImages.length; i++ ) {

      if(lazyloadImages[i].offsetTop < (window.innerHeight + scrollTop + 250)) {
          lazyloadImages[i].src = lazyloadImages[i].dataset.src;
          lazyloadImages[i].classList.remove("lazy");
      }

    }

}

function lazyload () {

  if(lazyloadThrottleTimeout) {
    clearTimeout(lazyloadThrottleTimeout);
  }    

  lazyloadThrottleTimeout = setTimeout(function() {
    var scrollTop = window.pageYOffset;
    // lazyloadImages.forEach(function(img) {
    //     if(img.offsetTop < (window.innerHeight + scrollTop)) {
    //       img.src = img.dataset.src;
    //       img.classList.remove("lazy");
    //     }
    // });
    for ( var i = 0; i < lazyloadImages.length; i++ ) {

      if(lazyloadImages[i].offsetTop < (window.innerHeight + scrollTop + 250)) {
          lazyloadImages[i].src = lazyloadImages[i].dataset.src;
          lazyloadImages[i].classList.remove("lazy");
      }

    }

    if(lazyloadImages.length == 0) { 
      document.removeEventListener("scroll", lazyload);
      window.removeEventListener("resize", lazyload);
      window.removeEventListener("orientationChange", lazyload);
    }

  }, 20);

}
  
  
  
  