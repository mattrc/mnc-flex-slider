<?php
/**
 * Define Custom Post Type
 */

define('CTP_NAME', 'Slider Images');
define('CTP_SINGLE', 'Slider Image');
define('CTP_TYPE', 'slider_image');

add_theme_support('post-thumbnails', array(CTP_TYPE));

add_action('init', function(){
    $labels = array(
        'name' => _x(CTP_NAME, 'post type general name'),
        'singular_name' => _x(CTP_SINGLE, 'post type singular name'),
        'add_new' => _x('Add New', CTP_SINGLE),
        'add_new_item' => __('Add New ' . CTP_SINGLE),
        'edit_item' => __('Edit ' . CTP_SINGLE),
        'new_item' => __('New ' . CTP_SINGLE),
        'all_items' => __('All ' . CTP_NAME),
        'view_item' => __('View ' . CTP_SINGLE),
        'search_items' => __('Search ' . CTP_NAME),
        'not_found' =>  __('No ' . CTP_NAME . ' found'),
        'not_found_in_trash' => __('No ' . CTP_NAME . ' found in Trash'), 
        'parent_item_colon' => '',
        'menu_name' => CTP_NAME
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, 
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'thumbnail' )
    ); 
    register_post_type(CTP_TYPE, $args);
});

?>