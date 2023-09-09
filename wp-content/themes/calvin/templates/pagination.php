<div class="row">
  <div class="column large-12">
    <?php 
    
    the_posts_pagination([
      'show_all'     => false, // показаны все страницы участвующие в пагинации
      'end_size'     => 1,     // количество страниц на концах
      'mid_size'     => 2,     // количество страниц вокруг текущей
      'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
      'prev_text'    => __('Prev'),
      'next_text'    => __(' Next'),
      'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
      'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
      'screen_reader_text' => __('Posts navigation'),
      'class'        => 'pgn', // CSS класс, добавлено в 5.5.0.
    ]) 
    
    ?>

  </div> <!-- end column -->
</div> <!-- end row -->