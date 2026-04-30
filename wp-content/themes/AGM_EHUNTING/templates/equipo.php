<?php 
/***
 * Template Name: Equipo
 */
?>
<?php get_header() ?>

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

/* IMPORTANTE: Asegurar que el footer tenga espacio */
body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

main {
    flex: 1;
}

/* Línea divisoria superior idéntica a Sobre Nosotros */
.equipo-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px; /* más visible y consistente */
    background: linear-gradient(90deg, var(--azul-medio) 0%, var(--naranja) 100%);
    z-index: 100;
}

.equipo-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 100px 0 80px 0; /* Añadido padding bottom más grande */
    position: relative;
    overflow: hidden;
    margin-bottom: 0; /* Asegurar que no haya margen que separe del footer */
}

.equipo-section::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(31, 78, 132, 0.08) 0%, transparent 70%);
    border-radius: 50%;
    animation: float 20s infinite ease-in-out;
    pointer-events: none;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(50px, -50px) rotate(120deg); }
    66% { transform: translate(-30px, 30px) rotate(240deg); }
}

.container-equipo {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 1;
}

.equipo-header {
    text-align: center;
    margin-bottom: 60px;
    position: relative;
    z-index: 2;
}

.equipo-header h1 {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 700;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
    line-height: 1.2;
}

.equipo-header h1 .text-blue {
    color: var(--azul-medio);
}

.equipo-header h1 .text-orange {
    color: var(--naranja);
}

.equipo-header h1::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--naranja) 0%, var(--azul-medio) 100%);
    border-radius: 2px;
}

.equipo-intro {
    max-width: 900px;
    margin: 30px auto 0;
    color: #555;
    line-height: 1.8;
    font-size: clamp(1rem, 2vw, 1.1rem);
    padding: 0 15px;
}

.equipo-intro p {
    margin-bottom: 20px;
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.equipo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(min(100%, 350px), 1fr));
    gap: 35px;
    margin-top: 50px;
    margin-bottom: 50px; /* Añadido margen inferior */
}

.team-card {
    background: var(--blanco);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(12, 43, 87, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    cursor: pointer;
}

.team-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--naranja) 0%, var(--azul-medio) 100%);
    transform: scaleX(0);
    transition: transform 0.4s ease;
    z-index: 1;
}

.team-card:hover::before {
    transform: scaleX(1);
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(12, 43, 87, 0.15);
}

.card-image-wrapper {
    position: relative;
    height: 450px;
    overflow: hidden;
    background: linear-gradient(135deg, var(--azul-oscuro) 0%, var(--azul-medio) 100%);
}

.card-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.team-card:hover .card-image-wrapper img {
    transform: scale(1.08);
}

.card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(12, 43, 87, 0.95) 0%, rgba(12, 43, 87, 0.7) 50%, transparent 100%);
    padding: 25px;
    transition: all 0.4s ease;
}

.card-name {
    color: var(--blanco);
    font-size: clamp(1.25rem, 3vw, 1.5rem);
    font-weight: 700;
    margin-bottom: 5px;
    letter-spacing: 0.5px;
}

.card-position {
    color: var(--naranja);
    font-size: clamp(0.85rem, 2vw, 0.95rem);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.card-content {
    padding: 25px;
    position: relative;
}

.card-bio {
    color: #666;
    line-height: 1.7;
    font-size: clamp(0.9rem, 1.8vw, 0.95rem);
    margin-bottom: 20px;
    max-height: 0;
    overflow: hidden;
    opacity: 0;
    transition: all 0.5s ease;
}

.team-card.active .card-bio {
    max-height: 500px;
    opacity: 1;
    margin-top: 15px;
}

.card-actions {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
}

.social-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--gris-claro);
    color: var(--azul-oscuro);
    transition: all 0.3s ease;
    text-decoration: none;
    flex-shrink: 0;
}

.social-link:hover {
    background: var(--azul-medio);
    color: var(--blanco);
    transform: translateY(-3px);
}

.social-link svg {
    width: 20px;
    height: 20px;
    fill: currentColor;
}

.expand-btn {
    margin-left: auto;
    background: none;
    border: 2px solid var(--naranja);
    color: var(--naranja);
    padding: 8px 20px;
    border-radius: 25px;
    font-size: clamp(0.75rem, 1.5vw, 0.85rem);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    white-space: nowrap;
}

.expand-btn:hover {
    background: var(--naranja);
    color: var(--blanco);
    transform: translateX(5px);
}

.team-card.active .expand-btn {
    background: var(--azul-oscuro);
    border-color: var(--azul-oscuro);
    color: var(--blanco);
}

/* Responsive Breakpoints */

/* Tablets grandes y pantallas medianas */
@media (max-width: 1200px) {
    .container-equipo {
        max-width: 100%;
        padding: 0 30px;
    }
    
    .equipo-grid {
        grid-template-columns: repeat(auto-fill, minmax(min(100%, 300px), 1fr));
        gap: 30px;
    }
    
    .card-image-wrapper {
        height: 400px;
    }
}

/* Tablets */
@media (max-width: 992px) {
    .equipo-section {
        padding: 60px 0 60px 0;
    }
    
    .equipo-header {
        margin-bottom: 50px;
    }
    
    .equipo-grid {
        gap: 25px;
    }
    
    .card-image-wrapper {
        height: 380px;
    }
}

/* Tablets pequeñas y móviles grandes */
@media (max-width: 768px) {
    .equipo-section {
        padding: 50px 0 50px 0;
    }
    
    .container-equipo {
        padding: 0 20px;
    }
    
    .equipo-header {
        margin-bottom: 40px;
    }
    
    .equipo-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .card-image-wrapper {
        height: 350px;
    }
    
    .card-overlay {
        padding: 20px;
    }
    
    .card-content {
        padding: 20px;
    }
    
    .card-actions {
        gap: 12px;
    }
    
    .expand-btn {
        padding: 8px 16px;
    }
}

/* Móviles */
@media (max-width: 576px) {
    .equipo-section {
        padding: 40px 0 40px 0;
    }
    
    .container-equipo {
        padding: 0 15px;
    }
    
    .equipo-header h1::after {
        width: 60px;
        height: 3px;
    }
    
    .equipo-intro {
        padding: 0 10px;
    }
    
    .card-image-wrapper {
        height: 320px;
    }
    
    .card-overlay {
        padding: 15px;
    }
    
    .card-content {
        padding: 18px;
    }
    
    .social-link {
        width: 36px;
        height: 36px;
    }
    
    .social-link svg {
        width: 18px;
        height: 18px;
    }
    
    .expand-btn {
        padding: 7px 14px;
        margin-left: 0;
        width: 100%;
        margin-top: 10px;
    }
    
    .card-actions {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .card-actions > div {
        display: flex;
        gap: 12px;
    }
}

/* Móviles muy pequeños */
@media (max-width: 400px) {
    .equipo-section {
        padding: 30px 0 30px 0;
    }
    
    .card-image-wrapper {
        height: 280px;
    }
    
    .card-overlay {
        padding: 12px;
    }
    
    .card-content {
        padding: 15px;
    }
}

/* Landscape en móviles */
@media (max-width: 900px) and (orientation: landscape) {
    .equipo-section {
        padding: 40px 0 40px 0;
    }
    
    .card-image-wrapper {
        height: 280px;
    }
    
    .equipo-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Pantallas muy grandes */
@media (min-width: 1600px) {
    .container-equipo {
        max-width: 1600px;
    }
    
    .equipo-grid {
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
    }
    
    .card-image-wrapper {
        height: 480px;
    }
}
</style>

<main>
<section class="equipo-section">
    <div class="container-equipo">
        <div class="equipo-header">
            <h1><span class="text-blue">Nuestro</span> <span class="text-orange">Equipo</span></h1>
            <div class="equipo-intro">
                <p>Con años de experiencia en el sector digital, nuestro equipo está conformado por profesionales apasionados por la evolución digital profundamente conectados con la actividad empresarial, y con amplias redes de contacto en el mercado laboral digital.</p>
                <p>En eHunting operamos con metodologías ágiles para maximizar la eficacia del delivery. Las células están integradas por especialistas en recursos humanos, tecnologías de la información, negocios digitales, en conjunto con Product Owners y Scrum Masters.</p>
            </div>
        </div>

        <div class="equipo-grid">
            <!-- Aldo Myrick -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Aldo-2-1.jpg" alt="Aldo Myrick">
                    <div class="card-overlay">
                        <h2 class="card-name">Aldo Myrick</h2>
                        <p class="card-position">Director Ejecutivo</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Ingeniero Civil Industrial, Diploma en Management de la University of Derby, Reino Unido, apasionado por la innovación y transformación digital. Co-founder del Comité de Comercio Electrónico de Chile, pilar en la creación de iniciativas que han transformado la industria digital en América Latina tales como Cyber Monday y eCommerce Day. Consultor de empresas en procesos de transformación digital, participación en APEC, ONU y FEALAC.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/aldomyrick" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:aldo.myrick@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>
			
			<!-- Jaime Cifuentes -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Jaime-1.jpg" alt="Jaime Cifuentes">
                    <div class="card-overlay">
                        <h2 class="card-name">Jaime Cifuentes</h2>
                        <p class="card-position">Business Manager</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Ingeniero en Finanzas, Diplomado en Gestión de Negocios. Socio en empresas de consultoría en capacitación y de marketing digital. Participó en programas de emprendimiento e innovación organizados por APEC en Taiwán y Centro de Capacitación Internacional Golda Meir, Israel. Amplia experiencia en asesoría a empresas, evaluación de proyectos, eficiencia operacional.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/jaime-eduardo-cifuentes-31394a39/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:jaime.cifuentes@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>
			
			<!-- Lauren Ramírez -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Lau-1.jpg" alt="Lauren Ramírez">
                    <div class="card-overlay">
                        <h2 class="card-name">Lauren Ramírez</h2>
                        <p class="card-position">IT Talent Acquisition Specialist</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Psicóloga especializada en selección de talentos digitales y gestión del capital humano, con énfasis en process automatization y herramientas de IA aplicadas a la selección. Cuenta con experiencia en proyectos de talent acquisition y transformación digital para grandes organizaciones en la región latinoamericana.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/lauren-ram%C3%ADrez-g%C3%B3mez-273788252/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:lauren.ramirez@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>

            <!-- Ingrids Porto -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Ingrids-1.jpg" alt="Ingrids Porto">
                    <div class="card-overlay">
                        <h2 class="card-name">Ingrids Porto</h2>
                        <p class="card-position">IT Talent Acquisition Specialist</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Psicóloga especializada en Carrer Success, certificada en IA generativa para ejecutivos y líderes empresariales, IT Recruiter, Gestión del talento humano, Técnicas para optimizar los procesos de selección del talento, nuevas tendencias, Effective problem-solving and decision making. Amplia experiencia en Selección para compañías a nivel Latam.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://co.linkedin.com/in/ingridsisabelportopadilla-seleccion/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:ingrids.porto@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>

            <!-- Arantxa Martínez -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Ara-1.jpg" alt="Arantxa Martínez">
                    <div class="card-overlay">
                        <h2 class="card-name">Arantxa Martínez</h2>
                        <p class="card-position">IT Talent Acquisition Specialist</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Psicóloga especializada en reclutamiento y selección de talento IT, con experiencia en sourcing avanzado, evaluación por competencias y gestión de procesos de selección para roles tecnológicos en empresas de diversos sectores. Enfocada en conectar el talento adecuado con oportunidades estratégicas en transformación digital.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/arantxa-martinez/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:arantxa.martinez@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>


            <!-- Natalia Román -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Nat-1.jpg" alt="Natalia Román">
                    <div class="card-overlay">
                        <h2 class="card-name">Natalia Román</h2>
                        <p class="card-position">IT Talent Acquisition Specialist</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Psicóloga especializada en Gestión del Talento Humano y Adquisición de Talento IT en Latinoamérica. Experta en identificación y retención de talento, con certificaciones en IA aplicada a Recursos Humanos y dominio de herramientas digitales para optimizar procesos de selección. Amplia experiencia en reclutamiento regional.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/natalia-rom%C3%A1n-9abba7293/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:natalia.roman@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>

            <!-- Liceth Katherine Lozano -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Lice-1.jpg" alt="Liceth Katherine Lozano">
                    <div class="card-overlay">
                        <h2 class="card-name">Liceth Katherine Lozano</h2>
                        <p class="card-position">IT Talent Acquisition Specialist</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Psicóloga especializada en reclutamiento IT, experta en sourcing y entrevistas por competencias en LATAM. Apasionada por el talento humano y el reclutamiento digital, enfocada en transformar culturas empresariales.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/liceth-lozano-5829492b8/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:liceth.lozano@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>

            <!-- Liz Dayana Martínez -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Lis-1.jpg" alt="Liz Dayana Martínez">
                    <div class="card-overlay">
                        <h2 class="card-name">Liz Dayana Martínez</h2>
                        <p class="card-position">IT Talent Acquisition Specialist</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Psicóloga experta en selección de talento digital y gestión humana, enfocada en IA y automatización para reclutamiento. Actualmente apoyo proyectos de adquisición de talento IT y transformación digital en LATAM. Conecto perfiles estratégicos con entornos tecnológicos en crecimiento.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/lizmartinezlora-atracciondetalento/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:liz.martinez@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>

           

            <!-- Jesús Rodríguez -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Jesus-1.jpg" alt="Jesús Rodríguez">
                    <div class="card-overlay">
                        <h2 class="card-name">Jesús Rodríguez</h2>
                        <p class="card-position">IT Consultant</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Líder del área de tecnologías, integraciones, desarrollo de software, servicios digitales y datos. Cuenta con experiencia en Data Science, Analytics, Software development, Digital Marketing, Performance, SEM/SEO e innovación.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/jesús-rafael-rodr%C3%ADguez-6b53ba143/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:jesus.rodriguez@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>

           <!-- Alexandra Ortegón -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Ale-1.jpg" alt="Alexandra Ortegón">
                    <div class="card-overlay">
                        <h2 class="card-name">Alexandra Ortegón</h2>
                        <p class="card-position">Senior Creative Designer</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Diseñadora gráfica con experiencia en identidad visual, diseño web y comunicación digital. Desarrolla soluciones visuales alineadas con los objetivos de marca, asegurando coherencia estética en plataformas digitales y redes sociales. Su trabajo combina creatividad, estrategia y enfoque funcional para fortalecer la presencia de marca.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/alexandradesing/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:alexandra.ortegon@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>  

            
            <!-- Wendy Jiménez -->
            <div class="team-card">
                <div class="card-image-wrapper">
                    <img src="https://www.ehlatam.com/wp-content/uploads/2025/10/Wen-3.jpg" alt="Wendy Jiménez">
                    <div class="card-overlay">
                        <h2 class="card-name">Wendy Jiménez</h2>
                        <p class="card-position">Marketing Manager Consultant</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-bio">
                        Estratega en SEO y marketing digital con experiencia en posicionamiento orgánico, optimización del rendimiento web y desarrollo de productos digitales. Ha trabajado en proyectos digitales aplicando técnicas de Growth Marketing con impacto exponencial en el spin off del negocio de diversas marcas.
                    </div>
                    <div class="card-actions">
                        <div>
                            <a href="https://www.linkedin.com/in/wendy-johanna-jimenez/" class="social-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="mailto:wendy.jimenez@ehlatam.com" class="social-link">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </a>
                        </div>
                        <button class="expand-btn" onclick="toggleCard(this)">Ver más</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</main>

<script>
function toggleCard(button) {
    const card = button.closest('.team-card');
    const isActive = card.classList.contains('active');
    
    // Cerrar todas las tarjetas
    document.querySelectorAll('.team-card').forEach(c => {
        c.classList.remove('active');
        const btn = c.querySelector('.expand-btn');
        if (btn) btn.textContent = 'Ver más';
    });
    
    // Si la tarjeta no estaba activa, abrirla
    if (!isActive) {
        card.classList.add('active');
        button.textContent = 'Ver menos';
    }
}

// Animación de entrada al hacer scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }, index * 100);
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.team-card');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>

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