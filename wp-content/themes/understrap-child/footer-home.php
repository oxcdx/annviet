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

<div class="fixed-bottom ox-partners-home" id="wrapper-footer">

	<div class="">

				<footer class="site-footer" id="colophon">
        <div class="mt-md-3 w-100">
          <?php
            wp_nav_menu(
              array(
                'theme_location'  => 'partner-logos-menu',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'partner-logos-menu d-md-flex align-items-center justify-content-between w-100',
                'fallback_cb'     => '',
                'menu_id'         => 'partner-logos-menu',
                'depth'           => 2,
                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
              )
            );
            ?>
          </div>
				</footer><!-- #colophon -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

