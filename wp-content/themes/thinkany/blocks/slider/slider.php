<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;
$className = 'sec sec--slider';


if (!empty($blockFields['slider_type'])) {
    $className .= ' ' . $blockFields['slider_type'];
}

?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <?php if ( $blockFields['slider_type'] == 'default' ) : ?>
    <div class="container flex">
    <?php else : //data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0" data-aos-easing="ease-in-cubic" ?>
    <div class="container flex" >
    <?php endif; ?>

        <?php if ( $blockFields['slider_type'] == 'default' ) :  //   data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0" data-aos-easing="ease-in-cubic" ?>
        <div class="wrapper-outer">
            <div class="slider" data-type="parallax" data-depth=".15" data-start="150" data-stop="175"> 
        <?php else : ?>
            <div class="slider">
        <?php endif; ?>

                <?php foreach( $blockFields['slides'] as $slide ) : ?>
                    <div class="slide">
                        <div class="slide-wrapper flex flex-col">
                            <?= $slide['slide_image']['html']; ?>
                            <?php if ( $blockFields['slider_type'] != 'default' ) : ?>
                                <div class="meta flex flex-col">
                                    <?php if ( $slide['slide_title'] ) : ?>
                                    <span class="slide-title"><?= $slide['slide_title']; ?></span>
                                    <?php endif; ?>
                                    <?php if ( $slide['slide_sub_title'] ) : ?>
                                    <span class="slide-sub-title"><?= $slide['slide_sub_title']; ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <?php if ( !empty($blockFields['closing_content']) ) : //data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0" data-aos-easing="ease-in-cubic"?>
                <div class="slide-blurb flex flex-col" data-type="parallax" data-depth=".2" data-start="50" data-stop="195">

                    <?= $blockFields['closing_content']; ?>

                    <?php if ( !empty($blockFields['cta_button_link']) ) : ?>
                        <div class="wrapper-button">
                            <a  href="<?= $blockFields['cta_button_link']['url']; ?>" 
                                target="<?= $blockFields['cta_button_link']['target']; ?>" 
                                class="button btn">
                                <?= $blockFields['cta_button_link']['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>


            <?php if ( $blockFields['slider_type'] == 'default' ) : ?>
            </div>
            <?php endif; ?>
    
        <div class="slider-overlay">
            <div class="slider-content flex flex-col">

                
                <?php if ( $blockFields['slider_type'] == 'default' ) : //data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50" ?>
                <div class="content flex flex-col">
                <?php else : ?>
                <div class="content flex flex-col">
                <?php endif; ?>
                    <div class="rel" data-type="parallax" data-depth=".15" data-start="65" data-stop="0">
                    <?= $blockFields['intro_content']; ?>
                    </div>

                    <div class="arrows flex" data-type="parallax" data-depth=".7" data-start="65" data-stop="0">
                        <div class="arr prev-slick"></div>
                        <div class="arr next-slick"></div>
                    </div>
                    <?php if ( $blockFields['intro_link'] ) : ?>
                        <a class="norm" href="<?= $blockFields['intro_link']['url']; ?>" target="<?= $blockFields['intro_link']['target']; ?>">
                            <?= $blockFields['intro_link']['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>

            </div> 
        </div>

    </div>
    <?php if ($blockFields['slider_type'] == 'fullwidth' ) : //data-aos="move-up" data-aos-duration="1500" data-aos-offset="-500" ?>

        <div class="slider-bg" data-type="parallax" data-depth=".05" data-start="40" data-stop="40" > </div>
        
    <?php endif ?>
</section>