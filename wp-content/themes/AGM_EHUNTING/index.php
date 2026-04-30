<?php get_header(); ?>
<main>
<?php ehunting_render_page_hero(array('title' => get_the_title(714), 'has_parallax' => false)); ?>
  <section id="main">
    <div class="row">
    <div class="container theme-container--full">
      <div class="col s12 m12 l12 center-align theme-post-grid">      
        <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          if ( have_posts() ) : while ( have_posts() ) : the_post(); 
          $posicion = $wp_query->current_post +1; ?>
          <?php ehunting_render_archive_post_card(array(
              'paged' => $paged,
              'position' => $posicion,
              'featured_mode' => 'default',
              'button_label' => 'Leer más',
          )); ?>
    <?php endwhile;endif; wp_reset_postdata(); ?>
    <div class="row theme-post-grid__pagination">
    
    <div class="col s12 m12 l12 center-align siguiente-anterior"><?php posts_nav_link('&#8734;','Anterior  ','  Siguiente'); ?></div>
    
    </div>
    </div>
    </div>
    </div>
</section> <!-- Fin de main -->
</main>
<!--<script>
    $('.obras-en-home').each(function(index){
        if($('.obras-en-home')[index] >3 && $('.obras-en-home')[index] <7)
    });
</script>-->
<?php  get_sidebar()?>
<?php get_footer(); ?>
