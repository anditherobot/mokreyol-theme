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
                <div class="row mb-4">
                    <div class="col-md-6">
                        <?php
                        // Display the latest post from 'Featured' category
                        $featured_query = new WP_Query(array(
                            'category_name' => 'Featured',
                            'posts_per_page' => 1,
                        ));
                        if ($featured_query->have_posts()) :
                            while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="featured-post-link">
                                    <div class="featured-post card shadow-sm">
                                        <div class="card-body">
                                            <h3 class="card-title"><?php the_title(); ?></h3>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="featured-image">
                                                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="post-excerpt card-text">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>No featured posts found</p>';
                        endif;
                        ?>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-around">
                        <a href="diksyone.mokreyol.com" class="card mb-3 btn-alt-color-1 text-decoration-none shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Diksyonè</h5>
                            </div>
                        </a>
                        <a href="/jwet" class="card mb-3 btn-alt-color-2 text-decoration-none shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Jwèt</h5>
                            </div>
                        </a>
                        <a href="/art" class="card btn-alt-color-3 text-decoration-none shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Art</h5>
                            </div>
                        </a>
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
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .featured-post:hover {
        background-color: #f8f9fa;
        transform: translateY(-5px);
    }
    .featured-image img {
        border-radius: 10px;
        width: 100%;
        height: auto;
    }
    .featured-post-link {
        text-decoration: none;
        color: inherit;
    }
    .btn-alt-color-1 {
        background-color: #007bff;
        border-color: #007bff;
        color: #ffffff;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-alt-color-2 {
        background-color: #28a745;
        border-color: #28a745;
        color: #ffffff;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-alt-color-3 {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #ffffff;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-alt-color-1:hover, .btn-alt-color-2:hover, .btn-alt-color-3:hover {
        transform: translateY(-3px);
    }
    .card-body {
        padding: 1.5rem;
    }
    .card-title {
        margin-bottom: 0;
        font-size: 1.25rem;
    }
    @media (max-width: 767.98px) {
        .featured-post, .col-md-6 {
            margin-bottom: 20px;
        }
        .featured-image img {
            width: 100%;
            height: auto;
        }
    }
</style>
