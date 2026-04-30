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
      <h2 class="home-solutions-showcase__title">Soluciones Integrales especializadas en Talento IT &amp; Digital</h2>
      <p class="home-solutions-showcase__copy">En eHunting Latam conectamos a las organizaciones con talento tecnológico y digital que impulsa su transformación. Mediante un enfoque ágil y consultivo, aseguramos procesos precisos, eficientes y alineados a la cultura y objetivos de cada empresa.</p>
      <p class="home-solutions-showcase__lead">Cuéntanos tu desafío, nosotros lo resolvemos por ti.</p>

      <div class="home-solutions-showcase__services">
        <?php foreach ($featured_services as $service) : ?>
          <article class="home-solutions-showcase__service">
            <?php
            $service_image_relative = isset($service['image']) ? $service['image'] : '';
            $service_image_absolute = $service_image_relative ? trailingslashit(get_stylesheet_directory()) . ltrim($service_image_relative, '/') : '';
            $service_image_uri = $service_image_relative ? trailingslashit(get_stylesheet_directory_uri()) . ltrim($service_image_relative, '/') : '';
            $service_has_image = $service_image_relative && file_exists($service_image_absolute);
            $service_image_class = 'home-solutions-showcase__service-image';

            $service_icon_wrap_class = $service_has_image
              ? 'home-solutions-showcase__service-icon-wrap home-solutions-showcase__service-icon-wrap--image'
              : 'home-solutions-showcase__service-icon-wrap';
            ?>
            <div class="<?php echo esc_attr($service_icon_wrap_class); ?>">
              <?php if ($service_has_image) : ?>
                <img src="<?php echo esc_url($service_image_uri); ?>" alt="<?php echo esc_attr($service['title']); ?>" class="<?php echo esc_attr($service_image_class); ?>" loading="lazy" decoding="async">
              <?php else : ?>
                <span class="home-solutions-showcase__service-icon material-icons"><?php echo esc_html($service['icon']); ?></span>
              <?php endif; ?>
            </div>
            <div class="home-solutions-showcase__service-pill"><?php echo esc_html($service['title']); ?></div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="home-solutions-showcase__footer">
        <a href="/que-hacemos" class="btn home-solutions-showcase__button">Más información</a>
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
  <div class="home-section-shell">
    <h2 class="home-section-title">Casos de Éxito</h2>
    <p class="home-section-intro">Nuestros resultados hablan por nosotros: proyectos que han transformado organizaciones de múltiples industrias a través de talento tecnológico y digital estratégico.</p>
    <div class="home-success-cases__carousel" data-success-cases>
      <button class="home-success-cases__nav home-success-cases__nav--prev" type="button" aria-label="Caso anterior">‹</button>
      <div class="home-success-cases__viewport">
        <?php foreach ($success_cases as $index => $case) : ?>
          <article class="home-success-cases__slide"<?php echo 0 === $index ? '' : ' hidden'; ?> data-success-slide>
            <div class="home-success-cases__panel home-success-cases__panel--carousel">
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
      </div>
      <button class="home-success-cases__nav home-success-cases__nav--next" type="button" aria-label="Siguiente caso">›</button>
      <div class="home-success-cases__dots" role="tablist" aria-label="Casos de éxito">
        <?php foreach ($success_cases as $index => $case) : ?>
          <button class="home-success-cases__dot<?php echo 0 === $index ? ' is-active' : ''; ?>" type="button" aria-label="<?php echo esc_attr('Ver caso ' . ($index + 1)); ?>" data-success-dot></button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var carousel = document.querySelector('[data-success-cases]');
    if (!carousel) return;

    var slides = Array.prototype.slice.call(carousel.querySelectorAll('[data-success-slide]'));
    var dots = Array.prototype.slice.call(carousel.querySelectorAll('[data-success-dot]'));
    var prev = carousel.querySelector('.home-success-cases__nav--prev');
    var next = carousel.querySelector('.home-success-cases__nav--next');
    var current = 0;

    function render(index) {
      current = (index + slides.length) % slides.length;
      slides.forEach(function (slide, slideIndex) {
        slide.hidden = slideIndex !== current;
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
          <article class="home-testimonials__card" data-testimonial-card data-index="<?php echo esc_attr($index); ?>">
            <h3 class="home-testimonials__name"><?php echo esc_html($testimonial['company']); ?></h3>
            <p class="home-testimonials__role"><?php echo esc_html($testimonial['role']); ?></p>
            <p class="home-testimonials__quote">“<?php echo esc_html($testimonial['quote']); ?>”</p>
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
    <h2 class="home-contact-feature__title">¿Listo para impulsar resultados, innovar con impacto y escalar con talento?</h2>
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

<section class="home-faq">
  <div class="home-section-shell home-faq__shell">
    <h2 class="home-faq__title">Preguntas frecuentes</h2>
    <div class="home-faq__list">
      <?php foreach ($faq_items as $faq) : ?>
        <details class="home-faq__item">
          <summary class="home-faq__question"><?php echo esc_html($faq['question']); ?></summary>
          <div class="home-faq__answer">
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
