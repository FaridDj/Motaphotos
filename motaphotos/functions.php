<?php

function motaphotos_scripts() {
	wp_enqueue_style('my-theme-style', get_stylesheet_uri()); 
	wp_enqueue_style( 'first-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true );
    wp_enqueue_style( 'local-fonts', get_stylesheet_directory_uri() . '/fonts/fonts.css', array(), '1.0' );
    
}
add_action( 'wp_enqueue_scripts', 'motaphotos_scripts' );

function motaphotos_setup() {
	register_nav_menus(
		array(
			 'main' => __('Menu principal', 'motaphotos'),
			 'footer' => __('Menu footer', 'motaphotos'), 
		)
	);
}
add_action('after_setup_theme', 'motaphotos_setup');

function modify_homepage_query( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'photos' ) ); // Remplace "book" par ton custom post type
    }
}
add_action( 'pre_get_posts', 'modify_homepage_query' );
