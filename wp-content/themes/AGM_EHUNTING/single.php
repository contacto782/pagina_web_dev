<?php get_header(); ?>
<section id="main" class="container">
    <article id="single">
      <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <h1 class="post-titulo center-align"><?php the_title(); ?></h1>
      <div class="main-single">
      <div class="post">
         <?php the_content(); ?>
    </div>
    <div class="row" style="margin-bottom:20px!important;">
    
    <div class="col s6 m6 l6 left-align"><?php previous_post_link('%link','%title',false,'91'); ?></div>
    <div class="col s6 m6 l6 right-align"><?php next_post_link('%link','%title',false,'91'); ?></div>
    
    </div>
    </div>
  <?php endwhile; ?>
  <?php endif; ?>
  	</article> <!-- Fin de single -->
    </section> <!-- Fin de main -->
<!-- #content-wrapper -->
<?php get_footer(); ?>