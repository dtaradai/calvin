<?php get_header(); ?>

<!-- content
    ================================================== -->
<section class="s-content">


  <!-- page header
        ================================================== -->
  <div class="s-pageheader">
    <div class="row">
      <div class="column large-12">
        <h1 class="page-title">
          <span class="page-title__small-type"><?php esc_html_e('Archive', 'calvin') ?></span>
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
            the_post();

            get_template_part('templates/article');
          } ?>

      </div> <!-- end brick-wrapper -->

    </div> <!-- end masonry -->
    <?php get_template_part('templates/pagination') ?>

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