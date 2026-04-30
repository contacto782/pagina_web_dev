<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

				<div class="page-content" style="position:relative;text-align:center;width:100%;background:white;margin:auto;padding:5%;"><div class="internerdz-404" style="width:100%;text-align:center;font-size:50px;font-weight:bold;">ERROR 404</div>

					<p style="text-align:center"><?php _e( 'La página que buscas no se encuentra en nuestro servidor. ¿Quizá puedes intentar en nuestro buscador?'); ?></p>

					<?php get_search_form(); ?></div>


<?php get_footer(); ?>
