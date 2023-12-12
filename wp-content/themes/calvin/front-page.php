<?php
/*
Template Name: Front page
*/
?>

<?php get_header('home'); ?>

<!-- hero
    ================================================== -->
<section id="hero" class="s-hero">

  <div class="s-hero__slider">

    <?php
    $args = [
      'numberposts' => 3,
      'post_type' => 'post',
    ];

    $posts = get_posts($args);

    foreach ($posts as $post) { ?>
      <div class="s-hero__slide">

        <div class="s-hero__slide-bg" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), '')) ?>');"></div>

        <div class="row s-hero__slide-content animate-this">
          <div class="column">
            <div class="s-hero__slide-meta">
              <span class="cat-links">
                <?php the_category(' '); ?>
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
                <?php the_title() ?>
              </a>
            </h1>
          </div>
        </div>

      </div>
    <?php }

    wp_reset_postdata();
    ?>

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

        $paged = (get_query_var('page')) ? get_query_var('page') : 1;

        $args = array(
          'post_type'      => 'post',
          'orderby'        => 'date',
          'order'          => 'DESC',
          'paged' => $paged
        );
        $q = new WP_Query($args);
        $temp_query = $wp_query;
        $wp_query   = NULL;
        $wp_query   = $q;
        ?>

        <?php if ($q->have_posts()) : ?>

          <?php while ($q->have_posts()) : $q->the_post(); ?>

            <?php get_template_part('includes/article'); ?>

          <?php endwhile; ?>
        <?php else : ?>

          <?php get_template_part('includes/no_posts', 'none'); ?>

        <?php endif; ?>

      </div> <!-- end brick-wrapper -->

    </div> <!-- end masonry -->

    <?php if ($q->have_posts() && $q->found_posts > $posts_per_page) { ?>
      <?php get_template_part('includes/pagination') ?>
    <?php } ?>

    <?php wp_reset_postdata(); ?>

    <?php $wp_query = NULL; ?>
    <?php $wp_query = $temp_query; ?>
  </div> <!-- end s-bricks -->

</section> <!-- end s-content -->


<?php get_footer(); ?>