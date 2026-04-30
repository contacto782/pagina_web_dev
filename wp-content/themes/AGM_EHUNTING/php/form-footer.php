<?php
ini_set('display_errors', '0');
define( 'WP_USE_THEMES', false ); // Don't load theme support functionality
require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
if(sizeof($_POST)>0):
      $yourname = $_POST['your-name'];
      $yourmail = $_POST['your-email'];
      $yoursubject = $_POST['your-subject'];
      $yourmessage = 'Nombre: '.$yourname.'<br>Email: '.$yourmail.'<br>Asunto: '.$yoursubject.'<br>Mensaje: '.$_POST['your-message'];
      
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";    
      $headers .= 'From: eHunting LATAM <noreply@ehunting.cl>' . "\r\n";
      $headers .= 'Bcc: contacto@agmdigital.net' . "\r\n";
      
 
      $captcha=$_POST['token1'];
      $secretKey = "6LdHZasUAAAAAMCbR9i5cSXthbn8NUuijuBTRp7P";
      $ip = $_SERVER['REMOTE_ADDR'];

      $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
      $response = file_get_contents($url);
      $responseKeys = json_decode($response,true);
      header('Content-type: application/json');
      
      if(!$responseKeys['success']) {
          header('Location:'.home_url().'/#error');
      } 
      else {
      $envio1 = wp_mail('contacto@ehlatam.com', $yoursubject, $yourmessage);
      echo $envio1 ? header('Location:/gracias') : header('Location:'.home_url().'/#error');
      }
endif;