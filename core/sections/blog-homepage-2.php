<section class="class-gym">
  <div class="title__blog-home text--upcase pd-50 text--center">
    <h1><?php the_field('label_blog_2','option') ?></h1>
  </div>
  <div class="our__class container pdt-50">
    <div class="class__container">
      <ul class="class__background">
        <?php
         $width=560;
         $height=360;
         $getValueSelectCategory = get_field('hien_thi_blog_2','option');
         $args = array(
           'post_type' => 'post',
           'cat' => $getValueSelectCategory,
           'posts_per_page' => 4,
        );
        $the_query= new WP_Query($args);
        get_post_homepage($getValueSelectCategory,$the_query,$width,$height);
        $cat_id = $getValueSelectCategory;
         ?>
      </ul>
    </div>
    <div class="class__all pd-50">
      <div class="show-class-all text--upcase">
        <a class="link-all-class" href="<?php echo get_category_link($cat_id); ?>">Đọc Thêm</a>
      </div>
    </div>
  </div>
</section>
