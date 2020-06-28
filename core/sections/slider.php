<section class="slider">
  <div class="slider__container single-item ">
    <?php while (have_rows('slider','option')) : the_row(); ?>
      <div class="slider__item">
        <div class="slider__image-item">
          <?php $urlImage=get_sub_field('image_slider','option'); ?>
          <img data-src="<?php echo hk_get_image($urlImage,1920,720)  ?>" alt="Image Slider">
          <div class="slide__bg" ></div>
        </div>
      </div>
    <?php endwhile;?>
  </div>
</section>
