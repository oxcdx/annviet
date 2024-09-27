/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min.js';

/* eslint-disable no-console */
// console.log( 'Hello World! (from create-block-ox-tile-gallery block)' );
(function($) {
  $(document).ready(function(){
    // console.log('document ready');
    var myModal = new bootstrap.Modal(document.getElementById('galleryModal'))
    var currentSlide = 0;
    var totalSlides = $('.ox-tile-gallery-inner-container img').length;
    var nextSlides = 10;
    var prevSlides = 0;

    // console.log('totalSlides: ' + totalSlides);

    $(".ox-tile-gallery-inner-container").on("click","img",function(){
      // console.log('ready');
      currentSlide = $(this).data('slide-no');
      nextSlides = (currentSlide + 5) > totalSlides ? totalSlides - currentSlide : 5;
      prevSlides = (currentSlide - 5) < 0 ? currentSlide : 5;

      $('#carouselGallery').carousel($(this).data('slide-no'));
      myModal.show();
    });

    // add class to all indicators more than 5 away from currentSlide
    if (totalSlides > 11) {  

      $('.carousel-indicators button').each(function(index) {
        $(this).removeClass('visually-hidden');
        $(this).removeClass('ox-smaller-indicator');
        if (Math.abs(index - currentSlide) === nextSlides) {
          $(this).addClass('ox-smaller-indicator');
        }
        if (index - currentSlide > nextSlides) {
          $(this).addClass('visually-hidden');
        }
        // if (index - currentSlide < prevSlides) {
        //   $(this).addClass('visually-hidden');
        // }
      }
      );

      // when slide changes, add class to all indicators more than 5 away from currentSlide
      $('#carouselGallery').on('slide.bs.carousel', function (e) {
        currentSlide = e.to;
        nextSlides = (currentSlide + 5) > totalSlides ? totalSlides - currentSlide : 5;
        prevSlides = currentSlide < 5 ? currentSlide : 5;
        nextSlides = nextSlides + (5 - prevSlides);
        prevSlides = nextSlides > 5 ? prevSlides : prevSlides + (5 - nextSlides);

        // console.log('currentSlide: ' + currentSlide);
        // console.log('nextSlides: ' + nextSlides);
        // console.log('prevSlides: ' + prevSlides);

        $('.carousel-indicators button').each(function(index) {
          // console.log('index: ' + index);
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
        }
        );
      })
    }


  });
})(jQuery);
/* eslint-enable no-console */
