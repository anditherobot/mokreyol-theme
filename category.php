<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="content" class="site-content <?= bootscore_container_class(); ?> py-5 mt-5">
<header class="page-header mb-4 mt-4">
  <div class="row">
    <!-- Column 1 -->
    <div class="col-md-6">
      <nav class="mb-2">
        <a href="javascript:history.back()" class="btn btn-outline-primary me-2">Back</a>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-outline-secondary">All Categories</a>
      </nav>
      <h1><?php single_cat_title(); ?></h1>
      <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
    </div>
    <!-- Column 2 -->
    <div class="col-md-6 text-md-end">
      <p class="category-info mb-2">Kantite atik: <?php echo $wp_query->found_posts; ?></p>
      <ul class="list-unstyled">
        <?php
          // Query for the 5 most recent posts in the current category
          $recent_posts = new WP_Query(array(
            'posts_per_page' => 5,
            'category_name' => single_cat_title('', false),
            'post_status' => 'publish',
            'no_found_rows' => true // This speeds up the query
          ));

          if ($recent_posts->have_posts()) {
            while ($recent_posts->have_posts()) {
              $recent_posts->the_post();
              echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            wp_reset_postdata();
          }
        ?>
      </ul>
    </div>
  </div>
</header>


  <div id="primary" class="content-area">
    <main id="main" class="<?= bootscore_main_col_class(); ?> site-main">

      <?php if (have_posts()) : ?>
        <div class="row">
        <?php while (have_posts()) : the_post(); ?>
          <article class="col-12 mb-4 d-flex">
            <!-- Thumbnail Column -->
            <div class="thumbnail-col me-3">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'style' => 'width: 100px; height: 100px; object-fit: cover;')); ?>
              <?php else: ?>
                <div class="no-thumbnail"></div>
              <?php endif; ?>
            </div>
            <!-- Content Column -->
            <div class="content-col">
              <h2 class="h5 mb-1">
                <a href="<?php the_permalink(); ?>" class="text-decoration-none"><?php the_title(); ?></a>
              </h2>
              <p class="meta small text-body-secondary mb-2">
                <?php bootscore_date(); bootscore_author(); ?>
              </p>
              <div class="post-summary">
                <?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <footer class="entry-footer">
        <?php bootscore_pagination(); ?>
      </footer>

    </main>
  </div>


</div>

<?php
get_footer();
