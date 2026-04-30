<?php get_header(); ?>
<main>
<?php ehunting_render_page_hero(array(
    'title' => sprintf(__('%s'), single_cat_title('', false)),
    'has_parallax' => false,
)); ?>
  <section id="main">
    <div class="row">

    <div class="container theme-container--full">
      <div class="col s12 m12 l12 center-align theme-post-grid">      
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
            <?php ehunting_render_archive_post_card(array(
                'paged' => $paged,
                'position' => $posicion,
                'featured_mode' => 'default',
                'button_label' => 'Leer más',
                'fixed_height' => true,
                'excerpt_callback' => function () {
                    the_excerpt();
                },
            )); ?>
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
