/**
 * Carousel functionality for Ateliers page
 */
(function () {
  "use strict";

  // Wait for DOM to be ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initCarousel);
  } else {
    initCarousel();
  }

  function initCarousel() {
    const carousel = document.querySelector(".ateliers-carousel");
    if (!carousel) return;

    const track = carousel.querySelector(".carousel-track");
    const slides = Array.from(track.querySelectorAll(".carousel-slide"));
    const prevButton = carousel.querySelector(".carousel-prev");
    const nextButton = carousel.querySelector(".carousel-next");
    const indicators = Array.from(
      carousel.querySelectorAll(".carousel-indicator")
    );

    if (!track || slides.length === 0) return;

    let currentIndex = 0;
    const slideCount = slides.length;

    // Set initial position
    updateCarousel(0, false);

    // Previous button
    prevButton.addEventListener("click", () => {
      currentIndex = (currentIndex - 1 + slideCount) % slideCount;
      updateCarousel(currentIndex);
    });

    // Next button
    nextButton.addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % slideCount;
      updateCarousel(currentIndex);
    });

    // Indicators
    indicators.forEach((indicator, index) => {
      indicator.addEventListener("click", () => {
        currentIndex = index;
        updateCarousel(currentIndex);
      });
    });

    // Auto-play (optional)
    let autoplayInterval;
    const startAutoplay = () => {
      autoplayInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % slideCount;
        updateCarousel(currentIndex);
      }, 5000); // Change slide every 5 seconds
    };

    const stopAutoplay = () => {
      if (autoplayInterval) {
        clearInterval(autoplayInterval);
      }
    };

    // Start autoplay
    startAutoplay();

    // Pause on hover
    carousel.addEventListener("mouseenter", stopAutoplay);
    carousel.addEventListener("mouseleave", startAutoplay);

    // Pause when user interacts
    [prevButton, nextButton, ...indicators].forEach((element) => {
      element.addEventListener("click", () => {
        stopAutoplay();
        setTimeout(startAutoplay, 3000); // Resume after 3 seconds
      });
    });

    // Touch/Swipe support
    let touchStartX = 0;
    let touchEndX = 0;

    track.addEventListener(
      "touchstart",
      (e) => {
        touchStartX = e.changedTouches[0].screenX;
      },
      { passive: true }
    );

    track.addEventListener(
      "touchend",
      (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
      },
      { passive: true }
    );

    function handleSwipe() {
      const swipeThreshold = 50;
      const diff = touchStartX - touchEndX;

      if (Math.abs(diff) > swipeThreshold) {
        stopAutoplay();
        if (diff > 0) {
          // Swipe left - next slide
          currentIndex = (currentIndex + 1) % slideCount;
        } else {
          // Swipe right - previous slide
          currentIndex = (currentIndex - 1 + slideCount) % slideCount;
        }
        updateCarousel(currentIndex);
        setTimeout(startAutoplay, 3000);
      }
    }

    // Keyboard navigation
    document.addEventListener("keydown", (e) => {
      if (!isCarouselInView()) return;

      if (e.key === "ArrowLeft") {
        e.preventDefault();
        currentIndex = (currentIndex - 1 + slideCount) % slideCount;
        updateCarousel(currentIndex);
      } else if (e.key === "ArrowRight") {
        e.preventDefault();
        currentIndex = (currentIndex + 1) % slideCount;
        updateCarousel(currentIndex);
      }
    });

    function isCarouselInView() {
      const rect = carousel.getBoundingClientRect();
      return rect.top < window.innerHeight && rect.bottom > 0;
    }

    function updateCarousel(index, animated = true) {
      // Update track position
      const slideWidth = slides[0].offsetWidth;
      const offset = -slideWidth * index;

      if (animated) {
        track.style.transition = "transform 0.5s ease-in-out";
      } else {
        track.style.transition = "none";
      }

      track.style.transform = `translateX(${offset}px)`;

      // Update indicators
      indicators.forEach((indicator, i) => {
        if (i === index) {
          indicator.classList.add("active");
        } else {
          indicator.classList.remove("active");
        }
      });

      // Update ARIA attributes for accessibility
      slides.forEach((slide, i) => {
        if (i === index) {
          slide.setAttribute("aria-hidden", "false");
        } else {
          slide.setAttribute("aria-hidden", "true");
        }
      });
    }

    // Handle window resize
    let resizeTimeout;
    window.addEventListener("resize", () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        updateCarousel(currentIndex, false);
      }, 250);
    });
  }

  // Lightbox functionality for gallery images (optional enhancement)
  function initGalleryLightbox() {
    const galleryItems = document.querySelectorAll(".gallery-item-inner");

    galleryItems.forEach((item) => {
      item.style.cursor = "pointer";

      item.addEventListener("click", function () {
        const img = this.querySelector("img");
        if (!img) return;

        // Create lightbox
        const lightbox = document.createElement("div");
        lightbox.className = "gallery-lightbox";
        lightbox.innerHTML = `
          <div class="lightbox-overlay">
            <button class="lightbox-close" aria-label="Fermer">&times;</button>
            <img src="${img.src}" alt="${img.alt}">
          </div>
        `;

        document.body.appendChild(lightbox);
        document.body.style.overflow = "hidden";

        // Add styles dynamically
        if (!document.getElementById("lightbox-styles")) {
          const style = document.createElement("style");
          style.id = "lightbox-styles";
          style.textContent = `
            .gallery-lightbox {
              position: fixed;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              z-index: 9999;
              display: flex;
              align-items: center;
              justify-content: center;
              animation: fadeIn 0.3s ease;
            }
            .lightbox-overlay {
              position: relative;
              max-width: 90vw;
              max-height: 90vh;
              background: rgba(0, 0, 0, 0.95);
              padding: 40px;
              border-radius: 8px;
            }
            .lightbox-overlay img {
              max-width: 100%;
              max-height: 80vh;
              display: block;
              margin: 0 auto;
            }
            .lightbox-close {
              position: absolute;
              top: 10px;
              right: 10px;
              background: transparent;
              border: none;
              color: #fff;
              font-size: 40px;
              cursor: pointer;
              width: 40px;
              height: 40px;
              line-height: 1;
              padding: 0;
            }
            .lightbox-close:hover {
              opacity: 0.7;
            }
            @keyframes fadeIn {
              from { opacity: 0; }
              to { opacity: 1; }
            }
          `;
          document.head.appendChild(style);
        }

        // Close lightbox
        const closeBtn = lightbox.querySelector(".lightbox-close");
        const overlay = lightbox.querySelector(".lightbox-overlay");

        closeBtn.addEventListener("click", closeLightbox);
        lightbox.addEventListener("click", (e) => {
          if (e.target === lightbox) {
            closeLightbox();
          }
        });

        document.addEventListener("keydown", function escHandler(e) {
          if (e.key === "Escape") {
            closeLightbox();
            document.removeEventListener("keydown", escHandler);
          }
        });

        function closeLightbox() {
          lightbox.remove();
          document.body.style.overflow = "";
        }
      });
    });
  }

  // Initialize lightbox if on ateliers page
  if (document.querySelector(".ateliers-page")) {
    initGalleryLightbox();
  }
})();
