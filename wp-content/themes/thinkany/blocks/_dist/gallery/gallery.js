"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var minColWidth = 560;
var roots;
var $filter;

function onLoad() {
  var w = window.innerWidth;

  if (w <= 1023) {
    minColWidth = 190;
  }

  var rootElements = document.getElementsByClassName('container-masonry');
  roots = Array.prototype.map.call(rootElements, function (rootElement) {
    var cellElements = rootElement.getElementsByClassName('wrapper-gallery-item');
    var cells = Array.prototype.map.call(cellElements, function (cellElement) {
      var style = getComputedStyle(cellElement);
      return {
        'element': cellElement,
        'outerHeight': parseInt(style.marginTop) + cellElement.offsetHeight + parseInt(style.marginBottom)
      };
    });
    return {
      'element': rootElement,
      'noOfColumns': 0,
      'cells': cells
    };
  }); // do the first layout

  onResize();
}

function onResize() {
  var _iterator = _createForOfIteratorHelper(roots),
      _step;

  try {
    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      var root = _step.value;
      // only layout when the number of columns has changed
      var newNoOfColumns = Math.floor(root.element.offsetWidth / minColWidth);

      if (newNoOfColumns != root.noOfColumns) {
        // initialize
        root.noOfColumns = newNoOfColumns;
        var columns = Array.from(new Array(root.noOfColumns)).map(function (column) {
          return {
            'cells': new Array(),
            'outerHeight': 0
          };
        }); // divide...

        var _iterator2 = _createForOfIteratorHelper(root.cells),
            _step2;

        try {
          for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
            var cell = _step2.value;
            var minOuterHeight = Math.min.apply(Math, _toConsumableArray(columns.map(function (column) {
              return column.outerHeight;
            })));
            var column = columns.find(function (column) {
              return column.outerHeight == minOuterHeight;
            });
            column.cells.push(cell);
            column.outerHeight += cell.outerHeight;
          } // calculate masonry height

        } catch (err) {
          _iterator2.e(err);
        } finally {
          _iterator2.f();
        }

        var masonryHeight = Math.max.apply(Math, _toConsumableArray(columns.map(function (column) {
          return column.outerHeight;
        }))); // ...and conquer

        var order = 1;

        var _iterator3 = _createForOfIteratorHelper(columns),
            _step3;

        try {
          for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
            var _column = _step3.value;

            var _iterator4 = _createForOfIteratorHelper(_column.cells),
                _step4;

            try {
              for (_iterator4.s(); !(_step4 = _iterator4.n()).done;) {
                var _cell = _step4.value;
                _cell.element.style.order = order++; // set the cell's flex-basis to 0

                _cell.element.style.flexBasis = 0;
              } // set flex-basis of the last cell to fill the
              // leftover space at the bottom of the column
              // to prevent the first cell of the next column
              // to be rendered at the bottom of this column

            } catch (err) {
              _iterator4.e(err);
            } finally {
              _iterator4.f();
            }

            _column.cells[_column.cells.length - 1].element.style.flexBasis = _column.cells[_column.cells.length - 1].element.offsetHeight + masonryHeight - _column.outerHeight - 1 + 'px';
          } // set the masonry height to trigger
          // re-rendering of all cells over columns
          // one pixel more than the tallest column

        } catch (err) {
          _iterator3.e(err);
        } finally {
          _iterator3.f();
        }

        root.element.style.maxHeight = masonryHeight + 1 + 'px'; // console.log(columns.map( function(column) {
        //   return column.outerHeight;
        // }));
        //console.log(root.element.style.maxHeight);
      }
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }
} // subscribe to load and resize events


window.addEventListener('load', onLoad);
window.addEventListener('resize', onResize); // Hanlde Filter 

var $filter = $('.container-filter a'); // Handle Load More

var $loadMore = $('.wrapper-button-float .button');
$filter.on('click', function (e) {
  // housekeeping
  e.preventDefault();
  e.stopPropagation(); // handle style change

  $filter.removeClass('active');
  $(this).addClass('active'); // setup for passing filter type and adjust load more button

  var $fType = $(this).data('filter-id');
  $loadMore.attr('data-type', $fType);
  var $shown = $('.container-masonry .wrapper-gallery-item'); // Hide ALL items prior to processing new filter selection

  $shown.each(function () {
    $(this).addClass('wrapper-gallery-item-hide').removeClass('wrapper-gallery-item');
  }); // reveal filtered items only

  showGalleryItems($fType, true);
});
$loadMore.on('click', function (e) {
  // housekeeping
  e.preventDefault();
  e.stopPropagation();
  var $t = $(this).attr('data-type');
  console.log($t);
  showGalleryItems($t, false);
});

function showGalleryItems($type, $filter) {
  // setup for keeping scroll position
  var position = $('.wrapper-button').offset();
  position = window.pageYOffset || document.documentElement.scrollTop; // local vars for incremental reveal of items  

  var $hidden = $('.container-masonry .wrapper-gallery-item-hide');
  var $curCount = $('.wrapper-button #current-count').data('count');
  var $totalCount = $('.wrapper-button #total-count').data('count');

  if ($type != 'all') {
    // get type based on filter
    var $showType = $hidden.filter('[data-filter="' + $type + '"]');
    var $showTypeShown = $('.container-masonry .wrapper-gallery-item').filter('[data-filter="' + $type + '"]');
    $hidden = $showType;
    $totalCount = $showType.find('img').length + $showTypeShown.find('img').length;
    $('.wrapper-button #total-count').text($totalCount); // start count over

    if ($filter) {
      $curCount = 0;
    }
  } else {
    $('.wrapper-button #total-count').text($totalCount);
  }

  $hidden.each(function (i, elem) {
    var $total = $hidden.length;
    var $numItems = $loadMore.data('count');
    var $step;

    if (i <= $numItems && i !== $total - 1) {
      $(this).addClass('wrapper-gallery-item').removeClass('wrapper-gallery-item-hide');
      $loadMore.removeClass('hide');
    } else if (i <= $numItems && i === $total - 1) {
      $(this).addClass('wrapper-gallery-item').removeClass('wrapper-gallery-item-hide');
      var $shown = $('.container-masonry .wrapper-gallery-item img');
      $step = $curCount + $numItems;
      onLoad();
      $('.wrapper-button #current-count').data('count', $step);
      $('.wrapper-button #current-count').text($shown.length);
      $loadMore.addClass('hide');
      AOS.refresh();
      setTimeout(function () {
        window.scrollTo({
          top: position,
          behavior: 'smooth'
        });
      }, 200);
      return false;
    } else {
      $loadMore.removeClass('hide');
      $step = $curCount + $numItems;
      onLoad();
      $('.wrapper-button #current-count').data('count', $step);
      $('.wrapper-button #current-count').text($step);
      AOS.refresh();
      setTimeout(function () {
        window.scrollTo({
          top: position,
          behavior: 'smooth'
        });
      }, 200);
      return false;
    }
  });
}

function autoScroll(e, obj) {
  // var h = $('#lightbox .lb-outerContainer .lb-container').height()+100;
  // var offset = obj.offset();
  // var position = (e.pageY-offset.top)/obj.height();
  // // console.log("h: " + h);
  // // console.log('Percentage:' + ((e.pageY-offset.top)/$(this).height()).toFixed(2));
  // if(position<0.33) {
  //     //var transformPos = 'translate3d(0,'+ e.pageY - offset.top + 'px, 0)';
  //     $('.lb-container').stop().animate({ scrollTop: 0 }, 2000);
  // } else if(position>0.66) {
  //     $('.lb-container').stop().animate({ scrollTop: h }, 2000);
  // } else {
  //     $('.lb-container').stop();
  // }
  var h = $('#lightbox .lb-container').height() + 13;
  var offset = $($(obj)).offset();
  var position = (e.pageY - offset.top) / $(obj).height(); //$(".status").html('Percentage:' + ((e.pageY-offset.top)/$(obj).height()).toFixed(2));

  if (position < 0.33) {
    $(obj).stop().animate({
      scrollTop: 0
    }, 2500);
  } else if (position > 0.66) {
    $(obj).stop().animate({
      scrollTop: h
    }, 2500);
  } else {
    $(obj).stop();
  }
} // function scroll(amount) {
//   $('#lightbox .lb-outerContainer').animate({
//     scrollTop: amount
//   }, 100, 'linear', function() {
//     if (amount != '') {
//       scroll();
//     }
//   });
// }
// Setup isScrolling variable
// var isScrolling;
// // Listen for scroll events
// window.addEventListener('scroll', function ( event ) {
// 	// Clear our timeout throughout the scroll
// 	window.clearTimeout( isScrolling );
// 	// Set a timeout to run after scrolling ends
// 	isScrolling = setTimeout(function() {
// 		// Run the callback
//     //$('.wrapper-gallery-item').addClass('item');
// 	}, 66);
// }, false);