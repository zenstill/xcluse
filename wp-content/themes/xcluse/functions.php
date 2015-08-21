<?php
define('HOME', site_url().'/');
show_admin_bar( false );
/*define('TEMPLATE_URL', get_bloginfo('template_url').'/');
define('CSS', get_bloginfo('template_url').'/css/');
define('JS', get_bloginfo('template_url').'/js/');*/

require( get_template_directory() . '/include/myfunction.php' );
require( get_template_directory() . '/include/widget.php' );
require( get_template_directory() . '/ajax_include/menuajax.php' );
require( get_template_directory() . '/ajax_include/bredcrum_ajax.php' );
require( get_template_directory() . '/ajax_include/mainheadsearchajax.php' );
require( get_template_directory() . '/ajax_include/orderbyproducts.php' );
require( get_template_directory() . '/ajax_include/viewsavesearchajax.php' );
require( get_template_directory() . '/ajax_include/savesearchajax.php' );
require( get_template_directory() . '/ajax_include/sidebarajax.php' );
require( get_template_directory() . '/ajax_include/sidebarajaxclose.php' );
require( get_template_directory() . '/admin/banner-page.php' );
register_taxonomy( 'product', 'product-cat'); 
//---------------------------------------------------------------------------------------------------------
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/admin_mycss.css' );
}
add_action( 'admin_enqueue_scripts', 'my_login_stylesheet' );
// custom admin login logo
function custom_login_logo() {
echo '<style type="text/css">
h1 a { background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; background-size: 187px 63px !important; height: 63px !important; width: 187px !important;}
</style>';
}
add_action('login_head', 'custom_login_logo');

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
//add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

add_theme_support( 'html5', array( 'search-form' ) );

// Disable WooCommerce styles 
//define( 'WOOCOMMERCE_USE_CSS', false );
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}



function dl_sort_by_page() {
global $dl_page_value;
  $dl_page_value = $_POST['woocommerce-sort-by-columns'];

  return $dl_page_value;
}

//add_filter('loop_shop_per_page','dl_sort_by_page');

add_filter( 'admin_post_thumbnail_html', 'thumbnail_url_field' );

add_action( 'save_post', 'thumbnail_url_field_save', 10, 2 );

add_filter( 'post_thumbnail_html', 'thumbnail_external_replace', 10, PHP_INT_MAX );

function url_is_image( $url ) {
  if ( ! filter_var( $url, FILTER_VALIDATE_URL ) ) {
    return FALSE;
  }
  $ext = array( 'jpeg', 'jpg', 'gif', 'png' );
  $info = (array) pathinfo( parse_url( $url, PHP_URL_PATH ) );
  return isset( $info['extension'] )
    && in_array( strtolower( $info['extension'] ), $ext, TRUE );
}

function thumbnail_url_field( $html ) {
  global $post;
  $value = get_post_meta( $post->ID, '_thumbnail_ext_url', TRUE ) ? get_post_meta( $post->ID, '_thumbnail_ext_url', TRUE ) : "";
  $nonce = wp_create_nonce( 'thumbnail_ext_url_' . $post->ID . get_current_blog_id() );
  $html .= '<input type="hidden" name="thumbnail_ext_url_nonce" value="' 
    . esc_attr( $nonce ) . '">';
  $html .= '<div><p>' . __('Or', 'txtdomain') . '</p>';
  $html .= '<p>' . __( 'Enter the url for external image', 'txtdomain' ) . '</p>';
  $html .= '<p><input type="url" name="thumbnail_ext_url" value="' . $value . '"></p>';
  if ( ! empty($value) && url_is_image( $value ) ) {
    $html .= '<p><img style="max-width:150px;height:auto;" src="' 
      . esc_url($value) . '"></p>';
    $html .= '<p>' . __( 'Leave url blank to remove.', 'txtdomain' ) . '</p>';
  }
  $html .= '</div>';
  return $html;
}

function thumbnail_url_field_save( $pid, $post ) {
  $cap = $post->post_type === 'page' ? 'edit_page' : 'edit_post';
  if (
    ! current_user_can( $cap, $pid )
    || ! post_type_supports( $post->post_type, 'thumbnail' )
    || defined( 'DOING_AUTOSAVE' )
  ) {
    return;
  }
  $action = 'thumbnail_ext_url_' . $pid . get_current_blog_id();
  $nonce = filter_input( INPUT_POST, 'thumbnail_ext_url_nonce', FILTER_SANITIZE_STRING );
  $url = filter_input( INPUT_POST,  'thumbnail_ext_url', FILTER_VALIDATE_URL );
  if (
    empty( $nonce )
    || ! wp_verify_nonce( $nonce, $action )
    || ( ! empty( $url ) && ! url_is_image( $url ) )
  ) {
    return;
  }
  if ( ! empty( $url ) ) {
    update_post_meta( $pid, '_thumbnail_ext_url', esc_url($url) );
    if ( ! get_post_meta( $pid, '_thumbnail_id', TRUE ) ) {
      update_post_meta( $pid, '_thumbnail_id', 'by_url' );
    }
  } elseif ( get_post_meta( $pid, '_thumbnail_ext_url', TRUE ) ) {
    delete_post_meta( $pid, '_thumbnail_ext_url' );
    if ( get_post_meta( $pid, '_thumbnail_id', TRUE ) === 'by_url' ) {
      delete_post_meta( $pid, '_thumbnail_id' );
    }
  }
}

function thumbnail_external_replace( $html, $post_id ) {
  $main_url =  get_post_meta( $post_id, '_thumbnail_id', TRUE );
  if($main_url=="by_url"){
  $url =  get_post_meta( $post_id, '_thumbnail_ext_url', TRUE );
  if ( empty( $url )/* || ! url_is_image( $url )*/ ) {
	  $html = '<img  class="woocommerce-placeholder wp-post-image" src="'.plugins_url() . '/woocommerce/assets/images/placeholder.png" alt="Placeholder">';
    return $html;
  }
  $alt = get_post_field( 'post_title', $post_id ) . ' ' .  __( 'thumbnail', 'txtdomain' );
  $attr = array( 'alt' => $alt );
  $attr = apply_filters( 'wp_get_attachment_image_attributes', $attr, NULL );
  $attr = array_map( 'esc_attr', $attr );
  $html = sprintf( '<img src="%s"', esc_url($url) );
  foreach ( $attr as $name => $value ) {
    $html .= " $name=" . '"' . $value . '"';
  }
  $html .= ' />';
  return $html;
  }else{
	   return $html;
  }
}

function my_search_form( $form ) {
	$form = '<form id="formSearch" name="formSearch" action="'.HOME.'shop" method="get">
                <div id="searchbox">
                  <input id="keyword" name="s" autocomplete="off" autofocus="autofocus" type="text" placeholder="Search" value="" class="ui-autocomplete-input alreadyInit search-box-text-unactive" role="textbox" aria-autocomplete="list" aria-haspopup="true" value="' . get_search_query() . '">
                </div>
                <button type="submit" class="dnm-button" id="searchBtn"></button>
                <div class="clear"></div>
              </form>';

	return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

function max_meta_value(){
    global $wpdb;
    $query = "SELECT max(cast(meta_value as unsigned)) FROM wp_postmeta WHERE meta_key='_price'";
    $the_max = $wpdb->get_var($query);
    return $the_max;
}
function min_meta_value(){
    global $wpdb;
    $query = "SELECT min(cast(meta_value as unsigned)) FROM wp_postmeta WHERE meta_key='_price'";
    $the_min = $wpdb->get_var($query);
    return $the_min;
}
function round_up($value, $places)
{
    $mult = pow(10, abs($places));
     return $places < 0 ?
    ceil($value / $mult) * $mult :
        ceil($value * $mult) / $mult;
}
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
 'primary' => __( 'Primary Navigation', 'twentyten' ),
 ) );
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {

	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 2; // arranged in 2 columns
	return $args;
}

function advanced_search_query($query) {

    if($query->is_search()) {
        // category terms search.
       if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'pa_size',
                'field' => 'slug',
                'terms' => array(30)
            )));
        }    
        return $query;
    }
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 3;' ), 20 );


function my_columns_filter($columns) {
	
	unset($columns['ratings']);

    return $columns;
}
 add_filter( 'manage_edit-product_columns', 'my_columns_filter',10, 1 );
 add_action( 'wp_ajax_nopriv_addtowishlist', 'addtowishlist' );  
 add_action( 'wp_ajax_addtowishlist', 'addtowishlist' );  
function addtowishlist(){ 
global $wpdb,$current_user;
		 $product_id = $_POST['product_id'];
		 $request = $_POST['request'];
		 	$prodect_count_default = $wpdb->get_results("select product_id from add_to_wishlist where user_id=".$current_user->ID." and product_id = ".$product_id);
			//print_r($prodect_count_default);
	     $prod_count_default = count($prodect_count_default);
		 if($request=="add" && $prod_count_default == 0){
             $wpdb->insert( 'add_to_wishlist', array('user_id' => $current_user->ID,'group_id' => '1','product_id' => $product_id,'created_date' => date('Y-m-d H:i:s')));
		 }
		 exit;

}
function deletewishlist(){ 
global $wpdb,$current_user;
/*if(isset($_GET['del']) && $_GET['del']=="compare"){

		 	unset($_COOKIE['compare']);
	        setcookie('compare', '', time() - (86400 * 30), "/");
			wp_redirect( HOME.'compare' ); exit;
}*/
if(isset($_GET['del_wishlistid'])){
           $wpdb->delete( 'add_to_wishlist', array( 'user_id' => $current_user->ID, 'product_id' => $_GET['del_wishlistid'] ) );
			wp_redirect( HOME.'mywishlist' ); exit;			//echo $comp;exit;
}
}
add_action( 'init', 'deletewishlist');
 add_action( 'wp_ajax_nopriv_compare_header_change_value', 'compare_header_change_value' );  
 add_action( 'wp_ajax_compare_header_change_value', 'compare_header_change_value' );  
function compare_header_change_value(){ 
if(!empty($_COOKIE['compare'])){ 
$arr_compare = explode(",", $_COOKIE['compare']);
 }
echo 'Compare';
if(!empty($arr_compare)) { 
echo '('.count($arr_compare).')';
}
else{
	echo 'Compare';
}
exit;
}
 add_action( 'wp_ajax_nopriv_addtocompare', 'addtocompare' );  
 add_action( 'wp_ajax_addtocompare', 'addtocompare' );  
function addtocompare(){ 
		 $product_id = $_POST['product_id'];
		 $arr_compare = explode(",", $_COOKIE['compare']);
		 $already_product_id = $arr_compare[0];
		 $already_term_list = wp_get_post_terms($already_product_id, 'product_cat', array("fields" => "ids"));
		 $current_term_list = wp_get_post_terms($product_id, 'product_cat', array("fields" => "ids"));
		 //print_r($already_term_list);exit;
		 if(!empty($already_term_list)){
		 foreach($current_term_list as $current){
			 if(in_array($current,$already_term_list)){
				 $act = 'yes';
			 }else{
				 $act = 'no';
			 }
		 }
		 }else{
			 $act = 'yes';
		 }
if($act == 'yes'){
		 $request = $_POST['request'];
		 $comp = $_COOKIE['compare'];
		 if($request=="add"){
		 if(!empty($comp)){
			 $comp = $comp.','.$product_id;
		 }else{
			 $comp = $product_id;
		 }
		 setcookie('compare', $comp, time() + (86400 * 30), "/");
		 }
}
   echo $act;
exit;

}
function deletecompare(){ 
if(isset($_GET['del']) && $_GET['del']=="compare"){

		 	unset($_COOKIE['compare']);
	        setcookie('compare', '', time() - (86400 * 30), "/");
			$dsd = str_replace('?del=compare','',$_SERVER["REQUEST_URI"]);
			wp_redirect( $dsd); exit;
}
if(isset($_GET['del_compare'])){
            $arr_compare = explode(",", $_COOKIE['compare']);
			$del_key = array_search($_GET['del_compare'],$arr_compare);

			unset($arr_compare[$del_key]);
						//print_r($arr_compare);exit;
			$comp = implode(",", $arr_compare);

		 	setcookie('compare', $comp, time() + (86400 * 30), "/");
			wp_redirect(HOME.'compare'); exit;			//echo $comp;exit;
}
}
add_action( 'init', 'deletecompare');

add_action( 'wp_ajax_nopriv_showsimilar', 'showsimilar' );  
 add_action( 'wp_ajax_showsimilar', 'showsimilar' );  
function showsimilar(){ 
global $product, $woocommerce_loop;

$product_id = $_POST['product_id'];
$related = get_related_jproducts($product_id,15);
//echo "<pre>";print_r($terms);exit;
if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product_id)
) );

$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>

<div class="slider multiple-items">
        		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post();?>
            <?php
			$url =  get_post_meta( get_the_ID(), '_thumbnail_ext_url', TRUE );
  if ( empty( $url )) {
	  $url = '<img  class="woocommerce-placeholder wp-post-image" src="'.plugins_url() . '/woocommerce/assets/images/placeholder.png" alt="Placeholder">';
  } ?>
            <div class="multiple"><a href="<?php the_permalink(); ?>"><?php do_action( 'woocommerce_before_shop_loop_item_thumbnail' ); ?></a> <!-- <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide7.jpg" > </a>-->
                  <?php $sale_price = get_post_meta( get_the_ID(), '_sale_price', 'true' );?>
                  <?php $regular_price = get_post_meta( get_the_ID(), '_regular_price', 'true' );
				  $_price = get_post_meta( get_the_ID(), '_price', 'true' );?>
               <?php if($sale_price && ($sale_price != $regular_price)){?>
                    <p class="old-price"><span class="price"> $ <?php echo number_format((float)$sale_price, 2, '.', '');?> </span><span class="related_product"> $ <?php echo number_format((float)$regular_price, 2, '.', '');?> </span> </p>
                    <?php }else { ?>
                       <p class="old-price"><span class="price"> $ <?php echo number_format((float)$_price, 2, '.', '');?> </span></p>
                       <?php } ?>
                      <p class="special-price"><a href="<?php the_permalink(); ?>"><?php echo get_short_content(ucfirst(strtolower(get_the_title( get_the_ID() ))),70); ?></a></p>
          
 			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>
         <a href="javascript:void(0)" class="cls_btn"><i class="fa fa-times"></i></a>
          </div>
<?php endif;

wp_reset_postdata();
exit;
}
function get_related_jproducts( $product_id,$limit = 5 ) {
		global $wpdb;

		$limit = absint( $limit );

		// Related products are found from category and tag
		$tags_array = array(0);
		$cats_array = array(0);

		// Get tags
		$terms = apply_filters( 'woocommerce_get_related_product_tag_terms', wp_get_post_terms( $product_id, 'product_tag' ), $product_id );
		foreach ( $terms as $term ) {
			$tags_array[] = $term->term_id;
		}

		// Get categories
		$terms = apply_filters( 'woocommerce_get_related_product_cat_terms', wp_get_post_terms( $product_id, 'product_cat' ), $product_id );
		foreach ( $terms as $term ) {
			$cats_array[] = $term->term_id;
		}

		// Don't bother if none are set
		if ( sizeof( $cats_array ) == 1 && sizeof( $tags_array ) == 1 ) {
			return array();
		}

		// Sanitize
		$cats_array  = array_map( 'absint', $cats_array );
		//$tags_array  = array_map( 'absint', $tags_array );
		//$exclude_ids = array_map( 'absint', array_merge( array( 0, $this->id ), $this->get_upsells() ) );

		// Generate query
		$query           = array();
		$query['fields'] = "SELECT DISTINCT ID FROM {$wpdb->posts} p";
		$query['join']   = " INNER JOIN {$wpdb->postmeta} pm ON ( pm.post_id = p.ID AND pm.meta_key='_visibility' )";
		$query['join']  .= " INNER JOIN {$wpdb->term_relationships} tr ON (p.ID = tr.object_id)";
		$query['join']  .= " INNER JOIN {$wpdb->term_taxonomy} tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)";
		$query['join']  .= " INNER JOIN {$wpdb->terms} t ON (t.term_id = tt.term_id)";

		if ( get_option( 'woocommerce_hide_out_of_stock_items' ) === 'yes' ) {
			$query['join'] .= " INNER JOIN {$wpdb->postmeta} pm2 ON ( pm2.post_id = p.ID AND pm2.meta_key='_stock_status' )";
		}

		$query['where']  = " WHERE 1=1";
		$query['where'] .= " AND p.post_status = 'publish'";
		$query['where'] .= " AND p.post_type = 'product'";
		//$query['where'] .= " AND p.ID NOT IN ( " . implode( ',', $exclude_ids ) . " )";
		$query['where'] .= " AND pm.meta_value IN ( 'visible', 'catalog' )";

		if ( get_option( 'woocommerce_hide_out_of_stock_items' ) === 'yes' ) {
			$query['where'] .= " AND pm2.meta_value = 'instock'";
		}

		if ( apply_filters( 'woocommerce_product_related_posts_relate_by_category', true, $product_id ) ) {
			$query['where'] .= " AND ( tt.taxonomy = 'product_cat' AND t.term_id IN ( " . implode( ',', $cats_array ) . " ) )";
			$andor = 'OR';
		} else {
			$andor = 'AND';
		}

		$query = apply_filters( 'woocommerce_product_related_posts_query', $query, $product_id );

		// How many rows total?
		$max_related_posts_transient_name = 'wc_max_related_' . $product_id . WC_Cache_Helper::get_transient_version( 'product' );

		if ( false === ( $max_related_posts = get_transient( $max_related_posts_transient_name ) ) ) {
			$max_related_posts_query           = $query;
			$max_related_posts_query['fields'] = "SELECT COUNT(DISTINCT ID) FROM {$wpdb->posts} p";
			$max_related_posts                 = absint( $wpdb->get_var( implode( ' ', apply_filters( 'woocommerce_product_max_related_posts_query', $max_related_posts_query, $product_id ) ) ) );
			set_transient( $max_related_posts_transient_name, $max_related_posts, DAY_IN_SECONDS * 30 );
		}

		// Generate limit
		$offset          = $max_related_posts < $limit ? 0 : absint( rand( 0, $max_related_posts - $limit ) );
		$query['limits'] = " LIMIT {$offset}, {$limit} ";

		// Get the posts
		$related_posts = $wpdb->get_col( implode( ' ', $query ) );

		return $related_posts;
	}
function my_woocommerce_catalog_orderby( $orderby ) {
	unset($orderby["menu_order"]);
	$orderby["popularity"] = 'Most Viewed';
	$orderby["rating"] = 'Average rating';
	$orderby["date"] = 'Newness';
	$orderby["price"] = 'Price: low to high';
	$orderby["price-desc"] = 'Price: high to low';
	return $orderby;
}
 add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );
 add_action( 'wp_ajax_nopriv_change_size', 'change_size' );  
 add_action( 'wp_ajax_change_size', 'change_size' );  
function change_size(){ 
		 $action_id = $_POST['action_id'];
		 if($action_id=="six"){
			 unset($_COOKIE['change_size']);
		    setcookie('change_size', 'six', time() + (86400 * 30), "/");
		 }
		 elseif($action_id=="four"){
			  unset($_COOKIE['change_size']);
		      setcookie('change_size', 'four', time() + (86400 * 30), "/");
		 }

}
function my_deregister_heartbeat() {
	global $pagenow;

	if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow ) {
		wp_deregister_script('heartbeat');
		wp_register_script('heartbeat', false);
	}
}
add_action( 'admin_enqueue_scripts', 'my_deregister_heartbeat' );
add_action( 'wp_ajax_nopriv_addtowishlistgroup', 'addtowishlistgroup' );  
add_action( 'wp_ajax_addtowishlistgroup', 'addtowishlistgroup' ); 
function addtowishlistgroup(){
	global $wpdb,$current_user;
	$product_id = $_POST['product_id'];
	$group_id = $_POST['group_id'];
	
	$wpdb->update( "add_to_wishlist", array('group_id' => $group_id), array( 'product_id' => $_POST["product_id"],'user_id' => $current_user->ID));
	$res_group = $wpdb->get_results("select * from wishlist_group where user_id=".$current_user->ID);
	$prodect_count_default = $wpdb->get_results("select user_id from add_to_wishlist where user_id=".$current_user->ID." and group_id = 1");
	$prod_count_default = count($prodect_count_default);
	echo '<li class="droppable" id="1"><a href="'.HOME.'mywishlist?group_id=1">Default <span class="mywishlist_price">['.$prod_count_default.']</span></a> <a href="'.HOME.'mywishlist?groupdel_id=1"><span><i class="fa fa-times"></i></span></a></li>';
	foreach($res_group as $group){
				  $prodect_count = $wpdb->get_results("select user_id from add_to_wishlist where user_id=".$current_user->ID." and group_id=".$group->id);
				  $prod_count = count($prodect_count);
              echo '<li class="droppable ui-droppable" id="'.$group->id.'"><a href="'.HOME.'mywishlist?group_id='.$group->id.'">'.$group->group_name.' <span class="mywishlist_price">['.$prod_count.']</span></a> <span><i class="fa fa-times"></i></span></li>';
               }
				  exit;
}
add_action( 'wp_ajax_nopriv_addtogroup_wish', 'addtogroup_wish' );  
add_action( 'wp_ajax_addtogroup_wish', 'addtogroup_wish' ); 
function addtogroup_wish(){
	global $wpdb,$current_user;
	$group_name = $_POST['group_name'];
	$request = $_POST['request'];
	$wpdb->insert( 'wishlist_group', array('group_name' => $group_name,'user_id' => $current_user->ID));
	 echo $lastid = $wpdb->insert_id;exit;

}
if(!empty($_GET['groupdel_id'])){
add_action( 'init', 'groupwishlist_delete');
}
function groupwishlist_delete(){
	global $wpdb,$current_user;
	$wpdb->delete( 'wishlist_group', array( 'id' => $_GET['groupdel_id'],'user_id' => $current_user->ID ) );
	$wpdb->delete( 'add_to_wishlist', array( 'group_id' => $_GET['groupdel_id'],'user_id' => $current_user->ID ) );
}

add_action('pre_get_posts', 'myjegadeesh');
function myjegadeesh($query) {
	if(!is_admin() && $query->is_main_query() && ($query->is_post_type_archive( 'product' ) || $query->is_tax( get_object_taxonomies( 'product' )))){ 
	$query->set( 'orderby', 'date' );
	$query->set( 'order', 'DESC' );
	  $meta_query[] = array(

               array(

                   'key' => '_price',

                   'value' => 0,

                   'compare' => '>',

                   'type' => 'numeric'

               )

         );

	 if (!is_admin() && ($query->is_post_type_archive( 'product' ) || $query->is_tax( get_object_taxonomies( 'product' )) && isset($_GET) && !empty($_GET))) {
		 if(isset($_GET['q']) && $_GET['q']!=''){
		 add_filter( 'posts_where', 'rc_filter_where' );
		 }
		 if(isset($_GET['s']) && $_GET['s']!=''){
			 $query->set('s',$_GET['s']);
		 }
		$attribute_taxonomies = wc_get_attribute_taxonomies();
		if(isset($attribute_taxonomies)){
        foreach ($attribute_taxonomies as $tax) {
            if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) {

		 if(isset($_GET[$tax->attribute_name]) && $_GET[$tax->attribute_name]!=''){
			 			$tax_query[] = array(
					    'taxonomy' 		=>  'pa_'.$tax->attribute_name,
						'terms' 		=> $_GET[$tax->attribute_name],
						'field' 		=> 'term_id',
						'operator' 		=> 'IN'
					);
		 }}
		 }
		  $query->set('tax_query',$tax_query);
		}

	 }
  if (!is_admin() && ($query->is_post_type_archive( 'product' ) || $query->is_tax( get_object_taxonomies( 'product' ))) && isset($_GET['new']) && $_GET['new'] == 1) {

 
	 //$query->set( 'offset', 30000 );
	 $query->set( 'order', 'DESC' );

//add_filter( 'posts_where', 'rc_filter_where1' );
		 //return $query;

    }
	if (!is_admin() && ($query->is_post_type_archive( 'product' ) || $query->is_tax( get_object_taxonomies( 'product' ))) && isset($_GET['sale']) && $_GET['sale'] == 1) {
		//echo "dgdfgdfg";exit;
		 //$query->set( 'posts_per_page', 16 );
		 //$query->set( 'offset', 3 );

         $meta_query[] = array(

               array(

                   'key' => '_sale_price',

                   'value' => 0,

                   'compare' => '>',

                   'type' => 'numeric'

               )

         );



    }
         $query->set('meta_query',$meta_query);
	return $query;
	}
}
function rc_filter_where1( $where = '' ) {

    $where .= " AND Limit 0, 100";
    
    return $where;
}
function rc_filter_where( $where = '' ) {
	
	$inner_search = array_filter(explode(":", $_GET['q']));
foreach($inner_search as $key_word){
    $where .= " AND post_title LIKE '%".$key_word."%' ";
}
    
    return $where;
}

add_action( 'wp_ajax_nopriv_delete_savesearchajax', 'delete_savesearchajax' );  
add_action( 'wp_ajax_delete_savesearchajax', 'delete_savesearchajax' ); 
function delete_savesearchajax(){
	global $wpdb,$current_user;
	
	$wpdb->delete( 'saved_search', array( 'id' => $_POST['saved_id'] ) );
	
	exit; 
	}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="my_pageno"';
}


 add_action( 'wp_ajax_nopriv_clear_recentlyviewed', 'clear_recentlyviewed' );  
 add_action( 'wp_ajax_clear_recentlyviewed', 'clear_recentlyviewed' );  
function clear_recentlyviewed(){ 
//echo "jega";
			 unset($_COOKIE['woocommerce_recently_viewed']);
			  setcookie( 'woocommerce_recently_viewed', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN );
			 exit;

}
add_action( 'wp_ajax_nopriv_delajaxcompare', 'delajaxcompare' );  
 add_action( 'wp_ajax_delajaxcompare', 'delajaxcompare' ); 
function delajaxcompare(){ 
		 	unset($_COOKIE['compare']);
	        setcookie('compare', '', time() - (86400 * 30), "/");
}
?>