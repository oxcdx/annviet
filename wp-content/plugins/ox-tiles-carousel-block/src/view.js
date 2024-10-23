window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');
/* eslint-disable no-console */
(function($) {
  $(document).ready(function(){
    // Object to store modal instances
    var modals = {};

    // Loop through each gallery container and initialize modals
    $('.ox-tile-gallery').each(function() {
      var galleryContainer = $(this);
      var uniqueId = galleryContainer.data('unique-id');
      
      // Check if the element exists
      var modalElement = document.getElementById(uniqueId + 'Modal');
      if (!modalElement) {
        console.error('Modal element not found:', uniqueId + 'Modal');
        return;
      }

      // Initialize the modal and store it in the modals object
      modals[uniqueId] = new bootstrap.Modal(modalElement);
    });

    // Event listener for image clicks
    $(".ox-tile-gallery-inner-container").on("click", "img", function() {
      var galleryContainer = $(this).closest('.ox-tile-gallery');
      var uniqueId = galleryContainer.data('unique-id');
      var currentSlide = $(this).data('slide-no');
      var totalSlides = galleryContainer.find('.ox-tile-gallery-inner-container img').length;
      var nextSlides = (currentSlide + 5) > totalSlides ? totalSlides - currentSlide : 5;
      var prevSlides = (currentSlide - 5) < 0 ? currentSlide : 5;

      // Access the correct modal instance and show it
      var myModal = modals[uniqueId];
      if (myModal) {
        $('#' + uniqueId + 'Carousel').carousel(currentSlide);
        myModal.show();
      } else {
        console.error('Modal instance not found for unique ID:', uniqueId);
      }
    });

    // Additional logic for handling carousel indicators
    $('.ox-tile-gallery').each(function() {
      var galleryContainer = $(this);
      var uniqueId = galleryContainer.data('unique-id');
      var totalSlides = galleryContainer.find('.ox-tile-gallery-inner-container img').length;
      var currentSlide = 0;
      var nextSlides = 10;
      var prevSlides = 0;

      if (totalSlides > 11) {
        galleryContainer.find('.carousel-indicators button').each(function(index) {
          $(this).removeClass('visually-hidden');
          $(this).removeClass('ox-smaller-indicator');
          if (Math.abs(index - currentSlide) === nextSlides) {
            $(this).addClass('ox-smaller-indicator');
          }
          if (index - currentSlide > nextSlides) {
            $(this).addClass('visually-hidden');
          }
        });

        $('#' + uniqueId + 'Carousel').on('slide.bs.carousel', function (e) {
          currentSlide = e.to;
          nextSlides = (currentSlide + 5) > totalSlides ? totalSlides - currentSlide : 5;
          prevSlides = currentSlide < 5 ? currentSlide : 5;
          nextSlides = nextSlides + (5 - prevSlides);
          prevSlides = nextSlides > 5 ? prevSlides : prevSlides + (5 - nextSlides);

          galleryContainer.find('.carousel-indicators button').each(function(index) {
            $(this).removeClass('visually-hidden');
            $(this).removeClass('ox-smaller-indicator');

            if (index - currentSlide === nextSlides && currentSlide < (totalSlides - 5)) {
              $(this).addClass('ox-smaller-indicator');
            }
            if (nextSlides === prevSlides && currentSlide < (totalSlides - 5)) {
              if (index === (currentSlide - prevSlides) && currentSlide > 4) {
                $(this).addClass('ox-smaller-indicator');
              }
              if(index < (currentSlide - prevSlides) && currentSlide > 5) {
                $(this).addClass('visually-hidden');
              }
            } else {
              if (index === ((currentSlide - prevSlides) - 1) && currentSlide > 4) {
                $(this).addClass('ox-smaller-indicator');
              }
              if(index < ((currentSlide - prevSlides) - 1) && currentSlide > 5) {
                $(this).addClass('visually-hidden');
              }
            }
            if (index - currentSlide > nextSlides) {
              $(this).addClass('visually-hidden');
            }
          });
        });
      }
    });
  });
})(jQuery);