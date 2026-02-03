<?php
function edmart_enqueue_assets() {

    // CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('aos', get_template_directory_uri() . '/assets/css/aos.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array(), null, true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'edmart_enqueue_assets');

function create_course_post_type() {

    $labels = array(
        'name'                => _x( 'Schedule Courses', 'Post Type General Name', 'edmart' ),
        'singular_name'       => _x( 'Schedule Course', 'Post Type Singular Name', 'edmart' ),
        'menu_name'           => __( 'Schedule Courses', 'edmart' ),
        'all_items'           => __( 'All Schedule Courses', 'edmart' ),
        'view_item'           => __( 'View Schedule Course', 'edmart' ),
        'add_new_item'        => __( 'Add New Schedule Course', 'edmart' ),
        'add_new'             => __( 'Add New', 'edmart' ),
        'edit_item'           => __( 'Edit Schedule Course', 'edmart' ),
        'update_item'         => __( 'Update Schedule Course', 'edmart' ),
        'search_items'        => __( 'Search Schedule Course', 'edmart' ),
        'not_found'           => __( 'Not found', 'edmart' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'edmart' ),
    );

    $args = array(
        'label'               => __( 'Schedule Courses', 'edmart' ),
        'description'         => __( 'Course information and schedules', 'edmart' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-learn-more',
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'schedule-course'),
    );

    register_post_type( 'schedule-course', $args );
}
add_action( 'init', 'create_course_post_type', 0 );


function create_course_taxonomy() {

    $labels = array(
        'name'              => _x( 'Courses', 'taxonomy general name', 'edmart' ),
        'singular_name'     => _x( 'Course', 'taxonomy singular name', 'edmart' ),
        'search_items'      => __( 'Search Courses', 'edmart' ),
        'all_items'         => __( 'All Courses', 'edmart' ),
        'edit_item'         => __( 'Edit Course', 'edmart' ),
        'update_item'       => __( 'Update Course', 'edmart' ),
        'add_new_item'      => __( 'Add New Course', 'edmart' ),
        'new_item_name'     => __( 'New Course Name', 'edmart' ),
        'menu_name'         => __( 'Courses', 'edmart' ),
    );

    $args = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'course' ),
    );

    register_taxonomy( 'course', array( 'schedule-course' ), $args );
}
add_action( 'init', 'create_course_taxonomy', 0 );


function theme_register_menus() {
    register_nav_menus([
        'primary_menu' => 'Primary Header Menu',
    ]);
}
add_action('after_setup_theme', 'theme_register_menus');

function add_nav_menu_classes($classes, $item, $args) {
    if ($args->theme_location == 'primary_menu') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_nav_menu_classes', 10, 3);

function add_nav_link_class($atts, $item, $args) {
    if ($args->theme_location == 'primary_menu') {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_nav_link_class', 10, 3);

//Footer
function theme_footer_menus() {
    register_nav_menus([
        'footer_menu' => 'Footer Company Menu',
        'footer_bottom_menu' => 'Footer Bottom Menu'
    ]);
}
add_action('after_setup_theme', 'theme_footer_menus');

function footer_customizer($wp_customize) {

    $wp_customize->add_section('footer_section', [
        'title' => 'Footer Settings',
        'priority' => 30
    ]);

    $fields = [
        'footer_description' => 'Footer Description',
        'footer_address' => 'Address',
        'footer_whatsapp' => 'WhatsApp Number',
        'footer_email' => 'Email',
        'facebook_link' => 'Facebook Link',
        'whatsapp_link' => 'WhatsApp Link',
        'instagram_link' => 'Instagram Link',
    ];

    foreach ($fields as $id => $label) {
        $wp_customize->add_setting($id);
        $wp_customize->add_control($id, [
            'label' => $label,
            'section' => 'footer_section',
            'type' => 'text'
        ]);
    }
}

add_action('customize_register', 'footer_customizer');


function footer_menu_li_class($classes, $item, $args) {
    if ($args->theme_location === 'footer_menu') {
        $classes[] = 'mb-12';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'footer_menu_li_class', 10, 3);


function footer_menu_link_class($atts, $item, $args) {
    if ($args->theme_location === 'footer_menu') {
        $atts['class'] = 'footer-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'footer_menu_link_class', 10, 3);