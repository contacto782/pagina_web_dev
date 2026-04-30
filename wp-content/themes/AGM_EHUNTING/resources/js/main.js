import { validarForm } from "./utils";
const x = window.matchMedia("(max-width: 600px)");
const contenido = {
  quehacemos:
    '<div id="quehacemos"></div><div class="row container" style="margin-top:10px"> <div id="que-hacemos" class="col s12 m12 l12 subtitulo" data-label="QUE HACEMOS" data-id="content--2" data-export-id="content-7" data-category="content"> <div class="col s12 m8 l8 textojustificado" data-type="column"> <h2 class="subtitulo" style="margin-top:25px">¿QUÉ HACEMOS?</h2> <div class="divider">&nbsp;</div><p class="" style="text-align: left;">Proveemos servicios de búsqueda y selección de Talentos Digitales para áreas de Comercio Electrónico, Transformación Digital, Innovación y Tecnologías.</p><p class="" style="text-align: left;">Nuestros consultores cuentan con más de 20 años de trayectoria laboral en el campo Digital lo cual nos permite lograr una rápida comprensión de la situación actual de la empresa, y de las necesidades puntuales del talento requerido.</p><p class="" style="text-align: left;">Nuestra fortaleza radica en proveer los mejores talentos digitales del mercado con una alta precisión y agilidad en la solución. Trabajamos con distintos sectores e industrias en latinoamérica apoyando sus procesos de transformación digital.</p><ul class="collection"> <li class="collection-item valign-wrapper" style=""> <i class="material-icons small left">data_usage</i> Retail / Consumo Masivo / Telecomunicaciones </li><li class="collection-item valign-wrapper" style=""> <i class="material-icons small left">data_usage</i> Servicios Financieros / Centros Comerciales / Transporte </li><li class="collection-item valign-wrapper" style=""> <i class="material-icons small left">data_usage</i> Automotriz / Salud / Otros </li></ul> </div></div><div class="col s12 m4 l4 valign-wrapper"><img class="imagen lazy mobile-que-hacemos" style="width:100%" src="https://ehunting.cl/wp-content/uploads/2019/07/cropped-39-1-1.jpg" alt="Que hacemos"> </div></div></div>',
  sobrenosotros:
    '<div id="sobrenosotros"></div><div class="row container"> <div id="sobre-nosotros" class="col s12 m12 l12 textojustificado"> <div class="col s12 m6 l6"> <div class="sol s12 m12 l12" style="max-width:513.33px;margin:0 auto;padding-top:10px"> <h2 class="subtitulo">SOBRE NOSOTROS</h2> <div class="divider">&nbsp;</div><div class="col-sm-5 content-left-sm" data-type="column"><p class="" style="text-align: left;">eHunting Latam nace en 2014 como la primera firma en América Latina dedicada exclusivamente al headhunting de profesionales para roles de Transformación Digital.</p><p class="" style="text-align: left;">Somos la firma de talento digital con más rápido crecimiento en la región conformada por un equipo multidisciplinario profundamente conectado con el mercado laboral digital, con servicios integrados de adquisición de talento y búsqueda de ejecutivos.</p><p class="" style="text-align: left;">Nuestro equipo directivo participó en instancias gremiales empresariales a nivel regional para impulsar el desarrollo de la economía digital, apoyando el nacimiento y consolidación de eventos tales como Cyber Monday, Cyber Day, eCommerce Day, Comités Digitales, entre otros. <a href="/ehunting-participa-en-summit-digital-apec-y-asume-la-direccion-adjunta-del-comite-apec-ecommerce-business-alliance/">Y somos miembros del “APEC eCommerce Business Alliance” en representación de la región.</a></p></div></div></div><div class="col s12 m6 l6 valign-wrapper"> <img class="imagen lazy" style="width:100%;height:auto" alt="Sobre Nosotros" src="https://ehunting.cl/wp-content/themes/AGM_EHUNTING/images/sobre-nosotros-imagen.png"></div></div></div>',
  //'nuestrosservicios': '<div id="nuestrosservicios"></div><div class="row" id="seccion-nuestrosservicios" style="padding:0;background-color:white"> <div class="container"> <div class="col s12 m12 l12"> <h2 class="center-align subtitulo" style="margin-top:10px!important">NUESTROS SERVICIOS</h2> <div class="divider" style="margin:0 auto;">&nbsp;</div><div class="textojustificado" style="max-width:1024px;margin:0 auto;"> <p class="lead" style="text-align: left;">Buscamos profesionales de diferentes sectores y áreas para satisfacer necesidades específicas en diferentes niveles de la organización. Nuestras redes de contacto y herramientas de reclutamiento nos permiten llegar a talentos altamente calificados.</p><p class="lead" style="text-align: left;">Evaluación de Candidatos: Nuestros profesionales están capacitados para realizar evaluaciones psicológicas, evaluaciones por competencias, entre otras, adecuándonos a los requerimientos del Cliente. Evaluamos antecedentes, historial y referencias laborales de los candidatos mediante revisión de información, entrevistas personales, evaluaciones psicológicas y otras herramientas técnicas.</p></div></div><div class="col s12 m12 l12 center-align" style="margin:0 auto"> <img class="imagen lazy" style="width:83%" alt="nuestros servicios" src="https://ehunting.cl/wp-content/uploads/2019/05/nuestrosservicios.jpg"> </div></div></div>',
  comotrabajamos:
    '<div id="comotrabajamos"></div><div class="row container" style="padding: 35px 0;padding-bottom: 5px;"> <div id="como-trabajamos" class="col s12 m12 l12 textojustificado"> <div class="col s12 m8 push-m4 l8 push-l4"> <h2 class="subtitulo" style="margin-top:5px">¿CÓMO TRABAJAMOS?</h2> <div class="divider">&nbsp;</div><div id="como-trabajamos" class="content-8 content-section content-section-spacing" data-label="COMO TRABAJAMOS" data-id="content--3" data-export-id="content-8" data-category="content"> <div class="gridContainer"> <div class="col-sm-6" data-type="column"> <p class="" style="">Operamos con metodologías ágiles a través de células de trabajo que se activan rápidamente para cada proceso encargado por nuestros clientes. Las células están conformadas por un equipo multidisciplinario comprometidos para ejecutar con excelencia los requerimientos y superar las expectativas de nuestros clientes.</p><p class="" style="">Nos centramos en asegurar con calidad y precisión, el match entre las competencias / habilidades de los candidatos, la cultura organizacional de la empresa y sus aspiraciones en relación al cargo.</p><p class="" style="">Nuestras redes de contacto multi industrias nos sitúan en el nexo entre la transformación digital y el capital humano que habilitan los cambios.</p><p class="" style="margin-bottom: 0;"><strong>NUESTRA METODOLOGÍA</strong></p><div class="ver-mas"><p>Nuestras metodologías evolucionan según las dinámicas empresariales, tendencias globales y avances tecnológicos.<a class="boton-ver-mas br-ver-mas" style="color:black;position: absolute;z-index: 5000;margin-left: 5px;">  <span style="color:#03468a;">Ver Más</span></a> <br class="br-ver-mas">Los mecanismos de selección consta de etapas que incluyen entrevistas personales para medir habilidades técnicas, habilidades blandas, evaluaciones específicas con business case según el rol, análisis predictivos del comportamiento, desempeño histórico, validaciones psicolaborales, entre otros recursos.</p><p class="" style="">Nos apoyamos en herramientas como <strong>Gamification</strong> para simular roles en un marco de observación interactiva y distendida, <strong>People Analytics</strong> para cruzar información de trayectoria laboral y desempeño de candidatos, <strong>Inteligencia Artificial & Big Data</strong> para para enriquecer el análisis de los perfiles, Test Psicológicos con profesionales de la ciencia del comportamiento apoyados por plataformas de software online para agilizar la evaluación y reporting de resultados, entre otras técnicas desarrolladas in house por nuestra firma.</p><p class="" style="">Las herramientas tecnológicas utilizadas complementan el <strong>expertise</strong> humano desarrollado por nuestros profesionales a través de años de experiencia ejecutando proyectos de búsqueda y selección de talentos detectando habilidades, liderazgos, capacidades cognitivas, pensamiento analítico, trabajo en equipos, competencias profesionales, entre otros factores claves en la evolución digital de la empresa.</p></div></div></div></div></div></div><div class="col s12 m4 pull-m8 l4 pull-l8" style="margin:15px auto"> <div class="col s12 "> <img class="imagen lazy comotrabajamos-mobile" src="/wp-content/uploads/2019/06/cropped-IMG_20190422_034652-1.jpg"> </div><div class="col s12 "></div></div></div></div>',
  equipo: `<div id="seccionequipo"></div>
  <div class="row container" style="padding:35px 0">
      <div id="equipo" class="col s12 m12 l12">
          <div class="col s12 m12 l12 tituloequipo">
              <h2 class="subtitulo">EQUIPO</h2>
              <div class="divider" style="margin-bottom:25px">&nbsp;</div>
              <p class="" style="text-align:left;font-size:1rem">Somos un equipo multidisciplinario conformado por
                  profesionales especializados en la industria digital profundamente conectados con la actividad
                  empresarial y poseen amplias redes de contacto en el mercado laboral digital.</p>
          </div>
          <div class="col s12 m6 l4 cartaequipo">
              <div class="card" style="max-height:333px;position:relative">
                  <div class="card-image waves-effect waves-block waves-light lazy visible"
                      style="height:300px;background-image:url(https://www.ehunting.cl/wp-content/uploads/2019/06/cropped-Foto-CV.jpg);background-repeat:no-repeat;background-size:cover">
                      <div class="activator"
                          style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background:#00000052">
                      </div><span style="width:320px;font-size:20px" class="card-title white-text activator">Aldo Myrick<i
                              class="material-icons right activator">more_vert</i></span>
                      <p class="white-text" style="margin:0;position:absolute;bottom:10px;left:20px;font-size:17px">
                          Director Ejecutivo</p>
                  </div>
                  <div class="card-reveal" style="padding:15px"><span class="card-title grey-text text-darken-4"
                          style="padding-bottom:10px!important;padding-left:2px!important">Aldo Myrick<i
                              class="material-icons right">close</i></span><a
                          href="https://www.linkedin.com/in/aldomyrick" class="linkedinequipo" target="_blank"
                          rel="noopener"><i><svg version="1.1" id="Layer_1" focusable="false"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" width="137px" height="135px" viewBox="281.5 3 137 135"
                                  enable-background="new 281.5 3 137 135" xml:space="preserve">
                                  <path fill="#FFFFFF"
                                      d="M403.625,8.938H296.347c-4.916,0-8.91,4.05-8.91,9.021v107.082c0,4.973,3.994,9.021,8.91,9.021h107.278c4.916,0,8.938-4.051,8.938-9.021V17.959C412.562,12.987,408.541,8.938,403.625,8.938z M325.254,116.188h-18.545V56.474h18.573v59.713H325.254z M315.981,48.318c-5.949,0-10.753-4.832-10.753-10.753s4.804-10.753,10.753-10.753c5.921,0,10.753,4.832,10.753,10.753C326.734,43.515,321.931,48.318,315.981,48.318z M394.771,116.188h-18.545V87.141c0-6.927-0.142-15.835-9.638-15.835c-9.663,0-11.144,7.541-11.144,15.333v29.549H336.9V56.474h17.792v8.156h0.252c2.485-4.692,8.547-9.636,17.567-9.636c18.769,0,22.261,12.373,22.261,28.46V116.188L394.771,116.188z">
                                  </path>
                              </svg></i></a><a href="mailto:aldo.myrick@ehunting.cl"><i
                              class="material-icons icono-social" style="vertical-align:sub">email</i></a>
                      <p style="text-align:justify">Ingeniero Civil Industrial y Diploma en Management en University of
                          Derby, UK. Gestor y Fundador del Comité de Comercio Electrónico (Chile), responsable del
                          desarrollo de iniciativas como CyberMonday, eCommerce Day, asesorando su difusión e
                          implementación en países vecinos. Representante institucional en instancias internacionales y
                          foros multilaterales (APEC, FEALAC, otros).</p>
                  </div>
              </div>
          </div>
          <div class="col s12 m6 l4 cartaequipo">
              <div class="card" style="max-height:333px;position:relative">
                  <div class="card-image waves-effect waves-block waves-light lazy visible"
                      style="height:300px;background-image:url(https://www.ehunting.cl/wp-content/uploads/2019/07/Jaime-Cifuentes.jpeg);background-repeat:no-repeat;background-size:cover">
                      <div class="activator"
                          style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background:#00000052">
                      </div><span style="width:320px;font-size:20px" class="card-title white-text activator">Jaime
                          Cifuentes<i class="material-icons right activator">more_vert</i></span>
                      <p class="white-text" style="margin:0;position:absolute;bottom:10px;left:20px;font-size:17px">
                          Consultor Asociado</p>
                  </div>
                  <div class="card-reveal" style="padding:15px"><span class="card-title grey-text text-darken-4"
                          style="padding-bottom:10px!important;padding-left:2px!important">Jaime Cifuentes<i
                              class="material-icons right">close</i></span><a
                          href="https://www.linkedin.com/in/jaime-eduardo-cifuentes-31394a39/" class="linkedinequipo"
                          target="_blank" rel="noopener"><i><svg version="1.1" id="Layer_1" focusable="false"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" width="137px" height="135px" viewBox="281.5 3 137 135"
                                  enable-background="new 281.5 3 137 135" xml:space="preserve">
                                  <path fill="#FFFFFF"
                                      d="M403.625,8.938H296.347c-4.916,0-8.91,4.05-8.91,9.021v107.082c0,4.973,3.994,9.021,8.91,9.021h107.278c4.916,0,8.938-4.051,8.938-9.021V17.959C412.562,12.987,408.541,8.938,403.625,8.938z M325.254,116.188h-18.545V56.474h18.573v59.713H325.254z M315.981,48.318c-5.949,0-10.753-4.832-10.753-10.753s4.804-10.753,10.753-10.753c5.921,0,10.753,4.832,10.753,10.753C326.734,43.515,321.931,48.318,315.981,48.318z M394.771,116.188h-18.545V87.141c0-6.927-0.142-15.835-9.638-15.835c-9.663,0-11.144,7.541-11.144,15.333v29.549H336.9V56.474h17.792v8.156h0.252c2.485-4.692,8.547-9.636,17.567-9.636c18.769,0,22.261,12.373,22.261,28.46V116.188L394.771,116.188z">
                                  </path>
                              </svg></i></a><a href="mailto:jaime.cifuentes@ehunting.cl"><i
                              class="material-icons icono-social" style="vertical-align:sub">email</i></a>
                      <p style="text-align:justify">Ingeniero en Finanzas y Diplomado en Gestión de Negocios. Socio en
                          empresas de capacitación de personal y de marketing digital. Participa en programas de
                          emprendimiento e innovación organizados por APEC en Taiwán y Centro de Capacitación
                          Internacional Golda Meir. Posee experiencia en asesoría a empresas, evaluación de proyectos.</p>
                  </div>
              </div>
          </div>
          <div class="col s12 m6 l4 cartaequipo">
              <div class="card" style="max-height:333px;position:relative">
                  <div class="card-image waves-effect waves-block waves-light lazy visible"
                      style="height:300px;background-image:url(https://www.ehunting.cl/wp-content/uploads/2019/07/Dania-Herrera.jpg);background-repeat:no-repeat;background-size:cover">
                      <div class="activator"
                          style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background:#00000052">
                      </div><span style="width:320px;font-size:20px" class="card-title white-text activator">Dania
                          Herrera<i class="material-icons right activator">more_vert</i></span>
                      <p class="white-text" style="margin:0;position:absolute;bottom:10px;left:20px;font-size:17px">
                          Consultor de Marketing</p>
                  </div>
                  <div class="card-reveal" style="padding:15px"><span class="card-title grey-text text-darken-4"
                          style="padding-bottom:10px!important;padding-left:2px!important">Dania Herrera<i
                              class="material-icons right">close</i></span><a
                          href="https://www.linkedin.com/in/dania-herrera-hidalgo-147038a6/" class="linkedinequipo"
                          target="_blank" rel="noopener"><i><svg version="1.1" id="Layer_1" focusable="false"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" width="137px" height="135px" viewBox="281.5 3 137 135"
                                  enable-background="new 281.5 3 137 135" xml:space="preserve">
                                  <path fill="#FFFFFF"
                                      d="M403.625,8.938H296.347c-4.916,0-8.91,4.05-8.91,9.021v107.082c0,4.973,3.994,9.021,8.91,9.021h107.278c4.916,0,8.938-4.051,8.938-9.021V17.959C412.562,12.987,408.541,8.938,403.625,8.938z M325.254,116.188h-18.545V56.474h18.573v59.713H325.254z M315.981,48.318c-5.949,0-10.753-4.832-10.753-10.753s4.804-10.753,10.753-10.753c5.921,0,10.753,4.832,10.753,10.753C326.734,43.515,321.931,48.318,315.981,48.318z M394.771,116.188h-18.545V87.141c0-6.927-0.142-15.835-9.638-15.835c-9.663,0-11.144,7.541-11.144,15.333v29.549H336.9V56.474h17.792v8.156h0.252c2.485-4.692,8.547-9.636,17.567-9.636c18.769,0,22.261,12.373,22.261,28.46V116.188L394.771,116.188z">
                                  </path>
                              </svg></i></a><a href="mailto:dania.herrera@ehunting.cl"><i
                              class="material-icons icono-social" style="vertical-align:sub">email</i></a>
                      <p style="text-align:justify">Ingeniería en Administración de empresas mención Marketing.
                          Experiencia en branding, publicidad, marketing estratégico, lanzamiento de nuevos productos y
                          comunicaciones internas en empresas de Servicios.</p>
                  </div>
              </div>
          </div>
          <div class="col s12 m6 l4 cartaequipo">
              <div class="card" style="max-height:333px;position:relative">
                  <div class="card-image waves-effect waves-block waves-light lazy visible"
                      style="height:300px;background-image:url(/wp-content/themes/AGM_EHUNTING/images/ingrids.jpg);background-repeat:no-repeat;background-size:cover">
                      <div class="activator"
                          style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background:#00000052">
                      </div><span style="width:320px;font-size:20px" class="card-title white-text activator">Ingrids
                          Porto<i class="material-icons right activator">more_vert</i></span>
                      <p class="white-text" style="margin:0;position:absolute;bottom:10px;left:20px;font-size:17px">
                          Consultor Junior LATAM</p>
                  </div>
                  <div class="card-reveal" style="padding:15px"><span class="card-title grey-text text-darken-4"
                          style="padding-bottom:10px!important;padding-left:2px!important">Ingrids Porto<i
                              class="material-icons right">close</i></span><a
                          href="https://co.linkedin.com/in/ingridsisabelportopadilla-seleccion/" class="linkedinequipo"
                          target="_blank" rel="noopener"><i><svg version="1.1" id="Layer_1" focusable="false"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" width="137px" height="135px" viewBox="281.5 3 137 135"
                                  enable-background="new 281.5 3 137 135" xml:space="preserve">
                                  <path fill="#FFFFFF"
                                      d="M403.625,8.938H296.347c-4.916,0-8.91,4.05-8.91,9.021v107.082c0,4.973,3.994,9.021,8.91,9.021h107.278c4.916,0,8.938-4.051,8.938-9.021V17.959C412.562,12.987,408.541,8.938,403.625,8.938z M325.254,116.188h-18.545V56.474h18.573v59.713H325.254z M315.981,48.318c-5.949,0-10.753-4.832-10.753-10.753s4.804-10.753,10.753-10.753c5.921,0,10.753,4.832,10.753,10.753C326.734,43.515,321.931,48.318,315.981,48.318z M394.771,116.188h-18.545V87.141c0-6.927-0.142-15.835-9.638-15.835c-9.663,0-11.144,7.541-11.144,15.333v29.549H336.9V56.474h17.792v8.156h0.252c2.485-4.692,8.547-9.636,17.567-9.636c18.769,0,22.261,12.373,22.261,28.46V116.188L394.771,116.188z">
                                  </path>
                              </svg></i></a><a href="mailto:ingrids.porto@ehlatam.com"><i
                              class="material-icons icono-social" style="vertical-align:sub">email</i></a>
                      <p style="text-align:justify">Psicóloga especializada en Carrer Success, Gestión del talento humano,
                          Técnicas para optimizar los procesos de selección del talento, nuevas tendencias y Effective
                          problem-solving and decision making. Amplia experiencia en Selección para compañías a nivel
                          Latam.</p>
                  </div>
              </div>
          </div>
          <div class="col s12 m6 l4 cartaequipo">
              <div class="card" style="max-height:333px;position:relative">
                  <div class="card-image waves-effect waves-block waves-light lazy visible"
                      style="height:300px;background-image:url(/wp-content/themes/AGM_EHUNTING/images/arantxa.jpg);background-repeat:no-repeat;background-size:cover">
                      <div class="activator"
                          style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background:#00000052">
                      </div><span style="width:320px;font-size:20px" class="card-title white-text activator">Arantxa
                          Martínez<i class="material-icons right activator">more_vert</i></span>
                      <p class="white-text" style="margin:0;position:absolute;bottom:10px;left:20px;font-size:17px">
                          Consultor Junior LATAM</p>
                  </div>
                  <div class="card-reveal" style="padding:15px"><span class="card-title grey-text text-darken-4"
                          style="padding-bottom:10px!important;padding-left:2px!important">Arantxa Martínez<i
                              class="material-icons right">close</i></span><a href="#" class="linkedinequipo"
                          target="_blank" rel="noopener"><i><svg version="1.1" id="Layer_1" focusable="false"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" width="137px" height="135px" viewBox="281.5 3 137 135"
                                  enable-background="new 281.5 3 137 135" xml:space="preserve">
                                  <path fill="#FFFFFF"
                                      d="M403.625,8.938H296.347c-4.916,0-8.91,4.05-8.91,9.021v107.082c0,4.973,3.994,9.021,8.91,9.021h107.278c4.916,0,8.938-4.051,8.938-9.021V17.959C412.562,12.987,408.541,8.938,403.625,8.938z M325.254,116.188h-18.545V56.474h18.573v59.713H325.254z M315.981,48.318c-5.949,0-10.753-4.832-10.753-10.753s4.804-10.753,10.753-10.753c5.921,0,10.753,4.832,10.753,10.753C326.734,43.515,321.931,48.318,315.981,48.318z M394.771,116.188h-18.545V87.141c0-6.927-0.142-15.835-9.638-15.835c-9.663,0-11.144,7.541-11.144,15.333v29.549H336.9V56.474h17.792v8.156h0.252c2.485-4.692,8.547-9.636,17.567-9.636c18.769,0,22.261,12.373,22.261,28.46V116.188L394.771,116.188z">
                                  </path>
                              </svg></i></a><a href="mailto:arantxa.martinez@ehlatam.com"><i
                              class="material-icons icono-social" style="vertical-align:sub">email</i></a>
                      <p style="text-align:justify">Psicóloga con especialización en psicología del trabajo y las
                          organizaciones, certificada en Psicodiagnóstico Laboral. Con experiencia en Desarrollo
                          Organizacional y Reclutamiento y Selección para compañías multinacionales.</p>
                  </div>
              </div>
          </div>
          <div class="col s12 m6 l4 cartaequipo">
              <div class="card" style="max-height:333px;position:relative">
                  <div class="card-image waves-effect waves-block waves-light lazy visible"
                      style="height:300px;background-image:url(/wp-content/themes/AGM_EHUNTING/images/jesus-rodriguez.jpeg);background-repeat:no-repeat;background-size:cover">
                      <div class="activator"
                          style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background:#00000052">
                      </div><span style="width:320px;font-size:20px" class="card-title white-text activator">Jesús
                          Rodríguez<i class="material-icons right activator">more_vert</i></span>
                      <p class="white-text" style="margin:0;position:absolute;bottom:10px;left:20px;font-size:17px">IT
                          Consultant - Full Stack</p>
                  </div>
                  <div class="card-reveal" style="padding:15px"><span class="card-title grey-text text-darken-4"
                          style="padding-bottom:10px!important;padding-left:2px!important">Jesús Rodríguez<i
                              class="material-icons right">close</i></span><a
                          href="https://www.linkedin.com/in/jesús-rafael-rodr%C3%ADguez-6b53ba143/" class="linkedinequipo"
                          target="_blank" rel="noopener"><i><svg version="1.1" id="Layer_1" focusable="false"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" width="137px" height="135px" viewBox="281.5 3 137 135"
                                  enable-background="new 281.5 3 137 135" xml:space="preserve">
                                  <path fill="#FFFFFF"
                                      d="M403.625,8.938H296.347c-4.916,0-8.91,4.05-8.91,9.021v107.082c0,4.973,3.994,9.021,8.91,9.021h107.278c4.916,0,8.938-4.051,8.938-9.021V17.959C412.562,12.987,408.541,8.938,403.625,8.938z M325.254,116.188h-18.545V56.474h18.573v59.713H325.254z M315.981,48.318c-5.949,0-10.753-4.832-10.753-10.753s4.804-10.753,10.753-10.753c5.921,0,10.753,4.832,10.753,10.753C326.734,43.515,321.931,48.318,315.981,48.318z M394.771,116.188h-18.545V87.141c0-6.927-0.142-15.835-9.638-15.835c-9.663,0-11.144,7.541-11.144,15.333v29.549H336.9V56.474h17.792v8.156h0.252c2.485-4.692,8.547-9.636,17.567-9.636c18.769,0,22.261,12.373,22.261,28.46V116.188L394.771,116.188z">
                                  </path>
                              </svg></i></a><a href="mailto:jesus.rodriguez@ehlatam.com"><i
                              class="material-icons icono-social" style="vertical-align:sub">email</i></a>
                      <p style="text-align:justify">Líder del área de tecnologías, servicios internos, desarrollo e
                          implementación. Cuenta con experiencia en Performance, Analytics, Front-end, SEM/SEO e
                          innovación tecnológica.</p>
                  </div>
              </div>
          </div>
          <div class="col s12 m6 l4 cartaequipo">
              <div class="card" style="max-height:333px;position:relative">
                  <div class="card-image waves-effect waves-block waves-light lazy visible"
                      style="height:300px;background-image:url(/wp-content/themes/AGM_EHUNTING/images/danae.jpeg);background-repeat:no-repeat;background-size:cover">
                      <div class="activator"
                          style="position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background:#00000052">
                      </div><span style="width:320px;font-size:20px" class="card-title white-text activator">Danae Villablanca<i class="material-icons right activator">more_vert</i></span>
                      <p class="white-text" style="margin:0;position:absolute;bottom:10px;left:20px;font-size:17px">Asistente de Atracción de Talento</p>
                  </div>
                  <div class="card-reveal" style="padding:15px"><span class="card-title grey-text text-darken-4"
                          style="padding-bottom:10px!important;padding-left:2px!important">Danae Villablanca<i
                              class="material-icons right">close</i></span><a
                          href="#" onclick="return false" class="linkedinequipo"
                          target="_blank" rel="noopener"><i><svg version="1.1" id="Layer_1" focusable="false"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" width="137px" height="135px" viewBox="281.5 3 137 135"
                                  enable-background="new 281.5 3 137 135" xml:space="preserve">
                                  <path fill="#FFFFFF"
                                      d="M403.625,8.938H296.347c-4.916,0-8.91,4.05-8.91,9.021v107.082c0,4.973,3.994,9.021,8.91,9.021h107.278c4.916,0,8.938-4.051,8.938-9.021V17.959C412.562,12.987,408.541,8.938,403.625,8.938z M325.254,116.188h-18.545V56.474h18.573v59.713H325.254z M315.981,48.318c-5.949,0-10.753-4.832-10.753-10.753s4.804-10.753,10.753-10.753c5.921,0,10.753,4.832,10.753,10.753C326.734,43.515,321.931,48.318,315.981,48.318z M394.771,116.188h-18.545V87.141c0-6.927-0.142-15.835-9.638-15.835c-9.663,0-11.144,7.541-11.144,15.333v29.549H336.9V56.474h17.792v8.156h0.252c2.485-4.692,8.547-9.636,17.567-9.636c18.769,0,22.261,12.373,22.261,28.46V116.188L394.771,116.188z">
                                  </path>
                              </svg></i></a><a href="mailto:danae.villablanca@ehlatam.com"><i
                              class="material-icons icono-social" style="vertical-align:sub">email</i></a>
                      <p style="text-align:justify">Psicóloga con experiencia en Reclutamiento y Selección de personal ejecutando procesos de principio a fin y en el área de Desarrollo Organizacional realizando diagnóstico e intervención.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>`,
  grid:
    '<div class="row contenedor-galeria"><div id="galeria-imagenes" class="col s12 m12 l12"><div class="col s12 m3 l3 left" style="padding:0"><div class="material-placeholder"><img class="materialboxed responsive-img" src="https://ehunting.cl/wp-content/uploads/2019/07/cropped-cbec2016_aldo_sm.jpg" src="https://ehunting.cl/wp-content/uploads/2019/07/cropped-cbec2016_aldo_sm.jpg"></div></div><div class="col s12 m3 l3 left" style="padding:0"><div class="material-placeholder"><img class="materialboxed responsive-img" src="https://ehunting.cl/wp-content/uploads/2019/07/20171228_160751_resized.jpg" src="https://ehunting.cl/wp-content/uploads/2019/07/20171228_160751_resized.jpg"></div></div><div class="col s12 m3 l3 left" style="padding:0"><div class="material-placeholder"><img class="materialboxed responsive-img" src="https://ehunting.cl/wp-content/uploads/2019/07/cropped-IMG_20190328_135653.jpg" src="https://ehunting.cl/wp-content/uploads/2019/07/cropped-IMG_20190328_135653.jpg"></div></div><div class="col s12 m3 l3 left" style="padding:0"><div class="material-placeholder"><img class="materialboxed responsive-img" src="https://ehunting.cl/wp-content/uploads/2019/07/20171228_160959_resized.jpg" src="https://ehunting.cl/wp-content/uploads/2019/07/20171228_160959_resized.jpg"></div></div><div class="col s12 m3 l3 right" style="padding:0"><div class="material-placeholder"><img class="materialboxed responsive-img" src="https://ehunting.cl/wp-content/uploads/2019/07/1-31.jpg" src="https://ehunting.cl/wp-content/uploads/2019/07/1-31.jpg"></div></div><div class="col s12 m3 l3 right" style="padding:0"><div class="material-placeholder"><img class="materialboxed responsive-img" src="https://ehunting.cl/wp-content/uploads/2019/07/1-4.jpg" src="https://ehunting.cl/wp-content/uploads/2019/07/1-4.jpg"></div></div><div class="col s12 m3 l3 right" style="padding:0"><div class="material-placeholder"><img class="materialboxed responsive-img" src="https://ehunting.cl/wp-content/uploads/2019/07/cropped-banner.jpg" src="https://ehunting.cl/wp-content/uploads/2019/07/cropped-banner.jpg"></div></div><div class="col s12 m3 l3 right" style="padding:0"><div class="material-placeholder"><img class="materialboxed responsive-img" src="https://ehunting.cl/wp-content/uploads/2019/07/5.jpg" src="https://ehunting.cl/wp-content/uploads/2019/07/5.jpg"></div></div></div></div>',
};
document.addEventListener("DOMContentLoaded", () => {
  //Sección cartas vacantes
  document
    .querySelectorAll(".seccion-vacantes .card-action .icon-arrow")
    .forEach(function(item) {
      const content = item.closest(".card-action").previousElementSibling;
      const contentInitialHeight = content.offsetHeight;
      content.style.height = "140px";
      //add a white overlay gradient to the section so it blends with the card add gradient as style not class
      const gradient = document.createElement("div");
      gradient.style.cssText =
        "position: absolute; bottom: 0; background-image: linear-gradient(rgba(255,255,255,0), white); height: 100px; width: 100%; ";
      content.appendChild(gradient);

      item.addEventListener("click", function() {
        if (content.offsetHeight === 140) {
          content.style.height = contentInitialHeight + "px";
          item.innerHTML = "keyboard_arrow_up";
          // remove the gradient overlay when expanded
          gradient.remove();
        } else {
          content.style.height = "140px";
          item.innerHTML = "keyboard_arrow_down";
          // add the gradient overlay when collapsed
          content.appendChild(gradient);
        }
      });
    });

  //stricky header
  let header = document.querySelector(".headerSticky");
  let sticky = header.offsetTop;
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  });

  //Cerrar Sidenav Onclick
  Array.from(document.querySelectorAll(".sidenav li a")).forEach((e) => {
    e.addEventListener("click", (ev) => {
      M.Sidenav.getInstance(ev.target.closest(".sidenav")).close();
    });
  });

  function addElementsJs() {
    if (x.matches) {
      Object.keys(contenido).forEach((e) => {
        if (e !== undefined && document.querySelector("." + e) !== null) {
          document.querySelector("." + e).innerHTML = contenido[e];
        }
      });
      if (document.querySelector(".boton-ver-mas") !== null) {
        document
          .querySelector(".boton-ver-mas")
          .addEventListener("click", () => {
            if (document.querySelector(".ver-mas").style.height === "auto") {
              document.querySelector(".ver-mas").removeAttribute("style");
            } else {
              document
                .querySelector(".ver-mas")
                .setAttribute("style", "height: auto");
              [...document.querySelectorAll(".br-ver-mas")].forEach(
                (element) => {
                  element.classList.add("hidden-element");
                }
              );
            }
          });
      }
    }
  }

  function removeElementsJs() {
    if (!x.matches) {
      Object.keys(contenido).forEach((e) => {
        if (e !== undefined && document.querySelector("." + e) !== null) {
          document.querySelector("." + e).innerHTML = "";
        }
      });
    }
  }
  //Pega el contenido en movil de forma dinamica
  window.addEventListener("resize", addElementsJs);
  window.addEventListener("resize", removeElementsJs);
  addElementsJs();

  /**
   * Listener para validar los formularios por js
   */
  Array.from(document.forms).forEach((e) => {
    let appended = false;
    Array.from(e.elements).forEach((el) => {
      el.addEventListener("focus", (ev) => {
        if (!appended) {
          let script = document.createElement("script");
          script.type = "text/javascript";
          script.src =
            "https://www.google.com/recaptcha/api.js?render=6LdHZasUAAAAAPsiy2VAraJaIJvwBTx3VlSnUm7-";
          document.body.appendChild(script);
          appended = true;
          if (appended) {
            setTimeout(() => {
              grecaptcha.ready(function() {
                grecaptcha
                  .execute("6LdHZasUAAAAAPsiy2VAraJaIJvwBTx3VlSnUm7-")
                  .then(function(token) {
                    ev.target.form["token"].value = token;
                  });
              });
            }, 1000);
          }
        }
      });
    });
    e.addEventListener("submit", (e) => {
      if (!validarForm(e.target)) {
        e.preventDefault();
      }
    });
  });
  //Api de Youtube
  if (document.querySelector(".carousel-videos") !== null) {
    let YTU = setInterval(() => {
      if (
        document.querySelector(".carousel-videos").dataset.exists !== undefined
      ) {
        clearInterval(YTU);

        window.YT.ready(() => {
          let player;
          let i;
          videos.forEach((e, index) => {
            i = document.createElement("a");
            i.className = "carousel-item carrusel-de-video";
            i.innerHTML =
              '<figure class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio figura-carousel-videos" style="height:135px;overflow:hidden;position:relative"><div class="capa hide-on-large-only capa' +
              index +
              '"></div><div height="135" class="yout" id="player' +
              index +
              '" width="200" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen="allowfullscreen"></div></figure> <div class="video-desc" style="height:150px;background:white">' +
              e.content +
              "</div>";
            if (document.querySelector(".carousel-videos") !== null) {
              document.querySelector(".carousel-videos").appendChild(i);
            }

            if (index + 1 === videos.length) {
              let miniatura = document.createElement("a");
              miniatura.setAttribute(
                "href",
                "https://www.youtube.com/channel/UCVJU7QkdpWP1XryAPo_dP0A"
              );
              miniatura.setAttribute("target", "_blank");
              miniatura.setAttribute("rel", "noopener noreferer nofollow");
              miniatura.className = "carousel-item carrusel-de-video";
              miniatura.innerHTML =
                '<figure class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio figura-carousel-videos" style="height:135px;overflow:hidden;position:relative"><img src="/wp-content/themes/AGM_EHUNTING/images/miniatura_carrusel.jpg" width="100%"></figure><div class="video-desc" style="height:150px;background:white;text-align:center"><p><strong>Ver más<br> entrevistas</strong></p><p>Ingresa a nuestro canal de youtube y accede a todas las entrevistas</p></div>';
              if (document.querySelector(".carousel-videos") !== null) {
                document
                  .querySelector(".carousel-videos")
                  .appendChild(miniatura);
              }
            }
          });
          M.Carousel.init(document.querySelector(".carousel-videos"), {
            indicators: 0,
            dist: 0,
            padding: 10,
            shift: 0,
          });

          var e = document.querySelector(".carousel-videos"),
            t = M.Carousel.getInstance(e);
          t.next(),
            document
              .querySelector(".flechaderecha")
              .addEventListener("click", function() {
                t.next();
              }),
            document
              .querySelector(".flechaizquierda")
              .addEventListener("click", function() {
                t.prev();
              });
          Array.from(document.querySelectorAll(".yout")).forEach((e, index) => {
            player = new YT.Player(e.id, {
              height: "135",
              width: "200",
              videoId: videos[index].url,
              events: {
                onReady: (event) => {
                  document
                    .querySelector(".capa" + index)
                    .addEventListener("click", (ev) => {
                      console.log("clicked");
                      ev.target.style.display = "none";
                      event.target.playVideo();
                    });
                },
                onStateChange: (event) => {
                  if (event.data === YT.PlayerState.PLAYING) {
                    document.querySelector(".capa" + index).style.display =
                      "none";
                  } else if (event.data === YT.PlayerState.PAUSED) {
                    document.querySelector(".capa" + index).style.display =
                      "block";
                  } else if (event.data === YT.PlayerState.ENDED) {
                    event.target.pauseVideo();
                    event.target.seekTo(0);
                  }
                },
              },
            });
          });
        });
      }
    }, 500);
  }
  /* window.setTimeout(()=>{
       let yout = document.createElement('script');
       let twit = document.createElement('script');
       yout.src = 'https://www.youtube.com/iframe_api';
       twit.src = '';
       document.body.appendChild(twit);
       document.body.appendChild(yout);
       if(document.querySelector('.contenedor-widget') !== null){
           document.querySelector('.contenedor-widget').innerHTML = '<div class="widget-twitter-header white-text"><i class="fab fa-twitter-square icono-social"></i>eHunting LATAM</div><a class="twitter-timeline lazy" data-lang="es" data-width="300" data-height="305" data-theme="light" href="https://twitter.com/eHuntingLatam?ref_src=twsrc%5Etfw">Tweets by eHuntingLatam</a>'
       }
     },2000)*/
});

document.addEventListener("DOMContentLoaded", function() {
  var movil = window.matchMedia("(max-width: 600px)");
  if (
    (!movil.matches && document.querySelector(".wp-image-1674") != null) ||
    (!movil.matches && document.querySelector(".wp-image-666") != null)
  ) {
    document.querySelector(".brand-logo").setAttribute("style", "display:none");
  }
  window.addEventListener("resize", function() {
    if (
      (!movil.matches && document.querySelector(".wp-image-1674") != null) ||
      (!movil.matches && document.querySelector(".wp-image-666") != null)
    ) {
      document
        .querySelector(".brand-logo")
        .setAttribute("style", "display:none");
    } else if (movil.matches) {
      document
        .querySelector(".brand-logo")
        .setAttribute("style", "display:inline-block");
    }
  });
});

/*document.addEventListener('DOMContentLoaded', function () {
    window.setTimeout(() => {
        let i;
        videos.forEach(e => {
            i = document.createElement('a');
            i.className = 'carousel-item carrusel-de-video';
            i.innerHTML = '<figure class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio figura-carousel-videos" style="height:135px;overflow:hidden"><iframe height="135" class="lazy" id="player0" width="200" src="' + e.url + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen="allowfullscreen"></iframe></figure> <div class="video-desc" style="height:150px;background:white">' + e.content + '</div>';
            if (document.querySelector('.carousel-videos') !== null) {
                document.querySelector('.carousel-videos').appendChild(i);
            };
        })
        M.Carousel.init(document.querySelector(".carousel-videos"), {
            indicators: 0,
            dist: 0,
            padding: 10,
            shift: 0

        })
        var e = document.querySelector(".carousel-videos"),
            t = M.Carousel.getInstance(e);
        t.next(), document.querySelector(".flechaderecha").addEventListener("click", function () {
            t.next()
        }), document.querySelector(".flechaizquierda").addEventListener("click", function () {
            t.prev()
        })
    }, 2000)
})*/
