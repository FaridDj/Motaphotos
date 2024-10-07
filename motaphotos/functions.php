<?php

function theme_enqueue_styles() {

    wp_enqueue_style( 'first-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'second-style', get_stylesheet_directory_uri() . '/css/custom.css', array('first-style'), '1.0' );
    wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true );
    wp_enqueue_style( 'local-fonts', get_stylesheet_directory_uri() . '/fonts/fonts.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Activer les fonctionnalités du thème, y compris les menus
function register_my_menus() {
    register_nav_menus(array(
        'main' => __('Menu principal', 'text-domain'),
        'footer' => __('Menu pied de page', 'text-domain')
    ));
}
add_action('after_setup_theme', 'register_my_menus');
