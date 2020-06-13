    <section class="footer myt-50">
	    <!----------=========Main==========-------->
	  <div class="footer__main main--background">
      <div class="container">

    	</div>
    	<div class="footer__container container">
    		<div class="footer__list row-divide">
    			<div class="footer__item divide--5-col">

    			</div>
    			<p class="footer__item divide--5-col">
    				<?php //echo get_theme_mod('company_name'); ?>
    			</p>
    			<p class="footer__item divide--5-col">
    				<!-- <i class="fas fa-map-marker-alt"></i>&nbsp;<?php //echo get_theme_mod('company_address'); ?> -->
    			</p>
    			<p class="footer__item divide--5-col">
    				<!-- <i class="fal fa-mobile-android"></i>&nbsp;<?php //echo get_theme_mod('company_phone'); ?> -->
    			</p>
    			<p class="footer__item divide--5-col">
    				<!-- <i class="fal fa-envelope"></i>&nbsp;<?php //echo get_theme_mod('company_email'); ?> -->
    			</p>
    		</div>
    	</div>
	  </div>
	    <!----------=========Main==========-------->

		<!----------=========Sub==========-------->
	  <div class="footer__sub">
	    <div class="container">
        <div class="row-divide footer__sub-container">
          <div class="col-divide-6">
            <?php
             wp_nav_menu(array(
            'theme_location' => 'footerMenuLocation' ));
            ?>
          </div>
          <div class="copyright--content col-divide-6">
            <p class="copyright text--upcase text--center">All Right Reserved.</p></div>
          </div>
        </div>
	  </div>
	    <!----------=========Sub==========-------->
 </section>
 <?php wp_footer(); ?>
 </body>
</html>
