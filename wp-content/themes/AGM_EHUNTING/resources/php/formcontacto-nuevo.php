<form method="post" id="formulariocontacto2" class="formulario-nuevo"
    action="<?php echo get_template_directory_uri() ?>/php/funciones/mensaje.php" novalidate=""
    data-redirect="/gracias">
    <div class="row white-text" style="padding:15px">
        <div class="input-field col s12">
            <input class="white-text" type="text"
                name="tunombre" data-title="Nombre" value="" size="40" placeholder="Nombre" required>
        </div>
        <div class="input-field col s12">
            <input class="white-text" type="tel" name="tufono"
                data-title="Teléfono" value="" size="40" placeholder="Teléfono" required>
        </div>

        <div class="input-field col s12">
            <input class="white-text" placeholder="Email" type="email" name="tumail"
                data-title="Email" value="" size="40" required>
        </div>

        <div class="input-field col s12">
            <input class="white-text" type="text" name="tucargo"
                data-title="Cargo" value="" size="40" placeholder="Cargo" required>
        </div>

        <input
            class="white-text" type="hidden" name="token" value="">

        <div class="input-field col s12">
            <textarea name="tumensaje" data-title="Mensaje"
                cols="40" rows="10" class="white-text materialize-textarea" required
                style="height: 44px;" placeholder="Mensaje"></textarea>
        </div>

        <div class="input-field col s12 right-align"> <button type="submit"
                name="submitcontacto" class="btn boton-form" style="z-index:1">Enviar</button>
        </div>

        <dic class="mensaje-exito" style="display:none">
            <div class="mensaje-exito-texto">
                <p style="color: #000">Gracias por contactarnos <br>Hemos recibido tu mensaje y pronto nos pondremos en <strong>contacto contigo</strong></p>
            </div>
    </div>


    </div>
</form>