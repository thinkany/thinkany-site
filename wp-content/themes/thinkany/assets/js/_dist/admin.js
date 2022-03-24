"use strict";

(function ($) {
  acf.add_filter('color_picker_args', function (args, $field) {
    args.palettes = ['#a85623', '#b4915a', '#633511', '#c78c67', '#253746', '#707070', '#9facab', '#7e7f74', '#f8efd6', '#F5F5F3', '#333333'];
    return args;
  });
})(jQuery);