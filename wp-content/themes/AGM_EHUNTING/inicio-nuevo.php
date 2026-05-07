<?php
/**
 * Template Name: Inicio Nuevo
 */
?>

<?php get_header(); ?>

<style>
    /* Estilos generales para inputs */
    input, textarea, select{
        border: solid 1px !important;
        border-radius: 5px !important;
        text-indent: 10px !important;
    }
    button, .btn{ border-radius: 5px !important; }
    #slide-out{ z-index: 1000000000000 !important; }

    .modal{
        border-radius: 20px !important;
        background-color: #d0d0d0 !important;
        z-index: 200000000000000000000000000000000000000 !important;
    }
    .modal-content{ padding:0 !important }
    .modal-content .header{
        position: relative;
        background: #002F5F !important;
        width: 100%; height: 80px; padding: 10px 25px;
    }
    /* 1) Placeholder global (inputs y textareas) */
    input::placeholder, textarea::placeholder{ color:white !important; opacity:1; }
    /* 2) Placeholder dentro del modal */
    .modal-content input::placeholder, .modal-content textarea::placeholder{ color:#bbb !important; opacity:1; }
    .modal-content input, .modal-content textarea, .modal-content select{
        border: solid 1px #bbb !important; border-radius: 5px !important; text-indent: 10px !important;
        background:#fff !important; color:#000 !important;
    }
	

</style>

<!-- SECCION DE BIENVENIDA -->
<meta name="description" content="Headhunter especializado en Transformación Digital en Hispanoamérica. Atraemos talentos IT & digitales sobresalientes con alta precisión.">
<meta name="keywords" content="head-hunting ejecutivo, talento ejecutivo LATAM, reclutamiento de alta gerencia, reclutamiento para cargos de alta dirección">

<div class="row home-hero">
  <div class="home-hero__overlay"></div>
  <div class="home-hero__glow"></div>

  <div class="contenedor-titulo center-align white-text home-hero__content">
    <?php /*<i style="display:block;margin-top:20px" class="light flow-text">Founded en 2014</i> */ ?>
    <h1 class="letras1 home-hero__title">Headhunter Digital y Executive Search de Talento TI</h1>
    <p class="home-hero__subtitle">Impulsamos el éxito de tu empresa conectándote con líderes y profesionales excepcionales de IT &amp; Digital en LATAM.</p>
    <div class="home-hero__actions">
      <a href="#contacto" data-target="contactanos-nuevo" class="btn modal-trigger home-hero__button home-hero__button--primary">Necesito contratar</a>
      <a href="/que-hacemos" class="btn home-hero__button home-hero__button--ghost">Ver servicios</a>
    </div>
  </div>

  <?php
  // Detecta dispositivos Apple para mostrar gif en lugar de video
  $ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
  $isApple = stripos($ua, 'iPod') !== false || stripos($ua, 'iPhone') !== false || stripos($ua, 'iPad') !== false;

  if ($isApple){
      echo '<img class="movilvideo lazy home-hero__video" src="'. esc_url( get_stylesheet_directory_uri() . '/images/timelapse1.gif') .'" alt="Hero">';
  } else {
      echo '<video class="desktopvideo1 lazy home-hero__video" autoplay muted loop playsinline src="'. esc_url( get_stylesheet_directory_uri() . '/images/time3-1.mp4') .'"></video>';
  }
  ?>
</div>

<?php
$featured_clients = array(
  array('href' => 'https://vtr.com/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/vtr-logo.png', 'alt' => 'VTR'),
  array('href' => 'https://www.subaru.com/index.html', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/Subaru-logo.png', 'alt' => 'Subaru'),
  array('href' => 'https://www.nestle.com/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/Nestle-logo.png', 'alt' => 'Nestlé'),
  array('href' => 'https://www.mrm.com/en/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/MRM-logo.png', 'alt' => 'MRM'),
  array('href' => 'https://www.mccann.com/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/McCANN-logo.png', 'alt' => 'McCann Worldgroup'),
  array('href' => 'https://lla.com/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/liberty-logo.png', 'alt' => 'Liberty Latin America'),
  array('href' => 'https://www.jumbo.cl/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/Jumbo-logo.png', 'alt' => 'Jumbo'),
  array('href' => 'https://www.indumotora.cl/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/Indumotora-logo.png', 'alt' => 'Indumotora'),
  array('href' => 'https://www.femsa.com/es/unidades-de-negocio/proximidad-y-salud/femsa-salud/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/FEMSA-logo.png', 'alt' => 'FEMSA Salud'),
  array('href' => 'https://www.entel.cl/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/entel-logo.png', 'alt' => 'Entel'),
  array('href' => 'https://club.cruzverde.cl/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/Cruz-verde-logo.png', 'alt' => 'Cruz Verde'),
  array('href' => 'https://www.colgate.com/en-us', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/colgate-logo.png', 'alt' => 'Colgate'),
  array('href' => 'https://betterfly.com/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/Betterffly-logo.png', 'alt' => 'Betterfly'),
  array('href' => 'https://www.bancoripley.cl/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/Banco-Ripleylogo.png', 'alt' => 'Banco Ripley'),
  array('href' => 'https://www.ashleyfurniture.com/', 'img' => 'http://ehlatam.com/wp-content/uploads/2026/04/ashley-Homestore-logo.png', 'alt' => 'Ashley HomeStore'),
);
$featured_metrics = array(
  array('number' => '+2.150', 'label' => 'Texto métrica 1'),
  array('number' => '+10', 'label' => 'Texto métrica 2'),
  array('number' => '98%', 'label' => 'Texto métrica 3'),
  array('number' => '99%', 'label' => 'Texto métrica 4'),
);
$featured_services = array(
  array('icon' => 'groups', 'title' => 'Executive Search', 'image' => 'images/Executive search.png'),
  array('icon' => 'travel_explore', 'title' => 'Reclutamiento IT & Digital', 'image' => 'images/Reclutamiento IT & Digital.png'),
  array('icon' => 'psychology_alt', 'title' => 'AI Training para RRHH', 'image' => 'images/AI Training para RRHH.png'),
  array('icon' => 'workspace_premium', 'title' => 'Employer Branding Advisory', 'image' => 'images/Employer Branding Advisory.png'),
  array('icon' => 'smart_toy', 'title' => 'Desarrollo de Agentes IA para RRHH', 'image' => 'images/Desarrollo de agentes IA para RRHH.png'),
  array('icon' => 'monitoring', 'title' => 'Estudios de Compensación y Bienestar', 'image' => 'images/Estudios de Compensación y Bienestar.png'),
);
?>

<section class="home-solutions-showcase">
  <div class="home-solutions-showcase__shell">
    <div class="home-solutions-showcase__logos-marquee" aria-label="Empresas con las que hemos trabajado">
      <div class="home-solutions-showcase__logos-track">
        <?php foreach ($featured_clients as $client) : ?>
          <div class="home-solutions-showcase__logo-slide">
            <a href="<?php echo esc_url($client['href']); ?>" target="_blank" rel="noopener" class="home-solutions-showcase__logo-link">
              <img src="<?php echo esc_url($client['img']); ?>" alt="<?php echo esc_attr($client['alt']); ?>" class="home-solutions-showcase__logo" loading="lazy" decoding="async">
            </a>
          </div>
        <?php endforeach; ?>
        <?php foreach ($featured_clients as $client) : ?>
          <div class="home-solutions-showcase__logo-slide" aria-hidden="true">
            <a href="<?php echo esc_url($client['href']); ?>" target="_blank" rel="noopener" class="home-solutions-showcase__logo-link" tabindex="-1">
              <img src="<?php echo esc_url($client['img']); ?>" alt="" class="home-solutions-showcase__logo" loading="lazy" decoding="async">
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="home-solutions-showcase__metrics">
      <?php foreach ($featured_metrics as $metric) : ?>
        <article class="home-solutions-showcase__metric">
          <strong class="home-solutions-showcase__metric-number"><?php echo esc_html($metric['number']); ?></strong>
          <span class="home-solutions-showcase__metric-label"><?php echo esc_html($metric['label']); ?></span>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="home-solutions-showcase__content">
      <div class="home-solutions-showcase__text">
        <h2 class="home-solutions-showcase__title">Soluciones Integrales especializadas en Talento IT &amp; Digital</h2>
        <p class="home-solutions-showcase__copy">En eHunting Latam conectamos a las organizaciones con talento tecnológico y digital que impulsa su transformación. Mediante un enfoque ágil y consultivo, aseguramos procesos precisos, eficientes y alineados a la cultura y objetivos de cada empresa.</p>
        <p class="home-solutions-showcase__lead">Cuéntanos tu desafío, nosotros lo resolvemos por ti.</p>

        <div class="home-solutions-showcase__footer">
          <a href="/que-hacemos" class="btn home-solutions-showcase__button">Más información</a>
        </div>
      </div>

      <div class="home-solutions-showcase__services solutions-grid">
        <?php foreach ($featured_services as $service) : ?>
          <article class="solution-card">
            <?php
            $service_image_relative = isset($service['image']) ? $service['image'] : '';
            $service_image_absolute = $service_image_relative ? trailingslashit(get_stylesheet_directory()) . ltrim($service_image_relative, '/') : '';
            $service_image_uri = $service_image_relative ? trailingslashit(get_stylesheet_directory_uri()) . ltrim($service_image_relative, '/') : '';
            $service_has_image = $service_image_relative && file_exists($service_image_absolute);
            ?>
            <div class="solution-card__icon">
              <?php if ($service_has_image) : ?>
                <img src="<?php echo esc_url($service_image_uri); ?>" alt="<?php echo esc_attr($service['title']); ?>" class="solution-card__image" loading="lazy" decoding="async">
              <?php else : ?>
                <span class="solution-card__material-icon material-icons"><?php echo esc_html($service['icon']); ?></span>
              <?php endif; ?>
            </div>
            <h3 class="solution-card__title"><?php echo esc_html($service['title']); ?></h3>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php
$choose_us_items = array(
  array(
    'icon' => 'verified_user',
    'image' => 'images/GARANTIA DE REMPLAZO.png',
    'title' => 'Garantía de reemplazo sin costo',
    'copy' => 'Si el profesional no encaja, lo reemplazamos sin costo adicional.',
    'accent' => '',
  ),
  array(
    'icon' => 'memory',
    'image' => 'images/ESPECIALISTA EN TECNOLOGIA.png',
    'title' => 'Especialistas en tecnología',
    'copy' => 'Somos una firma enfocada exclusivamente en talento tecnológico y digital.',
    'accent' => 'is-featured',
  ),
  array(
    'icon' => 'public',
    'image' => 'images/COBERTURA EN AMERICA LATINA.png',
    'title' => 'Cobertura en América Latina',
    'copy' => 'Experiencia en Colombia, Chile, Perú, México y otros países de la región.',
    'accent' => '',
  ),
  array(
    'icon' => 'manage_search',
    'image' => 'images/MAS QUE UNA EMPRESA DE RECLUTAMIENTO.png',
    'title' => 'Más que una empresa de reclutamiento',
    'copy' => 'Actuamos como aliados estratégicos en procesos de transformación y evolución digital.',
    'accent' => '',
  ),
);
$success_cases = array(
  array(
    'logo' => 'http://ehlatam.com/wp-content/uploads/2026/04/MRM-logo.png',
    'company' => 'MRM',
    'title' => 'Proyecto de Expansión Estratégica Global',
    'headline' => 'Grupo McCann / MRM / IPG – Hub Digital LATAM',
    'project_lines' => array(
      'Proyecto de Expansión Estratégica Global',
      'Grupo McCann (IPG) determinó implementar un hub de delivery digital en América Latina.',
      'Roles requeridos: +150 profesionales en distintas áreas incluyendo marketing digital, marketing automation, eCommerce, Quality Assurance, Contenido Digital, desarrollo de software, arquitectura TI, etc.',
    ),
    'results' => array(
      'Hub digital LATAM completamente operativo y reconocido como unidad estratégica global dentro del grupo IPG.',
      'Reducción de tiempos de cobertura de vacantes críticas y mejora en la calidad de contratación, impactando directamente en el time-to-market de campañas digitales.',
      'Mayor capacidad para atender proyectos globales desde América Latina, posicionando al hub como referencia regional en innovación y delivery digital.',
    ),
  ),
  array(
    'logo' => 'http://ehlatam.com/wp-content/uploads/2026/04/FEMSA-logo.png',
    'company' => 'FEMSA',
    'title' => 'Proyecto de Fortalecimiento de Capabilities Digitales',
    'headline' => 'FEMSA Salud – División Farmacias (México y América Latina)',
    'project_lines' => array(
      'Proyecto de fortalecimiento de Capabilities Digitales',
      'Proyecto enfocado en la División de Farmacias de FEMSA en Chile, Ecuador, Colombia y México.',
      'Alcance: +50 perfiles especializados contratados en diferentes fases.',
      'Roles requeridos: Gerencias y Subgerencias Digitales, Jefaturas de Proyectos, Product Owners, Business Analysts, Desarrolladores de Software.',
    ),
    'results' => array(
      'Incorporación exitosa y en los plazos programados de todos los profesionales requeridos, garantizando continuidad en los proyectos críticos de la División de Farmacias.',
      'Mayor capacidad interna para diseñar, ejecutar y escalar soluciones digitales en la región, fortaleciendo el posicionamiento de FEMSA Salud como referente en retail farmacéutico.',
    ),
  ),
  array(
    'logo' => 'http://ehlatam.com/wp-content/uploads/2026/04/Nestle-logo.png',
    'company' => 'Nestlé',
    'title' => 'Proyecto de Innovación<br>Analytics',
    'headline' => 'Nestlé – Creación de Gerencia de Analytics',
    'project_lines' => array(
      'Proyecto de Innovación Analítica',
      'Nestlé definió la necesidad de crear una Gerencia de Analytics para uno de sus territorios en América Latina.',
      'Objetivo: Generar las capacidades para transformar datos en inteligencia accionable para el negocio.',
      'Roles requeridos: Gerente, Product Owners, Business Analysts.',
    ),
    'results' => array(
      'Consolidación de la nueva Gerencia de Analytics dentro de los plazos definidos, con un equipo robusto y multidisciplinario.',
      'Mayor capacidad para anticipar tendencias, optimizar inversiones y acelerar la toma de decisiones basada en datos en el territorio de Nestlé en Latinoamérica.',
    ),
  ),
);
$testimonials = array(
  array(
    'name' => 'Juan Camilo Solanilla',
    'role' => 'Human Development and Management Director',
    'company' => 'Credicorp Capital',
    'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=240&q=80',
    'quote' => 'La experiencia con eHunting ha sido excelente. Su agilidad, profesionalismo y conocimiento del mercado nos permitieron avanzar con seguridad en procesos clave de selección.',
  ),
  array(
    'name' => 'Alejandra Ramírez Valderrama',
    'role' => 'HR Coordinator',
    'company' => 'WSP',
    'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=240&q=80',
    'quote' => 'Encontramos en eHunting un aliado estratégico para búsquedas complejas. La comunicación, empatía y capacidad de ajuste marcaron una diferencia real en nuestro proceso.',
  ),
  array(
    'name' => 'Camilo Sánchez',
    'role' => 'CEO & Co-founder',
    'company' => 'Laika',
    'avatar' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=240&q=80',
    'quote' => 'Colaborar con eHunting nos permitió avanzar con más confianza en posiciones de alto impacto. El nivel de acompañamiento y foco en resultados fue sobresaliente.',
  ),
);
$faq_items = array(
  array('question' => '¿Cómo definen el perfil estratégico junto al cliente?', 'answer' => 'Trabajamos una etapa de discovery para entender el contexto del negocio, la cultura, los objetivos del rol y las capacidades críticas. Con eso construimos un perfil priorizado y accionable.'),
  array('question' => '¿Qué pasos siguen para garantizar una búsqueda efectiva y ágil de talento?', 'answer' => 'Activamos una metodología con definición de perfil, hunting especializado, evaluación, shortlist validado y acompañamiento consultivo durante todo el proceso.'),
  array('question' => '¿En cuánto tiempo presentan los primeros candidatos?', 'answer' => 'Depende del nivel de seniority y la complejidad del rol, pero normalmente presentamos primeros avances en un plazo corto con foco en calidad y ajuste real al desafío.'),
  array('question' => '¿Qué metodologías utilizan para evaluar a los profesionales?', 'answer' => 'Combinamos entrevistas por competencias, validación técnica, assessment situacional y contraste con el contexto estratégico del cargo.'),
  array('question' => '¿Cuál es su experiencia en el mercado tecnológico y digital de Latinoamérica?', 'answer' => 'Hemos acompañado procesos en múltiples países y sectores, con foco en talento IT, digital, e-commerce, analytics, producto, growth y transformación.'),
  array('question' => '¿Qué acompañamiento brindan durante y después del proceso?', 'answer' => 'Acompañamos la toma de decisión, el cierre de la búsqueda y el onboarding inicial para maximizar ajuste y continuidad.'),
  array('question' => '¿Cómo mantienen la comunicación y el seguimiento con el cliente durante todo el proceso?', 'answer' => 'Definimos una cadencia de seguimiento clara con avances, aprendizajes del mercado y ajustes sobre el perfil cuando es necesario.'),
  array('question' => '¿Qué diferencia a eHunting Latam de otras firmas?', 'answer' => 'Nuestra especialización en talento tecnológico y digital, más un enfoque consultivo y regional, nos permite operar con mayor precisión en búsquedas estratégicas.'),
  array('question' => '¿Ofrecen garantía de reemplazo?', 'answer' => 'Sí, dependiendo del servicio contratado ofrecemos condiciones de reemplazo para reducir riesgo y proteger la continuidad del proceso.'),
  array('question' => '¿Existen ventajas al contratar equipos completos?', 'answer' => 'Sí. Nos permite alinear perfiles con una misma lógica estratégica, optimizar tiempos y asegurar consistencia entre roles complementarios.'),
);
?>

<section id="porque-elegirnos" class="home-why-us">
  <div class="home-section-shell">
    <h2 class="home-section-title">¿Por qué elegirnos?</h2>
    <div class="home-why-us__grid">
      <?php foreach ($choose_us_items as $item) : ?>
        <article class="home-why-us__card <?php echo esc_attr($item['accent']); ?>">
          <div class="home-why-us__icon-wrap">
            <?php
            $why_us_image_relative = $item['image'];
            $why_us_image_absolute = trailingslashit(get_stylesheet_directory()) . ltrim($why_us_image_relative, '/');
            $why_us_image_uri = trailingslashit(get_stylesheet_directory_uri()) . ltrim($why_us_image_relative, '/');
            ?>
            <?php if (file_exists($why_us_image_absolute)) : ?>
              <img src="<?php echo esc_url($why_us_image_uri); ?>" alt="<?php echo esc_attr($item['title']); ?>" class="home-why-us__image" loading="lazy" decoding="async">
            <?php else : ?>
              <span class="material-icons home-why-us__icon"><?php echo esc_html($item['icon']); ?></span>
            <?php endif; ?>
          </div>
          <h3 class="home-why-us__card-title"><?php echo esc_html($item['title']); ?></h3>
          <p class="home-why-us__copy"><?php echo esc_html($item['copy']); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="casos-exito" class="home-success-cases">
  <div class="home-success-cases__background" aria-hidden="true">
    <video
      class="home-success-cases__background-video"
      autoplay
      muted
      loop
      playsinline
      preload="metadata"
    >
      <source src="<?php echo esc_url(trailingslashit(get_stylesheet_directory_uri()) . 'images/MUNDO.mp4'); ?>" type="video/mp4">
    </video>
    <div class="home-success-cases__background-overlay"></div>
  </div>
  <div class="home-section-shell">
    <h2 class="home-section-title">Casos de Éxito</h2>
    <p class="home-section-intro">Nuestros resultados hablan por nosotros: proyectos que han transformado organizaciones de múltiples industrias a través de talento tecnológico y digital estratégico.</p>
    <div class="home-success-cases__experience" data-success-cases>
      <div class="home-success-cases__detail-shell">
        <?php foreach ($success_cases as $index => $case) : ?>
          <article class="home-success-cases__detail<?php echo 0 === $index ? ' is-active' : ''; ?>" data-success-detail<?php echo 0 === $index ? '' : ' hidden'; ?>>
            <div class="home-success-cases__panel home-success-cases__panel--interactive">
              <div class="home-success-cases__panel-top">
                <div class="home-success-cases__brand home-success-cases__brand--panel">
                  <img src="<?php echo esc_url($case['logo']); ?>" alt="<?php echo esc_attr($case['company']); ?>" class="home-success-cases__logo" loading="lazy" decoding="async">
                </div>
                <div class="home-success-cases__tag">•&nbsp;Casos de Éxito</div>
              </div>
              <h3 class="home-success-cases__headline"><?php echo esc_html($case['headline']); ?></h3>
              <div class="home-success-cases__section-label">Proyecto</div>
              <div class="home-success-cases__copy">
                <?php foreach ($case['project_lines'] as $line) : ?>
                  <p><?php echo esc_html($line); ?></p>
                <?php endforeach; ?>
              </div>
              <div class="home-success-cases__section-label">Resultados</div>
              <ul class="home-success-cases__list">
                <?php foreach ($case['results'] as $result) : ?>
                  <li><?php echo esc_html($result); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </article>
        <?php endforeach; ?>

        <div class="home-success-cases__controls">
          <button class="home-success-cases__control home-success-cases__control--prev" type="button" aria-label="Caso anterior">‹</button>
          <div class="home-success-cases__dots" role="tablist" aria-label="Casos de éxito">
            <?php foreach ($success_cases as $index => $case) : ?>
              <button class="home-success-cases__dot<?php echo 0 === $index ? ' is-active' : ''; ?>" type="button" aria-label="<?php echo esc_attr('Ver caso ' . ($index + 1)); ?>" data-success-dot></button>
            <?php endforeach; ?>
          </div>
          <button class="home-success-cases__control home-success-cases__control--next" type="button" aria-label="Siguiente caso">›</button>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .home-success-cases {
    position: relative;
    overflow: hidden;
    width: 100vw;
    max-width: 100vw;
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);
    padding: 0 !important;
    min-height: 760px;
    display: flex;
    align-items: stretch;
  }

  .home-success-cases__background {
    position: absolute;
    inset: 0;
    width: 100vw;
    max-width: 100vw;
    z-index: 0;
    pointer-events: none;
  }

  .home-success-cases__background-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    display: block;
    filter: saturate(1.08) contrast(1.04) brightness(0.92);
  }

  .home-success-cases__background-overlay {
    position: absolute;
    inset: 0;
    background:
      radial-gradient(circle at 18% 28%, rgba(255, 129, 64, 0.05), transparent 26%),
      radial-gradient(circle at 80% 32%, rgba(87, 190, 205, 0.06), transparent 30%);
  }

  .home-success-cases .home-section-shell {
    position: relative;
    z-index: 1;
    width: min(100%, 1280px);
    min-height: 760px;
    padding: 40px 24px !important;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .home-success-cases .home-section-title {
    margin: 0 0 14px;
    text-align: left;
    font-size: clamp(1.9rem, 3.2vw, 3rem);
  }

  .home-success-cases .home-section-intro {
    margin: 0 0 24px;
    max-width: 760px;
    text-align: left;
    font-size: clamp(0.92rem, 1.15vw, 1.08rem);
    line-height: 1.45;
  }

  .home-success-cases__experience {
    display: grid;
    grid-template-columns: minmax(0, 1fr);
    gap: 28px;
    align-items: stretch;
  }

  .home-success-cases__orbit {
    position: absolute;
    border-radius: 999px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    pointer-events: none;
    z-index: 0;
  }

  .home-success-cases__orbit--one {
    top: 14%;
    right: 10%;
    width: 180px;
    height: 180px;
    animation: successOrbit 10s linear infinite;
  }

  .home-success-cases__orbit--two {
    bottom: 12%;
    left: 12%;
    width: 120px;
    height: 120px;
    animation: successOrbitReverse 8s linear infinite;
  }

  .home-success-cases__detail-shell {
    position: relative;
    min-width: 0;
    display: flex;
    flex-direction: column;
    width: min(100%, 640px);
    margin-left: 0;
    margin-right: auto;
  }

  .home-success-cases__detail {
    animation: successReveal 0.32s ease;
  }

  .home-success-cases__panel--interactive {
    min-height: 520px;
    padding: 28px 28px 24px !important;
    border-radius: 24px;
  }

  .home-success-cases__panel--interactive .home-success-cases__panel-top {
    gap: 16px;
    margin-bottom: 18px;
  }

  .home-success-cases__panel--interactive .home-success-cases__logo {
    max-width: 108px;
    max-height: 56px;
  }

  .home-success-cases__panel--interactive .home-success-cases__tag {
    min-height: 40px;
    padding: 0 18px;
    font-size: 0.84rem;
  }

  .home-success-cases__panel--interactive .home-success-cases__headline {
    margin: 0 0 18px;
    font-size: clamp(1.35rem, 2vw, 1.9rem);
    line-height: 1.2;
  }

  .home-success-cases__panel--interactive .home-success-cases__section-label {
    margin: 0 0 8px;
    font-size: 0.95rem;
  }

  .home-success-cases__panel--interactive .home-success-cases__copy {
    margin: 0 0 18px;
  }

  .home-success-cases__panel--interactive .home-success-cases__copy p,
  .home-success-cases__panel--interactive .home-success-cases__list li {
    font-size: 0.92rem;
    line-height: 1.5;
  }

  .home-success-cases__panel--interactive .home-success-cases__copy p {
    margin: 0 0 8px;
  }

  .home-success-cases__panel--interactive .home-success-cases__list li + li {
    margin-top: 8px;
  }

  .home-success-cases__controls {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-top: 16px;
  }

  .home-success-cases__control {
    width: 46px;
    height: 46px;
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.06);
    color: #59c9f5;
    font-size: 1.8rem;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.04);
  }

  .home-success-cases__dots {
    flex: 1;
    margin-top: 0;
  }

  @keyframes successOrbit {
    from { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(180deg) scale(1.04); }
    to { transform: rotate(360deg) scale(1); }
  }

  @keyframes successOrbitReverse {
    from { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(-180deg) scale(0.96); }
    to { transform: rotate(-360deg) scale(1); }
  }

  @keyframes successReveal {
    from {
      opacity: 0;
      transform: translateY(16px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 1180px) {
    .home-success-cases,
    .home-success-cases .home-section-shell {
      min-height: 680px;
    }

    .home-success-cases .home-section-title,
    .home-success-cases .home-section-intro {
      text-align: left;
    }

    .home-success-cases__panel--interactive {
      min-height: auto;
    }
  }

  @media (max-width: 768px) {
    .home-success-cases__experience {
      gap: 20px;
    }

    .home-success-cases,
    .home-success-cases .home-section-shell {
      min-height: auto;
    }

    .home-success-cases .home-section-shell {
      padding: 48px 16px !important;
    }

    .home-success-cases__detail-shell {
      width: 100%;
    }

    .home-success-cases__controls {
      gap: 10px;
    }

    .home-success-cases__control {
      width: 46px;
      height: 46px;
      font-size: 1.8rem;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var showcase = document.querySelector('[data-success-cases]');
    if (!showcase) return;

    var details = Array.prototype.slice.call(showcase.querySelectorAll('[data-success-detail]'));
    var dots = Array.prototype.slice.call(showcase.querySelectorAll('[data-success-dot]'));
    var prev = showcase.querySelector('.home-success-cases__control--prev');
    var next = showcase.querySelector('.home-success-cases__control--next');
    var current = 0;

    function render(index) {
      current = (index + details.length) % details.length;

      details.forEach(function (detail, detailIndex) {
        var isActive = detailIndex === current;
        detail.hidden = !isActive;
        detail.classList.toggle('is-active', isActive);
      });

      dots.forEach(function (dot, dotIndex) {
        dot.classList.toggle('is-active', dotIndex === current);
      });
    }

    if (prev) {
      prev.addEventListener('click', function () {
        render(current - 1);
      });
    }

    if (next) {
      next.addEventListener('click', function () {
        render(current + 1);
      });
    }

    dots.forEach(function (dot, dotIndex) {
      dot.addEventListener('click', function () {
        render(dotIndex);
      });
    });

    render(0);
  });
</script>

<section class="home-testimonials">
  <div class="home-section-shell">
    <h2 class="home-testimonials__title">Transformamos el proceso de selección en una <strong>experiencia de valor</strong></h2>
    <div class="home-testimonials__stage" data-testimonials-carousel>
      <button class="home-testimonials__nav home-testimonials__nav--prev" type="button" aria-label="Testimonio anterior">‹</button>
      <div class="home-testimonials__viewport">
        <?php foreach ($testimonials as $index => $testimonial) : ?>
          <article class="testimonial-card home-testimonials__card" data-testimonial-card data-index="<?php echo esc_attr($index); ?>">
            <div class="quote-icon" aria-hidden="true">“</div>
            <div class="testimonial-stars" aria-label="5 estrellas">★★★★★</div>
            <p class="quote-text"><?php echo esc_html($testimonial['quote']); ?></p>
            <div class="author-profile">
              <div class="author-info">
                <h4><?php echo esc_html($testimonial['name']); ?></h4>
                <span><?php echo esc_html($testimonial['role'] . ' en ' . $testimonial['company']); ?></span>
              </div>
              <?php if (!empty($testimonial['logo'])) : ?>
                <img class="company-logo" src="<?php echo esc_url($testimonial['logo']); ?>" alt="<?php echo esc_attr($testimonial['company']); ?>" loading="lazy" decoding="async">
              <?php else : ?>
                <div class="company-logo company-logo--text"><?php echo esc_html($testimonial['company']); ?></div>
              <?php endif; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      <button class="home-testimonials__nav home-testimonials__nav--next" type="button" aria-label="Siguiente testimonio">›</button>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var carousel = document.querySelector('[data-testimonials-carousel]');
    if (!carousel) return;

    var cards = Array.prototype.slice.call(carousel.querySelectorAll('[data-testimonial-card]'));
    var prev = carousel.querySelector('.home-testimonials__nav--prev');
    var next = carousel.querySelector('.home-testimonials__nav--next');
    var current = 0;

    function render(index) {
      current = (index + cards.length) % cards.length;
      cards.forEach(function (card, cardIndex) {
        card.classList.remove('is-prev', 'is-active', 'is-next', 'is-hidden');

        var prevIndex = (current - 1 + cards.length) % cards.length;
        var nextIndex = (current + 1) % cards.length;

        if (cardIndex === current) {
          card.classList.add('is-active');
        } else if (cardIndex === prevIndex) {
          card.classList.add('is-prev');
        } else if (cardIndex === nextIndex) {
          card.classList.add('is-next');
        } else {
          card.classList.add('is-hidden');
        }
      });
    }

    if (prev) {
      prev.addEventListener('click', function () {
        render(current - 1);
      });
    }

    if (next) {
      next.addEventListener('click', function () {
        render(current + 1);
      });
    }

    render(0);
  });
</script>

<section id="contacto" class="home-contact-feature">
  <div class="home-section-shell">
    <h2 class="home-contact-feature__title"><span class="home-contact-feature__title-text">¿Listo para impulsar resultados, innovar con impacto y escalar con talento?</span></h2>
    <p class="home-contact-feature__intro">El futuro digital no se improvisa. Se construye con talento.</p>
    <div class="home-contact-feature__layout">
      <div class="home-contact-feature__form-card">
        <form method="post" id="formulariocontacto2"
              action="<?php echo esc_url(get_template_directory_uri() . '/php/funciones/mensaje.php'); ?>"
              novalidate data-redirect="/gracias" class="formulario-nuevo home-contact-feature__form">
          <input type="text" name="tunombre" data-title="Nombre y apellido" value="" size="40" placeholder="Nombre y apellido" required>
          <input type="email" name="tumail" data-title="Email" value="" size="40" placeholder="Email" required>
          <input type="text" name="tuempresa" data-title="Empresa" value="" size="40" placeholder="Empresa">
          <input type="hidden" name="token" value="">
          <textarea name="tumensaje" data-title="¿En qué podemos ayudarte?" cols="40" rows="10" required placeholder="¿En qué podemos ayudarte?"></textarea>
          <div class="home-contact-feature__actions">
            <button type="submit" name="submitcontacto" class="btn home-contact-feature__submit">Enviar</button>
          </div>
          <div class="mensaje-exito" style="display:none">
            <div class="mensaje-exito-texto">
              <p>Gracias por contactarnos <br>Hemos recibido tu mensaje y pronto nos pondremos en <strong>contacto contigo</strong></p>
            </div>
          </div>
        </form>
      </div>
      <div class="home-contact-feature__visual">
        <img src="http://ehlatam.com/wp-content/uploads/2026/04/Diseno-sin-titulo-21.png" alt="Mapa de cobertura eHunting" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>

<section class="faq-section home-faq">
  <div class="faq-container">
    <div class="faq-sidebar">
      <h2 class="faq-title">
        <span class="faq-title__word faq-title__word--orange">Respuestas</span>
        <span class="faq-title__word faq-title__word--white">rápidas</span>
        <span class="faq-title__word faq-title__word--gradient">para</span>
        <span class="faq-title__word faq-title__word--orange">tu</span>
        <span class="faq-title__word faq-title__word--white">proceso</span>
      </h2>
      <p>Resolvemos las dudas más frecuentes sobre nuestra metodología, tiempos, evaluación y acompañamiento en procesos de talento IT &amp; Digital.</p>
    </div>
    <div class="faq-accordion">
      <?php foreach ($faq_items as $faq) : ?>
        <details class="faq-item home-faq__item">
          <summary class="faq-question home-faq__question">
            <span><?php echo esc_html($faq['question']); ?></span>
            <span class="faq-icon" aria-hidden="true">+</span>
          </summary>
          <div class="faq-answer home-faq__answer">
            <p><?php echo esc_html($faq['answer']); ?></p>
          </div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- inicia modal para form -->
<div id="contactanos-nuevo" class="modal">
  <div class="modal-content">
    <div class="left-align black-text header">
      <img class="lazy" alt="Logo eHunting" title="Ir a Home" src="http://ehlatam.com/wp-content/uploads/2025/04/LOGO-FINALM-BLANCO.png" width="120">
    </div>
    <?php get_template_part('/resources/php/formcontacto-nuevo'); ?>
  </div>
</div>

<!-- panel del boton naranha -->

<?php if(false): ?>

<a id="miBoton" class="btn-floating btn-large" style="background:#E86B2B"><i class="material-icons">chat</i></a> 

<div id="contactPanel" class="contact-panel">
  <div class="modal-content">
    <div class="left-align black-text header">
      <img class="lazy" alt="Logo eHunting" title="Ir a Home" src="http://ehlatam.com/wp-content/uploads/2025/04/LOGO-FINALM-BLANCO.png" width="120">
    </div>
    <?php get_template_part('/resources/php/formcontacto-nuevo'); ?>
  </div>
</div>

<style>
  @keyframes pulse-shadow{
    0%{ box-shadow:0 8px 10px rgba(var(--btn-rgb),.3), 0 0 0 0 rgba(var(--btn-rgb),.2), 0 0 0 0 rgba(var(--btn-rgb),.2); }
    40%{ box-shadow:0 8px 10px rgba(var(--btn-rgb),.3), 0 0 0 15px rgba(var(--btn-rgb),.2), 0 0 0 0 rgba(var(--btn-rgb),.2); }
    80%{ box-shadow:0 8px 10px rgba(var(--btn-rgb),.3), 0 0 0 30px rgba(var(--btn-rgb),0), 0 0 0 26.7px rgba(var(--btn-rgb),.067); }
    100%{ box-shadow:0 8px 10px rgba(var(--btn-rgb),.3), 0 0 0 30px rgba(var(--btn-rgb),0), 0 0 0 40px rgba(var(--btn-rgb),0); }
  }
  .contact-panel{
    position:fixed; top:50%; right:20px;
    transform: translate(calc(100% + 20px), -50%);
    width:90%; max-width:380px; max-height:90vh; background:#fff;
    box-shadow:0 4px 20px rgba(0,0,0,.2); overflow-y:auto; z-index:999999999999;
    border-radius:20px !important; background-color:#edebeb !important;
  }
  .contact-panel form{ padding:0 !important; background:#d0d0d0 !important; }*/
  @keyframes aparece{ from{ transform:translate(calc(100% + 20px), -50%);} to{ transform:translate(0, -50%);} }
  @keyframes desaparece{ from{ transform:translate(0, -50%);} to{ transform:translate(calc(100% + 20px), -50%);} }
  .contact-panel.aparece{ animation:aparece .4s forwards ease-out; }
  .contact-panel.desaparece{ animation:desaparece .4s forwards ease-in; }
  #miBoton{ position:fixed; z-index:10; bottom:50px; right:30px; border-radius:50%; overflow:visible; }
  #miBoton::after{ content:""; position:absolute; inset:0; border-radius:inherit; z-index:-1; animation:pulse-shadow 2s infinite; }
</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("miBoton");
    const icon = btn.querySelector("i.material-icons");
    const panel = document.getElementById("contactPanel");

    const bg = getComputedStyle(btn).backgroundColor;
    const nums = bg.match(/\d+/g);
    if (nums && nums.length >= 3) {
      const [r,g,b] = nums;
      btn.style.setProperty("--btn-rgb", `${r}, ${g}, ${b}`);
    }

    btn.addEventListener("click", () => {
      const isClosed = icon.textContent.trim() === "chat";
      if (isClosed) {
        icon.textContent = "close";
        panel.classList.remove("desaparece");
        panel.classList.add("aparece");
      } else {
        icon.textContent = "chat";
        panel.classList.remove("aparece");
        panel.classList.add("desaparece");
      }
    });

    panel.addEventListener("animationend", (e) => {
      if (e.animationName === "slideOut") {
        panel.classList.remove("desaparece");
        panel.style.transform = "translateX(-100%)";
      }
    });
  });
</script> 
<?php endif; ?>
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
      .eh-chat-panel{
        right: 12px;
        left: 12px;
        width: auto;
        bottom: 180px;
        height: 70vh;
      }
      #eh-chat-bubble{
        right: 18px;
        bottom: 110px;
		 width: 60px;
    height: 60px;
    animation-duration: 2.6s;
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



<?php get_footer(); ?>
