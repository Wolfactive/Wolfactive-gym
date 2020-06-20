<section class="slider">
  <div class="slider__container single-item ">
    <?php while (have_rows('slider','option')) : the_row(); ?>
      <div class="slider__item">
        <div class="slide__bg"></div>
        <div class="slider__image-item">
          <img src="<?php echo get_sub_field('image_slider','option'); ?>">
        </div>
      </div>
    <?php endwhile;?>
  </div>
</section>