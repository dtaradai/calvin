<?php get_header(); ?>

<section class="s-content">

  <!-- page header
        ================================================== -->
  <div class="s-pageheader">
    <div class="row">
      <div class="column large-12">
        <h1 class="page-title">
          <span class="page-title__small-type"><?php esc_html_e('Category', 'calvin'); ?></span>
          <?php single_cat_title(); ?>
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

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php get_template_part('includes/article') ?>

          <?php endwhile;
        else : ?>

          <?php get_template_part('includes/no_posts') ?>

        <?php endif; ?>

        <!-- end article -->

      </div> <!-- end brick-wrapper -->

    </div> <!-- end masonry -->

    <?php if (have_posts() &&  wp_count_posts()->publish > $posts_per_page) { ?>
      <?php get_template_part('includes/pagination') ?>
    <?php } ?>

  </div> <!-- end s-bricks -->

</section>

<?php get_footer(); ?>