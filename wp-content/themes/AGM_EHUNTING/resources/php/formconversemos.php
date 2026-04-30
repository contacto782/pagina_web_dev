<form method="post" id="formulariocontacto1"
    action="<?= get_template_directory_uri() ?>/php/form-footer.php" data-redirect="/gracias" novalidate>
    <div class="row">
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix"
                style="color:#ff9800">account_circle</i><br />
            <input type="text" class="required" name="your-name" value="" size="40" id="tunombre" required><br />
            <label> Tu nombre (requerido)</label>
        </div>
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix" style="color:#ff9800">email</i><br />
            <input type="email" class="required" name="your-email" value="" size="40" id="tuemail" required><br />
            <label> Tu correo electr&oacute;nico (requerido)</label>
        </div>
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix" style="color:#ff9800">subject</i><br />
            <input type="text" class="required" name="your-subject" value="" size="40" id="tuasunto" required><br />
            <label> Asunto</label>
        </div>
        <div class="input-field col s12 m6 l6"><i class="material-icons prefix" style="color:#ff9800">message</i><br />
            <textarea name="your-message" cols="40" rows="10" class="materialize-textarea required" id="tumensaje"
                required></textarea><br />
            <label> Tu mensaje</label>
        </div>
        <div class="input-field col s12 m6 l6" style="padding-left:50px">
            <button type="submit" id="submitformulariocontacto1" name="submitformulariocontacto1" class="btn boton-form"
                style="z-index:1"><i class="material-icons right">send</i>
                Enviar</button>
        </div>
        <input id="captcha1" type="hidden" name="token" value="">
    </div>
</form>