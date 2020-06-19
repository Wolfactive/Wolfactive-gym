<section class="blog">
  <div class="blog container">
    <div class="title__instuctor pd-50 text--center">
      <h1 class="text--upcase">Our blog</h1>
      <div class="content__welcome text--center">
        <p>Professional blogs that will help you archive your goals</p>
      </div>
    </div>
    <div class="blog__container">
      <ul class="blog__background">
        <?php
         $args = array(
           'post_type' => 'post',
           'category_name' => 'blog',
           'posts_per_page' => 4,
        );
        $the_query= new WP_Query($args);
        while($the_query->have_posts()) : $the_query->the_post(); ?>
           <li class="blog__item">
             <div class="blog__item-contain">
               <div class="blog__image">
                 <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'full', null );?></a> 
               </div>
                 <div class="blog__tags">
                   <?php
                   $tags = get_the_tags();
                   if ($tags) {
                     foreach( $tags as $tag ) {
                       echo '<span class="tags-item text--upcase"><a href="'.get_permalink().'">'.$tag->name.'</a></span>';
                     }
                   } ?>
                 </div>
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
         ?>
      </ul>
    </div>
  </div>
</section>
