<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF8">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Votre en-tête -->
    <header>
        
        <div><img class="logo-img-mini" src="<?php echo get_stylesheet_directory_uri() . '/images/Nathalie Mota2.png'; ?> " alt="Motaphoto"></div>
            <a href="<?php echo esc_url(home_url('/')); ?>"></a>

        <nav>
    <?php
       get_template_part('templates_part/modale');
    // Afficher le menu principal avec un bouton pour ouvrir la modale de contact
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class'     => 'primary-menu',
        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s <li><a href="#"  id="btn_contact" class="active">Contact</a></li></ul>',
    ));
 
    ?>
    
        </nav>

    </header>