wp.domReady(() => {
    wp.blocks.registerBlockStyle('core/paragraph', [
        {
            name: 'default',
            label: 'Default',
            isDefault: true,
        }
    ]);

});