<?php

function ehunting_render_page_hero($args = array()) {
    $defaults = array(
        'title' => get_the_title(),
        'has_parallax' => is_singular() && has_post_thumbnail(),
        'title_class' => '',
        'tone_class' => 'theme-page-hero--dark',
        'size_class' => '',
        'title_style' => '',
    );

    $args = wp_parse_args($args, $defaults);

    $hero_classes = array('theme-page-hero', $args['tone_class']);
    if ($args['has_parallax']) {
        $hero_classes[] = 'theme-page-hero--parallax';
    } else {
        $hero_classes[] = 'theme-page-hero--compact';
    }

    if (!empty($args['size_class'])) {
        $hero_classes[] = $args['size_class'];
    }

    $title_classes = array('white-text', 'center-align', 'flow-text', 'titulo-pagina', 'theme-page-hero__title');
    if (!empty($args['title_class'])) {
        $title_classes[] = $args['title_class'];
    }
    ?>
    <div class="<?php echo esc_attr(implode(' ', $hero_classes)); ?>">
        <?php if ($args['has_parallax']) : ?>
            <div class="parallax theme-page-hero__media">
                <?php the_post_thumbnail('full', array('class' => 'parallax-img')); ?>
            </div>
        <?php endif; ?>
        <div class="theme-page-hero__overlay"></div>
        <h1 class="<?php echo esc_attr(implode(' ', $title_classes)); ?>"<?php echo $args['title_style'] ? ' style="' . esc_attr($args['title_style']) . '"' : ''; ?>>
            <?php echo wp_kses_post($args['title']); ?>
        </h1>
    </div>
    <?php
}

function ehunting_get_archive_card_column_class($paged, $position, $featured_mode = 'default') {
    if ('uniform' === $featured_mode) {
        return 'col s12 m6 l4 left';
    }

    if ('double' === $featured_mode) {
        $base_class = (1 === (int) $paged && $position < 3) ? 'col s12 m6 l6' : 'col s12 m6 l4';
    } else {
        $base_class = (1 === (int) $paged && 1 === (int) $position) ? 'col s12 m12 l12' : 'col s12 m6 l4';
    }

    $alignment_class = ((1 === (int) $paged && $position > 4) || (1 !== (int) $paged && $position > 3)) ? 'right' : 'left';

    return trim($base_class . ' ' . $alignment_class);
}

function ehunting_render_archive_post_card($args = array()) {
    $defaults = array(
        'paged' => 1,
        'position' => 1,
        'featured_mode' => 'default',
        'button_label' => 'Leer más',
        'layout' => 'default',
        'excerpt_callback' => null,
        'card_extra_class' => '',
        'content_after_excerpt' => '',
        'fixed_height' => false,
    );
    $args = wp_parse_args($args, $defaults);

    $column_class = ehunting_get_archive_card_column_class($args['paged'], $args['position'], $args['featured_mode']);
    $is_featured = ('double' === $args['featured_mode']) ? (1 === (int) $args['paged'] && $args['position'] < 3) : (1 === (int) $args['paged'] && 1 === (int) $args['position']);
    $background_style = $is_featured ? 'height:500px;background-position:bottom' : 'height:300px';
    if ('double' === $args['featured_mode']) {
        $background_style = 'height:300px;background-position:center';
    }
    $card_classes = trim('card hoverable #fafafa grey lighten-5 theme-post-card ' . $args['card_extra_class'] . ('news' === $args['layout'] ? ' theme-post-card--news' : ''));
    ?>
    <div id="post<?php echo esc_attr($args['position']); ?>" class="<?php echo esc_attr($column_class); ?>">
        <div class="<?php echo esc_attr($card_classes); ?>"<?php echo $args['fixed_height'] && $is_featured ? ' style="height:initial!important"' : ''; ?>>
            <?php if ('news' === $args['layout']) : ?>
                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="obras-en-home-inner card-image theme-post-card__media theme-post-card__media--news" style="<?php echo esc_attr($background_style); ?>;background-image:url('<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>');background-size:cover;background-repeat:no-repeat"></a>
                <div class="card-content theme-post-card__content theme-post-card__content--news">
                    <h3 class="theme-post-card__headline">
                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                    </h3>
                    <div class="theme-post-card__excerpt">
                        <?php
                        if (is_callable($args['excerpt_callback'])) {
                            call_user_func($args['excerpt_callback']);
                        } else {
                            the_excerpt();
                        }
                        ?>
                    </div>
                    <?php if (!empty($args['content_after_excerpt'])) : ?>
                        <?php echo $args['content_after_excerpt']; ?>
                    <?php endif; ?>
                    <div class="theme-post-card__actions">
                        <a href="<?php the_permalink(); ?>" class="theme-post-card__button theme-post-card__button--news"><?php echo esc_html($args['button_label']); ?> &gt;</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="obras-en-home-inner card-image theme-post-card__media" style="<?php echo esc_attr($background_style); ?>;background-image:url('<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>');background-size:cover;background-repeat:no-repeat">
                    <div class="theme-post-card__overlay"></div>
                    <span class="card-title">
                        <h5 class="white-text flow-text center-align theme-post-card__title">
                            <a class="white-text" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                        </h5>
                    </span>
                </div>
                <div class="card-content theme-post-card__content">
                    <?php
                    if (is_callable($args['excerpt_callback'])) {
                        call_user_func($args['excerpt_callback']);
                    } else {
                        the_excerpt();
                    }
                    ?>
                    <?php if (!empty($args['content_after_excerpt'])) : ?>
                        <?php echo $args['content_after_excerpt']; ?>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>" class="btn theme-btn theme-btn--primary theme-post-card__button"><?php echo esc_html($args['button_label']); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

function ehunting_render_home_clients() {
    $clients = ehunting_home_clients();
    ?>
    <section class="our-clients">
        <div class="col s12 m12 l12 center-align our-clients__header">
            <h2 class="subtitulo our-clients__title">THEY TRUSTED US</h2>
            <div class="divider our-clients__divider">&nbsp;</div>
        </div>
        <div class="container-clients">
            <?php foreach ($clients as $client) : ?>
                <div class="client-container">
                    <a href="<?php echo esc_url($client['url']); ?>" target="_blank" rel="noopener" title="<?php echo esc_attr($client['name']); ?>">
                        <img class="client-img" title="<?php echo esc_attr('Ir a ' . $client['name']); ?>" src="<?php echo esc_url($client['image']); ?>" alt="<?php echo esc_attr($client['name']); ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function ehunting_render_contact_offices() {
    $offices = ehunting_contact_offices();
    $whatsapp_icon = 'https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg';
    ?>
    <div class="countries-grid">
        <?php foreach ($offices as $office) : ?>
            <?php
            $action = $office['action'];
            $button_class = 'whatsapp-btn';
            $icon_src = $whatsapp_icon;
            if ('phone' === $action['type']) {
                $button_class = 'phone-btn';
                $icon_src = $action['icon'];
            }
            if ('modal' === $action['type']) {
                $button_class .= ' modal-trigger';
            }
            ?>
            <div class="country-card" itemscope itemtype="https://schema.org/LocalBusiness">
                <div class="card-image contact-office-card__image" style="background-image:url('<?php echo esc_url($office['image']); ?>');" role="img" aria-label="<?php echo esc_attr($office['aria_label']); ?>"></div>
                <div class="card-content">
                    <div class="country-flag"><?php echo esc_html($office['flag']); ?></div>
                    <h3 class="country-name" itemprop="name"><?php echo esc_html($office['name']); ?></h3>
                    <p class="country-address" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <?php if (!empty($office['address']['street'])) : ?>
                            <span itemprop="streetAddress"><?php echo esc_html($office['address']['street']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($office['address']['locality'])) : ?>
                            <span itemprop="addressLocality"><?php echo esc_html($office['address']['locality']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($office['address']['region'])) : ?>
                            <span itemprop="addressRegion"><?php echo esc_html($office['address']['region']); ?></span>
                        <?php endif; ?>
                    </p>
                    <?php if (!empty($office['telephone'])) : ?>
                        <meta itemprop="telephone" content="<?php echo esc_attr($office['telephone']); ?>">
                    <?php endif; ?>
                    <div class="card-actions">
                        <a href="<?php echo esc_url($action['href']); ?>" <?php echo 'modal' === $action['type'] ? '' : 'target="_blank" rel="noopener noreferrer"'; ?> class="<?php echo esc_attr($button_class); ?>"<?php echo 'phone' === $action['type'] ? ' itemprop="telephone"' : ''; ?>>
                            <img src="<?php echo esc_url($icon_src); ?>" alt="<?php echo esc_attr($action['alt']); ?>" title="<?php echo esc_attr($action['title']); ?>">
                            <span><?php echo esc_html($action['label']); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}

function ehunting_render_home_action_cards($is_mobile = false) {
    $items = array(
        array(
            'title' => 'Empresas',
            'link' => '/que-hacemos',
            'icon' => 'business',
            'label' => 'CONSULTA NUESTROS SERVICIOS',
            'target' => 'contactanos',
            'classes' => 'modal-trigger',
        ),
        array(
            'title' => 'Postulantes',
            'link' => $is_mobile ? 'https://docs.google.com/forms/d/e/1FAIpQLSfjpSg3sIW-Rgt5sgT1EShOPxM8TDaUjNqf3CPY4MCCSsX7IQ/viewform' : 'https://forms.gle/4LSQXbv9Q39CTQoo8',
            'icon' => 'group',
            'label' => 'Envía tu CV',
            'target' => '',
            'classes' => '',
        ),
    );
    $wrapper_classes = $is_mobile ? 'hide-on-med-and-up' : 'hide-on-small-only';
    $title_size_class = $is_mobile ? 'home-action-card__title--mobile' : 'home-action-card__title--desktop';
    ?>
    <?php foreach ($items as $item) : ?>
        <div class="col s6 m6 l6 center-align <?php echo esc_attr($wrapper_classes); ?> home-action-card">
            <div class="btn-flat z-depth-0 black-text home-action-card__heading">
                <strong>
                    <h3 class="<?php echo esc_attr($title_size_class); ?>"><?php echo esc_html($item['title']); ?></h3>
                </strong>
            </div>
            <a
                href="<?php echo esc_url($item['link']); ?>"
                <?php echo !empty($item['target']) ? 'data-target="' . esc_attr($item['target']) . '"' : ''; ?>
                class="btn-floating btn-large waves-effect waves-light hoverable home-action-card__button <?php echo esc_attr($item['classes']); ?>"
                <?php echo $is_mobile || !empty($item['classes']) ? '' : 'target="_blank"'; ?>
                title="<?php echo esc_attr('Ir a ' . $item['title']); ?>"
            >
                <i class="large material-icons home-action-card__icon"><?php echo esc_html($item['icon']); ?></i>
            </a>
            <div class="btn-flat z-depth-0 black-text home-action-card__label">
                <span><?php echo esc_html($item['label']); ?></span>
            </div>
        </div>
    <?php endforeach; ?>
    <?php
}

function ehunting_render_home_blog_section() {
    global $post;
    $current_week_number = date('W');
    $posts_per_page = 6;
    $offset = ($current_week_number % $posts_per_page) * $posts_per_page;
    $args = array(
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'offset' => $offset,
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'entrevistas',
                'operator' => 'NOT IN',
            ),
        ),
    );
    $posts = get_posts($args);
    ?>
    <div id="seccion-blog" class="home-blog-section">
        <div class="row container">
            <div class="col s12 m12 l12 center-align home-blog-section__header">
                <h2 class="subtitulo home-blog-section__title">BLOG</h2>
                <div class="divider home-blog-section__divider">&nbsp;</div>
            </div>

            <div class="container">
                <div class="col s12 m12 l12 center-align home-blog-section__intro"></div>
            </div>

            <div class="col s12 center-align">
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <div class="obras-en-home col s12 m6 l4">
                        <div class="card hoverable #fafafa grey lighten-5">
                            <div class="obras-en-home-inner card-image lazy home-blog-section__card-media" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url(null, 'medium')); ?>');">
                                <div class="home-blog-section__card-overlay"></div>
                                <span class="card-title home-blog-section__card-title-wrap">
                                    <h5 class="white-text flow-text center-align theme-post-card__title">
                                        <a class="white-text" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                                    </h5>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
            <div class="center-align">
                <a href="/blog" class="btn theme-btn theme-btn--primary home-blog-section__button">Ver Todos los Artículos</a>
            </div>
        </div>
    </div>
    <?php
}

function ehunting_render_linkedin_icon() {
    ?>
    <svg version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="281.5 3 137 135" aria-hidden="true">
        <path fill="#FFFFFF" d="M403.625,8.938H296.347c-4.916,0-8.91,4.05-8.91,9.021v107.082c0,4.973,3.994,9.021,8.91,9.021h107.278c4.916,0,8.938-4.051,8.938-9.021V17.959C412.562,12.987,408.541,8.938,403.625,8.938z M325.254,116.188h-18.545V56.474h18.573v59.713H325.254z M315.981,48.318c-5.949,0-10.753-4.832-10.753-10.753s4.804-10.753,10.753-10.753c5.921,0,10.753,4.832,10.753,10.753C326.734,43.515,321.931,48.318,315.981,48.318z M394.771,116.188h-18.545V87.141c0-6.927-0.142-15.835-9.638-15.835c-9.663,0-11.144,7.541-11.144,15.333v29.549H336.9V56.474h17.792v8.156h0.252c2.485-4.692,8.547-9.636,17.567-9.636c18.769,0,22.261,12.373,22.261,28.46V116.188L394.771,116.188z"></path>
    </svg>
    <?php
}

function ehunting_render_home_team_section($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $members = ehunting_home_team_members($post_id);
    $title = get_post_meta($post_id, 'tituloequipo', true);
    $title = $title ? $title : 'EQUIPO';
    $intro_paragraphs = array(
        'Con años de experiencia en el sector digital, nuestro equipo está conformado por profesionales apasionados por la evolución digital profundamente conectados con la actividad empresarial, y con amplias redes de contacto en el mercado laboral digital.',
        'En eHunting operamos con metodologías ágiles para maximizar la eficacia del delivery. Las células están integradas por especialistas en recursos humanos, tecnologías de la información, negocios digitales, en conjunto con Product Owners y Scrum Masters.',
    );
    ?>
    <div class="equipo hide-on-med-and-up home-team-section">
        <div class="row container home-team-section__row">
            <div id="equipo" class="col s12 m12 l12">
                <div class="col s12 m12 l12 tituloequipo home-team-section__header">
                    <h2 class="subtitulo"><?php echo esc_html($title); ?></h2>
                    <div class="divider home-team-section__divider">&nbsp;</div>
                    <?php foreach ($intro_paragraphs as $paragraph) : ?>
                        <p class="home-team-section__intro"><?php echo esc_html($paragraph); ?></p>
                    <?php endforeach; ?>
                </div>
                <?php foreach ($members as $member) : ?>
                    <div class="col s12 m6 l4 cartaequipo home-team-section__column">
                        <div class="card home-team-section__card">
                            <div class="card-image waves-effect waves-block waves-light lazy visible home-team-section__image" style="background-image:url('<?php echo esc_url($member['image']); ?>');">
                                <div class="activator home-team-section__image-overlay"></div>
                                <h2 class="home-team-section__title-wrap">
                                    <span class="card-title white-text activator home-team-section__title">
                                        <?php echo esc_html($member['name']); ?><i class="material-icons right activator">more_vert</i>
                                    </span>
                                </h2>
                                <?php if (!empty($member['role'])) : ?>
                                    <h3 class="home-team-section__role"><?php echo esc_html($member['role']); ?></h3>
                                <?php endif; ?>
                            </div>
                            <div class="card-reveal home-team-section__reveal">
                                <span class="card-title grey-text text-darken-4 home-team-section__reveal-title">
                                    <?php echo esc_html($member['name']); ?><i class="material-icons right">close</i>
                                </span>
                                <div class="home-team-section__links">
                                    <?php if (!empty($member['linkedin'])) : ?>
                                        <a href="<?php echo esc_url($member['linkedin']); ?>" class="linkedinequipo home-team-section__social-link" target="_blank" rel="noopener" aria-label="<?php echo esc_attr('LinkedIn de ' . $member['name']); ?>">
                                            <?php ehunting_render_linkedin_icon(); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($member['email'])) : ?>
                                        <a href="mailto:<?php echo antispambot(sanitize_email($member['email'])); ?>" class="home-team-section__social-link" aria-label="<?php echo esc_attr('Correo de ' . $member['name']); ?>">
                                            <i class="material-icons icono-social home-team-section__email-icon">email</i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($member['bio'])) : ?>
                                    <div class="home-team-section__bio"><?php echo wp_kses_post(wpautop($member['bio'])); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}
