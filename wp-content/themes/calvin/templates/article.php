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
        <span class="byline""><?php esc_html_e('By:', 'calvin') ?>
                                        <span class='author'>
                                            <?php the_author_posts_link() ?>
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
    <a class="entry__more-link" href="<?php the_permalink() ?>"><?php esc_html_e('Learn More', 'calvin') ?></a>
  </div>
</article>