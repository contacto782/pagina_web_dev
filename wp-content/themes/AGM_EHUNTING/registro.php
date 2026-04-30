<?php
/**
 * plantilla para mostrar registro
 *
 */
?>

<div class="login-container">
<div class="login-form-container">
<h2>REGISTRATE</h2>
<div class="login-form-logo"></div>

<div class="form-container">
<form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
  <div class="login-form">
      <input type="text" id="user" name="user" class="login-form" value="<?php echo isset($_POST['user']) ? $_POST['user'] : null;?>" placeholder="Usuario" required aria-required="true" />
    </div>
    <div class="login-form">
      <input type="email" id="email" name="email" class="login-form" value="<?php echo(isset($_POST['email']) ? $_POST['email'] : null); ?>" placeholder="Email" required aria-required="true" />
      </div>
    <div class="submit-login-form">
<input type="submit" class="login-form-submit" id="submit" name="submit" value="Enviar" />
    </div>
    <input type="text" name="verificacion" id="verificacion" class="verif" value="" size="25" /><a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Perdí mi Contraseña</a>
</form>


</div></div></div>

<?php
 if (isset( $_POST['submit'] )) { //El formulario ha sido enviado
  global $reg_errors;
  $reg_errors = new WP_Error;

  $user = sanitize_text_field($_POST['user']);
  $email = sanitize_email($_POST['email']);
  $exists = email_exists($email);

$verificacion = $_POST['verificacion'];

if (empty($verificacion)){ }
else{
die("Error: Su informacion no pudo ser enviada, intente mas tarde");
} 

  //Comprobamos que los campos obligatorios no están vacios
  if ( empty( $user ) ) {
    $reg_errors->add("El campo nombre es obligatorio");
  }
  if ( empty( $email ) ) {
    $reg_errors->add("El campo e-mail es obligatorio");
  }
  //Comprobamos que el email tenga un formato de email válido
  if ( !is_email( $email ) ) {
    $reg_errors->add("El e-mail no tiene un formato válido" );
  }
  if ( $exists ) {
    echo "El Email que has colocado ya existe";
  }
  if ( is_wp_error( $reg_errors ) ) {
    if (count($reg_errors->get_error_messages()) > 0) {
      foreach ( $reg_errors->get_error_messages() as $error ) {
        echo $error . "<br />";
      }
    }
  }

  if (count($reg_errors->get_error_messages()) == 0) {
    $password = wp_generate_password();

    $userdata = array(
      'user_login' => $user,
      'user_email' => $email,
      'user_pass' => $password
    );

    $user_id = wp_insert_user( $userdata );

    //Si todo ha ido bien, agregamos los campos adicionales
    if ( ! is_wp_error( $user_id ) ) {

      wp_new_user_notification( $user_id, 'both' );
    }
  }
}

?>
