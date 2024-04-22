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