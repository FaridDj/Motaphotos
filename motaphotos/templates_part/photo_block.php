<?php
function afficher_image_hero($post_per_page) {
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => $post_per_page,
        'orderby'        => 'rand', 
    );

    $photo_query = new WP_Query($args);

    if ($photo_query->have_posts()) :
        while ($photo_query->have_posts()) : $photo_query->the_post();

            if (has_post_thumbnail()) {
                the_post_thumbnail('full');
            }
        endwhile;
        wp_reset_postdata();
    endif;
}
