<?php
$id = $block['name'] . '-' . $block['id'];
$blockName = str_replace('acf/', '', $block['name']);
$className = 'intro';
$background_color = get_field('background_color');


if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>

<article id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="intro-wrapper" style="background-color:<?= $background_color; ?>">
        <div class="intro-copy">
            <InnerBlocks />
        </div>
    </div>
</article>
