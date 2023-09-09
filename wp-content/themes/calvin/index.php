<?php get_header(); ?>

<h1>Index</h1>

<!-- hero
    ================================================== -->
<section id="hero" class="s-hero">

  <div class="s-hero__slider">

    <div class="s-hero__slide">

      <div class="s-hero__slide-bg" style="background-image: url('images/slide1-bg-3000.jpg');"></div>

      <div class="row s-hero__slide-content animate-this">
        <div class="column">
          <div class="s-hero__slide-meta">
            <span class="cat-links">
              <a href="#0">Lifestyle</a>
              <a href="#0">Design</a>
            </span>
            <span class="byline">
              Posted by
              <span class="author">
                <a href="#0">Jonathan Doe</a>
              </span>
            </span>
          </div>
          <h1 class="s-hero__slide-text">
            <a href="#0">
              Tips and Ideas to Help You Start Freelancing.
            </a>
          </h1>
        </div>
      </div>

    </div> <!-- end s-hero__slide -->

    <div class="s-hero__slide">

      <div class="s-hero__slide-bg" style="background-image: url('images/slide2-bg-3000.jpg');"></div>

      <div class="row s-hero__slide-content animate-this">
        <div class="column">
          <div class="s-hero__slide-meta">
            <span class="cat-links">
              <a href="#0">Work</a>
            </span>
            <span class="byline">
              Posted by
              <span class="author">
                <a href="#0">Juan Dela Cruz</a>
              </span>
            </span>
          </div>
          <h1 class="s-hero__slide-text">
            <a href="#0">
              Minimalism: The Art of Keeping It Simple.
            </a>
          </h1>
        </div>
      </div>

    </div> <!-- end s-hero__slide -->

    <div class="s-hero__slide"">

                <div class=" s-hero__slide-bg" style="background-image: url('images/slide3-bg-3000.jpg');"></div>

    <div class="row s-hero__slide-content animate-this">
      <div class="column">
        <div class="s-hero__slide-meta">
          <span class="cat-links">
            <a href="#0">Health</a>
            <a href="#0">Lifestyle</a>
          </span>
          <span class="byline">
            Posted by
            <span class="author">
              <a href="#0">Jane Doe</a>
            </span>
          </span>
        </div>
        <h1 class="s-hero__slide-text">
          <a href="#0">
            10 Reasons Why Being in Nature Is Good For You.
          </a>
        </h1>
      </div>
    </div>

  </div> <!-- end s-hero__slide -->

  </div> <!-- end s-hero__slider -->

  <div class="s-hero__social hide-on-mobile-small">
    <p>Follow</p>
    <span></span>
    <ul class="s-hero__social-icons">
      <li><a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
      <li><a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
      <li><a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
      <li><a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i></a></li>
    </ul>
  </div> <!-- end s-hero__social -->

  <div class="nav-arrows s-hero__nav-arrows">
    <button class="s-hero__arrow-prev">
      <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
        <path d="M1.5 7.5l4-4m-4 4l4 4m-4-4H14" stroke="currentColor"></path>
      </svg>
    </button>
    <button class="s-hero__arrow-next">
      <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
        <path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor"></path>
      </svg>
    </button>
  </div> <!-- end s-hero__arrows -->

</section> <!-- end s-hero -->


<!-- content
    ================================================== -->
<section class="s-content s-content--no-top-padding">


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
                      <?php get_template_part('templates/rubrics') ?>
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

            </article>


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