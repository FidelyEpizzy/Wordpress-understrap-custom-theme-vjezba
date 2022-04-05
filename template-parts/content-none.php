<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <header class="entry-header">

        <h1><?php esc_html_e( '404 - page Not found', 'understrap-child' ); ?></h1>

    </header>

    <div class="entry-content">
        
        <p> <?php esc_html_e( 'Nema nicega', 'understrap-child' ); ?> </p>

            <?php 
                echo get_search_form(); 
            ?>

    </div>
  
</article>
