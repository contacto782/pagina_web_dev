<div style="background:#1c538f;padding:15px;display:none">
    <div class="container">
        <div class="row container">
            <div class="col s12">
                <p class="white-text left-align col s12" style="margin:0 auto;font-size:25px;padding-left:30px">Suscribete a nuestro boletín de noticias</p>
            </div>
            <form class="col s12 valign-wrapper no-padding" action="<?= get_template_directory_uri() ?>/php/suscript.php" method="post" novalidate data-redirect="/gracias">
                <div class="col s4">
                    <input class="required" data-title="Nombre" type="text" placeholder="Nombre" name="nombre" value="" style="background: white;margin-top: 10px;text-indent: 10px;border-radius: 5px;" required>
                </div>
                <div class="col s4">
                    <input class="required" data-title="Email" type="text" placeholder="Email" name="email" value="" style="background: white;margin-top: 10px;text-indent: 10px;border-radius: 5px;" required>
                </div>
                <div class="col s4">
                    <button type="submit" class="btn" style="background:#d05a27">Suscribir</button>
                </div>
            </form>
        </div>
    </div>
</div>