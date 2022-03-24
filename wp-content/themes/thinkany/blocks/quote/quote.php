<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;
$className = 'sec sec--quote';

?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="wrapper-quote flex">
            <span class="quote quote-open">“</span>
                <p class="wrapper-quote flex flex-col">
                   <span class="quote-quote" data-aos="zoom-in-up" data-aos-duration="250" data-aos-offset="350"><?= $blockFields['quote']; ?></span>
                   <span class="quote quote-close">”</span>
                   <span class="quote-by signature" data-aos="fade-left" data-aos-duration="250"><?= $blockFields['by']; ?></span>
                </p>
        </div>
    </div>
    <div class="quote-bg" data-aos="move-up" data-aos-duration="1500">
        
    </div>
</section>