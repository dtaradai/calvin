<div class="row">
  <div class="column large-12">
    <?php
    $args = array(
      'show_all'     => false, // показаны все страницы участвующие в пагинации
      'end_size'     => 1,     // количество страниц на концах
      'mid_size'     => 3,     // количество страниц вокруг текущей
      'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
      'prev_text'    => __('Prev'),
      'next_text'    => __('Next'),
      'type'         => 'array',
      'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
    );

    $pgn = paginate_links($args);
    ?>
    <nav class="pgn">
      <ul>
        <?php foreach ($pgn as $page) {
          echo '<li>' . $page . '</li>';
        } ?>
      </ul>
    </nav> <!-- end pgn -->
  </div> <!-- end column -->
</div>