<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;

$className = 'sec sec--full-width-wysiwyg';


if (!empty($blockFields['slider_type'])) {
    $className .= ' ' . $blockFields['slider_type'];
}

?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container flex flex-col<?= ' ' . $blockFields['column_width']; ?>">
        <?= $blockFields['content']; ?>
    </div>
</section>