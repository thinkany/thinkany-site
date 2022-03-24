<?php
// ACF Get Menu
//
function acf_wp_nav_menu_objects( $items, $args ) {
		
    // loop
    foreach( $items as &$item ) {

        // vars
        $icon = get_field('icon', $item);
        $m_icon = get_field('mobile_image', $item);
        
        // append icon
        if( $icon ) {
            array_push($item->classes, 'image-link');
            $item->title = '<span class="text">'.$item->title.'</span>';

            if( $icon['subtype'] != 'svg' && $icon['subtype'] != 'svg+xml' ) :
                $item->title .= '<span class="img"><img src="'.$icon['url'].'" /></span>';
            else :
                $item->title .= '<span class="img">'.file_get_contents($icon['url']).'</span>';
            endif;  
        }

        if ($m_icon) {
            if ( $m_icon && $m_icon['subtype'] != 'svg' && $m_icon['subtype'] != 'svg+xml' ) :
                $item->title .= '<span class="img-mobile"><img src="'.$m_icon['url'].'" /></span>';
            else :
                $item->title .= '<span class="img">'.file_get_contents($m_icon['url']).'</span>';
            endif;
        }
        
    }
    // return
    return $items;
    
}
add_filter('wp_nav_menu_objects', 'acf_wp_nav_menu_objects', 10, 2);

// Add specific classes to Anchor Tags based on ACF field data.
//
function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
        //
        if( get_field('is_button', $item->ID) ) :
            array_push($atts['class'], 'button');
        endif;
    } elseif ( get_field('is_button', $item->ID) ) {
        $atts['class'] = 'button';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );