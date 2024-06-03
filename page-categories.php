<?php
/*
Template Name: Categories
*/
?>

<?php get_header(); ?>
<div id="content" class="site-content <?= bootscore_container_class(); ?> py-5 mt-5">
    <div id="primary" class="content-area"></div>
<div class="jumbotron mt-4 p-1 bg-light bg-gradient border rounded-3">
    <div class="categories-container d-flex flex-wrap">
        <?php
        // Get all categories
        $categories = get_categories(array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ));

        // Loop through each category
        foreach ($categories as $category) {
            // Get the link to the category
            $category_link = get_category_link($category->term_id);

            // Output the category
            echo '<a href="' . esc_url($category_link) . '" class="category">' . esc_html($category->name) . '</a>';
        }
        ?>
    </div>
</div>
</div></div>
<?php get_footer(); ?>
