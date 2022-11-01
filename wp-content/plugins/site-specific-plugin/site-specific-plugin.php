<?php

/*

Plugin Name: OX Site-Specific

Description: Site Specific Plugin for Bowater

*/

/* Start Adding Functions Below this Line */

/*

* Creating a function to create our CPT

*/

function google_fonts() {
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Dosis:wght@400;500&display=block', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );

add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );



function custom_post_type() {



// Set UI labels for Custom Post Type

    $labels = array(

        'name'                => __( 'Events' ),

        'singular_name'       => __( 'Event' ),

        'menu_name'           => __( 'Events' ),

        'parent_item_colon'   => __( 'Parent Event' ),

        'all_items'           => __( 'All Events' ),

        'view_item'           => __( 'View Event' ),

        'add_new_item'        => __( 'Add New Event' ),

        'add_new'             => __( 'Add New' ),

        'edit_item'           => __( 'Edit Event' ),

        'update_item'         => __( 'Update Event' ),

        'search_items'        => __( 'Search Event' ),

        'not_found'           => __( 'Not Found' ),

        'not_found_in_trash'  => __( 'Not found in Trash' ),

    );


// Set other options for Custom Post Type


    $args = array(

        'label'               => __( 'events' ),

        'description'         => __( '' ),

        'labels'              => $labels,

        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),

        // 'taxonomies'          => array( 'genres' ),

        'hierarchical'        => true,

        'public'              => true,

        'show_ui'             => true,

        'show_in_menu'        => true,

        'show_in_nav_menus'   => true,

        'show_in_admin_bar'   => true,

        'menu_position'       => 5,

        'menu_icon'           => 'dashicons-calendar-alt',

        'can_export'          => true,

        'has_archive'         => true,

        'exclude_from_search' => false,

        'publicly_queryable'  => true,

        'capability_type'     => 'post',

        'show_in_graphql' => true,

        'graphql_single_name' => 'event',

        'graphql_plural_name' => 'events',

        'show_in_rest' => true,

        'taxonomies'          => array( 'category' ),

    );

    // Registering your Custom Post Type

    register_post_type( 'events', $args );

}

add_action( 'init', 'custom_post_type', 0 );


function ox_custom_new_menu() {
  register_nav_menu('partner-logos-menu',__( 'Partner Logos' ));
}
add_action( 'init', 'ox_custom_new_menu' );


add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$logo = get_field('logo', $item);
		$logoBtn = get_field('logo_button', $item);

		
		// append icon
		if( $logo ) {
			$item->title = '<span>' . $item->title . '</span>';
			$item->title .= '<img src="' . esc_url($logo['url']). '" alt="' . esc_attr($logo['alt']) . '" />';
		}
    
		if( $logoBtn ) {
      $imgx = wp_get_attachment_image_src( $logoBtn['id'] , "large" );
      $url = $imgx[0];
      $width = $imgx[1] / 2;
      $height = $imgx[2] / 2;
			$item->title = '<img style="width: ' . $width  . 'px; height: auto; margin-top: 4px;" src="' . esc_url($logoBtn['url']). '" alt="' . esc_attr($logoBtn['alt']) . '" />';

		}
		
	}
	// return
	return $items;
	
}



// function ox_add_cpt_to_archive_page( $query ) {
//   if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
//     $query->set( 'post_type', array(
//      'post', 'projects'
//         ));
//     }
//     return $query;
// }
// add_filter( 'pre_get_posts', 'ox_add_cpt_to_archive_page' );


// function filter_projects() {
//   $postType = $_POST['type'];
//   $catSlug = $_POST['category'];

//   $ajaxposts = new WP_Query([
//     'post_type' => $postType,
//     'posts_per_page' => -1,
//     'paged'          => 1,
//     'category_name' => $catSlug,
//     'orderby' => 'date',
//     'order' => 'desc',
//   ]);
//   $response = '';

//   if($ajaxposts->have_posts()) {
//     while($ajaxposts->have_posts()) : $ajaxposts->the_post();
//       $response .= get_template_part( 'loop-templates/content', get_post_format() );
//     endwhile;
//   } else {
//     $response = 'emptyx';
//   }

//   echo $response;
//   exit;
// }
// add_action('wp_ajax_filter_projects', 'filter_projects');
// add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');
/* Hook into the 'init' action so that the function

* Containing our post type registration is not

* unnecessarily executed.

*/



/* CUSTOMIZE EXCERPT READ MORE CONTENT
================================================== */

// function understrap_all_excerpts_get_more_link( $post_excerpt ) {
//   if( $post_excerpt ) {
//     $post_excerpt . '...';
//   } else {
//     $post_excerpt . '';
//   }
// 	return $post_excerpt;
// }

// add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );



/* Stop Adding Functions Below this Line */

?>

