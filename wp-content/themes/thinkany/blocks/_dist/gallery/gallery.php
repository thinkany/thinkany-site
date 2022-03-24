<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;
$className = 'sec sec--gallery';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$terms = get_terms( array(
    'taxonomy' => 'filter',
    'hide_empty' => true,
) );

$args = array(
    'post_type'   => 'gallery-image',
    'posts_per_page' => -1,
    'post_status' => 'publish',
  );
$images = new WP_Query( $args );
$count = $images->found_posts;

?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container container-filter flex flex-jc-c flex-ai-c">
        <a href="javascript:void(0);" class="norm norm-fill active" data-filter-id="all">
            <span>view all</span>
        </a>
        <?php foreach ( $terms as $term ) : ?>
            <a href="javascript:void(0);" class="norm norm-fill" data-filter-id="<?= $term->slug; ?>">
                <span><?= $term->name; ?></span>
            </a>
        <?php endforeach; ?>
    </div>
    <div id="lightgallery" class="container container-masonry flex flex-wrap">

        <?php   
            if ( $images->have_posts() ) :
                $i = 1;
                $c = 1;
                $open = false;
                $tmpFilter = null;

                while ( $images->have_posts() ) : $images->the_post();

                if($i > 20) {
                    $i = 1;
                }
                //initially hide any post greater than 24 (load more)
                ( $c > 24 ) ? $class = '-hide' : $class = null;

                $imageFields = get_fields(get_the_ID());
                $imageTypes = $imageFields['photo_filters'];
                $filter = null;
                foreach($imageTypes as $type):
                    $filter .= $type->slug;
                endforeach;

                if ( ( $i == 4 || $i == 6 || $i == 13 || $i == 16 ) && !($open) ) :
                    $open = true;
                    $tmpFilter = $filter;
                    $tmpOpen = '<div 
                    class="wrapper-gallery-item' . $class .
                    ' wrapper-group layout-' . $i .'" data-filter="'.$filter.'" 
                    data-aos="fade-up" data-aos-duration="500" data-aos-anchor-placement="center-bottom">';
                    $tmpOpen .= '<div class="wrapper-gallery-item-nested '. $imageFields['image']['orientation'] . ' layout-' . $i .'">'; 

                elseif ( ($i == 4 || $i == 6 || $i == 13 || $i == 16 ) && ($open) && ($filter ==  $tmpFilter)) :  
                    $open = false; 
                    // this is the second time through the "grouped list" but the category is the same
                    $tmpOpen .= '<div class="wrapper-gallery-item-nested'. $imageFields['image']['orientation'] . ' layout-' . $i.'">';

                elseif (($i == 4 || $i == 6 || $i == 13 || $i == 16 ) && ($open) && ($filter !=  $tmpFilter)) : 
                    // the second item doesn't match so we need to escape out without the "group-layout" 
                    $tmpOpen = null;
                    $open = false;
                
                    $tmpOpen = '<div class="wrapper-gallery-item'. $class . ' ' . $imageFields['image']['orientation'] . ' layout-' . $i .'" 
                    data-filter="'.$filter.'"
                    data-aos="fade-up" 
                    data-aos-duration="500" 
                    data-aos-anchor-placement="center-bottom">';

                else :
                    $tmpOpen = '<div class="wrapper-gallery-item'. $class . ' ' . $imageFields['image']['orientation'] . ' layout-' . $i .'" 
                    data-filter="'.$filter.'"
                    data-aos="fade-up" 
                    data-aos-duration="500" 
                    data-aos-anchor-placement="center-bottom">';
                    // ensure non-grouped reset open to false
                    $open = false; 

                endif;

                // formatting the meta to show on hover.
                $subHtml = "&lt;p&gt;&lt;span&gt;" . $imageFields['caption_1'];
                if ($imageFields['caption_2']) : 
                    $subHtml .= ", " . $imageFields['caption_2'];
                endif;
                $subHtml .= "&lt;/span&gt;&lt;/p&gt;";

                



                $tmpOpen .= '<a class="lg-wrapper" href="'.$imageFields['image']['url'].'"
                        data-lightbox="lb"
                        data-title="'.$subHtml.'">'.$imageFields['image']['html'].'</a>
                        <div class="wrapper-meta flex flex-jc-fe">
                        <span class="white">'.$imageFields['caption_1'].'</span>';
                     if ($imageFields['caption_2']) : 
                        $tmpOpen .= '<span class="white">, '.$imageFields['caption_2'].'</span>';
                     endif;

                $tmpOpen .= '</div>
                    </div>';

                if ( $open == false ) : echo $tmpOpen; endif;

                if ( ( $i == 4 || $i == 6 || $i == 13 || $i == 16 ) && !($open) && ($filter == $tmpFilter) ) :
                    echo '</div>';
                    $i++;
                elseif ($open == true) :
                    $i = $i;
                else :
                    $i++;
                endif;
                $c++;
            
                endwhile; 
                wp_reset_postdata();

            endif;  
        ?>

    </div>

    <div class="container wrapper-button flex flex-col flex-jc-c flex-ai-c">
        <span class="displaying">Displaying <span id="current-count" data-count="24">24</span>/<span id="total-count" data-count="<?= $count; ?>"><?= $count; ?></span></span>
        <div class="wrapper-button-float">
            <a href="javascript: void(0);" class="btn btn-v button" data-count="24" data-type="all">Load More</a>
        </div>
    </div>
</section>

