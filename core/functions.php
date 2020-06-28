<?php
 /*
 *  GLOBAL VARIABLES
 */
define('THEME_DIR', get_stylesheet_directory());
define('THEME_URL', get_stylesheet_directory_uri());

/*
 *  INCLUDED FILES
 */

$file_includes = [
    'includes/theme-setup.php',                // General theme setting
    'includes/acf-options.php',  // ACF Option page
    'includes/resize.php',
];

foreach ($file_includes as $file) {
    if (!$filePath = locate_template($file)) {
        trigger_error(sprintf(__('Missing included file'), $file), E_USER_ERROR);
    }

    require_once $filePath;
}

unset($file, $filePath);

 // Import feauture images
 function theme_features() {
  register_nav_menu('headerMenuLocation','Header Menu Location');
  register_nav_menu('footerMenuLocation','Footer Menu Location');
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_features');


add_theme_support( 'custom-logo', array(
  	'height'      => 100,
  	'width'       => 400,
  	'flex-height' => true,
  	'flex-width'  => true,
  	'header-text' => array( 'site-title', 'site-description' ),
  ) );
  function fitness_class(){
      $label = array(
          'name' => 'Lớp tập',
          'singular_name' => 'Lớp tập' ,
  		    'add_new'               => __( 'Thêm lớp tập', 'textdomain' ),
          'add_new_item'          => __( 'Tên lớp tập', 'textdomain' ),
          'new_item'              => __( 'lớp tập mới', 'textdomain' ),
          'edit_item'             => __( 'Chỉnh sửa lớp tập', 'textdomain' ),
          'view_item'             => __( 'Xem lớp tập', 'textdomain' ),
          'all_items'             => __( 'Tất cả lớp tập', 'textdomain' ),
          'search_items'          => __( 'Tìm kiếm lớp tập', 'textdomain' ),
  		    'featured_image'        => _x( 'Hình ảnh lớp tập', 'textdomain' ),
          'set_featured_image'    => _x( 'Chọn hình ảnh lớp tập', 'textdomain' ),
          'remove_featured_image' => _x( 'Xóa hình ảnh lớp tập', 'textdomain' ),
      );
      $args = array(
          'labels' => $label,
          'description' => 'Phần lớp tập',
          'supports' => array(
              'title',
              'thumbnail',
              'custom-fields',
              'editor',
          ),
          'hierarchical' => false,
          'order' => 'DESC',
          'orderby' => 'date',
          'posts_per_page' => 30,
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'show_in_nav_menus' => true,
          'show_in_admin_bar' => true,
          'show_in_rest' => true,
          'show_in_graphql' => true,
          'rest_base'          => 'blogs',
          'menu_position' => 5,
          'menu_icon'           => 'dashicons-universal-access-alt',
          'can_export' => true,
          'has_archive' => true,
          'publicly_queryable' => true,
          'capability_type' => 'post',
          'graphql_single_name' => 'Fitness_class',
          'graphql_plural_name' => 'Fitness_classs',
      );

      register_post_type('fitness_class', $args);

  }
  add_action('init', 'fitness_class');

function make_taxonomy_theme() {
  $labels = array(
      'name' => 'Phân loại',
      'singular' => 'Phân loại',
      'menu_name' => 'Phân loại'
      );
      $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_rest'               => true,
        'rest_base'                  => 'productCat',
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_graphql'            => true,
        'graphql_single_name'        => 'Theloai',
        'graphql_plural_name'        => 'Theloais',
        );
    register_taxonomy('the-loai', 'fitness_class', $args);
  }
  add_action( 'init', 'make_taxonomy_theme', 0 );
  //marcus post views
  function gt_get_post_view() {
      $count = get_post_meta( get_the_ID(), 'post_views_count', true );
      return "$count views";
  }
  function gt_set_post_view() {
      $key = 'post_views_count';
      $post_id = get_the_ID();
      $count = (int) get_post_meta( $post_id, $key, true );
      $count++;
      update_post_meta( $post_id, $key, $count );
  }
  function gt_posts_column_views( $columns ) {
      $columns['post_views'] = 'Views';
      return $columns;
  }
  function gt_posts_custom_column_views( $column ) {
      if ( $column === 'post_views') {
          echo gt_get_post_view();
      }
  }
  add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
  add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );
  //marcus post views
  /*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No post to duplicate has been supplied!');
  }

  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;

  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );

  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;

  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {

    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );

    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );

    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }

    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }


    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}

add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

function check_homepage(){
  if(is_front_page()) : echo 'homepage'; endif;
}
function check_about_us_page(){
  if(is_page('about-us')) : echo 'aboutus'; endif;
}
function echo_element_field($field,$option,$default,$image){
  if($option) : $ele =  get_field($field,'option');
  else: $ele =  get_field($field);
  endif;
  if($ele): echo $ele;
  elseif ($image) : echo get_theme_file_uri($image);
  else: echo $default;
  endif;
}
function title_check(){
  if(is_page()):
  the_title();
  elseif (is_tax()):
  single_term_title();
  elseif (is_category()) :
  single_cat_title();
  elseif (is_singular('post')) :
  echo "News";
  endif;
}
function get_term_list($term_name){
  $terms =  get_terms([ 'taxonomy' => $term_name,'hide_empty' => false,]);
  if ( $terms && ! is_wp_error( $terms ) ){
    foreach ($terms as $term ) {
      $slugcat = esc_html($term->slug);
      echo '<a class="term__link" href="'.home_url().'/'.$term_name.'/'.$slugcat.'">'.esc_html($term->name).'</a>';
    }
  }
}
// remove block-style
add_filter('use_block_editor_for_post', '__return_false');
function atulhost_optimize_scripts() {
	wp_deregister_script('jquery');
	wp_deregister_script('jquery-migrate');
  wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
}
add_action('wp_enqueue_scripts', 'atulhost_optimize_scripts');
add_filter('acf/prepare_field', 'my_translatable_acf_fields');
function my_translatable_acf_fields($field){
    if (strpos($field['wrapper']['class'], 'translatable') !== false){
        $field['class'] = 'translatable';
    }
    return $field;
}
// config language
function get_lang(){
  global $wp;
  $url=add_query_arg( $wp->query_vars, home_url( $wp->request ));
  $lang=substr($url,25,2);
  if($lang == ""||$lang != "vi" || $lang!="ja"){$lang="en";}
  echo $lang;
}
// 404
function redirect_404(){
    global $wp_query;
    if($wp_query->is_404){
        wp_redirect(get_bloginfo('url'), 301);
        exit;
    }
}
add_action( 'phpmailer_init', function( $phpmailer ) {
    if ( !is_object( $phpmailer ) )
    $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = 1;
    $phpmailer->Port       = 587;
    $phpmailer->Username   = 'info.bapblockchain@gmail.com';
    $phpmailer->Password   = 'qxwntgixyffgnpze';
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->From       = 'bap-ventures.com';
    $phpmailer->FromName   = 'Bap Ventures';
});

add_action('wp_ajax_Action_Sendmail', 'Action_Sendmail');
add_action('wp_ajax_nopriv_Action_Sendmail', 'Action_Sendmail');
function Action_Sendmail() {
    if(isset($_POST['email']) && $_POST['email']){
        $firstName  = $_POST['firstName'];
        $lastName  = $_POST['lastName'];
    	  $email      = sanitize_email($_POST["email"]);
        $phone      = $_POST['phone'];
        $company   = $_POST['company'];
        $comment  = $_POST['comment'];
        $headers[]  = 'From: BAP Ventures <bap-ventures.com>';
        $headers[]  = 'Content-Type: text/html; charset=UTF-8';
        $message    =  "<p>Name: '.$firstName .' '.$lastName.'</p>
                       <p>Email: '.$email.'</p>
                       <p>Phone: '.$phone.'</p>
                       <p>Company: '.$company.'</p>
                       <p>Comment: '.$comment'</p>";
        wp_mail( 'info.bapblockchain@gmail.com', 'BAP Ventures', $message, $headers);
        echo json_encode(array('status' => 1));
    }
die(); }

function itsme_disable_feed() {
  $homepage = home_url();
  wp_redirect($homepage);
}
add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
// add link video preload head tag
function add_link_video_preload(){
    if(is_front_page()):
      $aboutVideo = the_field('about_video_background','option');
      $carouselVideo = the_field('carousel_video_background','option');
      if($aboutVideo):
       echo '<link rel="preload" href="'.$aboutVideo.'" as="video" type="video/mp4">';
      elseif ($carouselVideo):
       echo '<link rel="preload" href="'.$carouselVideo.'" as="video" type="video/mp4">';
      endif;
     elseif(is_page('about-us')) :
       $aboutPageVideo= the_field('carousel_video_background');
       if($aboutPageVideo):
       echo'<link rel="preload" href="'.$aboutPageVideo.'" as="video" type="video/mp4">';
      endif;
     endif;
}
function arphabet_widgets_init(){
        // Sidebar
        register_sidebar(array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar',
            'before_widget' => '<div class="sidebar">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="title--section text--upcase">',
            'after_title'   => '</h2>',
        ));
    }
add_action( 'widgets_init', 'arphabet_widgets_init' );

function pagination_bar($custom_query) {
    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
             'format' => '?paged=%#%',
             'current' => max( 1, get_query_var('paged') ),
             'total' => $total_pages,
            'prev_text'          => __( 'Previous page', 'theme-domain' ),
      			'next_text'          => __( 'Next page', 'theme-domain' ),
      			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'theme-domain' ) . ' </span>',
        ));
    }
}

function GymandFit_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 560, 360, true);
  add_image_size('SizeForCarousel', 'full', 480, true);
}

add_action('after_setup_theme', 'GymandFit_features');
//* Remove WP Embed Script
function stop_loading_wp_embed() {
if (!is_admin()) {
wp_deregister_script('wp-embed');
}
}
add_action('init', 'stop_loading_wp_embed');
// Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );

// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );

// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
// Setting hình crop hình đại diện
  function hk_get_thumb($id, $w, $h){
  	if(get_post_thumbnail_id($id)){
  		$url = wp_get_attachment_url( get_post_thumbnail_id($id));
  	} else {
  		$url = get_bloginfo('template_directory').'/no-thumb.jpg';
  	}
  	$image = huykira_image_resize($url, $w, $h, true, false);
  	return $image['url'];
  }
  function hk_get_image($url, $w, $h){
  	$image = huykira_image_resize($url, $w, $h, true, false);
  	return $image['url'];
  }
