 <footer>
 <?php 
	 wp_nav_menu(array(
		 'theme_location' => 'footer',
		 'menu_id' => 'Menu footer', 
	 ));
 ?>
</footer>

	<?php get_template_part( 'templates_part/modale' ); ?>
    
    <?php wp_footer(); ?>
</body>
</html>
