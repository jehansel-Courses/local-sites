<?php
/* 
        https://developer.wordpress.org/reference/functions/have_posts/
        Determines whether current WordPress query has posts to loop over.

        https://developer.wordpress.org/reference/functions/the_post/
        Iterate the post index in the loop.

        if (have_posts()) {
            while (have_posts()) {
                the_post();
            }
        }

        <?php if ( have_posts()) : while( have_posts()) : the_post(); ?>
        <!-- post -->
        <?php endwhile; ?>
        <!-- post navigation -->
        <?php else: ?>
        <!-- no post found -->
        <p class="error">No hay ninguna información para mostrar</p>
        <?php endif; ?>
    */
?>

<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?>>

<head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="?php bloginfo('stylesheet_directory'); ?>/assets/js/ie/html5shiv.js"></script><![endif]-->

    <!-- Se comenta la siguiente línea porque se va a "mover" al functions.php (clase 04) -->
    <!-- <link rel="stylesheet" href="?php bloginfo('stylesheet_url'); ?>" /> -->
    <!-- Se agrega la siguiente línea para llamar el sytle.css declarado en el functions.php -->
    <!-- https://developer.wordpress.org/reference/functions/wp_head/ -->
    <!-- Fires the wp_head action. -->
    <?php wp_head(); ?>

    <!--[if lte IE 8]><link rel="stylesheet" href="?php bloginfo('stylesheet_directory'); ?>/assets/css/ie8.css" /><![endif]-->
</head>


<body class="no-sidebar">
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header-wrapper">
            <div id="header">

                <!-- Logo -->
                <!-- 
					https://developer.wordpress.org/reference/functions/home_url/
					Retrieves the URL for the current site where the front end is accessible.			
				-->
                <h1><a href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a></h1>

                <!-- Nav -->
                <!-- 
					https://developer.wordpress.org/reference/functions/wp_nav_menu/
					Displays a navigation menu.
				  -->
                <?php
                $args = array(
                    'theme_location'       => 'principal',
                    'container'            => 'nav',
                    'container_id'         => 'nav'
                    /*
                        'menu'                 => '',
                        'container'            => 'div',
                        'container_class'      => '',
                        'container_id'         => '',
                        'container_aria_label' => '',
                        'menu_class'           => 'menu',
                        'menu_id'              => '',
                        'echo'                 => true,
                        'fallback_cb'          => 'wp_page_menu',
                        'before'               => '',
                        'after'                => '',
                        'link_before'          => '',
                        'link_after'           => '',
                        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'item_spacing'         => 'preserve',
                        'depth'                => 0,
                        'walker'               => '',
                        'theme_location'       => '',
                        */
                );

                // $args = wp_parse_args( $args, $defaults );
                wp_nav_menu($args);
                ?>

            </div>
        </div>