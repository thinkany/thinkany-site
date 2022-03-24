<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;
$className = 'sec sec--video';


if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// FOR .overlay & video elements
//  data-type="parallax" data-depth="-.1" data-start="-110" data-stop="175"
?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="video-wrapper">
            <h1 class="video-title white abs cal"><?= $blockFields['overlay_title'] ?></h1>
            <p class="video-footer white abs"><?= $blockFields['overlay_footer_copy'] ?></p>
            <div class="overlay" data-type="parallax"></div>
            <video muted loop autoplay disablePictureInPicture playsinline poster="<?= $blockFields['video_poster_image']['url'] ?>">
                <source src="<?= $blockFields['video_file']['url'] ?>" type="video/mp4">
            </video>
            <div class="scroll-indicator"></div>
        </div>
    </div>
</section>