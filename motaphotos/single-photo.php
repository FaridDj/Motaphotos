<?php
    get_header();
?>
<div class="positionnement general">
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
                            echo $term->name . ' ';
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
            // Affichage de la miniature
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
            <input type="hidden" value="<?php $ma_reference = get_post_meta($post_id, 'reference_de_la_photo', true);?>">Contact</a>
            
            
            
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
                        echo '<a href="' . esc_url($prev_custom_post_link) . '"><img src="'. get_template_directory_uri() . '/images/arrow-left.png" alt="voir la photo précédente" class="arrow-left"/></a>';
                    }

                    if ($next_custom_post) {
                        $next_custom_post_link = get_permalink($next_custom_post);
                        echo '<a href="' . esc_url($next_custom_post_link) . '"><img src="'. get_template_directory_uri() . '/images/arrow-right.png" alt="voir la photo suivante" class="arrow-right"/></a>';
                    }
                    ?>
                </div>
            
        </div>
    </div>
</div>

<div class="presentation-autres-photos">
    <div class="presentation-texte">
        <p>VOUS AIMEREZ AUSSI</p>
    
        <div class="propositions-photos">
        <?php 
        $args = array(
            'post_type' => 'photo', // CPT photos
            'posts_per_page' => 2, // Récupère 2 images
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie', // on veut filtrer sur les catégories
                    'field' => 'id',
                    'terms' => wp_get_post_terms($post_id, 'categorie', array('fields' => 'ids')), // catégorie du post en cours
                ),
            ),
        );
        
        $query = new WP_Query($args);
        
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                echo "<a href='" . get_permalink() . "'><div class='photos-proposees'>";
                the_post_thumbnail();
                echo "</div></a>";
            }
            wp_reset_postdata(); // Réinitialise la requête WP_Query.
        }
        ?>
        </div>
        
        <div class="presentation-bouton">
            <a href="http://localhost/motaphotos.com"><input class="bouton" type="button" value="Toutes les photos"></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>


