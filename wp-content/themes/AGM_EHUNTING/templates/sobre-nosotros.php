<?php
/**
 * Template Name: Sobre Nosotros
 */
?>
<?php get_header(); ?>

<style>
    .about-intro {
        position: relative;
        min-height: calc(100vh - 100px);
        margin-top: 0 !important;
        padding: clamp(28px, 3.2vw, 42px) 5.6vw clamp(34px, 4vw, 56px);
        color: #111;
        background: #ffffff;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .about-intro::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(122deg, transparent 0 17%, rgba(255, 255, 255, 0.08) 17.2%, transparent 17.8% 46%, rgba(255, 255, 255, 0.06) 46.2%, transparent 46.8%),
            linear-gradient(42deg, transparent 0 34%, rgba(223, 113, 56, 0.12) 34.2%, transparent 34.9% 72%, rgba(87, 190, 205, 0.08) 72.2%, transparent 72.9%);
        pointer-events: none;
    }

    .about-intro__title {
        position: relative;
        z-index: 1;
        max-width: 920px;
        color: #173b73;
        font-size: clamp(28px, 3.2vw, 42px);
        font-weight: 800;
        line-height: 1.1;
        margin: 0 0 clamp(20px, 2.6vw, 30px);
        text-wrap: balance;
    }

    .about-intro__grid {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 1.35fr) minmax(300px, 0.85fr);
        gap: clamp(24px, 3.2vw, 52px);
        align-items: center;
    }

    .about-intro__copy {
        position: relative;
        border: 1px solid rgba(23, 59, 115, 0.12);
        border-radius: 18px;
        padding: clamp(20px, 2.4vw, 28px);
        color: #1d2530;
        font-size: clamp(15px, 1.15vw, 17px);
        line-height: 1.42;
        max-width: 740px;
        background: #ffffff;
        box-shadow:
            0 20px 48px rgba(12, 28, 52, 0.08),
            inset 0 0 0 1px rgba(23, 59, 115, 0.03);
        backdrop-filter: blur(10px);
    }

    .about-intro__copy::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 18px;
        padding: 1px;
        background: linear-gradient(135deg, rgba(87, 190, 205, 0.42), rgba(223, 113, 56, 0.16), rgba(87, 190, 205, 0.08));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
    }

    .about-intro__copy p {
        margin: 0 0 16px;
    }

    .about-intro__copy p:last-child {
        margin-bottom: 0;
    }

    .about-intro__copy strong {
        color: #111;
        font-weight: 800;
    }

    .about-intro__stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(160px, 1fr));
        gap: 18px;
        padding-top: 0;
        max-width: 470px;
        align-self: center;
    }

    .about-intro__stat {
        position: relative;
        min-height: 136px;
        border: 1px solid rgba(87, 190, 205, 0.24);
        border-radius: 20px;
        background:
            radial-gradient(circle at top right, rgba(223, 113, 56, 0.28), transparent 48%),
            linear-gradient(155deg, rgba(16, 35, 61, 0.98), rgba(8, 20, 38, 0.98));
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 18px 16px;
        font-size: clamp(17px, 1.3vw, 19px);
        line-height: 1.16;
        font-weight: 400;
        box-shadow:
            0 18px 36px rgba(2, 8, 20, 0.3),
            inset 0 0 0 1px rgba(255, 255, 255, 0.03);
        overflow: hidden;
    }

    .about-intro__stat::before {
        content: "";
        position: absolute;
        inset: auto 18px 0;
        height: 3px;
        border-radius: 999px;
        background: linear-gradient(90deg, #df7138 0%, #57becd 100%);
        opacity: 0.92;
    }

    .about-intro__stat span {
        position: relative;
        z-index: 1;
    }

    .about-intro__stat strong {
        color: #57becd;
        font-weight: 800;
    }

    .about-team {
        position: relative;
        padding: 30px 5.4vw 76px;
        color: #fff;
        background:
            linear-gradient(135deg, rgba(18, 45, 88, 0.95) 0%, rgba(18, 31, 52, 0.88) 34%, rgba(174, 112, 55, 0.88) 58%, rgba(16, 43, 83, 0.96) 100%),
            url("<?php echo esc_url(ehunting_theme_asset('images/borde.svg')); ?>");
        background-size: cover, 220px;
        overflow: hidden;
    }

    .about-team::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(120deg, transparent 0 18%, rgba(255, 255, 255, 0.16) 18.2%, transparent 18.7% 46%, rgba(255, 255, 255, 0.12) 46.2%, transparent 46.8%),
            linear-gradient(42deg, transparent 0 28%, rgba(255, 255, 255, 0.16) 28.2%, transparent 28.7% 68%, rgba(255, 255, 255, 0.12) 68.2%, transparent 68.8%);
        pointer-events: none;
    }

    .about-team__inner {
        position: relative;
        z-index: 1;
        max-width: 1210px;
        margin: 0 auto;
    }

    .about-team__title {
        margin: 0 0 22px;
        text-align: center;
        color: #fff;
        font-size: 42px;
        font-weight: 800;
        line-height: 1.1;
    }

    .about-team__intro {
        max-width: 1160px;
        margin: 0 auto 26px;
        color: rgba(255, 255, 255, 0.94);
        font-size: 18px;
        line-height: 1.28;
    }

    .about-team__intro p {
        margin: 0 0 22px;
    }

    .about-team__subtitle {
        margin: 22px 0 30px;
        text-align: center;
        color: #fff;
        font-size: 34px;
        font-weight: 800;
        line-height: 1.15;
    }

    .about-team__subtitle span {
        color: #df7138;
    }

    .about-team__group-title {
        margin: 34px 0 22px;
        color: #fff;
        font-size: 28px;
        font-weight: 800;
        text-align: center;
        line-height: 1.2;
    }

    .about-team__team-copy {
        max-width: 980px;
        margin: -8px auto 26px;
        color: rgba(255, 255, 255, 0.86);
        font-size: 16px;
        line-height: 1.45;
        text-align: center;
    }

    .about-team__grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(240px, 1fr));
        gap: 44px 34px;
    }

    .about-team__card {
        min-height: 312px;
        border: 2px solid rgba(40, 145, 160, 0.45);
        border-radius: 12px;
        background: linear-gradient(135deg, rgba(0, 18, 22, 0.92), rgba(24, 17, 34, 0.94) 55%, rgba(23, 20, 12, 0.94));
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 34px 22px 24px;
        box-shadow: 0 10px 26px rgba(0, 0, 0, 0.22);
        transition: min-height 0.25s ease, transform 0.25s ease;
    }

    .about-team__card.is-expanded {
        justify-content: flex-start;
        min-height: 500px;
    }

    .about-team__photo {
        width: 132px;
        height: 132px;
        border-radius: 50%;
        object-fit: cover;
        background: #fff;
        margin-bottom: 24px;
    }

    .about-team__photo--marcela {
        object-position: center 18%;
    }

    .about-team__name {
        margin: 0 0 10px;
        color: rgba(255, 255, 255, 0.88);
        font-size: 20px;
        line-height: 1.2;
        font-weight: 800;
    }

    .about-team__role {
        min-height: 36px;
        margin: 0 0 18px;
        color: rgba(255, 255, 255, 0.68);
        font-size: 14px;
        line-height: 1.25;
        font-weight: 700;
    }

    .about-team__bio {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        margin: 0;
        color: rgba(255, 255, 255, 0.82);
        font-size: 14px;
        line-height: 1.42;
        text-align: left;
        transition: max-height 0.25s ease, opacity 0.2s ease, margin 0.25s ease;
    }

    .about-team__card.is-expanded .about-team__bio {
        max-height: 360px;
        opacity: 1;
        margin: 0 0 18px;
        overflow-y: auto;
    }

    .about-team__button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 94px;
        height: 36px;
        border: 2px solid #268fa6;
        border-radius: 8px;
        color: #35a8bf;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        background: transparent;
        cursor: pointer;
    }

    .about-team__button:hover,
    .about-team__button:focus {
        color: #fff;
        background: #268fa6;
        text-decoration: none;
    }

    @media (max-width: 1024px) {
        .about-intro {
            min-height: auto;
            padding: 28px 24px 48px;
        }

        .about-intro__grid {
            grid-template-columns: 1fr;
            gap: 28px;
        }

        .about-intro__copy,
        .about-intro__stats {
            max-width: none;
        }

        .about-intro__stats {
            align-self: start;
        }
    }

    @media (max-width: 640px) {
        .about-intro__title {
            font-size: 28px;
        }

        .about-intro__copy {
            font-size: 16px;
        }

        .about-intro__stats {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .about-team {
            padding: 34px 20px 56px;
        }

        .about-team__grid {
            grid-template-columns: 1fr;
        }

        .about-team__title {
            font-size: 34px;
        }

        .about-team__subtitle {
            font-size: 28px;
        }

        .about-team__group-title {
            font-size: 24px;
        }
    }

    @media (max-width: 980px) and (min-width: 641px) {
        .about-team__grid {
            grid-template-columns: repeat(2, minmax(240px, 1fr));
        }
    }
</style>

<main class="about-intro">
    <h1 class="about-intro__title">Desde 2014 marcando el estándar en talento tecnológico en Latinoamérica</h1>

    <div class="about-intro__grid">
        <div class="about-intro__copy">
            <p><strong>eHunting Latam</strong> es la firma pionera especializada exclusivamente en IT &amp; Digital headhunting, acompañando a empresas que compiten en entornos de alta exigencia.</p>

            <p>Impulsamos su evolución conectándolas con perfiles tecnológicos y talento digital capaces de ejecutar, escalar operaciones y convertir la tecnología en una ventaja competitiva real.</p>

            <p>Con más de 10 años de experiencia, aportamos conocimiento profundo del mercado y una visión estratégica que permite contratar con criterio, reducir riesgos y generar impacto sostenible en procesos de innovación y transformación.</p>

            <p>Somos apasionados por la IA, la evolución cultural y la innovación digital. Sabemos que el verdadero diferencial no está solo en la tecnología, sino en las personas que la convierten en resultados concretos de negocio.</p>

            <p>No operamos como una firma tradicional de reclutamiento. Intervenimos en decisiones críticas de talento con criterio empresarial, visión regional y precisión técnica que impacta directamente en crecimiento y ejecución digital.</p>
        </div>

        <div class="about-intro__stats" aria-label="Indicadores eHunting Latam">
            <div class="about-intro__stat"><span><strong>+2.150</strong><br>profesionales<br>contratados</span></div>
            <div class="about-intro__stat"><span>Presencia en <strong>+10</strong><br><strong>países</strong></span></div>
            <div class="about-intro__stat"><span><strong>98%</strong> de<br>satisfacción de<br>clientes</span></div>
            <div class="about-intro__stat"><span><strong>99%</strong> de retención<br>a los 12 meses</span></div>
        </div>
    </div>
</main>

<?php
$about_team_members = array(
    array(
        'name' => 'Aldo Myrick',
        'role' => 'Co-founder',
        'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Aldo-2-1.jpg',
        'bio' => 'Ingeniero Civil Industrial con Diploma en Management de la University of Derby (Reino Unido). Co-fundador del Comité de eCommerce de Chile e impulsor de iniciativas que transformaron la industria digital regional, como Cyber Monday y eCommerce Day. Consultor en procesos de transformación digital con participación en APEC, ONU y FEALAC.',
    ),
    array(
        'name' => 'Jaime Cifuentes',
        'role' => 'Finanzas & Gestión Estratégica',
        'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Jaime-1.jpg',
        'bio' => 'Ingeniero en Finanzas con Diplomado en Gestión de Negocios. Socio en firmas de consultoría en capacitación y marketing digital. Participante en programas de innovación organizados por APEC en Taiwán y el Centro de Capacitación Internacional Golda Meir en Israel. Especialista en asesoría empresarial, evaluación de proyectos y eficiencia operacional.',
    ),
    array(
        'name' => 'Jesús Rodríguez',
        'role' => 'Tecnología & Desarrollo',
        'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Jesus-1.jpg',
        'bio' => 'Líder del área tecnológica con expertise en Data Science, Analytics, desarrollo de software, Digital Marketing, Performance y SEO/SEM. Garantiza profundidad técnica para comprender, evaluar y conectar talento IT con las necesidades reales de negocio.',
    ),
    array(
        'name' => 'Lauren Ramírez',
        'role' => 'IT Talent Acquisition Team',
        'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Lau-1.jpg',
        'bio' => 'Especialista en selección de talento digital, process automatization e IA aplicada al reclutamiento. Experiencia en proyectos de talent acquisition y transformación digital para grandes organizaciones regionales.',
    ),
    array(
        'name' => 'Arantxa Martínez',
        'role' => 'IT Talent Acquisition Team',
        'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Ara-1.jpg',
        'bio' => 'Especialista en reclutamiento IT con expertise en sourcing avanzado y evaluación por competencias para roles tecnológicos en múltiples industrias.',
    ),
    array(
        'name' => 'Ingrids Porto',
        'role' => 'IT Talent Acquisition Team',
        'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Ingrids-1.jpg',
        'bio' => 'Consultora especializada en talent success y selección regional. Integra criterios de carrera, cultura y desempeño para acompañar procesos de contratación digital con foco en ajuste técnico y organizacional.',
    ),
    array(
        'name' => 'Liz Dayana Martínez Lora',
        'role' => 'IT Talent Acquisition Team',
        'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Lis-1.jpg',
        'bio' => 'Especialista en selección de talento digital con foco en IA y automatización aplicadas al reclutamiento IT en toda LATAM.',
    ),
    array(
        'name' => 'Liceth Lozano',
        'role' => 'IT Talent Acquisition Team',
        'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Lice-1.jpg',
        'bio' => 'Experta en sourcing y entrevistas por competencias en LATAM, enfocada en transformación de culturas empresariales a través del talento digital.',
    ),
    array(
        'name' => 'Marcela Albarracín',
        'role' => 'Talento IT LATAM',
        'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/WhatsApp-Image-2025-11-19-at-07.42.39.jpeg',
        'bio' => 'Consultora de TI con experiencia en desarrollo de software, automatización y herramientas digitales. Combina visión tecnológica con enfoque estratégico para conectar personas, tecnología e inteligencia artificial en soluciones prácticas y escalables.',
    ),
);
?>

<section class="about-team" aria-labelledby="about-team-title">
    <div class="about-team__inner">
        <h2 id="about-team-title" class="about-team__title">Equipo</h2>
        <div class="about-team__intro">
            <p>Nuestro equipo está conformado por especialistas en talento digital y reclutamiento tecnológico, combinando experiencia, pasión por la innovación y una visión alineada con la evolución del mercado digital en Latinoamérica.</p>
            <p>No provenimos del reclutamiento tradicional, sino del entendimiento de cómo la innovación impacta en las organizaciones y en sus resultados. Contamos con sólida trayectoria en selección de perfiles especializados, respaldada por una red activa en el ecosistema regional que nos permite identificar y atraer profesionales altamente demandados con precisión y agilidad.</p>
            <p>Nuestras células de trabajo integran expertos en recursos humanos, negocios digitales y entornos ágiles, junto a Product Owners y Scrum Masters. Este enfoque multidisciplinario asegura procesos eficientes, flexibles y orientados a resultados en cada búsqueda.</p>
        </div>

        <h3 class="about-team__subtitle">Este es el <span>Team de eHunting</span></h3>

        <div class="about-team__grid">
            <?php foreach ($about_team_members as $member) : ?>
                <article class="about-team__card">
                    <?php $photo_class = 'Marcela Albarracín' === $member['name'] ? ' about-team__photo--marcela' : ''; ?>
                    <img class="about-team__photo<?php echo esc_attr($photo_class); ?>" src="<?php echo esc_url($member['image']); ?>" alt="<?php echo esc_attr($member['name']); ?>" loading="lazy" decoding="async">
                    <h4 class="about-team__name"><?php echo esc_html($member['name']); ?></h4>
                    <p class="about-team__role"><?php echo esc_html($member['role']); ?></p>
                    <p class="about-team__bio"><?php echo esc_html($member['bio']); ?></p>
                    <button class="about-team__button" type="button" aria-expanded="false">Ver más</button>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="contact-offices-section about-offices-section" aria-labelledby="about-offices-title">
    <div class="contact-header center-align">
        <h2 id="about-offices-title">Nuestras Oficinas</h2>
        <p class="contact-header__lead">Estamos donde nos necesites, encuentra aquí tu punto de contacto.</p>
        <p class="contact-header__accent">Presencia regional, impacto global.</p>
    </div>

    <?php ehunting_render_contact_offices(); ?>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.about-team__button').forEach(function(button) {
            button.addEventListener('click', function() {
                const card = button.closest('.about-team__card');
                const isExpanded = card.classList.toggle('is-expanded');

                button.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
                button.textContent = isExpanded ? 'Ver menos' : 'Ver más';
            });
        });
    });
</script>

<?php get_footer(); ?>
