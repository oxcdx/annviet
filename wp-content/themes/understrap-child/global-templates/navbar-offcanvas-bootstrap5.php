<?php
/**
 * Header Navbar (bootstrap5).
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<nav id="main-nav" class="navbar navbar-light bg-white navbar-expand-lg ox-main-nav" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e('Main Navigation', 'understrap'); ?>
	</h2>


	<div class="container-fluid ps-3 pe-0 h-100">
    <?php $our_title = get_the_title();
if ($our_title == 'Home') { ?>
    <div class="pb-2 pt-2 border-end border-secondary border-1 h-100 d-flex align-items-center">
      <?php if (has_custom_logo()) {
          the_custom_logo();
      }
    ?>
    </div>
    <?php } else { ?>
    <div class="pb-2 pt-2 border-end border-secondary border-1 h-100 d-flex align-items-center">
      <?php if (has_custom_logo()) {
          the_custom_logo();
      }
        ?>
    </div>
    
      <?php // <h1 class="entry-title d-lg-none">single_post_title(); </h1>?>
    
    <?php } ?>
        
    <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
    
    <div class="offcanvas offcanvas-end bg-white h-100 justify-content-between" tabindex="-1" id="navbarNavOffcanvas">
      <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div><!-- .offcancas-header -->
      <div class="d-flex justify-content-end pt-3">
        <div class="me-3">
          <!--<button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
            <span>Random Page <i class="ms-2 fa fa-solid fa-random"></i></span>
          </button>-->
        </div>

        <div class="btn-group d-flex flex-column align-items-end pe-4 justify-content-end">
          <button type="button" class="btn btn-primary ox-search-toggle ox-filter-btn" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="sr-only">Search</span>
          </button>
          <div class="dropdown-menu ox-search-dropdown">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>

      <!-- The WordPress Menu goes here -->
      <?php
        wp_nav_menu(
            [
              'theme_location' => 'primary',
              'container_class' => 'offcanvas-body',
              'container_id' => '',
              'menu_class' => 'navbar-nav justify-content-end flex-grow-1 border-top',
              'fallback_cb' => '',
              'menu_id' => 'main-menu',
              'depth' => 2,
              'walker' => new Understrap_WP_Bootstrap_Navwalker(),
            ]
        );
      ?>
    </div><!-- .offcanvas -->

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
