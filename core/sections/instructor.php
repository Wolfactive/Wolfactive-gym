<section class="instructor">
  <div class="instructor container">
    <div class="title__instuctor pd-50 text--center">
      <h1 class="text--upcase">Our Instructor</h1>
      <div class="content__welcome text--center">
        <p>Professional instructors that will help you archive your goals</p>
      </div>
    </div>
    <div class="instructor__container">
      <ul class="instructor__background">
        <?php
         $args = array(
           'post_type' => 'post',
           'category_name' => 'instructor',
           'posts_per_page' => 4,
        );
        $the_query= new WP_Query($args);
        while($the_query->have_posts()) : $the_query->the_post(); ?>
           <li class="instructor__item">
             <div class="instructor__item-contain">
               <div class="instructor__image">
                 <?php echo get_the_post_thumbnail( get_the_ID(), 'full', null );?>
               </div>
             </div>
           </li>
        <?php
        endwhile;
         ?>
      </ul>
    </div>
  </div>
</section>
