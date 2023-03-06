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

<!-- Header -->
<?php get_header('nohome'); ?>

<!-- Main -->
<div id="main-wrapper">
    <div class="container">

        <!-- Content -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- post -->
                <article class="box post">
                    <a href="#" class="image featured">
                        <img src="<?php bloginfo('template_directory'); ?>/images/pic01.jpg" alt="" /></a>
                    </a>
                    <header>
                        <!-- 
                        https://developer.wordpress.org/reference/functions/the_title/
                        Displays or retrieves the current post title with optional markup.
                    -->
                        <h2 class="text--red"><?php the_title(); ?></h2>
                    </header>

                    <!-- 
                        https://developer.wordpress.org/reference/functions/the_content/
                        Displays the post content.
                    -->
                    <?php the_content(); ?>

                </article>

            <?php endwhile; ?>
            <!-- post navigation -->
        <?php else : ?>
            <!-- no post found -->
            <p class="error">No hay ninguna información para mostrar</p>
        <?php endif; ?>



    </div>
</div>

<!-- Main -->
<div id="main-wrapper">
    <div class="container">

        <div class="row">

            <?php

            /**
             * https://developer.wordpress.org/reference/functions/query_posts/
             * Sets up The Loop with query parameters.
             * 
             * https://developer.wordpress.org/reference/classes/wp_query/#category-parameters
             * The WordPress Query class.
             */
            query_posts(
                array(
                    "posts_per_page" => 6,
                    "category_name" => "portafolio",
                    "orderby" => "title",
                    "order" => "ASC"
                )
            );
            ?>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="4u 12u(mobile)">
                        <!-- post -->
                        <section class="box">
                            <!-- <a href="#" class="image featured"><img src="<?php //bloginfo('template_directory'); 
                                                                                ?>/images/pic02.jpg" alt="" /></a> -->
                            <a href="#" class="image featured">
                                <?php
                                // check if the post has a Post Thumbnail assigned to it.
                                // https://codex.wordpress.org/Post_Thumbnails
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('category-thumb-374-260', array('class' => 'alignleft'));
                                }
                                ?>
                            </a>

                            <header>
                                <!-- 
                                    https://developer.wordpress.org/reference/functions/the_title/ 
                                    Displays or retrieves the current post title with optional markup.
                                -->
                                <h3><?php the_title(); ?></h3>
                            </header>

                            <!-- 
                                https://developer.wordpress.org/reference/functions/the_excerpt/
                                Displays the post excerpt. 
                            -->
                            <p><?php the_excerpt(); ?></p>

                            <footer>
                                <!-- 
                                    https://developer.wordpress.org/reference/functions/the_permalink/
                                    Displays the permalink for the current post. 
                                -->
                                <a href="<?php the_permalink(); ?>" class="button alt">Leer más</a>
                            </footer>
                        </section>
                    </div>
                <?php endwhile; ?>
                <!-- post navigation -->
            <?php else : ?>
                <!-- no post found -->
                <p class="error">No hay ninguna información para mostrar</p>
            <?php endif; ?>

            <!-- 						
                Se resetea al loop para poderlo usar nuevamente con el Blog
                https://developer.wordpress.org/reference/functions/wp_reset_query/
                Destroys the previous query and sets up a new query.
            -->
            <?php wp_reset_query(); ?>

        </div>

    </div>
</div>

<!-- Footer -->
<?php get_footer(); ?>