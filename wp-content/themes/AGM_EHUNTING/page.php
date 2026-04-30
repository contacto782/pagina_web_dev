<?php
/**
 * Template Name: Contenido
 */
?>

<?php get_header(); ?>
<?php ehunting_render_page_hero(); ?>
<section id="main" class="container flow-text <?php echo get_the_title() === 'Contactanos' ? 'theme-section--contact' : ''; ?>">
	
  	  	<article id="single">
      		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>      		 

      		<div class="post">

      		   <?php the_content(); ?>
      		   
      		   <?php if(get_the_title() == 'Contactanos') {?>
      		       <?php include('variables-footer.php') ?>
      		       <div class="row center-align theme-contact-links">
      		           <div class="col s12 m4 l4 theme-contact-links__item"><a href="tel:<?php echo $telefono ?>" class="white-text btn-floating boton-contactenos"><i class="material-icons">local_phone</i></a></div>
      		           <div class="col s12 m4 l4 theme-contact-links__item"><a href="mailto:<?php echo $emailfooter ?>" class="white-text btn-floating boton-contactenos"><i class="material-icons">email</i></a></div>
      		           <div class="col s12 m4 l4 theme-contact-links__item"><a href="<?php echo $direccionenlace ?>" target="_blank" rel="noopener" class="white-text btn-floating boton-contactenos"><i class="material-icons">location_on</i></a></div>
      		       </div>
      		       
      		   <?php } ?>

	      </div>


<?php endwhile; ?>

<?php endif; ?>

	</article> <!-- Fin de single -->

  </section> <!-- Fin de main -->
  <?php

// The Query

if(get_the_title() == 'Montajes Electricos'){$meta_value = 'Montajes Electricos';} elseif (get_the_title() == 'Mantenimiento') {$meta_value = 'Mantenimiento';} elseif (get_the_title() == 'Climatización') {$meta_value = 'Climatización';} elseif (get_the_title() == 'Proyectos') {$meta_value = 'Proyectos';}
$args = array( 'posts_per_page' => 6, 'offset'=> 0, 'post_type' => 'obras', 'meta_value' => $meta_value );
$the_query = new WP_Query( $args );

// The Loop
if(get_the_title() == 'Montajes Electricos' || get_the_title() == 'Climatización' || get_the_title() == 'Proyectos' || get_the_title() == 'Mantenimiento') {
if ( $the_query->have_posts() ) { ?>
<div class="row #9e9e9e grey theme-obras-section"> 
<div class="col s12 center-align">
    <h3 class="white-text center-align">Nuestras Obras en esta especialidad</h3>
<div class="carousel carousel-obras">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<!-- Sección de obras -->

       <div class="obras-en-home carousel-item col s12 m6 l4" style="margin:-5.5rem 0 1rem 0">
        <div class="card hoverable small #fafafa grey lighten-5">
       
          <span class="card-title">
			  <div class="obras-en-home-inner card-image"><?php the_post_thumbnail('full', array('class' => 'img-obras')); ?>
				
<a class="white-text" href="<?php the_permalink(); ?>">
	<div class="enlace-obras-en-home">
		<h5 class="h5-obras-en-home"><?php the_title(); ?>
		</h5>
	</div>
			  </a>
			  </div>
			</span>
          <div><?php $meta = get_post_meta($post->ID,'Sector', true);
if($meta != '') {
echo '<p class="flow-text center-align theme-obras-section__meta">Rubro: ' . $meta . '</p>'; ?> <?php }else {
echo ' ';} ?></div>
       <div class="card-action">
          <a href="<?php the_permalink(); ?>" class="red-text">Ver más</a>
        </div>
      </div>
	</div>
    <?php endwhile; ?>

</div>
</div>
</div>
	    <?php wp_reset_postdata(); 	
} } else {
	// no posts found
} ?>
</main> <!-- Fin de main -->
<?php  get_sidebar()?>
<?php get_footer(); ?>
