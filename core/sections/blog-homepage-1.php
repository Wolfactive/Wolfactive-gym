<section class="class-gym">
  <div class="our__class container">
    <div class="title__class text--upcase pd-50 text--center">
      <h1>Our Class</h1>
    </div>
    <div class="class__container">
      <ul class="class__background">
        <?php
         $getValueSelectCategory = get_field('hien_thi_blog','option');
         $args = array(
           'post_type' => 'post',
           'cat' => $getValueSelectCategory,
           'posts_per_page' => 4,
        );
        $the_query= new WP_Query($args);
        if($getValueSelectCategory === get_cat_ID('Class')){
        while($the_query->have_posts()) : $the_query->the_post(); ?>
           <li class="class__item">
             <div class="class__item-contain" data-aos="flip-up" data-aos-easing="ease-out-cubic"
     data-aos-duration="1000">
               <div class="class__image">
                 <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'full', null );?></a>
               </div>
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
             <div class="blog__item-contain" data-aos="flip-up" data-aos-easing="ease-out-cubic"
     data-aos-duration="1000">
               <div class="blog__image">
                 <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'full', null );?></a>
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
                 <div class="bg-cover-color"></div>
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
