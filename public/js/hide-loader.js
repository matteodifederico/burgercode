/**
 * Hide loader spinner on window is ready
 * Related spinner mark-up in in /template-parts/header.php
 */
window.addEventListener("DOMContentLoaded", function() {
  document.getElementById('loader-container').remove();
});
