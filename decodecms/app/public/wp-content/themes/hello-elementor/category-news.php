<?php

/**
 * The template for displaying archive pages.
 *
 * @package HelloElementor
 */
get_header();

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<main id="content" class="site-main" role="main">
    <h2>HELLO ELEMENTOR -> category-news.php</h2>
    <?php if (apply_filters('hello_elementor_page_title', true)) : ?>
        <header class="page-header">
            <?php
            the_archive_title('<h1 class="entry-title">', '</h1>');
            the_archive_description('<p class="archive-description">', '</p>');
            ?>
        </header>
    <?php endif; ?>
    <h2>HEADER ends</h2>

    <div class="page-content">

        <?php
        /**
         * 
         * Mostrar subcategorias de una categoría principal en WordPress
         * https://decodecms.com/mostrar-subcategorias-una-categoria-listado-entradas/
         * https://youtu.be/xlhftck4Rf0
         *  
         */
        $list_subcat = array();
        if (!empty($cat)) $list_subcat = get_categories(['hide_empty' => false, 'parent' => $cat]);

        if (count($list_subcat)) :

            echo "<div class='subcat'>";
            foreach ($list_subcat as $item_subcat) {

                $category_link = get_category_link($item_subcat->term_id);

                echo '<div>';
                echo '<h3><a href="' . $category_link . '">' . $item_subcat->name . '</a></h3>';
                echo '<div><a href="' . $category_link . '">' . $item_subcat->description . '</a></div>';
                echo '</div>';
            }
            echo "</div>";

        endif;
        ?>

    </div>

    <?php wp_link_pages(); ?>

    <?php
    global $wp_query;
    if ($wp_query->max_num_pages > 1) :
    ?>
        <nav class="pagination" role="navigation">
            <?php /* Translators: HTML arrow */ ?>
            <div class="nav-previous"><?php next_posts_link(sprintf(__('%s older', 'hello-elementor'), '<span class="meta-nav">&larr;</span>')); ?></div>
            <?php /* Translators: HTML arrow */ ?>
            <div class="nav-next"><?php previous_posts_link(sprintf(__('newer %s', 'hello-elementor'), '<span class="meta-nav">&rarr;</span>')); ?></div>
        </nav>
    <?php endif; ?>
</main>