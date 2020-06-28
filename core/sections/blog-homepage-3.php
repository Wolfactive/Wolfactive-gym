<section class="class-gym">
  <div class="title__blog-home text--upcase pd-50 text--center">
    <h1><?php the_field('label_blog_3','option') ?></h1>
  </div>
  <div class="our__class container pdt-50">
    <div class="class__container">
      <ul class="class__background">
        <?php
        $width=560;
        $height=360;
         $getValueSelectCategory = get_field('hien_thi_blog_3','option');
         $args = array(
           'post_type' => 'post',
           'cat' => $getValueSelectCategory,
           'posts_per_page' => 4,
        );
        $the_query= new WP_Query($args);
        if($getValueSelectCategory === get_cat_ID('Class')){
        while($the_query->have_posts()) : $the_query->the_post(); ?>
           <li class="class__item">
             <div class="class__item-contain" data-aos="zoom-out-up" data-aos-duration="2000">
               <div class="class__image">
                 <a href="<?php echo get_permalink(); ?>"><img data-src="<?php echo hk_get_thumb(get_the_id(),$width,$height) ?>" alt="Image"></a>
               </div>
               <a href="<?php echo get_permalink(); ?>"><div class="bg-cover-color"></div></a>
               <div class="class__title-and-time">
                 <h3 class="class__name text--upcase"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                 <p class="class__time"><?php echo get_field('time_open_class') ?></p>
               </div>
             </div>
           </li>
        <?php
        endwhile;
      }
      else{
        while($the_query->have_posts()) : $the_query->the_post(); ?>
           <li class="blog__item">
             <div class="blog__item-contain" data-aos="zoom-out-up" data-aos-duration="2000">
               <div class="blog__image">
                 <a href="<?php echo get_permalink(); ?>"><img data-src="<?php echo hk_get_thumb(get_the_id(),$width,$height) ?>" alt="Image"></a>
               </div>
                 <div class="blog__tags">
                   <?php
                   $tags = get_the_tags();
                   if ($tags) {
                     $i=0;
                     foreach( $tags as $tag ) {
                       if($i===0) {echo '<span class="tags-item text--upcase"><a href="'.get_permalink().'">'.$tag->name.'</a></span>';}
                       $i++;
                     }
                   }  ?>
                 </div>
                 <a href="<?php echo get_permalink(); ?>"><div class="bg-cover-color"></div></a>
                 <div class="blog__info">
                   <h3 class="blog__name text--upcase"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                   <div class="blog__author-date">
                     <div class="blog__author">
                       <p class="author__name"><span class="by-date">By: </span><?php the_author(); ?></p>
                     </div>
                     <div class="blog__date">
                       <p class="date__post"><span class="by-date">Date: </span><?php echo get_the_date(); ?></p>
                     </div>
                   </div>
                 </div>
             </div>
           </li>
        <?php
        endwhile;
      }
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
