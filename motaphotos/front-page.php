<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <section class="custom-photo-gallery">
        

        <?php
        // Requête pour récupérer les articles du Custom Post Type "photo"
        $args = array(
            'post_type'      => 'photo', // Custom Post Type
            'posts_per_page' => 5,      // Nombre de photos à afficher
        );

        $custom_query = new WP_Query( $args );

        if ( $custom_query->have_posts() ) : ?>
            <div class="photo-grid">
            <?php
            while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                
                <!-- Affiche la vignette si elle existe, sans le titre -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="photo-item">
                        <a href="<?php the_permalink(); ?>"> <!-- Optionnel : lien vers l'article complet -->
                            <?php the_post_thumbnail( 'large' ); // Affiche la vignette en taille large ?>
                        </a>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
            </div> <!-- Fermeture du grid -->
            <?php wp_reset_postdata(); // Réinitialise après la boucle personnalisée ?>
        <?php else : ?>
            <p>Aucune photo trouvée.</p>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
