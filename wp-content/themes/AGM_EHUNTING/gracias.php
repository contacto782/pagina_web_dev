<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_secure'   => is_ssl(),
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax',
    ]);
}

// Evita caché en esta página (muy importante)
if (!defined('DONOTCACHEPAGE'))   define('DONOTCACHEPAGE', true);
if (!defined('DONOTCACHEOBJECT')) define('DONOTCACHEOBJECT', true);
nocache_headers();

// Lee y BORRA de inmediato (flash)
$nombre = $_SESSION['nombre'] ?? '';
unset($_SESSION['nombre']);
session_write_close(); // persiste el unset y libera el candado

/**
 * Template Name: Gracias
 */
?>

 <?php get_header(); //#e7ebeb ?>

 <div class="row center-align clouds relative" style="background:url(<?= get_template_directory_uri() ?>/images/clouds.jpg) bottom/cover no-repeat;position: relative;top: 6.5px;margin-bottom:150px!important">
    <div class="container" style="padding-top:100px;">
        <img class="relative" src="<?= get_template_directory_uri() ?>/images/check.svg" width="100" style="border: solid 3px #43a047;border-radius: 50%;padding: 10px;">
        <p class="relative" style="font-size:35px;margin:6px auto;">
            Gracias <?= $nombre ?> por contactarnos
        </p>
        <span style="font-size:22px; padding:20px; display: block" class="light relative">
            Hemos recibido tu mensaje y pronto nos pondremos en <strong>contacto contigo</strong>
        </span>
    </div>
    <img class="relative" style="bottom:-15px" src="<?= get_template_directory_uri() ?>/images/borde.svg">
 </div>

 <?php get_footer(); ?>
 <?php session_destroy(); ?>
 <?php unset($_SESSION['nombre']); ?>
