<?php
/**
 * Template Name: Servicios
 */
?>
<?php get_header(); ?>

<style>
    .services-page {
        position: relative;
        overflow: hidden;
        min-height: calc(100vh - 100px);
        margin-top: 0;
        padding: clamp(18px, 2.4vh, 28px) 5.2vw clamp(24px, 3vh, 36px);
        color: #fff;
        background:
            radial-gradient(circle at 82% 34%, rgba(45, 121, 170, 0.24), transparent 28%),
            linear-gradient(145deg, #0a1830 0%, #132b50 42%, #071529 100%);
    }

    .services-page::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(120deg, transparent 0 18%, rgba(255, 255, 255, 0.07) 18.2%, transparent 18.7% 58%, rgba(87, 190, 205, 0.07) 58.2%, transparent 58.8%),
            linear-gradient(42deg, transparent 0 32%, rgba(223, 113, 56, 0.11) 32.2%, transparent 32.8% 72%, rgba(255, 255, 255, 0.05) 72.2%, transparent 72.8%);
        pointer-events: none;
    }

    .services-page__inner {
        position: relative;
        z-index: 1;
        width: min(100%, 1280px);
        margin: 0 auto;
    }

    .services-page__title {
        margin: 0 0 clamp(12px, 1.8vh, 18px);
        color: #fff;
        text-align: center;
        font-size: clamp(30px, 4.3vw, 46px);
        font-weight: 800;
        line-height: 1.06;
    }

    .services-page__layout {
        display: grid;
        grid-template-columns: minmax(0, 1.25fr) minmax(320px, 0.75fr);
        gap: clamp(34px, 5vw, 68px);
        align-items: center;
    }

    .services-page__kicker {
        margin: 0 0 clamp(8px, 1.2vh, 12px);
        color: #57becd;
        font-size: clamp(24px, 3.2vw, 34px);
        font-weight: 800;
        line-height: 1.12;
    }

    .services-page__subtitle {
        margin: 0 0 clamp(14px, 1.8vh, 18px);
        color: #57becd;
        font-size: clamp(16px, 1.8vw, 22px);
        font-style: italic;
        line-height: 1.32;
    }

    .services-page__copy {
        max-width: 900px;
        color: rgba(255, 255, 255, 0.9);
        font-size: clamp(15px, 1.35vw, 18px);
        line-height: 1.5;
    }

    .services-page__copy p {
        margin: 0 0 clamp(16px, 2.3vh, 24px);
    }

    .services-page__copy p:last-child {
        margin-bottom: 0;
    }

    .services-page__cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 46px;
        margin-top: clamp(24px, 4vh, 42px);
        padding: 0 22px;
        border-radius: 999px;
        background: #df7138;
        color: #fff;
        font-size: clamp(14px, 1.35vw, 18px);
        font-weight: 800;
        line-height: 1;
        text-transform: uppercase;
        text-decoration: none;
        transition: transform 0.24s ease, background-color 0.24s ease;
    }

    .services-page__cta:hover,
    .services-page__cta:focus {
        background: #ef7d40;
        color: #fff;
        transform: translateY(-2px);
    }

    .services-page__cta::after {
        content: ">>";
        margin-left: 14px;
        letter-spacing: -0.12em;
        font-size: 1.25em;
        font-weight: 400;
    }

    .services-page__visual {
        position: relative;
        min-height: clamp(250px, 48vh, 350px);
        border: 0;
        border-radius: 0;
        overflow: hidden;
        background: transparent;
    }

    .services-page__visual::before,
    .services-page__visual::after {
        content: "";
        position: absolute;
        bottom: 36px;
        width: 31%;
        height: 58%;
        border-radius: 22px 22px 0 0;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.22), rgba(255, 255, 255, 0.05));
        opacity: 0.36;
    }

    .services-page__visual::before {
        left: 17%;
        transform: skewX(-6deg);
    }

    .services-page__visual::after {
        right: 17%;
        transform: skewX(6deg);
    }

    .services-page__visual--filled::before,
    .services-page__visual--filled::after {
        display: none;
    }

    .services-page__visual img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .services-digital {
        position: relative;
        margin-top: clamp(54px, 8vh, 86px);
        padding: 0 0 20px;
    }

    .services-digital__top {
        display: grid;
        grid-template-columns: minmax(320px, 0.78fr) minmax(0, 1.22fr);
        gap: clamp(42px, 6vw, 78px);
        align-items: center;
    }

    .services-digital__image-space {
        position: relative;
        width: min(100%, 430px);
        aspect-ratio: 1 / 0.92;
        margin: 0 auto;
        border: 0;
        border-radius: 50%;
        overflow: hidden;
        background: transparent;
        box-shadow: 0 18px 46px rgba(0, 0, 0, 0.28);
    }

    .services-digital__image-space::before {
        content: "";
        position: absolute;
        left: 50%;
        top: 38%;
        width: 54%;
        height: 36%;
        transform: translate(-50%, -50%);
        border: 2px solid rgba(255, 255, 255, 0.36);
        border-radius: 8px;
        background:
            linear-gradient(90deg, rgba(255, 255, 255, 0.22) 18%, transparent 18% 100%),
            linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.08));
        opacity: 0.82;
    }

    .services-digital__image-space::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: -6%;
        width: 17%;
        height: 46%;
        transform: translateX(-50%);
        border-radius: 34px 34px 0 0;
        background: rgba(7, 21, 41, 0.52);
    }

    .services-digital__image-space--filled::before,
    .services-digital__image-space--filled::after {
        display: none;
    }

    .services-digital__image-space img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .services-digital__title {
        margin: 0 0 10px;
        color: #57becd;
        font-size: clamp(30px, 3.6vw, 44px);
        font-weight: 800;
        line-height: 1.1;
    }

    .services-digital__subtitle {
        margin: 0 0 14px;
        color: #57becd;
        font-size: clamp(17px, 1.8vw, 22px);
        font-style: italic;
        line-height: 1.35;
    }

    .services-digital__copy {
        color: rgba(255, 255, 255, 0.9);
        font-size: clamp(15px, 1.28vw, 17px);
        line-height: 1.42;
    }

    .services-digital__copy p {
        margin: 0 0 18px;
    }

    .services-digital__copy p:last-child {
        margin-bottom: 0;
    }

    .services-digital__intro {
        margin: 22px 0 20px;
        color: #57becd;
        text-align: center;
        font-size: clamp(16px, 1.55vw, 20px);
        line-height: 1.3;
    }

    .services-digital__intro strong {
        color: #fff;
        font-weight: 800;
    }

    .services-digital__carousel {
        position: relative;
        width: min(100%, 1120px);
        margin: 0 auto;
        padding: 0 64px;
    }

    .services-digital__viewport {
        overflow: hidden;
    }

    .services-digital__areas {
        display: flex;
        gap: 28px;
        align-items: stretch;
        transition: transform 0.35s ease;
        will-change: transform;
    }

    .services-digital__area {
        display: grid;
        grid-template-columns: 82px minmax(0, 1fr);
        gap: 18px;
        align-items: center;
        flex: 0 0 calc((100% - 56px) / 3);
        min-width: 0;
    }

    .services-digital__area--wide {
        grid-template-columns: 82px minmax(0, 1fr);
    }

    .services-digital__icon-placeholder {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.22);
    }

    .services-digital__icon-placeholder::before {
        content: "";
        width: 42px;
        height: 34px;
        border: 3px solid #57becd;
        border-radius: 5px;
        background:
            linear-gradient(#57becd, #57becd) 10px 10px / 20px 3px no-repeat,
            linear-gradient(#df7138, #df7138) 10px 19px / 15px 3px no-repeat;
        box-shadow: 0 10px 0 -6px #57becd;
    }

    .services-digital__pill {
        position: relative;
        min-height: 54px;
        border-radius: 999px;
        border: 2px solid transparent;
        background:
            linear-gradient(180deg, rgba(16, 30, 56, 0.98), rgba(6, 15, 31, 0.98)) padding-box,
            linear-gradient(100deg, #ff7445 0%, #ff5dc8 38%, #7a5cff 68%, #2e7dff 100%) border-box;
        box-shadow:
            0 0 10px rgba(255, 116, 69, 0.66),
            0 0 18px rgba(255, 93, 200, 0.44),
            0 0 24px rgba(46, 125, 255, 0.52),
            inset 0 0 18px rgba(117, 92, 255, 0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 9px 20px;
        color: #fff;
        text-align: center;
        font-size: clamp(13px, 1.2vw, 16px);
        font-weight: 800;
        line-height: 1.18;
    }

    .services-digital__pill--long {
        padding-left: 22px;
        padding-right: 22px;
        font-size: clamp(12px, 1vw, 14px);
    }

    .services-digital__pill::after {
        content: "";
        position: absolute;
        left: 18%;
        right: 18%;
        bottom: -3px;
        height: 5px;
        border-radius: 999px;
        background: #2e7dff;
        filter: blur(4px);
        opacity: 0.9;
    }

    .services-digital__area:nth-child(2n) .services-digital__pill {
        background:
            linear-gradient(180deg, rgba(16, 30, 56, 0.98), rgba(6, 15, 31, 0.98)) padding-box,
            linear-gradient(100deg, #ff4b3e 0%, #ff8948 32%, #ff5dc8 64%, #815cff 100%) border-box;
        box-shadow:
            0 0 10px rgba(255, 75, 62, 0.72),
            0 0 18px rgba(255, 137, 72, 0.46),
            0 0 24px rgba(255, 93, 200, 0.45),
            inset 0 0 18px rgba(255, 137, 72, 0.18);
    }

    .services-digital__area:nth-child(2n) .services-digital__pill::after {
        background: #ff7445;
    }

    .services-digital__area:nth-child(3n) .services-digital__pill {
        background:
            linear-gradient(180deg, rgba(16, 30, 56, 0.98), rgba(6, 15, 31, 0.98)) padding-box,
            linear-gradient(100deg, #ff8b4a 0%, #ff5dc8 38%, #895cff 66%, #2e7dff 100%) border-box;
        box-shadow:
            0 0 10px rgba(255, 139, 74, 0.66),
            0 0 18px rgba(255, 93, 200, 0.5),
            0 0 26px rgba(46, 125, 255, 0.58),
            inset 0 0 18px rgba(46, 125, 255, 0.16);
    }

    .services-digital__arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 42px;
        height: 42px;
        border: 2px solid rgba(87, 190, 205, 0.72);
        border-radius: 50%;
        background: rgba(6, 15, 31, 0.88);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 28px;
        line-height: 1;
        box-shadow:
            0 0 16px rgba(87, 190, 205, 0.32),
            inset 0 0 12px rgba(223, 113, 56, 0.16);
        z-index: 2;
    }

    .services-digital__arrow:hover,
    .services-digital__arrow:focus {
        border-color: #df7138;
        color: #57becd;
    }

    .services-digital__arrow:disabled {
        opacity: 0.35;
        cursor: default;
    }

    .services-digital__arrow--prev {
        left: 0;
    }

    .services-digital__arrow--next {
        right: 0;
    }

    .services-digital__actions {
        margin-top: 24px;
        text-align: center;
    }

    .services-digital__button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 210px;
        min-height: 46px;
        padding: 0 28px;
        border-radius: 999px;
        background: #df7138;
        color: #fff;
        text-transform: uppercase;
        text-decoration: none;
        font-size: 16px;
        font-weight: 800;
        letter-spacing: 0.04em;
    }

    .services-digital__button:hover,
    .services-digital__button:focus {
        background: #ef7d40;
        color: #fff;
    }

    .services-extra {
        position: relative;
        display: grid;
        gap: clamp(64px, 9vh, 96px);
        margin-top: clamp(58px, 8vh, 88px);
        padding-bottom: 28px;
    }

    .services-extra__panel {
        display: grid;
        gap: clamp(42px, 6vh, 66px);
        min-height: calc(100vh - 130px);
        align-content: center;
    }

    .services-extra__row {
        display: grid;
        grid-template-columns: minmax(320px, 0.82fr) minmax(0, 1.18fr);
        gap: clamp(42px, 6vw, 78px);
        align-items: center;
    }

    .services-extra__row--reverse {
        grid-template-columns: minmax(320px, 0.82fr) minmax(0, 1.18fr);
    }

    .services-extra__row--reverse .services-extra__visual {
        order: 1;
    }

    .services-extra__row--reverse .services-extra__content {
        order: 2;
    }

    .services-extra__visual {
        position: relative;
        width: min(100%, 460px);
        aspect-ratio: 1 / 1;
        margin: 0 auto;
        border-radius: 50%;
        overflow: hidden;
        background: transparent;
        box-shadow:
            0 18px 46px rgba(0, 0, 0, 0.32);
    }

    .services-extra__visual::before {
        content: "";
        position: absolute;
        inset: 18%;
        border-radius: 8px;
        border: 2px solid rgba(255, 255, 255, 0.22);
        background:
            linear-gradient(90deg, rgba(255, 255, 255, 0.2) 16%, transparent 16% 100%),
            linear-gradient(180deg, rgba(255, 255, 255, 0.14), rgba(255, 255, 255, 0.04));
        opacity: 0.75;
    }

    .services-extra__visual::after {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        width: 52px;
        height: 52px;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        border: 3px solid rgba(87, 190, 205, 0.7);
        box-shadow: 0 0 24px rgba(87, 190, 205, 0.42);
    }

    .services-extra__visual--filled::before,
    .services-extra__visual--filled::after {
        display: none;
    }

    .services-extra__visual img {
        display: block;
        width: 88%;
        height: 88%;
        margin: 6% auto;
        object-fit: contain;
    }

    .services-extra__visual--dark {
        background: transparent;
    }

    .services-extra__visual--cyan {
        background: transparent;
    }

    .services-extra__visual--soft {
        background: transparent;
    }

    .services-extra__title {
        margin: 0 0 6px;
        color: #57becd;
        font-size: clamp(28px, 3.5vw, 42px);
        font-weight: 800;
        line-height: 1.08;
    }

    .services-extra__subtitle {
        margin: 0 0 18px;
        color: #57becd;
        font-size: clamp(16px, 1.7vw, 21px);
        font-style: italic;
        line-height: 1.3;
    }

    .services-extra__content {
        color: rgba(255, 255, 255, 0.9);
        font-size: clamp(15px, 1.25vw, 17px);
        line-height: 1.42;
    }

    .services-extra__content p {
        margin: 0 0 18px;
    }

    .services-extra__content ul {
        margin: 0 0 24px 18px;
        padding: 0;
    }

    .services-extra__content li {
        margin: 0 0 7px;
        padding-left: 4px;
    }

    .services-extra__content strong {
        color: #df7138;
        font-weight: 800;
    }

    .services-extra__button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 250px;
        min-height: 46px;
        margin-top: 4px;
        padding: 0 26px;
        border-radius: 999px;
        background: #df7138;
        color: #fff;
        text-transform: uppercase;
        text-decoration: none;
        font-size: 15px;
        font-weight: 800;
        letter-spacing: 0.02em;
    }

    .services-extra__button::after {
        content: ">>";
        margin-left: 16px;
        letter-spacing: -0.12em;
        font-size: 1.25em;
        font-weight: 400;
    }

    .services-extra__button:hover,
    .services-extra__button:focus {
        background: #ef7d40;
        color: #fff;
    }

    @media (max-width: 980px) {
        .services-page {
            padding: 28px 24px 42px;
        }

        .services-page__layout {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .services-page__visual {
            min-height: 230px;
        }

        .services-digital__top {
            grid-template-columns: 1fr;
            gap: 28px;
        }

        .services-digital__carousel {
            padding: 0 52px;
        }

        .services-digital__areas {
            gap: 24px;
        }

        .services-digital__area {
            flex-basis: calc((100% - 24px) / 2);
        }

        .services-extra__row,
        .services-extra__row--reverse {
            grid-template-columns: 1fr;
            gap: 26px;
        }

        .services-extra__panel {
            min-height: auto;
        }

        .services-extra__row--reverse .services-extra__visual,
        .services-extra__row--reverse .services-extra__content {
            order: initial;
        }
    }

    @media (max-width: 640px) {
        .services-page {
            padding: 24px 18px 36px;
        }

        .services-page__title {
            text-align: left;
        }

        .services-page__visual {
            min-height: 190px;
        }

        .services-digital__image-space {
            width: min(100%, 300px);
        }

        .services-digital__carousel {
            padding: 0 44px;
        }

        .services-digital__areas {
            gap: 18px;
        }

        .services-digital__area {
            grid-template-columns: 70px minmax(0, 1fr);
            flex-basis: 100%;
        }

        .services-digital__area--wide {
            grid-template-columns: 70px minmax(0, 1fr);
        }

        .services-digital__icon-placeholder {
            width: 62px;
            height: 62px;
        }

        .services-digital__icon-placeholder::before {
            width: 32px;
            height: 26px;
        }

        .services-extra__visual {
            width: min(100%, 310px);
        }

        .services-extra__button {
            width: 100%;
            min-width: 0;
        }
    }

    @media (max-height: 760px) and (min-width: 981px) {
        .services-page__title {
            font-size: clamp(28px, 3.6vw, 38px);
        }

        .services-page__kicker {
            font-size: clamp(22px, 2.8vw, 30px);
        }

        .services-page__subtitle,
        .services-page__copy {
            font-size: 15px;
        }

        .services-page__copy p {
            margin-bottom: 14px;
        }

        .services-page__cta {
            margin-top: 20px;
        }

        .services-page__visual {
            min-height: 300px;
        }
    }
</style>

<main class="services-page">
    <div class="services-page__inner">
        <h1 class="services-page__title">Nuestros Servicios</h1>

        <section id="executive-search" class="services-page__layout" aria-labelledby="services-executive-search-title">
            <div class="services-page__content">
                <h2 id="services-executive-search-title" class="services-page__kicker">Executive Search</h2>
                <p class="services-page__subtitle">Búsqueda ejecutiva para decisiones que no admiten margen de error.</p>

                <div class="services-page__copy">
                    <p>En eHunting Latam ofrecemos un servicio de Executive Search enfocado en posiciones de alta dirección vinculadas a Transformación Digital y liderazgo tecnológico.</p>
                    <p>Identificamos, evaluamos y atraemos ejecutivos capaces de impulsar innovación, estrategia y evolución organizacional en entornos de alta exigencia.</p>
                    <p>Nuestro proceso combina análisis profundo del mercado, metodologías ágiles y una red consolidada en el ecosistema digital latinoamericano, permitiéndonos presentar candidatos alineados con la cultura, visión y objetivos de cada compañía.</p>
                    <p>Actuamos como socios estratégicos en decisiones críticas de talento, garantizando confidencialidad, precisión y efectividad.</p>
                </div>

                <a class="services-page__cta modal-trigger" href="#contactanos">Solicita más información</a>
            </div>

            <div class="services-page__visual services-page__visual--filled" aria-label="Imagen de Executive Search">
                <img src="http://ehlatam.com/wp-content/uploads/2026/04/Executive-Search.png" alt="Executive Search" loading="lazy" decoding="async">
            </div>
        </section>

        <section id="reclutamiento-it-digital" class="services-digital" aria-labelledby="services-digital-title">
            <div class="services-digital__top">
                <div class="services-digital__image-space services-digital__image-space--filled" aria-label="Imagen de Reclutamiento IT & Digital">
                    <img src="http://ehlatam.com/wp-content/uploads/2026/04/Reclutamiento-IT-Digital.png" alt="Reclutamiento IT y Digital" loading="lazy" decoding="async">
                </div>

                <div class="services-digital__content">
                    <h2 id="services-digital-title" class="services-digital__title">Reclutamiento IT &amp; Digital</h2>
                    <p class="services-digital__subtitle">Incorporación estratégica de talento para fortalecer tu capacidad digital.</p>

                    <div class="services-digital__copy">
                        <p>Nuestro servicio de Reclutamiento IT &amp; Digital se enfoca en la búsqueda especializada de perfiles tecnológicos alineados a las necesidades reales del negocio y a los desafíos de ejecución de cada organización.</p>
                        <p>Combinamos experiencia en headhunting, acceso activo a comunidades técnicas, redes de networking y referidos estratégicos, junto con plataformas especializadas y uso responsable de inteligencia artificial para identificar talento altamente demandado con rapidez y precisión.</p>
                        <p>Acompañamos la construcción y consolidación de áreas digitales incorporando perfiles clave en desarrollo de software, arquitectura, agilidad, marketing digital, e-commerce y growth. Cada proceso se diseña en coherencia con la visión, el roadmap digital y los objetivos estratégicos de la compañía, asegurando incorporaciones con impacto tangible desde el primer día.</p>
                    </div>
                </div>
            </div>

            <p class="services-digital__intro">Cuéntanos qué <strong>perfil IT &amp; Digital</strong> buscas, nosotros lo encontramos por ti</p>

            <div class="services-digital__carousel" data-services-carousel>
                <button class="services-digital__arrow services-digital__arrow--prev" type="button" aria-label="Ver perfiles anteriores">&lsaquo;</button>
                <div class="services-digital__viewport">
                    <div class="services-digital__areas" aria-label="Áreas de talento IT y Digital">
                        <div class="services-digital__area">
                            <span class="services-digital__icon-placeholder" aria-hidden="true"></span>
                            <span class="services-digital__pill">Software Engineering &amp; Architecture</span>
                        </div>
                        <div class="services-digital__area services-digital__area--wide">
                            <span class="services-digital__icon-placeholder" aria-hidden="true"></span>
                            <span class="services-digital__pill services-digital__pill--long">Inteligencia Artificial, Automatización y Human-AI Collaboration</span>
                        </div>
                        <div class="services-digital__area">
                            <span class="services-digital__icon-placeholder" aria-hidden="true"></span>
                            <span class="services-digital__pill">Datos, Analytics &amp; Ciencia de Datos</span>
                        </div>
                        <div class="services-digital__area">
                            <span class="services-digital__icon-placeholder" aria-hidden="true"></span>
                            <span class="services-digital__pill">Producto Digital, UX &amp; Marketing Digital</span>
                        </div>
                        <div class="services-digital__area">
                            <span class="services-digital__icon-placeholder" aria-hidden="true"></span>
                            <span class="services-digital__pill">Cloud, DevOps &amp; Ciberseguridad</span>
                        </div>
                        <div class="services-digital__area">
                            <span class="services-digital__icon-placeholder" aria-hidden="true"></span>
                            <span class="services-digital__pill">Agilidad, Delivery y Gestión de Proyectos</span>
                        </div>
                    </div>
                </div>
                <button class="services-digital__arrow services-digital__arrow--next" type="button" aria-label="Ver más perfiles">&rsaquo;</button>
            </div>

            <div class="services-digital__actions">
                <a class="services-digital__button modal-trigger" href="#contactanos">Contactar</a>
            </div>
        </section>

        <section class="services-extra" aria-label="Servicios complementarios para RRHH">
            <section class="services-extra__panel" aria-label="AI Training y Employer Branding">
                <article id="ai-training-rrhh" class="services-extra__row">
                    <div class="services-extra__content">
                        <h2 class="services-extra__title">AI Training para RRHH</h2>
                        <p class="services-extra__subtitle">Inteligencia artificial aplicada con criterio empresarial.</p>
                        <p>Capacitamos equipos de Recursos Humanos en el uso estratégico de herramientas de Inteligencia Artificial aplicadas a reclutamiento y selección.</p>
                        <p>Nuestro programa combina formación práctica, casos reales y acompañamiento experto para asegurar adopción efectiva y resultados medibles. Incluye:</p>
                        <ul>
                            <li><strong>Diagnóstico inicial:</strong> Evaluación de procesos actuales y detección de oportunidades de automatización.</li>
                            <li><strong>Formación personalizada:</strong> Entrenamiento en herramientas AI aplicadas a atracción, evaluación y gestión de talento.</li>
                            <li><strong>Implementación acompañamiento:</strong> Integración en flujos de trabajo con foco en productividad y precisión.</li>
                        </ul>
                        <a class="services-extra__button modal-trigger" href="#contactanos">Solicita más información</a>
                    </div>

                    <div class="services-extra__visual services-extra__visual--dark services-extra__visual--filled" aria-label="Imagen de AI Training para RRHH">
                        <img src="http://ehlatam.com/wp-content/uploads/2026/04/AI-Training-para-RRHH.png" alt="AI Training para RRHH" loading="lazy" decoding="async">
                    </div>
                </article>

                <article id="employer-branding-advisory" class="services-extra__row services-extra__row--reverse">
                    <div class="services-extra__visual services-extra__visual--dark services-extra__visual--filled" aria-label="Imagen de Employer Branding Advisory">
                        <img src="http://ehlatam.com/wp-content/uploads/2026/04/Employer-Branding-Advisory.png" alt="Employer Branding Advisory" loading="lazy" decoding="async">
                    </div>

                    <div class="services-extra__content">
                        <h2 class="services-extra__title">Employer Branding Advisory</h2>
                        <p class="services-extra__subtitle">Posicionamiento empleador con impacto competitivo.</p>
                        <p>Acompañamos a las organizaciones en el diseño y fortalecimiento de su estrategia de Employer Branding, con foco en atraer talento altamente especializado.</p>
                        <p>Combinamos datos, cultura organizacional y experiencia en reclutamiento IT para construir propuestas de valor auténticas y sostenibles.</p>
                        <p>Conectamos el talento ideal con el propósito empresarial mediante acciones alineadas a resultados.</p>
                        <a class="services-extra__button modal-trigger" href="#contactanos">Solicita más información</a>
                    </div>
                </article>
            </section>

            <section class="services-extra__panel" aria-label="Agentes IA y Estudios de Compensación">
                <article id="agentes-ia-rrhh" class="services-extra__row">
                    <div class="services-extra__content">
                        <h2 class="services-extra__title">Desarrollo de Agentes IA para RRHH</h2>
                        <p class="services-extra__subtitle">Automatización inteligente con comprensión del contexto técnico.</p>
                        <p>Diseñamos agentes de Inteligencia Artificial que optimizan cada etapa del proceso de atracción y gestión de talento digital.</p>
                        <p>Nuestros desarrollos combinan tecnología avanzada con profundo conocimiento del mercado especializado.</p>
                        <p>Beneficios clave:</p>
                        <ul>
                            <li>Mayor precisión en la identificación de perfiles técnicos.</li>
                            <li>Escalabilidad y eficiencia operativa sin perder enfoque humano.</li>
                            <li>Integraciones personalizadas y alineadas a objetivos de negocio.</li>
                        </ul>
                        <a class="services-extra__button modal-trigger" href="#contactanos">Solicita más información</a>
                    </div>

                    <div class="services-extra__visual services-extra__visual--cyan services-extra__visual--filled" aria-label="Imagen de Desarrollo de Agentes IA para RRHH">
                        <img src="http://ehlatam.com/wp-content/uploads/2026/04/Desarrollo-de-Agentes-IA-para-RRHH.png" alt="Desarrollo de Agentes IA para RRHH" loading="lazy" decoding="async">
                    </div>
                </article>

                <article id="compensacion-bienestar" class="services-extra__row services-extra__row--reverse">
                    <div class="services-extra__visual services-extra__visual--soft services-extra__visual--filled" aria-label="Imagen de Estudios de Compensación y Bienestar">
                        <img src="http://ehlatam.com/wp-content/uploads/2026/04/Estudios-de-Compensacion-y-Bienestar.png" alt="Estudios de Compensación y Bienestar" loading="lazy" decoding="async">
                    </div>

                    <div class="services-extra__content">
                        <h2 class="services-extra__title">Estudios de Compensación y Bienestar</h2>
                        <p class="services-extra__subtitle">Estructuras salariales que fortalecen competitividad y retención.</p>
                        <p>Desarrollamos estudios de compensación y bienestar laboral que alinean estructura salarial, beneficios y cultura organizacional con los objetivos del negocio.</p>
                        <p>Nuestro enfoque incluye:</p>
                        <ul>
                            <li>Análisis de mercado y benchmarking actualizado.</li>
                            <li>Evaluación de prácticas internas y percepción de colaboradores.</li>
                            <li>Recomendaciones personalizadas y medibles para fortalecer compromiso y retención.</li>
                            <li>Combinamos análisis de datos con visión humana para diseñar propuestas competitivas y sostenibles.</li>
                        </ul>
                        <a class="services-extra__button modal-trigger" href="#contactanos">Solicita más información</a>
                    </div>
                </article>
            </section>
        </section>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-services-carousel]').forEach(function(carousel) {
            const track = carousel.querySelector('.services-digital__areas');
            const items = Array.from(carousel.querySelectorAll('.services-digital__area'));
            const prev = carousel.querySelector('.services-digital__arrow--prev');
            const next = carousel.querySelector('.services-digital__arrow--next');
            let index = 0;

            function visibleCount() {
                if (window.matchMedia('(max-width: 640px)').matches) {
                    return 1;
                }

                if (window.matchMedia('(max-width: 980px)').matches) {
                    return 2;
                }

                return 3;
            }

            function update() {
                const visible = visibleCount();
                const maxIndex = Math.max(0, items.length - visible);
                index = Math.min(index, maxIndex);

                const firstItem = items[0];
                const gap = items[1] ? items[1].offsetLeft - firstItem.offsetLeft - firstItem.offsetWidth : 0;
                const distance = index * (firstItem.offsetWidth + gap);

                track.style.transform = 'translateX(-' + distance + 'px)';
                prev.disabled = index === 0;
                next.disabled = index >= maxIndex;
            }

            prev.addEventListener('click', function() {
                index = Math.max(0, index - visibleCount());
                update();
            });

            next.addEventListener('click', function() {
                index = Math.min(items.length - visibleCount(), index + visibleCount());
                update();
            });

            window.addEventListener('resize', update);
            update();
        });
    });
</script>

<?php get_footer(); ?>
