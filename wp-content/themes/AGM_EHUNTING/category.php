<?php get_header(); ?>
 <?php get_header(); ?>
<main>
<div style="position:relative;width:100%;">
    <div style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;"></div>
	<h1 class="white-text center-align flow-text titulo-pagina" style="max-width:100%;border-radius:3px;padding:10px;text-transform:uppercase;margin: 0 auto;font-size: 4rem;background-color:#00000078"><?php printf( __( '%s' ), single_cat_title( '', false ) ); ?></h1>
    </div>
  <section id="main">
    <div class="row">

    <div class="container" style="width:100%!important">
      <div class="col s12 m12 l12 center-align" style="margin:0 auto;">      
        <?php
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              $postsporpagina = $paged == 1 ? 7 : 6;
              $custom_args = array(
                  'posts_per_page' => $postsporpagina,
                  'paged' => $paged,
                  'post__not_in' => array( 208 )
                );
              $custom_query = new WP_Query( $custom_args ); ?>

			 <?php if ( $custom_query->have_posts() ) : ?>


            <?php /* The loop */ ?>
                
            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); $posicion = $custom_query->current_post +1 ?>
          <div id="post<?echo $posicion?>" class="<? echo $paged == 1 && $posicion == 1 ? 'col s12 m12 l12' : 'col s12 m6 l4'; echo $paged == 1 && $posicion >4 ? ' right' : $paged != 1 && $posicion >3 ? ' right' : ' left' ?>">
            <div class="card hoverable #fafafa grey lighten-5" style="<? echo $paged == 1 && $posicion == 1 ? 'height:initial!important' : '' ?>"> 
              
              <div class="obras-en-home-inner card-image" style="<? echo $paged == 1 && $posicion == 1 ? 'height:500px;background-position:bottom' : 'height:300px' ?>;background-image:url('<?php echo get_the_post_thumbnail_url( null,'full') ?>');background-size:cover;background-repeat:no-repeat">
              <div style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;background:#00000059;"></div>
              <span class="card-title">
              <h5 class="white-text flow-text center-align" style="margin:0;padding:5px;text-transfom:capitalize"><?php $str = get_the_title(); echo '<a class="white-text" href="'.get_the_permalink().'">'.$str.'</a>'; ?></h5>
              </span>
              
              </div>
            <div class="card-content">
                  <?php excerpt_corto(the_excerpt()); ?>
                  <br>
                  <a href="<?php the_permalink() ?>" class="btn" style="margin:40px;background:#d05a27">Leer más</a>
            </div>
    </div>
    </div>
    <?php endwhile; ?>
    <?php else: ?>
    <p><?php _e('No hay entradas .'); ?></p>
    <?php endif; ?>
    <div class="col s12 m12 l12 center-align siguiente-anterior"><?php
        $big = 999999999; // need an unlikely integer
        
        echo paginate_links( array(
        	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        	'format' => '?paged=%#%',
        	'current' => max( 1, get_query_var('paged') ),
        	'total' => $custom_query->max_num_pages,
        	'prev_text' => '<',
            'next_text' => '>'
        ) ); ?>  
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