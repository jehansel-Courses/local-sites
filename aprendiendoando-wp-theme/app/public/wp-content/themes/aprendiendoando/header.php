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

<body class="homepage">
    <div id="page-wrapper">
        <!-- 
                ============================================================================
                https://developer.wordpress.org/reference/functions/bloginfo/
            -->
        <?php /** include_once ('function-bloginfo.php'); */ ?>
        <!-- 
                ============================================================================
            -->

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

                <!-- Banner -->
                <section id="banner">
                    <header>
                        <h2>Howdy. This is Dopetrope.</h2>
                        <p>A responsive template by HTML5 UP</p>
                    </header>
                </section>

                <!-- Intro -->
                <section id="intro" class="container">
                    <div class="row">
                        <div class="4u 12u(mobile)">
                            <section class="first">
                                <i class="icon featured fa-cog"></i>
                                <header>
                                    <h2>Ipsum consequat</h2>
                                </header>
                                <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.
                                </p>
                            </section>
                        </div>
                        <div class="4u 12u(mobile)">
                            <section class="middle">
                                <i class="icon featured alt fa-flash"></i>
                                <header>
                                    <h2>Magna etiam dolor</h2>
                                </header>
                                <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.
                                </p>
                            </section>
                        </div>
                        <div class="4u 12u(mobile)">
                            <section class="last">
                                <i class="icon featured alt2 fa-star"></i>
                                <header>
                                    <h2>Tempus adipiscing</h2>
                                </header>
                                <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.
                                </p>
                            </section>
                        </div>
                    </div>
                    <footer>
                        <ul class="actions">
                            <li><a href="#" class="button big">Get Started</a></li>
                            <li><a href="#" class="button alt big">Learn More</a></li>
                        </ul>
                    </footer>
                </section>

            </div>
        </div>