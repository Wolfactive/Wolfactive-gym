<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
     <meta charset="<?php bloginfo('charset'); ?>" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta property="og:image" content="<?php echo esc_url($featured_img_url); ?>" />
     <meta name="author" content="Wolfactive - HuyNguyen - PhuongNam">
     <link rel="shortcut icon" type="image/png" href="<?php echo esc_url($featured_img_url); ?>"/>
  	 <link rel="profile" href="https://wolfactive.net/">
     <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-brands-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-regular-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-solid-900.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="stylesheet" href="<?php echo get_theme_file_uri('assets/css/globals.min.css') ?>">
     <script async type='text/javascript' src="<?php echo get_theme_file_uri('assets/js/main.min.js') ?>"></script>
     <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="header">
  <!-- nếu là homepage thì scroll đổi màu -->
  <?php if(is_front_page()){ ?>
  <div class="header__container main--background position--fixed">
    <div class="header__menu-wrapper container">
        <div class="row-divide header__background">
          <div class="header__item col-divide-4 col-divide-sm-12 logo__contain">
     	      <a href="<?php echo site_url(); ?>" class="d--block logo mr-auto">
     	        <img src="<?php echo get_field('logo','option');//$image[0]; ?>" alt="gym-fitness">
     	      </a>
     	   </div>
         <div class="header__item col-divide-8 col-divide-sm-12 menu__contain">
    	      <?php
    	       wp_nav_menu(array(
    		    'theme_location' => 'headerMenuLocation' ));
    	      ?>
    	   </div>
        </div>
    </div>
  </div>
<?php } else{ ?>
  <div class="header__container main--background color--background">
    <div class="header__menu-wrapper container">
        <div class="row-divide header__background">
          <div class="header__item col-divide-4 col-divide-sm-12 logo__contain">
     	      <a href="<?php echo site_url(); ?>" class="d--block logo mr-auto">
     	        <img src="<?php echo get_field('logo','option');//$image[0]; ?>" alt="gym-fitness">
     	      </a>
     	   </div>
         <div class="header__item col-divide-8 col-divide-sm-12 menu__contain">
    	      <?php
    	       wp_nav_menu(array(
    		    'theme_location' => 'headerMenuLocation' ));
    	      ?>
    	   </div>
        </div>
    </div>
    	   <!-- <div class="header__item d--none dp--block">
    	      <button class="btn text--light" id="navBtn" aria-label="btn-navbar">
    	          <i class="fas fa-bars icon--text"></i>
    	      </button>
    	   </div> -->
  </div>
<?php } ?>
</section>
