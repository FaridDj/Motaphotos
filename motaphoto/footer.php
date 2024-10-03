    <footer>
        <?php 
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_id' => 'menu-footer', // ID attribué au menu
            ));
        ?>
    </footer>
    <?php get_template_part( 'templates_part/modale' ); ?>
   
    <?php wp_footer(); ?>
</body>
</html>
