// Validaciones de formularios
function validacion() {
    var nombre = document.forms.formulariocontacto2.tunombre.value;
    var telefono = document.forms.formulariocontacto2.tutelefono.value;
    var email = document.forms.formulariocontacto2.tumail.value;
    var cargo = document.forms.formulariocontacto2.tucargo.value;
    var mensaje = document.forms.formulariocontacto2.tumensaje.value;

    if (nombre === "") {
        M.toast({ html: "Por favor ingrese su nombre completo" });
        return false;
    } else if (telefono === "") {
        M.toast({ html: "Por favor ingrese un número telefónico" });
        return false;
    } else if (email === "") {
        M.toast({ html: "Por favor ingrese una dirección de e-mail" });
        return false;
    } else if (cargo === "") {
        M.toast({ html: "Por favor ingrese su cargo" });
        return false;
    } else if (mensaje === "") {
        M.toast({ html: "Por favor ingrese su mensaje" });
        return false;
    }
}

function validacion2() {
    var nombre = document.forms.formulariocontacto1.tunombre.value;
    var asunto = document.forms.formulariocontacto1.tuasunto.value;
    var email = document.forms.formulariocontacto1.tuemail.value;
    var mensaje = document.forms.formulariocontacto1.tumensaje.value;

    if (nombre === "") {
        M.toast({ html: "Por favor ingrese su nombre completo" });
        return false;
    } else if (asunto === "") {
        M.toast({ html: "Por favor ingrese un asunto" });
        return false;
    } else if (email === "") {
        M.toast({ html: "Por favor ingrese una dirección de e-mail" });
        return false;
    } else if (mensaje === "") {
        M.toast({ html: "Por favor ingrese su mensaje" });
        return false;
    }
}

// Inicialización de componentes y eventos
$(document).ready(function () {
    // Navegación suave al hacer clic en los enlaces del menú principal
    $(".contenedor-logo-menu > #menu-principal > li a").on("click", function (e) {
        e.preventDefault();
        if (this.hash !== "") {
            var target = this.hash;
            $("html, body").animate(
                {
                    scrollTop: $(target).offset().top,
                },
                800,
                function () {
                    window.location.hash = target;
                }
            );
        }
    });

    // Configuración de elementos de la interfaz
    $(".siguiente-anterior a").addClass("btn white-text boton-siguiente-anterior");
    $(".carousel").carousel({
        duration: 100,
        dist: -10,
        shift: 15,
        padding: 0,
        fullWidth: true,
    });
    $(".parallax").parallax();
    $("#por-que-elegirnos .parallax-container").css("height", "auto");
    $(".slider").slider({
        indicators: false,
        height: 600,
    });
    $(".sidenav").sidenav();
    $(".sidenav li").on("click", function () {
        $(".sidenav").sidenav("close");
    });
    $(".sidenav").addClass("white z-depth-2");
    $(".sidenav li a").css("color", "#4d92e9");
    $(".collapsible").collapsible();
    $(".modal").modal();
    $(".dropdown-trigger").dropdown();
    $(".materialboxed").materialbox();

    // Enlaces a sitios externos
    $(".logo-buscatuempresa").on("click", function () {
        window.open("https://buscatuempresa.cl", "_blank", "noopener");
    });
    $(".logo-propamat").on("click", function () {
        window.open("https://propamat.cl", "_blank", "noopener");
    });
    $(".logo-gruassocorro").on("click", function () {
        window.open("https://gruassocorro.cl", "_blank", "noopener");
    });
    $(".logo-internerdz").on("click", function () {
        window.open("https://internerdz.com", "_blank", "noopener");
    });
});

// Carga diferida de videos, Twitter y mapas
document.addEventListener("DOMContentLoaded", function () {
    // Lazy loading de videos
    var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));
    if ("IntersectionObserver" in window) {
        var lazyVideoObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var video = entry.target;
                    for (var source in video.children) {
                        var videoSource = video.children[source];
                        if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                            videoSource.src = videoSource.dataset.src;
                        }
                    }
                    video.load();
                    video.classList.remove("lazy");
                    lazyVideoObserver.unobserve(video);
                }
            });
        });

        lazyVideos.forEach(function (lazyVideo) {
            lazyVideoObserver.observe(lazyVideo);
        });
    }

    // Lazy loading de Twitter
    var lazyTwitter = [].slice.call(document.querySelectorAll(".lazy-twitter"));
    if ("IntersectionObserver" in window) {
        var twitterObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    $(lazyTwitter).append(
                        '<a class="twitter-timeline" data-lang="es" data-width="300" data-height="305" data-theme="light" href="https://twitter.com/eHuntingLatam?ref_src=twsrc%5Etfw">Tweets by eHuntingLatam</a>' +
                            '<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>'
                    );
                    twitterObserver.unobserve(entry.target);
                }
            });
        });

        lazyTwitter.forEach(function (element) {
            twitterObserver.observe(element);
        });
    }

    // Lazy loading de mapas
    var lazyMaps = [].slice.call(document.querySelectorAll(".lazy-map"));
    if ("IntersectionObserver" in window) {
        var mapObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    $(lazyMaps).append(
                        '<iframe class="lazy-map" style="width:100%;height:350px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.3797368099686!2d-70.58909388573647!3d-33.4133428807846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cedee85cfaf1%3A0xabd2e1dcd4d0533e!2seHunting+Latam!5e0!3m2!1ses!2scl!4v1560357110914!5m2!1ses!2scl" frameborder="0" style="border:0" allowfullscreen></iframe>'
                    );
                    mapObserver.unobserve(entry.target);
                }
            });
        });

        lazyMaps.forEach(function (element) {
            mapObserver.observe(element);
        });
    }

    // Lazy loading de fondos
    var lazyBackgrounds = [].slice.call(document.querySelectorAll(".lazy-background"));
    if ("IntersectionObserver" in window) {
        var backgroundObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    backgroundObserver.unobserve(entry.target);
                }
            });
        });

        lazyBackgrounds.forEach(function (element) {
            backgroundObserver.observe(element);
        });
    }
});

// Enlaces a políticas de Google
$(".privacidad-google").on("click", function () {
    window.location.href = "https://policies.google.com/privacy";
});
$(".terminos-google").on("click", function () {
    window.location.href = "https://policies.google.com/terms";
});

// ReCaptcha para formularios de contacto
$("#formulariocontacto1").on("submit", function (event) {
    event.preventDefault();
    grecaptcha.ready(function () {
        grecaptcha.execute("6LdHZasUAAAAAPsiy2VAraJaIJvwBTx3VlSnUm7-").then(function (token) {
            $("#captcha1").val(token);
            $("#formulariocontacto1").unbind("submit").submit();
        });
    });
});

$("#formulariocontacto2").on("submit", function (event) {
    event.preventDefault();
    grecaptcha.ready(function () {
        grecaptcha.execute("6LdHZasUAAAAAPsiy2VAraJaIJvwBTx3VlSnUm7-").then(function (token) {
            $("#captcha2").val(token);
            $("#formulariocontacto2").unbind("submit").submit();
        });
    });
});

// Carga diferida del script de ReCaptcha
document.addEventListener("DOMContentLoaded", function () {
    var loadRecaptchaScript = function () {
        var scriptContainer = document.getElementById("recaptchascript");
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "https://www.google.com/recaptcha/api.js?render=6LdHZasUAAAAAPsiy2VAraJaIJvwBTx3VlSnUm7-";
        scriptContainer.appendChild(script);

        // Remover eventos después de cargar el script
        var elements = [
            "tunombre",
            "tuemail",
            "tumail",
            "tuname",
            "tutelefono",
            "tucargo",
            "tuasunto",
            "tumensaje",
            "submitformulariocontacto1",
            "submitcontacto",
        ];
        elements.forEach(function (id) {
            var element = document.getElementById(id);
            if (element) {
                element.removeEventListener("focus", loadRecaptchaScript);
            }
        });
    };

    // Añadir eventos para cargar el script al enfocar en ciertos campos
    var elementsToWatch = [
        "tunombre",
        "tuname",
        "tuemail",
        "tumail",
        "tucargo",
        "tuasunto",
        "tutelefono",
        "tumensaje",
        "submitformulariocontacto1",
        "submitcontacto",
    ];
    elementsToWatch.forEach(function (id) {
        var element = document.getElementById(id);
        if (element) {
            element.addEventListener("focus", loadRecaptchaScript, false);
        }
    });
});

// Mostrar u ocultar logo según el tamaño de pantalla
document.addEventListener("DOMContentLoaded", function () {
    var checkScreenSize = function () {
        var movil = window.matchMedia("(max-width: 600px)");
        var logo = document.querySelector(".brand-logo");
        if (logo) {
            if (!movil.matches && (document.querySelector(".wp-image-1674") || document.querySelector(".wp-image-666"))) {
                logo.style.display = "none";
            } else {
                logo.style.display = "inline-block";
            }
        }
    };

    checkScreenSize();
    window.addEventListener("resize", checkScreenSize);
});

// Inicialización de carrusel de videos
(function () {
    var carouselContainer = document.createElement("div");
    carouselContainer.setAttribute("class", "carousel carousel-videos");

    var lazyVideoSections = [].slice.call(document.querySelectorAll(".lazy-carousel-videos"));
    if ("IntersectionObserver" in window) {
        var carouselObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    document.querySelector(".videos").appendChild(carouselContainer);
                    initializeCarouselVideos();
                    setupCarouselControls();
                    setupAutoSlide();
                    carouselObserver.unobserve(entry.target);
                }
            });
        });

        lazyVideoSections.forEach(function (section) {
            carouselObserver.observe(section);
        });
    }

    function initializeCarouselVideos() {
        var videos = [
            // URLs de los videos
        ];
        videos.forEach(function (videoUrl, index) {
            var carouselItem = document.createElement("a");
            carouselItem.setAttribute("class", "carousel-item");
            carouselItem.setAttribute("href", "#" + index);

            var figure = document.createElement("figure");
            figure.setAttribute(
                "class",
                "wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio figura-carousel-videos"
            );
            figure.style.height = "250px";

            var iframe = document.createElement("iframe");
            iframe.setAttribute("height", "200");
            iframe.setAttribute("width", "200");
            iframe.setAttribute("src", videoUrl + "&enablejsapi=1");
            iframe.setAttribute("frameborder", "0");
            iframe.style.zIndex = "-111111";
            iframe.style.position = "absolute";
            iframe.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture");
            iframe.setAttribute("allowfullscreen", "allowfullscreen");

            figure.appendChild(iframe);
            carouselItem.appendChild(figure);
            carouselContainer.appendChild(carouselItem);
        });

        // Inicializar carrusel
        var carouselElement = document.querySelector(".carousel-videos");
        M.Carousel.init(carouselElement, {
            indicators: true,
        });
    }

    function setupCarouselControls() {
        var carouselElement = document.querySelector(".carousel-videos");
        var carouselInstance = M.Carousel.getInstance(carouselElement);

        document.querySelector(".flechaderecha").addEventListener("click", function () {
            carouselInstance.next();
        });

        document.querySelector(".flechaizquierda").addEventListener("click", function () {
            carouselInstance.prev();
        });
    }

    function setupAutoSlide() {
        var isMobile = window.matchMedia("(max-width: 768px)").matches;
        var carouselElement = document.querySelector(".carousel-videos");
        var autoSlideInterval;

        function startAutoSlide() {
            autoSlideInterval = setInterval(function () {
                var carouselInstance = M.Carousel.getInstance(carouselElement);
                carouselInstance.next();
            }, 3000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        if (!isMobile) {
            startAutoSlide();
        }

        window.addEventListener("resize", function () {
            isMobile = window.matchMedia("(max-width: 768px)").matches;
            if (isMobile) {
                stopAutoSlide();
            } else {
                startAutoSlide();
            }
        });

        carouselElement.addEventListener("mouseenter", stopAutoSlide);
        carouselElement.addEventListener("mouseleave", function () {
            if (!isMobile) {
                startAutoSlide();
            }
        });
    }
})();
