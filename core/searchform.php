<form role="search" method="get" class="search-form" action="<?php echo esc_url(site_url('/')); ?>">
  <label>
    <!-- <span class="screen-reader-text">Search for:</span> -->
    <input type="text" class="search-field" placeholder="Tìm Kiếm" value="" name="s">
    <input type="hidden" class="search-field" placeholder="Search …" value="1" name="sentence">
    <input type="hidden" class="search-field" placeholder="Search …" value="post" name="post_type">
  </label>
  <button type="submit" class="search-submit" value="Search" aria-label="Button Submit Search">
    <i class="fas fa-search"></i>
  </button>
</form>
