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

<nav id="parnters" class="navbar fixed-bottom navbar-dark ox-partners" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="container-fluid ox-landing-title position-relative">
    <div class="d-flex flex-column ps-md-2 pb-3">
		  <!-- Your site title as branding in the menu -->
      <?php if ( ! has_custom_logo() ) { ?>

        <?php if ( is_front_page() && is_home() ) : ?>

          <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

        <?php else : ?>

          <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

        <?php endif; ?>

        <?php
      } else {
        the_custom_logo();
      }
      ?>
      <div class="pb-4">
        <h2><?php the_field('subheading'); ?></h2>
        <h2><?php the_field('basic_info'); ?></h2>
      </div>
    </div>
		<!-- end custom logo -->
    <!-- d-flex flex-column align-items-end justify-content-end -->
    <div class="pb-5 pb-xs-4">
      <?php 
      $link = get_field('enter_button');
      if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a class="btn btn-light ox-enter-btn me-md-4" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fa fa-solid fa-arrow-right"></i></a>
      <?php endif; ?>
      <?php $bgImage = get_field('background_image');
            $caption = $bgImage['caption']; ?>
            <?php if( $caption ): ?>
              <div class="ox-landing-caption position-absolute bottom-0 end-0 ps-2 pe-2 pe-md-3 pb-3 pb-md-0 text-light lh-1"><?php echo ($caption); ?></div>
            <?php endif; ?>
    </div>
    <!-- <div class="ox-navbar-spacer"></div> -->

	</div><!-- .container(-fluid) -->
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

</nav><!-- .site-navigation -->
