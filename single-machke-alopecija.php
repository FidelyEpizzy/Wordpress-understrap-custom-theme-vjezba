<?php get_header(); ?>

    <div id="primary" class="content-area">
    
        <main id="main" class="site-main" role="main">

            <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">

                    <?php the_title( '<h1>', '</h1>'); ?>
                    
                </header>

                <a href=" <?php the_permalink() ?>">

                    <?php the_post_thumbnail( 'medium' );?>
                </a>

                <div class="entry-content">
                    
                    <?php the_content(); ?>

                </div>

                <p>
                    <a href="<?php the_field( 'url' );?>" class="button">

                        <?php esc_html_e( 'Posjetite sajt', 'understrap-child' );?>

                    </a>
                </p>

            </article>

            <?php endwhile; else: ?>


            <?php endif; ?>

            <p>Template: single-machke-alopecija.php</p>

        </main>

    </div>
    

<?php get_footer(); ?>