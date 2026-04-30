<?php 
/***
 * Template Name: Que hacemos
 */
?>
<?php get_header() ?>

<meta name="keywords" content="headhunting digital LATAM, reclutamiento de alta gerencia, soluciones de head-hunting digital, soluciones de contratación ejecutiva">

<!-- Línea divisoria superior -->
<div class="header-divider"></div>

<style>
:root {
    --azul-oscuro: #0C2B57;
    --azul-medio: #1F4E84;
    --naranja: #E86B2B;
    --blanco: #FFFFFF;
    --gris-claro: #D9D9D9;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Línea divisoria superior estilo Sobre Nosotros */
.header-divider {
    width: 100%;
    height: 8px;
    background: linear-gradient(90deg, var(--azul-oscuro) 0%, var(--azul-medio) 50%, var(--naranja) 100%);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.que-hacemos-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

.que-hacemos-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(31, 78, 132, 0.08) 0%, transparent 70%);
    border-radius: 50%;
    animation: float 20s infinite ease-in-out;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(50px, -50px) rotate(120deg); }
    66% { transform: translate(-30px, 30px) rotate(240deg); }
}

.container-que-hacemos {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

.que-hacemos-header {
    text-align: center;
    margin-bottom: 60px;
}

.que-hacemos-header h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 40px;
    position: relative;
    display: inline-block;
    line-height: 1.2;
}

.que-hacemos-header h1 .text-blue {
    color: var(--azul-medio);
}

.que-hacemos-header h1 .text-orange {
    color: var(--naranja);
}

.que-hacemos-header h1::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, var(--naranja) 0%, var(--azul-medio) 100%);
    border-radius: 2px;
}

.content-wrapper {
    display: flex;
    gap: 50px;
    align-items: flex-start;
    margin-bottom: 60px;
    flex-wrap: wrap;
}

.content-text {
    flex: 1;
    min-width: 300px;
}

.content-video {
    flex: 1;
    min-width: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.content-video iframe {
    max-width: 500px;
    width: 100%;
    height: 315px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(12, 43, 87, 0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.content-video iframe:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(12, 43, 87, 0.25);
}

.section-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--azul-oscuro);
    margin: 30px 0 15px 0;
    position: relative;
    padding-left: 15px;
}

.section-title::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 5px;
    height: 70%;
    background: linear-gradient(180deg, var(--naranja) 0%, var(--azul-medio) 100%);
    border-radius: 3px;
}

.content-text p {
    color: #555;
    line-height: 1.8;
    font-size: 1.05rem;
    margin-bottom: 20px;
    text-align: justify;
}

.info-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
    gap: 40px;
    margin-top: 50px;
}

.info-card {
    background: var(--blanco);
    border-radius: 16px;
    padding: 35px;
    box-shadow: 0 10px 30px rgba(12, 43, 87, 0.08);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--naranja) 0%, var(--azul-medio) 100%);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.info-card:hover::before {
    transform: scaleX(1);
}

.info-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(12, 43, 87, 0.15);
}

.info-card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--azul-oscuro);
    margin-bottom: 10px;
}

.info-card-description {
    color: #666;
    line-height: 1.7;
    font-size: 1rem;
    margin-bottom: 25px;
}

.collection-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.collection-item {
    display: flex;
    align-items: center;
    padding: 15px;
    margin-bottom: 12px;
    background: #f8f9fa;
    border-radius: 10px;
    border-left: 4px solid var(--naranja);
    transition: all 0.3s ease;
    color: #444;
    font-size: 0.95rem;
}

.collection-item:hover {
    background: #e9ecef;
    transform: translateX(8px);
    border-left-color: var(--azul-medio);
}

.collection-item i {
    color: var(--azul-medio);
    margin-right: 15px;
    font-size: 20px;
    min-width: 20px;
}

.cta-section {
    text-align: center;
    margin-top: 60px;
    padding-top: 40px;
}

.btn-conversemos {
    background: linear-gradient(135deg, var(--naranja) 0%, #ff8c52 100%);
    color: var(--blanco);
    padding: 16px 50px;
    font-size: 1.1rem;
    font-weight: 700;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 8px 20px rgba(232, 107, 43, 0.3);
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-conversemos:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(232, 107, 43, 0.4);
    background: linear-gradient(135deg, #ff8c52 0%, var(--naranja) 100%);
}

@media (max-width: 968px) {
    .info-cards {
        grid-template-columns: 1fr;
    }
    
    .content-wrapper {
        flex-direction: column;
    }
}

@media (max-width: 768px) {
    .que-hacemos-header h1 {
        font-size: 2.2rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .content-text p {
        font-size: 1rem;
    }
    
    .info-card {
        padding: 25px;
    }
}

@media (max-width: 480px) {
    .que-hacemos-section {
        padding: 50px 0;
    }
    
    .que-hacemos-header h1 {
        font-size: 1.8rem;
    }
    
    .content-video iframe {
        height: 250px;
    }
}
</style>

<section class="que-hacemos-section">
    <div class="container-que-hacemos">
        <div class="que-hacemos-header">
            <h1><span class="text-blue">¿Qué</span> <span class="text-orange">Hacemos?</span></h1>
        </div>

        <div class="content-wrapper">
            <div class="content-text">
                <p>Proveemos servicios de selección y atracción de Talentos Digitales para roles en Comercio Electrónico, Transformación Digital, Tecnologías e Innovación. Nuestro objetivo es conectar empresas con profesionales que habiliten la transformación de su empresa.</p>

                <h2 class="section-title">Experiencia y Trayectoria</h2>
                <p>Nuestro equipo cuenta con experiencia específica en la práctica digital, gracias a esto logramos una rápida alineación y comprensión de las necesidades de la empresa. La envergadura de los proyectos en los que hemos participado nos posicionan como un socio confiable en la atracción de los mejores talentos del mercado.</p>

                <h3 class="section-title">Precisión y Agilidad</h3>
                <p>Nuestra fortaleza se basa en la precisión y agilidad con la que identificamos y ponemos a disposición de nuestros clientes talentos sobresalientes. Esta apuesta por la especialización nos permite lograr el match perfecto de los profesionales requeridos. Hemos asesorado un número amplio de corporaciones lo cual nos ha dejado invaluables aprendizajes que aplicamos en cada proyecto en el que nos embarcamos.</p>
            </div>

            <div class="content-video">
                <iframe src="https://www.youtube.com/embed/o-M5hi-wuWQ?si=EKqlgkXMberGPZoV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <div class="info-cards">
            <div class="info-card">
                <h4 class="info-card-title">Ámbitos De Acción</h4>
                <p class="info-card-description">Nos especializamos en identificar y seleccionar talentos en distintos ámbitos:</p>
                <ul class="collection-list">
                    <li class="collection-item">
                        <i class="material-icons">data_usage</i>
                        Comercio Electrónico / Canales Digitales / Marketplaces
                    </li>
                    <li class="collection-item">
                        <i class="material-icons">data_usage</i>
                        Customer Experience / Estrategia Digital / Innovación
                    </li>
                    <li class="collection-item">
                        <i class="material-icons">data_usage</i>
                        Omnicanalidad / Data Analytics / Growth Marketing
                    </li>
                    <li class="collection-item">
                        <i class="material-icons">data_usage</i>
                        Tecnologías / Inteligencia Artificial / Transformación Digital
                    </li>
                </ul>
            </div>

            <div class="info-card">
                <h4 class="info-card-title">Scope Sectorial</h4>
                <p class="info-card-description">Proveemos servicios a una amplia variedad de sectores económicos, nos adaptamos a las dinámicas y necesidades de cada industria:</p>
                <ul class="collection-list">
                    <li class="collection-item">
                        <i class="material-icons">data_usage</i>
                        Retail / Consumo Masivo / Tecnologías / Telecomunicaciones
                    </li>
                    <li class="collection-item">
                        <i class="material-icons">data_usage</i>
                        Servicios Financieros / Centros Comerciales / Transporte
                    </li>
                    <li class="collection-item">
                        <i class="material-icons">data_usage</i>
                        Manufactura / Automotriz / Salud
                    </li>
                </ul>
            </div>
        </div>

        <div class="cta-section">
            <button data-target="contactanos" class="btn-conversemos modal-trigger">Conversemos</button>
        </div>
    </div>
</section>

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

<?php get_footer() ?>
