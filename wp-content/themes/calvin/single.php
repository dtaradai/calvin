<?php get_header(); ?>

<section class="s-content">

  <div class="row">
    <div class="column large-12">

      <?php while (have_posts()) {
        the_post(); ?>
        <article class="s-content__entry format-standard">

          <div class="s-content__media">
            <div class="s-content__post-thumb">
              <?php the_post_thumbnail('post-thumbnail') ?>
            </div>
          </div> <!-- end s-content__media -->

          <div class="s-content__entry-header">
            <h1 class="s-content__title s-content__title--post"><?php the_title() ?></h1>
          </div> <!-- end s-content__entry-header -->

          <div class="s-content__primary">

            <div class="s-content__entry-content">

              <?php the_content() ?>

            </div> <!-- end s-entry__entry-content -->

            <div class="s-content__entry-meta">

              <div class="entry-author meta-blk">
                <div class="author-avatar">
                  <?php echo get_avatar(get_the_author_meta('user_email'), 160);  ?>
                </div>
                <div class="byline">
                  <span class="bytext"><?php esc_html_e('Posted By', 'calvin') ?></span>
                  <?php the_author_posts_link() ?>
                </div>
              </div>

              <div class="meta-bottom">

                <div class="entry-cat-links meta-blk">
                  <div class="cat-links">
                    <span><?php esc_html_e('In', 'calvin') ?></span>
                    <?php the_category(' '); ?>
                  </div>

                  <span><?php esc_html_e('On', 'calvin') ?></span>
                  <?php echo get_the_date(); ?>
                </div>

                <?php 
                if (has_tag()) { ?>
                  <div class="entry-tags meta-blk">
                  <span class="tagtext"><?php esc_html_e('Tags', 'calvin') ?></span>
                  <?php the_tags('', ' ') ?>
                </div>
                <?php } ?>

              </div>

            </div> <!-- s-content__entry-meta -->

            <div class="s-content__pagenav">
              <?php
              $pred_post = get_previous_post();
              if ($pred_post) { ?>
                <div class="prev-nav">
                  <a href="<?php echo get_permalink($pred_post); ?>" rel="prev">
                    <span><?php esc_html_e('Previous', 'calvin') ?></span>
                    <?php esc_attr_e($pred_post->post_title); ?>
                  </a>
                </div>
              <?php } ?>

              <?php
              $next_post = get_next_post();
              if ($next_post) { ?>
                <div class="next-nav">
                  <a href="<?php echo get_permalink($next_post); ?>" rel="next">
                    <span><?php esc_html_e('Next', 'calvin') ?></span>
                    <?php esc_attr_e($next_post->post_title); ?>
                  </a>
                </div>
              <?php } ?>
            </div> <!-- end s-content__pagenav -->

          </div> <!-- end s-content__primary -->
        </article> <!-- end entry -->
      <?php } ?>

    </div> <!-- end column -->
  </div> <!-- end row -->


  <!-- comments
        ================================================== -->
  <div class="comments-wrap">

    <div id="comments" class="row">
      <div class="column large-12">

        <h3>5 Comments</h3>

        <!-- START commentlist -->
        <ol class="commentlist">

          <li class="depth-1 comment">

            <div class="comment__avatar">
              <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
            </div>

            <div class="comment__content">

              <div class="comment__info">
                <div class="comment__author">Itachi Uchiha</div>

                <div class="comment__meta">
                  <div class="comment__time">Oct 05, 2020</div>
                  <div class="comment__reply">
                    <a class="comment-reply-link" href="#0">Reply</a>
                  </div>
                </div>
              </div>

              <div class="comment__text">
                <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                  facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
              </div>

            </div>

          </li> <!-- end comment level 1 -->

          <li class="thread-alt depth-1 comment">

            <div class="comment__avatar">
              <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
            </div>

            <div class="comment__content">

              <div class="comment__info">
                <div class="comment__author">John Doe</div>

                <div class="comment__meta">
                  <div class="comment__time">Oct 05, 2020</div>
                  <div class="comment__reply">
                    <a class="comment-reply-link" href="#0">Reply</a>
                  </div>
                </div>
              </div>

              <div class="comment__text">
                <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod
                  urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et
                  tantas semper delicatissimi.</p>
              </div>

            </div>

            <ul class="children">

              <li class="depth-2 comment">

                <div class="comment__avatar">
                  <img class="avatar" src="images/avatars/user-03.jpg" alt="" width="50" height="50">
                </div>

                <div class="comment__content">

                  <div class="comment__info">
                    <div class="comment__author">Kakashi Hatake</div>

                    <div class="comment__meta">
                      <div class="comment__time">Oct 05, 2020</div>
                      <div class="comment__reply">
                        <a class="comment-reply-link" href="#0">Reply</a>
                      </div>
                    </div>
                  </div>

                  <div class="comment__text">
                    <p>Duis sed odio sit amet nibh vulputate
                      cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                      cursus a sit amet mauris</p>
                  </div>

                </div>

                <ul class="children">

                  <li class="depth-3 comment">

                    <div class="comment__avatar">
                      <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                    </div>

                    <div class="comment__content">

                      <div class="comment__info">
                        <div class="comment__author">John Doe</div>

                        <div class="comment__meta">
                          <div class="comment__time">Oct 04, 2020</div>
                          <div class="comment__reply">
                            <a class="comment-reply-link" href="#0">Reply</a>
                          </div>
                        </div>
                      </div>

                      <div class="comment__text">
                        <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
                          etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                      </div>

                    </div>

                  </li>

                </ul>

              </li>

            </ul>

          </li> <!-- end comment level 1 -->

          <li class="depth-1 comment">

            <div class="comment__avatar">
              <img class="avatar" src="images/avatars/user-02.jpg" alt="" width="50" height="50">
            </div>

            <div class="comment__content">

              <div class="comment__info">
                <div class="comment__author">Shikamaru Nara</div>

                <div class="comment__meta">
                  <div class="comment__time">Oct 03, 2020</div>
                  <div class="comment__reply">
                    <a class="comment-reply-link" href="#0">Reply</a>
                  </div>
                </div>
              </div>

              <div class="comment__text">
                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
              </div>

            </div>

          </li> <!-- end comment level 1 -->

        </ol>
        <!-- END commentlist -->

      </div> <!-- end col-full -->
    </div> <!-- end comments -->


    <div class="row comment-respond">

      <!-- START respond -->
      <div id="respond" class="column">

        <h3>
          Add Comment
          <span>Your email address will not be published.</span>
        </h3>

        <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
          <fieldset>

            <div class="form-field">
              <input name="cName" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
            </div>

            <div class="form-field">
              <input name="cEmail" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
            </div>

            <div class="form-field">
              <input name="cWebsite" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website" value="" type="text">
            </div>

            <div class="message form-field">
              <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
            </div>

            <br>
            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">

          </fieldset>
        </form> <!-- end form -->

      </div>
      <!-- END respond-->

    </div> <!-- end comment-respond -->

  </div> <!-- end comments-wrap -->


</section> <!-- end s-content -->

<?php get_footer(); ?>