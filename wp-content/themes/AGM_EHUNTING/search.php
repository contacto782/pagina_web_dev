<?php get_header(); ?>

<h2 class="page-title">Resultados de la búsqueda</h2>
    <section id="main">
         <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

           <div class="entrada">
                <div class="thumbnail-container">
                 <div class="thumbnail" <?php

       if ( $id = get_post_thumbnail_id() ) {
           if ( $src = wp_get_attachment_url( $id ) )
               printf( ' style="background-image: url(%s);"', $src );
       }

       ?>></div><div class="thumbnail-base"></div></div>
             <div class="contenido-entrada">
             <div class="titulo-entrada">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <small>Publicado el <?php the_time('j/m/Y') ?> por <?php the_author(); ?></small>
             </div>

             <?php the_excerpt(); ?>
         </div>
         </div>

 <?php endwhile; ?>
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
<?php  else: ?>
<div class="entry"><?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?></div>
<?php endif; ?>

</section> <!-- Fin de main -->

<?php  get_sidebar()?>

<?php get_footer(); ?>
