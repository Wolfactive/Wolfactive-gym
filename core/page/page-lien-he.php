<?php
/**
* template name: Contact Us Page
*/
get_header();
get_template_part('sections/breadcum');
?>
<section class="contact">
  <div class="contact__contain container">
    <div class="title__page text--center my-40">
      <h1><?php the_title(); ?></h1>
    </div>
    <div class="map">
      <div class="map__container text--center">
        <?php the_field('map_company','option') ?>
      </div>
    </div>
    <div class="input__infomation">
      <div id="formLienHe" class="input__field--contain">
        <div class="input__field-item my-20">
            <label for="HovaTen">Họ Và Tên *</label><input type="text" name="Hoten" id="HovaTen" class="contact__input-field"><p class="notice__result-value" id="HovaTenVal">Họ tên không hợp lệ</p>
        </div>
        <div class="input__field-item my-20">
            <label for="Email">Email *</label><input type="text" name="email" id="Email" class="contact__input-field"><p class="notice__result-value" id="EmailVal">Email không hợp lệ</p>
        </div>
        <div class="input__field-item my-20">
            <label for="SDT">SDT *</label><input type="text" name="" value="" placeholder="" id="SDT" class="contact__input-field"><p class="notice__result-value" id="SDTVal">SĐT không hợp lệ</p>
        </div>
        <div class="input__field-item my-20">
            <label for="Noidung">Nội Dung</label><textarea type="text" name="" value="" id="Noidung" class="contact__input-field"></textarea>
            <p class="notice__result-value" id="NoidungVal">Nội dung trống</p>
        </div>
        <div class="input__field-item my-20"><input type="button" name="submit" value="GỬI NGAY" class="btn submit__form" id="ContactFromBtn" onclick="checkValue()"></div>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
 ?>
