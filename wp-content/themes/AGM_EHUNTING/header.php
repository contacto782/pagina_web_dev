<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="gb18030">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo esc_url(ehunting_theme_asset('favicon.ico')); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <style>
        .site-header__nav {
            height: 104px !important;
        }

        .site-header__nav .nav-wrapper,
        .site-header__nav .contenedor-logo-menu,
        .site-header__nav .logo-y-banderas {
            min-height: 104px !important;
        }

        .site-header__nav .logo-y-banderas {
            display: flex !important;
            align-items: flex-end !important;
            padding-top: 8px !important;
            padding-bottom: 10px !important;
        }

        .site-header__nav .div-logo {
            display: inline-flex !important;
            align-items: flex-end !important;
            height: auto !important;
            line-height: 1 !important;
        }

        .site-header__nav .brand-logo {
            display: inline-flex !important;
            align-items: flex-end !important;
            height: auto !important;
        }

        .site-header__nav .brand-logo img.logo {
            display: block;
            max-height: 76px;
            width: auto;
        }

        .site-header--home .site-header__menu-row.right {
            display: flex !important;
            align-items: center !important;
            position: absolute !important;
            left: 50px !important;
            right: auto !important;
            bottom: 16px !important;
            width: auto !important;
            height: auto !important;
            padding-top: 0 !important;
            margin: 0 !important;
            transform: none !important;
            z-index: 2;
        }

        .site-header--home #menu-principal.right.hide-on-med-and-down {
            display: flex !important;
            align-items: center !important;
            gap: 18px;
            height: auto !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .site-header--home #menu-principal > li {
            display: flex !important;
            align-items: center !important;
            min-height: 44px !important;
        }

        .site-header--home #menu-principal > li > a,
        .site-header--home #menu-principal > li > .dropdown-button {
            display: inline-flex !important;
            align-items: center !important;
            min-height: 44px !important;
            line-height: 1.15 !important;
            padding: 0 12px 6px !important;
            text-align: center;
            white-space: nowrap;
        }

        .site-header__nav a[aria-current="true"],
        .site-header__nav li.is-section-active > a,
        .sidenav li.is-section-active > a,
        .sidenav a[aria-current="true"] {
            color: #03a9f4 !important;
            background-color: transparent !important;
        }

        .site-header__nav li.is-section-active > a,
        .site-header__nav a[aria-current="true"] {
            position: relative;
            text-shadow: none !important;
        }

        .site-header__nav li.is-section-active > a::before,
        .site-header__nav a[aria-current="true"]::before {
            content: "";
            position: absolute;
            inset: 10px 8px;
            border-radius: 999px;
            background: linear-gradient(90deg, rgba(223, 113, 56, 0.16), rgba(87, 190, 205, 0.12));
            box-shadow: 0 0 18px rgba(87, 190, 205, 0.12);
            pointer-events: none;
        }

        .site-header__nav li.is-section-active > a::after,
        .site-header__nav a[aria-current="true"]::after {
            content: "";
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 8px;
            height: 3px;
            border-radius: 999px;
            background: linear-gradient(90deg, #df7138 0%, #57becd 100%);
            pointer-events: none;
        }
    </style>
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-585LVN8');
    </script>
</head>
<?php
$is_home_hero_header = ehunting_is_home_hero_template();
$is_section_header = function_exists('ehunting_is_section_header_template') && ehunting_is_section_header_template();
$uses_home_header_style = $is_home_hero_header || $is_section_header;
?>
<body <?php body_class(); ?>>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-585LVN8" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
<header id="inicio" class="site-header<?php echo $uses_home_header_style ? ' site-header--home' : ''; ?>">
    <div class="wrapperheader">
        <div class="top-bar white-text<?php echo $uses_home_header_style ? ' site-header__top-bar' : ''; ?>">
            <div class="top-bar-container" style="width:100%">
                <?php include 'variables-footer.php'; ?>
                <?php /*<a href="tel:+56 229797085"><span class="left white-text"
                        style="line-height:40px;padding:0 5px;padding-left:15px;font-size:13px;font-weight:bold">Chile: +56 229797085</span></a>
                <a href="tel:+57 3009290727"><span class="left white-text"
                        style="line-height:40px;padding:0 5px;padding-left:15px;font-size:13px;font-weight:bold">Colombia: +57 3009290727</span></a>
                <a href="tel:+51 16419213"><span class="left white-text"
                        style="line-height:40px;padding:0 5px;padding-left:15px;font-size:13px;font-weight:bold">Per&uacute;: +51 16419213</span></a>
                        <a href="tel:+52 5584216692"><span class="left white-text"
                        style="line-height:40px;padding:0 5px;padding-left:15px;font-size:13px;font-weight:bold">M&eacute;xico: +52 5584216692</span></a> */?>
                <div class="socialmediaheader valign-wrapper">
                    <?php foreach (ehunting_social_links() as $social_link) : ?>
                        <?php $icon_src = !empty($social_link['src']) ? $social_link['src'] : ehunting_theme_asset($social_link['asset']); ?>
                        <a href="<?php echo esc_url($social_link['href']); ?>" target="_blank" rel="noopener">
                            <img
                                class="lazy icono-social"
                                alt="<?php echo esc_attr($social_link['alt']); ?>"
                                title="<?php echo esc_attr('Ir a ' . $social_link['title']); ?>"
                                src="<?php echo esc_url($icon_src); ?>"
                                style="vertical-align:sub"
                                width="<?php echo esc_attr($social_link['width']); ?>"
                                <?php if (!empty($social_link['height'])) : ?>
                                    height="<?php echo esc_attr($social_link['height']); ?>"
                                <?php endif; ?>
                            />
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <nav id="contenido-header" class="#ffffff white site-header__nav<?php echo $uses_home_header_style ? ' site-header__nav--home' : ''; ?>">
            <div class="nav-wrapper headerSticky">
                <div class="contenedor-logo-menu">
                    <div class="logo-y-banderas left row" style="width:100%;margin:0!important">
                        <span class="div-logo" style="line-height:85px;margin:0!important"><span
                                class="brand-logo aparece-logo relative"><img class="lazy logo" alt="Logo eHunting" title="Logo eHunting"
                                    src="https://www.ehlatam.com/wp-content/uploads/2025/04/LOGO-FINAL.png"
                                    width="150">
                                    <?php /*<span class="founded light" style="font-style:italic">Desde 2014</span> */ ?>
                                    </span></span>
                        <a href="#" data-target="slide-out"
                            class="sidenav-trigger btn-flat btn-floating btn-large boton-redondo"
                            style="margin:15px 2% 15px 2% !important"><i
                                class="material-icons valign-wrapper">menu</i></a>
                        <div class="right site-header__menu-row">
                            <?php
                    wp_nav_menu( array(
                    	// desktop menu array
    									'container' => '',
    									'menu' => 'Primary',
    									'theme_location'=>'Primary',
                      'menu_class' => 'right hide-on-med-and-down',
                      'depth' => 1,
                      'walker' => new wp_materialize_navwalker()
    
                     ));
    
                    wp_nav_menu( array(
    									// mobile menu
    									'container' => '',
    									'menu' => 'Primary1',
    									'theme_location'=>'Primary1',
    				                    'menu_class' => 'sidenav',
    									'menu_id' => 'slide-out',
                                        'depth' => 1
    
    								));
    
                    ?>
                        </div>
                    </div>
                    <div class="banderas row left-align "
                        style="width:auto;float:right;display:inline-block;margin-right:2%;position: relative;top: 0;">

                        <?php if ($uses_home_header_style) : ?>
                            <div class="site-header__flags-meta hide-on-med-and-down"></div>
                        <?php else : ?>
                            <span class="black-text hide-on-med-and-down right right-align"
                                style="padding-left:5px;width:100%;height:30px;position:relative;right:-1%;">Organizaciones</span>
                        <?php endif; ?>
                        <?php foreach (ehunting_header_flags() as $flag) : ?>
                            <div class="col l1 right">
                                <img
                                    class="lazy"
                                    style="margin:0 auto;display:inline-block<?php echo 'Brasil' === $flag['title'] ? ';width:30px' : ''; ?>"
                                    alt="<?php echo esc_attr($flag['alt']); ?>"
                                    title="<?php echo esc_attr($flag['title']); ?>"
                                    src="<?php echo esc_url(ehunting_theme_asset($flag['asset'])); ?>"
                                    width="<?php echo esc_attr($flag['width']); ?>"
                                >
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var menuLinks = Array.prototype.slice.call(document.querySelectorAll('#contenido-header a, #slide-out a'));

        if (!menuLinks.length) {
            return;
        }

        var groupedLinks = [];
        var groupedByHash = {};

        menuLinks.forEach(function (link) {
            var href = link.getAttribute('href');

            if (!href || '#' === href) {
                return;
            }

            var parsedUrl;

            try {
                parsedUrl = new URL(href, window.location.origin);
            } catch (error) {
                return;
            }

            var currentPath = window.location.pathname.replace(/\/+$/, '') || '/';
            var linkPath = parsedUrl.pathname.replace(/\/+$/, '') || '/';
            var hash = parsedUrl.hash;

            if (linkPath !== currentPath || (!hash && '/' !== linkPath)) {
                return;
            }

            if (!hash && '/' === linkPath) {
                hash = '#inicio';
            }

            var target = document.querySelector(hash);

            if (!target) {
                return;
            }

            if (!groupedByHash[hash]) {
                groupedByHash[hash] = {
                    hash: hash,
                    target: target,
                    links: []
                };
                groupedLinks.push(groupedByHash[hash]);
            }

            groupedByHash[hash].links.push(link);
        });

        if (!groupedLinks.length) {
            return;
        }

        groupedLinks.forEach(function (entry) {
            entry.links.forEach(function (link) {
                var parentItem = link.closest('li');

                link.classList.remove('active');
                link.removeAttribute('aria-current');

                if (parentItem) {
                    parentItem.classList.remove('active', 'is-section-active', 'current-menu-item', 'current-menu-parent', 'current_page_item', 'current_page_parent', 'current-page-ancestor');
                }
            });
        });

        var topEntry = groupedLinks.find(function (entry) {
            return '#inicio' === entry.hash || !!entry.target.closest('.site-header');
        }) || null;

        var sectionEntries = groupedLinks
            .filter(function (entry) {
                return entry !== topEntry;
            })
            .sort(function (left, right) {
                return left.target.offsetTop - right.target.offsetTop;
            });

        function setActiveState(activeHash) {
            groupedLinks.forEach(function (entry) {
                var isActive = entry.hash === activeHash;

                entry.links.forEach(function (link) {
                    var parentItem = link.closest('li');

                    link.classList.toggle('active', isActive);
                    if (isActive) {
                        link.setAttribute('aria-current', 'true');
                    } else {
                        link.removeAttribute('aria-current');
                    }

                    if (parentItem) {
                        parentItem.classList.toggle('active', isActive);
                        parentItem.classList.toggle('is-section-active', isActive);
                    }
                });
            });
        }

        function getScrollLine() {
            var nav = document.getElementById('contenido-header');
            var navHeight = nav ? nav.offsetHeight : 0;

            return window.scrollY + navHeight + 80;
        }

        function resolveActiveHash() {
            var activeHash = topEntry ? topEntry.hash : groupedLinks[0].hash;
            var scrollLine = getScrollLine();

            sectionEntries.forEach(function (entry) {
                if (entry.target.offsetTop <= scrollLine) {
                    activeHash = entry.hash;
                }
            });

            return activeHash;
        }

        var ticking = false;

        function syncActiveState() {
            setActiveState(resolveActiveHash());
            ticking = false;
        }

        function requestSync() {
            if (ticking) {
                return;
            }

            ticking = true;
            window.requestAnimationFrame(syncActiveState);
        }

        menuLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                window.setTimeout(requestSync, 60);
            });
        });

        window.addEventListener('scroll', requestSync, { passive: true });
        window.addEventListener('resize', requestSync);

        requestSync();
    });
</script>
