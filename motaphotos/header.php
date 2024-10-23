<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img class="logo-img-mini" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/Nathalie Mota2.png'); ?>" alt="Motaphoto">
            </a>
        </div>
        <nav>
            <?php
                wp_nav_menu(array(
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s<li><a href="#" id="btn_contact" class="active">Contact</a></li></ul>',
                ));   
                 
                
            ?>
        </nav>
    </header>
    <?php wp_footer(); ?>
</body>
</html>

