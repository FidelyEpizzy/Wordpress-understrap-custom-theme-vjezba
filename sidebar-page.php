<?php 
    
    if ( ! is_active_sidebar( 'page-sidebar' )) {
        return;
    }   

?>

<aside id="secondary" class="widget-area" role="complementary">

    <?php wp_loginout( get_permalink() ); ?>



    <?php dynamic_sidebar( 'page-sidebar' ); ?>

</aside>