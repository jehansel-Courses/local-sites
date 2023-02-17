<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
    <h1>Soy category-noticias.php</h1>
    <?php if (have_posts()) : ?>
        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="taxonomy-description">', '</div>');
            ?>
        </header><!-- .page-header -->
    <?php endif; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

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

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php
get_footer();
