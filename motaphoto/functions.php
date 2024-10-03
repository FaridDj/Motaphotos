<?php
function theme_enqueue_styles() {
    
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/custom.css' );
    wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery' ), '1.0', true);
    wp_enqueue_style( 'local-fonts', get_stylesheet_directory_uri() . '/fonts/fonts.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Activer les fonctionnalités du thème
function register_my_menu(){
    register_nav_menu('main', "Menu principal");
    register_nav_menu('footer', "Menu pied de page");
 }
 add_action('after_setup_theme', 'register_my_menu');
