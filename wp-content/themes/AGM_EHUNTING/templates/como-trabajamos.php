<?php 
/***
 * Template Name: Como Trabajamos
 */
?>
<?php get_header() ?>

<meta name="keywords" content="metodologías ágiles en head-hunting, procesos de head-hunting ejecutivo, cómo trabajamos en eHunting, soluciones de contratación ejecutiva">

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

/* Línea divisoria superior */
.header-divider {
    width: 100%;
    height: 8px;
    background: linear-gradient(90deg, var(--azul-oscuro) 0%, var(--azul-medio) 50%, var(--naranja) 100%);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.como-trabajamos-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

.como-trabajamos-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -10%;
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

.container-como-trabajamos {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

.como-trabajamos-header {
    text-align: center;
    margin-bottom: 50px;
}

.como-trabajamos-header h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 40px;
    position: relative;
    display: inline-block;
    line-height: 1.2;
}

.como-trabajamos-header h1 .text-blue {
    color: var(--azul-medio);
}

.como-trabajamos-header h1 .text-orange {
    color: var(--naranja);
}

.como-trabajamos-header h1::after {
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

.intro-text {
    max-width: 900px;
    margin: 0 auto 50px;
    color: #555;
    line-height: 1.8;
    font-size: 1.1rem;
    text-align: center;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 35px;
    margin-bottom: 60px;
}

.feature-card {
    background: var(--blanco);
    border-radius: 16px;
    padding: 35px;
    box-shadow: 0 10px 30px rgba(12, 43, 87, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.feature-card::before {
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

.feature-card:hover::before {
    transform: scaleX(1);
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(12, 43, 87, 0.15);
}

.feature-icon {
    width: 100px;
    height: 100px;
    margin-bottom: 25px;
    transition: transform 0.4s ease;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1) rotate(5deg);
}

.feature-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--azul-oscuro);
    margin-bottom: 15px;
}

.feature-description {
    color: #666;
    line-height: 1.7;
    font-size: 0.95rem;
    text-align: left;
}

.methodology-section {
    background: var(--blanco);
    border-radius: 20px;
    padding: 50px;
    box-shadow: 0 15px 40px rgba(12, 43, 87, 0.1);
    margin-top: 40px;
}

.methodology-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--azul-oscuro);
    margin-bottom: 20px;
    position: relative;
    padding-left: 20px;
}

.methodology-title::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 6px;
    height: 80%;
    background: linear-gradient(180deg, var(--naranja) 0%, var(--azul-medio) 100%);
    border-radius: 3px;
}

.methodology-subtitle {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--azul-medio);
    margin: 30px 0 15px 0;
}

.methodology-text {
    color: #555;
    line-height: 1.8;
    font-size: 1.05rem;
    margin-bottom: 20px;
}

.process-list {
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

.process-list li {
    position: relative;
    padding-left: 35px;
    margin-bottom: 15px;
    color: #555;
    line-height: 1.7;
    font-size: 1.05rem;
}

.process-list li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 8px;
    width: 12px;
    height: 12px;
    background: var(--naranja);
    border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(232, 107, 43, 0.2);
}

.tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 20px;
    margin-top: 25px;
}

.tool-item {
    background: linear-gradient(135deg, var(--azul-medio) 0%, var(--azul-oscuro) 100%);
    color: var(--blanco);
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    font-weight: 600;
    font-size: 0.95rem;
    box-shadow: 0 5px 15px rgba(12, 43, 87, 0.2);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.tool-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.tool-item:hover::before {
    left: 100%;
}

.tool-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(12, 43, 87, 0.3);
}

@media (max-width: 768px) {
    .como-trabajamos-header h1 {
        font-size: 2.2rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .methodology-section {
        padding: 30px 20px;
    }
    
    .methodology-title {
        font-size: 1.6rem;
    }
    
    .tools-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .como-trabajamos-section {
        padding: 50px 0;
    }
    
    .como-trabajamos-header h1 {
        font-size: 1.8rem;
    }
    
    .feature-card {
        padding: 25px;
    }
}
</style>

<section class="como-trabajamos-section">
    <div class="container-como-trabajamos">
        <div class="como-trabajamos-header">
            <h1><span class="text-blue">¿Cómo</span> <span class="text-orange">Trabajamos?</span></h1>
        </div>

        <div class="intro-text">
            <p>Operamos con metodologías ágiles que nos permiten ejecutar con celeridad y eficacia a través de células de trabajo que se activan en cada proceso que iniciamos. Estas células están conformadas por profesionales multidisciplinarios cuya motivación es superar las expectativas del cliente.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <img src="https://www.ehlatam.com/wp-content/uploads/2024/09/servicio-de-calidad.png" 
                     alt="Precisión y Calidad" 
                     class="feature-icon" />
                <h3 class="feature-title">Precisión y Calidad</h3>
                <p class="feature-description">
                    Nos enfocamos en asegurar un match preciso entre las competencias de los candidatos, la cultura organizacional de la empresa, y los requerimientos específicos y estratégicos del cargo.
                </p>
            </div>

            <div class="feature-card">
                <img src="https://www.ehlatam.com/wp-content/uploads/2024/09/conversacion.png" 
                     alt="Redes de contacto" 
                     class="feature-icon" />
                <h3 class="feature-title">Redes de Contacto</h3>
                <p class="feature-description">
                    Gracias a nuestras redes de contacto nos posicionamos como un nexo entre los desafíos transformacionales de las empresas y el capital humano idóneo en cada proyecto.
                </p>
            </div>

            <div class="feature-card">
                <img src="https://www.ehlatam.com/wp-content/uploads/2024/09/grafico-de-cascada.png" 
                     alt="Metodología" 
                     class="feature-icon" />
                <h3 class="feature-title">Metodología</h3>
                <p class="feature-description">
                    Nuestro enfoque se basa en comprender la visión estratégica de la empresa, fortalezas, debilidades y desafíos. Nuestro rol es agregar valor disponibilizando talentos excepcionales.
                </p>
            </div>
        </div>

        <div class="methodology-section">
            <h2 class="methodology-title">Assessment y validación del perfil</h2>
            <p class="methodology-text">
                Realizamos un diagnóstico de las capacidades de la empresa y la situación actual del negocio. Eso nos da claridad para asesorar en la definición del rol y del perfil requerido.
            </p>

            <h3 class="methodology-subtitle">Proceso de atracción y selección</h3>
            <ul class="process-list">
                <li>Reclutamiento</li>
                <li>Evaluación y Entrevistas</li>
                <li>Propuesta de Candidatos</li>
            </ul>

            <p class="methodology-text">
                Nuestra metodología se complementa con herramientas tecnológicas avanzadas que potencian la precisión y eficiencia de nuestro proceso:
            </p>

            <div class="tools-grid">
                <div class="tool-item">IA Tools</div>
                <div class="tool-item">Tests específicos</div>
                <div class="tool-item">People analytics</div>
                <div class="tool-item">Gamification</div>
                <div class="tool-item">Gestión SaaS</div>
            </div>
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