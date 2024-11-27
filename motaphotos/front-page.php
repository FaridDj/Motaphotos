<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <section class="custom-photo-gallery">
        
        <?php get_template_part( 'templates_part/photo_block' ); ?> 

        <?php afficher_image_hero(1); ?>
            <div class="hero-title">
                <H1> PHOTOGRAPHE EVENT</H1>
            </div>
            <div class="filter-selection">


<!-- Sélecteur des catégories -->
<select id="category-select" class="category-select" name="category-select">

    
    <option value="">Sélectionner une catégorie</option>
    <?php
    $categories = get_categories(array('taxonomy' => 'categorie', 'hide_empty' => false));
     foreach ($categories as $categorie) : ?>
        <option value="<?php echo esc_attr($categorie->term_id); ?>">
            <?php echo esc_html($categorie->name); ?>
        </option>
    <?php endforeach; ?>
</select>

<!-- Zone d'affichage des categorieaires (vide au départ) -->
<div id="categories-area"></div>

<div id="photo-gallery"></div>
        <?php afficher_grille_photos(8); ?>
    </section>
</main>



<div class="ChargePlus">
    <button id="ChargePlus" class="bouton-contact" >Charger plus</button>
</div>

<?php get_footer(); ?>