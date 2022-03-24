<?php

$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;

$className = 'sec sec--form';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if ( !empty( $blockFields['stack_intro'] ) ) {
    $className .= ' ' . $blockFields['stack_intro'];
}
?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container flex">
        <div class="col wrapper-form-intro wysiwyg">
            <?= $blockFields['form_intro']; ?>
        </div>
        <div class="col wrapper-form">
            <?= $blockFields['form']; ?>

            <div class="wrapper-modal"> 
                <div id="modal-thank-you" class="modal micromodal-slide" aria-hidden="true">
                    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                            <button class="modal__close" aria-label="Close modal" data-micromodal-close> </button>
                            
                            <main class="modal__content" id="modal-1-content">
                                <?= the_field('confirmation_message','options'); ?>
                            </main>
                        </div>
                    </div>
                </div> 
            </div><?php // end modal wrapper ?>

        </div>
    </div>
</section>