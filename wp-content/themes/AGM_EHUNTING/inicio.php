<?php
/**
* Template Name: Inicio
*/
?>

<?php get_header(); ?>
<!-- SECCION DE BIENVENIDA -->
 <meta name="description"
        content="Headhunter especializado en Transformación Digital en Hispanoamérica. Atraemos talentos IT & digitales sobresalientes con alta precisión.">
<meta name="keywords"
    content="head-hunting ejecutivo, talento ejecutivo LATAM, reclutamiento de alta gerencia, reclutamiento para cargos de alta dirección">

<div class="row home-hero">
    <div class="home-hero__overlay"></div>

    <div class="contenedor-titulo center-align white-text home-hero__content">
        <?php /*<i style="display:block;margin-top:20px" class="light flow-text">Founded en 2014</i> */?>
        <h1 class="letras1 home-hero__title">¡Primer Headhunter especializado en Transformación Digital<br> en
            América
            Latina<?php // echo $tituloprincipal ?>
        </h1>
        <a href="#contacto" data-target="contactanos" class="btn boton-conversemos modal-trigger home-hero__cta">Conversemos</a>

    </div>
    <?php

          //Detect special conditions devices
          $iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
          $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
          $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");


          //do something with this information
          if( $iPod || $iPhone || $iPad){
            echo '<img class="movilvideo lazy home-hero__video" src="'.get_stylesheet_directory_uri().'/images/timelapse1.gif" >';
          }
          else{
            echo '<video class="desktopvideo1 lazy home-hero__video" autoplay muted loop src="'.get_stylesheet_directory_uri().'/images/time3-1.mp4">
                    
                  </video>';
          }

?>
</div>
<?php if(!wp_is_mobile()): ?>
<section class="carousel-home mensajes">
    <div class="carousel">
        <a class="carousel-item" href="#one!"><img
                src="https://ehlatam.com/wp-content/themes/AGM_EHUNTING/images/carousel-banner1.png" alt="test 1"
                title="test 1"></a>
        <a class="carousel-item" href="#two!"><img
                src="https://ehlatam.com/wp-content/themes/AGM_EHUNTING/images/carousel-banner2.png" alt="test 1"
                title="test 1"></a>
    </div>
</section>
<section class="banner center-align home-banner">
    <a href="https://www.youtube.com/channel/UCVJU7QkdpWP1XryAPo_dP0A" target="_blank"
        rel="noopener noreferer nofollow">
        <img src="<?php echo get_template_directory_uri() ?>/images/BANNER_EH_WEB1.png" alt="Ceo Talks"
            title="Ir a Youtube">
    </a>
</section>
<?php endif; ?>
<?php ehunting_render_home_clients(); ?>
<section id="contenido" class="row" onclick="">
    <div class="quehacemos hide-on-med-and-up">
        <!-- MOBILE -->
        <div class="row container">
            <div id="que-hacemos" class="col s12 m12 l12 subtitulo" data-label="QUE HACEMOS" data-id="content--2"
                data-export-id="content-7" data-category="content">
                <div class="col s12 textojustificado home-mobile-section__content" data-type="column">
                    <h2 class="subtitulo home-mobile-section__heading">¿QUÉ HACEMOS?</h2>
                    <div class="divider">&nbsp;</div>
                    <div id="que-hacemos-content" class="home-mobile-section__flex">
                        <div class="col s12 m6 home-mobile-section__column">
                            <p class="home-mobile-section__text">Proveemos servicios de selección y atracción de
                                Talentos Digitales para roles en Comercio Electrónico, Transformación Digital,
                                Tecnologías e Innovación. Nuestro objetivo es conectar empresas con profesionales que
                                habiliten la transformación de su empresa.</p>

                            <h2 class="subtitulo home-mobile-section__heading">Experiencia y Trayectoria</h2>

                            <p class="home-mobile-section__text">Nuestro equipo cuenta con experiencia específica en la
                                práctica digital, gracias a esto logramos una rápida alineación y comprensión de las
                                necesidades de la empresa. La envergadura de los proyectos en los que hemos participado
                                nos posicionan como un socio confiable en la atracción de los mejores talentos del
                                mercado.</p>

                            <h3 class="subtitulo home-mobile-section__heading">Precisión y Agilidad</h3>

                            <p class="home-mobile-section__text">Nuestra fortaleza se basa en la precisión y agilidad
                                con la que identificamos y ponemos a disposición de nuestros clientes talentos
                                sobresalientes. Esta apuesta por la especialización nos permite lograr el match perfecto
                                de los profesionales requeridos. Hemos asesorado un número amplio de corporaciones lo
                                cual nos ha dejado invaluables aprendizajes que aplicamos en cada proyecto en el que nos
                                embarcamos.</p>
                        </div>
                        <div class="col s12 m6 que-hacemos-imagen home-mobile-section__column">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/o-M5hi-wuWQ?si=EKqlgkXMberGPZoV"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                class="home-mobile-section__video"></iframe>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="home-mobile-section__spacer"></div>
                    <div class="col s12 m6 home-mobile-section__column">
                        <p class="home-mobile-section__text"><strong>Ámbitos De Acción</strong></p>
                        <p class="home-mobile-section__text">Nos especializamos en identificar y seleccionar talentos
                            en distintos ámbitos:</p>
                        <ul class="collection">
                            <li class="collection-item valign-wrapper">
                                <i class="material-icons small left">data_usage</i>
                                Comercio Electrónico / Canales Digitales / Marketplaces
                            </li>
                            <li class="collection-item valign-wrapper">
                                <i class="material-icons small left">data_usage</i>
                                Customer Experience / Estrategia Digital / Innovación
                            </li>
                            <li class="collection-item valign-wrapper">
                                <i class="material-icons small left">data_usage</i>
                                Omnicanalidad / Data Analytics / Growth Marketing
                            </li>
                            <li class="collection-item valign-wrapper">
                                <i class="material-icons small left">data_usage</i>
                                Tecnologías / Inteligencia Artificial / Transformación Digital
                            </li>
                        </ul>
                    </div>
                    <div class="col s12 m6 home-mobile-section__column">
                        <p class="home-mobile-section__text"><strong>Scope Sectorial</strong></p>
                        <p class="home-mobile-section__text">Proveemos servicios a una amplia variedad de sectores
                            económicos, nos adaptamos a las dinámicas y necesidades de cada industria:</p>
                        <ul class="collection">
                            <li class="collection-item valign-wrapper">
                                <i class="material-icons small left">data_usage</i>
                                Retail / Consumo Masivo / Tecnologías / Telecomunicaciones
                            </li>
                            <li class="collection-item valign-wrapper">
                                <i class="material-icons small left">data_usage</i>
                                Servicios Financieros / Centros Comerciales / Transporte
                            </li>
                            <li class="collection-item valign-wrapper">
                                <i class="material-icons small left">data_usage</i>
                                Manufactura / Automotriz / Salud
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="home-mobile-section__cta">
                <button data-target="contactanos" class="btn boton-conversemos modal-trigger home-mobile-section__cta-button">Conversemos</button>
            </div>
        </div>
    </div>
    <?php ehunting_render_home_action_cards(true); ?>
    <div class="clearfix"></div>


    <div class="sobrenosotros hide-on-med-and-up">
        <!-- MOBILE -->
        <div class="row container home-mobile-section__row">
            <div id="sobre-nosotros" class="col s12 m12 l12 textojustificado home-mobile-section__about-layout">
                <div class="col s12">
                    <div class="sol s12 m12 l12 home-mobile-section__about-box">
                        <h2 class="subtitulo">SOBRE NOSOTROS</h2>
                        <div class="divider">&nbsp;</div>
                        <div class="col-sm-5 content-left-sm" data-type="column">
                            <p class="home-mobile-section__text">eHunting Latam nace en 2014 como la primera firma en
                                América Latina dedicada exclusivamente al headhunting de profesionales para roles de
                                Transformación Digital.</p>

                            <p class="home-mobile-section__text">Fundada en 2014, eHunting Latam nace como la primera
                                firma especializada en selección y atracción de talentos para roles en Transformación
                                Digital. Nuestro propósito es impulsar la evolución digital en la región, facilitando la
                                conexión entre empresas y los profesionales más innovadores y disruptivos del mercado.
                            </p>

                            <p class="home-mobile-section__text">Más de una década de amplia experiencia nos posiciona
                                como partners estratégicos de importantes compañías a quienes apoyamos en sus desafíos
                                de innovación, transformación y excelencia operacional.</a></p>

                            <h2 class="subtitulo">Nuestros Origenes</h2>

                            <p class="home-mobile-section__text">eHunting Latam surgió como un spin-off de ejecutivos
                                digitales que lideraban comités de trabajo en asociaciones gremiales empresariales en
                                América Latina. Desde la primera década del año 2000, durante la gestión de nuestros
                                socios fundadores, se desarrollaron iniciativas de alcance regional tales como los Cyber
                                Monday, Cyber Day, eCommerce Day, entre otros, lo cual nos consolida como un actor
                                protagónico en la industria digital latinoamericana. Somos miembros activos de la <a
                                    href="http://en.apec-ecba.org/" target="_blank" title="Ir a la página"> APEC
                                    eCommerce Business Alliance</a> representando a la región en los principales foros
                                de economía digital.</p>

                            <h3>Apuesta por la especialización</h3>

                            <p class="home-mobile-section__text">Nos dedicamos exclusivamente al headhunting de
                                talentos IT & Digital para el sector empresarial en América Latina. Nuestra experiencia
                                y especialización nos permiten realizar una selección ágil, precisa y eficaz,
                                garantizando que los candidatos estén alineados con los objetivos estratégicos de la
                                empresa.</p>

                            <h3>Liderazgo y Diferenciación</h3>

                            <p class="home-mobile-section__text">Somos la firma de talento digital con más rápido
                                crecimiento en la región, nuestro ADN digital nos mantiene permanentemente actualizados
                                con las tendencias tecnológicas y profundamente conectados con el mercado laboral
                                digital.</p>

                            <h3>Metodología Ágil y Eficiente</h3>

                            <p class="home-mobile-section__text">Nuestra dinámica operacional descansa sobre
                                metodologías ágiles, herramientas tecnológicas y experiencia práctica, lo cual nos
                                permite abordar cada proceso de selección con alta precisión, desde la comprensión de
                                las necesidades del cliente hasta el onboarding de la persona contratada, pasando por
                                todo el ciclo de reclutamiento, selección y atracción de talento.</p>
                        </div>

                    </div>
                </div>
                <div class="col s12 home-mobile-section__about-image">
                    <img class="imagen lazy"
                        alt="Sobre Nosotros" title="Sobre Nosotros"
                        src="http://ehlatam.com/wp-content/uploads/2024/09/321-1.png">
                </div>
            </div>
            <div class="home-mobile-section__cta">
                <button data-target="contactanos" class="btn boton-conversemos modal-trigger home-mobile-section__cta-button">Conversemos</button>
            </div>
        </div>
    </div>

    <div class="nuestrosservicios"></div>
    <div class="comotrabajamos hide-on-med-and-up">
        <!-- MOBILE -->
        <div class="row container home-mobile-section__row">
            <div id="como-trabajamos" class="col s12 m12 l12 textojustificado">
                <div class="col s12">
                    <h2 class="subtitulo home-mobile-section__heading">¿CÓMO TRABAJAMOS?</h2>
                    <div class="divider">&nbsp;</div>
                    <div id="como-trabajamos" class="content-8 content-section content-section-spacing"
                        data-label="COMO TRABAJAMOS" data-id="content--3" data-export-id="content-8"
                        data-category="content">
                        <div class="gridContainer">

                            <div class="col-sm-6" data-type="column">
                                <p>Operamos con metodologías ágiles que nos permiten ejecutar con
                                    celeridad y
                                    eficacia a través de células de trabajo que se activan en cada proceso que
                                    iniciamos. Estas
                                    células están conformadas por profesionales multidisciplinarios cuya motivación es
                                    superar
                                    las expectativas del cliente.
                                </p>
                                <div class="home-mobile-section__work-icon-grid">
                                    <div class="home-mobile-section__work-item">
                                        <img src="https://www.ehlatam.com/wp-content/uploads/2024/09/servicio-de-calidad.png"
                                            title="Precisión y Calidad" alt="Precisión y Calidad" />
                                        <div>
                                            <h5>
                                                <strong>Precisión y Calidad</strong>
                                            </h5>
                                            <p class="home-mobile-section__work-item-copy">
                                                Nos enfocamos en asegurar un match preciso entre las competencias de los
                                                candidatos, la cultura organizacional de la empresa, y los
                                                requerimientos específicos y estratégicos del cargo.
                                            </p>

                                        </div>
                                    </div>
                                    <div class="home-mobile-section__work-item">
                                        <img src="https://www.ehlatam.com/wp-content/uploads/2024/09/conversacion.png"
                                            title="Redes de contacto" alt="Redes de contacto" />
                                        <div>
                                            <h5>
                                                <strong>Redes de Contacto</strong>
                                            </h5>
                                            <p class="home-mobile-section__work-item-copy">
                                                Gracias a nuestras redes de contacto nos posicionamos como un nexo entre
                                                los desafíos transformacionales de las empresas y el capital humano
                                                idóneo en cada proyecto.
                                            </p>

                                        </div>
                                    </div>
                                    <div class="home-mobile-section__work-item">
                                        <img src="https://www.ehlatam.com/wp-content/uploads/2024/09/grafico-de-cascada.png"
                                            title="Metodología" alt="Metodología" />
                                        <div>
                                            <h5>
                                                <strong>Metodología</strong>
                                            </h5>
                                            <p class="home-mobile-section__work-item-copy">
                                                Nuestro enfoque se basa en comprender la visión estratégica de la
                                                empresa, fortalezas, debilidades y desafíos. Nuestro rol es agregar
                                                valor disponibilizando talentos excepcionales.
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="home-mobile-section__micro-title">Assessment y validación del perfil</h2>
                                    <p>
                                        Realizamos un diagnóstico de las capacidades de la empresa y la situación actual
                                        del negocio. Eso nos da claridad para asesorar en la definición del rol y del
                                        perfil requerido.</p>
                                    <h3>Proceso de atracción y selección</h3>
                                    <ul class="home-mobile-section__list">
                                        <li>Reclutamiento</li>
                                        <li>Evaluación y Entrevistas</li>
                                        <li>Propuesta de Candidatos</li>
                                    </ul>
                                    <p>Nuestra metodología se complementa con herramientas tecnológicas avanzadas que
                                        potencian la precisión y eficiencia de nuestro proceso:</p>

                                    <ul class="home-mobile-section__list">
                                        <li>IA Tools</li>
                                        <li>Tests específicos</li>
                                        <li>People analytics</li>
                                        <li>Gamification</li>
                                        <li>Gestión SaaS</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Secci���0�3n Brochure -->
    <div class="banner-mobile hide-on-med-and-up">
        <img class="home-mobile-section__brochure" src="<?php echo get_template_directory_uri() ?>/images/banner_web_mobile.png" alt="Ir a Ventus"
            width="100%" title="Ir a Youtube">
    </div>
    <div class="clearfix"></div>

    <?php /** Sección Vacantes */

     print_seccion_vacantes(); 
     
     /** Fin de sección vacantes */
     
     ?>
    <?php ehunting_render_home_blog_section(); ?>
    <?php ehunting_render_home_team_section(get_the_ID()); ?>
    <?php ehunting_render_home_action_cards(false); ?>
    <div class="row container row-mapa ">

    </div>

</section>

<div id="contacto" class="lazy-background visible home-contact-section">

    <div class="row container">
        <div class="col s12 m12 l7">
            <p class="col s12 white-text center-align relative">CONTACTO</p>
            <form method="post" id="formulariocontacto2"
                action="<?php echo get_template_directory_uri() ?>/php/funciones/mensaje.php" novalidate=""
                data-redirect="/gracias">
                <div class="row white-text home-contact-section__form-row">
                    <div class="input-field col s12 m6 l6"><i class="material-icons prefix home-contact-section__icon">account_circle</i><br><input class="white-text" type="text"
                            name="tunombre" data-title="Nombre" value="" size="40" required><br><label class="">
                            Nombre</label> </div>
                    <div class="input-field col s12 m6 l6"><i class="material-icons prefix home-contact-section__icon">local_phone</i><br><input class="white-text" type="tel" name="tufono"
                            data-title="Teléfono" value="" size="40" required><br><label> Teléfono</label> </div>
                    <div class="input-field col s12 m6 l6"><i class="material-icons prefix home-contact-section__icon">email</i><br><input class="white-text" type="email" name="tumail"
                            data-title="Email" value="" size="40" required><br><label> Email</label> </div>
                    <div class="input-field col s12 m6 l6"><i class="material-icons prefix home-contact-section__icon">contacts</i><br><input class="white-text" type="text" name="tucargo"
                            data-title="Cargo" value="" size="40" required><br><label> Cargo</label> </div><input
                        class="white-text" type="hidden" name="token" value="">
                    <div class="input-field col s12 m6 l6"><i class="material-icons prefix home-contact-section__icon">message</i><br><textarea name="tumensaje" data-title="Mensaje"
                            cols="40" rows="10" class="white-text materialize-textarea home-contact-section__textarea" required></textarea><br><label>
                            Mensaje</label> </div>
                    <div class="input-field col s12 m6 l6 home-contact-section__submit"> <button type="submit"
                            name="submitcontacto" class="btn boton-form home-contact-section__submit-button"><i
                                class="material-icons right">send</i> Enviar</button> </div>
                </div>
            </form>
        </div>

    </div>
</div>

<?php get_footer(); ?>
