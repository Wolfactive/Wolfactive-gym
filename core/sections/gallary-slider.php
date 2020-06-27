<section class="responsive gallary-slider">
  <?php while (have_rows('gallary_image','option')) : the_row(); ?>
    <div>
      <img src="<?php echo get_sub_field('image_gallary','option'); ?>" alt="Image Instructor">
    </div>
  <?php endwhile;?>
</section>
