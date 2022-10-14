<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html style="margin-top: 0!important;" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

  <?php $bgImage = get_field('background_image');
        $caption = $bgImage['caption']; ?>
  <div  class="bg-image position-absolute w-100 top-0 left-0" style="height: 100vh;">
    <img onload="this.style.opacity=1"  style="height: 100%; width: 100%; object-fit: cover;transition: opacity .6s ease .2ss;" src="<?php echo esc_url($bgImage['url']); ?>"  />
  </div>
	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar position-absolute w-100">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<?php get_template_part( 'global-templates/navbar', 'landing' ); ?>

	</header><!-- #wrapper-navbar end -->
