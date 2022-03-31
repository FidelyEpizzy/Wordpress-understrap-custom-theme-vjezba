<article >
 <div class="container overflow-hidden  gamts-holder">
     <div class="row gx-1 gy-1">
         <?php 
            if(have_posts()):
                while(have_posts()):
                    the_post();
                    get_template_part( 'gamts-list' );
                endwhile;
            else: 
                _e ( 'Nema stranica', 'understrap-child');
            endif;
         ?>
     </div>
 </div>
</article>