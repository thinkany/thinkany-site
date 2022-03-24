<?php
/* Register Custom Blocks
////////////////////////////////////////////////////////*/
function register_acf_block_types()
{

    $block_logo = '<svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22.044" height="27.276" viewBox="0 0 22.044 27.276">
    <defs>
      <clipPath id="clip-path">
        <path id="Path_1825" data-name="Path 1825" d="M0,9.041H22.044V-18.235H0Z" transform="translate(0 18.235)" fill="#633511"/>
      </clipPath>
    </defs>
    <g id="Group_1664" data-name="Group 1664" clip-path="url(#clip-path)">
      <g id="Group_1663" data-name="Group 1663" transform="translate(0 -0.001)">
        <path id="Path_1824" data-name="Path 1824" d="M7.183,8.084a10.962,10.962,0,0,0-8.834-7V-6.2H1.925A1.765,1.765,0,0,0,3.662-7.988a1.765,1.765,0,0,0-1.737-1.79H-1.651v-4.734a1.763,1.763,0,0,0-1.734-1.792A1.765,1.765,0,0,0-5.12-14.513v4.734h-3.74a1.764,1.764,0,0,0-1.734,1.79A1.763,1.763,0,0,0-8.859-6.2h3.74V1.058c-5.777.7-8.1,5.032-9.086,6.932a2.689,2.689,0,0,0-.283,1.189,1.765,1.765,0,0,0,1.735,1.792c.959,0,1.42-.83,1.8-1.716A8.418,8.418,0,0,1-3.467,4.594c5.243,0,7.56,4.992,7.685,5.276l.013.025a1.736,1.736,0,0,0,1.589,1.075A1.765,1.765,0,0,0,7.556,9.179a1.8,1.8,0,0,0-.372-1.095" transform="translate(14.488 16.305)" fill="#633511"/>
      </g>
    </g>
  </svg>';

    acf_register_block_type(
        array(
            'name' => 'intro',
            'title' => __('Intro'),
            'icon' => $block_logo,
            'mode' => 'preview',
            'keywords' => array('intro'),
            'align' => 'full',
            'supports' => array(
                'align' => array('full', 'wide'),
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('intro', get_template_directory_uri() . '/blocks/_dist/intro/intro.css');
            },
            'render_template' => 'blocks/_dist/intro/intro.php',
        )
    );

    acf_register_block_type(
        array(
            'name' => 'video',
            'title' => __('Video Hero'),
            'icon' => ('format-video'),
            'mode' => 'preview',
            'keywords' => array('video', 'videos'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('video', get_template_directory_uri() . '/blocks/_dist/video/video.css');
            },
            'render_template' => 'blocks/_dist/video/video.php',
        )
    );

    acf_register_block_type(
        array(
            'name' => 'hero',
            'title' => __('Image Hero'),
            'icon' => ('format-image'),
            'mode' => 'preview',
            'keywords' => array('hero', 'image'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('hero', get_template_directory_uri() . '/blocks/_dist/hero/hero.css');
            },
            'render_template' => 'blocks/_dist/hero/hero.php',
        )
    );

    acf_register_block_type(
        array(
            'name' => 'image-content',
            'title' => __('Image + Content'),
            'icon' => ('embed-photo'),
            'mode' => 'preview',
            'keywords' => array('image', 'content', 'wysiwyg'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('image-content', get_template_directory_uri() . '/blocks/_dist/image-content/image-content.css');
            },
            'render_template' => 'blocks/_dist/image-content/image-content.php',
        )
    );

    acf_register_block_type(
        array(
            'name' => 'full-width-image',
            'title' => __('Full Width Image'),
            'icon' => ('embed-photo'),
            'mode' => 'preview',
            'keywords' => array('image', 'content', 'wysiwyg'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('full-width-image', get_template_directory_uri() . '/blocks/_dist/full-width-image/full-width-image.css');
                wp_enqueue_script('full-width-image-js', get_template_directory_uri() . '/blocks/_dist/full-width-image/full-width-image.js',  array('new-jq'), filemtime(get_stylesheet_directory() . '/assets/js/_dist/main.js'), true);
            },
            'render_template' => 'blocks/_dist/full-width-image/full-width-image.php',
        )
    );

    acf_register_block_type(
        array(
            'name' => 'quote',
            'title' => __('Bold Quote'),
            'icon' => ('format-quote'),
            'mode' => 'preview',
            'keywords' => array('quote', 'quotes'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('quote', get_template_directory_uri() . '/blocks/_dist/quote/quote.css');
            },
            'render_template' => 'blocks/_dist/quote/quote.php',
        )
    );


    acf_register_block_type(
        array(
            'name' => 'form',
            'title' => __('Form'),
            'icon' => ('feedback'),
            'mode' => 'preview',
            'keywords' => array('form', 'forms', 'contact'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('form', get_template_directory_uri() . '/blocks/_dist/form/form.css');
                wp_enqueue_script('form-js', get_template_directory_uri() . '/blocks/_dist/form/form.js', array('new-jq'), filemtime(get_stylesheet_directory() . '/assets/js/_dist/main.js'), true );
            },
            'render_template' => 'blocks/_dist/form/form.php',
        )
    );

    acf_register_block_type(
        array(
            'name' => 'slider',
            'title' => __('Slider'),
            'icon' => ('images-alt2'),
            'mode' => 'auto',
            'keywords' => array('slider', 'sliders', 'carousel'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('slider', get_template_directory_uri() . '/blocks/_dist/slider/slider.css');
                wp_enqueue_script('slider-js', get_template_directory_uri() . '/blocks/_dist/slider/slider.js',  array('new-jq'), filemtime(get_stylesheet_directory() . '/assets/js/_dist/main.js'), true);
            },
            'render_template' => 'blocks/_dist/slider/slider.php',
        )
    );

    acf_register_block_type(
        array(
            'name' => 'full-width-wysiwyg',
            'title' => __('Full Width WYSIWYG'),
            'icon' => ('images-alt2'),
            // 'mode' => 'preview',
            'keywords' => array('wysiwyg', 'text', 'html'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('full-width-wysiwyg', get_template_directory_uri() . '/blocks/_dist/full-width-wysiwyg/full-width-wysiwyg.css');
            },
            'render_template' => 'blocks/_dist/full-width-wysiwyg/full-width-wysiwyg.php',
        )
    );

    acf_register_block_type(
        array(
            'name' => 'resources',
            'title' => __('Resource Library'),
            'icon' => ('book'),
            'mode' => 'preview',
            'keywords' => array('resource', 'resources', 'library'),
            'align' => 'full',
            'supports' => array(
                'jsx' => true
            ),
            'enqueue_assets' => function () {
                wp_enqueue_style('quote', get_template_directory_uri() . '/blocks/_dist/resources/resources.css');
            },
            'render_template' => 'blocks/_dist/resources/resources.php',
        )
    );

}

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

