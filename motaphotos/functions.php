<?php
// Enregistrer et charger les scripts et styles
function motaphotos_scripts() {
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-scripts', 'ajax_params', array('ajaxurl' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('load_photos_handler')));
    wp_enqueue_style('local-fonts', get_stylesheet_directory_uri() . '/fonts/fonts.css', array(), '1.0');
  
    $post_id = get_the_ID();
$ma_reference = get_post_meta($post_id, 'reference_de_la_photo', true);

	wp_localize_script('custom-scripts', 'maReference', $ma_reference);
}

add_action('wp_enqueue_scripts', 'motaphotos_scripts');
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

// Fonction de mise a jour des photos via AJAX
function galerie_photos() {

    // Vérification du nonce pour la sécurité
    if ( !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'load_photos_handler') ) {
        echo 'Sécurité de la requête non valide.';
        wp_die();
    }

    $date_order = isset($_POST['date_order']) ? $_POST['date_order'] : 'asc';
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => $date_order,
    );

    $category_name = isset($_POST['category_name']) ? $_POST['category_name'] : ''; 
    if (!empty($category_name) && $category_name !== 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $category_name,
        );
    }

    $format_name = isset($_POST['format_name']) ? $_POST['format_name'] : ''; 
    if (!empty($format_name) && $format_name !== 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format_name,
        );
    }

    // Requête WP_Query avec les arguments définis
    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
        $html_output = '';

        while ($custom_query->have_posts()) : $custom_query->the_post();
            if (has_post_thumbnail()) {
                $html_output .= '<div class="photo-item">';
                $html_output .= '<a href="' . get_permalink() . '">';
                $html_output .= get_the_post_thumbnail(null, 'large');
                $html_output .= '</a>';
                $html_output .= '</div>';
            }
        endwhile;
        wp_reset_postdata();
        echo $html_output;
    else :
        echo 'Aucune photo trouvée.';
    endif;

    wp_die();
}

add_action('wp_ajax_galerie_photos', 'galerie_photos');
add_action('wp_ajax_nopriv_galerie_photos', 'galerie_photos');
