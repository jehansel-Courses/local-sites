<!-- Header -->
<?php get_header(); ?>

<!-- Main -->
<div id="main-wrapper">
    <div class="container">

        <div class="row">
            <div class="12u">
                <!-- Portfolio -->
                <section>

                    <header class="major">
                        <h2>My Portfolio</h2>
                    </header>

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
                </section>
            </div>
        </div>

        <div class="row">
            <div class="12u">
                <!-- Blog -->
                <section>

                    <header class="major">
                        <h2>The Blog</h2>
                    </header>

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
                                "posts_per_page" => 2,
                                "category_name" => "blog",
                                "orderby" => "title",
                                "order" => "ASC"
                            )
                        );
                        ?>

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="6u 12u(mobile)">
                                    <!-- post -->
                                    <section class="box">
                                        <a href="#" class="image featured">
                                            <?php
                                            // check if the post has a Post Thumbnail assigned to it.
                                            // https://codex.wordpress.org/Post_Thumbnails
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('category-thumb-580-272');
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
                        <?php // wp_reset_query(); 
                        ?>

                    </div>
                </section>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<?php get_footer(); ?>