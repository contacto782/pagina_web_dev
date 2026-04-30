<?php
//esto es para el footer
  $footer = get_post(1445);
  $footer_ID = $footer->ID;
  $values = get_post_custom( $footer_ID );
  $direccion = isset( $values['direccion'] ) ? esc_attr( $values['direccion'][0] ) : '';
  $direccionenlace = isset( $values['direccionenlace'] ) ? esc_attr( $values['direccionenlace'][0] ) : '';
  $telefono = isset( $values['telefono'] ) ? esc_attr( $values['telefono'][0] ) : '';
  $emailfooter = isset( $values['emailfooter'] ) ? esc_attr( $values['emailfooter'][0] ) : '';
?>