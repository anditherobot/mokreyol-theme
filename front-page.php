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

                    <!-- Jumbotron -->
                    <div class="jumbotron mt-4 p-1 bg-light bg-gradient border rounded-3">
                        <h1 class="display-4">Kategori</h1>

                        <!-- Categories -->
                        <!-- Categories -->
                        <div class="categories-container d-flex flex-wrap">
                            <?php
                            // Define your special or parent categories


                            // Get all categories
                            $categories = get_categories(array(
                                'orderby' => 'name',
                                'order'   => 'ASC'
                            ));

                            // Loop through each category
                            foreach ($categories as $category) {
                                // Check if the current category is one of the special categories

                                // Get the link to the category
                                $category_link = get_category_link($category->term_id);

                                // Output the category
                                echo '<a href="' . esc_url($category_link) . '" class="category">' . esc_html($category->name) . '</a>';
                            }
                            ?>

                        </div>

                    </div>

                    <?php get_template_part('recent-posts'); ?>

                    <!-- Important Links Row -->
                    <div class="row my-4">
                        <div class="col-12">
                            <!-- Add your important links here -->
                            <!-- ... -->
                        </div>
                    </div>

                    <!-- Categories in Grid Row -->
                    <div class="row my-4">
                        <!-- Add your categories here -->
                        <!-- ... -->
                    </div>

                </main>

            </div>

        </div>


    </div>

    <?php
    get_footer();
    ?>