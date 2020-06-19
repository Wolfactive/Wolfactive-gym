<section class="class-gym">
  <div class="our__class container">
    <div class="title__class text--upcase pd-50 text--center">
      <h1>Our Class</h1>
    </div>
    <div class="class__container">
      <ul class="class__background">
        <?php
         $args = array(
           'post_type' => 'post',
           'category_name' => 'Class',
           'posts_per_page' => 4,
        );
        $the_query= new WP_Query($args);
        while($the_query->have_posts()) : $the_query->the_post(); ?>
           <li class="class__item">
             <div class="class__item-contain">
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
        $cat_id = get_cat_ID('Class');
         ?>
      </ul>
    </div>
    <div class="class__all pd-50">
      <div class="show-class-all text--upcase">
        <a class="link-all-class" href="<?php echo get_category_link($cat_id); ?>">View All Class</a>
      </div>
    </div>
  </div>
</section>
