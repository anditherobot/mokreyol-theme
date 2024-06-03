<!-- Jumbotron -->
<div class="jumbotron mt-4 p-1 bg-light bg-gradient border rounded-3">
    <!-- Categories -->
    <div class="categories-container d-flex flex-wrap">
        <?php
        // Define the maximum number of categories to display before showing the "More" button
        $max_displayed_categories = 10;

        // Get all categories
        $categories = get_categories(array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ));

        // Counter to keep track of displayed categories
        $count = 0;

        // Loop through each category
        foreach ($categories as $category) {
            // Get the link to the category
            $category_link = get_category_link($category->term_id);

            // Output the category
            echo '<a href="' . esc_url($category_link) . '" class="category">' . esc_html($category->name) . '</a>';

            // Increment the counter
            $count++;

            // Check if the counter has reached the maximum number of displayed categories
            if ($count >= $max_displayed_categories) {
                break;
            }
        }

        // Output the "More" button if there are more categories
        if (count($categories) > $max_displayed_categories) {
            // Replace 'categories' with the slug of your "Categories" page
            $categories_page_link = get_permalink(get_page_by_path('lis-kategori'));
            echo '<a href="' . esc_url($categories_page_link) . '" class="category">Lis Tout</a>';
        }
        ?>
    </div>
</div>
