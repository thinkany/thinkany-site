"use strict";

wp.domReady(function () {
  wp.blocks.registerBlockStyle('core/paragraph', [{
    name: 'default',
    label: 'Default',
    isDefault: true
  }]);
});