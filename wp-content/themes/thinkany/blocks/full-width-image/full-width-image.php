<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;
$className = 'sec sec--full-width-image';

// data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">

?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <div class="wrapper-content flex flex-col flex-jc-c">
            <div class="wrapper-icon" data-type="parallax" data-depth=".5" data-start="50" data-stop="350">
                <?= $blockFields['icon']['html']; ?>
            </div>
            <div class="wrapper-wysiwyg"  data-type="parallax" data-depth=".45" data-start="75" data-stop="245">
                <?= $blockFields['content']; ?>
            </div>
        </div>

        <div class="wrapper-image" >
            <?= $blockFields['image']['html']; ?>
        </div>

    </div>
</section>

