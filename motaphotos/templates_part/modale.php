<div id="overlay" class="overlay"></div>
<div id="myModal" class="overlay modal">
    <div class="photo-modale">   
          <img src="<?php echo get_template_directory_uri() ?>/images/Contact-header.png" alt="image de contact" class="image-contact">
          
  <script>
  $(document).ready(function(){
    
    var reference = "<?php echo esc_js($ma_reference); ?>";
    $("#la-reference").val(reference);
  });
</script>

          
          <?php echo do_shortcode('[contact-form-7 id="d9d7584" title="Formulaire de contact"]'); ?>
          
</div>
</div>  
