<?php get_header(); ?>

    <div id="primary" class="content-area extended">
    
        <main id="main" class="site-main " role="main">

               <?php get_template_part( 'template-parts/content', 'none' )?>

            <p>Try these instead</p>

        </main>
        
    </div>
    <?php get_sidebar( 'front-page' )?>
<?php get_footer(); ?>