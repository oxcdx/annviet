document.addEventListener('DOMContentLoaded', function() {
  console.log('DOM fully loaded and parsed');

  function hideParentElements() {
      var elements = document.querySelectorAll('.editor-block-list-item-acf-galleryx');
      console.log('Found elements:', elements);

      elements.forEach(function(element) {
          console.log('Processing element:', element);

          if (element.parentElement) {
              console.log('Parent element:', element.parentElement);
              element.parentElement.style.display = 'none';
          } else {
              console.log('No parent element found for:', element);
          }
      });
  }

  // Initial check
  hideParentElements();

  // Observe for dynamically added elements
  var observer = new MutationObserver(function(mutationsList) {
      for (var mutation of mutationsList) {
          if (mutation.type === 'childList') {
              hideParentElements();
          }
      }
  });

  observer.observe(document.body, { childList: true, subtree: true });

  // Add click event listener to the button
  document.addEventListener('click', function(event) {
      if (event.target.matches('.components-button.block-editor-inserter__toggle.has-icon')) {
          console.log('Button clicked');
          hideParentElements();
      }
  });
});

console.log('admin-scripts.js loaded');