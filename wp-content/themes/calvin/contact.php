<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<!-- content
    ================================================== -->
<section class="s-content">

  <div class="row">
    <div class="column large-12">

      <article class="s-content__entry">

        <div class="s-content__primary">

          <div class="s-content__page-content">

            <?php the_content() ?>

            <?php
            $args = ['action' => 'send_message'];
            get_template_part('templates/cForm', '', $args)
            ?>

          </div> <!-- end s-entry__page-content -->

        </div> <!-- end s-content__primary -->
      </article> <!-- end entry -->

    </div> <!-- end column -->
  </div> <!-- end row -->

</section> <!-- end s-content -->

<?php get_footer(); ?>