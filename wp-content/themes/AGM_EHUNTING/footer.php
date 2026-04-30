<?php include 'variables-footer.php'; ?>
<?php
$footer_email = !empty($emailfooter) ? $emailfooter : 'contacto@ehlatam.com';
$footer_logo = 'https://www.ehlatam.com/wp-content/uploads/2025/04/LOGO-FINAL.png';
$footer_socials = array_filter(
    ehunting_social_links(),
    static function ($social_link) {
        return 'Correo' !== $social_link['title'];
    }
);
$footer_social_order = array('LinkedIn', 'Facebook', 'Instagram', 'X', 'YouTube');
usort(
    $footer_socials,
    static function ($left, $right) use ($footer_social_order) {
        $left_index = array_search($left['title'], $footer_social_order, true);
        $right_index = array_search($right['title'], $footer_social_order, true);
        $left_index = false === $left_index ? 999 : $left_index;
        $right_index = false === $right_index ? 999 : $right_index;
        return $left_index <=> $right_index;
    }
);
?>
<?php if (is_home()) : ?>
<div class="grid" style="margin-top: 15px;"></div>
<?php endif; ?>
<?php if (!is_home()) : ?>
<div id="seccioncontacto"></div>
<?php endif; ?>
<div id="info-footer"
    style="display:block;content:'';margin-top:-100px;height:100px;visibility:hidden;pointer-events:none;"></div>
<footer id="agm-footer" class="page-footer eh-footer" style="position:relative;background-color:#081426;padding-top:0">
    <div class="eh-footer__inner">
        <div class="eh-footer__brand">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="eh-footer__logo-link" aria-label="Ir al inicio">
                <img src="<?php echo esc_url($footer_logo); ?>" alt="Logo eHunting Latam" class="eh-footer__logo">
            </a>
        </div>

        <div class="eh-footer__column">
            <h3 class="eh-footer__title">Sobre eHunting</h3>
            <ul class="eh-footer__list">
                <li><a href="<?php echo esc_url(home_url('/#porque-elegirnos')); ?>">¿Por qué elegirnos?</a></li>
                <li><a href="<?php echo esc_url(home_url('/#como-trabajamos')); ?>">¿Cómo trabajamos?</a></li>
                <li><a href="<?php echo esc_url(home_url('/sobre-nosotros/#about-team-title')); ?>">Nuestro equipo</a></li>
                <li><a href="<?php echo esc_url(home_url('/sobre-nosotros/#about-offices-title')); ?>">Nuestras oficinas</a></li>
                <li><a href="https://ehlatam.com/politica-de-privacidad/">Políticas de Privacidad</a></li>
            </ul>
        </div>

        <div class="eh-footer__column">
            <h3 class="eh-footer__title">Servicios</h3>
            <ul class="eh-footer__list">
                <li><a href="<?php echo esc_url(home_url('/nuestros-servicios/#executive-search')); ?>">Executive Search</a></li>
                <li><a href="<?php echo esc_url(home_url('/nuestros-servicios/#reclutamiento-it-digital')); ?>">Reclutamiento IT &amp; Digital</a></li>
                <li><a href="<?php echo esc_url(home_url('/nuestros-servicios/#ai-training-rrhh')); ?>">AI Training para RRHH</a></li>
                <li><a href="<?php echo esc_url(home_url('/nuestros-servicios/#employer-branding-advisory')); ?>">Employer Branding Advisory</a></li>
                <li><a href="<?php echo esc_url(home_url('/nuestros-servicios/#agentes-ia-rrhh')); ?>">Desarrollo de Agentes IA para RRHH</a></li>
                <li><a href="<?php echo esc_url(home_url('/nuestros-servicios/#compensacion-bienestar')); ?>">Estudios de Compensación y Bienestar</a></li>
            </ul>
        </div>

        <div class="eh-footer__column eh-footer__column--contact">
            <h3 class="eh-footer__title">Contáctanos</h3>
            <a href="mailto:<?php echo esc_attr($footer_email); ?>" class="eh-footer__contact-link">
                <span class="eh-footer__contact-icon material-icons" aria-hidden="true">mail</span>
                <span><?php echo esc_html($footer_email); ?></span>
            </a>
        </div>

        <div class="eh-footer__column eh-footer__column--social">
            <h3 class="eh-footer__title">Síguenos</h3>
            <div class="eh-footer__socials">
                <?php foreach ($footer_socials as $social_link) : ?>
                    <?php $icon_src = !empty($social_link['src']) ? $social_link['src'] : ehunting_theme_asset($social_link['asset']); ?>
                    <a href="<?php echo esc_url($social_link['href']); ?>" target="_blank" rel="noopener" class="eh-footer__social-link" title="<?php echo esc_attr($social_link['title']); ?>">
                        <img
                            src="<?php echo esc_url($icon_src); ?>"
                            alt="<?php echo esc_attr($social_link['title']); ?>"
                            class="eh-footer__social-icon"
                            width="<?php echo esc_attr($social_link['width']); ?>"
                            <?php if (!empty($social_link['height'])) : ?>
                                height="<?php echo esc_attr($social_link['height']); ?>"
                            <?php endif; ?>
                        >
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div id="contactanos" class="modal">
        <div class="modal-content">
            <h4 class="center-align black-text">Conversemos</h4>
            <?php get_template_part('/resources/php/formcontacto') ?>
        </div>
    </div>

    <?php wp_footer(); ?>
</footer>

<link class="lazy" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link class="lazy" href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</body>

</html>
