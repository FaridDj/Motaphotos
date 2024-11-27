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

function afficher_grille_photos($post_per_page) {
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => $post_per_page,
        'orderby'        => 'date',
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) : ?>
        <div class="photo-details">
        <?php
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        
            <?php if (has_post_thumbnail()) : ?>
                <div class="photo-item">
                    <a href="<?php the_permalink(); ?>"> 
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
        </div> 
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>Aucune photo trouvée.</p>
    <?php endif;
}

