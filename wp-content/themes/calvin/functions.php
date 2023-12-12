<?php

// The right way for adding styles and scripts to the page
add_action('wp_enqueue_scripts', 'calvin_scripts');
add_action('after_setup_theme', 'calvin_register_nav_menu');

add_filter('excerpt_more', function ($more) {
  return '...';
});
add_filter( 'excerpt_length', 'true_excerpt_length');

add_filter( 'upload_mimes', 'svg_upload_allow' );
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

function true_excerpt_length( $length ){
	return 25;
}

function calvin_register_nav_menu()
{
  register_nav_menu('top_menu', 'Main menu');
  register_nav_menu('footer_menu', 'Site Links');

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails', array('post'));
  add_image_size('full', 1080, 566, ['left', 'top']);
  add_image_size('post_thumb', 1080, 566, ['left', 'top']);
  add_image_size('post_thumb_list', 279, 321, ['center', 'top']);
  add_theme_support('custom-logo', [
    'flex-width'  => false,
    'flex-height' => false,
    'header-text' => '',
    'unlink-homepage-logo' => false, // WP 5.5
  ]);
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

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

  // WP 5.1 +
  if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
    $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
  } else {
    $dosvg = ('.svg' === strtolower(substr($filename, -4)));
  }

  // mime тип был обнулен, поправим его
  // а также проверим право пользователя
  if ($dosvg) {

    // разрешим
    if (current_user_can('manage_options')) {

      $data['ext']  = 'svg';
      $data['type'] = 'image/svg+xml';
    }
    // запретим
    else {
      $data['ext']  = false;
      $data['type'] = false;
    }
  }

  return $data;
}
