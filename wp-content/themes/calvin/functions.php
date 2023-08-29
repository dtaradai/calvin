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

/**
 * Cuts the specified text up to specified number of characters.
 * Strips any of shortcodes.
 *
 * Important changes:
 * 2.8.0 - Improved logic to work with HTML tags in cutting text.
 * 2.7.2 - Cuts direct URLs from content.
 * 2.7.0 - `sanitize_callback` parameter.
 * 2.6.5 - `ignore_more` parameter.
 * 2.6.2 - Regular to remove blocky shortcodes like: [foo]some data[/foo].
 * 2.6   - Removed the `save_format` parameter and replaced it with two parameters `autop` and `save_tags`.
 *
 * @author Kama (wp-kama.ru)
 * @version 2.8.0
 *
 * @param string|array $args {
 *     Optional. Arguments to customize output.
 *
 *     @type int       $maxchar            Max number of characters.
 *     @type string    $text               The text to be cut. The default is `post_excerpt` if there is no `post_content`.
 *                                         If the text has `<!--more-->`, then `maxchar` is ignored and everything
 *                                         up to `<!--more-->` is taken including HTML.
 *     @type bool      $autop              Replace the line breaks with `<p>` and `<br>` or not?
 *     @type string    $more_text          The text of `Read more` link.
 *     @type string    $save_tags          Tags to be left in the text. For example `<strong><b><a>`.
 *     @type string    $sanitize_callback  Text cleaning function.
 *     @type bool      $ignore_more        Whether to ignore `<!--more-->` in the content.
 *
 * }
 *
 * @return string HTML
 */
function kama_excerpt($args = '')
{
  global $post;

  if (is_string($args)) {
    parse_str($args, $args);
  }

  $rg = (object) array_merge([
    'maxchar'           => 350,
    'text'              => '',
    'autop'             => true,
    'more_text'         => 'Читать дальше...',
    'ignore_more'       => true,
    'save_tags'         => '<strong><b><a><em><i><var><code><span>',
    'sanitize_callback' => static function (string $text, object $rg) {
      return strip_tags($text, $rg->save_tags);
    },
  ], $args);

  $rg = apply_filters('kama_excerpt_args', $rg);

  if (!$rg->text) {
    $rg->text = $post->post_excerpt ?: $post->post_content;
  }

  $text = $rg->text;
  // strip content shortcodes: [foo]some data[/foo]. Consider markdown
  $text = preg_replace('~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text);
  // strip others shortcodes: [singlepic id=3]. Consider markdown
  $text = preg_replace('~\[/?[^\]]*\](?!\()~', '', $text);
  // strip direct URLs
  $text = preg_replace('~(?<=\s)https?://.+\s~', '', $text);
  $text = trim($text);

  // <!--more-->
  if (!$rg->ignore_more && strpos($text, '<!--more-->')) {

    preg_match('/(.*)<!--more-->/s', $text, $mm);

    $text = trim($mm[1]);

    $text_append = sprintf(' <a href="%s#more-%d">%s</a>', get_permalink($post), $post->ID, $rg->more_text);
  }
  // text, excerpt, content
  else {

    $text = call_user_func($rg->sanitize_callback, $text, $rg);
    $has_tags = false !== strpos($text, '<');

    // collect html tags
    if ($has_tags) {
      $tags_collection = [];
      $nn = 0;

      $text = preg_replace_callback('/<[^>]+>/', static function ($match) use (&$tags_collection, &$nn) {
        $nn++;
        $holder = "~$nn";
        $tags_collection[$holder] = $match[0];

        return $holder;
      }, $text);
    }

    // cut text
    $cuted_text = mb_substr($text, 0, $rg->maxchar);
    if ($text !== $cuted_text) {

      // del last word, it not complate in 99%
      $text = preg_replace('/(.*)\s\S*$/s', '\\1...', trim($cuted_text));
    }

    // bring html tags back
    if ($has_tags) {
      $text = strtr($text, $tags_collection);
      $text = force_balance_tags($text);
    }
  }

  // add <p> tags. Simple analog of wpautop()
  if ($rg->autop) {

    $text = preg_replace(
      ["/\r/", "/\n{2,}/", "/\n/"],
      ['', '</p><p>', '<br />'],
      "<p>$text</p>"
    );
  }

  $text = apply_filters('kama_excerpt', $text, $rg);

  if (isset($text_append)) {
    $text .= $text_append;
  }

  return $text;
}
