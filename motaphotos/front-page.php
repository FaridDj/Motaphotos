<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <section class="custom-photo-gallery">
        
        <?php get_template_part( 'templates_part/photo_block' ); ?> 

        <?php afficher_image_hero(1); ?>
            <div class="hero-title">
                <H1> PHOTOGRAPHE EVENT</H1>
            </div>
            
            <select id="category-select" class="category-select" name="category-select">
    <option value="all" data-name="all" selected>Sélectionner une catégorie</option>
    <?php
    // Récupérer toutes les catégories de photos
    $categories = get_terms(array(
        'taxonomy' => 'categorie',
        'orderby' => 'name',
        'hide_empty' => false
    ));

    if (!empty($categories) && !is_wp_error($categories)) :
        foreach ($categories as $categorie) : ?>
            <option value="<?php echo esc_attr($categorie->term_id); ?>" data-name="<?php echo esc_attr($categorie->name); ?>">
                <?php echo esc_html($categorie->name); ?>
            </option>
        <?php endforeach;
    else :
        echo '<option>Aucune catégorie disponible</option>';
    endif;
    ?>
</select>


<!-- Bouton pour charger les photos -->
<div id="photos-area"></div>
   
<?php get_footer(); ?>
