import M from "materialize-css";

let el;

// Collapsible
el = document.querySelectorAll('.collapsible')
M.Collapsible.init(el);
el = document.querySelectorAll('.sidenav')
M.Sidenav.init(el)
el = document.querySelectorAll('.modal')
M.Modal.init(el)
// transición del carrusel
el = document.querySelector('.carousel-home .carousel');
el && M.Carousel.init(el, {fullWidth:true,indicators: 0,dist: 0,shift: 0});

let carruselImages
carruselImages = el && M.Carousel.getInstance(el);

if(carruselImages !== null || carruselImages !== undefined)
window.setInterval(()=> {
    carruselImages.next();
}, 6000);