<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

// fix err
if ( ! function_exists( 'understrap_get_select_control_class' ) ) {
  /**
   * Returns the Bootstrap class for select controls.
   *
   * @since 1.2.0
   *
   * @return string The Bootstrap class for select controls.
   */
  function understrap_get_select_control_class() {
      return 'form-control';
  }
}

//
function preload_fonts() {
  echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/fonts/Oldschool-Grotesk-Regular.otf" as="font" type="font/otf" crossorigin>';
  echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/fonts/Oldschool-Grotesk-Medium.otf" as="font" type="font/otf" crossorigin>';
}
add_action('wp_head', 'preload_fonts');

/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_style( 'ox-fontawesome-styles', get_stylesheet_directory_uri() . '/css/ox-theme.css', array(), '1.1', 'all');
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );

/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

function add_active_class_to_nav_menu($classes, $item) {
    if (is_singular('projects') && $item->title == 'Projects') { // Change 'Projects' to the exact title of your menu item
        $classes[] = 'active';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class_to_nav_menu', 10, 2);


// function ox_register_acf_blocks() {
//   /**
//    * We register our block's with WordPress's handy
//    * register_block_type();
//    *
//    * @link https://developer.wordpress.org/reference/functions/register_block_type/
//    */
  
//   register_block_type( 
//     __DIR__ . '/blocks/ox-tiles-carousel-gallery',
//     array(
//       'render_callback' => 'myplugin_render_callback'
//     )
//   );
// }
// // Here we call our tt3child_register_acf_block() function on init.
// add_action( 'init', 'ox_register_acf_blocks' );

// function myplugin_render_callback( $attributes, $content ) {

//   // Do not enqueue if we are in the editor.
//   // This will depend on your use case.
//   if ( is_admin() ) {
//       return $content;
//   }

//   wp_enqueue_style(
//       'myplugin_style',
//       '/blocks/ox-tiles-carousel-gallery/gallery.css',
//       array(),
//       '1.0.0'
//   );

//   return $content;
// }

function enqueue_admin_scripts() {
  wp_enqueue_script('admin-scripts', get_stylesheet_directory_uri() . '/admin-scripts.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');