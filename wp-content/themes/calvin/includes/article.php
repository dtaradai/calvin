<article class="brick entry" data-aos="fade-up">

  <div class="entry__thumb">
    <a href="<?php the_permalink() ?>" class="thumb-link">
      <?php if (has_post_thumbnail()) {
        the_post_thumbnail('post_thumb_list');
      } ?>
    </a>
  </div>

  <div class="entry__text">
    <div class="entry__header">
      <h1 class="entry__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

      <div class="entry__meta">
        <span class="byline""><?php esc_html_e('By', 'calvin') ?>:
                      <span class='author'>
                          <?php the_author_posts_link() ?>
                      </span>
                    </span>
                    <span class=" cat-links">
          <?php the_category(' '); ?>
        </span>
      </div>
    </div>
    <div class="entry__excerpt">
      <p>
        <?php the_excerpt(); ?>
      </p>
    </div>
    <a class="entry__more-link" href="<?php the_permalink() ?>"><?php esc_html_e('Read More', 'calvin') ?></a>
  </div> <!-- end entry__text -->

</article>