<?php
/**
 * Template Name: Contacto
 */
?>
<?php get_header() ?>

<!-- SEO Meta Tags -->
<meta name="description" content="Contacta a eHunting Latam. Headhunters especializados en Chile, Colombia, Perú, Argentina, México y Ecuador. Transformamos tu organización con el mejor talento.">

<!-- Open Graph Tags -->
<meta property="og:title" content="Contacto eHunting Latam | Headhunters Especializados en LATAM">
<meta property="og:description" content="Contacta a eHunting Latam. Headhunters especializados en Chile, Colombia, Perú, Argentina, México y Ecuador.">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo get_permalink(); ?>">
<meta property="og:site_name" content="eHunting Latam">
<meta property="og:locale" content="es_LA">
<meta property="og:image" content="https://www.ehlatam.com/wp-content/uploads/2025/08/cropped-Imagen-de-WhatsApp-2025-05-12-a-las-11.35.27_e26ebfdd.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="eHunting Latam - Headhunters Especializados">

<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Contacto eHunting Latam | Headhunters Especializados en LATAM">
<meta name="twitter:description" content="Contacta a eHunting Latam. Headhunters especializados en Chile, Colombia, Perú, Argentina, México y Ecuador.">
<meta name="twitter:image" content="http://ehlatam.com/wp-content/uploads/2025/08/cropped-Imagen-de-WhatsApp-2025-05-12-a-las-11.35.27_e26ebfdd.jpg">
<meta name="twitter:site" content="@eHuntinglatam">

<!-- Schema Markup - Organization con LocalBusiness -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "eHunting Latam",
  "url": "<?php echo home_url(); ?>",
  "logo": "http://ehlatam.com/wp-content/uploads/2025/08/cropped-Imagen-de-WhatsApp-2025-05-12-a-las-11.35.27_e26ebfdd.jpg",
  "image": "http://ehlatam.com/wp-content/uploads/2025/08/cropped-Imagen-de-WhatsApp-2025-05-12-a-las-11.35.27_e26ebfdd.jpg",
  "description": "Headhunters especializados en búsqueda y selección de talento ejecutivo en Latinoamérica",
  "sameAs": [
    "https://www.linkedin.com/company/ehunting-latam",
    "https://www.facebook.com/eHuntingLATAM",
    "https://x.com/eHuntinglatam",
    "https://www.instagram.com/ehunting.latam/"
  ],
  "contactPoint": [
    {
      "@type": "ContactPoint",
      "telephone": "+56-953867098",
      "contactType": "customer service",
      "areaServed": "CL",
      "availableLanguage": ["Spanish", "English"]
    },
    {
      "@type": "ContactPoint",
      "telephone": "+57-3016651119",
      "contactType": "customer service",
      "areaServed": "CO",
      "availableLanguage": ["Spanish", "English"]
    },
    {
      "@type": "ContactPoint",
      "telephone": "+51-973119964",
      "contactType": "customer service",
      "areaServed": "PE",
      "availableLanguage": ["Spanish", "English"]
    },
    {
      "@type": "ContactPoint",
      "telephone": "+1-305-403-4561",
      "contactType": "customer service",
      "areaServed": ["US", "AR", "MX", "EC"],
      "availableLanguage": ["Spanish", "English"]
    }
  ]
}
</script>

<!-- Schema Markup - LocalBusiness para cada oficina -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "LocalBusiness",
      "@id": "<?php echo home_url(); ?>#chile",
      "name": "eHunting Latam Chile",
      "description": "Oficina de eHunting en Chile - Headhunters ejecutivos",
      "telephone": "+56-953867098",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "El Trovador 4280",
        "addressLocality": "Las Condes, Santiago",
        "addressRegion": "Región Metropolitana",
        "addressCountry": "CL"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "-33.4029",
        "longitude": "-70.5779"
      },
      "url": "<?php echo home_url(); ?>",
      "priceRange": "$$$$",
      "image": "<?php echo get_template_directory_uri(); ?>/images/chile-ci.jpeg",
      "areaServed": {
        "@type": "Country",
        "name": "Chile"
      }
    },
    {
      "@type": "LocalBusiness",
      "@id": "<?php echo home_url(); ?>#colombia",
      "name": "eHunting Latam Colombia",
      "description": "Oficina de eHunting en Colombia - Headhunters ejecutivos",
      "telephone": "+57-3016651119",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Carrera 7b Bis 126 - 36",
        "addressLocality": "Usaquén, Bogotá",
        "addressRegion": "Bogotá D.C.",
        "addressCountry": "CO"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "4.7110",
        "longitude": "-74.0721"
      },
      "url": "<?php echo home_url(); ?>",
      "priceRange": "$$$$",
      "image": "<?php echo get_template_directory_uri(); ?>/images/colombia-ci.jpg",
      "areaServed": {
        "@type": "Country",
        "name": "Colombia"
      }
    },
    {
      "@type": "LocalBusiness",
      "@id": "<?php echo home_url(); ?>#peru",
      "name": "eHunting Latam Perú",
      "description": "Oficina de eHunting en Perú - Headhunters ejecutivos",
      "telephone": "+51-973119964",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Av. José Pardo N° 223 Piso 10",
        "addressLocality": "Miraflores, Lima",
        "addressRegion": "Lima",
        "addressCountry": "PE"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "-12.1216",
        "longitude": "-77.0299"
      },
      "url": "<?php echo home_url(); ?>",
      "priceRange": "$$$$",
      "image": "<?php echo get_template_directory_uri(); ?>/images/peru-ci.jpg",
      "areaServed": {
        "@type": "Country",
        "name": "Perú"
      }
    },
    {
      "@type": "LocalBusiness",
      "@id": "<?php echo home_url(); ?>#usa",
      "name": "eHunting Latam USA",
      "description": "Oficina de eHunting en Estados Unidos - Headhunters ejecutivos",
      "telephone": "+1-305-403-4561",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Miami",
        "addressRegion": "FL",
        "addressCountry": "US"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "25.7617",
        "longitude": "-80.1918"
      },
      "url": "<?php echo home_url(); ?>",
      "priceRange": "$$$$",
      "image": "<?php echo get_template_directory_uri(); ?>/images/usa-ci.jpg",
      "areaServed": {
        "@type": "Country",
        "name": "United States"
      }
    }
  ]
}
</script>

<!-- Schema Markup - ContactPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Contacto eHunting Latam",
  "description": "Página de contacto de eHunting Latam - Headhunters especializados en Latinoamérica. Oficinas en Chile, Colombia, Perú, Argentina, México, Ecuador y Estados Unidos",
  "url": "<?php echo get_permalink(); ?>",
  "mainEntity": {
    "@type": "Organization",
    "name": "eHunting Latam"
  },
  "specialty": [
    "Executive Search",
    "Headhunting",
    "Talent Acquisition",
    "Executive Recruitment"
  ]
}
</script>

<!-- Schema Markup - BreadcrumbList -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Inicio",
      "item": "<?php echo home_url(); ?>"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Contacto",
      "item": "<?php echo get_permalink(); ?>"
    }
  ]
}
</script>

<section class="contact-offices-section">
<div class="contact-header center-align">
    <h1>Transformemos juntos tu organización, contáctanos ahora</h1>
    <button data-target="contactanos" class="btn boton-conversemos modal-trigger">Conversemos</button>
    
    <h2>Nuestras Oficinas</h2>
    <p class="contact-header__lead">Estamos donde nos necesites, encuentra aquí tu punto de contacto.</p>
    <p class="contact-header__accent">Presencia regional, impacto global.</p>
</div>

<?php ehunting_render_contact_offices(); ?>
</section>

<!-- BURBUJA NARANJA + PANEL FORM TIPO CHAT -->
<a id="ehContactBtn" class="eh-contact-btn" aria-label="Abrir formulario">
  <i class="material-icons">chat</i>
</a>

<div id="ehContactPanel" class="eh-contact-panel" aria-hidden="true">
  <div class="eh-contact-header">
    <img
      class="lazy"
      alt="Logo eHunting"
      src="http://ehlatam.com/wp-content/uploads/2025/04/LOGO-FINALM-BLANCO.png"
      width="120"
    />
    <button type="button" id="ehContactClose" class="eh-contact-close" aria-label="Cerrar">
      <i class="material-icons">close</i>
    </button>
  </div>

  <div class="eh-contact-body">
    <?php get_template_part('/resources/php/formcontacto-nuevo'); ?>
  </div>
</div>

<script>
  (function(){
    const btn = document.getElementById('ehContactBtn');
    const panel = document.getElementById('ehContactPanel');
    const closeBtn = document.getElementById('ehContactClose');
    if(!btn || !panel) return;

    function openPanel(){
      panel.classList.add('open');
      panel.setAttribute('aria-hidden','false');
      document.body.classList.add('eh-contact-open');
      const icon = btn.querySelector('i.material-icons');
      if(icon) icon.textContent = 'close';
    }
    function closePanel(){
      panel.classList.remove('open');
      panel.setAttribute('aria-hidden','true');
      document.body.classList.remove('eh-contact-open');
      const icon = btn.querySelector('i.material-icons');
      if(icon) icon.textContent = 'chat';
    }

    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      if(panel.classList.contains('open')) closePanel();
      else openPanel();
    });

    if(closeBtn){
      closeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        closePanel();
      });
    }

    document.addEventListener('click', (e) => {
      if(!panel.classList.contains('open')) return;
      const clickedInside = panel.contains(e.target) || btn.contains(e.target);
      if(!clickedInside) closePanel();
    });
  })();
</script>


<?php get_footer() ?>
