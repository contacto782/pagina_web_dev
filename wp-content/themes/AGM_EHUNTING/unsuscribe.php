<?php

/**
* Template Name: unsuscribe
*/

?>

<?php get_header(); ?>
<div class="<?php if(has_post_thumbnail()) { echo 'parallax-container';} ?>" style="position:relative;width:100%;<?php if(!has_post_thumbnail()) { echo 'height:100px;';} else { echo 'height:300px;';} ?>">
      <div class="<?php if(has_post_thumbnail()) { echo 'parallax';} ?>"><?php the_post_thumbnail('full', array('class' => 'parallax-img')); ?></div>
    <div style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;"></div>
	<?php if(!empty(get_the_title())): ?><h1 class="white-text center-align flow-text titulo-pagina" style="max-width:100%;position:absolute;<?php if(has_post_thumbnail()) { echo 'bottom:35%'; } else {echo 'bottom:5%';} ?>;left:0;right:0;border-radius:3px;padding:10px;text-transform:uppercase;margin: 0 auto;font-size: 4rem;background-color:#00000078"><?php the_title(); ?></h1> <?php endif; ?>
    </div>
<section id="main" class="container flow-text" style="<?php if(get_the_title() == 'Contactanos') {echo 'margin-bottom:30px;'; }?>">
	
  	  	<article id="single">
      		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>      		 

      		<div class="post">
      		    
      	<?php  
      	
      	if($_GET['usuario'] != ''):
      	
      	$asunto = 'Usuario solicitó darse de baja de lista de mailing YAMM';
      	$mensaje = 'El usuario con el ID '.$_GET['usuario'].' informó que quiere darse de baja de la lista de contactos';
      	$headers = array('Content-Type: text/html; charset=UTF-8','From: eHunting LATAM <noreply@ehunting.cl>', 'Bcc: Jesus Rodriguez <jesusr@agmdigital.net>');
      	
      		 wp_mail('contacto@ehunting.cl', $asunto, $mensaje, $headers); 
      		 
      		 echo '<script>history.pushState("", document.title, window.location.pathname);</script>';
      		 
      	endif;
      	
      		 ?>

      		   <?php the_content(); ?>
      		   


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
<div class="row #9e9e9e grey" style="margin-bottom:0;"> 
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
echo '<p class="flow-text center-align" style="margin:0 auto;padding-top:15px;">Rubro: ' . $meta . '</p>'; ?> <?php }else {
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