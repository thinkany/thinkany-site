<?php
/* Enqueue Scripts and Styles
////////////////////////////////////////////////////////*/

function site_assets() {
    //wp_register_script('gsap', get_template_directory_uri() . '/assets/js/vendor/gsap.min.js', '', '', true);

    //wp_register_style('tabs', get_stylesheet_directory_uri() . '/assets/css/vendor/skeletabs.css');
    //wp_register_style('slick', get_stylesheet_directory_uri() . '/assets/css/vendor/slick.min.css');
    //wp_register_style('mapbox', 'https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css');

    if ( !is_admin() ) {

        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        // Guetenberg
        wp_dequeue_style( 'global-styles' );


        wp_deregister_script( 'jquery' );
        
        wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/_dist/styles.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/_dist/styles.css'), false);

        wp_register_script('new-jq', get_template_directory_uri() . '/assets/js/_dist/jquery-3.6.min.js',false,false,true);
        wp_enqueue_script('new-jq');
    
        wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/_dist/'.SITE_NAME.'.min.js', array('new-jq'), filemtime(get_stylesheet_directory() . '/assets/js/_dist/'.SITE_NAME.'.min.js'), true);

    } else {
        $cs = get_current_screen();
        if ( ( $cs->post_type == 'post' || $cs->post_type == 'page' ) && !empty($_GET['post']) ) :
            wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/_dist/styles.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/_dist/styles.css'), false);
            wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/_dist/'.SITE_NAME.'.min.js', array('new-jq'), filemtime(get_stylesheet_directory() . '/assets/js/_dist/'.SITE_NAME.'.min.js'), true);
        endif;
    }
}
add_action('wp_enqueue_scripts', 'site_assets');
//add_action('admin_enqueue_scripts', 'site_assets');