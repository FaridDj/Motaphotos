<?php

function theme_enqueue_styles() {
    
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery' ), '1.0', true);
    wp_enqueue_style( 'local-fonts', get_stylesheet_directory_uri() . '/fonts/fonts.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Activer les fonctionnalités du thème
function mytheme_setup() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_setup');

?>