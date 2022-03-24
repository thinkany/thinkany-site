<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;
$className = 'sec sec--hero';


if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="wrapper-image">
            <?php //THIS IS FOR THE IMAGE TO BE WRAPPED by a div
            // data-type="parallax" data-depth="-.15" data-start="-100" data-stop="175" ?>
            <?= $blockFields['hero_image']['html']; ?>
            <div class="wrapper-meta">
                <p class="image-page-title white"><?= get_the_title($post->ID); ?></p>
                <h1 class="image-title white cal"><?= $blockFields['hero_title_text'] ?></h1>
            </div>
            <div class="overlay"></div>
            <div class="scroll-indicator"></div>
        </div>
    </div>
</section>