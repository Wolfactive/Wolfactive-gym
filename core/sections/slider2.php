<section class="slider myt-50 slider-2">
  <div class="slider__container single-item ">
    <?php while (have_rows('slider_2','option')) : the_row(); ?>
      <div class="slider__item">
        <div class="slide__bg"></div>
        <div class="slide__content row-divide">
          <div class="slide__quote col-divide-5">
            <i class="fas fa-quote-left"></i>
          </div>
          <div class="slide__info col-divide-7">
            <div class="slide__title text--upcase">
              <h1><?php echo get_sub_field('title_slider','option'); ?></h1>
            </div>
            <div class="slide__comment">
              <div><p><?php echo get_sub_field('comment_slider','option'); ?></p></div>
            </div>
            <div class="slide__instructor-image">
              <img src="<?php echo get_sub_field('image_instructor','option'); ?>" alt="instructor image">
              <span class="instructor-name"><?php echo get_sub_field('instructor_name','option'); ?></span>
            </div>
          </div>
        </div>
        <div class="slider__image-item">
          <img src="<?php echo get_sub_field('background_image','option'); ?>" alt="background image">
        </div>
      </div>
    <?php endwhile;?>
  </div>
</section>
