<?php get_header('home'); ?>

<!-- hero
    ================================================== -->
<section id="hero" class="s-hero">

  <div class="s-hero__slider">

    <div class="s-hero__slide">

      <div class="s-hero__slide-bg" style="background-image: url('images/slide1-bg-3000.jpg');"></div>

      <div class="row s-hero__slide-content animate-this">
        <div class="column">
          <div class="s-hero__slide-meta">
            <span class="cat-links">
              <a href="#0">Lifestyle</a>
              <a href="#0">Design</a>
            </span>
            <span class="byline">
              Posted by
              <span class="author">
                <a href="#0">Jonathan Doe</a>
              </span>
            </span>
          </div>
          <h1 class="s-hero__slide-text">
            <a href="#0">
              Tips and Ideas to Help You Start Freelancing.
            </a>
          </h1>
        </div>
      </div>

    </div> <!-- end s-hero__slide -->

    <div class="s-hero__slide">

      <div class="s-hero__slide-bg" style="background-image: url('images/slide2-bg-3000.jpg');"></div>

      <div class="row s-hero__slide-content animate-this">
        <div class="column">
          <div class="s-hero__slide-meta">
            <span class="cat-links">
              <a href="#0">Work</a>
            </span>
            <span class="byline">
              Posted by
              <span class="author">
                <a href="#0">Juan Dela Cruz</a>
              </span>
            </span>
          </div>
          <h1 class="s-hero__slide-text">
            <a href="#0">
              Minimalism: The Art of Keeping It Simple.
            </a>
          </h1>
        </div>
      </div>

    </div> <!-- end s-hero__slide -->

    <div class="s-hero__slide"">

                <div class=" s-hero__slide-bg" style="background-image: url('images/slide3-bg-3000.jpg');"></div>

    <div class="row s-hero__slide-content animate-this">
      <div class="column">
        <div class="s-hero__slide-meta">
          <span class="cat-links">
            <a href="#0">Health</a>
            <a href="#0">Lifestyle</a>
          </span>
          <span class="byline">
            Posted by
            <span class="author">
              <a href="#0">Jane Doe</a>
            </span>
          </span>
        </div>
        <h1 class="s-hero__slide-text">
          <a href="#0">
            10 Reasons Why Being in Nature Is Good For You.
          </a>
        </h1>
      </div>
    </div>

  </div> <!-- end s-hero__slide -->

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
  <?php get_template_part('articles') ?>

</section> <!-- end s-content -->

<?php get_footer(); ?>