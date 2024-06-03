<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */

?>

<footer>



  <div class="bootscore-info bg-body-tertiary text-body-dark border-top py-2 text-center">
    <div class="<?= bootscore_container_class(); ?>">
      <?php if (is_active_sidebar('footer-info')) : ?>
        <?php dynamic_sidebar('footer-info'); ?>
      <?php endif; ?>
      <small class="bootscore-copyright"><span class="cr-symbol">&copy;</span>&nbsp;<?= date('Y'); ?> <?php bloginfo('name'); ?></small>
    </div>
  </div>

</footer>

<!-- To top button -->
<a href="#" class="btn btn-primary shadow top-button position-fixed zi-1020"><i class="fa-solid fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
