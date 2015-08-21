<?php
/*

  Template Name: mywishlist Template

*/
global $wpdb,$current_user;
?>
<?php get_header();?>
<div class="j_full_page">
<div class="clean-banners"></div>
<!-- list of items first start -->

<main class="main-content" role="main">
  <div class="wrapper">
    
    <div class="grid grid-border">
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/slick_car.css"/>
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
	  $( ".wish_group_add" ).on( "click", function() {
		  group_name = $("#wish_add_group_name").val();
		   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'addtogroup_wish',  
					group_name:group_name,
					request:"add"
					},
					context: this,  
					success: function(data){
					
						$("#sortable").append('<li class="droppable ui-droppable" id="'+data+'"><a href="<?php echo HOME;?>mywishlist?group_id='+data+'">'+group_name+'<span class="mywishlist_price">[0]</span></a><span> <i class="fa fa-times"></i></span></li>');
						
							 jQuery('#sortable li').droppable({drop: handler});
		   // });
      function handler(event,ui){
		  //alert("jjjj");
		    var draggableId = ui.draggable.attr("id");
            var droppableId = $(this).attr("id");
			 ui.draggable.remove();
			//alert(droppableId);
  
		      	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'addtowishlistgroup',  
					product_id:draggableId,
					group_id:droppableId
					},
					//context: this,  
					success: function(data){
						$("#sortable").html(data);
						jQuery('.draggable').draggable({ revert: true });
						 jQuery('#sortable li').droppable({drop: handler});

					}
 	});	

      }
					   
//jQuery('#sortable li').droppable();

					}
 	});			
		  });
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
						       $(this).ajaxComplete(function(){
						            func2_comp();
					           });
						}else{
						  $("#myModal3").modal('show');
							setTimeout(function(){
							   $(".close").trigger("click");
								 }, 3000);
							//alert('Your previous product category not matching with this product.');
						}

					}
 	});
	
	 function func2_comp(){
	 $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'compare_header_change_value',  
					},
					success: function(data){
					$(".for_compare").html(data);
					}
 	});	
	}				
   });
   });
</script>

  <script>
 jQuery(document).ready(function(){
	 
	  //jQuery( "#sortable" ).sortable();
		var $mouseX = 0, $mouseY = 0;
        var $xp = 0, $yp =0;

jQuery(document).mousemove(function(e){
    $mouseX = e.pageX;
    $mouseY = e.pageY;  
	//alert($mouseY);  
});
$xp += (($mouseX - $xp)/12);
$yp += (($mouseY - $yp)/12);
	 //console.log($mouseX);
	 //$(".ui-draggable-dragging a").css({overflow:'inherit'});
	 //$(".ui-draggable-dragging").attr('style','left:500px !important');
	 //$(".ui-draggable-dragging").css({left:$mouseX +'px !important', top:$mouseY +'px !important', overflow:'inherit',position: 'fixed'});
	 
    jQuery( ".draggable" ).draggable({
		revert : function(event, ui) {
			
	    $(this).css({width:'33.3333%',height:'auto'});
		$( this ).find(".display-onhover").show();
	    $( this ).find(".product-desc-bestsales").show();
		
		            return !event;

        },
		 start: function(event, ui) {
        $(this).css({width:'85px',height:'85px'});
		//$(this).css({left:$xp +'px', top:$yp +'px'});
		$( this ).find(".display-onhover").hide();
	    $( this ).find(".product-desc-bestsales").hide();
		 },
});

    //jQuery( "#sortable li" ).droppable({
		 jQuery('#sortable li').droppable({drop: handler});
		   // });
      function handler(event,ui){
		  //alert("jjjj");
		    var draggableId = ui.draggable.attr("id");
            var droppableId = $(this).attr("id");
			 ui.draggable.remove();
			//alert(droppableId);
  
		      	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'addtowishlistgroup',  
					product_id:draggableId,
					group_id:droppableId
					},
					//context: this,  
					success: function(data){
						$("#sortable").html(data);
						 jQuery( ".draggable" ).draggable({
		revert : function(event, ui) {
			
	    $(this).css({width:'33.3333%',height:'auto'});
		$( this ).find(".display-onhover").show();
	    $( this ).find(".product-desc-bestsales").show();
		
		            return !event;

        },
		 start: function(event, ui) {
        $(this).css({width:'85px',height:'85px'});
		$( this ).find(".display-onhover").hide();
	    $( this ).find(".product-desc-bestsales").hide();
		 },
});
						 jQuery('#sortable li').droppable({drop: handler});

					}
 	});	

      }

  });
  </script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/waste.css" type="text/css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <!---------------sidebar---------------->
	 <aside class="sidebar grid-item large--one-quarter collection-filters widget woocommerce widget_price_filter page_mywishlist">
        <div id="filter-wrapper" class="grid-uniform col-sidebar white-popup">
          <div class="grid-item small--one-whole medium--one-half"> 
            
            <!-- Widget: Selected filter --> 
            
            <!-- Widget: End selected filters --> 
            
            <!-- Widget: Filter by Groups -->
            
            <div class="advanced-filters-wrapper filters-left">
              <?php  //do_shortcode('[br_filters attribute=price type=slider title="Price Filter"]');?>
                        <div class="serch-fuction for_my_filter search_wishlist">
             <form action="#" method="get" class="search-bar-product" role="search" id="filter_form">
        <input type="search" value="" placeholder="Create a new list" aria-label="Search all products" class="text_search" id="wish_add_group_name" />
      
        <a class="search-bar--submit icon-fallback-text wish_group_add"> <i class="fa fa-plus search-bar_btn"></i> </a>
      </form>
        
             
              </div>
              <div class="list-search search_mywishlist_list">
              <?php
			  $res_group = $wpdb->get_results("select * from wishlist_group where user_id=".$current_user->ID);
			  $prodect_count_default = $wpdb->get_results("select user_id from add_to_wishlist where user_id=".$current_user->ID." and group_id = 1");
				  $prod_count_default = count($prodect_count_default);?>
              <ul id="sortable">
              <li class="droppable" id="1"><a href="<?php echo HOME;?>mywishlist?group_id=1">Default <span class="mywishlist_price">[<?php echo $prod_count_default;?>]</span></a> <a href="<?php echo HOME;?>mywishlist?groupdel_id=1"><span><i class="fa fa-times"></i></span></a></li>
              <?php foreach($res_group as $group){
				  $prodect_count = $wpdb->get_results("select user_id from add_to_wishlist where user_id=".$current_user->ID." and group_id=".$group->id);
				  $prod_count = count($prodect_count);?>
              <li class="droppable" id="<?php echo $group->id;?>"><a href="<?php echo HOME;?>mywishlist?group_id=<?php echo $group->id;?>"><?php echo $group->group_name;?> <span class="mywishlist_price">[<?php echo $prod_count;?>]</span></a> <a href="<?php echo HOME;?>mywishlist?groupdel_id=<?php echo $group->id;?>"><span><i class="fa fa-times"></i></span></a></li>
              <?php } ?>
              <!--<li class="droppable" id="2"><a><t class="wishlist_color_red">Black, Metal, Chairs</t> <span class="mywishlist_price">$1,499 [6]</a><span><i class="fa fa-times"></i></span></li>
              <li class="droppable" id="3"><span>Simple Living, Cocktail Table<i class="fa fa-times"></i></span></li>-->
              
              </ul>
              </div>
              <div class="mywishlist_content">
              <p>Add products to a specific list by dragging and dropping them onto that list.</p>
              <p>Rearrange lists by dragging and dropping</p>
              </div>
             
             
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
        global $current_user;
		if($_GET['group_id']==""){
			$group_id = 1;
		}else{
			$group_id = $_GET['group_id'];
		}
		$res = $wpdb->get_results("select product_id from add_to_wishlist where user_id=".$current_user->ID." and group_id=".$group_id);
				foreach($res as $result){
					$wishlist_items[] = $result->product_id;
				}
        if( count( $wishlist_items ) > 0 ) :
		$i = 1;
		$new_array = array_chunk($wishlist_items, 3, true);
		foreach( $new_array as $wishlist_item ) { ?>
			  <ul class="products-grid hover-effect">
            <?php foreach( $wishlist_item as $item ) :
                global $product;
	            if( function_exists( 'wc_get_product' ) ) {
		            $product = wc_get_product($item);
	            }
	            else{
		            $product = get_product($item);
	            }

                if( $product !== false && $product->exists() ) :
	                $availability = $product->get_availability();
	                $stock_status = $availability['class'];

	                ?>
       <!---------------start loop---------------->
      <li class="item first col-sm-4 draggable" id="<?php echo $product->id;?>">
                  <div class="product-image-wrapper">
                  <div class="hover-eff">
                    <?php $meta_values = get_post_meta( $product->id, '_product_url' );
					      $product_url = $meta_values[0]; ?>
                  <a href="<?php echo $product_url; ?>"><?php echo $product->get_image(); ?></a> <!--<a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide7.jpg" > </a>-->
                  <div class="display-onhover">
                      
                      <ul class="add-to-links woocommerce product compare-button">
                        <?php if(is_user_logged_in()){ ?>
                 <li><a title="Add to Wishlist" href="<?php echo HOME;?>mywishlist?del_wishlistid=<?php echo $item;?>" class="link-wishlist"><i class="cart_clear" title="Remove from wishlist"></i></a></li>
                 <?php } ?>
                        <!-- <li><a title="Add to Wishlist" href="#" class="link-wishlist" data-toggle="modal" data-target="#myModal" id="for_account"><i class="level_comp"></i></a></li>-->
                       <?php $arr_compare = explode(",", $_COOKIE['compare']);
					   if (in_array($product->id, $arr_compare) && !empty($_COOKIE['compare'])) {?>
                         <li><a title="Added to Compare" href="<?php echo HOME;?>compare" class="link-wishlist addtocompare" data-productid="<?php echo $product->id;?>" data-request="add"><i class="added_comp"></i></a></li>
                         <?php } else { ?>
                         <li><a title="Add to Compare" href="javascript:void(0)" class="link-wishlist addtocompare" data-productid="<?php echo $product->id;?>" data-request="add"><i class="level_comp"></i></a></li>
                         <?php } ?>
                        <li> <a title="Click to View Product Details." href="<?php echo get_post_permalink($product->id);?>" class="link-compare"><i class="cart_comp"></i></a></li>
                      </ul>
                    </div>
                    </div>
                  </div>
                  <?php $sale_price = get_post_meta( $product->id, '_sale_price', 'true' );?>
                  <?php $regular_price = get_post_meta( $product->id, '_regular_price', 'true' );
				  $_price = get_post_meta( $product->id, '_price', 'true' );?>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                     <?php if($sale_price && ($sale_price != $regular_price)){?>
                    <p class="old-price"><span class="price"> $ <?php echo number_format((float)$sale_price, 2, '.', '');?> </span><span class="related_product"> $ <?php echo number_format((float)$regular_price, 2, '.', '');?> </span> </p>
                    <?php }else { ?>
                       <p class="old-price"><span class="price"> $ <?php echo number_format((float)$_price, 2, '.', '');?> </span></p>
                       <?php } ?>
                      <!--<p class="old-price"><?php do_action( 'woocommerce_after_shop_loop_item_price' ); ?>  </p>-->
                      <p class="special-price"><a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ?></a> </p>
                      
                      <ul class="hover_similar">
                      <li class="fun_hover_rel"><a href="javascript:void(0)" data-productid="<?php echo $item;?>" data-level="<?php echo $i;?>" class="show_similar">Show similar</a>
                      
                      </li>
                      <!--<li> | </li>-->
                      <!--<li><a href="javascript:void(0)">You may also need</a></li>-->
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
        <?php _e( 'No products were added to wishlist for this group', 'yit' ); ?>
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
</div>
<?php get_footer();?>