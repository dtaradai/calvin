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
<?php get_template_part('templates/articles') ?>

</section> <!-- end s-content -->

<?php get_footer(); ?>