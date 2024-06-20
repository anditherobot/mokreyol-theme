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

function get_random_term_from_json() {
    $file_path = get_template_directory() . '/data/data.file.json'; // Adjust path if necessary
    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        $terms = json_decode($json_data, true);
        if (!empty($terms)) {
            $random_index = array_rand($terms);
            return $terms[$random_index];
        }
    }
    return ['Term' => 'Diksyonè', 'Definition' => '']; // Fallback term
}

?>

<div id="content" class="site-content <?= bootscore_container_class(); ?> py-5 mt-5">
    <div id="primary" class="content-area">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>

        <!-- Category Bar Row -->
        <?php get_template_part('jumbotron'); ?>

        <div class="row">
            <main id="main" class="site-main">
                
                <!-- New Row for Featured Post and Buttons -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <?php
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
                        <?php
                        $random_term = get_random_term_from_json();
                        ?>
                        <a href="https://diksyone.mokreyol.com" class="card shadow-sm text-decoration-none mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= esc_html($random_term['Term']); ?></h5>
                                <p class="card-text"><?= esc_html($random_term['Definition']); ?></p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Existing content -->
          
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
        padding: 0.5rem 1rem;
        font-size: 1rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-alt-color-1:hover {
        background-color: #0056b3;
        transform: translateY(-3px);
    }
    .categories-container .category {
        margin-right: 10px;
        margin-bottom: 10px;
        padding: 5px 10px;
        background-color: #f1f1f1;
        border-radius: 3px;
        text-decoration: none;
        color: #333;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .categories-container .category:hover {
        background-color: #e1e1e1;
        color: #000;
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
