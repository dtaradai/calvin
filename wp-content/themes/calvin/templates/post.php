<article class="s-content__entry format-standard">

  <div class="s-content__media">
    <div class="s-content__post-thumb">
      <?php the_post_thumbnail('post_thumb_complete') ?>
    </div>
  </div> <!-- end s-content__media -->

  <div class="s-content__entry-header">
    <h1 class="s-content__title s-content__title--post"><?php the_title() ?></h1>
  </div> <!-- end s-content__entry-header -->

  <div class="s-content__primary">

    <div class="s-content__entry-content">
      <?php the_content(); ?>

    </div> <!-- end s-entry__entry-content -->

    <div class="s-content__entry-meta">

      <div class="entry-author meta-blk">
        <div class="author-avatar">
          <?php echo get_avatar(get_the_author_meta("ID"), 145); ?>
        </div>
        <div class="byline">
          <span class="bytext"><?php esc_html_e('Posted By', 'calvin') ?></span>
          <?php the_author_link() ?>
        </div>
      </div>

      <div class="meta-bottom">

        <div class="entry-cat-links meta-blk">
          <div class="cat-links">
            <span><?php esc_html_e('In', 'calvin') ?></span>
            <?php get_template_part('templates/rubrics') ?>
          </div>

          <span><?php esc_html_e('On', 'calvin') ?></span>
          <?php the_time('j F Y') ?>
        </div>

        <div class="entry-tags meta-blk">
          <span class="tagtext"><?php esc_html_e('Tags', 'calvin') ?></span>
          <?php the_tags('', ', ', '') ?>
        </div>

      </div>

    </div> <!-- s-content__entry-meta -->

    <div class="s-content__pagenav">
      <div class="prev-nav">
        <?php
        $prev_post = get_previous_post();
        if ($prev_post) {
          echo '<a href="' . get_permalink($prev_post) . '" rel="prev">
                  <span>' . esc_html_e('Previous!', 'calvin') . '</span>
                ' . esc_attr($prev_post->post_title) . '</a>';
        }
        ?>
      </div>
      <div class="next-nav">
        <?php
        $next_post = get_next_post();
        if ($next_post) {
          echo '<a href="' . get_permalink($next_post) . '" rel="prev">
                  <span>' . esc_html_e('Next', 'calvin') . '</span>
                ' . esc_attr($next_post->post_title) . '</a>';
        }
        ?>
      </div>
    </div> <!-- end s-content__pagenav -->

  </div> <!-- end s-content__primary -->
</article> <!-- end entry -->