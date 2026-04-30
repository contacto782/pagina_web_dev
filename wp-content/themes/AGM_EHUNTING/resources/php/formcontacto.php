<form method="post" id="formulariocontacto2" action="<?= get_template_directory_uri() ?>/php/funciones/mensaje.php"
    novalidate data-redirect="/gracias">
    <div class="row">
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix"
                style="color:#ff9800">account_circle</i><br />
            <input type="text" name="tunombre" data-title="Nombre" value="" size="40" id="tuname" required><br />
            <label> Nombre</label>
        </div>
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix"
                style="color:#ff9800">local_phone</i><br />
            <input type="tel" name="tufono" data-title="Teléfono" value="" size="40" id="tutelefono" required><br />
            <label> Teléfono</label>
        </div>
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix" style="color:#ff9800">email</i><br />
            <input type="email" name="tumail" data-title="Email" value="" size="40" id="tumail" required><br />
            <label> Email</label>
        </div>
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix" style="color:#ff9800">contacts</i><br />
            <input type="text" name="tucargo" data-title="Cargo" value="" size="40" id="tucargo" required><br />
            <label> Cargo</label>
        </div>
        <input id="captcha2" type="hidden" name="token" value="">
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix" style="color:#ff9800">message</i><br />
            <textarea name="tumensaje" data-title="Mensaje" cols="40" rows="10" class="materialize-textarea" id="tumensaje"
                required></textarea><br />
            <label> Mensaje</label>
        </div>
        <div class="input-field col s12 m6 l6" style="padding-left:50px">
            <button type="submit" id="submitcontacto" name="submitcontacto" class="btn boton-form" style="z-index:1"><i
                    class="material-icons right">send</i> Enviar</button>
        </div>
    </div>
</form>