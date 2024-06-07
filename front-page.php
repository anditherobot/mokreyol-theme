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
            <main id="main" class="site-main">
                
                <!-- New Row for Featured Post and Buttons -->
                <div class="row mb-4" style="margin-top: 40px;>
                    <div class="col-md-6">
                        <?php
                        // Display the latest post from 'Featured' category
                        $featured_query = new WP_Query(array(
                            'category_name' => 'Featured',
                            'posts_per_page' => 1,
                        ));
                        if ($featured_query->have_posts()) :
                            while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                                <div class="featured-post" style="background-color: #f0f0f0; border-radius: 10px; padding: 20px;">
                                    <h3 class="post-title"><?php the_title(); ?></h3>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="featured-image">
                                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="post-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>No featured posts found</p>';
                        endif;
                        ?>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-around">
                        <a href="/diksyone" class="btn btn-secondary mb-3">Diksyonè</a>
                        <a href="/jwet" class="btn btn-secondary mb-3">Jwèt</a>
                        <a href="/art" class="btn btn-secondary">Art</a>
                    </div>
                </div>

                <!-- Existing content -->
                <?php get_template_part('jumbotron'); ?>
                <?php get_template_part('recent-posts'); ?>
                <?php get_template_part('widgets-section'); ?>

            </main>
        </div>

    </div>
</div>

<?php
get_footer();
?>

<style>
    .featured-post {
        background-color: #f0f0f0;
        border-radius: 10px;
        padding: 20px;
    }
    .featured-image img {
        border-radius: 10px;
    }
</style>
