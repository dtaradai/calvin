<?php

// The right way for adding styles and scripts to the page
add_action('wp_enqueue_scripts', 'calvin_scripts');
add_action( 'after_setup_theme', 'calvin_register_nav_menu' );

function calvin_register_nav_menu() {
	register_nav_menu( 'top_menu', 'Main menu' );
	register_nav_menu( 'footer_menu', 'Site Links' );
}

function calvin_scripts()
{
  $script_url = get_template_directory_uri() . '/assets/';
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('styles', $script_url . 'css/styles.css');
  wp_enqueue_style('vendor', $script_url . 'css/vendor.css');

  wp_deregister_script('jquery');
  wp_register_script('jquery', $script_url . 'js/jquery-3.5.0.min.js');
  wp_enqueue_script('jquery');
  wp_enqueue_script('modernizr', $script_url . 'js/modernizr.js', array(), '1.0.0', true);
  wp_enqueue_script('fontawesome', $script_url . 'js/fontawesome/all.min.js', array(), '1.0.0', true);
  wp_enqueue_script('plugins', $script_url . 'js/plugins.js', array(), '1.0.0', true);
  wp_enqueue_script('main', $script_url . 'js/main.js', array(), '1.0.0', true);
}


/* Отключаем админ панель для всех пользователей. */
show_admin_bar(false);
