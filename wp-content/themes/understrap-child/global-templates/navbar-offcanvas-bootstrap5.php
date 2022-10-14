<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-light bg-white navbar-expand-lg ox-main-nav" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="container-fluid justify-content-between">
  <?php $our_title = get_the_title();
    if($our_title == "Home" ) : ?>
    <div class="d-lg-none ox-invert-logo">
      <?php if (has_custom_logo() ) { 
        the_custom_logo();
        }
      ?>
    </div>
  <?php else : ?>
    <h1 class="entry-title d-lg-none"><?php single_post_title(); ?></h1>
  <?php endif; ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

    <div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="navbarNavOffcanvas">

      <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div><!-- .offcancas-header -->

      <!-- The WordPress Menu goes here -->
      <?php
      wp_nav_menu(
        array(
          'theme_location'  => 'primary',
          'container_class' => 'offcanvas-body',
          'container_id'    => '',
          'menu_class'      => 'navbar-nav justify-content-center flex-grow-1',
          'fallback_cb'     => '',
          'menu_id'         => 'main-menu',
          'depth'           => 2,
          'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        )
      );
      ?>
    </div><!-- .offcanvas -->

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
