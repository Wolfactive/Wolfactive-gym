<?php
/**
* template name: Gallary Page
*/
get_header();
get_template_part('sections/breadcum');
?>
<div class="gallery">
  <div class="gallery__container container">
    <div class="gallery__title pd-50 text--center">
      <h1 class="title"><?php the_title(); ?></h1>
    </div>
    <?php $images = get_field('gallery_image');
    if( $images ): ?>
        <ul class="gallery__wrapper">
            <?php foreach( $images as $image ): ?>
                <li class="gallery__image-item">
                    <a href="<?php echo $image['url']; ?>">
                         <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                    <p><?php echo $image['caption']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
  </div>
</div>
<?php get_footer() ?>
