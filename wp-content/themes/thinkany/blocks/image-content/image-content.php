<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;
$className = 'sec sec--image-content';



if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($blockFields['align'])) {
    $className .= ' align-' . $blockFields['align'];
    
    if ($blockFields['align'] == 'right' && !($blockFields['show_stats'])) {
        $className .= ' default';
    }
}
?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container flex parallax">
        <div class="col wrapper-image preserve">
            <div class="parallax-section">
            <?= $blockFields['image']['html']; ?>
            </div>
        </div>
        <!--  data-aos="fade-up" data-aos-duration="500" data-aos-offset="0" -->
        <div class="col wrapper-wysiwyg">
            <div class="wrapper-content">
                
                <?php if (!($blockFields['stats'])) : ?>
                <div class="rel" data-type="parallax" data-depth=".15" data-start="75" data-stop="175">
                <?php else : ?>
                    <div class="rel sm" data-type="parallax" data-depth=".25" data-start="150" data-stop="225">
                <?php endif; ?>
                <?= $blockFields['content']; ?>
                    <?php if ( $blockFields['table'] ) : ?>
                        <div class="table">
                            <?php foreach( $blockFields['table'] as $row ) : ?>
                                <div class="tr flex flex-jc-sb">
                                    <span><?= $row['left_column']; ?></span>
                                    <span><?= $row['right_column']; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( $blockFields['download_button'] ) : ?>
                        <a href="<?= $blockFields['download_button']['url']; ?>" class="button download" download>Download</a>
                    <?php endif; ?>
                </div>
                <?php 
                    if ($blockFields['stats']) :  
                    echo '<div class="stats flex flex-wrap" data-type="parallax" data-depth=".25" data-start="100" data-stop="300">';
                    $i = 0;

                    foreach($blockFields['stats'] as $stat) : 
                        echo '<div class="stat flex flex-col flex-jc-c flex-ai-c" data-aos="fade-up" data-aos-duration="500" data-aos-delay="'.($i).'">';
                        echo '<span class="large cal" data-aos="fade-right" data-aos-duration="250" data-aos-delay="'.($i + 5).'">'.$stat['large_text'].'</span>';
                        echo '<span class="small" data-aos="fade-left" data-aos-duration="250" data-aos-delay="'.($i + 10).'">'.$stat['supportive_blurb'].'</span></div>';
                        $i = $i + 20;
                    endforeach;
                    
                    echo '</div>'; 
                    endif;
                    
                    if ( $blockFields['closing_link'] ) :
                        echo '<a class="norm" href="'.$blockFields['closing_link']['url'].'" target="'.$blockFields['closing_link']['target'].'">';
                        echo $blockFields['closing_link']['title'].'</a>';
                    endif;
                ?>
            </div>

        </div>
    </div>
</section>