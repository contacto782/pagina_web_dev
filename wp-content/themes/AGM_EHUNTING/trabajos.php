<?php 
/***
 * Template Name: Trabajos
 */

/* -------------------------------------------------
   Fallback mínimo: csvToArray (evita error crítico)
   Si tu tema ya define csvToArray, esta no se carga.
--------------------------------------------------*/
if (!function_exists('csvToArray')) {
    function csvToArray(string $url): array {
        // cURL si está disponible
        $csv = '';
        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_USERAGENT => 'eHuntingVacantesBot/1.0',
            ]);
            $csv = curl_exec($ch);
            curl_close($ch);
        }
        // Fallback a file_get_contents
        if ($csv === '' || $csv === false) {
            $ctx = stream_context_create(['http' => ['timeout' => 10]]);
            $csv = @file_get_contents($url, false, $ctx);
        }
        if ($csv === '' || $csv === false) return [];

        // quitar BOM
        if (substr($csv, 0, 3) === "\xEF\xBB\xBF") $csv = substr($csv, 3);

        $lines = preg_split("/\r\n|\n|\r/", $csv);
        if (!$lines || count($lines) < 2) return [];

        // detectar delimitador
        $first = $lines[0];
        $cands = [",",";","\t","|"];
        $best = ",";
        $max  = 0;
        foreach ($cands as $d) {
            $cols = str_getcsv($first, $d);
            if (count($cols) > $max) { $max = count($cols); $best = $d; }
        }

        $headers = str_getcsv($lines[0], $best);
        $rows = [];
        for ($i = 1; $i < count($lines); $i++) {
            if ($lines[$i] === '' || $lines[$i] === null) continue;
            $data = str_getcsv($lines[$i], $best);
            if (count($data) < count($headers)) {
                $data = array_pad($data, count($headers), '');
            } elseif (count($data) > count($headers)) {
                $data = array_slice($data, 0, count($headers));
            }
            $row = @array_combine($headers, $data);
            if ($row && implode('', $row) !== '') $rows[] = $row;
        }
        return $rows;
    }
}

/* -----------------------------
   Componente de la Card
------------------------------*/
function get_job_card($cargo, $oferta, $mision, $requisitos, $modalidad, $beneficios, $pais = "Chile", $ciudad = ''){
    $location_label = trim(($ciudad ? $ciudad . ', ' : '') . $pais);
    $description = trim($oferta ?: strip_tags($mision));
    $description = $description ?: 'Conoce los detalles de esta oportunidad y postula para avanzar en tu carrera digital.';
    $country_filter = esc_attr(sanitize_title($pais));
    $modality_filter = esc_attr(sanitize_title($modalidad));
    $title_id = 'job-' . substr(md5($cargo . $location_label . $modalidad), 0, 10);

    return "
    <div class=\"job-card-col\" data-country=\"{$country_filter}\" data-modality=\"{$modality_filter}\">
        <button type=\"button\" class=\"job-card\" data-job-trigger aria-controls=\"{$title_id}\" aria-pressed=\"false\">
            <span class=\"job-card__eyebrow\">Vacante activa</span>
            <h2 class=\"job-card__title\">{$cargo}</h2>
            <div class=\"job-card__meta\">
                <span class=\"job-card__tag\">{$location_label}</span>
                <span class=\"job-card__tag\">{$modalidad}</span>
            </div>
            <div class=\"job-card__description\">
                <p>{$description}</p>
            </div>
            <span class=\"job-card__hint\">Ver detalle completo</span>
        </button>
    </div>";
}

function ehunting_job_list_markup($content) {
    $content = html_entity_decode((string) $content, ENT_QUOTES, 'UTF-8');
    $content = str_replace(["\r\n", "\r", '<br>', '<br/>', '<br />'], "\n", $content);
    $content = wp_strip_all_tags($content);
    $items = preg_split('/[\n;•·]+/', $content);
    $markup = '<ul class="job-detail__list">';

    foreach ($items as $item) {
        $item = trim($item, " \t\n\r\0\x0B-");
        if ('' === $item) {
            continue;
        }
        $markup .= '<li>' . esc_html($item) . '</li>';
    }

    if ('<ul class="job-detail__list">' === $markup) {
        $markup .= '<li>Te compartiremos más detalles durante el proceso de postulación.</li>';
    }

    return $markup . '</ul>';
}

get_header(); 

/* -------------------------------------------------
   URL del Sheet (Hoja 3) que me pasaste (gid=1999718655)
--------------------------------------------------*/
$url  = "https://docs.google.com/spreadsheets/d/1OJL4YBcreNY3Bnanaq0pvOeV55uOAd87cDFr2En0OEY/export?format=csv&gid=1999718655";
$json = csvToArray($url);

/* -----------------------------------------------------------------
   Normalización de encabezados (tu Sheet usa tildes/mayúsculas)
   Sheet:  Cargo | País | Ciudad | Modalidad | Oferta | Misión | Requisitos | Beneficios
   Template: cargo | pais | ciudad | modalidad | oferta | mision | requisitos | beneficios
------------------------------------------------------------------*/
if (is_array($json) && !empty($json)) {
    $map = [
        'cargo'      => ['Cargo','cargo'],
        'pais'       => ['País','Pais','pais'],
        'ciudad'     => ['Ciudad','ciudad','Localidad','localidad'],
        'modalidad'  => ['Modalidad','modalidad'],
        'oferta'     => ['Oferta','Descripción','Descripcion','oferta'],
        'mision'     => ['Misión','Mision','mision'],
        'requisitos' => ['Requisitos','requisitos'],
        'beneficios' => ['Beneficios','beneficios'],
    ];

    $normalized = [];
    foreach ($json as $row) {
        $n = [
            'cargo' => '',
            'pais' => 'Chile',
            'ciudad' => '',
            'modalidad' => '',
            'oferta' => '',
            'mision' => '',
            'requisitos' => '',
            'beneficios' => '',
        ];
        foreach ($map as $target => $aliases) {
            foreach ($aliases as $alias) {
                if (isset($row[$alias]) && $row[$alias] !== '') {
                    $n[$target] = trim((string)$row[$alias]);
                    break;
                }
            }
        }
        if (implode('', $n) !== '') $normalized[] = $n;
    }
    $json = $normalized;
}

?>

<?php
/* ============================================================
   SCHEMA JobPosting por vacante (JSON-LD) usando ciudad/pais/modalidad
   Logo provisto por ti
============================================================ */
if ($json && is_array($json)) {
    $orgName = "eHunting Latam";
    $orgUrl  = "https://ehlatam.com";
    $orgLogo = "https://www.ehlatam.com/wp-content/uploads/2025/08/cropped-Imagen-de-WhatsApp-2025-05-12-a-las-11.35.27_e26ebfdd.jpg";

    foreach ($json as $row) {
        $cargo     = trim($row['cargo'] ?? '');
        $oferta    = trim(strip_tags($row['oferta'] ?? ''));
        $mision    = trim(strip_tags($row['mision'] ?? ''));
        $desc      = $oferta ?: $mision;
        $pais      = trim($row['pais'] ?? 'Chile');
        $ciudad    = trim($row['ciudad'] ?? '');
        $modalidad = mb_strtolower(trim($row['modalidad'] ?? ''), 'UTF-8');

        $datePosted   = date('c');
        $validThrough = date('Y-m-d', strtotime('+60 days')) . "T23:59:59" . date('P'); // puedes agregar col. 'vigencia' si quieres ajustar

        $employmentType = "FULL_TIME";
        if (strpos($modalidad, 'medio') !== false || strpos($modalidad, 'part') !== false) {
            $employmentType = "PART_TIME";
        } elseif (strpos($modalidad, 'práctica') !== false || strpos($modalidad, 'practica') !== false || strpos($modalidad, 'intern') !== false) {
            $employmentType = "INTERN";
        } elseif (strpos($modalidad, 'temporal') !== false || strpos($modalidad, 'contrato') !== false || strpos($modalidad, 'contract') !== false) {
            $employmentType = "CONTRACTOR";
        }

        $isRemote = (strpos($modalidad, 'remoto') !== false || strpos($modalidad, 'remote') !== false);

        $applyUrl = 'mailto:contacto@ehlatam.com?subject=' . rawurlencode('Postulacion: ' . $cargo);
        $jobId    = substr(sha1($cargo.$pais.$ciudad.$validThrough), 0, 16);

        $job = [
            "@context"         => "https://schema.org",
            "@type"            => "JobPosting",
            "title"            => $cargo,
            "description"      => $desc,
            "datePosted"       => $datePosted,
            "validThrough"     => $validThrough,
            "employmentType"   => $employmentType,
            "directApply"      => true,
            "hiringOrganization" => [
                "@type" => "Organization",
                "name"  => $orgName,
                "sameAs"=> $orgUrl,
                "logo"  => $orgLogo
            ],
            "identifier" => [
                "@type" => "PropertyValue",
                "name"  => $orgName,
                "value" => $jobId
            ],
            "url" => $applyUrl
        ];

        if ($isRemote) {
            $job["jobLocationType"] = "TELECOMMUTE";
            $job["applicantLocationRequirements"] = [[
                "@type" => "Country",
                "name"  => $pais
            ]];
        } else {
            $address = [
                "@type"          => "PostalAddress",
                "addressCountry" => $pais
            ];
            if ($ciudad !== '') $address["addressLocality"] = $ciudad;

            $job["jobLocation"] = [[
                "@type"  => "Place",
                "address"=> $address
            ]];
        }

        echo '<script type="application/ld+json">'.json_encode($job, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES).'</script>' . "\n";
    }
}
?>

<style>
    * { box-sizing: border-box; }
    body { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; margin: 0; padding: 0; overflow-x: hidden; }
    .vacantes-container { max-width: 1200px; margin: 0 auto; padding: 0 clamp(16px, 3vw, 24px); width: 100%; }
    .jobs-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(min(100%, 500px), 1fr)); gap: 0; margin: 0 -12px; }
    .job-card { width: 100%; max-width: 100%; }
    .job-card:hover { box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); transform: translateY(-2px); border-color: rgba(59, 130, 246, 0.15); }
    .page-header { text-align: center; padding: clamp(40px, 8vw, 60px) clamp(16px, 3vw, 24px) clamp(30px, 6vw, 40px); background: linear-gradient(135deg, #ffffff 0%, #fafbfc 100%); border-radius: clamp(16px, 3vw, 24px); margin: clamp(100px, 15vw, 120px) 0 clamp(30px, 5vw, 40px) 0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); width: 100%; border: 1px solid rgba(0, 0, 0, 0.04); }
    .page-title { font-size: clamp(24px, 5vw, 42px); font-weight: 800; margin: 0 0 clamp(10px, 2vw, 12px) 0; color: #1a1a2e; letter-spacing: -0.5px; line-height: 1.2; word-wrap: break-word; }
    .page-subtitle { font-size: clamp(14px, 3vw, 18px); color: #4a5568; margin: 0; font-weight: 400; line-height: 1.5; word-wrap: break-word; }
    .jobs-count { display: inline-flex; align-items: center; gap: clamp(6px, 1.5vw, 8px); margin-top: clamp(12px, 2.5vw, 16px); padding: clamp(6px, 1.5vw, 8px) clamp(12px, 2.5vw, 16px); background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.08) 100%); border-radius: 20px; font-size: clamp(13px, 2.5vw, 14px); font-weight: 600; color: #2563eb; white-space: nowrap; border: 1px solid rgba(59, 130, 246, 0.1); }

    /* País en la card (h3) – look más limpio, discreto y consistente */
    .job-country{
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin: 0;
        font-size: 13px;       /* mismo tamaño que metadatos */
        font-weight: 600;      /* menos bold para bajar contraste */
        color: #475569;        /* tono más suave */
        line-height: 1.4;
        letter-spacing: .1px;
    }
    .job-country .material-icons{
        font-size: 16px;
        color: #64748b;        /* icono más neutro */
    }

    @media (max-width: 639px) { 
        .jobs-grid { grid-template-columns: 1fr; } 
        .job-card-col { padding: 0 8px !important; margin-bottom: 16px !important; } 
        .page-header { margin: 80px 0 24px 0; padding: 32px 16px 24px; } 
        .page-title { font-size: 22px; line-height: 1.3; } 
        .page-subtitle { font-size: 14px; } 
        .vacantes-container { padding: 0 12px; } 
    }
    @media (min-width: 640px) and (max-width: 768px) { 
        .jobs-grid { grid-template-columns: repeat(2, 1fr); } 
        .page-header { margin: 100px 0 28px 0; } 
    }
    @media (min-width: 769px) and (max-width: 1024px) { 
        .jobs-grid { grid-template-columns: repeat(2, 1fr); } 
        .page-title { font-size: 36px; } 
    }
    @media (min-width: 1025px) { 
        .jobs-grid { grid-template-columns: repeat(2, 1fr); } 
        .page-header { margin: 120px 0 40px 0; } 
    }
    @media (min-width: 1440px) { 
        .vacantes-container { max_width: 1300px; } 
    }
    @media print { 
        body { background: white; } 
        .jobs-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; } 
        .page-header { box-shadow: none; border: 1px solid #ddd; } 
        .job-card { page-break-inside: avoid; box-shadow: none; border: 1px solid #ddd; } 
    }

    body.ehunting-section-header {
        background: linear-gradient(180deg, #f7f8fc 0%, #eef2f8 100%);
    }

    .vacantes-container {
        max-width: 1320px;
        padding: 34px clamp(18px, 4vw, 42px) 72px;
    }

    .page-header {
        margin: 34px auto 28px;
        padding: 0;
        background: transparent;
        border: 0;
        border-radius: 0;
        box-shadow: none;
    }

    .page-header::before {
        content: "";
        display: block;
        width: 116px;
        height: 4px;
        margin: 0 auto 30px;
        background: #df7138;
    }

    .page-title {
        margin: 0 0 8px;
        color: #173b73;
        font-size: clamp(30px, 3.5vw, 42px);
        font-weight: 400;
        letter-spacing: 0;
        line-height: 1.2;
    }

    .page-title strong {
        color: #57becd;
        font-weight: 800;
    }

    .page-subtitle {
        color: #2b3d59;
        font-size: clamp(16px, 1.6vw, 20px);
        font-weight: 500;
    }

    .jobs-count {
        display: none;
    }

    .jobs-toolbar {
        display: flex;
        flex-wrap: wrap;
        align-items: end;
        justify-content: space-between;
        gap: 18px 22px;
        margin: 0 0 28px;
        padding: 18px 20px;
        border: 1px solid rgba(23, 59, 115, 0.08);
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.78);
        box-shadow: 0 18px 40px rgba(24, 39, 75, 0.08);
        backdrop-filter: blur(10px);
    }

    .jobs-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        align-items: end;
    }

    .jobs-filter {
        min-width: 200px;
    }

    .jobs-filter__label {
        display: block;
        margin: 0 0 8px;
        color: #173b73;
        font-size: 12px;
        line-height: 1.2;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .jobs-filter__select {
        display: block !important;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 100%;
        min-height: 44px;
        border: 1px solid rgba(23, 59, 115, 0.14);
        border-radius: 8px;
        background: linear-gradient(180deg, #ffffff 0%, #f7f9fc 100%);
        color: #173b73;
        padding: 0 38px 0 14px;
        box-shadow: none;
        outline: none;
        background-image:
            linear-gradient(45deg, transparent 50%, rgba(87, 190, 205, 0.88) 50%),
            linear-gradient(135deg, rgba(87, 190, 205, 0.88) 50%, transparent 50%);
        background-position:
            calc(100% - 20px) calc(50% - 3px),
            calc(100% - 14px) calc(50% - 3px);
        background-size: 6px 6px, 6px 6px;
        background-repeat: no-repeat;
    }

    .jobs-filter__select:focus {
        border-color: rgba(87, 190, 205, 0.65);
        box-shadow: 0 0 0 4px rgba(87, 190, 205, 0.12);
    }

    .jobs-filter__select option {
        color: #081426;
    }

    .jobs-results {
        color: #173b73;
        font-size: 14px;
        line-height: 1.4;
        font-weight: 600;
        white-space: nowrap;
    }

    .jobs-empty {
        display: none;
        padding: 28px 24px;
        margin-top: 10px;
        border: 1px solid rgba(23, 59, 115, 0.08);
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.84);
        color: #2b3d59;
        text-align: center;
        font-size: 16px;
        line-height: 1.5;
        box-shadow: 0 18px 40px rgba(24, 39, 75, 0.08);
    }

    .jobs-empty.is-visible {
        display: block;
    }

    .jobs-layout {
        display: grid;
        grid-template-columns: minmax(300px, 380px) minmax(0, 1fr);
        gap: 24px;
        align-items: start;
    }

    .jobs-grid {
        display: flex;
        flex-direction: column;
        gap: 14px;
        margin: 0;
        max-height: 78vh;
        overflow-y: auto;
        padding-right: 8px;
        position: sticky;
        top: 122px;
    }

    .jobs-grid::-webkit-scrollbar {
        width: 8px;
    }

    .jobs-grid::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, rgba(87, 190, 205, 0.88), rgba(223, 113, 56, 0.82));
        border-radius: 999px;
    }

    .job-card-col {
        padding: 0;
        margin: 0;
    }

    .job-card {
        position: relative;
        width: 100%;
        min-height: 0;
        padding: 20px 18px 18px;
        border: 1px solid rgba(23, 59, 115, 0.08);
        border-radius: 18px;
        background:
            radial-gradient(circle at top right, rgba(87, 190, 205, 0.18), transparent 34%),
            linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(245, 248, 252, 0.98) 100%);
        box-shadow:
            0 18px 38px rgba(24, 39, 75, 0.08),
            inset 0 0 0 1px rgba(87, 190, 205, 0.06);
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
        transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        overflow: hidden;
        cursor: pointer;
        text-align: left;
    }

    .job-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 20px;
        right: 20px;
        height: 3px;
        border-radius: 999px;
        background: linear-gradient(90deg, #df7138 0%, #57becd 100%);
        opacity: 0.9;
    }

    .job-card::after {
        content: "";
        position: absolute;
        inset: 14px 14px auto auto;
        width: 74px;
        height: 74px;
        border-radius: 18px;
        background:
            linear-gradient(135deg, rgba(87, 190, 205, 0.12), rgba(87, 190, 205, 0)),
            linear-gradient(135deg, rgba(223, 113, 56, 0.12), rgba(223, 113, 56, 0));
        clip-path: polygon(0 0, 100% 0, 100% 100%);
        pointer-events: none;
    }

    .job-card:hover,
    .job-card.is-active {
        transform: translateY(-2px);
        border-color: rgba(223, 113, 56, 0.48);
        box-shadow:
            0 24px 44px rgba(24, 39, 75, 0.14),
            0 0 0 1px rgba(87, 190, 205, 0.16),
            0 0 26px rgba(87, 190, 205, 0.12);
    }

    .job-card__eyebrow {
        color: #57becd;
        font-size: 11px;
        line-height: 1.2;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .job-card__title {
        width: 100%;
        height: auto;
        min-height: 0;
        margin: 0;
        padding: 0 0 10px;
        border-bottom: 1px solid rgba(23, 59, 115, 0.12);
        border-radius: 0;
        background: transparent;
        color: #173b73;
        text-align: left;
        font-size: clamp(18px, 1.4vw, 22px);
        font-weight: 800;
        line-height: 1.2;
        display: block;
    }

    .job-card__meta {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 0;
    }

    .job-card__tag {
        min-height: 38px;
        border: 1px solid rgba(87, 190, 205, 0.24);
        border-radius: 8px;
        background: rgba(87, 190, 205, 0.08);
        color: #2b3d59;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 7px 12px;
        text-align: center;
        font-size: 13px;
        line-height: 1.2;
        font-weight: 500;
    }

    .job-card__description {
        width: 100%;
        flex: 0 0 auto;
        min-height: 0;
        max-height: none;
        margin: 0;
        border: 1px solid rgba(23, 59, 115, 0.08);
        border-radius: 14px;
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        padding: 14px 15px;
        background: rgba(255, 255, 255, 0.72);
        color: #4c5c75;
        text-align: left;
        font-size: 13px;
        line-height: 1.45;
        overflow: hidden;
        scrollbar-width: none;
    }

    .job-card__description p {
        margin: 0;
        display: block;
    }

    .job-card__hint {
        color: #173b73;
        font-size: 12px;
        line-height: 1.3;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .job-detail {
        min-height: 78vh;
        padding: 28px 28px 26px;
        border: 1px solid rgba(23, 59, 115, 0.08);
        border-radius: 22px;
        background:
            radial-gradient(circle at top right, rgba(87, 190, 205, 0.16), transparent 34%),
            linear-gradient(180deg, rgba(255, 255, 255, 0.97) 0%, rgba(244, 247, 251, 0.98) 100%);
        box-shadow: 0 22px 52px rgba(24, 39, 75, 0.1), inset 0 0 0 1px rgba(87, 190, 205, 0.05);
    }

    .job-detail__inner[hidden] {
        display: none !important;
    }

    .job-detail__eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
        color: #57becd;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .job-detail__title {
        margin: 0 0 14px;
        color: #173b73;
        font-size: clamp(26px, 2.2vw, 38px);
        line-height: 1.1;
        font-weight: 800;
    }

    .job-detail__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 22px;
    }

    .job-detail__section + .job-detail__section {
        margin-top: 24px;
    }

    .job-detail__section-title {
        margin: 0 0 10px;
        color: #173b73;
        font-size: 20px;
        line-height: 1.2;
        font-weight: 700;
    }

    .job-detail__copy {
        color: #4c5c75;
        font-size: 16px;
        line-height: 1.7;
    }

    .job-detail__copy p {
        margin: 0 0 10px;
    }

    .job-detail__copy ul {
        margin: 0;
        padding-left: 22px;
    }

    .job-detail__apply {
        margin-top: 28px;
        min-width: 176px;
        min-height: 52px;
        border-radius: 999px;
        background: linear-gradient(135deg, #df7138 0%, #f08a47 46%, #57becd 100%);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 0 28px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 800;
        line-height: 1;
        letter-spacing: 0.04em;
        box-shadow: 0 18px 34px rgba(223, 113, 56, 0.24);
        position: relative;
        overflow: hidden;
    }

    .job-detail__apply::before {
        content: "";
        position: absolute;
        inset: 1px;
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.02));
        pointer-events: none;
    }

    .job-detail__apply::after {
        content: "↗";
        position: relative;
        font-size: 16px;
        line-height: 1;
    }

    .job-detail__apply:hover,
    .job-detail__apply:focus {
        background: linear-gradient(135deg, #e37b3d 0%, #f59856 44%, #62ccdb 100%);
        color: #fff;
        transform: translateY(-2px) scale(1.01);
        box-shadow: 0 22px 38px rgba(223, 113, 56, 0.28);
    }

    @media (max-width: 1100px) {
        .jobs-layout {
            grid-template-columns: 320px minmax(0, 1fr);
        }
    }

    @media (max-width: 900px) {
        .jobs-layout {
            grid-template-columns: 1fr;
        }

        .jobs-grid,
        .job-detail {
            position: static;
            max-height: none;
            min-height: 0;
        }
    }

    @media (max-width: 720px) {
        .jobs-toolbar,
        .jobs-filters {
            flex-direction: column;
            align-items: stretch;
        }

        .jobs-filter {
            min-width: 0;
        }

        .page-header {
            margin-top: 28px;
        }

        .job-card {
            padding: 18px 16px 16px;
        }

        .job-detail {
            padding: 22px 18px 20px;
        }

        .job-detail__title {
            font-size: 24px;
        }
    }

    /* Vacantes modernizadas: marca eHunting + tabs */
    :root {
        --eh-orange: #d05a27;
        --eh-dark-blue: #091a39;
        --eh-text-body: #4a5568;
        --eh-light-bg: #f8fafc;
    }

    body.ehunting-section-header,
    body {
        background: var(--eh-light-bg) !important;
    }

    .page-header::before {
        background: var(--eh-orange) !important;
    }

    .page-title,
    .page-title strong,
    .jobs-filter__label,
    .jobs-results {
        color: var(--eh-dark-blue) !important;
    }

    .page-subtitle,
    .jobs-empty {
        color: var(--eh-text-body) !important;
    }

    .jobs-toolbar {
        border-color: rgba(9, 26, 57, 0.08) !important;
        background: rgba(255, 255, 255, 0.88) !important;
        box-shadow: 0 14px 34px rgba(9, 26, 57, 0.08) !important;
    }

    .jobs-filter__select {
        border-color: rgba(9, 26, 57, 0.14) !important;
        color: var(--eh-dark-blue) !important;
        background-color: #fff !important;
        background-image:
            linear-gradient(45deg, transparent 50%, var(--eh-orange) 50%),
            linear-gradient(135deg, var(--eh-orange) 50%, transparent 50%) !important;
    }

    .jobs-filter__select:focus {
        border-color: rgba(208, 90, 39, 0.55) !important;
        box-shadow: 0 0 0 4px rgba(208, 90, 39, 0.12) !important;
    }

    .jobs-grid::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, rgba(208, 90, 39, 0.3), rgba(208, 90, 39, 0.82)) !important;
    }

    .job-card {
        padding: 19px 18px 18px 22px !important;
        border: 1px solid rgba(9, 26, 57, 0.08) !important;
        border-radius: 14px !important;
        background: #fff !important;
        box-shadow: 0 10px 28px rgba(9, 26, 57, 0.07) !important;
        transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease, background 0.25s ease !important;
    }

    .job-card::before {
        top: 0 !important;
        left: 0 !important;
        right: auto !important;
        width: 4px !important;
        height: 100% !important;
        border-radius: 14px 0 0 14px !important;
        background: var(--eh-orange) !important;
        opacity: 0 !important;
        transition: opacity 0.25s ease !important;
    }

    .job-card::after {
        display: none !important;
    }

    .job-card:hover,
    .job-card.is-active {
        transform: translateY(-2px) !important;
        border-color: rgba(208, 90, 39, 0.22) !important;
        box-shadow: 0 16px 34px rgba(9, 26, 57, 0.12) !important;
    }

    .job-card.is-active::before {
        opacity: 1 !important;
    }

    .job-card__eyebrow {
        width: fit-content;
        min-height: 28px;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 11px;
        border: 1px solid rgba(208, 90, 39, 0.16);
        border-radius: 999px;
        background: rgba(208, 90, 39, 0.08);
        color: var(--eh-orange) !important;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.75);
    }

    .job-card__eyebrow::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--eh-orange);
        box-shadow: 0 0 0 4px rgba(208, 90, 39, 0.12);
    }

    .job-card__title {
        color: var(--eh-dark-blue) !important;
        font-weight: 700 !important;
        border-bottom-color: rgba(9, 26, 57, 0.08) !important;
    }

    .job-card__tag {
        min-height: 30px !important;
        border: 1px solid rgba(208, 90, 39, 0.1) !important;
        border-radius: 20px !important;
        background: #f3f4f6 !important;
        color: var(--eh-orange) !important;
        padding: 6px 12px !important;
        font-weight: 600 !important;
    }

    .job-card__description {
        border-color: rgba(9, 26, 57, 0.07) !important;
        background: #f8fafc !important;
        color: var(--eh-text-body) !important;
    }

    .job-card__hint {
        width: fit-content !important;
        min-height: 34px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin-top: 2px !important;
        padding: 0 14px !important;
        border: 1px solid rgba(9, 26, 57, .12) !important;
        border-radius: 999px !important;
        background: #ffffff !important;
        color: var(--eh-dark-blue) !important;
        font-size: 11px !important;
        line-height: 1 !important;
        letter-spacing: .07em !important;
        box-shadow: 0 8px 18px rgba(9,26,57,.06) !important;
        cursor: pointer !important;
        transition: color 0.25s ease, border-color 0.25s ease, background-color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease !important;
    }

    .job-card:hover .job-card__hint,
    .job-card.is-active .job-card__hint {
        color: var(--eh-orange) !important;
        border-color: rgba(208, 90, 39, .28) !important;
        background: rgba(208, 90, 39, .06) !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 10px 20px rgba(208,90,39,.1) !important;
    }

    .job-card,
    .job-card *,
    .job-card__hint,
    .job-card:hover .job-card__hint {
        cursor: pointer !important;
    }

    .job-detail {
        min-height: 78vh !important;
        border: 1px solid rgba(9, 26, 57, 0.08) !important;
        border-radius: 18px !important;
        background: #fff !important;
        box-shadow: 0 18px 48px rgba(9, 26, 57, 0.11) !important;
    }

    .job-detail__eyebrow {
        width: fit-content;
        min-height: 30px;
        display: inline-flex !important;
        align-items: center;
        gap: 8px;
        padding: 7px 12px;
        border: 1px solid rgba(208, 90, 39, 0.16);
        border-radius: 999px;
        background: rgba(208, 90, 39, 0.08);
        color: var(--eh-orange) !important;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.75);
    }

    .job-detail__eyebrow::before {
        content: "";
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--eh-orange);
        box-shadow: 0 0 0 4px rgba(208, 90, 39, 0.12);
    }

    .job-detail__title {
        color: var(--eh-dark-blue) !important;
        font-size: clamp(28px, 2.7vw, 44px) !important;
        font-weight: 800 !important;
        letter-spacing: -0.02em !important;
    }

    .job-tabs-nav {
        display: flex;
        align-items: center;
        gap: 4px;
        margin: 24px 0 0;
        padding: 0;
        list-style: none;
        border-bottom: 1px solid rgba(9, 26, 57, 0.1);
        overflow-x: auto;
    }

    .job-tabs-nav li {
        list-style: none;
        margin: 0;
        padding: 0;
        flex: 0 0 auto;
    }

    .job-tabs-nav a {
        display: inline-flex;
        align-items: center;
        min-height: 52px;
        padding: 15px 20px;
        border-bottom: 2px solid transparent;
        color: #64748b;
        text-decoration: none;
        font-size: 15px;
        line-height: 1;
        font-weight: 700;
        transition: color 0.25s ease, border-color 0.25s ease, background-color 0.25s ease;
    }

    .job-tabs-nav a:hover,
    .job-tabs-nav a.active {
        color: var(--eh-orange);
        border-bottom-color: var(--eh-orange);
        background: rgba(208, 90, 39, 0.04);
    }

    .job-tabs-content {
        padding: 30px 0 0;
    }

    .tab-pane {
        display: none;
        animation: jobTabFade 0.24s ease both;
    }

    .tab-pane.active {
        display: block;
    }

    @keyframes jobTabFade {
        from {
            opacity: 0;
            transform: translateY(6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .job-detail__section + .job-detail__section {
        margin-top: 26px !important;
    }

    .job-detail__section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--eh-dark-blue) !important;
        font-size: 20px !important;
        font-weight: 800 !important;
    }

    .job-detail__section-icon {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: rgba(208, 90, 39, 0.1);
        color: var(--eh-orange);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        line-height: 1;
        flex: 0 0 26px;
    }

    .job-detail__copy {
        color: var(--eh-text-body) !important;
        line-height: 1.7 !important;
    }

    .job-detail__list {
        margin: 0;
        padding: 0;
        list-style: none;
        color: var(--eh-text-body);
        font-size: 16px;
        line-height: 1.7;
    }

    .job-detail__list li {
        position: relative;
        padding-left: 30px;
        margin: 0 0 13px;
    }

    .job-detail__list li::before {
        content: "✓";
        position: absolute;
        top: 0;
        left: 0;
        color: var(--eh-orange);
        font-weight: 900;
    }

    .job-detail__apply.btn-postular,
    .job-detail__apply.btn-postular:hover,
    .job-detail__apply.btn-postular:focus {
        display: flex !important;
        width: 100% !important;
        min-height: 58px !important;
        margin-top: 40px !important;
        padding: 18px !important;
        border-radius: 8px !important;
        background: var(--eh-orange) !important;
        color: #fff !important;
        text-align: center !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
        box-shadow: 0 14px 30px rgba(208, 90, 39, 0.24) !important;
        transition: background 0.3s ease, transform 0.25s ease, box-shadow 0.25s ease !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .job-detail__apply.btn-postular::before {
        content: "" !important;
        display: block !important;
        position: absolute !important;
        inset: 0 !important;
        border-radius: inherit !important;
        background: linear-gradient(110deg, transparent 0 32%, rgba(255,255,255,.28) 50%, transparent 68% 100%) !important;
        transform: translateX(-120%) !important;
        transition: transform 0.55s ease !important;
        pointer-events: none !important;
    }

    .job-detail__apply.btn-postular:hover,
    .job-detail__apply.btn-postular:focus {
        background: #b94f22 !important;
        transform: translateY(-3px) scale(1.015) !important;
        box-shadow: 0 20px 38px rgba(208, 90, 39, 0.34) !important;
    }

    .job-detail__apply.btn-postular:hover::before,
    .job-detail__apply.btn-postular:focus::before {
        transform: translateX(120%) !important;
    }

    @media (max-width: 720px) {
        .job-tabs-nav a {
            padding: 14px 13px;
            font-size: 13px;
        }

        .job-tabs-content {
            padding-top: 22px;
        }
    }

    /* Vacantes: panel derecho compacto sin scroll largo */
    .jobs-layout {
        grid-template-columns: minmax(300px, 390px) minmax(420px, 1fr) !important;
    }

    .job-detail {
        min-height: 0 !important;
        padding: 30px 30px 28px !important;
        position: sticky;
        top: 122px;
    }

    .job-detail__inner {
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .job-detail__eyebrow {
        margin-bottom: 10px !important;
    }

    .job-detail__title {
        margin-bottom: 16px !important;
        font-size: clamp(24px, 2.2vw, 34px) !important;
        line-height: 1.12 !important;
    }

    .job-detail__meta {
        margin-bottom: 22px !important;
    }

    .job-detail__section--requirements {
        padding: 22px 20px;
        border: 1px solid rgba(9, 26, 57, 0.08);
        border-radius: 14px;
        background: #f8fafc;
    }

    .job-detail__section-title {
        margin-bottom: 16px !important;
        font-size: 18px !important;
    }

    .job-detail__list {
        max-height: 310px;
        overflow-y: auto;
        padding-right: 8px !important;
        font-size: 15px !important;
        line-height: 1.55 !important;
    }

    .job-detail__list::-webkit-scrollbar {
        width: 6px;
    }

    .job-detail__list::-webkit-scrollbar-thumb {
        border-radius: 999px;
        background: rgba(208, 90, 39, 0.55);
    }

    .job-detail__list li {
        margin-bottom: 9px !important;
    }

    .job-detail__apply.btn-postular,
    .job-detail__apply.btn-postular:hover,
    .job-detail__apply.btn-postular:focus {
        margin-top: 24px !important;
        min-height: 54px !important;
    }

    @media (max-width: 900px) {
        .jobs-layout {
            grid-template-columns: 1fr !important;
        }

        .job-detail {
            position: static;
        }

        .job-detail__list {
            max-height: none;
            overflow: visible;
        }
    }

    /* Overrides finales del panel derecho */
    aside.job-detail article.job-detail__inner > .job-detail__eyebrow {
        width: fit-content !important;
        min-height: 32px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        margin: 0 0 18px !important;
        padding: 7px 13px !important;
        border: 1px solid rgba(208, 90, 39, 0.2) !important;
        border-radius: 999px !important;
        background: rgba(208, 90, 39, 0.09) !important;
        color: #d05a27 !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 800 !important;
        letter-spacing: .1em !important;
        text-transform: uppercase !important;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.78), 0 8px 20px rgba(208,90,39,.08) !important;
    }

    aside.job-detail article.job-detail__inner > .job-detail__eyebrow::before {
        content: "" !important;
        width: 8px !important;
        height: 8px !important;
        display: block !important;
        border-radius: 50% !important;
        background: #d05a27 !important;
        box-shadow: 0 0 0 4px rgba(208,90,39,.14) !important;
        flex: 0 0 8px !important;
    }

    aside.job-detail a.job-detail__apply.btn-postular {
        width: fit-content !important;
        min-width: 168px !important;
        min-height: 44px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 22px 0 0 !important;
        padding: 0 22px !important;
        border: 0 !important;
        border-radius: 10px !important;
        background: #d05a27 !important;
        color: #ffffff !important;
        text-decoration: none !important;
        text-align: center !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 800 !important;
        letter-spacing: .08em !important;
        text-transform: uppercase !important;
        box-shadow: 0 10px 22px rgba(208,90,39,.22) !important;
        transform: translateY(0) scale(1) !important;
        transition: background-color .3s ease, transform .25s ease, box-shadow .25s ease !important;
        overflow: hidden !important;
    }

    aside.job-detail a.job-detail__apply.btn-postular:hover,
    aside.job-detail a.job-detail__apply.btn-postular:focus {
        background: #b94f22 !important;
        color: #ffffff !important;
        transform: translateY(-2px) scale(1.015) !important;
        box-shadow: 0 15px 28px rgba(208,90,39,.3) !important;
    }

    aside.job-detail a.job-detail__apply.btn-postular::after {
        content: "↗" !important;
        margin-left: 10px !important;
        position: relative !important;
        color: currentColor !important;
    }

    /* Estado y CTA del detalle seleccionado */
    .job-detail .job-status-pill {
        width: fit-content !important;
        min-height: 34px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 9px !important;
        margin: 0 0 22px !important;
        padding: 8px 14px !important;
        border: 1px solid rgba(208, 90, 39, .22) !important;
        border-radius: 999px !important;
        background: rgba(208, 90, 39, .1) !important;
        color: #d05a27 !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 800 !important;
        letter-spacing: .1em !important;
        text-transform: uppercase !important;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.8), 0 10px 22px rgba(208,90,39,.08) !important;
    }

    .job-detail .job-status-pill::before {
        content: none !important;
    }

    .job-detail .job-status-pill__dot {
        width: 8px !important;
        height: 8px !important;
        display: inline-block !important;
        border-radius: 50% !important;
        background: #d05a27 !important;
        box-shadow: 0 0 0 4px rgba(208,90,39,.14) !important;
        flex: 0 0 8px !important;
    }

    .job-detail .job-apply-button,
    .job-detail .job-apply-button:visited {
        width: min(100%, 360px) !important;
        min-height: 58px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 10px !important;
        margin: 28px 0 0 !important;
        padding: 0 30px !important;
        border: 0 !important;
        border-radius: 12px !important;
        background: #d05a27 !important;
        color: #ffffff !important;
        text-decoration: none !important;
        text-align: center !important;
        font-size: 14px !important;
        line-height: 1 !important;
        font-weight: 900 !important;
        letter-spacing: .09em !important;
        text-transform: uppercase !important;
        box-shadow: 0 15px 30px rgba(208,90,39,.28) !important;
        transform: translateY(0) scale(1) !important;
        transition: background-color .3s ease, transform .25s ease, box-shadow .25s ease !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .job-detail .job-apply-button span {
        position: relative !important;
        z-index: 2 !important;
        color: #ffffff !important;
    }

    .job-detail .job-apply-button::before {
        content: "" !important;
        position: absolute !important;
        inset: 0 !important;
        display: block !important;
        background: linear-gradient(110deg, transparent 0 32%, rgba(255,255,255,.28) 50%, transparent 68% 100%) !important;
        transform: translateX(-120%) !important;
        transition: transform .55s ease !important;
    }

    .job-detail .job-apply-button::after {
        content: "↗" !important;
        position: relative !important;
        z-index: 2 !important;
        color: #ffffff !important;
        font-size: 15px !important;
        line-height: 1 !important;
        margin-left: 0 !important;
    }

    .job-detail .job-apply-button:hover,
    .job-detail .job-apply-button:focus {
        background: #b94f22 !important;
        color: #ffffff !important;
        transform: translateY(-3px) scale(1.02) !important;
        box-shadow: 0 22px 40px rgba(208,90,39,.36) !important;
    }

    .job-detail .job-apply-button:hover::before,
    .job-detail .job-apply-button:focus::before {
        transform: translateX(120%) !important;
    }
</style>

<?php

// montar el chatbot
// ✅ SOLO mostrar el chatbot de prueba si la URL trae ?chat_test=1
$chat_test = isset($_GET['chat_test']) && $_GET['chat_test'] == '1';

if (true):
?>

  <!-- ✅ BOTÓN + PANEL DEL CHAT (solo en modo prueba) -->
  <div id="eh-chat-bubble" aria-label="Abrir chat"></div>

  <div id="eh-chat-panel" class="eh-chat-panel" aria-hidden="true">
    <div class="eh-chat-panel-inner">
      <iframe
        id="eh-chat-iframe"
        src="https://chatbot-ehunting.netlify.app/?embed=1" 
        title="Chat eHunting"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
  </div>

  <style>
	  :root{
  --eh-blue-rgb: 54, 0, 232;        /* #3600E8 → avatar */
  --eh-pulse-blue-rgb: 0, 70, 180;  /* azul seguro → pulso */
}
    /* Burbuja flotante */
    #eh-chat-bubble{
      position: fixed;
      bottom: 50px;
  	  right: 30px;
		
      width: 72px;
      height: 72px;
	  cursor: pointer;
	  border-radius: 50%;
	  z-index: 999999999999 !important;
		
       background-image: url('https://chatbot-ehunting.netlify.app/avatar-bot.png');
  	   background-size: cover;
       background-position: top;
       background-repeat: no-repeat;
		
	animation: eh-pulse 2.2s infinite;
	  
    }
	  
@keyframes eh-pulse {
  0% {
    box-shadow:
      0 0 0 0 rgba(var(--eh-pulse-blue-rgb), .45),
      0 0 0 0 rgba(var(--eh-pulse-blue-rgb), .25);
  }
  50% {
    box-shadow:
      0 0 0 12px rgba(var(--eh-pulse-blue-rgb), .30),
      0 0 0 24px rgba(var(--eh-pulse-blue-rgb), .15);
  }
  100% {
    box-shadow:
      0 0 0 26px rgba(var(--eh-pulse-blue-rgb), 0),
      0 0 0 40px rgba(var(--eh-pulse-blue-rgb), 0);
  }
}

/* 🚫 Cuando el chat está abierto, se apaga el pulso */
.chat-open #eh-chat-bubble{
  animation: none !important;
}




    /* Panel del chat */
    .eh-chat-panel{
      position: fixed;
     bottom: 120px;
  right: 24px;
      width: 380px;
      height: 600px;
      max-height: 75vh;
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 20px 60px rgba(0,0,0,.25);
      overflow: hidden;
      z-index: 999999999998;
      transform: translateY(16px);
      opacity: 0;
      pointer-events: none;
      transition: opacity .2s ease, transform .2s ease;
    }

    .eh-chat-panel.open{
      opacity: 1;
      transform: translateY(0);
      pointer-events: auto;
    }

    .eh-chat-panel-inner,
    .eh-chat-panel iframe{
      width: 100%;
      height: 100%;
      border: 0;
      display: block;
    }

  @media (max-width: 480px){

  /* Burbuja: bien pegada a la esquina y respetando safe-area */
  #eh-chat-bubble{
    right: 16px !important;
    bottom: calc(env(safe-area-inset-bottom, 0px) + 0px) !important;
    width: 60px !important;
    height: 60px !important;
  }

  /* Panel: ocupa casi todo el ancho, sin “espacio raro” y sin cortarse */
  .eh-chat-panel{
    left: 12px !important;
    right: 12px !important;
    width: auto !important;

    bottom: calc(env(safe-area-inset-bottom, 0px) + 0px) !important;

    /* dvh = viewport real en iOS moderno */
    height: min(78dvh, 620px) !important;
    max-height: none !important;

    border-radius: 18px !important;
  }

  /* Asegura que el iframe no deje bordes raros */
  .eh-chat-panel iframe{
    width: 100% !important;
    height: 100% !important;
    border: 0 !important;
    display: block !important;
  }
}

	  
	  
  </style>

  <script>
    (function(){
      const bubble = document.getElementById('eh-chat-bubble');
      const panel = document.getElementById('eh-chat-panel');
      if(!bubble || !panel) return;

      bubble.addEventListener('click', (e) => {
  e.stopPropagation(); // evita que el click llegue al document y lo cierre
  const isOpen = panel.classList.toggle('open');
  panel.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
  document.body.classList.toggle('chat-open', isOpen);
});


      // Cierra si hacen click fuera (opcional)
     document.addEventListener('click', (e) => {
  if(!panel.classList.contains('open')) return;
  const clickedInside = panel.contains(e.target) || bubble.contains(e.target);
  if(!clickedInside){
    panel.classList.remove('open');
    panel.setAttribute('aria-hidden','true');
    document.body.classList.remove('chat-open');
  }
});

    })();
  </script>

<?php endif; ?>

<?php
if($json) {
    $job_count = count($json);
    $countries = array();
    $modalities = array();

    foreach ($json as $row) {
        $country_value = trim((string) ($row['pais'] ?? 'Chile'));
        $modality_value = trim((string) ($row['modalidad'] ?? ''));

        if ($country_value !== '') {
            $countries[$country_value] = sanitize_title($country_value);
        }

        if ($modality_value !== '') {
            $modalities[$modality_value] = sanitize_title($modality_value);
        }
    }

    ksort($countries, SORT_NATURAL | SORT_FLAG_CASE);
    ksort($modalities, SORT_NATURAL | SORT_FLAG_CASE);
    
    // Schema.org para la página completa (CollectionPage)
    echo '<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "name": "Vacantes Disponibles en eHunting Latam",
        "description": "Oportunidades laborales en consultoría de recursos humanos y headhunting en Latinoamérica",
        "url": "' . get_permalink() . '",
        "publisher": {
            "@type": "Organization",
            "name": "eHunting Latam",
            "url": "https://ehlatam.com",
            "logo": {
                "@type": "ImageObject",
                "url": "https://www.ehlatam.com/wp-content/uploads/2025/08/cropped-Imagen-de-WhatsApp-2025-05-12-a-las-11.35.27_e26ebfdd.jpg"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "contactType": "Recruitment",
                "email": "contacto@ehlatam.com",
                "availableLanguage": ["Spanish", "English", "Portuguese"]
            }
        }
    }
    </script>';
    
    echo "
    <div class=\"vacantes-container\">
        <header class=\"page-header\">
            <h1 class=\"page-title\">Conecta con las <strong>oportunidades</strong> que impulsarán tu carrera</h1>
            <p class=\"page-subtitle\">Postula y accede a vacantes globales para posiciones en tecnología y transformación digital de empresas líderes en el mercado.</p>
            <div class=\"jobs-count\">
                <i class=\"material-icons\" style=\"font-size: 18px;\">work</i>
                <span>{$job_count} " . ($job_count === 1 ? 'vacante disponible' : 'vacantes disponibles') . "</span>
            </div>
        </header>
        <section class=\"jobs-toolbar\" aria-label=\"Filtros de vacantes\">
            <div class=\"jobs-filters\">
                <div class=\"jobs-filter\">
                    <label class=\"jobs-filter__label\" for=\"jobs-filter-country\">País</label>
                    <select id=\"jobs-filter-country\" class=\"jobs-filter__select browser-default\" data-filter=\"country\">
                        <option value=\"\">Todos</option>";

    foreach ($countries as $country_label => $country_slug) {
        echo '<option value="' . esc_attr($country_slug) . '">' . esc_html($country_label) . '</option>';
    }

    echo "
                    </select>
                </div>
                <div class=\"jobs-filter\">
                    <label class=\"jobs-filter__label\" for=\"jobs-filter-modality\">Modalidad</label>
                    <select id=\"jobs-filter-modality\" class=\"jobs-filter__select browser-default\" data-filter=\"modality\">
                        <option value=\"\">Todas</option>";

    foreach ($modalities as $modality_label => $modality_slug) {
        echo '<option value="' . esc_attr($modality_slug) . '">' . esc_html($modality_label) . '</option>';
    }

    echo "
                    </select>
                </div>
            </div>
            <div class=\"jobs-results\" data-jobs-results>{$job_count} " . ($job_count === 1 ? 'vacante' : 'vacantes') . "</div>
        </section>
        
        <section class=\"jobs-layout\">
            <main class=\"jobs-grid\" data-jobs-grid>";

    $job_details_markup = '';
    foreach($json as $key => $value) {
        $cargo      = htmlspecialchars($json[$key]['cargo'], ENT_QUOTES, 'UTF-8');
        $oferta_raw = preg_replace("/;/", "\n", (string) $json[$key]['oferta']);
        $mision_raw = preg_replace("/;/", "\n", (string) $json[$key]['mision']);
        $requisitos_raw = preg_replace("/;/", "\n", (string) $json[$key]['requisitos']);
        $beneficios_raw = preg_replace("/;/", "\n", (string) $json[$key]['beneficios']);
        $oferta     = trim(wp_strip_all_tags($oferta_raw));
        $mision     = nl2br(htmlspecialchars($mision_raw, ENT_QUOTES, 'UTF-8'));
        $requisitos = nl2br(htmlspecialchars($requisitos_raw, ENT_QUOTES, 'UTF-8'));
        $modalidad  = htmlspecialchars(preg_replace("/;/", ",", $json[$key]['modalidad']), ENT_QUOTES, 'UTF-8');
        $beneficios = nl2br(htmlspecialchars($beneficios_raw, ENT_QUOTES, 'UTF-8'));
        $pais       = isset($json[$key]['pais']) ? htmlspecialchars($json[$key]['pais'], ENT_QUOTES, 'UTF-8') : 'Chile';
        $ciudad     = isset($json[$key]['ciudad']) ? htmlspecialchars($json[$key]['ciudad'], ENT_QUOTES, 'UTF-8') : '';

        $summary = wp_strip_all_tags($oferta ?: $mision);
        $job_id = 'job-detail-' . $key;
        $location_label = trim(($ciudad ? $ciudad . ', ' : '') . $pais);

        echo get_job_card($cargo, $summary, $mision, $requisitos, $modalidad, $beneficios, $pais, $ciudad);

        $job_details_markup .= '
            <article class="job-detail__inner" id="' . esc_attr($job_id) . '" data-job-detail' . (0 === $key ? '' : ' hidden') . '>
                <div class="job-detail__eyebrow job-status-pill"><span class="job-status-pill__dot" aria-hidden="true"></span>Vacante activa</div>
                <h2 class="job-detail__title">' . $cargo . '</h2>
                <div class="job-detail__meta">
                    <span class="job-card__tag">' . esc_html($location_label) . '</span>
                    <span class="job-card__tag">' . esc_html($modalidad) . '</span>
                </div>
                <section class="job-detail__section job-detail__section--requirements">
                    <h3 class="job-detail__section-title"><span class="job-detail__section-icon" aria-hidden="true">✓</span>Requisitos</h3>
                    ' . ehunting_job_list_markup($requisitos_raw) . '
                </section>
                <a class="job-detail__apply btn-postular job-apply-button" href="mailto:contacto@ehlatam.com?subject=' . rawurlencode('Postulacion: ' . html_entity_decode($cargo, ENT_QUOTES, 'UTF-8')) . '">Postular</a>
            </article>';
    }

    echo "
            </main>
            <aside class=\"job-detail\" data-job-detail-panel>" . $job_details_markup . "</aside>
        </section>
        <div class=\"jobs-empty\" data-jobs-empty>No encontramos vacantes con esos filtros. Prueba con otra combinación.</div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const grid = document.querySelector('[data-jobs-grid]');
                if (!grid) return;

                const cards = Array.from(grid.querySelectorAll('.job-card-col'));
                const triggers = Array.from(grid.querySelectorAll('[data-job-trigger]'));
                const details = Array.from(document.querySelectorAll('[data-job-detail]'));
                const countrySelect = document.querySelector('[data-filter=\"country\"]');
                const modalitySelect = document.querySelector('[data-filter=\"modality\"]');
                const emptyState = document.querySelector('[data-jobs-empty]');
                const results = document.querySelector('[data-jobs-results]');
                let activeIndex = 0;

                function renderDetail(index) {
                    activeIndex = index;

                    triggers.forEach(function (trigger, triggerIndex) {
                        const isActive = triggerIndex === index;
                        trigger.classList.toggle('is-active', isActive);
                        trigger.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                    });

                    details.forEach(function (detail, detailIndex) {
                        detail.hidden = detailIndex !== index;
                    });
                }

                function updateFilters() {
                    const country = countrySelect ? countrySelect.value : '';
                    const modality = modalitySelect ? modalitySelect.value : '';
                    let visibleCount = 0;
                    let firstVisibleIndex = -1;

                    cards.forEach(function (card, index) {
                        const matchesCountry = !country || card.dataset.country === country;
                        const matchesModality = !modality || card.dataset.modality === modality;
                        const isVisible = matchesCountry && matchesModality;

                        card.style.display = isVisible ? '' : 'none';

                        if (isVisible) {
                            visibleCount += 1;
                            if (firstVisibleIndex === -1) {
                                firstVisibleIndex = index;
                            }
                        }
                    });

                    if (results) {
                        results.textContent = visibleCount + ' ' + (visibleCount === 1 ? 'vacante' : 'vacantes');
                    }

                    if (emptyState) {
                        emptyState.classList.toggle('is-visible', visibleCount === 0);
                    }

                    if (visibleCount > 0) {
                        if (cards[activeIndex] && cards[activeIndex].style.display !== 'none') {
                            renderDetail(activeIndex);
                        } else {
                            renderDetail(firstVisibleIndex);
                        }
                    }
                }

                triggers.forEach(function (trigger, index) {
                    trigger.addEventListener('click', function () {
                        renderDetail(index);
                    });
                });

                document.querySelectorAll('[data-job-detail]').forEach(function (detail) {
                    const tabs = Array.from(detail.querySelectorAll('.job-tabs-nav a'));
                    const panes = Array.from(detail.querySelectorAll('.tab-pane'));

                    tabs.forEach(function (tab) {
                        tab.addEventListener('click', function (event) {
                            event.preventDefault();
                            const target = detail.querySelector(tab.getAttribute('href'));
                            if (!target) return;

                            tabs.forEach(function (item) {
                                const isActive = item === tab;
                                item.classList.toggle('active', isActive);
                                item.setAttribute('aria-selected', isActive ? 'true' : 'false');
                            });

                            panes.forEach(function (pane) {
                                pane.classList.toggle('active', pane === target);
                            });
                        });
                    });
                });

                if (countrySelect) countrySelect.addEventListener('change', updateFilters);
                if (modalitySelect) modalitySelect.addEventListener('change', updateFilters);

                renderDetail(0);
                updateFilters();
            });
        </script>
        <div style=\"padding: clamp(30px, 6vw, 40px) 0;\"></div>
    </div>";
}

get_footer(); 
?>
