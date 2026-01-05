/**
 * Homepage Animations & Interactions
 * Atelier Cour Roland
 */

(function () {
  "use strict";

  // Attendre que le DOM soit complètement chargé
  document.addEventListener("DOMContentLoaded", function () {
    // ================================
    // ANIMATIONS AOS (Animate On Scroll)
    // ================================

    const observerOptions = {
      threshold: 0.15,
      rootMargin: "0px 0px -50px 0px",
    };

    const animationObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("aos-animate");
          // On observe une seule fois
          animationObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Observer tous les éléments avec data-aos
    const animatedElements = document.querySelectorAll("[data-aos]");
    animatedElements.forEach(function (element) {
      animationObserver.observe(element);
    });

    // ================================
    // SMOOTH SCROLL pour les ancres
    // ================================

    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');

    smoothScrollLinks.forEach(function (link) {
      link.addEventListener("click", function (e) {
        const targetId = this.getAttribute("href");

        if (targetId && targetId !== "#" && targetId.length > 1) {
          const targetElement = document.querySelector(targetId);

          if (targetElement) {
            e.preventDefault();
            targetElement.scrollIntoView({
              behavior: "smooth",
              block: "start",
            });
          }
        }
      });
    });

    // ================================
    // FADE OUT du scroll indicator
    // ================================

    const scrollIndicator = document.querySelector(".acr-scroll-indicator");

    if (scrollIndicator) {
      window.addEventListener("scroll", function () {
        const scrollPosition = window.pageYOffset;
        const opacity = Math.max(0, 1 - scrollPosition / 400);
        scrollIndicator.style.opacity = opacity;
      });
    }

    // ================================
    // HEADER SCROLL EFFECT
    // ================================

    const header = document.querySelector(".site-header");

    if (header) {
      window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) {
          header.classList.add("scrolled");
        } else {
          header.classList.remove("scrolled");
        }
      });
    }

    // ================================
    // GALLERY LIGHTBOX (optionnel)
    // ================================

    const galleryItems = document.querySelectorAll(".acr-gallery-item");

    galleryItems.forEach(function (item) {
      item.addEventListener("click", function () {
        const img = this.querySelector("img");
        if (img) {
          // Ici vous pouvez ajouter un lightbox
          console.log("Image cliquée:", img.src);
        }
      });
    });

    // ================================
    // PERFORMANCE: Debounce function
    // ================================

    function debounce(func, wait) {
      let timeout;
      return function executedFunction() {
        const context = this;
        const args = arguments;
        const later = function () {
          timeout = null;
          func.apply(context, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
      };
    }

    // ================================
    // LOG Success
    // ================================

    console.log("ACR Homepage loaded successfully");
  });

  // ================================
  // PAGE LOADED
  // ================================

  window.addEventListener("load", function () {
    document.body.classList.add("page-loaded");
  });
})();
