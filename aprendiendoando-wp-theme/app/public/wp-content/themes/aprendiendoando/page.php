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
                        <h2><?php the_title(); ?></h2>
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

<!-- Footer -->
<?php get_footer(); ?>