 <?php
 /**
 * template name: Home Page
 */
 get_header();
 ?>
 <?php get_template_part('/sections/slider') ?>
 <section class="welcome">
   <div class="welcome__container pd-50">
     <div class="title__welcome text--upcase text--center">
       <h1>Welcome to our website</h1>
     </div>
     <div class="content__welcome text--center">
       <p>we will help you to archive your goal</p>
     </div>
   </div>
 </section>
 <?php get_template_part('/sections/gallary-slider') ?>
 <?php get_template_part('/sections/blog-homepage-1') ?>
 <?php get_template_part('/sections/blog-homepage-2') ?>
 <?php get_template_part('/sections/slider2') ?>
 <?php get_template_part('/sections/blog-homepage-3') ?>
 <?php
 get_footer();
?>
