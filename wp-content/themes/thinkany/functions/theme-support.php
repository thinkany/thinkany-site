<?php
/* Theme Support
////////////////////////////////////////////////////////*/
    // menus
    add_theme_support('menus');
    // alignment
    add_theme_support('full');
    add_theme_support('align-wide');
    // featured images
    add_theme_support('post-thumbnails');

/* Register menus
////////////////////////////////////////////////////////*/

// function register_ta_menu() {
//     register_nav_menu('main-menu', __('Main Menu'));
//     register_nav_menu('footer-menu', __('Footer Menu'));
// }
// add_action('init', 'register_ta_menu');

function register_menu_areas() {
    register_nav_menus(
        array(
            'main-nav' => __( 'Main Nav' ),
            'mobile-nav' => __( 'Mobile Nav' ),
            'footer-col-one' => __( 'Footer Column One' ),
            'footer-col-two' => __( 'Footer Column Two' ),
            'footer-col-three' => __( 'Footer Column Three' )					
        )
     );
}
add_action( 'init', 'register_menu_areas' );

/* UN-Register tags
////////////////////////////////////////////////////////*/
function unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'unregister_tags' );

/* Add extraimage sizes
////////////////////////////////////////////////////////*/
add_image_size('extra-large', 1800, 1800, false);

/* Add/Disable Editor Styles
////////////////////////////////////////////////////////*/
function editor_style_setup() {
    add_theme_support('editor-styles');
    add_editor_style('editor.css');
}
add_action('after_setup_theme', 'editor_style_setup');

/* Add Editor Script
////////////////////////////////////////////////////////*/
function editor_script_setup() {
    wp_enqueue_script('editor-scripts', get_stylesheet_directory_uri() . '/assets/js/_dist/editor.js', array('wp-blocks', 'wp-dom'), filemtime(get_stylesheet_directory() . '/assets/js/_dist/editor.js'), true);
}
add_action('enqueue_block_editor_assets', 'editor_script_setup');

/* Enable SVG support
////////////////////////////////////////////////////////*/
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* Remove Meta Boxes reference - https://codex.wordpress.org/Function_Reference/remove_meta_box
////////////////////////////////////////////////////////*/
function remove_page_meta_boxes() {
    remove_meta_box( 'postimagediv' , 'page' , 'normal' );
    remove_meta_box( 'postimagediv' , 'post' , 'normal' );
    // remove_meta_box( 'pageparentdiv' , 'page' , 'normal' );
    remove_meta_box( 'commentstatusdiv','page', 'normal' );
    //remove_meta_box( 'tagsdiv-type', 'portfolio', 'normal' );
}
add_action( 'admin_menu' , 'remove_page_meta_boxes' );