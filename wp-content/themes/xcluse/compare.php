<?php
/*

  Template Name: compare2 Template

*/
get_header();?>
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
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/waste.css" type="text/css" />
<?php
global $current_user;
				$res = $wpdb->get_results("select product_id from add_to_wishlist where user_id=".$current_user->ID);
				$my_wish_arr = array();
				foreach($res as $result){
					$my_wish_arr[] = $result->product_id;
				}
$arr_compare = explode(",", $_COOKIE['compare']);
//echo count($arr_compare);exit;
$args = array(
	'post_type' => 'product',
	'posts_per_page' => 3,
	'post__in' => $arr_compare,
);
$the_query = new WP_Query( $args );
//echo "<pre>"; print_r($the_query);exit;
?>
<div class="clean-banners"></div>
<!-- list of items first start -->

<main class="main-content com_height" role="main">


  <div class="wrapper">
 
    <div class="grid-border-left">
     <?php if ( $the_query->have_posts() ) { ?>  
    <div class="gritsectvalue">
                  
                  
                  <ul class="wishlist_review">
                  <li>Price:</li>
                  <li>Review:</li>
                  <li>Brand:</li>
                 <!-- <li>Width:</li>
                  <li>Height:</li>
                  <li>Weight:</li>
                  <li>Made in:</li>-->
                  </ul>
                </div>
        <?php } ?>
    
    </div>

    <div class="grid grid-border-right">
      
      <div class="col-md-12">
        
        <div class="section-header">
          <div class="section-header--left">
            <div>
              <div class="collection-view"> <a title="Grid view" class="collection-view--active" href="#">Comparing [<?php echo $the_query->post_count;?>] Products</a> </div>
            </div>
          </div>
          <div class="section-header--right">
          <?php if ( $the_query->have_posts() ) { ?>
            <div class="form-horizontal">
              <a href="<?php echo HOME;?>compare?del=compare">Remove all products</a>
            </div>
            <?php } else { ?>
            <div class="form-horizontal">
              <a href="<?php echo HOME;?>shop">Add product to compare</a>
            </div>
            <?php } ?>
             </div>
        </div>
    <?php if ( $the_query->have_posts() ) { ?>    
        <ul class="hover-effect">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
<?php $terms = wp_get_post_terms( $post->ID, 'pa_brand', $args );?>


              <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="<?php the_permalink(); ?>" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <?php do_action( 'woocommerce_before_shop_loop_item_thumbnail' ); ?><!--<img id="product-collection-image-1" src="<?php echo get_template_directory_uri(); ?>/images/product-list/slide7.jpg" >--> </a>
                   <div class="display-onhover">
                      
                      <ul class="add-to-links woocommerce product compare-button">
                        <?php if(!is_user_logged_in()){ ?>
                 <li><a title="Add to Wishlist" href="javascript:void(0)" class="link-wishlist" data-toggle="modal" data-target="#myModal" id="for_account"><i class="wish_comp"></i></a></li>
                 <?php } else { ?>
                        <?php if (in_array($post->ID, $my_wish_arr) && !empty($my_wish_arr)) {?>
						 <li><a title="Added to Wishlist" href="javascript:void(0)" class="addedtowishlist" data-productid="<?php echo $post->ID;?>" data-request="add" ><i class="added_wish_comp" title="Added to wishlist"></i></a></li>
                        <?php } else { ?>
                        <li><a title="Add to Wishlist" href="javascript:void(0)" class="addtowishlist" data-productid="<?php echo $post->ID;?>" data-request="add" ><i class="wish_comp"></i><?php //echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );?></a></li>
						 <?php } } ?>

                         <li><a title="Added to Compare" href="<?php echo HOME;?>compare?del_compare=<?php echo $post->ID;?>" class="link-wishlist addtocompare" data-productid="<?php echo $post->ID;?>" data-request="add"><i class="cart_clear"></i></a></li>
                        
                      <!-- <li><?php //echo do_shortcode( "[yith_compare_button]" );?> </li>-->
                        <?php $meta_values = get_post_meta( $post->ID, '_product_url' );
					      $product_url = $meta_values[0]; ?>
                          <?php if($product_url){?>
                        <li> <a title="Add to Compare" href="<?php echo $product_url;?>" class="link-compare" target="_blank"><i class="cart_comp"></i></a></li>
                        <?php } else { ?>
                        <li> <a title="Click to View Product Details." href="<?php the_permalink();?>" class="link-compare"><i class="cart_comp"></i></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                 <!-- <div class="display-onhover">
                      
                      <ul class="add-to-links">
                        <li><a title="Add to Wishlist" href="#" class="link-wishlist" ><i class="fa fa-heart"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-link"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-cart-plus"></i></a></li>
                      </ul>
                    </div>-->
                    
                  </div>
                  <?php $sale_price = get_post_meta( $post->ID, '_sale_price', 'true' );?>
                  <?php $regular_price = get_post_meta( $post->ID, '_regular_price', 'true' );?>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                <?php if($sale_price){?>
                    <p class="old-price"><span class="price"> $ <?php echo $sale_price;?> </span><span class="related_product"> $ <?php echo $regular_price;?> </span> </p>
                    <?php }else { ?>
                       <p class="old-price"><span class="price"> $ <?php echo $regular_price;?> </span></p>
                       <?php } ?>
                      <p class="special-price"><?php echo get_short_content(ucfirst(strtolower($post->post_title)),70); ?> </p>
                    </div>
                  </div>
                  <ul class="wishlist_review">
                  <li><?php if($sale_price){?>$ <?php echo $sale_price;?> <?php }else { ?>$ <?php echo $regular_price;?><?php } ?> </li>
                  <li><?php if(function_exists('the_ratings')) { the_ratings(); } ?></li>
                  <li><?php if(!empty($terms)){ foreach($terms as $term){ echo $term->name.'&nbsp;'; } }else{ echo "--";} ?></li>
                 <!-- <li>20 inches</li>
                  <li>40 inches</li>
                  <li>50 pounds</li>
                  <li>USA</li>-->
                  </ul>
                </li>
                <?php endwhile; ?>
              <!--<li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri(); ?>/images/product-list/slide5.jpg" > </a>
                  <div class="display-onhover">
                      
                      <ul class="add-to-links">
                        <li><a title="Add to Wishlist" href="#" class="link-wishlist"><i class="fa fa-heart"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-link"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-cart-plus"></i></a></li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                      <p class="old-price"><span class="price" id="old-price-1-631537354"> $230 </span><span class="related_product"> $230 </span> </p>
                      <p class="special-price">Simple Living Seneca XX Black/Grey Reclaimed Look Cocktail... </p>
                    </div>
                  </div>
                  <ul class="wishlist_review">
                  <li>$119.99</li>
                  <li><img src="<?php echo get_template_directory_uri(); ?>/images/star-.png" style="width:80px;"/></li>
                  <li>80 inches</li>
                  <li>20 inches</li>
                  <li>40 inches</li>
                  <li>50 pounds</li>
                  <li>USA</li>
                  </ul>
                </li>
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri(); ?>/images/product-list/slide1.jpg" > </a>
                  <div class="display-onhover">
                      
                      <ul class="add-to-links">
                        <li><a title="Add to Wishlist" href="#" class="link-wishlist"><i class="fa fa-heart"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-link"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-cart-plus"></i></a></li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                      <p class="old-price"><span class="price" id="old-price-1-631537354"> $230 </span> </p>
                      <p class="special-price">Simple Living Seneca XX Black/Grey Reclaimed Look Cocktail... </p>
                    </div>
                  </div>
                  <ul class="wishlist_review">
                  <li>$119.99</li>
                  <li><img src="<?php echo get_template_directory_uri(); ?>/images/star-.png" style="width:80px;"/></li>
                  <li>80 inches</li>
                  <li>20 inches</li>
                  <li>40 inches</li>
                  <li>50 pounds</li>
                  <li>USA</li>
                  </ul>
                </li>   -->
              
                
              </ul>
          <?php }else { ?>
        <?php wc_get_template( 'loop/no-products-found.php' ); ?>
        <?php } ?>
        
        
      </div>
    </div>
  </div>

</main>

<?php get_footer();?>