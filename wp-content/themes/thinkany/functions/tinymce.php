<?php
// Callback function to insert 'styleselect' into the $buttons array
function tiny_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'tiny_mce_buttons_2');

// Callback function to filter the MCE settings
function tiny_mce_before_init_insert_formats( $init_array ) {  
    // Define the style_formats array
    $style_formats = array(  
        // Each array child is a format with it's own settings
        array(  
            'title' => 'Faux H1',  
            'selector' => 'p',  
            'classes' => 'h1'             
        ),
        array(  
            'title' => 'Small Link',  
            'selector' => 'a',  
            'classes' => 'norm'             
        ),
        array(  
            'title' => 'Download Button',  
            'selector' => 'a',  
            'classes' => 'button download'             
        ),
        array(  
            'title' => 'General Heading',  
            'selector' => 'p',  
            'classes' => 'header'             
        ),      
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  

    return $init_array;  

} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'tiny_mce_before_init_insert_formats' );