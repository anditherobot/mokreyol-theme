<!-- Featured Article and Recent Posts Row -->
<div class="col-lg-6 border p-3">


    <h3>Atik resan </h3>
    
    
    <!-- Recent Posts -->
    <ul class="list-unstyled">
        <?php
        $recent_args = array(
            'post_type' => 'post',
            'posts_per_page' => 15,
            'post__not_in' => get_option('sticky_posts'), // Exclude sticky posts
        );
        $recent_query = new WP_Query($recent_args);
        if ($recent_query->have_posts()) {
            while ($recent_query->have_posts()) {
                $recent_query->the_post();
                ?>
                <li class="d-flex mb-3">
                    <!-- Thumbnail Column -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="flex-shrink-0">
                            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-fluid recent-post-thumbnail" alt="<?php the_title(); ?>" style="object-fit: cover;">
                        </div>
                    <?php else : ?>
                        <div class="no-thumbnail flex-shrink-0"></div>
                    <?php endif; ?>
                    <!-- Content Column -->
                    <div class="flex-grow-1 ms-3">
                        <!-- Title Row -->
                        <div class="row">
                            <h5 class="mt-0 mb-1 col-12">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a>
                            </h5>
                        </div>
                        <!-- Detail Row -->
                        <div class="row text-muted" style="font-size: 0.8rem; font-weight: bold;">
                            <div class="col-12">
                                <?php echo get_the_date(); ?> | 
                              
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    foreach ($categories as $category) {
                                        echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> | ';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
            wp_reset_postdata();
        }
        ?>
    </ul>
    <!-- Load More Button -->
    <button id="load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="btn btn-outline-primary">Load More</button>

</div>

    


