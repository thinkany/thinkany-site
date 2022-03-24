</main>

<footer id="main-footer">
    <div class="container flex flex-ai-c">
        
    </div>
</footer>

<?php wp_footer(); ?>

<?php 
if ( get_field('footer_scripts', 'options') ) : 
    foreach( get_field('footer_scripts', 'options') as $scripts ) :
        echo $scripts['script'];
    endforeach;
endif;
?>

<div class="menu-overlay"> </div>

</body>
</html>