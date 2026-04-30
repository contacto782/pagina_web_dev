<?php
namespace Sendmail;
ini_set('display_errors', 1);
define( 'WP_USE_THEMES', false ); // Don't load theme support functionality
require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
require(  __DIR__.'/PHPMailer-master/src/Exception.php');
require(  __DIR__.'/PHPMailer-master/src/PHPMailer.php');
require(  __DIR__.'/PHPMailer-master/src/SMTP.php');

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Sendmail{
    const HOST = 'smtp.gmail.com';
    const USER_NAME = 'contacto@ehlatam.com';
    const PASSWORD = 'itrxbmvlopadolyj';
    public $adminmail;
    public $admindomainname;
    const ADMINNAME = 'eHunting LATAM';
    const PORT = 587;
    function __construct() {
        //$this->adminmail = get_option('admin_email');
        //$this->admindomainname = explode('@',get_option('admin_email'));
        $this->adminmail = 'contacto@ehlatam.com';
        $this->admindomainname = ['contacto','ehlatam.com'];
    }

    public function SendMailContacto($Nombres,$telefono,$Email,$mensaje,$cargo){
        $nombre = self::ADMINNAME;
        $adminasunto = "Nuevo contacto desde el formulario {$nombre}";
        $headers = array('Content-Type: text/html; charset=UTF-8');
    
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = self::HOST;                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = self::USER_NAME;                     // SMTP username
            $mail->Password   = self::PASSWORD;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = self::PORT;                                    // TCP port to connect to
            $mail->CharSet    = PHPMailer::CHARSET_UTF8;
    
            //Recipients
            $mail->setFrom('noreply@'.$this->admindomainname[1], $nombre);
            $mail->addAddress($this->adminmail, $Nombres);
    
            // Content
            $mail->IsHTML(true);
            $mail->Subject = $adminasunto;
            $mail->Body    = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:auto;"><tr><td bgcolor="#ffffff" style="padding:40px;margin:auto;"><h1 style="text-align:left;color:#faa82d">Se ha recibido un nuevo mensaje</h1><p style="font-size:18px;">Mensaje del usuario: '.$Nombres.'<br>Email: '.$Email.'<br>Telefono: '.$telefono.'<br>Cargo: '.$cargo.'<br></p><p style="font-size:18px;">Cuerpo del mensaje: '.$mensaje.'</p></td></tr></table>';
            $mail->AltBody = 'Se ha recibido un mensaje del usuario: '.$Nombres.' Email: '.$Email.'Telefono: '.$telefono. 'Cuerpo del mensaje: '.$mensaje;
            $mail->send();
            //echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}
