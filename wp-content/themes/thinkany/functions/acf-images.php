<?php  
function format_acf_images($value, $post_id, $field) {

    if (isset($value['url'])) {
        $url = parse_url($value['url']);
        $pathInfo = pathinfo($url['path']);
    }

    // add inline svg to image array
    if (isset($pathInfo['extension']) && $pathInfo['extension'] === 'svg') {
        $svg = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $url['path']);
        $value['svg'] = $svg;
    }

    if (isset($value['ID'])) {
        $value['html'] = wp_get_attachment_image($value['ID'], 'original'); 
        $meta = wp_get_attachment_metadata($value['ID']);
        $value['width'] = $meta['width'];
        $value['height'] = $meta['height'];
        $value['orientation'] = ( $meta['width'] > $meta['height'] ) ? ' landscape' : ' portrait';
    }

    return $value;
}
add_filter('acf/format_value/type=image', 'format_acf_images', 100, 3);