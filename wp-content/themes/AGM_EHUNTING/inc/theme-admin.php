<?php
//agregar metabox de slider a inicio
function agregar_metabox_inicio_slider() {
global $post;
if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
add_meta_box( 'metabox_inicio_slider', 'Slider Principal', 'metabox_inicio_slider_callback', 'Page', 'normal', 'high' );
}
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_inicio_slider' );


function metabox_inicio_slider_callback( $post )
{
$post_id = $post->ID;
$values = get_post_custom( $post->ID );
$tituloprincipal = isset( $values['tituloprincipal'] ) ? esc_attr( $values['tituloprincipal'][0] ) : '';
$subtituloprincipal = isset( $values['subtituloprincipal'] ) ? esc_attr( $values['subtituloprincipal'][0] ) : '';
$imagen1 = isset( $values['imagen1'] ) ? esc_attr( $values['imagen1'][0] ) : '';
$imagen2 = isset( $values['imagen2'] ) ? esc_attr( $values['imagen2'][0] ) : '';
$imagen3 = isset( $values['imagen3'] ) ? esc_attr( $values['imagen3'][0] ) : '';

wp_nonce_field( 'my_meta_box_nonce1', 'meta_box_nonce1' );
?>

<div class="contenedor row">
    <p><strong>Agrega aquí la imágen principal y las bajadas</strong></p>

    <div class="contenedor-servicio col s12 m12 l12" style="margin-bottom:10px;">
        <div class="col s12 m4 l4">
            <input class="definir_imagem_url input-texto-imagen" type="text" name="imagen1"
                value="<?php echo $imagen1 ?>">
            <input class="definir_imagem_button button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
        <div class="col s12 m4 l4">
            <input class="definir_imagem_url input-texto-imagen" type="text" name="imagen2"
                value="<?php echo $imagen2 ?>">
            <input class="definir_imagem_button button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
        <div class="col s12 m4 l4">
            <input class="definir_imagem_url input-texto-imagen" type="text" name="imagen3"
                value="<?php echo $imagen3 ?>">
            <input class="definir_imagem_button button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
        <div class="col s12 m4 l4">
            <input type="text" name="tituloprincipal" placeholder="Titulo Principal de la Empresa"
                value="<? echo $tituloprincipal ?>" class="col l12 m12 s12">
        </div>
        <div class="col s12 m4 l4">
            <input type="text" name="subtituloprincipal" placeholder="Subtitulo Principal"
                value="<? echo $subtituloprincipal ?>" class="col l12 m12 s12">
        </div>
    </div>

</div>

<script>
//script para cargar imágen principal
$('.definir_imagem_button').each(function(index) {
    var imagenboton = $('.definir_imagem_button');
    $(imagenboton[index]).click(function(e) {
        e.preventDefault();
        var btnClicked = $(this);
        var custom_uploader = wp.media({
                title: 'Selecionar Imagem',
                button: {
                    text: 'Definir Imagem'
                },
                multiple: false //para seleccionar multiples imágenes
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $(btnClicked).parent().children('.definir_imagem_url').val(attachment.url);
            })
            .open();
    });
});
</script>

<?php

}

add_action( 'save_post', 'slider_inicio_metabox_save' );
function slider_inicio_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce1'] ) || !wp_verify_nonce( $_POST['meta_box_nonce1'], 'my_meta_box_nonce1' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    $allowed = array(
        'a' => array(
            'href' => array()
        )
    );

    update_post_meta($post_id, 'tituloprincipal' ,  $_POST['tituloprincipal']);
    update_post_meta($post_id, 'subtituloprincipal' ,  $_POST['subtituloprincipal']);
    update_post_meta($post_id, 'imagen1' ,  $_POST['imagen1']);
    update_post_meta($post_id, 'imagen2' ,  $_POST['imagen2']);
    update_post_meta($post_id, 'imagen3' ,  $_POST['imagen3']);

}

//agregar metabox Seccion Que Hacemos
function agregar_metabox_inicio() {
    global $post;
    if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_inicio', 'Sección Qué Hacemos', 'metabox_inicio_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_inicio' );


function metabox_inicio_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );

  $tituloquehacemos = isset( $values['tituloquehacemos'] ) ? esc_attr( $values['tituloquehacemos'][0] ) : '';
  $quehacemostexto = isset( $values['quehacemostexto'] ) ? esc_attr( $values['quehacemostexto'][0] ) : '';
  $imagenquehacemos = isset( $values['imagenquehacemos'] ) ? esc_attr( $values['imagenquehacemos'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>

<div class="contenedor row">
    <p><strong>Llene la información de la sección</strong></p>

    <div class="col s12 m12 l12" style="margin:20px auto">

        <input type="text" name="tituloquehacemos" value="<?php echo $tituloquehacemos ?>"
            placeholder="Titulo Que Hacemos">
    </div>

    <div class="col s12 m12 l12">

        <?php wp_editor(html_entity_decode(stripslashes($quehacemostexto)), 'quehacemostexto', array('media_buttons' => false, 'quicktags' => false) ) ?>
    </div>

    <div class="contenedor-imagen-quehacemos col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenquehacemosurl input-texto-imagen" type="text" name="imagenquehacemos"
                value="<?php echo $imagenquehacemos ?>" placeholder="Imagen Que Hacemos">
            <input class="definir_imagenquehacemos button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>
</div>

<script>
//script para cargar imágen que hacemos
$('.definir_imagenquehacemos').click(function(e) {
    e.preventDefault();
    var btnClicked = $(this);
    var custom_uploader = wp.media({
            title: 'Selecionar Imagen',
            button: {
                text: 'Definir Imagen'
            },
            multiple: false //para seleccionar multiples imágenes
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $(btnClicked).parent().children('.definirimagenquehacemosurl').val(attachment.url);
        })
        .open();
});
</script>

<?php
}
add_action( 'save_post', 'quehacemos_metabox_save' );
function quehacemos_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    update_post_meta($post_id, 'tituloquehacemos' ,  $_POST['tituloquehacemos']);
    update_post_meta($post_id, 'quehacemostexto' ,  $_POST['quehacemostexto']);
    update_post_meta($post_id, 'imagenquehacemos' ,  $_POST['imagenquehacemos']);


}

//agregar metabox Seccion Sobre Nosotros
function agregar_metabox_inicio_sobrenosotros() {
    global $post;
    if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_inicio_sobrenosotros', 'Sección Sobre Nosotros', 'metabox_inicio_sobrenosotros_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_inicio_sobrenosotros' );


function metabox_inicio_sobrenosotros_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );

  $titulosobrenosotros = isset( $values['titulosobrenosotros'] ) ? esc_attr( $values['titulosobrenosotros'][0] ) : '';
  $sobrenosotrostexto = isset( $values['sobrenosotrostexto'] ) ? esc_attr( $values['sobrenosotrostexto'][0] ) : '';
  $imagensobrenosotros = isset( $values['imagensobrenosotros'] ) ? esc_attr( $values['imagensobrenosotros'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce_sobrenosotros', 'meta_box_nonce_sobrenosotros' );
    ?>

<div class="contenedor row">
    <p><strong>Llene la información de la sección</strong></p>

    <div class="col s12 m12 l12" style="margin:20px auto">

        <input type="text" name="titulosobrenosotros" value="<?php echo $titulosobrenosotros ?>"
            placeholder="Titulo Sobre Nosotros">
    </div>

    <div class="col s12 m12 l12">

        <?php wp_editor(html_entity_decode(stripslashes($sobrenosotrostexto)), 'sobrenosotrostexto', array('teeny' => true, 'media_buttons' => false, 'quicktags' => false) ) ?>
    </div>

    <div class="contenedor-imagen-sobrenosotros col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagensobrenosotrosurl input-texto-imagen" type="text" name="imagensobrenosotros"
                value="<?php echo $imagensobrenosotros ?>" placeholder="Imagen Sobre Nosotros">
            <input class="definir_imagensobrenosotros button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>
</div>
<script>
//script para cargar imágen sobre nosotros
$('.definir_imagensobrenosotros').click(function(e) {
    e.preventDefault();
    var btnClicked = $(this);
    var custom_uploader = wp.media({
            title: 'Selecionar Imagen',
            button: {
                text: 'Definir Imagen'
            },
            multiple: false //para seleccionar multiples imágenes
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $(btnClicked).parent().children('.definirimagensobrenosotrosurl').val(attachment.url);
        })
        .open();
});
</script>

<?php
}
add_action( 'save_post', 'sobrenosotros_metabox_save' );
function sobrenosotros_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce_sobrenosotros'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_sobrenosotros'], 'my_meta_box_nonce_sobrenosotros' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    update_post_meta($post_id, 'titulosobrenosotros' ,  $_POST['titulosobrenosotros']);
    update_post_meta($post_id, 'sobrenosotrostexto' ,  $_POST['sobrenosotrostexto']);
    update_post_meta($post_id, 'imagensobrenosotros' ,  $_POST['imagensobrenosotros']);


}

//agregar metabox Seccion Blog
function agregar_metabox_seccionblog() {
    global $post;
    if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_inicio_blog', 'Sección Blog', 'metabox_seccionblog_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_seccionblog' );


function metabox_seccionblog_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );

  $tituloseccionblog = isset( $values['tituloseccionblog'] ) ? esc_attr( $values['tituloseccionblog'][0] ) : '';
  $textoseccionblog = isset( $values['textoseccionblog'] ) ? esc_attr( $values['textoseccionblog'][0] ) : '';

    wp_nonce_field( 'metaboxblog', 'metaboxblognonce' );
    ?>

<div class="contenedor row">
    <p><strong>Llene la información de la sección</strong></p>

    <div class="col s12 m12 l12" style="margin:20px auto">

        <input type="text" name="tituloseccionblog" value="<?php echo $tituloseccionblog ?>"
            placeholder="Titulo Seccion Blog">
    </div>

    <div class="col s12 m12 l12">

        <?php wp_editor(html_entity_decode(stripslashes($textoseccionblog)), 'textoseccionblog', array('teeny' => true, 'media_buttons' => false, 'quicktags' => false) ) ?>
    </div>
</div>

<?php
}
add_action( 'save_post', 'seccionblog_metabox_save' );
function seccionblog_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['metaboxblognonce'] ) || !wp_verify_nonce( $_POST['metaboxblognonce'], 'metaboxblog' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    update_post_meta($post_id, 'tituloseccionblog' ,  $_POST['tituloseccionblog']);
    update_post_meta($post_id, 'textoseccionblog' ,  $_POST['textoseccionblog']);

}
//agregar metabox Seccion Equipo
function agregar_metabox_inicio_equipo() {
    global $post;
    if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_inicio_equipo', 'Sección Equipo', 'metabox_inicio_equipo_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_inicio_equipo' );


function metabox_inicio_equipo_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );

  $tituloequipo = isset( $values['tituloequipo'] ) ? esc_attr( $values['tituloequipo'][0] ) : '';
  $imagenequipo = isset( $values['imagenequipo'] ) ? esc_attr( $values['imagenequipo'][0] ) : '';

  $textocartaequipo = isset( $values['textocartaequipo'] ) ? esc_attr( $values['textocartaequipo'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce_equipo', 'meta_box_nonce_equipo' );
    ?>

<div class="contenedor row">
    <p><strong>Llene la información de la sección</strong></p>

    <div class="col s12 m12 l12" style="margin:20px auto">

        <input type="text" name="tituloequipo" value="<?php echo $tituloequipo ?>" placeholder="Titulo Equipo">
    </div>

    <div class="contenedor-carta-equipo col s12 m12 l12" style="margin:20px auto">
        <?php

        for($i=0;$i<=15;$i++){
					$titulocartaequipo = get_post_meta($post_id,'titulocartaequipo'.$i,true);
	        $cargoequipo = get_post_meta($post_id,'cargoequipo'.$i,true);
	        $imagenequipo = get_post_meta($post_id,'imagenequipo'.$i,true);
	        $textocartaequipo = get_post_meta($post_id,'textocartaequipo'.$i,true);
	        $cargoequipo = get_post_meta($post_id,'cargoequipo'.$i,true);
	        $linkedinequipo = get_post_meta($post_id,'linkedinequipo'.$i,true);
	        $fonoequipo = get_post_meta($post_id,'fonoequipo'.$i,true);
	        $mailequipo = get_post_meta($post_id,'mailequipo'.$i,true);

          if (!empty($titulocartaequipo)) {
            echo '<div class="col s12 m4 l4 inputs-equipo"><div class="col s12 m12 l12">
            <input class="titulocartaequipo input-texto-imagen" type="text" name="titulocartaequipo'.$i.'" value="'. get_post_meta($post_id,'titulocartaequipo'.$i,true) .'" placeholder="Nombre del trabajador" >
            <input class="cargoequipo input-texto-imagen" type="text" name="cargoequipo'.$i.'" value="'. $cargoequipo .'" placeholder="Cargo del trabajador" >
            <input class="linkedinequipo input-texto-imagen" type="text" name="linkedinequipo'.$i.'" value="'. $linkedinequipo .'" placeholder="Linkedin del trabajador" >
            <input class="mailequipo input-texto-imagen" type="text" name="mailequipo'.$i.'" value="'. $mailequipo .'" placeholder="Mail del trabajador" >
            <input class="fonoequipo input-texto-imagen" type="text" name="fonoequipo'.$i.'" value="'. $fonoequipo .'" placeholder="Fono del trabajador" >
            </div><div class="col s12 m12 l12"><input class="definirimagenequipourl input-texto-imagen" type="text" name="imagenequipo'.$i.'" value="'.$imagenequipo.'" placeholder="Imagen Fondo equipo" ><input class="definir_imagenequipo button input-de-imagen btn" type="button" value="subir imagen" /></div><div class="col s12 m12 l12"><textarea id="editortiny'.$i.'" name="textocartaequipo'.$i.'">'.$textocartaequipo.'</textarea></div></div>';
						}
					} ?>
    </div>

</div>
<button class="agregarmiembroequipo">Agregar nuevo miembro del equipo</button>
<script>
//script para cargar imágen principal

jQuery(document).ready(function(e) {

    function scriptimagen() {
        $('.definir_imagenequipo').each(function(index) {
            var imagenboton = $('.definir_imagenequipo');
            var contenedorcarta = $('.contenedor-carta-equipo')
            $(contenedorcarta[index]).on('click', '.definir_imagenequipo', function(e) {
                e.preventDefault();
                var btnClicked = $(this);
                var custom_uploader = wp.media({
                        title: 'Selecionar Imagen',
                        button: {
                            text: 'Definir Imagen'
                        },
                        multiple: false //para seleccionar multiples imágenes
                    })
                    .on('select', function() {
                        var attachment = custom_uploader.state().get('selection').first()
                            .toJSON();
                        $(btnClicked).parent().children('.definirimagenequipourl').val(
                            attachment.url);
                    })
                    .open();
            });
        });
    }

    var max_fields = 15;

    var names = [];
    var names1 = []
    var faltante;
    var faltante1 = [];

    function definirfaltante() {
        $('.titulocartaequipo').each(function() {
            names.push($(this).attr('name')); // ids.push(this.id) would work as well.
        });
        for (i = 0; i < names.length; i++) {
            names1.push(names[i].replace(/\D/g, ''));
        }

        for (var o = 1; o < names1.length; o++) {
            if (names1[o] - names1[o - 1] != 1) {
                faltante = names1[o] - 1;
                faltante1.push(faltante);
            }
        }

        var stringdeinput = $('.titulocartaequipo:last').attr('name');
        var x = stringdeinput.replace(/\D/g, '');
        scriptimagen();

    };
    if ($('.titulocartaequipo').length) {
        definirfaltante()
    };


    for (var x = 0; x <= $('.titulocartaequipo').length; x++) {
        var b = x + 1;

    }

    if (!$('.titulocartaequipo').length) {
        x = 0
    } else {
        x = x - 1
    }


    // Para agregar el input del titulo de la carta
    $(document).on('click', '.agregarmiembroequipo', function() {
        if (x < max_fields) {
            x++;
        } else if (x == max_fields) {
            return false
        };

        if (faltante1 != '') {
            var b = faltante1.pop();
        } else {
            var b = x
        };

        $('.contenedor-carta-equipo').append(
            '<div class="col s12 m4 l4 inputs-equipo"><div class="col s12 m12 l12"><input class="titulocartaequipo input-texto-imagen" type="text" name="titulocartaequipo' +
            b +
            '" value="" placeholder="Nombre del trabajador" ><input class="cargoequipo input-texto-imagen" type="text" name="cargoequipo' +
            b +
            '" value="" placeholder="Cargo del trabajador" ><input class="linkedinequipo input-texto-imagen" type="text" name="linkedinequipo' +
            b +
            '" value="" placeholder="Linkedin del trabajador" ><input class="mailequipo input-texto-imagen" type="text" name="mailequipo' +
            b +
            '" value="" placeholder="Mail del trabajador" ><input class="fonoequipo input-texto-imagen" type="text" name="fonoequipo' +
            b +
            '" value="" placeholder="Fono del trabajador" ></div><div class="col s12 m12 l12"><input class="definirimagenequipourl input-texto-imagen" type="text" name="imagenequipo' +
            b +
            '" value="" placeholder="Imagen Fondo equipo" ><input class="definir_imagenequipo button input-de-imagen btn" type="button" value="subir imagen" /></div><div class="col s12 m12 l12"><textarea id="editortiny' +
            b + '" name="textocartaequipo' + b + '"></textarea></div></div>');

    });
});
</script>

<?php

}
add_action( 'save_post', 'equipo_metabox_save' );
function equipo_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce_equipo'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_equipo'], 'my_meta_box_nonce_equipo' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    for ($i = 0; $i < 16; $i++ ) {

    update_post_meta($post_id, 'tituloequipo' ,  $_POST['tituloequipo']);
    update_post_meta($post_id, 'titulocartaequipo'.$i ,  $_POST['titulocartaequipo'.$i]);
    update_post_meta($post_id, 'imagenequipo'.$i ,  $_POST['imagenequipo'.$i]);
    update_post_meta($post_id, 'textocartaequipo'.$i ,  $_POST['textocartaequipo'.$i]);
    update_post_meta($post_id, 'cargoequipo'.$i ,  $_POST['cargoequipo'.$i]);
    update_post_meta($post_id, 'linkedinequipo'.$i ,  $_POST['linkedinequipo'.$i]);
    update_post_meta($post_id, 'mailequipo'.$i ,  $_POST['mailequipo'.$i]);
    update_post_meta($post_id, 'fonoequipo'.$i ,  $_POST['fonoequipo'.$i]);

    }

}

//agregar metabox Seccion Nuestros servicios
function agregar_metabox_nuestrosservicios() {
    global $post;
    if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_inicio_nuestrosservicios', 'Sección Nuestros Servicios', 'metabox_nuestrosservicios_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_nuestrosservicios' );


function metabox_nuestrosservicios_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );

  $tituloseccionnuestrosservicios = isset( $values['tituloseccionnuestrosservicios'] ) ? esc_attr( $values['tituloseccionnuestrosservicios'][0] ) : '';
  $textoseccionnuestrosservicios = isset( $values['textoseccionnuestrosservicios'] ) ? esc_attr( $values['textoseccionnuestrosservicios'][0] ) : '';
  $imagennuestrosservicios = isset( $values['imagennuestrosservicios'] ) ? esc_attr( $values['imagennuestrosservicios'][0] ) : '';



    wp_nonce_field( 'metaboxnuestrosservicios', 'metaboxnuestrosserviciosnonce' );
    ?>

<div class="contenedor row">
    <p><strong>Llene la información de la sección</strong></p>

    <div class="col s12 m12 l12" style="margin:20px auto">

        <input type="text" name="tituloseccionnuestrosservicios" value="<?php echo $tituloseccionnuestrosservicios ?>"
            placeholder="Titulo Seccion Nuestros Servicios">
    </div>

    <div class="col s12 m12 l12">

        <?php wp_editor(html_entity_decode(stripslashes($textoseccionnuestrosservicios)), 'textoseccionnuestrosservicios', array('teeny' => true, 'media_buttons' => false, 'quicktags' => false) ) ?>
    </div>

    <div class="contenedor-imagen-sobrenosotros col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagennuestrosserviciosurl input-texto-imagen" type="text"
                name="imagennuestrosservicios" value="<?php echo $imagennuestrosservicios ?>"
                placeholder="Imagen Sobre Nosotros">
            <input class="definir_imagennuestrosservicios button input-de-imagen btn" type="button"
                value="subir imagen" />
        </div>
    </div>
</div>

<script>
//script para cargar imágen sobre nosotros
$('.definir_imagennuestrosservicios').click(function(e) {
    e.preventDefault();
    var btnClicked = $(this);
    var custom_uploader = wp.media({
            title: 'Selecionar Imagen',
            button: {
                text: 'Definir Imagen'
            },
            multiple: false //para seleccionar multiples imágenes
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $(btnClicked).parent().children('.definirimagennuestrosserviciosurl').val(attachment.url);
        })
        .open();
});
</script>


<?php
}
add_action( 'save_post', 'nuestrosservicios_metabox_save' );
function nuestrosservicios_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['metaboxnuestrosserviciosnonce'] ) || !wp_verify_nonce( $_POST['metaboxnuestrosserviciosnonce'], 'metaboxnuestrosservicios' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    update_post_meta($post_id, 'tituloseccionnuestrosservicios' ,  $_POST['tituloseccionnuestrosservicios']);
    update_post_meta($post_id, 'textoseccionnuestrosservicios' ,  $_POST['textoseccionnuestrosservicios']);
    update_post_meta($post_id, 'imagennuestrosservicios' ,  $_POST['imagennuestrosservicios']);
}
//agregar metabox Seccion Como Trabajamos
function agregar_metabox_inicio_comotrabajamos() {
    global $post;
    if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_inicio_comotrabajamos', 'Sección Como Trabajamos', 'metabox_inicio_comotrabajamos_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_inicio_comotrabajamos' );


function metabox_inicio_comotrabajamos_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );

  $titulocomotrabajamos = isset( $values['titulocomotrabajamos'] ) ? esc_attr( $values['titulocomotrabajamos'][0] ) : '';
  $comotrabajamostexto = isset( $values['comotrabajamostexto'] ) ? esc_attr( $values['comotrabajamostexto'][0] ) : '';
  $imagencomotrabajamos = isset( $values['imagencomotrabajamos'] ) ? esc_attr( $values['imagencomotrabajamos'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce_comotrabajamos', 'meta_box_nonce_comotrabajamos' );
    ?>

<div class="contenedor row">
    <p><strong>Llene la información de la sección</strong></p>

    <div class="col s12 m12 l12" style="margin:20px auto">

        <input type="text" name="titulocomotrabajamos" value="<?php echo $titulocomotrabajamos ?>"
            placeholder="Titulo Como Trabajamos">
    </div>

    <div class="col s12 m12 l12">

        <?php wp_editor(html_entity_decode(stripslashes($comotrabajamostexto)), 'comotrabajamostexto', array('teeny' => true, 'media_buttons' => false, 'quicktags' => false) ) ?>
    </div>

    <div class="contenedor-imagen-comotrabajamos col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagencomotrabajamosurl input-texto-imagen" type="text" name="imagencomotrabajamos"
                value="<?php echo $imagencomotrabajamos ?>" placeholder="Imagen Somo Trabajamos">
            <input class="definir_imagencomotrabajamos button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>
</div>
<script>
//script para cargar imágen sobre nosotros
$('.definir_imagencomotrabajamos').click(function(e) {
    e.preventDefault();
    var btnClicked = $(this);
    var custom_uploader = wp.media({
            title: 'Selecionar Imagen',
            button: {
                text: 'Definir Imagen'
            },
            multiple: false //para seleccionar multiples imágenes
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $(btnClicked).parent().children('.definirimagencomotrabajamosurl').val(attachment.url);
        })
        .open();
});
</script>

<?php
}
add_action( 'save_post', 'comotrabajamos_metabox_save' );
function comotrabajamos_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce_comotrabajamos'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_comotrabajamos'], 'my_meta_box_nonce_comotrabajamos' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    update_post_meta($post_id, 'titulocomotrabajamos' ,  $_POST['titulocomotrabajamos']);
    update_post_meta($post_id, 'comotrabajamostexto' ,  $_POST['comotrabajamostexto']);
    update_post_meta($post_id, 'imagencomotrabajamos' ,  $_POST['imagencomotrabajamos']);


}

//agregar metabox Seccion Brochure Ehunting
function agregar_metabox_inicio_brochure() {
    global $post;
    if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_inicio_brochure', 'Sección Brochure Ehunting', 'metabox_inicio_brochure_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_inicio_brochure' );


function metabox_inicio_brochure_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );

  $titulobrochure = isset( $values['titulobrochure'] ) ? esc_attr( $values['titulobrochure'][0] ) : '';
  $imagenbrochure = isset( $values['imagenbrochure'] ) ? esc_attr( $values['imagenbrochure'][0] ) : '';
  $descargabrochure = isset( $values['descargabrochure'] ) ? esc_attr( $values['descargabrochure'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce_brochure', 'meta_box_nonce_brochure' );
    ?>

<div class="contenedor row">
    <p><strong>Llene la información de la sección</strong></p>

    <div class="col s12 m12 l12" style="margin:20px auto">

        <input type="text" name="titulobrochure" value="<?php echo $titulobrochure ?>"
            placeholder="Titulo Brochure Ehunting">
    </div>

    <div class="contenedor-descarga-brochure col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenbrochureurl input-texto-imagen" type="text" name="descargabrochure"
                value="<?php echo $descargabrochure ?>" placeholder="Archivo Brochure">
            <input class="definir_imagenbrochure button input-de-imagen btn" type="button" value="subir descarga" />
        </div>
    </div>

    <div class="contenedor-imagen-brochure col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenbrochureurl input-texto-imagen" type="text" name="imagenbrochure"
                value="<?php echo $imagenbrochure ?>" placeholder="Imagen Fondo Brochure">
            <input class="definir_imagenbrochure button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>
</div>
<script>
//script para cargar imágen principal
$('.definir_imagenbrochure').each(function(index) {
    var imagenboton = $('.definir_imagenbrochure');
    $(imagenboton[index]).click(function(e) {
        e.preventDefault();
        var btnClicked = $(this);
        var custom_uploader = wp.media({
                title: 'Selecionar Imagem',
                button: {
                    text: 'Definir Imagem'
                },
                multiple: false //para seleccionar multiples imágenes
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $(btnClicked).parent().children('.definirimagenbrochureurl').val(attachment.url);
            })
            .open();
    });
});
</script>

<?php
}
add_action( 'save_post', 'brochure_metabox_save' );
function brochure_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce_brochure'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_brochure'], 'my_meta_box_nonce_brochure' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    update_post_meta($post_id, 'titulobrochure' ,  $_POST['titulobrochure']);
    update_post_meta($post_id, 'descargabrochure' ,  $_POST['descargabrochure']);
    update_post_meta($post_id, 'imagenbrochure' ,  $_POST['imagenbrochure']);


}


//agregar metabox Seccion material box
function agregar_metabox_inicio_materialbox() {
    global $post;
    if ( 'inicio.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_inicio_materialbox', 'Sección Imagenes Lightbox', 'metabox_inicio_materialbox_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_inicio_materialbox' );


function metabox_inicio_materialbox_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );

  $imagenmaterialbox1 = isset( $values['imagenmaterialbox1'] ) ? esc_attr( $values['imagenmaterialbox1'][0] ) : '';
  $imagenmaterialbox2 = isset( $values['imagenmaterialbox2'] ) ? esc_attr( $values['imagenmaterialbox2'][0] ) : '';
  $imagenmaterialbox3 = isset( $values['imagenmaterialbox3'] ) ? esc_attr( $values['imagenmaterialbox3'][0] ) : '';
  $imagenmaterialbox4 = isset( $values['imagenmaterialbox4'] ) ? esc_attr( $values['imagenmaterialbox4'][0] ) : '';
  $imagenmaterialbox5 = isset( $values['imagenmaterialbox5'] ) ? esc_attr( $values['imagenmaterialbox5'][0] ) : '';
  $imagenmaterialbox6 = isset( $values['imagenmaterialbox6'] ) ? esc_attr( $values['imagenmaterialbox6'][0] ) : '';
  $imagenmaterialbox7 = isset( $values['imagenmaterialbox7'] ) ? esc_attr( $values['imagenmaterialbox7'][0] ) : '';
  $imagenmaterialbox8 = isset( $values['imagenmaterialbox8'] ) ? esc_attr( $values['imagenmaterialbox8'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce_materialbox', 'meta_box_nonce_materialbox' );
    ?>

<div class="contenedor row">
    <p><strong>Llene la información de la sección</strong></p>

    <div class="contenedor-imagen-materialbox col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenmaterialboxurl input-texto-imagen" type="text" name="imagenmaterialbox1"
                value="<?php echo $imagenmaterialbox1 ?>" placeholder="Imagen Imagenes Lightbox">
            <input class="definir_imagenmaterialbox button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>

    <div class="contenedor-imagen-materialbox col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenmaterialboxurl input-texto-imagen" type="text" name="imagenmaterialbox2"
                value="<?php echo $imagenmaterialbox2 ?>" placeholder="Imagen Imagenes Lightbox">
            <input class="definir_imagenmaterialbox button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>

    <div class="contenedor-imagen-materialbox col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenmaterialboxurl input-texto-imagen" type="text" name="imagenmaterialbox3"
                value="<?php echo $imagenmaterialbox3 ?>" placeholder="Imagen Imagenes Lightbox">
            <input class="definir_imagenmaterialbox button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>

    <div class="contenedor-imagen-materialbox col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenmaterialboxurl input-texto-imagen" type="text" name="imagenmaterialbox4"
                value="<?php echo $imagenmaterialbox4 ?>" placeholder="Imagen Imagenes Lightbox">
            <input class="definir_imagenmaterialbox button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>

    <div class="contenedor-imagen-materialbox col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenmaterialboxurl input-texto-imagen" type="text" name="imagenmaterialbox5"
                value="<?php echo $imagenmaterialbox5 ?>" placeholder="Imagen Imagenes Lightbox">
            <input class="definir_imagenmaterialbox button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>

    <div class="contenedor-imagen-materialbox col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenmaterialboxurl input-texto-imagen" type="text" name="imagenmaterialbox6"
                value="<?php echo $imagenmaterialbox6 ?>" placeholder="Imagen Imagenes Lightbox">
            <input class="definir_imagenmaterialbox button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>

    <div class="contenedor-imagen-materialbox col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenmaterialboxurl input-texto-imagen" type="text" name="imagenmaterialbox7"
                value="<?php echo $imagenmaterialbox7 ?>" placeholder="Imagen Imagenes Lightbox">
            <input class="definir_imagenmaterialbox button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>

    <div class="contenedor-imagen-materialbox col s12 m12 l12" style="margin:20px auto">
        <div class="col s12 m4 l4">
            <input class="definirimagenmaterialboxurl input-texto-imagen" type="text" name="imagenmaterialbox8"
                value="<?php echo $imagenmaterialbox8 ?>" placeholder="Imagen Imagenes Lightbox">
            <input class="definir_imagenmaterialbox button input-de-imagen btn" type="button" value="subir imagen" />
        </div>
    </div>

</div>
<script>
//script para cargar imágen principal
$('.definir_imagenmaterialbox').each(function(index) {
    var imagenboton = $('.definir_imagenmaterialbox');
    $(imagenboton[index]).click(function(e) {
        e.preventDefault();
        var btnClicked = $(this);
        var custom_uploader = wp.media({
                title: 'Selecionar Imagem',
                button: {
                    text: 'Definir Imagem'
                },
                multiple: false //para seleccionar multiples imágenes
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $(btnClicked).parent().children('.definirimagenmaterialboxurl').val(attachment.url);
            })
            .open();
    });
});
</script>

<?php
}
add_action( 'save_post', 'materialbox_metabox_save' );
function materialbox_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce_materialbox'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_materialbox'], 'my_meta_box_nonce_materialbox' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    update_post_meta($post_id, 'imagenmaterialbox1' ,  $_POST['imagenmaterialbox1']);
    update_post_meta($post_id, 'imagenmaterialbox2' ,  $_POST['imagenmaterialbox2']);
    update_post_meta($post_id, 'imagenmaterialbox3' ,  $_POST['imagenmaterialbox3']);
    update_post_meta($post_id, 'imagenmaterialbox4' ,  $_POST['imagenmaterialbox4']);
    update_post_meta($post_id, 'imagenmaterialbox5' ,  $_POST['imagenmaterialbox5']);
    update_post_meta($post_id, 'imagenmaterialbox6' ,  $_POST['imagenmaterialbox6']);
    update_post_meta($post_id, 'imagenmaterialbox7' ,  $_POST['imagenmaterialbox7']);
    update_post_meta($post_id, 'imagenmaterialbox8' ,  $_POST['imagenmaterialbox8']);


}

// Agregar Información de Footer a página "Footer"

function agregar_metabox_footer() {
    global $post;
    if ( 'footerpage.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'metabox_footer', 'Footer', 'metabox_footer_callback', 'Page', 'normal', 'high' );
    }
}

add_action( 'add_meta_boxes_page', 'agregar_metabox_footer' );


function metabox_footer_callback( $post )
{
  $post_id = $post->ID;
  $values = get_post_custom( $post->ID );
  $direccion = isset( $values['direccion'] ) ? esc_attr( $values['direccion'][0] ) : '';
  $direccionenlace = isset( $values['direccionenlace'] ) ? esc_attr( $values['direccionenlace'][0] ) : '';
  $emailfooter = isset( $values['emailfooter'] ) ? esc_attr( $values['emailfooter'][0] ) : '';
  $telefono = isset( $values['telefono'] ) ? esc_attr( $values['telefono'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce2', 'meta_box_nonce2' );
    ?>

<div class="contenedor row">
    <p><strong>Agrega aquí la información del footer</strong></p>

    <div class="contenedor-servicio col s12 m12 l12" style="margin-bottom:10px;">

        <div class="col s12 m4 l4">
            <input type="text" name="direccion" placeholder="Dirección" value="<? echo $direccion ?>"
                class="col l12 m12 s12">
        </div>
        <div class="col s12 m4 l4">
            <input type="text" name="direccionenlace" placeholder="Enlace del Mapa de Google"
                value="<? echo $direccionenlace ?>" class="col l12 m12 s12">
        </div>
        <div class="col s12 m4 l4">
            <input type="text" name="telefono" placeholder="Telefono" value="<? echo $telefono ?>"
                class="col l12 m12 s12">
        </div>
        <input type="text" name="emailfooter" placeholder="Email del Footer" value="<? echo $emailfooter ?>"
            class="col l12 m12 s12">
    </div>
</div>

</div>



<?php

}
add_action( 'save_post', 'footer_metabox_save' );
function footer_metabox_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce2'] ) || !wp_verify_nonce( $_POST['meta_box_nonce2'], 'my_meta_box_nonce2' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    update_post_meta($post_id, 'direccion' ,  $_POST['direccion']);
    update_post_meta($post_id, 'direccionenlace' ,  $_POST['direccionenlace']);
    update_post_meta($post_id, 'telefono' ,  $_POST['telefono']);
    update_post_meta($post_id, 'emailfooter' ,  $_POST['emailfooter']);

}
