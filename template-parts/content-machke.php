<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php the_title( '<h1>', '</h1>'); ?>
        <a href=" <?php the_permalink() ?>">

<?php the_post_thumbnail( 'medium' );?>
</a>

    </header>

    <div class="entry-content">
    
        <?php
            the_excerpt();
        ?>

        
                <p>
                    
                    Umijeca:
                    <?php 
                        the_terms( $post->ID, 'skills');
                    ?>
                </p>



    </div>

</article>