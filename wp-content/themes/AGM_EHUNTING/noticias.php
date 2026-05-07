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
    background: #f8fafc;
  }

  .blog-page-hero {
    display: none;
  }

  .blog-page-hero__title {
    margin: 0 0 12px;
    color: #091a39;
    font-size: clamp(2rem, 4vw, 3.5rem);
    line-height: 1.08;
    font-weight: 800;
    letter-spacing: 0;
  }

  .blog-page-hero__intro {
    max-width: 760px;
    margin: 0 auto;
    color: #4a5568;
    font-size: 14px;
    line-height: 1.6;
  }

  .blog-filters {
    max-width: 1180px;
    margin: 130px auto 34px;
    padding: 18px 18px 16px;
    border: 1px solid rgba(9, 26, 57, .08);
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 14px 34px rgba(9, 26, 57, .08);
    display: grid;
    grid-template-columns: minmax(280px, 1fr) 190px auto auto;
    gap: 14px;
    align-items: center;
  }

  .blog-filters__field {
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-width: 0;
  }

  .blog-filters__label {
    color: #4a3a2b;
    font-size: 12px;
    line-height: 1;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
  }

  .blog-filters__input,
  .blog-filters__date {
    width: 100% !important;
    height: 44px !important;
    margin: 0 !important;
    border: 1px solid rgba(9, 26, 57, .12) !important;
    border-radius: 10px !important;
    background: #f8fafc !important;
    color: #091a39 !important;
    box-shadow: none !important;
    padding: 0 14px !important;
    font-size: 14px !important;
  }

  .blog-filters__input:focus,
  .blog-filters__date:focus {
    border-color: rgba(208, 90, 39, .45) !important;
    box-shadow: 0 0 0 4px rgba(208, 90, 39, .1) !important;
    outline: none !important;
  }

  .blog-filters__button,
  .blog-filters__reset {
    height: 44px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 16px;
    font-size: 13px;
    font-weight: 800;
    line-height: 1;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: .04em;
    transition: background-color .25s ease, transform .25s ease, color .25s ease, border-color .25s ease;
    cursor: pointer;
  }

  .blog-filters__button {
    border: 0;
    background: #d05a27;
    color: #ffffff;
  }

  .blog-filters__reset {
    border: 1px solid rgba(9, 26, 57, .12);
    background: #ffffff;
    color: #091a39;
  }

  .blog-filters__button:hover,
  .blog-filters__button:focus,
  .blog-filters__reset:hover,
  .blog-filters__reset:focus {
    transform: translateY(-2px);
  }

  .blog-filters__button:hover,
  .blog-filters__button:focus {
    background: #b94f22;
    color: #ffffff;
  }

  .blog-filters__reset:hover,
  .blog-filters__reset:focus {
    border-color: rgba(208, 90, 39, .3);
    color: #d05a27;
  }

  .blog-page .theme-container--full {
    max-width: 1220px;
    width: min(100%, 1220px);
  }

  .blog-page .theme-post-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 26px;
    align-items: stretch;
  }

  .blog-page .theme-post-grid > .col {
    width: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
    float: none !important;
  }

  .blog-page .theme-post-card--news {
    position: relative;
    height: 100%;
    min-height: 520px;
    border: 1px solid rgba(9, 26, 57, .08);
    border-radius: 16px;
    background: #ffffff !important;
    box-shadow: 0 14px 34px rgba(9, 26, 57, .08);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
  }

  .blog-page .theme-post-card--news::before {
    content: "";
    position: absolute;
    top: 0;
    left: 18px;
    right: 18px;
    height: 4px;
    border-radius: 999px;
    background: linear-gradient(90deg, #d05a27 0%, #091a39 100%);
    transform: scaleX(0);
    transform-origin: center;
    opacity: 0;
    transition: transform .28s ease, opacity .28s ease;
    z-index: 2;
  }

  .blog-page .theme-post-card--news:hover {
    transform: translateY(-6px);
    border-color: rgba(208, 90, 39, .22);
    box-shadow: 0 20px 42px rgba(9, 26, 57, .13);
  }

  .blog-page .theme-post-card--news:hover::before {
    transform: scaleX(1);
    opacity: 1;
  }

  .blog-page .theme-post-card__media--news {
    height: 230px !important;
    min-height: 230px;
    background-position: center !important;
    display: block;
    transform: scale(1);
    transition: transform .45s ease, filter .45s ease;
  }

  .blog-page .theme-post-card--news:hover .theme-post-card__media--news {
    transform: scale(1.07);
    filter: saturate(1.04) contrast(1.03);
  }

  .blog-page .theme-post-card__content--news {
    flex: 1;
    padding: 22px 22px 20px !important;
    display: flex;
    flex-direction: column;
  }

  .blog-page .theme-post-card__headline {
    margin: 0 0 12px;
    min-height: 58px;
    font-size: clamp(1.05rem, 1.2vw, 1.28rem);
    line-height: 1.25;
    font-weight: 800;
  }

  .blog-page .theme-post-card__headline a {
    color: #091a39;
    text-decoration: none;
  }

  .blog-page .theme-post-card__headline a:hover,
  .blog-page .theme-post-card__headline a:focus {
    color: #d05a27;
  }

  .blog-page .theme-post-card__excerpt {
    flex: 1;
    color: #4a5568;
    font-size: 14px;
    line-height: 1.58;
    overflow: hidden;
  }

  .blog-page .theme-post-card__excerpt p {
    margin: 0;
  }

  .blog-page .theme-post-card__actions {
    margin-top: 18px;
  }

  .blog-page .theme-post-card__button--news {
    width: fit-content;
    min-height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 16px;
    border-radius: 999px;
    background: rgba(208, 90, 39, .08);
    color: #d05a27;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .05em;
    text-decoration: none;
    text-transform: uppercase;
    transition: background-color .25s ease, color .25s ease, transform .25s ease;
  }

  .blog-page .theme-post-card__button--news:hover,
  .blog-page .theme-post-card__button--news:focus {
    background: #d05a27;
    color: #ffffff;
    transform: translateY(-2px);
  }

  .blog-page .siguiente-anterior {
    grid-column: 1 / -1;
    margin-top: 16px;
  }

  @media (max-width: 1024px) {
    .blog-page .theme-post-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }

  @media (max-width: 760px) {
    .blog-page-hero {
      margin-top: 92px;
    }

    .blog-filters {
      grid-template-columns: 1fr;
      margin-top: 96px;
      gap: 12px;
    }

    .blog-filters__field {
      gap: 6px;
    }

    .blog-page .theme-post-grid {
      grid-template-columns: 1fr;
    }
  }
</style>
<main class="blog-page">
  <section id="main">
    <div class="row">
      <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>      		 

      		<div class="post">

      		   <?php the_content(); ?>

	        </div>


    <?php endwhile; endif ?>
    <?php
      $blog_search = isset($_GET['blog_search']) ? sanitize_text_field(wp_unslash($_GET['blog_search'])) : '';
      $blog_date = isset($_GET['blog_date']) ? sanitize_text_field(wp_unslash($_GET['blog_date'])) : '';
    ?>
    <form class="blog-filters" method="get" action="<?php echo esc_url(get_permalink()); ?>">
      <label class="blog-filters__field">
        <span class="blog-filters__label">Nombre</span>
        <input class="blog-filters__input" type="search" name="blog_search" value="<?php echo esc_attr($blog_search); ?>" placeholder="Buscar artículos">
      </label>
      <label class="blog-filters__field">
        <span class="blog-filters__label">Fecha</span>
        <input class="blog-filters__date" type="month" name="blog_date" value="<?php echo esc_attr($blog_date); ?>" aria-label="Filtrar por fecha">
      </label>
      <div class="blog-filters__field">
        <span class="blog-filters__label">Acción</span>
        <button class="blog-filters__button" type="submit">Filtrar</button>
      </div>
      <div class="blog-filters__field">
        <span class="blog-filters__label">&nbsp;</span>
        <a class="blog-filters__reset" href="<?php echo esc_url(get_permalink()); ?>">Limpiar</a>
      </div>
    </form>
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
              if ('' !== $blog_search) {
                  $custom_args['s'] = $blog_search;
              }
              if (preg_match('/^\d{4}-\d{2}$/', $blog_date)) {
                  list($filter_year, $filter_month) = array_map('intval', explode('-', $blog_date));
                  $custom_args['date_query'] = array(
                      array(
                          'year' => $filter_year,
                          'month' => $filter_month,
                      ),
                  );
              }
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
    <?php wp_reset_postdata(); ?>
    <?php else: ?>
    <p class="blog-empty"><?php _e('No hay artículos con esos filtros.'); ?></p>
    <?php endif; ?>
    <div class="col s12 m12 l12 center-align siguiente-anterior"><?php
        $big = 999999999; // need an unlikely integer
        
        echo preg_replace('/(class="page-numbers"|class=\'page-numbers\'|class="(next|prev) page-numbers")/i','class="page-numbers btn white-text boton-siguiente-anterior"',preg_replace('/(\n|\t)/','',paginate_links( array(
        	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        	'format' => '?paged=%#%',
        	'current' => max( 1, get_query_var('paged') ),
        	'total' => $custom_query->max_num_pages,
          'add_args' => array_filter(array(
              'blog_search' => $blog_search,
              'blog_date' => $blog_date,
          )),
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
