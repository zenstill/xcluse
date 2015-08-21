<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) { 
	exit; // Exit if accessed directly
}
global $post, $woocommerce, $product, $current_user;
get_header( 'shop' ); ?>
<div class="j_full_page">
<script>
 $(document).ready(function() {
	  $( ".addtocompare" ).on( "click", function() {
		  product_id = $(this).data( "productid" );
		  request = $(this).data( "request" );
		  //alert(product_id);
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'addtocompare',  
					product_id:product_id,
					request:request
					},
					context: this,  
					success: function(data){
						if(data == 'yes'){
						$(this).html('<i class="added_comp" title="Added to compare"></i>');
						}else{
							alert('Your previous product category not matching with this product.');
						}

					}
 	});				
   });
   });
</script>
<script>

   $(document).ready(function() {
	   $( "body" ).on( "click", ".addtowishlist", function() {
	 /* $( ".addtowishlist" ).on( "click", function() {*/
		  product_id = $(this).data( "productid" );
		  request = $(this).data( "request" );
		  //alert(product_id);
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'addtowishlist',  
					product_id:product_id,
					request:request
					},
					context: this,  
					success: function(data){
					$(this).ajaxStart(function(){
					    //$(".ajax_loading").css("display", "block");
					});
					$(this).ajaxComplete(function(){
						$(this).toggleClass('addtowishlist addedtowishlist');
						$(this).html('<i class="added_wish_comp" title="Added to wishlist"></i>');
					});

					}
 	});				
   });
   });
</script>
 <script type="text/javascript" src="http://select-box.googlecode.com/svn/tags/0.2/jquery.selectbox-0.2.min.js"></script>
            <script>
jQuery(document).ready(function() {
    jQuery("#selection_option").selectbox();
});
</script>
<?php setPostViews(get_the_ID());?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/flexslider.css" type="text/css" />
<div class="clean-banners"></div>
<!-- list of items first start -->
<main class="main-content" role="main">
<div class="wrapper">
    <div class="container">
    
    
    
    <div class="grid">
        <div class="grid-item sect-list-view">
        <header class="section-header sect-link">
        <div class="sorting-filters">
          <div class="section-header--left">
              <div class="collection-view"> <?php do_action( 'woocommerce_bredcrumbs' );?><!--<a href="http://localhost/jegadeesh/newxcluse">Home<span> &gt; </span></a>Shop--><!--<a title="Grid view" class="collection-view--active" href="#">Living Room  <span> &gt;</span> </a> <a title="List view" class="change-view" data-view="list">Tables</a>--> </div>
            </div>
          
        </div>
         </header>
      </div>
        <div class="col-sm-6">
 <?php 		while ( have_posts() ) : the_post();?>
        <section class="slider">
            <div id="slider" class="flexslider">
            <ul class="slides">
            		<?php
				$res = $wpdb->get_results("select product_id from add_to_wishlist where user_id=".$current_user->ID);
				$my_wish_arr = array();
				foreach($res as $result){
					$my_wish_arr[] = $result->product_id;
				}
				
			$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );
			$thumbnail_ext_url1 = get_post_meta( $post->ID, '_thumbnail_ext_url' );
			$thumbnail_ext_url = $thumbnail_ext_url1[0];
			$attachment_count = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}
            ?>
                <li> <?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $thumbnail_ext_url, $image_caption, $image ), $post->ID );?></li> 
                
              </ul>
          </div>
          <?php do_action( 'woocommerce_product_thumbnails' ); ?>

          </section>
       <?php endwhile; // end of the loop. ?>
        <div class="clear-top-pad"></div>
        <div class="clearfix"></div>
      </div>
      
        <div class="col-sm-6">
        <div class="add-cart">
        <div class="price_tag_sect">
            <div class="top-list">
            <div class="col-sm-6">
                <div class="add-wish">
                <ul class="add-to-links-product-view product compare-button">
                 <?php if(!is_user_logged_in()){ ?>
                 <li><a title="Add to Wishlist" href="#" class="link-wishlist" data-toggle="modal" data-target="#myModal" id="for_account"><i class="wish_comp"></i></a></li>

                 <?php } else { ?>
                   <?php if (in_array($post->ID, $my_wish_arr) && !empty($my_wish_arr)) {?>
						 <li><a title="Added to Wishlist" href="<?php echo HOME;?>mywishlist" class="addedtowishlist"><i class="added_wish_comp" title="Added to wishlist"></i></a></li>
                        <?php } else { ?>
                        <li><a title="Add to Wishlist" href="javascript:void(0)" class="addtowishlist" data-productid="<?php echo $post->ID;?>" data-request="add" ><i class="wish_comp"></i><?php //echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );?></a></li>
						 <?php } } ?>
                  
                    <?php $meta_values = get_post_meta( $post->ID, '_product_url' );
					      $product_url = $meta_values[0]; ?>
                          <?php $arr_compare = explode(",", $_COOKIE['compare']);?>
                          <?php if (in_array($post->ID, $arr_compare) && !empty($_COOKIE['compare'])) {?>
                         <li><a title="Added to Compare" href="<?php echo HOME;?>compare" class="link-wishlist addtocompare" data-productid="<?php echo $post->ID;?>" data-request="add"><i class="added_comp"></i></a></li>
                         <?php } else { ?>
                         <li><a title="Add to Compare" href="javascript:void(0)" class="link-wishlist addtocompare" data-productid="<?php echo $post->ID;?>" data-request="add"><i class="level_comp"></i></a></li>
                         <?php } ?>
                    <!--<li> <a title="View Product" href="<?php echo $product_url;?>" class="link-compare" target="_blank"><i class="cartdetail_comp"></i></a></li>-->

</ul>
              </div>
                  
              
              </div>
            <!--<div class="col-sm-6">
            <!-- <span class="result-sec"><a href="">Back to results <i class="fa fa-times"></i></a></span> </div>-->
             <?php $variation_id = get_post_meta( get_the_ID(), '_variation_id', true );
	  			if(!empty($variation_id) && isset($variation_id)){
			$res_variation = $wpdb->get_results("SELECT `post_id` FROM `wp_postmeta` WHERE `meta_key` LIKE '_variation_id' AND `meta_value` LIKE '".trim($variation_id)."' ORDER BY `meta_value` ASC");
			}?>
            <?php $count_var_id = count($res_variation);
			
			$current_seller_term_lists = wp_get_post_terms(get_the_ID(), 'pa_seller', array("fields" => "ids"));
			$current_seller_id = $current_seller_term_lists[0];
			$current_sellerTermObject = get_term_by( 'id', absint( $current_seller_id ), 'pa_seller' );
			if(!empty($res_variation) && isset($res_variation)){
			  foreach($res_variation as $variation_id){
				 $var_post_id = $variation_id->post_id;
				 if($var_post_id != get_the_ID()){
				  $seller_term_lists = wp_get_post_terms($var_post_id, 'pa_seller', array("fields" => "ids"));
				  $seller_id = $seller_term_lists[0];
				   $sellerTermObject = get_term_by( 'id', absint( $seller_id ), 'pa_seller' );
				   $asd = '<li><a href="'.get_post_permalink($var_post_id).'">'.$sellerTermObject->name.'</a></li>';
                       } } }?>
		<?php if(isset($current_sellerTermObject) && !empty($current_sellerTermObject)){?>
            <div class="col-sm-6">
            <div class="result-sec">
            <span class="other_seller">Sellers</span>
                <ul class="nav nav-pills">
                <li class="dropdown"> 
                
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $current_sellerTermObject->name;?> <b class="caret"></b></a>
                <?php if(isset($seller_term_lists) && !empty($seller_term_lists)){?>
                    <ul class="dropdown-menu pull-right sell_dropdown">
			 <?php echo $asd;?>
                        </ul>
                        <?php } ?>
                      </li>
                  </ul>
                  
              </ul>
              </div>
                <!-- <span class="result-sec"><a href="">Back to results <i class="fa fa-times"></i></a></span>--> </div>
                <?php } ?>
          </div>
          <?php $sale_price = get_post_meta( $post->ID, '_sale_price', 'true' );?>
          <?php $regular_price = get_post_meta( $post->ID, '_regular_price', 'true' );?>
          <?php $percent_off = get_post_meta( $post->ID, '_percent_off', 'true' );?>
          <?php $merchant = get_post_meta( $post->ID, '_merchant', 'true' );
		        $_price = get_post_meta( $post->ID, '_price', 'true' );?>
          <div class="product_view_price">
             <div class="product_price_list">
              <?php if($sale_price && ($sale_price != $regular_price)){?>
                <span class="product_Price">  $ <?php echo $sale_price;?></span> 
               <span class="new-price">$ <?php echo $regular_price;?></span> 
                <?php }else { ?>
                <span class="product_Price">  $<?php echo $_price;?></span>
                <?php } ?>
                <?php if($percent_off){?>
               <span class="offer_per"><?php echo $percent_off;?>% OFF</span>
               <?php } ?>
               </div>
               <?php if($merchant){?>
               <div class="sellers"><a href=""><?php echo $merchant;?></a></div><?php } ?>
               </div>
  <div class="submit_btn"><a href="<?php echo $product_url;?>" class="btn sub-btn right" target="_blank">Buy Now</a></div>        
            <hr>
            </div>
            
 
            <!--   Start   -->
            
            <style>
			.color_frame {
				clear: both;
				float: left;
				width: 100%;
				margin-bottom: 30px;
				}
            .product_color{
				height:50px;
				width:50px;
				border:1px solid #bbb;
				float:left;
				margin-right: 10px;
				  box-shadow: 1px 1px 3px #818080;
			}
			.product_color_view, .product_size_view{
				width:50%;
				float:left;
			}
			.product_size_view span{
				float:left;
				margin-right:10px;
				border:1px solid #bbb;
				padding:5px 10px;
				box-shadow: 1px 1px 3px  #818080;
			}
			.product_size_view span:hover, .product_color:hover{
				border:1px solid #F56E30;
			}
			.size_title{
				font-family: 'Nilland';
				font-size:18px;
			}
            </style>
            <?php $variation_id = get_post_meta( get_the_ID(), '_variation_id', true );
			//$res_variation = $wpdb->get_results("SELECT `post_id` FROM `wp_postmeta` WHERE `meta_key` LIKE 'variation_id' AND `meta_value` LIKE ".$variation_id." AND `post_id` != ".get_the_ID()." ORDER BY `meta_value` ASC");
			if(!empty($variation_id) && isset($variation_id)){
			$res_variation = $wpdb->get_results("SELECT `post_id` FROM `wp_postmeta` WHERE `meta_key` LIKE '_variation_id' AND `meta_value` LIKE '".trim($variation_id)."' ORDER BY `meta_value` ASC");
			//echo "<pre>";print_r($res_variation);exit;
			$count_var_id = count($res_variation);
			if(!empty($res_variation) && isset($res_variation)){
			$cur_color_term = array();
			$cur_size_term = array();?>
			<?php foreach($res_variation as $variation_id){
				  $var_post_id = $variation_id->post_id;
		//-------------------------------------------------------------------------------		
				$color_term_lists = wp_get_post_terms($var_post_id, 'pa_color', array("fields" => "ids"));
				//print_r($term_lists);exit;
				if(!empty($color_term_lists) && isset($color_term_lists)){?>
                <?php foreach($color_term_lists as $color_list){
					if (!in_array($color_list, $cur_color_term)) {
						$cur_color_term[] = $color_list;?>
                        <?php $colorTermObject = get_term_by( 'id', absint( $color_list ), 'pa_color' );?>
                    <?php 
					if($var_post_id == get_the_ID()){
					$color .= '<span style="border:1px solid #f56e30"><a href="javascript:void(0)">'.$colorTermObject->name.'</a></span>';
					}else{
					$color .= '<span><a href="'.get_post_permalink($var_post_id).'">'.$colorTermObject->name.'</a></span>';
					}
					 ?>
					<?php	//$cur_color_term[] = $color_list;
					 }
				}?>

				<?php }
	//-------------------------------------------------------------------------------			
								$size_term_lists = wp_get_post_terms($var_post_id, 'pa_size', array("fields" => "ids"));
				//print_r($term_lists);exit;
				if(!empty($size_term_lists) && isset($size_term_lists)){?>

                <?php foreach($size_term_lists as $size_list){
					if (!in_array($size_list, $cur_size_term)) {
						$cur_size_term[] = $size_list;?>
                        <?php $sizeTermObject = get_term_by( 'id', absint( $size_list ), 'pa_size' );?>
                    <?php 
					if($var_post_id == get_the_ID()){
					$size .= '<span style="border:1px solid #f56e30"><a href="javascript:void(0)">'.$sizeTermObject->name.'</a></span>';
					}else{
					$size .= '<span><a href="'.get_post_permalink($var_post_id).'">'.$sizeTermObject->name.'</a></span>';
					}
					 ?>
					<?php	//$cur_color_term[] = $color_list;
					 }
				}?>
				<?php }
//-------------------------------------------------------------------------------
		}?>
		<?php } }
		
		//print_r($cur_color_term);
		//print_r($cur_size_term);exit; ?>
           <?php if((!empty($color) && isset($color)) || (!empty($size) && isset($size))){?>                
            <div class="color_frame">
       <?php if(!empty($color) && isset($color)){?>     
            <div class="product_size_view">
            <p class="size_title">Color</p>
            <?php echo $color;?>
            </div>
            <?php } ?>
       <?php if(!empty($size) && isset($size)){?>     
            <div class="product_size_view">
            <p class="size_title">Size</p>
            <?php echo $size;?>
            </div>
            <?php } ?>
            </div>
            <hr>
            <?php } ?>
            
            <p class="product-meta vendor-meta" itemprop="brand"> <a href="javascript:void(0)" title="Zara"><?php woocommerce_template_single_title() ;?></a></p>
            <div> <?php echo str_replace('. ', '.<br>', $post->post_content);?></div>
            <!--<div class="submit_btn"><a href="<?php echo $product_url;?>" class="btn sub-btn" target="_blank">Buy Now</a></div>-->
		  <style>
		  .sub-btn{
		  background:#D61C1C;
		  }
		  </style>
          <div class="star-list">

          <ul>
         
          <li> <?php if(function_exists('the_ratings')) { the_ratings(); } ?></li>
         <?php $_color = get_post_meta( $post->ID, '_color', 'true' );
		 $_features = get_post_meta( $post->ID, '_features', 'true' );
		 $feature = unserialize($_features);
		 $_weight = get_post_meta( $post->ID, '_weight', 'true' );
		 $_length = get_post_meta( $post->ID, '_length', 'true' );
		 $_width = get_post_meta( $post->ID, '_width', 'true' );
		 $_height = get_post_meta( $post->ID, '_height', 'true' );?>

<?php if(isset($_weight) && !empty($_weight)){?>
          <li><span class="attr_label">Weight </span><span style="display:inline-block; width:27px;">:</span><span class="linked-list"><a><?php echo $_weight;?> (mg)</a></span></li>
          <?php } ?>
<?php if(isset($_length) && !empty($_length)){?>
          <li><span class="attr_label">Length </span><span style="display:inline-block; width:27px;">:</span><span class="linked-list"><a><?php echo $_length;?> (mm)</a></span></li>
          <?php } ?>
<?php if(isset($_width) && !empty($_width)){?>
          <li><span class="attr_label">Width </span><span style="display:inline-block; width:27px;">:</span><span class="linked-list"><a><?php echo $_width;?> (mg)</a></span></li>
          <?php } ?>
<?php if(isset($_height) && !empty($_height)){?>
          <li><span class="attr_label">Height </span><span style="display:inline-block; width:27px;">:</span><span class="linked-list"><a><?php echo $_height;?> (mm)</a></span></li>
          <?php } ?>
          <?php $attribute_taxonomies = wc_get_attribute_taxonomies();
$taxonomy_terms = array();
$needed_terms = array('brand','manufacturer','model','merchant','condition','shipping','seller');
if ( $attribute_taxonomies ) {
    foreach ($attribute_taxonomies as $tax) {
		if(in_array($tax->attribute_name,$needed_terms)){
    if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) {
		$taxonomy_terms[$tax->attribute_name] =  wp_get_post_terms($post->ID, 'pa_'.$tax->attribute_name);?>
        <?php if($taxonomy_terms[$tax->attribute_name][0]->name){?>
          <li><span class="attr_label"><?php echo ucfirst($tax->attribute_name);?> </span><span style="display:inline-block; width:27px;">:</span><span class="linked-list"><a><?php echo $taxonomy_terms[$tax->attribute_name][0]->name;?></a></span></li>
          <?php } } } } }?>
    <?php if(isset($feature) && !empty($feature)){?>
          <li><span class="attr_label">Features </span><span style="display:inline-block; width:27px;float:left;">:</span><span class="linked-list" style="display:inline-block;"><a><?php foreach($feature as $key=>$value){ if($key != 'blob') { ?><?php echo $key;?> <span style="display:inline-block; width:27px;">:</span> <?php echo $value; ?></br> <?php } } ?></a></span></li>
          <?php } ?>
          </ul>
          </div>

          </div>
      </div>
      </div>
       	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/slick_car.css"/>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style_car.css"> -->
      <script src="<?php echo get_template_directory_uri();?>/js/slick_car.js"></script>
      <script src="<?php echo get_template_directory_uri();?>/js/scripts_car.js"></script>
      <?php woocommerce_related_products(16,4);?>
      <?php woocommerce_upsell_display(16,4);?>

  
  </div>
  </div>
</main>
  <script src="<?php echo get_template_directory_uri();?>/js/jquery.flexslider.js"></script>
 
   <script type="text/javascript">
   $('.multiple-items').slick({
  infinite: false,
  slidesToShow: 4,
  slidesToScroll: 4,
  speed: 800,
});
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
</div>
<?php get_footer();?>