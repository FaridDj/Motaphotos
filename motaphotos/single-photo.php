<?php
    get_header();
?>

<div class="placement-fiche">
    <div class="fiche-photo">
       
        <div class="photo-informations">
            <h1>
                <?php
                // Récupération l'ID
                $post_id = get_the_ID();
                // Récupération le titre
                $title = get_the_title($post_id);
                echo $title;
                ?>
            </h1>
            <p>REFERENCES : 
                <?php
                // Récupération de la rubrique reference
                $ma_reference = get_post_meta($post_id, 'reference', true);
                // Vérifier si la référence existe
                if ($ma_reference) {
                    
                    echo $ma_reference;
                } else {
                    
                    echo 'Aucune référence définie pour cet article.';
                }
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
                    echo 'Aucune référence définie pour cet article.';
                }
                ?>
            </p>


            <p>FORMAT : 
                <?php
                // Récupération de "format"
                $terms = get_the_terms($post_id, 'format');
                
                if ($terms && !is_wp_error($terms)) {
                
                    foreach ($terms as $term) {
                
                        echo $term->name;
                    }
                } else {
                
                    echo 'Aucune référence définie pour cet article.';
                }
                ?>
            </p>

            <p> TYPE :
                <?php
                // Récupération de "type"
                $mon_type = get_post_meta($post_id, 'type', true);
                if ($mon_type) {
                    echo $mon_type;
                } else {
                    echo 'Aucune référence définie pour cet article.';
                }
                ?>
            </p>


            <p>ANNEE :
                <?php
                // Récupération la date
                $date = get_the_date('Y', $post_id);
                echo $date;
                ?>
            </p>

        </div>


        <div class="photo_img inactive-mobile" id="photo-lightbox">
            <?php
            
            $thumbnail = get_the_post_thumbnail($post_photos, 'large'); 
            echo $thumbnail;
            ?>
        </div>
    </div>
</div>

<div class="zone-contact-et-miniature">
    <div class="zone-contact">
        <div class="zone-contact-position-texte">
            <p>Cette photo vous intéresse ?</p>
        </div>
        <div class="bouton-contact">
            <a onClick="passerRef('<?php echo $ma_reference; ?>')">Contact</a>
        </div>
    </div>
    <div class="zone-miniature">
        <div>
            <?php 
                // Récupération la miniature du post précédent
                $prev_custom_post = get_previous_post($postID);
                $next_custom_post = get_next_post($postID);
                $next_post_thumbnail = get_the_post_thumbnail($next_custom_post, 'thumbnail');

                echo $next_post_thumbnail;
            ?>
            <div class="photo-arrows">
                <p class="get_id"><?php $postID = the_ID(); ?></p>
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
    </div>
    <div class="presentation-images">
        <?php 
                        $args = array(
                          'post_type' => 'photos', 
                          'posts_per_page' => 2, 
                          'tax_query' => array(
                              array(
                                  'taxonomy' => 'categorie',
                                  'field' => 'slug', 
                                  'terms' => $cat,
                              ),
                          ),
                      );
                      
                      $query = new WP_Query($args);
                      
                      if ($query->have_posts()) {
                          while ($query->have_posts()) {
                            $query->the_post();
                            $urlrelated = get_the_permalink();
                            echo("<a href='".$urlrelated."' class='presentation-images-gauche'><div >");
                              $query->the_post_thumbnail();
                              the_post_thumbnail(); 
                              
                            echo("</div></a>");
                          }
                          wp_reset_postdata(); 
                      }
        ?>
    </div>
    <div class="presentation-bouton">
        <a href="http://localhost/motaphotos.com"><input class="bouton" type="button" value="Toutes les photos"></a>
    </div>
</div>

<?php
    get_footer();
?>