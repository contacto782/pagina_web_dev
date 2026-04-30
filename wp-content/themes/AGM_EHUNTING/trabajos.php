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
    $employmentType = "FULL_TIME";
    if (stripos($modalidad, 'part') !== false || stripos($modalidad, 'medio') !== false) {
        $employmentType = "PART_TIME";
    } elseif (stripos($modalidad, 'remoto') !== false || stripos($modalidad, 'remote') !== false) {
        $employmentType = "CONTRACTOR";
    }

    $location_label = trim(($ciudad ? $ciudad . ', ' : '') . $pais);
    $description = trim($oferta ?: strip_tags($mision));
    $description = $description ?: 'Conoce los detalles de esta oportunidad y postula para avanzar en tu carrera digital.';
    $country_filter = esc_attr(sanitize_title($pais));
    $modality_filter = esc_attr(sanitize_title($modalidad));

    return "
    <div class=\"job-card-col\" data-country=\"{$country_filter}\" data-modality=\"{$modality_filter}\">
        <article itemscope itemtype=\"https://schema.org/JobPosting\" class=\"job-card\">
            <meta itemprop=\"datePosted\" content=\"" . date('Y-m-d') . "\">
            <meta itemprop=\"validThrough\" content=\"" . date('Y-m-d', strtotime('+60 days')) . "\">
            <meta itemprop=\"employmentType\" content=\"{$employmentType}\">

            <div itemprop=\"hiringOrganization\" itemscope itemtype=\"https://schema.org/Organization\" style=\"display:none;\">
                <meta itemprop=\"name\" content=\"eHunting Latam\">
                <meta itemprop=\"sameAs\" content=\"https://ehlatam.com\">
            </div>

            <div itemprop=\"jobLocation\" itemscope itemtype=\"https://schema.org/Place\">
                <div itemprop=\"address\" itemscope itemtype=\"https://schema.org/PostalAddress\">
                    <meta itemprop=\"addressLocality\" content=\"".htmlspecialchars($ciudad ?: $modalidad, ENT_QUOTES, 'UTF-8')."\">
                    <meta itemprop=\"addressCountry\" content=\"{$pais}\">
                </div>
            </div>

            <h2 itemprop=\"title\" class=\"job-card__title\">{$cargo}</h2>

            <div class=\"job-card__meta\">
                <span class=\"job-card__tag\">{$location_label}</span>
                <span class=\"job-card__tag\">{$modalidad}</span>
            </div>

            <div class=\"job-card__description\">
                <p itemprop=\"description\">{$description}</p>
            </div>

            <a class=\"job-card__button\" href=\"mailto:postula@ehunting.cl?subject=Postulación: " . urlencode($cargo) . "\">Postular</a>
        </article>
    </div>";
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

        $applyUrl = 'mailto:postula@ehunting.cl?subject=Postulación: ' . rawurlencode($cargo);
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
        background: #ffffff;
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
        color: rgba(255, 255, 255, 0.82);
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
        border: 1px solid rgba(87, 190, 205, 0.28);
        border-radius: 8px;
        background: rgba(11, 25, 45, 0.92);
        color: #fff;
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
    }

    .jobs-filter__select option {
        color: #081426;
    }

    .jobs-results {
        color: rgba(255, 255, 255, 0.86);
        font-size: 14px;
        line-height: 1.4;
        font-weight: 600;
        white-space: nowrap;
    }

    .jobs-empty {
        display: none;
        padding: 28px 24px;
        margin-top: 10px;
        border: 1px solid rgba(87, 190, 205, 0.22);
        border-radius: 8px;
        background: rgba(8, 20, 38, 0.72);
        color: rgba(255, 255, 255, 0.86);
        text-align: center;
        font-size: 16px;
        line-height: 1.5;
    }

    .jobs-empty.is-visible {
        display: block;
    }

    .jobs-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: clamp(20px, 2.8vw, 30px);
        margin: 0;
        align-items: stretch;
    }

    .job-card-col {
        padding: 0;
        margin: 0 0 clamp(18px, 2.8vw, 26px);
    }

    .job-card {
        position: relative;
        min-height: 438px;
        height: 100%;
        padding: 24px 22px 24px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.045), rgba(255, 255, 255, 0)),
            linear-gradient(180deg, rgba(17, 34, 57, 0.98) 0%, rgba(7, 18, 34, 0.99) 100%);
        box-shadow:
            0 18px 42px rgba(2, 8, 20, 0.36),
            inset 0 0 0 1px rgba(87, 190, 205, 0.08);
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 14px;
        transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        overflow: hidden;
    }

    .job-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 28px;
        right: 28px;
        height: 3px;
        border-radius: 999px;
        background: linear-gradient(90deg, #df7138 0%, #57becd 100%);
        opacity: 0.9;
    }

    .job-card:hover {
        transform: translateY(-6px);
        border-color: rgba(223, 113, 56, 0.48);
        box-shadow:
            0 24px 56px rgba(2, 8, 20, 0.46),
            0 0 18px rgba(223, 113, 56, 0.12),
            inset 0 0 0 1px rgba(87, 190, 205, 0.14);
    }

    .job-card__title {
        width: 100%;
        height: 128px;
        min-height: 128px;
        margin: 0;
        padding: 0 0 14px;
        border-bottom: 1px solid rgba(87, 190, 205, 0.22);
        border-radius: 0;
        background: transparent;
        color: #fff;
        text-align: center;
        font-size: clamp(15px, 1.2vw, 18px);
        font-weight: 800;
        line-height: 1.14;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        text-wrap: balance;
        overflow: hidden;
    }

    .job-card__meta {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
        margin: 0;
    }

    .job-card__tag {
        min-height: 38px;
        border: 1px solid rgba(87, 190, 205, 0.38);
        border-radius: 8px;
        background: rgba(87, 190, 205, 0.08);
        color: rgba(255, 255, 255, 0.9);
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
        flex: 1 1 auto;
        min-height: 150px;
        max-height: 150px;
        margin: 0;
        border: 1px solid rgba(87, 190, 205, 0.3);
        border-radius: 8px;
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        padding: 18px;
        background: rgba(3, 11, 24, 0.22);
        color: rgba(255, 255, 255, 0.78);
        text-align: left;
        font-size: 14px;
        line-height: 1.45;
        overflow-y: auto;
        overflow-x: hidden;
        scrollbar-width: thin;
        scrollbar-color: rgba(87, 190, 205, 0.55) rgba(255, 255, 255, 0.06);
    }

    .job-card__description p {
        margin: 0;
        display: block;
    }

    .job-card__description::-webkit-scrollbar {
        width: 6px;
    }

    .job-card__description::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.06);
        border-radius: 999px;
    }

    .job-card__description::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, rgba(87, 190, 205, 0.85), rgba(223, 113, 56, 0.8));
        border-radius: 999px;
    }

    .job-card__button {
        min-width: 132px;
        min-height: 44px;
        margin: 4px auto 0;
        border-radius: 8px;
        background: #df7138;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 24px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 800;
        line-height: 1;
    }

    .job-card__button:hover,
    .job-card__button:focus {
        background: #ef7d40;
        color: #fff;
        transform: translateY(-2px);
    }

    @media (max-width: 1100px) {
        .jobs-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
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

        .jobs-grid {
            grid-template-columns: 1fr;
        }

        .page-header {
            margin-top: 28px;
        }

        .job-card {
            min-height: 390px;
            padding: 22px 20px 24px;
        }

        .job-card__title {
            height: 112px;
            min-height: 112px;
            padding-top: 0;
        }

        .job-card__description {
            min-height: 144px;
            max-height: 144px;
        }
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
                "email": "postula@ehunting.cl",
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
        
        <main class=\"jobs-grid\" data-jobs-grid>";

    foreach($json as $key => $value) {
        $cargo      = htmlspecialchars($json[$key]['cargo'], ENT_QUOTES, 'UTF-8');
        $oferta     = strip_tags(preg_replace("/;/", ",", $json[$key]['oferta']));
        $mision     = nl2br(htmlspecialchars(preg_replace("/;/", ",", $json[$key]['mision']), ENT_QUOTES, 'UTF-8'));
        $requisitos = nl2br(htmlspecialchars(preg_replace("/;/", ",", $json[$key]['requisitos']), ENT_QUOTES, 'UTF-8'));
        $modalidad  = htmlspecialchars(preg_replace("/;/", ",", $json[$key]['modalidad']), ENT_QUOTES, 'UTF-8');
        $beneficios = nl2br(htmlspecialchars(preg_replace("/;/", ",", $json[$key]['beneficios']), ENT_QUOTES, 'UTF-8'));
        $pais       = isset($json[$key]['pais']) ? htmlspecialchars($json[$key]['pais'], ENT_QUOTES, 'UTF-8') : 'Chile';
        $ciudad     = isset($json[$key]['ciudad']) ? htmlspecialchars($json[$key]['ciudad'], ENT_QUOTES, 'UTF-8') : '';

        echo get_job_card($cargo, $oferta, $mision, $requisitos, $modalidad, $beneficios, $pais, $ciudad);
    }

    echo "
        </main>
        <div class=\"jobs-empty\" data-jobs-empty>No encontramos vacantes con esos filtros. Prueba con otra combinación.</div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const grid = document.querySelector('[data-jobs-grid]');
                if (!grid) return;

                const cards = Array.from(grid.querySelectorAll('.job-card-col'));
                const countrySelect = document.querySelector('[data-filter=\"country\"]');
                const modalitySelect = document.querySelector('[data-filter=\"modality\"]');
                const emptyState = document.querySelector('[data-jobs-empty]');
                const results = document.querySelector('[data-jobs-results]');

                function updateFilters() {
                    const country = countrySelect ? countrySelect.value : '';
                    const modality = modalitySelect ? modalitySelect.value : '';
                    let visibleCount = 0;

                    cards.forEach(function (card) {
                        const matchesCountry = !country || card.dataset.country === country;
                        const matchesModality = !modality || card.dataset.modality === modality;
                        const isVisible = matchesCountry && matchesModality;

                        card.style.display = isVisible ? '' : 'none';

                        if (isVisible) {
                            visibleCount += 1;
                        }
                    });

                    if (results) {
                        results.textContent = visibleCount + ' ' + (visibleCount === 1 ? 'vacante' : 'vacantes');
                    }

                    if (emptyState) {
                        emptyState.classList.toggle('is-visible', visibleCount === 0);
                    }
                }

                if (countrySelect) countrySelect.addEventListener('change', updateFilters);
                if (modalitySelect) modalitySelect.addEventListener('change', updateFilters);

                updateFilters();
            });
        </script>
        <div style=\"padding: clamp(30px, 6vw, 40px) 0;\"></div>
    </div>";
}

get_footer(); 
?>
