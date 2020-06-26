 <?php
 get_header();
?>
   <section class="wrapper" id="PostCategory">
     <div class="container">
         <div class="breadcumb my-20">
            <div class="breadcumb__title title--section text--upcase text--center"><?php single_cat_title() ?></div>
            <div class="title--underline"></div>
         </div>
       <ul class="category__contain">
         <?php
          while (have_posts()) : the_post(); ?>
              <li class="category__post-item">
                <div class="category__item-container position--relative">
                  <div class="category__item-image">
                    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'full', null );?></a>
                  </div>
                  <div class="bg-cover-color"></div>
                  <div class="category__item-tag--post">
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
                  <div class="category__item-content">
                    <div class="category__item-title">
                      <h3 class="category__post-name text--upcase"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                    </div>
                    <div class="category__post-date">
                      <p class="date__post"><span class="by-date">Date: </span><?php echo get_the_date(); ?></p>
                    </div>
                  </div>
                </div>
              </li>
           <?php endwhile;  ?>
       </ul>
    <div class="Category__pagination">
      <?php the_posts_pagination()  ?>
    </div>
     </div>
    <?php
     //get_template_part('sections/new-popular');
    ?>
 </section>
<?php
 get_footer();
?>
