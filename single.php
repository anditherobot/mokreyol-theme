<?php
/**
 * Template Post Type: post
 *
 * @version 5.3.1
 */

get_header();
?>

<div id="content" class="site-content <?= bootscore_container_class(); ?> py-5 mt-4">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <?php the_breadcrumb(); ?>

    <div class="row justify-content-center">
      <!-- Main Content Column -->
      <div class="col">
        <main id="main" class="site-main">

          <!-- Post Card -->
          <div class="card mb-4">
            <div class="card-body">

              <!-- First Row: Post Info Left, Featured Image Right -->
              <div class="row mb-4">
                <!-- Post Info -->
                <div class="col-md-6">
                  <header class="entry-header">
                    <?php the_post(); ?>
                    <?php bootscore_category_badge(); ?>
                    <h1><?php the_title(); ?></h1>
                  </header>
                </div>
                <!-- Featured Image -->
                <div class="col-md-6">
                  <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                      <?php bootscore_post_thumbnail(); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <!-- Second Row: Post Text -->
              <div class="row">
                <div class="col">
                  <div class="entry-content">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>

            </div>

            <!-- Card Footer with Three Columns: Previous, Post Meta, Next -->
            <div class="card-footer row">
              <div class="col-md-4">
                <?php previous_post_link('%link', 'Previous'); ?>
              </div>
              <div class="col-md-4 text-center">
                <p class="entry-meta">
                  <small class="text-body-tertiary">
                    <?php
                    bs_get_published_date();
                    bootscore_author();
                    bootscore_comment_count();
                    ?>
                  </small>
                </p>
              </div>
              <div class="col-md-4 text-end">
                <?php next_post_link('%link', 'Next'); ?>
              </div>
            </div>

          </div> <!-- End of Post Card -->

          <!-- Footer Section (Tags, Related Posts, Navigation, Comments) -->
          <footer class="entry-footer clear-both mt-4">
            <div class="mb-4">
              <?php bootscore_tags(); ?>
            </div>
            <!-- Related posts using bS Swiper plugin -->
            <?php if (function_exists('bootscore_related_posts')) bootscore_related_posts(); ?>
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item"><?php previous_post_link('%link'); ?></li>
                <li class="page-item"><?php next_post_link('%link'); ?></li>
              </ul>
            </nav>
            <?php comments_template(); ?>
          </footer>

        </main>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>
