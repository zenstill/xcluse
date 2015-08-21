<!--        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/flexslider.css" type="text/css" />-->
        	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/slick_car.css"/>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style_car.css"> -->
      <script src="<?php echo get_template_directory_uri();?>/js/slick_car.js"></script>
      <script src="<?php echo get_template_directory_uri();?>/js/scripts_car.js"></script>
	  <script>
   $(document).ready(function() {
	  $( ".show_similar" ).on( "click", function() {
		  product_id = $(this).data( "productid" );
		  level = $(this).data( "level" );
          $("#level"+level).css("display", "block");
		  $(".wish_loading").css("display", "block");
		  //request = $(this).data( "request" );
		  //alert(product_id);
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'showsimilar',  
					product_id:product_id,
					},
					success: function(data){
					$("#level"+level).html(data);
								 	$('.multiple-items').slick({
										dots: true,
										infinite: true,
										speed: 300,
										slidesToShow: 3,
										slidesToScroll: 3
									  });
					


					}
 	});	
             /* $(document).ajaxStart(function(){
					    $("#level"+level).css("display", "block");
						$(".wish_loading").css("display", "block");
					});	*/
					$(document).on("click", '.cls_btn', function(event) { 
           			$(".similerproduct_hover").css("display", "none");
		             });	
   });

			
   });
</script>
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
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/waste.css" type="text/css" />
      <!---------------sidebar---------------->
	 <aside class="sidebar grid-item large--one-quarter collection-filters widget woocommerce widget_price_filter">
        <div id="filter-wrapper" class="grid-uniform col-sidebar white-popup">
          <div class="grid-item small--one-whole medium--one-half"> 
            
            <!-- Widget: Selected filter --> 
            
            <!-- Widget: End selected filters --> 
            
            <!-- Widget: Filter by Groups -->
            
            <div class="advanced-filters-wrapper filters-left">
              <?php  //do_shortcode('[br_filters attribute=price type=slider title="Price Filter"]');?>
                            <h3>Search</h3>
              <!--<div class="list-search">
              <ul>
              <li><span>Living Room, Sale, Tables, Wood, Under $200<i class="fa fa-times"></i></span></li>
              <li><span>Black, Metal, Chairs<i class="fa fa-times"></i></span></li>
              <li><span>Simple Living, Cocktail Table<i class="fa fa-times"></i></span></li>
              <li><button type="submit" class="search-bar-btn">Save this search</button></li>
              </ul>
              </div>-->
             <div class="list-fun">
             <div class="serch-fuction for_my_filter">
             <?php $server_url = strpos($_SERVER['REQUEST_URI'],'/page/');
			 if($server_url){
			       $page_having = substr($_SERVER['REQUEST_URI'],$server_url);
				   $str_original = str_replace($page_having,'',$_SERVER['REQUEST_URI']);
			 }else{
				 $str_original = $_SERVER['REQUEST_URI'];
			 }?>
             <form action="<?php echo $str_original;?>" method="get" class="search-bar-product" role="search" id="filter_form">
        <input type="search" value="" placeholder="Create a new list" aria-label="Search all products" class="text_search" />
      
        <button type="submit" class="search-bar--submit icon-fallback-text"> <i class="fa fa-plus"></i> </button>
      </form>
          
             <!--<span><a href="">Sale</a><i class="fa fa-times"></i></span>
             <span><a href="">Bed Room</a><i class="fa fa-times"></i></span>
             <span><a href="">Under $200</a><i class="fa fa-times"></i></span>-->
             
              </div></div>
             
           <!--  <h3>Price Filter</h3>
              <div class="list-search pric_filter">
              <ul>
              <li><input type="checkbox" value="10-10000" />&nbsp;&nbsp;<span>10 - 10000</span></li>
              <li><input type="checkbox" value="" /><span>10 - 10000</span></li>
              <li><input type="checkbox" value="" /><span>10 - 10000</span></li>
              </ul>
              </div>-->
            </div>
          </div>
        </div>
      </aside>
      <!---------------sidebar---------------->
      <div class="grid-item large--three-quarters">
        
        <div class="section-header">
          <div class="section-header--left">
            <div>
              <div class="collection-view">  <?php do_action( 'woocommerce_bredcrumbs' );?></div>
            </div>
          </div>
          <div class="section-header--right">
            <div class="form-horizontal">
            <?php do_action( 'woocommerce_before_shop_loop_order' );?>
            </div>
             </div>
        </div>
        <div class="similer_product">
         <?php
        if( count( $wishlist_items ) > 0 ) :
		$i = 1;
		$new_array = array_chunk($wishlist_items, 3, true);
		foreach( $new_array as $wishlist_item ) { ?>
			  <ul class="products-grid hover-effect">
            <?php foreach( $wishlist_item as $item ) :
                global $product;
	            if( function_exists( 'wc_get_product' ) ) {
		            $product = wc_get_product( $item['prod_id'] );
	            }
	            else{
		            $product = get_product( $item['prod_id'] );
	            }

                if( $product !== false && $product->exists() ) :
	                $availability = $product->get_availability();
	                $stock_status = $availability['class'];

	                ?>
       <!---------------start loop---------------->
      <li class="item first col-sm-4">
                  <div class="product-image-wrapper">
                  <div class="hover-eff">
                  <a href="<?php the_permalink(); ?>"><?php echo $product->get_image(); ?></a> <!--<a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide7.jpg" > </a>-->
                  <div class="display-onhover">
                      
                      <ul class="add-to-links woocommerce product compare-button">
                        <?php if(is_user_logged_in()){ ?>
                 <li><a title="Add to Wishlist" href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item['prod_id'] ) ) ?>" class="link-wishlist"><i class="cart_clear" title="Remove from wishlist"></i></a></li>
                 <?php } ?>
                        <!-- <li><a title="Add to Wishlist" href="#" class="link-wishlist" data-toggle="modal" data-target="#myModal" id="for_account"><i class="level_comp"></i></a></li>-->
                       <?php $arr_compare = explode(",", $_COOKIE['compare']);
					   if (in_array($post->ID, $arr_compare) && !empty($_COOKIE['compare'])) {?>
                         <li><a title="Added to Compare" href="<?php echo HOME;?>compare" class="link-wishlist addtocompare" data-productid="<?php echo $post->ID;?>" data-request="add"><i class="added_comp"></i></a></li>
                         <?php } else { ?>
                         <li><a title="Add to Compare" href="javascript:void(0)" class="link-wishlist addtocompare" data-productid="<?php echo $post->ID;?>" data-request="add"><i class="level_comp"></i></a></li>
                         <?php } ?>
                        <?php $meta_values = get_post_meta( $post->ID, '_product_url' );
					      $product_url = $meta_values[0]; ?>
                          <?php if($product_url){?>
                        <li> <a title="Add to Compare" href="#" class="link-compare" target="_blank"><i class="cart_comp"></i></a></li>
                        <?php } else { ?>
                        <li> <a title="Click to View Product Details." href="<?php the_permalink();?>" class="link-compare"><i class="cart_comp"></i></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                    </div>
                  </div>
                  <?php $sale_price = get_post_meta( $item['prod_id'], '_sale_price', 'true' );?>
                  <?php $regular_price = get_post_meta( $item['prod_id'], '_regular_price', 'true' );?>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                    <?php if($sale_price){?>
                    <p class="old-price"><span class="price"> $ <?php echo $sale_price;?> </span><span class="related_product"> $ <?php echo $regular_price;?> </span> </p>
                    <?php }else { ?>
                       <p class="old-price"><span class="price"> $ <?php echo $regular_price;?> </span></p>
                       <?php } ?>
                      <!--<p class="old-price"><?php do_action( 'woocommerce_after_shop_loop_item_price' ); ?>  </p>-->
                      <p class="special-price"><a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ?></a> </p>
                      
                      <ul class="hover_similar">
                      <li class="fun_hover_rel"><a href="javascript:void(0)" data-productid="<?php echo $item['prod_id'];?>" data-level="<?php echo $i;?>" class="show_similar">Show similar</a>
                      
                      </li>
                      <li> | </li>
                      <li><a href="javascript:void(0)">You may also need</a></li>
                      </ul>
                    </div>
                  </div>
                 
</li>
<!----------end loop---------------->
 <?php
                endif;
            endforeach;?>
            </ul>
<!-----------------------------------------------------------slider---------------------------------------------------------------------------------->
                 <div class="similerproduct_hover similer_list_imgsize" id="level<?php echo $i;?>">
                 <div class="wish_loading"><img src="<?php echo get_template_directory_uri();?>/images/ajax-loader.gif" />
                 </div>
                 <div class="slider multiple-items" style="display:none;">
        		<div class="multiple" style="width: 285px;"><a href="http://xcluse.com/demo/newxcluse/shop/vogue-ottoman-with-2-pillows-espresso-finish/"><img alt="Vogue Ottoman with 2 Pillows - Espresso Finish thumbnail" src="http://images.prosperentcdn.com/images/250x250/www.brookstone.com/webassets/product_images/700x700/811145.jpg"></a> <!-- <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="http://xcluse.com/demo/newxcluse/wp-content/themes/newxcluse/images/product-list/slide7.jpg" > </a>-->
              
                      <p class="old-price"><span class="price" id="old-price-1-631537354"> $230 </span> </p>
                      <p class="special-price">Simple Living Seneca XX Black/Grey Reclaimed Look Cocktail... </p>
                      
                    
              </div><div class="multiple" style="width: 285px;"><a href="http://xcluse.com/demo/newxcluse/shop/waneta-glass-top-coffee-table/"><img alt="Waneta Glass Top Coffee Table thumbnail" src="http://images.prosperentcdn.com/images/250x250/www.brookstone.com/webassets/product_images/700x700/811147.jpg"></a> <!-- <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="http://xcluse.com/demo/newxcluse/wp-content/themes/newxcluse/images/product-list/slide7.jpg" > </a>-->
               <!-- <div class="display-onhover">
                <ul class="add-to-links">
                    <li><a title="Add to Wishlist" href="#" class="link-wishlist" ><i class="fa fa-heart"></i></a></li>
                    <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-link"></i></a></li>
                    <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-cart-plus"></i></a></li>
                  </ul>
              </div>-->
              </div><div class="multiple" style="width: 285px;"><a href="http://xcluse.com/demo/newxcluse/shop/waneta-glass-top-end-table/"><img alt="Waneta Glass Top End Table thumbnail" src="http://images.prosperentcdn.com/images/250x250/www.brookstone.com/webassets/product_images/700x700/811150.jpg"></a> <!-- <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="http://xcluse.com/demo/newxcluse/wp-content/themes/newxcluse/images/product-list/slide7.jpg" > </a>-->
               <!-- <div class="display-onhover">
                <ul class="add-to-links">
                    <li><a title="Add to Wishlist" href="#" class="link-wishlist" ><i class="fa fa-heart"></i></a></li>
                    <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-link"></i></a></li>
                    <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-cart-plus"></i></a></li>
                  </ul>
              </div>-->
              </div><div class="multiple" style="width: 285px;"><a href="http://xcluse.com/demo/newxcluse/shop/waneta-glass-top-sofa-table/"><img alt="Waneta Glass Top Sofa Table thumbnail" src="http://images.prosperentcdn.com/images/250x250/www.brookstone.com/webassets/product_images/700x700/811152.jpg"></a> <!-- <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="http://xcluse.com/demo/newxcluse/wp-content/themes/newxcluse/images/product-list/slide7.jpg" > </a>-->
               <!-- <div class="display-onhover">
                <ul class="add-to-links">
                    <li><a title="Add to Wishlist" href="#" class="link-wishlist" ><i class="fa fa-heart"></i></a></li>
                    <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-link"></i></a></li>
                    <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-cart-plus"></i></a></li>
                  </ul>
              </div>-->
          
              </div>       
          <a href="javascript:void(0)" class="slick-prev" style="display: block;">Previous</a><a href="javascript:void(0)" class="slick-next" style="display: block;">Next</a>
          
          </div>
       
          </div>
<!-----------------------------------------------------------slider----------------------------------------------------------------------------------> 
		<?php $i++;}
        else: ?>
        <?php _e( 'No products were added to the wishlist', 'yit' ); ?>
       <?php  endif; ?>    
              
        <!--<ul class="products-grid hover-effect">
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide7.jpg" > </a>
                  <div class="display-onhover">
                      
                      <ul class="add-to-links">
                        <li><a title="Add to Wishlist" href="#" class="link-wishlist" ><i class="fa fa-heart"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-link"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-cart-plus"></i></a></li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                      <p class="old-price"><span class="price" id="old-price-1-631537354"> $230 </span> </p>
                      <p class="special-price">Simple Living Seneca XX Black/Grey Reclaimed Look Cocktail... </p>
                      <ul class="hover_similar">
                      <li class="fun_hover_rel"><a href="">Show similar</a></li>
                      <li> | </li>
                      <li><a href="">You may also need</a></li>
                      </ul>
                    </div>
                  </div>
                  
                </li>
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide8.jpg" > </a>
                  <div class="display-onhover">
                      
                      <ul class="add-to-links tools">
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
                      <ul class="hover_similar">
                      <li class="fun_hover_rel"><a href="">Show similar</a></li>
                      <li> | </li>
                      <li class="fun_hover_rel"><a href="">You may also need</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide5.jpg" > </a>
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
                      <ul class="hover_similar">
                      <li><a href="">Show similar</a></li>
                      <li> | </li>
                      <li><a href="">You may also need</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                   
              </ul>
               <div class="similerproduct_hover">
         <ul class="products-grid hover-effect">
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide7.jpg" > </a>
                  <div class="display-onhover">
                      
                      <ul class="add-to-links">
                        <li><a title="Add to Wishlist" href="#" class="link-wishlist" ><i class="fa fa-heart"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-link"></i></a></li>
                        <li> <a title="Add to Compare" href="" class="link-compare"><i class="fa fa-cart-plus"></i></a></li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                      <p class="old-price"><span class="price" id="old-price-1-631537354"> $230 </span> </p>
                      <p class="special-price">Simple Living Seneca XX Black/Grey Reclaimed Look Cocktail... </p>
                      <ul class="hover_similar">
                      <li class="fun_hover_rel"><a href="">Show similar</a></li>
                      <li> | </li>
                      <li><a href="">You may also need</a></li>
                      </ul>
                    </div>
                  </div>
                  
                </li>
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide8.jpg" > </a>
                  <div class="display-onhover">
                      
                      <ul class="add-to-links tools">
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
                      <ul class="hover_similar">
                      <li class="fun_hover_rel"><a href="">Show similar</a></li>
                      <li> | </li>
                      <li class="fun_hover_rel"><a href="">You may also need</a></li>
                      </ul>
                    </div>

                  </div>
                </li>
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide5.jpg" > </a>
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
                      <ul class="hover_similar">
                      <li><a href="">Show similar</a></li>
                      <li> | </li>
                      <li><a href="">You may also need</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                   
              </ul>
          </div> -->
        </div>
        <div class="section-header pagination-border-top">
         <!-- <div class="section-header--left"> <span class="medium--hide small--hide">Page 1 of 2</span> </div>-->
          <!--<div class="section-header--right">
            <ul class="pagination-custom">
              <li class="disabled"><span>&larr;</span></li>
              <li class="active"><span>1</span></li>
              <li> <a href="#" title="">2</a> </li>
              <li><a href="#" title="Next &raquo;">&rarr;</a></li>
            </ul>
          </div>-->
        </div>
  </div>
  </div>
        
        
      </div>
    </div>
  </div>
</main>