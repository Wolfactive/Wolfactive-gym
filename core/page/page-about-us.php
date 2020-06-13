<?php
/**
* template name: About Us Page
*/
get_header();
?>
<section class="AboutUs wrapper">
  <div class="about-us__wrapper">
    <div class="about-us__container container">
      <div class="title-about-us myt-20">
        <h1 class="text--upcase text--center myb-20"><?php the_title(); ?></h1>
      </div>
      <?php
        $args = array(
        'post_type' => 'page',
        'pagename' => 'about-us',
      );
      $the_query = new WP_Query($args);
      while($the_query->have_posts()) : $the_query -> the_post();
      ?>
        <div class="about-us__image">
          <?php echo get_the_post_thumbnail(); ?>
        </div>
        <div class="about-us__content content my-20">
          <?php the_content(); ?>
        </div>
    <?php endwhile;
       ?>
    </div>
  </div>
</section>
<?php
get_footer();
?>
