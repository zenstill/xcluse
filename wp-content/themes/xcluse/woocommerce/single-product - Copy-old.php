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
					$(this).ajaxStart(function(){
					    //$(".ajax_loading").css("display", "block");
					});
					$(this).ajaxComplete(function(){
						$(this).html('<i class="added_comp" title="Added to compare"></i>');
					});

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
                    <li> <a title="View Product" href="<?php echo $product_url;?>" class="link-compare" target="_blank"><i class="cartdetail_comp"></i></a></li>

</ul>
              </div>
              </div>
            <div class="col-sm-6"> <span class="result-sec"><a href="javascript:history.go(-1)">Back to results <i class="fa fa-times"></i></a></span> </div>
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

            <hr>
            <p class="product-meta vendor-meta" itemprop="brand"> <a href="javascript:void(0)" title="Zara"><?php woocommerce_template_single_title() ;?></a></p>
            <div> <?php echo str_replace('. ', '.<br>', $post->post_content);?></div>
            <div class="submit_btn"><a href="<?php echo $product_url;?>" class="btn sub-btn" target="_blank">Buy Now</a></div>
		  <style>
		  .sub-btn{
		  background:#D61C1C;
		  }
		  </style>
          <div class="star-list">

          <ul>
         
          <li> <?php if(function_exists('the_ratings')) { the_ratings(); } ?></li>
           <?php $attribute_taxonomies = wc_get_attribute_taxonomies();
$taxonomy_terms = array();

if ( $attribute_taxonomies ) :
    foreach ($attribute_taxonomies as $tax) :
	$terms = wp_get_post_terms( $post->ID, "pa_".$tax->attribute_name, array("fields" => "all") );
foreach($terms as $term){
	if(!empty($term)){?>

          <li><span class="attr_label"><?php echo substr($term->taxonomy, 3);?>: </span><span class="linked-list"><a><?php echo $term->name;?></a></span></li>


        <?php 
	}
}
   
               endforeach;
              endif;?>
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

<?php get_footer();?>