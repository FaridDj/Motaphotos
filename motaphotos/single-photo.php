<?php
    get_header();
?>
<div class="positionnement-general">
    <div class="emplacement-haut">
        <div class="photo-informations">
            <h2>
                <?php
                // Récupération de l'ID
                $post_id = get_the_ID();
                // Récupération du titre
                echo get_the_title($post_id);
                ?>
            </h2>
            <p>REFERENCES : 
                <?php
                // Récupération de la rubrique référence
                $ma_reference = get_post_meta($post_id, 'reference_de_la_photo', true);
                // Vérification de l'existence de la référence
                echo $ma_reference ? $ma_reference : 'Aucune référence définie pour cet article.';
                ?>
            </p>

            <p>CATEGORIES : 
                <?php
               
               // Récupération de "categorie"
               $terms = get_the_terms($post_id, 'categorie');
               if ($terms && !is_wp_error($terms)) {
                   foreach ($terms as $term) {
                       $cat = $term->name;
                       echo $cat;
                    }
                } else {
                    echo 'Aucune catégorie définie pour cet article.';
                }
                ?>
            </p>

            <p>FORMAT : 
                <?php
                // Récupération de "format"
                $terms = get_the_terms($post_id, 'format');
                if ($terms && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        echo $term->name . ' ';
                    }
                } else {
                    echo 'Aucun format défini pour cet article.';
                }
                ?>
            </p>

            <p>TYPE :
                <?php
                // Récupération de "type"
                $mon_type = get_post_meta($post_id, 'Type', true);
                echo $mon_type ? $mon_type : 'Aucun type défini pour cet article.';
                ?>
            </p>

            <p>ANNEE :
                <?php
                // Récupération de la date
                echo get_the_date('Y', $post_id);
                ?>
            </p>
        </div>
        <div class="photo-img" id="photo-lightbox">
            <?php
            // Affichage de la photo
            echo get_the_post_thumbnail($post_id, 'large'); 
            ?>
        </div>
    </div>

    <div class="emplacement-milieu">
        <div class="zone-contact">
            <div class="contact-texte">
                <p>Cette photo vous intéresse ?</p>
            </div>
            <a id="btn_contact2" class="active bouton-contact" href="#">
                <?php
                // Affichage de la référence dans un champ caché
                echo '<input type="hidden" value="' . esc_attr($ma_reference) . '">';
                ?>
                Contact
            </a>
        </div>
        <div class="zone-slider">
            <?php 
            // Récupération de la miniature du post suivant
            $prev_custom_post = get_previous_post();
            $next_custom_post = get_next_post();
            if ($next_custom_post) {
                echo get_the_post_thumbnail($next_custom_post, array(100,100));
            }
            ?>
            <div class="photo-arrows">
                <?php
                if ($prev_custom_post) {
                    $prev_custom_post_link = get_permalink($prev_custom_post);
                    echo '<a href="' . esc_url($prev_custom_post_link) . '"><img src="' . get_template_directory_uri() . '/images/arrow-left.png" alt="voir la photo précédente" class="arrow-left"/></a>';
                }

                if ($next_custom_post) {
                    $next_custom_post_link = get_permalink($next_custom_post);
                    echo '<a href="' . esc_url($next_custom_post_link) . '"><img src="' . get_template_directory_uri() . '/images/arrow-right.png" alt="voir la photo suivante" class="arrow-right"/></a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="presentation-autres-photos">
    <div class="presentation-texte">
        <p>VOUS AIMEREZ AUSSI</p>
    </div>
    
    <?php
// Arguments de la requête pour récupérer les photos similaires
$args = array(
    'post_type' => 'photo', 
    'posts_per_page' => 2, 
    'tax_query' => array(
        array(
            'taxonomy' => 'categorie',
            'field' => 'slug', 
            'terms' => $cat,
        ),
    ),
);

// Création de la requête personnalisée
$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) : ?>
    <div class="photo-details">
        <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <!-- Affiche la vignette si elle existe -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="photo-item">
                    <a href="<?php the_permalink(); ?>"> <!-- Lien vers l'article complet -->
                        <?php the_post_thumbnail('large'); // Affiche la vignette en taille large ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div> <!-- Fermeture de la grid -->
    <?php wp_reset_postdata(); // Réinitialiser après la boucle personnalisée ?>
<?php else : ?>
    <p>Aucune photo trouvée.</p>
<?php endif; ?>


<?php get_footer(); ?>
