  <?
  $post_id = $post->ID;
  $values = get_post_custom( $post_id );
  
    //seccion slider
  $imagen1 = isset( $values['imagen1'] ) ? esc_attr( $values['imagen1'][0] ) : '';
  $imagen2 = isset( $values['imagen2'] ) ? esc_attr( $values['imagen2'][0] ) : '';
  $imagen3 = isset( $values['imagen3'] ) ? esc_attr( $values['imagen3'][0] ) : '';
  $tituloprincipal = isset( $values['tituloprincipal'] ) ? esc_attr( $values['tituloprincipal'][0] ) : '';
  $subtituloprincipal = isset( $values['subtituloprincipal'] ) ? esc_attr( $values['subtituloprincipal'][0] ) : '';

    //seccion que hacemos
  $tituloquehacemos = isset( $values['tituloquehacemos'] ) ? esc_attr( $values['tituloquehacemos'][0] ) : '';
  $quehacemostexto = isset( $values['quehacemostexto'] ) ? esc_attr( $values['quehacemostexto'][0] ) : '';
  $imagenquehacemos = isset( $values['imagenquehacemos'] ) ? esc_attr( $values['imagenquehacemos'][0] ) : '';

    //seccion blog 
  
  $tituloseccionblog = isset( $values['tituloseccionblog'] ) ? esc_attr( $values['tituloseccionblog'][0] ) : '';
  $textoseccionblog = isset( $values['textoseccionblog'] ) ? esc_attr( $values['textoseccionblog'][0] ) : '';
  
  //seccion sobre nosotros
  $titulosobrenosotros = isset( $values['titulosobrenosotros'] ) ? esc_attr( $values['titulosobrenosotros'][0] ) : '';
  $sobrenosotrostexto = isset( $values['sobrenosotrostexto'] ) ? esc_attr( $values['sobrenosotrostexto'][0] ) : '';
  $imagensobrenosotros = isset( $values['imagensobrenosotros'] ) ? esc_attr( $values['imagensobrenosotros'][0] ) : '';
  
  //seccion nuestros servicios
  $tituloseccionnuestrosservicios = isset( $values['tituloseccionnuestrosservicios'] ) ? esc_attr( $values['tituloseccionnuestrosservicios'][0] ) : '';
  $textoseccionnuestrosservicios = isset( $values['textoseccionnuestrosservicios'] ) ? esc_attr( $values['textoseccionnuestrosservicios'][0] ) : '';
  $imagennuestrosservicios = isset( $values['imagennuestrosservicios'] ) ? esc_attr( $values['imagennuestrosservicios'][0] ) : '';
  
  //seccion como trabajamos
  $titulocomotrabajamos = isset( $values['titulocomotrabajamos'] ) ? esc_attr( $values['titulocomotrabajamos'][0] ) : '';
  $comotrabajamostexto = isset( $values['comotrabajamostexto'] ) ? esc_attr( $values['comotrabajamostexto'][0] ) : '';
  $imagencomotrabajamos = isset( $values['imagencomotrabajamos'] ) ? esc_attr( $values['imagencomotrabajamos'][0] ) : '';
  
  //Nuestro equipo
  $tituloequipo = isset( $values['tituloequipo'] ) ? esc_attr( $values['tituloequipo'][0] ) : '';
  
  //seccion brochure
  $titulobrochure = isset( $values['titulobrochure'] ) ? esc_attr( $values['titulobrochure'][0] ) : '';
  $descargabrochure = isset( $values['descargabrochure'] ) ? esc_attr( $values['descargabrochure'][0] ) : '';
  $imagenbrochure = isset( $values['imagenbrochure'] ) ? esc_attr( $values['imagenbrochure'][0] ) : '';
  
  //seccion Imagenes en Lightbox
  $imagenmaterialbox1 = isset( $values['imagenmaterialbox1'] ) ? esc_attr( $values['imagenmaterialbox1'][0] ) : '';
  $imagenmaterialbox2 = isset( $values['imagenmaterialbox2'] ) ? esc_attr( $values['imagenmaterialbox2'][0] ) : '';
  $imagenmaterialbox3 = isset( $values['imagenmaterialbox3'] ) ? esc_attr( $values['imagenmaterialbox3'][0] ) : '';
  $imagenmaterialbox4 = isset( $values['imagenmaterialbox4'] ) ? esc_attr( $values['imagenmaterialbox4'][0] ) : '';
  $imagenmaterialbox5 = isset( $values['imagenmaterialbox5'] ) ? esc_attr( $values['imagenmaterialbox5'][0] ) : '';
  $imagenmaterialbox6 = isset( $values['imagenmaterialbox6'] ) ? esc_attr( $values['imagenmaterialbox6'][0] ) : '';
  $imagenmaterialbox7 = isset( $values['imagenmaterialbox7'] ) ? esc_attr( $values['imagenmaterialbox7'][0] ) : '';
  $imagenmaterialbox8 = isset( $values['imagenmaterialbox8'] ) ? esc_attr( $values['imagenmaterialbox8'][0] ) : '';
 
    ?>