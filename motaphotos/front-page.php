<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <section class="custom-photo-gallery">
        
        <?php get_template_part( 'templates_part/photo_block' ); ?> 

        <?php afficher_image_hero(1); ?>
            <div class="hero-title">
                <H1> PHOTOGRAPHE EVENT</H1>
            </div>
            
<!-- Création des filtres -->
<select id="category-select" class="category-select" name="category-select">
    <option value="all" data-name="all" selected>Sélectionner une catégorie</option>
    <?php
   
    $categories = get_terms(array(
        'taxonomy' => 'categorie',
        'orderby' => 'name',
        'hide_empty' => false
    ));

    if (!empty($categories) && !is_wp_error($categories)) :
        foreach ($categories as $categorie) : ?>
            <option value="<?php echo esc_attr($categorie->name); ?>" data-name="<?php echo esc_attr($categorie->name); ?>">
                <?php echo esc_html($categorie->name); ?>
            </option>
        <?php endforeach;
    else :
        echo '<option>Aucune catégorie disponible</option>';
    endif;
    ?>
</select>

<select id="format-select" class="format-select" name="format-select">
    <option value="all" data-name="all" selected>Sélectionner le format</option>
    <?php

    $formats = get_terms(array(
        'taxonomy' => 'format',
        'orderby' => 'name',
        'hide_empty' => false
    ));

    if (!empty($formats) && !is_wp_error($formats)) :
        foreach ($formats as $format) : ?>
            <option value="<?php echo esc_attr($format->name); ?>" data-name="<?php echo esc_attr($format->name); ?>">
                <?php echo esc_html($format->name); ?>
            </option>
        <?php endforeach;
    else :
        echo '<option>Aucun format disponible</option>';
    endif;
    ?>
</select>

<select id="date-select" class="date-select" name="date-select">
    <option value="asc" selected>Date croissante</option>
    <option value="desc">Date décroissante</option>
</select>

<div id="photos-area"></div>
   
<?php get_footer(); ?>
