<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <section class="hero">
        
        <?php get_template_part( 'templates_part/photo_block' ); ?> 

        <?php afficher_image_hero(1); ?>
            <div class="hero-title">
                <H1> PHOTOGRAPHE EVENT</H1>
            </div>
</section>         
<!-- Création des filtres -->
 <div class= "filtres padding">
    <div class="filtres-select">
<select id="category-select" class="category-select filtre-rubriques" name="category-select">
    <option value="all" data-name="all" selected>Catégorie</option>
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
        echo '<option>Aucune photo disponible avec cette catégorie </option>';
    endif;
    ?>
</select>

<select id="format-select" class="format-select filtre-rubriques" name="format-select">
    <option value="all" data-name="all" selected>Format</option>
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
        echo '<option>Aucune photo disponible au format selectionné </option>';
    endif;
    ?>
</select>

<select id="date-select" class="date-select filtre-rubriques filter-left" name="date-select">
    <option value="asc" selected>Trier par</option>    
    <option value="asc" selected>Ordre croissant</option>
    <option value="desc">Ordre décroissante</option>
</select>
</div>
<div id="photos-area"></div>
</div>  
<?php get_footer(); ?>
