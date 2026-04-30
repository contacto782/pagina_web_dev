<?php
//Obtener id de imagen por url
function obteneriddeimagenporurl( $url ) {
	$parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
	if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
		return;
	}
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );
	return $attachment[0];
}
//Agregar imagenes personalizadas
add_image_size( 'placeholder', $width = 100, 0, false );
//Agregar defer a los scripts
 if (!is_admin()){
add_filter( 'clean_url', function( $url )
{
    if ( FALSE === strpos( $url, '.js' ) )
    { // not our file
        return $url;
    }
    // Must be a ', not "!
    return "$url' defer='defer";
}, 11, 1 ); }

// cambiar from email y nombre de wordpress
add_filter( 'wp_mail_from', function( $emailsite ) {
	if($emailsite == "wordpress@ehuntinglatam.com") {return 'contacto@ehlatam.com';} else {return $emailsite;}
});
add_filter( 'wp_mail_from_name', function( $namesite ) {
	if($namesite == 'WordPress') {return get_bloginfo( 'name' );} else {return $namesite;}
});

function csvToArray($url) {
    $rows   = array_map('str_getcsv', file($url));
    $header = array_shift($rows);
    $csv    = array();
    foreach($rows as $row) {
        $csv[] = array_combine($header, $row);
    }

    return $csv;
}

/**
 * ===========================
 *  FUNCIÓN DE VACANTES (NUEVA)
 *  ===========================
 *  - Lee Hoja 3 (gid=1999718655) del Google Sheet oficial
 *  - Muestra SOLO 3 vacantes (primeras del sheet)
 *  - Cards responsive, limpias y modernas
 *  - Microdatos JobPosting
 */
function print_seccion_vacantes() {
    $sheet_url = 'https://docs.google.com/spreadsheets/d/1OJL4YBcreNY3Bnanaq0pvOeV55uOAd87cDFr2En0OEY/export?format=csv&gid=1999718655';
    $rows = csvToArray($sheet_url);

    if (!is_array($rows) || empty($rows)) {
        return;
    }

    $map = array(
        'cargo' => array('Cargo', 'cargo'),
        'pais' => array('País', 'Pais', 'pais'),
        'modalidad' => array('Modalidad', 'modalidad'),
        'oferta' => array('Oferta', 'Descripción', 'Descripcion', 'oferta'),
        'mision' => array('Misión', 'Mision', 'mision'),
        'requisitos' => array('Requisitos', 'requisitos'),
        'beneficios' => array('Beneficios', 'beneficios'),
    );

    $vacancies = array();
    foreach ($rows as $row) {
        $normalized = array(
            'cargo' => '',
            'pais' => 'Chile',
            'modalidad' => '',
            'oferta' => '',
            'mision' => '',
            'requisitos' => '',
            'beneficios' => '',
        );

        foreach ($map as $target => $aliases) {
            foreach ($aliases as $alias) {
                if (isset($row[$alias]) && trim((string) $row[$alias]) !== '') {
                    $normalized[$target] = trim((string) $row[$alias]);
                    break;
                }
            }
        }

        if (implode('', $normalized) !== '') {
            $vacancies[] = $normalized;
        }
    }

    $vacancies = array_slice($vacancies, 0, 3);
    if (empty($vacancies)) {
        return;
    }

    ?>
    <style>
    .vacantes-home {
        background: #f6f8fc;
        padding: 32px 0 10px;
    }
    .vacantes-home .vacantes-header {
        text-align: center;
        margin-bottom: 18px;
    }
    .vacantes-home .vacantes-header h2.subtitulo {
        margin-bottom: 6px;
    }
    .vacantes-grid {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 16px 10px;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
    }
    @media (max-width: 992px) {
        .vacantes-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 600px) {
        .vacantes-grid {
            grid-template-columns: 1fr;
        }
    }
    .vac-card {
        position: relative;
        background: #fff;
        border: 1px solid rgba(0, 0, 0, .06);
        border-radius: 14px;
        padding: 18px 18px 14px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, .05);
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }
    .vac-card::before {
        content: "";
        position: absolute;
        inset: 0 0 auto 0;
        height: 3px;
        background: linear-gradient(90deg, #1e3a8a 0%, #3b82f6 50%, #d05a27 100%);
        border-radius: 14px 14px 0 0;
    }
    .vac-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, .08);
        border-color: rgba(59, 130, 246, .18);
    }
    .vac-title {
        font-size: 18px;
        font-weight: 700;
        color: #d05a27;
        line-height: 1.3;
        margin: 6px 0 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 46px;
    }
    .vac-meta {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 10px;
        font-size: 13px;
        color: #64748b;
    }
    .vac-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .vac-desc {
        font-size: 14px;
        color: #475569;
        line-height: 1.55;
        margin: 0 0 8px 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .vac-list label {
        font-size: 13px;
        font-weight: 600;
        color: #0f172a;
        margin: 8px 0 6px;
        display: block;
    }
    .vac-list ul {
        margin: 0;
        padding-left: 18px;
    }
    .vac-list li {
        font-size: 13px;
        color: #64748b;
        line-height: 1.55;
        margin-bottom: 4px;
    }
    .vac-cta {
        margin-top: auto;
        padding-top: 12px;
        display: flex;
        justify-content: space-between;
        gap: 12px;
        align-items: center;
    }
    .vac-cta a.btn-apply,
    .vacantes-home .more .btn {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        gap: 8px;
        height: 44px;
        padding: 0 20px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        line-height: 1 !important;
        letter-spacing: .4px;
    }
    .vac-cta a.btn-apply {
        background: #d05a27;
        color: #fff;
    }
    .vac-cta a.btn-apply:hover {
        background: #b64d20;
    }
    .vacantes-home .more {
        text-align: center;
        padding: 10px 16px 30px;
    }
    .vacantes-home .more .btn {
        background: #d05a27;
    }
    </style>

    <section class="vacantes-home">
        <div class="vacantes-header">
            <h2 class="subtitulo">VACANTES</h2>
            <div class="divider" style="margin:0 auto 24px;max-width:120px;">&nbsp;</div>
        </div>
        <div class="vacantes-grid">
            <?php foreach ($vacancies as $vacancy) : ?>
                <?php
                $cargo = $vacancy['cargo'];
                $pais = $vacancy['pais'];
                $modalidad = $vacancy['modalidad'];
                $oferta = $vacancy['oferta'];
                $requisitos = $vacancy['requisitos'];
                $req_items = preg_split('/[\r\n;]+/', (string) $requisitos);
                $req_items = array_values(array_filter(array_map('trim', $req_items)));
                $req_top = array_slice($req_items, 0, 3);
                ?>
                <article class="vac-card" itemscope itemtype="https://schema.org/JobPosting">
                    <h3 class="vac-title" itemprop="title"><?php echo esc_html($cargo); ?></h3>

                    <div class="vac-meta">
                        <span><i class="material-icons" style="font-size:16px;color:#3b82f6">place</i><strong style="color:#0f172a"><?php echo esc_html($pais); ?></strong></span>
                        <span><i class="material-icons" style="font-size:16px;color:#3b82f6">work_outline</i><?php echo esc_html($modalidad); ?></span>
                    </div>

                    <p class="vac-desc" itemprop="description"><?php echo esc_html(wp_strip_all_tags($oferta)); ?></p>

                    <?php if (!empty($req_top)) : ?>
                        <div class="vac-list">
                            <label>Requisitos clave</label>
                            <ul>
                                <?php foreach ($req_top as $req_item) : ?>
                                    <li itemprop="qualifications"><?php echo esc_html($req_item); ?></li>
                                <?php endforeach; ?>
                                <?php if (count($req_items) > 3) : ?>
                                    <li style="color:#2563eb;font-weight:600">+<?php echo esc_html(count($req_items) - 3); ?> más</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="vac-cta">
                        <a class="btn-apply" href="mailto:postula@ehlatam.com?subject=<?php echo rawurlencode('Postulación: ' . $cargo); ?>">
                            <i class="material-icons" style="font-size:18px">send</i> Postular
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="more">
            <a href="/trabajos" class="btn">Ver todas las vacantes</a>
        </div>
    </section>
    <?php
}
