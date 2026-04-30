<?php
session_start();
ini_set('display_errors', 1);
define( 'WP_USE_THEMES', false ); // Don't load theme support functionality
require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
require(  __DIR__.'/enviomail.php');

use Sendmail\Sendmail;

$secretKey = "6LdHZasUAAAAAMCbR9i5cSXthbn8NUuijuBTRp7P";
$url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['token']);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);
header('Content-type: application/json');

if(sizeof($_POST) > 0 && $responseKeys['success']):
$_SESSION['nombre'] = $_POST['tunombre'];
$mail = new Sendmail();
$mail->SendMailContacto($_POST['tunombre'],$_POST['tufono'],$_POST['tumail'],$_POST['tumensaje'],$_POST['tucargo']);

header('Location: /gracias');

else:

    unset($_SESSION['nombre']);

endif;
exit;



