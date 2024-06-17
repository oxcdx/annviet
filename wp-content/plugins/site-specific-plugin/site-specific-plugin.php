<?php
/*
Plugin Name: OX Site-Specific
Description: Site Specific Plugin for AVA
*/

// Start Adding Functions Below this Line

// Creating a function to create our CPT
function google_fonts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Dosis:wght@400;500&display=block', false);
}
add_action('wp_enqueue_scripts', 'google_fonts');

add_filter('wpseo_metabox_prio', function() {
    return 'low';
});

function custom_post_type() {
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => __('Events'),
        'singular_name'       => __('Event'),
        'menu_name'           => __('Events'),
        'parent_item_colon'   => __('Parent Event'),
        'all_items'           => __('All Events'),
        'view_item'           => __('View Event'),
        'add_new_item'        => __('Add New Event'),
        'add_new'             => __('Add New'),
        'edit_item'           => __('Edit Event'),
        'update_item'         => __('Update Event'),
        'search_items'        => __('Search Event'),
        'not_found'           => __('Not Found'),
        'not_found_in_trash'  => __('Not found in Trash'),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label'               => __('events'),
        'description'         => __(''),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
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
        'show_in_graphql'     => true,
        'graphql_single_name' => 'event',
        'graphql_plural_name' => 'events',
        'show_in_rest'        => true,
        'taxonomies'          => array('category'),
    );

    // Registering your Custom Post Type
    register_post_type('events', $args);
}
add_action('init', 'custom_post_type', 0);

function custom_post_type_projects() {
  // Set UI labels for Custom Post Type
  $labels = array(
      'name'                => __('Projects'),
      'singular_name'       => __('Project'),
      'menu_name'           => __('Projects'),
      'parent_item_colon'   => __('Parent Project'),
      'all_items'           => __('All Projects'),
      'view_item'           => __('View Project'),
      'add_new_item'        => __('Add New Project'),
      'add_new'             => __('Add New'),
      'edit_item'           => __('Edit Project'),
      'update_item'         => __('Update Project'),
      'search_items'        => __('Search Project'),
      'not_found'           => __('Not Found'),
      'not_found_in_trash'  => __('Not found in Trash'),
  );

  // Set other options for Custom Post Type
  $args = array(
      'label'               => __('projects'),
      'description'         => __(''),
      'labels'              => $labels,
      'supports'            => array('title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-portfolio',
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'show_in_graphql'     => true,
      'graphql_single_name' => 'project',
      'graphql_plural_name' => 'projects',
      'show_in_rest'        => true,
      'taxonomies'          => array('category'),
  );

  // Registering your Custom Post Type
  register_post_type('projects', $args);
}
add_action('init', 'custom_post_type_projects', 0);

function ox_custom_new_menu() {
    register_nav_menu('partner-logos-menu',__('Partner Logos'));
}
add_action('init', 'ox_custom_new_menu');

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args) {
    // loop
    foreach($items as &$item) {
        // vars
        $logo = get_field('logo', $item);
        $logoBtn = get_field('logo_button', $item);

        // append icon
        if($logo) {
            $item->title = '<span>' . $item->title . '</span>';
            $item->title .= '<img src="' . esc_url($logo['url']). '" alt="' . esc_attr($logo['alt']) . '" />';
        }

        if($logoBtn) {
            $imgx = wp_get_attachment_image_src($logoBtn['id'], "large");
            $url = $imgx[0];
            $width = $imgx[1] / 2;
            $height = $imgx[2] / 2;
            $item->title = '<img style="width: ' . $width  . 'px; height: auto; margin-top: 4px;" src="' . esc_url($logoBtn['url']). '" alt="' . esc_attr($logoBtn['alt']) . '" />';
        }
    }
    // return
    return $items;
}

// Stop Adding Functions Below this Line
?>