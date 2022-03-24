<?php
// Embed for use with custom player/design
//
// example in block or template use: $var = setUpoEmbed(get_field['video_url']);
function setUpoEmbed( $iframe ) {
    // Use preg_match to find iframe src.
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];

    // Add extra parameters to src and replcae HTML.
    $params = array(
        'autoplay'  => 1,
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);

    // Add extra attributes to iframe HTML.
    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

    $newIframe = htmlspecialchars($iframe, ENT_QUOTES);

    return $newIframe;
}