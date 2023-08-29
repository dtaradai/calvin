<?php get_header('site'); ?>

<!-- content
    ================================================== -->
<section class="s-content">


  <!-- page header
        ================================================== -->
  <div class="s-pageheader">
    <div class="row">
      <div class="column large-12">
        <h1 class="page-title">
          <span class="page-title__small-type"><?php esc_html_e('Category', 'calvin') ?></span>
          <?php echo get_queried_object()->name; ?>
        </h1>
      </div>
    </div>
  </div> <!-- end s-pageheader-->


  <!-- masonry
        ================================================== -->
  <div class="s-bricks s-bricks--half-top-padding">

    <div class="masonry">
      <div class="bricks-wrapper h-group">

        <div class="grid-sizer"></div>

        <div class="lines">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <?php if (have_posts()) {
          while (have_posts()) {
            the_post(); ?>
            <article class="brick entry" data-aos="fade-up">

              <div class="entry__thumb">
                <a href="<?php the_permalink() ?>" class="thumb-link">
                  <?php the_post_thumbnail('post_thumb_list'); ?>
                </a>
              </div> <!-- end entry__thumb -->

              <div class="entry__text">
                <div class="entry__header">
                  <h1 class="entry__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

                  <div class="entry__meta">
                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href=" <?php the_author() ?>"><?php the_author_posts_link() ?></a>
                    </span>
                    </span>
                    <span class="cat-links">
                      <?php $links = array_map(function ($category) {
                        return sprintf(
                          '<a href="%s">%s</a>', // Шаблон вывода ссылки
                          esc_url(get_category_link($category)), // Ссылка на рубрику
                          esc_html($category->name) // Название рубрики
                        );
                      }, get_the_category());

                      echo implode(' ', $links); ?>
                    </span>
                  </div>
                </div>
                <div class="entry__excerpt">
                  <p>
                    <?php echo kama_excerpt(['maxchar' => 200]); ?>
                  </p>
                </div>
                <a class="entry__more-link" href="<?php the_permalink() ?>">Learn More</a>
              </div> <!-- end entry__text -->

            </article> <!-- end article -->


          <?php } ?>

      </div> <!-- end brick-wrapper -->

    </div> <!-- end masonry -->
    <div class="row">
      <div class="column large-12">
        <?php the_posts_pagination([
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
          ]) ?>

      </div> <!-- end column -->
    </div> <!-- end row -->

  <?php } else { ?>

    <article class="brick entry" data-aos="fade-up">
      <div class="entry__text">
        <div class="entry__header">
          <h1 class="entry__title">No post!</h1>
        </div>
      </div>
    </article>
  </div> <!-- end brick-wrapper -->

  </div> <!-- end masonry -->

<?php } ?>





</div> <!-- end s-bricks -->

</section> <!-- end s-content -->

<?php get_footer(); ?>