<?php
/**
 * Template Name: Noticias
 */
?>
<?php get_header(); ?>
<style>
  body.ehunting-section-header,
  body.ehunting-section-header main,
  body.ehunting-section-header #main {
    background: #ffffff;
  }
</style>
<main>
<?php ehunting_render_page_hero(array(
    'title' => get_the_title(714),
    'has_parallax' => false,
    'tone_class' => 'theme-page-hero--brand',
    'title_class' => 'theme-page-hero__title--news',
)); ?>
  <section id="main">
    <div class="row">
      <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>      		 

      		<div class="post">

      		   <?php the_content(); ?>

	        </div>


    <?php endwhile; endif ?>
    <div class="container theme-container--full">
      <div class="col s12 m12 l12 center-align theme-post-grid theme-post-grid--spaced">      
        <?php
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              $postsporpagina = $paged == 1 ? 9 : 6;
              $custom_args = array(
                  'posts_per_page' => $postsporpagina,
                  'paged' => $paged,
                  'tax_query' => 
                  [
					'relation' => 'AND',
					[
					  'taxonomy' => 'category',
					  'field' => 'slug',
					  'terms' => ['entrevistas', 'novedades'],
					  'operator' => 'NOT IN'
					],
					[
					  'taxonomy' => 'post_tag',
					  'field' => 'slug',
					  'terms' => ['entrevistas', 'novedades'],
					  'operator' => 'NOT IN'
					]
				  ]
                );
              $custom_query = new WP_Query( $custom_args ); ?>

			 <?php if ( $custom_query->have_posts() ) : ?>


            <?php /* The loop */ ?>
                
            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); $posicion = $custom_query->current_post +1 ?>
            <?php ehunting_render_archive_post_card(array(
                'paged' => $paged,
                'position' => $posicion,
                'featured_mode' => 'uniform',
                'button_label' => 'Leer más',
                'layout' => 'news',
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
        
        echo preg_replace('/(class="page-numbers"|class=\'page-numbers\'|class="(next|prev) page-numbers")/i','class="page-numbers btn white-text boton-siguiente-anterior"',preg_replace('/(\n|\t)/','',paginate_links( array(
        	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        	'format' => '?paged=%#%',
        	'current' => max( 1, get_query_var('paged') ),
        	'total' => $custom_query->max_num_pages,
        	'prev_text' => '<',
            'next_text' => '>'
        ) ))); ?>   
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
<!-- <?php get_template_part('/resources/php/formsuscribir') ?> -->
	
	<?php

// montar el chatbot
// ✅ SOLO mostrar el chatbot de prueba si la URL trae ?chat_test=1
$chat_test = isset($_GET['chat_test']) && $_GET['chat_test'] == '1';

if (true):
?>

  <!-- ✅ BOTÓN + PANEL DEL CHAT (solo en modo prueba) -->
  <div id="eh-chat-bubble" aria-label="Abrir chat"></div>

  <div id="eh-chat-panel" class="eh-chat-panel" aria-hidden="true">
    <div class="eh-chat-panel-inner">
      <iframe
        id="eh-chat-iframe"
        src="https://chatbot-ehunting.netlify.app/?embed=1" 
        title="Chat eHunting"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
  </div>

  <style>
	  :root{
  --eh-blue-rgb: 54, 0, 232;        /* #3600E8 → avatar */
  --eh-pulse-blue-rgb: 0, 70, 180;  /* azul seguro → pulso */
}
    /* Burbuja flotante */
    #eh-chat-bubble{
      position: fixed;
      bottom: 50px;
  	  right: 30px;
		
      width: 72px;
      height: 72px;
	  cursor: pointer;
	  border-radius: 50%;
	  z-index: 999999999999 !important;
		
       background-image: url('https://chatbot-ehunting.netlify.app/avatar-bot.png');
  	   background-size: cover;
       background-position: top;
       background-repeat: no-repeat;
		
	animation: eh-pulse 2.2s infinite;
	  
    }
	  
@keyframes eh-pulse {
  0% {
    box-shadow:
      0 0 0 0 rgba(var(--eh-pulse-blue-rgb), .45),
      0 0 0 0 rgba(var(--eh-pulse-blue-rgb), .25);
  }
  50% {
    box-shadow:
      0 0 0 12px rgba(var(--eh-pulse-blue-rgb), .30),
      0 0 0 24px rgba(var(--eh-pulse-blue-rgb), .15);
  }
  100% {
    box-shadow:
      0 0 0 26px rgba(var(--eh-pulse-blue-rgb), 0),
      0 0 0 40px rgba(var(--eh-pulse-blue-rgb), 0);
  }
}

/* 🚫 Cuando el chat está abierto, se apaga el pulso */
.chat-open #eh-chat-bubble{
  animation: none !important;
}




    /* Panel del chat */
    .eh-chat-panel{
      position: fixed;
     bottom: 120px;
  right: 24px;
      width: 380px;
      height: 600px;
      max-height: 75vh;
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 20px 60px rgba(0,0,0,.25);
      overflow: hidden;
      z-index: 999999999998;
      transform: translateY(16px);
      opacity: 0;
      pointer-events: none;
      transition: opacity .2s ease, transform .2s ease;
    }

    .eh-chat-panel.open{
      opacity: 1;
      transform: translateY(0);
      pointer-events: auto;
    }

    .eh-chat-panel-inner,
    .eh-chat-panel iframe{
      width: 100%;
      height: 100%;
      border: 0;
      display: block;
    }

  @media (max-width: 480px){

  /* Burbuja: bien pegada a la esquina y respetando safe-area */
  #eh-chat-bubble{
    right: 16px !important;
    bottom: calc(env(safe-area-inset-bottom, 0px) + 0px) !important;
    width: 60px !important;
    height: 60px !important;
  }

  /* Panel: ocupa casi todo el ancho, sin “espacio raro” y sin cortarse */
  .eh-chat-panel{
    left: 12px !important;
    right: 12px !important;
    width: auto !important;

    bottom: calc(env(safe-area-inset-bottom, 0px) + 0px) !important;

    /* dvh = viewport real en iOS moderno */
    height: min(78dvh, 620px) !important;
    max-height: none !important;

    border-radius: 18px !important;
  }

  /* Asegura que el iframe no deje bordes raros */
  .eh-chat-panel iframe{
    width: 100% !important;
    height: 100% !important;
    border: 0 !important;
    display: block !important;
  }
}

	  
	  
  </style>

  <script>
    (function(){
      const bubble = document.getElementById('eh-chat-bubble');
      const panel = document.getElementById('eh-chat-panel');
      if(!bubble || !panel) return;

      bubble.addEventListener('click', (e) => {
  e.stopPropagation(); // evita que el click llegue al document y lo cierre
  const isOpen = panel.classList.toggle('open');
  panel.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
  document.body.classList.toggle('chat-open', isOpen);
});


      // Cierra si hacen click fuera (opcional)
     document.addEventListener('click', (e) => {
  if(!panel.classList.contains('open')) return;
  const clickedInside = panel.contains(e.target) || bubble.contains(e.target);
  if(!clickedInside){
    panel.classList.remove('open');
    panel.setAttribute('aria-hidden','true');
    document.body.classList.remove('chat-open');
  }
});

    })();
  </script>

<?php endif; ?>
<?php get_footer(); ?>
