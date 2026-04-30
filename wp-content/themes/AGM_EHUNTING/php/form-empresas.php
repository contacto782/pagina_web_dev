<?php
session_start();
ini_set('display_errors', '0');
define( 'WP_USE_THEMES', false ); // Don't load theme support functionality
require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
if(sizeof($_POST)>0):
      $_SESSION['nombre'] = $_POST['tunombre'];
      
      $tunombre = $_POST['tunombre'];
      $tufono = $_POST['tufono'];
      $tumail = $_POST['tumail'];
      $tucargo = $_POST['tucargo'];
      $tumensaje = 'Nombre: '.$tunombre.'<br>Telefono: '.$tufono.'<br>Email: '.$tumail.'<br>Cargo: '.$tucargo.'<br>Mensaje: '.$_POST['tumensaje'];
      
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";    
      $headers .= 'From: eHunting LATAM <noreply@ehlatam.com>' . "\r\n";
      
      $captcha=$_POST['token'];
      $secretKey = "6LdHZasUAAAAAMCbR9i5cSXthbn8NUuijuBTRp7P";
      $ip = $_SERVER['REMOTE_ADDR'];

      // post request to server

      $url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
      $response = file_get_contents($url);
      $responseKeys = json_decode($response,true);
      header('Content-type: application/json');
      
      if(!$responseKeys['success']) {
        header('Location:'.home_url().'/#error');
      } 
      else {
      $envio2 = wp_mail('contacto@ehlatam.com', 'Mensaje desde el formulario de empresas', $tumensaje);
      echo $envio2 ? header('Location:/gracias') : header('Location:'.home_url().'/#error');
      }
endif;