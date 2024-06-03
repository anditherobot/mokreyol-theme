<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

  <header id="masthead" class="site-header">

    <div class="fixed-top bg-body-tertiary">

      <nav id="nav-main" class="navbar navbar-expand-lg bg-primary">

        <div class="<?= bootscore_container_class(); ?>">
      
          <!-- Navbar Brand and Tagline -->
<div class="navbar-brand-container">
    <a class="navbar-brand xs d-md-none navtext" href="<?= esc_url(home_url()); ?>">Mokreyòl</a>
    <a class="navbar-brand md d-none d-md-block navtext" href="<?= esc_url(home_url()); ?>">MoKreyòl</a>
    <p class="tagline">Platfòm nimerik an kreyòl</p>
</div>

          <!-- Offcanvas Navbar -->
          <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvas-navbar">
            <div class="offcanvas-header">
              <span class="h5 offcanvas-title"><?php esc_html_e('Menu', 'bootscore'); ?></span>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

              <!-- Bootstrap 5 Nav Walker Main Menu -->
              <?php
              wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => '',
                'fallback_cb'    => '__return_false',
                'items_wrap'     => '<ul id="bootscore-navbar" class="navbar-nav ms-auto %2$s">%3$s</ul>',
                'depth'          => 2,
                'walker'         => new bootstrap_5_wp_nav_menu_walker()
              ));
              ?>

             
            </div>
          </div>

          <div class="header-actions d-flex align-items-center">
            <?php
              get_template_part('template-parts/header/actions');
            ?>

            <!-- Navbar Toggler -->
            <div class="mobile-menu-toggle-container">
  
    <button class="btn btn-outline-light d-lg-none ms-1 ms-md-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar">
    <div class="menu-label  d-lg-none">MENU</div>    
    <i class="fa-solid fa-bars"></i>
        
        <span class="visually-hidden-focusable">Meni</span>
    </button>
</div>


          </div><!-- .header-actions -->
        </div><!-- bootscore_container_class(); -->
      </nav><!-- .navbar -->
    </div><!-- .fixed-top .bg-light -->
  </header><!-- #masthead -->
