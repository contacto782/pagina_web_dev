<?php

function ehunting_theme_asset($path) {
    return trailingslashit(get_template_directory_uri()) . ltrim($path, '/');
}

function ehunting_social_links() {
    return array(
        array(
            'href' => 'https://www.facebook.com/eHuntingLATAM',
            'title' => 'Facebook',
            'asset' => 'images/facebook.svg',
            'alt' => 'Logo Facebook',
            'width' => 25,
            'height' => 25,
        ),
        array(
            'href' => 'https://x.com/eHuntinglatam',
            'title' => 'X',
            'src' => 'https://ehlatam.com/wp-content/uploads/2024/09/icono-x.png',
            'alt' => 'Logo X',
            'width' => 25,
            'height' => 25,
        ),
        array(
            'href' => 'https://www.instagram.com/ehunting.latam/',
            'title' => 'Instagram',
            'asset' => 'images/instagram.svg',
            'alt' => 'Logo Instagram',
            'width' => 25,
            'height' => 25,
        ),
        array(
            'href' => 'https://www.linkedin.com/company/ehunting-latam/posts/?feedView=all',
            'title' => 'LinkedIn',
            'asset' => 'images/linkedin.svg',
            'alt' => 'Logo Linkedin',
            'width' => 25,
            'height' => 25,
        ),
        array(
            'href' => 'https://www.youtube.com/channel/UCVJU7QkdpWP1XryAPo_dP0A',
            'title' => 'YouTube',
            'asset' => 'images/video.svg',
            'alt' => 'Logo Youtube',
            'width' => 28,
        ),
        array(
            'href' => 'mailto:contacto@ehlatam.com',
            'title' => 'Correo',
            'asset' => 'images/mail.svg',
            'alt' => 'Logo email',
            'width' => 28,
        ),
    );
}

function ehunting_header_flags() {
    return array(
        array('title' => 'Brasil', 'alt' => 'Brasil', 'asset' => 'images/bandera-brasil.jpg', 'width' => 30),
        array('title' => 'Ecuador', 'alt' => 'Ecuador', 'asset' => 'images/ECUADOR.jpg', 'width' => 30),
        array('title' => 'México', 'alt' => 'Mexico', 'asset' => 'images/MEXICO.png', 'width' => 30),
        array('title' => 'Argentina', 'alt' => 'Argentina', 'asset' => 'images/ARGENTINA.png', 'width' => 30),
        array('title' => 'Perú', 'alt' => 'Peru', 'asset' => 'images/PERU3.png', 'width' => 30),
        array('title' => 'Colombia', 'alt' => 'Colombia', 'asset' => 'images/COLOMBIA.png', 'width' => 30),
        array('title' => 'Chile', 'alt' => 'Chile', 'asset' => 'images/CHILE.png', 'width' => 30),
    );
}

function ehunting_is_home_hero_template() {
    return is_page_template(array(
        'inicio.php',
        'inicio-nuevo.php',
    ));
}

function ehunting_is_section_header_template() {
    $request_path = isset($_SERVER['REQUEST_URI']) ? trim((string) wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '';

    if ('nuestros-servicios' === $request_path) {
        return true;
    }

    return is_page_template(array(
        'templates/sobre-nosotros.php',
        'templates/equipo.php',
        'templates/nuestros-servicios.php',
        'templates/que-hacemos.php',
        'templates/como-trabajamos.php',
        'trabajos.php',
        'contacto.php',
        'noticias.php',
    ));
}

function ehunting_section_header_body_class($classes) {
    if (ehunting_is_section_header_template()) {
        $classes[] = 'ehunting-section-header';
    }

    return $classes;
}
add_filter('body_class', 'ehunting_section_header_body_class');

function ehunting_redirect_services_menu_item($items, $args) {
    if (empty($args->theme_location) || !in_array($args->theme_location, array('Primary', 'Primary1'), true)) {
        return $items;
    }

    foreach ($items as $item) {
        $title = sanitize_title($item->title);

        if ('servicios' === $title) {
            $item->url = home_url('/nuestros-servicios/');
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'ehunting_redirect_services_menu_item', 8, 2);

function ehunting_render_virtual_services_page() {
    $request_path = isset($_SERVER['REQUEST_URI']) ? trim((string) wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '';

    if ('nuestros-servicios' !== $request_path) {
        return;
    }

    status_header(200);
    include get_template_directory() . '/templates/nuestros-servicios.php';
    exit;
}
add_action('template_redirect', 'ehunting_render_virtual_services_page', 0);

function ehunting_filter_home_header_menu_items($items, $args) {
    if (empty($args->theme_location) || 'Primary' !== $args->theme_location || !ehunting_is_home_hero_template()) {
        return $items;
    }

    foreach ($items as $index => $item) {
        $title = sanitize_title($item->title);
        $url = isset($item->url) ? untrailingslashit((string) $item->url) : '';
        $path = $url ? wp_parse_url($url, PHP_URL_PATH) : '';
        $path = $path ? untrailingslashit((string) $path) : '';

        if (
            'blog' === $title ||
            false !== strpos($title, 'blog') ||
            '/blog' === $path ||
            str_ends_with($url, '/blog')
        ) {
            unset($items[$index]);
        }
    }

    return array_values($items);
}
add_filter('wp_nav_menu_objects', 'ehunting_filter_home_header_menu_items', 10, 2);

function ehunting_filter_home_header_menu_html($items, $args) {
    if (empty($args->theme_location) || 'Primary' !== $args->theme_location || !ehunting_is_home_hero_template()) {
        return $items;
    }

    $patterns = array(
        '#<li[^>]*>.*?<a[^>]+href="[^"]*/blog/?[^"]*"[^>]*>.*?</a>.*?</li>#is',
        '#<li[^>]*>.*?<a[^>]*>\s*Blog\s*</a>.*?</li>#is',
    );

    return preg_replace($patterns, '', $items);
}
add_filter('wp_nav_menu_items', 'ehunting_filter_home_header_menu_html', 10, 2);

function ehunting_filter_section_header_menu_html($items, $args) {
    if (empty($args->theme_location) || 'Primary' !== $args->theme_location || !ehunting_is_section_header_template()) {
        return $items;
    }

    $labels = array(
        '>QUIENES SOMOS<' => '>Quienes somos<',
        '>SERVICIOS<' => '>Servicios<',
        '>VACANTES<' => '>Vacantes<',
        '>BLOG<' => '>Blog<',
        '>CONTACTO<' => '>Contacto<',
    );

    $items = str_replace(array_keys($labels), array_values($labels), $items);
    $items = preg_replace(array(
        '#<li[^>]*>\s*<a[^>]+href="[^"]*/contacto/?[^"]*"[^>]*>Contacto</a>\s*</li>#is',
        '#<li[^>]*>\s*<a[^>]+href="[^"]*/blog/?[^"]*"[^>]*>Blog</a>\s*</li>#is',
        '#<li[^>]*>\s*<a[^>]*>\s*Blog\s*</a>\s*</li>#is',
    ), '', $items);

    if (false === strpos($items, 'Casos de Éxito')) {
        $success_item = '<li id="nav-menu-item-success-cases" class="main-menu-item menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom"><a href="/#casos-exito">Casos de Éxito</a></li>';
        $items = preg_replace('#(<li[^>]*>\s*<a[^>]+href="[^"]*/trabajos/?[^"]*"[^>]*>Vacantes</a>\s*</li>)#is', '$1' . $success_item, $items, 1);

        if (false === strpos($items, 'Casos de Éxito')) {
            $items .= $success_item;
        }
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'ehunting_filter_section_header_menu_html', 11, 2);

function ehunting_header_menu_items_map() {
    return array(
        array(
            'label' => 'Home',
            'url'   => home_url('/'),
            'match' => array(''),
        ),
        array(
            'label' => 'Quienes somos',
            'url'   => home_url('/sobre-nosotros/'),
            'match' => array('sobre-nosotros'),
        ),
        array(
            'label' => 'Servicios',
            'url'   => home_url('/nuestros-servicios/'),
            'match' => array('nuestros-servicios'),
        ),
        array(
            'label' => 'Vacantes',
            'url'   => home_url('/trabajos/'),
            'match' => array('trabajos'),
        ),
        array(
            'label' => 'Casos de Éxito',
            'url'   => home_url('/#casos-exito'),
            'match' => array('#casos-exito'),
        ),
        array(
            'label' => 'Blog',
            'url'   => home_url('/blog/'),
            'match' => array('blog'),
        ),
    );
}

function ehunting_render_forced_header_menu($items, $args) {
    if (empty($args->theme_location) || !in_array($args->theme_location, array('Primary', 'Primary1'), true)) {
        return $items;
    }

    if (!ehunting_is_home_hero_template() && !ehunting_is_section_header_template()) {
        return $items;
    }

    $request_path = isset($_SERVER['REQUEST_URI']) ? trim((string) wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '';
    $menu_items = ehunting_header_menu_items_map();
    $html = '';

    foreach ($menu_items as $index => $menu_item) {
        $classes = array(
            'main-menu-item',
            0 === $index % 2 ? 'menu-item-even' : 'menu-item-odd',
            'menu-item-depth-0',
            'menu-item',
            'menu-item-type-custom',
            'menu-item-object-custom',
        );

        foreach ($menu_item['match'] as $match) {
            if ($match === $request_path) {
                $classes[] = 'current-menu-item';
                break;
            }
        }

        $html .= sprintf(
            '<li class="%1$s"><a href="%2$s">%3$s</a></li>',
            esc_attr(implode(' ', array_unique($classes))),
            esc_url($menu_item['url']),
            esc_html($menu_item['label'])
        );
    }

    return $html;
}
add_filter('wp_nav_menu_items', 'ehunting_render_forced_header_menu', 20, 2);

function ehunting_footer_offices() {
    return array(
        array(
            'title' => 'Oficina en Santiago, Chile',
            'alt' => 'Chile',
            'asset' => 'images/CHILE.png',
            'width' => 40,
            'text' => "El Trovador 4280\nLas Condes. Santiago",
            'image_style' => 'margin:0 0 0 auto;display:block;padding-top:15px',
            'text_style' => 'font-size:13px',
        ),
        array(
            'title' => 'Oficina en Bogotá, Colombia',
            'alt' => 'Colombia',
            'asset' => 'images/COLOMBIA.png',
            'width' => 40,
            'text' => "Carrera 7b Bis 126 - 36\nUsaquén. Bogotá",
            'image_style' => 'margin:0 0 0 auto;display:block;padding-top:15px',
            'text_style' => 'font-size:13px',
        ),
        array(
            'title' => 'Oficina en Lima, Perú',
            'alt' => 'Perú',
            'asset' => 'images/PERU3.png',
            'width' => 40,
            'text' => "Av. José Pardo N° 223 Piso 10.\nMiraflores. Lima",
            'image_style' => 'margin:0 0 0 auto;display:block;padding-top:15px;height:41.61px',
            'text_style' => 'font-size:13px',
        ),
    );
}

function ehunting_home_clients() {
    return array(
        array('name' => 'VTR', 'url' => 'https://vtr.com/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/vtr-logo.png'),
        array('name' => 'Subaru', 'url' => 'https://www.subaru.com/index.html', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/Subaru-logo.png'),
        array('name' => 'Nestle', 'url' => 'https://www.nestle.com/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/Nestle-logo.png'),
        array('name' => 'MRM', 'url' => 'https://www.mrm.com/en/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/MRM-logo.png'),
        array('name' => 'Mccann', 'url' => 'https://www.mccann.com/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/McCANN-logo.png'),
        array('name' => 'Liberty Latin America', 'url' => 'https://lla.com/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/liberty-logo.png'),
        array('name' => 'Jumbo', 'url' => 'https://www.jumbo.cl/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/Jumbo-logo.png'),
        array('name' => 'Indumotora', 'url' => 'https://www.indumotora.cl/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/Indumotora-logo.png'),
        array('name' => 'Femsa Salud', 'url' => 'https://www.femsa.com/es/unidades-de-negocio/proximidad-y-salud/femsa-salud/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/FEMSA-logo.png'),
        array('name' => 'Entel', 'url' => 'https://www.entel.cl/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/entel-logo.png'),
        array('name' => 'Cruz Verde', 'url' => 'https://club.cruzverde.cl/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/Cruz-verde-logo.png'),
        array('name' => 'Colgate', 'url' => 'https://www.colgate.com/en-us', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/colgate-logo.png'),
        array('name' => 'Betterfly', 'url' => 'https://betterfly.com/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/Betterffly-logo.png'),
        array('name' => 'Banco Ripley', 'url' => 'https://www.bancoripley.cl/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/Banco-Ripleylogo.png'),
        array('name' => 'Ashley HomeStore', 'url' => 'https://www.ashleyfurniture.com/', 'image' => 'http://ehlatam.com/wp-content/uploads/2026/04/ashley-Homestore-logo.png'),
    );
}

function ehunting_contact_offices() {
    return array(
        array(
            'flag' => '🇨🇱',
            'name' => 'Chile',
            'image' => ehunting_theme_asset('images/chile-ci.jpeg'),
            'aria_label' => 'Oficina eHunting en Santiago de Chile',
            'address' => array('street' => 'El Trovador 4280', 'locality' => 'Las Condes. Santiago'),
            'telephone' => '+56953867098',
            'action' => array(
                'type' => 'whatsapp',
                'href' => 'https://wa.me/56953867098?text=Hola,%20me%20gustaría%20obtener%20más%20información%20sobre%20eHunting%20en%20Chile',
                'label' => '+56 953 867 098',
                'title' => 'WhatsApp eHunting Chile',
                'alt' => 'Contactar por WhatsApp a eHunting Chile',
            ),
        ),
        array(
            'flag' => '🇨🇴',
            'name' => 'Colombia',
            'image' => ehunting_theme_asset('images/colombia-ci.jpg'),
            'aria_label' => 'Oficina eHunting en Bogotá, Colombia',
            'address' => array('street' => 'Carrera 7b Bis 126 - 36', 'locality' => 'Usaquén. Bogotá'),
            'telephone' => '+573016651119',
            'action' => array(
                'type' => 'whatsapp',
                'href' => 'https://wa.me/573016651119?text=Hola,%20me%20gustaría%20obtener%20más%20información%20sobre%20eHunting%20en%20Colombia',
                'label' => '+57 301 665 1119',
                'title' => 'WhatsApp eHunting Colombia',
                'alt' => 'Contactar por WhatsApp a eHunting Colombia',
            ),
        ),
        array(
            'flag' => '🇵🇪',
            'name' => 'Perú',
            'image' => ehunting_theme_asset('images/peru-ci.jpg'),
            'aria_label' => 'Oficina eHunting en Lima, Perú',
            'address' => array('street' => 'Av. José Pardo N° 223 Piso 10', 'locality' => 'Miraflores. Lima'),
            'telephone' => '+51973119964',
            'action' => array(
                'type' => 'whatsapp',
                'href' => 'https://wa.me/51973119964?text=Hola,%20me%20gustaría%20obtener%20más%20información%20sobre%20eHunting%20en%20Perú',
                'label' => '+51 973 119 964',
                'title' => 'WhatsApp eHunting Perú',
                'alt' => 'Contactar por WhatsApp a eHunting Perú',
            ),
        ),
        array(
            'flag' => '🇦🇷',
            'name' => 'Argentina',
            'image' => ehunting_theme_asset('images/argentina-ci.jpg'),
            'aria_label' => 'Oficina eHunting en Buenos Aires, Argentina',
            'address' => array('locality' => 'Buenos Aires'),
            'action' => array(
                'type' => 'modal',
                'href' => '#contactanos',
                'label' => 'Contáctanos',
                'title' => 'WhatsApp eHunting Argentina',
                'alt' => 'Contactar por WhatsApp a eHunting Argentina',
            ),
        ),
        array(
            'flag' => '🇲🇽',
            'name' => 'México',
            'image' => ehunting_theme_asset('images/mexico-ci.jpg'),
            'aria_label' => 'Oficina eHunting en Ciudad de México',
            'address' => array('locality' => 'Ciudad de México'),
            'action' => array(
                'type' => 'modal',
                'href' => '#contactanos',
                'label' => 'Contáctanos',
                'title' => 'WhatsApp eHunting México',
                'alt' => 'Contactar por WhatsApp a eHunting México',
            ),
        ),
        array(
            'flag' => '🇪🇨',
            'name' => 'Ecuador',
            'image' => ehunting_theme_asset('images/ecuador-ci.jpg'),
            'aria_label' => 'Oficina eHunting en Quito, Ecuador',
            'address' => array('locality' => 'Quito'),
            'action' => array(
                'type' => 'modal',
                'href' => '#contactanos',
                'label' => 'Contáctanos',
                'title' => 'WhatsApp eHunting Ecuador',
                'alt' => 'Contactar por WhatsApp a eHunting Ecuador',
            ),
        ),
        array(
            'flag' => '🇺🇸',
            'name' => 'Estados Unidos',
            'image' => 'https://www.ehlatam.com/wp-content/uploads/2025/10/Estados-Unidos.webp',
            'aria_label' => 'Oficina eHunting en Miami, Estados Unidos',
            'address' => array('locality' => 'Miami', 'region' => 'Florida'),
            'telephone' => '+13054034561',
            'action' => array(
                'type' => 'phone',
                'href' => 'tel:+13054034561',
                'label' => '+1 (305) 403-4561',
                'title' => 'Teléfono eHunting USA',
                'alt' => 'Llamar a eHunting Estados Unidos',
                'icon' => 'http://ehlatam.com/wp-content/uploads/2024/12/phone.jpeg',
            ),
        ),
    );
}

function ehunting_default_home_team_members() {
    return array(
        array(
            'name' => 'Aldo Myrick',
            'role' => 'Director Ejecutivo',
            'image' => 'https://www.ehlatam.com/wp-content/uploads/2024/09/Aldo.webp',
            'linkedin' => 'https://www.linkedin.com/in/aldomyrick',
            'email' => 'aldo.myrick@ehunting.cl',
            'bio' => 'Ingeniero Civil Industrial, Diploma en Management de la University of Derby, Reino Unido, apasionado por la innovación y transformación digital. Co-founder del Comité de Comercio Electrónico de Chile, pilar en la creación de iniciativas que han transformado la industria digital en América Latina tales como Cyber Monday y eCommerce Day. Consultor de empresas en procesos de transformación digital, participación en APEC, ONU y FEALAC.',
        ),
        array(
            'name' => 'Jaime Cifuentes',
            'role' => 'Business Manager',
            'image' => 'https://www.ehlatam.com/wp-content/uploads/2024/09/Jaime-Cifuentes.webp',
            'linkedin' => 'https://www.linkedin.com/in/jaime-eduardo-cifuentes-31394a39/',
            'email' => 'jaime.cifuentes@ehunting.cl',
            'bio' => 'Ingeniero en Finanzas, Diplomado en Gestión de Negocios. Socio en empresas de consultoría en capacitación y de marketing digital. Participó en programas de emprendimiento e innovación organizados por APEC en Taiwán y Centro de Capacitación Internacional Golda Meir, Israel. Amplia experiencia en asesoría a empresas, evaluación de proyectos, eficiencia operacional.',
        ),
        array(
            'name' => 'Lauren Ramírez',
            'role' => 'Junior Consultant',
            'image' => 'https://ehlatam.com/wp-content/uploads/2024/09/Diseno-sin-titulo-2.png',
            'linkedin' => 'https://www.linkedin.com/in/lauren-ram%C3%ADrez-g%C3%B3mez-273788252/',
            'email' => 'lauren.ramirez@ehlatam.com',
            'bio' => 'Psicóloga especializada en selección de talentos digitales y gestión del capital humano, con énfasis en process automatization y herramientas de IA aplicadas a la selección. Cuenta con experiencia en proyectos de talent acquisition y transformación digital para grandes organizaciones en la región latinoamericana.',
        ),
        array(
            'name' => 'Ingrids Porto',
            'role' => 'Senior Consultant',
            'image' => 'https://ehlatam.com/wp-content/uploads/2024/09/Diseno-sin-titulo-1.png',
            'linkedin' => 'https://co.linkedin.com/in/ingridsisabelportopadilla-seleccion/',
            'email' => 'ingrids.porto@ehlatam.com',
            'bio' => 'Psicóloga especializada en Carrer Success, certificada en IA generativa para ejecutivos y líderes empresariales, IT Recruiter, Gestión del talento humano, Técnicas para optimizar los procesos de selección del talento, nuevas tendencias, Effective problem-solving and decision making. Amplia experiencia en Selección para compañías a nivel Latam.',
        ),
        array(
            'name' => 'Arantxa Martínez',
            'role' => 'Senior Consultant',
            'image' => 'https://www.ehlatam.com/wp-content/uploads/2024/09/Aranxtza.webp',
            'linkedin' => 'https://www.linkedin.com/in/arantxa-mart%C3%ADnez-001b2414b/',
            'email' => 'arantxa.martinez@ehlatam.com',
            'bio' => 'Psicóloga con especialización en psicología del trabajo y las organizaciones, certificada en Psicodiagnóstico Laboral. Con experiencia en Desarrollo Organizacional y Reclutamiento y Selección para compañías multinacionales, especializada en innovación y transformación digital.',
        ),
        array(
            'name' => 'Jesús Rodríguez',
            'role' => 'IT Consultant',
            'image' => 'https://ehlatam.com/wp-content/uploads/2024/09/Jesus.png',
            'linkedin' => 'https://www.linkedin.com/in/jesús-rafael-rodr%C3%ADguez-6b53ba143/',
            'email' => 'jesus.rodriguez@ehlatam.com',
            'bio' => 'Líder del área de tecnologías, integraciones, desarrollo de software, servicios digitales y datos. Cuenta con experiencia en Data Science, Analytics, Software development, Digital Marketing, Performance, SEM/SEO e innovación.',
        ),
        array(
            'name' => 'Wendy Jiménez',
            'role' => 'SEO and Digital Marketing Strategist',
            'image' => 'https://ehlatam.com/wp-content/uploads/2024/09/Wen-ehunting.png',
            'linkedin' => 'https://www.linkedin.com/in/wendy-johanna-jimenez/',
            'email' => 'wendy.jimenez@ehlatam.com',
            'bio' => 'Estratega en SEO y marketing digital con experiencia en posicionamiento orgánico, optimización del rendimiento web y desarrollo de productos digitales. Ha trabajado en proyectos digitales aplicando técnicas de Growth Marketing con impacto exponencial en el spin off del negocio de diversas marcas.',
        ),
    );
}

function ehunting_home_team_members($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $members = array();

    if ($post_id) {
        for ($index = 1; $index <= 20; $index++) {
            $name = trim((string) get_post_meta($post_id, 'titulocartaequipo' . $index, true));
            if ('' === $name) {
                continue;
            }

            $members[] = array(
                'name' => $name,
                'role' => trim((string) get_post_meta($post_id, 'cargoequipo' . $index, true)),
                'image' => trim((string) get_post_meta($post_id, 'imagenequipo' . $index, true)),
                'linkedin' => trim((string) get_post_meta($post_id, 'linkedinequipo' . $index, true)),
                'email' => trim((string) get_post_meta($post_id, 'mailequipo' . $index, true)),
                'bio' => trim((string) get_post_meta($post_id, 'textocartaequipo' . $index, true)),
            );
        }
    }

    return !empty($members) ? $members : ehunting_default_home_team_members();
}

// Eliminar jQuery de WordPress.
function shapeSpace_include_custom_jquery() {
    wp_deregister_script('jquery');
}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');

// Cargar los estilos y scripts del tema.
function theme_styles() {
    wp_enqueue_style('app-css', ehunting_theme_asset('dist/app.css'), array(), filemtime(get_template_directory() . '/dist/app.css'), 'all');
    wp_enqueue_script('app-js', ehunting_theme_asset('dist/app.js'));
}
add_action('wp_enqueue_scripts', 'theme_styles');

// Añadir estilos en admin para la plantilla de inicio.
function estilos_admin() {
    if (is_page_template('inicio')) {
        wp_enqueue_style('styles', ehunting_theme_asset('style.css'), array(), false, 'all');
    }
}
add_action('admin_enqueue_scripts', 'estilos_admin');

// Cambiar src por data-src para lazy loading.
add_filter('the_content', function ($content) {
    $content = preg_replace("/<img(.*?)(src=|srcset=)(.*?)>/i", '<img$1data-$2$3>', $content);
    $content = preg_replace('/<img(.*?)class=\"(.*?)\"(.*?)>/i', '<img$1class="$2 lazy"$3>', $content);
    $content = preg_replace('/<img((.(?!class=))*)\/?>/i', '<img class="lazy" $1>', $content);

    return $content;
});

// Eliminar CSS de bloques de WordPress en frontend.
function eliminablocklibrary() {
    wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'eliminablocklibrary', 100);

// Cambiar el output de la galería

add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby']) {
            unset($attr['orderby']);
        }
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => '',
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) {
        $orderby = 'none';
    }

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array(
            'include' => $include,
            'post_status' => 'inherit',
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'order' => $order,
            'orderby' => $orderby,
        ));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) {
        return '';
    }

    $output = "<div class=\"slideshow-wrapper\">\n";
    $output .= "<div class=\"preloader\"></div>\n";
    $output .= "<ul class='carousel'>\n";

    foreach ($attachments as $id => $attachment) {
        $img = wp_get_attachment_image_src($id, 'full');
        $output .= "<li class='carousel-item'>\n";
        $output .= "<img class='materialboxed' src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />\n";
        $output .= "</li>\n";
    }

    $output .= "</ul>\n";
    $output .= "</div>\n";

    return $output;
}

// Registrar wp-materialize-navwalker
require_once get_template_directory() . '/wp_materialize_navwalker.php';

// Registro del menú de WordPress

add_theme_support('nav-menus');
add_theme_support('custom-logo', array(
    'height'      => 90,
    'width'       => 180,
    'flex-height' => true,
    'flex-width'  => true,
));

if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
        'Primary' => __('Primary Menu', 'ALPAGMDIGITAL'),
        'Primary1' => __('Primary Menu 1', 'ALPAGMDIGITAL'),
    ));
}

// Login personalizado

/* Enque Stylesheet */
function my_custom_login() {
echo '
<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/login.css" />';
}

add_action('login_head', 'my_custom_login');

//Habilitar thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);

// Permitir comentarios encadenados
function enable_threaded_comments(){
if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
wp_enqueue_script('comment-reply');
}
}
add_action('get_header', 'enable_threaded_comments');

// Función para añadir la imagen destacada al resumen RSS
function mytheme_excerpt_post_thumbnail($content) {
global $post;
if ( has_post_thumbnail($post->ID) ) {
$content = $content . '<div>' . get_the_post_thumbnail($post->ID, 'medium') . '</div>';

}
return $content;
}
add_filter('the_excerpt_rss', 'mytheme_excerpt_post_thumbnail');

// Añadir contenedor a iframe de youtube para Responsive
function video_embed_html( $html ) {
return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'video_embed_html', 10 );

//Reducir caracteres del excerpt

function excerpt_corto($excerpt){
$limit = 150;

if (strlen($excerpt) > $limit) {
return substr($excerpt, 0, strpos($excerpt, ' ', $limit)).'...';
}

return $excerpt;
}

add_filter('the_excerpt', 'excerpt_corto');


//Cambiar enlace de logo de login

function my_login_logo_url() {
return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'Título del enlace';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
