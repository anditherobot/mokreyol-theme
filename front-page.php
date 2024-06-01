<?php

/**
 * The template for displaying the front page
 *
 * This is the template that displays the front page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="content" class="site-content <?= bootscore_container_class(); ?> py-5 mt-5">
    <div id="primary" class="content-area">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>

        <div class="row">
            <div class="<?= bootscore_main_col_class(); ?>">

                <main id="main" class="site-main">

                <?php get_template_part('jumbotron'); ?>

                    <?php get_template_part('recent-posts'); ?>

                </main>

            </div>

        </div>


    </div>

    <?php
    get_footer();
    ?>