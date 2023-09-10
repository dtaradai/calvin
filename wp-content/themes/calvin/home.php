<?php get_header(); ?>

<!-- hero
    ================================================== -->
<section id="hero" class="s-hero">

  <div class="s-hero__slider">

    <?php global $post;

    $myposts = get_posts([
      'numberposts' => 6,
      'offset'      => 1,
      'orderby'     => 'date',
    ]);

    if ($myposts) {
      foreach ($myposts as $post) {
        setup_postdata($post);
    ?>
        <div class="s-hero__slide">

          <div class="s-hero__slide-bg" style="background-image: url('<?php the_post_thumbnail_url('post_thumb_complete'); ?>');"></div>

          <div class="row s-hero__slide-content animate-this">
            <div class="column">
              <div class="s-hero__slide-meta">
                <span class="cat-links">
                  <?php get_template_part('templates/rubrics') ?>
                </span>
                <span class="byline">
                  <?php esc_html_e('Posted by', 'calvin') ?>
                  <span class="author">
                    <?php the_author_posts_link() ?>
                  </span>
                </span>
              </div>
              <h1 class="s-hero__slide-text">
                <a href="<?php the_permalink() ?>">
                  <?php the_title(); ?>
                </a>
              </h1>
            </div>
          </div>

        </div>
    <?php
      }
    }

    wp_reset_postdata(); // Сбрасываем $post
    ?>

  </div> <!-- end s-hero__slider -->

  <div class="s-hero__social hide-on-mobile-small">
    <p><?php esc_html_e('Follow', 'calvin') ?></p>
    <span></span>
    <ul class="s-hero__social-icons">
      <li><a href="<?php the_field('facebook'); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
      <li><a href="<?php the_field('twitter'); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
      <li><a href="<?php the_field('instagram'); ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
      <li><a href="<?php the_field('dribbble'); ?>"><i class="fab fa-dribbble" aria-hidden="true"></i></a></li>
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

    <!-- masonry
        ================================================== -->
    <div class="s-bricks">

      <div class="masonry">
        <div class="bricks-wrapper h-group">

          <div class="grid-sizer"></div>

          <div class="lines">
            <span></span>
            <span></span>
            <span></span>
          </div>

          <?php
          global $post, $wp_query;
          $paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;

          $query_args = array(
            'post_status' => 'publish',
            'paged' =>  get_query_var( 'page' ),
            'posts_per_page' => 4,
          );

          $query = new WP_Query($query_args);

          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post();
              get_template_part('templates/article');
            }

            wp_reset_postdata();
          } ?>

        </div> <!-- end brick-wrapper -->

      </div> <!-- end masonry -->

      <?php $temp_query = $wp_query;
      $wp_query   = null;
      $wp_query   = $query;

      get_template_part('templates/pagination');

      // Reset main query object.
      $wp_query = null;
      $wp_query = $temp_query; ?>


    </div> <!-- end s-bricks -->

  </div> <!-- end s-bricks -->

</section> <!-- end s-content -->

<?php get_footer(); ?>