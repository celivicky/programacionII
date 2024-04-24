'use strict';


/**
 añade una clase "active" al header cuando se hace clic en el botón de navegación (navToggleBtn).
 */

const header = document.querySelector("[data-header]");
const navToggleBtn = document.querySelector("[data-menu-toggle-btn]");

navToggleBtn.addEventListener("click", function () {
  header.classList.toggle("active");
});



/**
 * muestra u oculta un menú contextual cuando se hace clic en un botón de menú de una tarjeta
 */

const menuBtn = document.querySelectorAll("[data-menu-btn]");

for (let i = 0; i < menuBtn.length; i++) {
  menuBtn[i].addEventListener("click", function () {
    this.nextElementSibling.classList.toggle("active");
  });
}



/**
 *  añade o quita la clase "active" de un botón de "cargar más" para mostrar un spinner de carga
 */

const loadMoreBtn = document.querySelector("[data-load-more]");

loadMoreBtn.addEventListener("click", function () {
  this.classList.toggle("active");
});