<?php
/*
Plugin Name: MNC FlexSlider
Plugin URI:
Description: A simple plugin that integrates FlexSlider (http://flex.madebymufffin.com/) with WordPress using custom post types.
Author: Matias Mancini
Version: 1.8
Author URI: http://matiasmancini.com.ar/

Init: jQuery(window).load(function($){$('.flexslider').flexslider()});
*/
define('MNCFS_PATH', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');
define('MNCFS_NAME', 'MNC Flex Slider');
define('MNCFS_VERSION', '1.8');

require_once('slider-img-type.php');



// Load Scrips and styles
/* TODO : has_shortcode() to conditional enqueue */
add_action('wp_enqueue_scripts', function(){
    wp_enqueue_script('flexslider', MNCFS_PATH . 'jquery.flexslider-min.js', array('jquery'), '1.8');
    wp_enqueue_style('flexslider_css', MNCFS_PATH . 'flexslider.css');
});

// Get the Slider
function mncfs_get_slider(){
    global $post;
    $img_size = array(464, 365);
    $slider = '<div class="flexslider">';
        $slider .= '<ul class="slides">';

        query_posts('post_type=slider_image');

        if(have_posts()) : while(have_posts()) : the_post();
            $img = get_the_post_thumbnail($post->ID, $img_size);
            $slider .= '<li>' . $img . '</li>';
        endwhile; endif; wp_reset_query();

        $slider .= '</ul>';
    $slider .= '</div>';

    return $slider;
}

// Add the shortcode for the slider (for use in editor)
add_shortcode('mncfs_slider', function($atts, $content = null){
    $slider = mncfs_get_slider();
    return $slider;
});

// Add Template Tag (for use in themes)
function mncfs_template_tag_slider(){
    echo mncfs_get_slider();
}

?>
