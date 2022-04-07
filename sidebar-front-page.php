<?php 
    
    if ( ! is_active_sidebar( 'front-page' )) {
        return;
    }   

?>

<aside id="secondary" class="widget-area" role="complementary">
<?php wp_loginout( get_permalink() ); ?>

<?php 
        if ( !is_user_logged_in() ) :

            $args = [
                'label_username' => 'Unesite username',
                'label_password' => 'Unesite password'
            ];

            wp_login_form( $args ); 
        endif;
    ?>

    <?php dynamic_sidebar( 'front-page' ); ?>

</aside>