<?php
/**
 * Activando el soporte para los sidebar
 * https://codex.wordpress.org/es:API_de_Widget
 */

use Yoast\WP\SEO\Presenters\Admin\Sidebar_Presenter;

if (function_exists('register_sidebar(  )')) {
    
}


/* 
Activando el soporte para las imágenes
https://developer.wordpress.org/reference/functions/add_theme_support/
Registers theme support for a given feature.
*/
// add_theme_support('post-thumbnails');

/* 
https://codex.wordpress.org/Post_Thumbnails
Post Thumbnails
*/
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150, true); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    // add_image_size('category-thumb', 300, 9999); //300 pixels wide (and unlimited height)
    add_image_size('category-thumb-374-260', 374, 260, true); //300 pixels wide (and unlimited height)
    add_image_size('category-thumb-580-272', 580, 272, true); //300 pixels wide (and unlimited height)

    add_image_size('category-full-783-290', 783, 290, true); //300 pixels wide (and unlimited height)


}



/**
 * https://developer.wordpress.org/reference/functions/register_nav_menus/
 * Registers navigation menu locations for a theme.
 */

/*  register_nav_menus( array(
    'principal' => 'Menú Principal'
) );
 */
register_nav_menus(array(
    'principal' => 'Menu principal',
    'footer' => 'Menu footer',
));

function misrecursos()
{

    /**
        https://developer.wordpress.org/reference/functions/wp_enqueue_style/
        Registers the style if source provided (does NOT overwrite) and enqueues.
     */
    wp_enqueue_style("style-name", get_stylesheet_uri());

    /**
        https://developer.wordpress.org/reference/functions/wp_enqueue_script/
        Registers the script if $src provided (does NOT overwrite), and enqueues it.
        
        <!-- Se comentan las siguientes líneas porque se incluiran el funtions.php -->
        <script src="?php bloginfo('stylesheet_directory'); ?>/assets/js/jquery.min.js"></script>
        <script src="?php bloginfo('stylesheet_directory'); ?>/assets/js/jquery.dropotron.min.js"></script>
        <script src="?php bloginfo('stylesheet_directory'); ?>/assets/js/skel.min.js"></script>
        <script src="?php bloginfo('stylesheet_directory'); ?>/assets/js/skel-viewport.min.js"></script>
        <script src="?php bloginfo('stylesheet_directory'); ?>/assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="?php bloginfo('stylesheet_directory'); ?>/assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="?php bloginfo('stylesheet_directory'); ?>/assets/js/main.js"></script>
     */
    wp_enqueue_script('jquery-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), '1.11.3', true);
    wp_enqueue_script('dropotron', get_template_directory_uri() . '/assets/js/jquery.dropotron.min.js', array('jquery'), '1.4.3', true);
    wp_enqueue_script('skel', get_template_directory_uri() . '/assets/js/skel.min.js', array('jquery'), '3.0.0', true);
    wp_enqueue_script('skel-viewport', get_template_directory_uri() . '/assets/js/skel-viewport.min.js', array('jquery'), '3.0.0', true);
    wp_enqueue_script('util', get_template_directory_uri() . '/assets/js/util.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'misrecursos');
