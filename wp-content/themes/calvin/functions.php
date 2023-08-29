<?php

add_action('wp_enqueue_scripts', 'calvin_scripts');
add_action('after_setup_theme', 'calvin_register_nav_menu');

function calvin_scripts()
{
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('vendor.css', get_template_directory_uri() . '/assets/css/vendor.css');
  wp_enqueue_style('styles.css', get_template_directory_uri() . '/assets/css/styles.css');


  // подключаем js файл темы
  if (!is_admin()) {
    // Убираем подключенную старую версию библиотеки
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.5.0.min.js', array(), '1.0', true);
  }
  wp_enqueue_script('modernizr.js', get_template_directory_uri() . '/assets/js/modernizr.js', array('jquery'), '1.0', true);
  wp_enqueue_script('fontawesome/all.min.js', get_template_directory_uri() . '/assets/js/fontawesome/all.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('plugins', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), '1.0', true);
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}

function calvin_register_nav_menu()
{
  register_nav_menus([
    'header_menu' => 'Header menu',
    'footer_menu' => 'Footer menu',
  ]);
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails',);
  add_theme_support('custom-logo');
  add_image_size('post_thumb_complete', 1200, 600, true);
  add_image_size('post_thumb_list', 600, 690, true);
}
