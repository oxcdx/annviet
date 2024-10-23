<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="" id="wrapper-footer">

	<div class="">
    
    <footer class="site-footer" id="colophon">
      <div class="mt-md-3 w-100 border-top">
        <div class="p-3">An Việt Archives &copy; <?php echo date("Y"); ?></div>
      </div>
    </footer><!-- #colophon -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

