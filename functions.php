<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

/*Theme support*/

/*Ucitvanje novog css fajla djeteta i roditelja*/

function understrap_child_theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css' );
	
}
add_action ( 'wp_enqueue_scripts', 'understrap_child_theme_enqueue_styles' );

/*Dodavanje menija*/
register_nav_menus( [
    'main-menu' => esc_html__( 'Main Menu', 'understrap-child' )
]);


/* Widget area */
function understrap_child_theme_widgets_init() {
	register_sidebar([
		'name'			=> esc_html__( 'Main Sidebar', 'understrap-child' ),
		'id'			=> 'main-sidebar',
		'description'	=> esc_html__( 'Add widgets for main sidebar here', 'understrap-child' ),
		'before_widget' => '<section class="widget">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'	=> '</h2>'
	]);
	register_sidebar([
		'name'			=> esc_html__( 'Page sidebar', 'understrap-child' ),
		'id'			=> 'page-sidebar',
		'description'	=> esc_html__( 'Add widgets for page sidebar here', 'understrap-child' ),
		'before_widget' => '<section class="widget">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'	=> '</h2>'
	]);
	register_sidebar([
		'name'			=> esc_html__( 'Front Page sidebar', 'understrap-child' ),
		'id'			=> 'front-page',
		'description'	=> esc_html__( 'Add widgets for front page here', 'understrap-child' ),
		'before_widget' => '<section class="widget">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'	=> '</h2>'
	]);

}
add_action( 'widgets_init', 'understrap_child_theme_widgets_init' );

/* Dodavanje js */
function understrap_child_enqueue_script() {
	//wp_enqueue_script ( 'theme-js', get_stylesheet_directory_uri() . '/js/theme.js', [], time(), true );
	wp_enqueue_script ( 'jquery=theme-js', get_stylesheet_directory_uri() . '/js/jquery-theme.js', [ 'jquery' ], time(), true );
}

add_action( 'wp_enqueue_scripts', 'understrap_child_enqueue_script' );

?>

