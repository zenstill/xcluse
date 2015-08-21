<?php
/*

  Template Name: compare Template

*/
get_header();?>
<div class="j_full_page">
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
<!--<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/waste.css" type="text/css" />-->

<style>
.wishlist_header {
  margin-bottom: 30px;
  border-bottom: 1px solid #d8d8d8;
  float: left;
  width: 100%;
}
.wish_list_header{
	margin-bottom:30px;
}
.wishlist_header-left{
	float:left;
}
.wishlist_header-right{
	float:right;
}
.price_list {
	margin:2px 0;
	width:1110px;
}
.price_list li {
  background: #f9f9f9;
  width: 270px;
  float: left;
  margin: 0 15px;
  text-align: center;
  padding: 10px 5px;
  overflow:hidden;
}
.price_list li:nth-child(1) {
  width: 150px;
  background: none;
  text-align: right;
}
.price_list ul li img { width:25px;}
</style>

<div class="clean-banners"></div>
<!-- list of items first start -->
<?php if(!empty($_COOKIE['compare'])){ 
$arr_compare = explode(",", $_COOKIE['compare']);
 }
$args = array(
	'post_type' => 'product',
	'posts_per_page' => 3,
	'post__in' => $arr_compare,
);
$the_query = new WP_Query( $args );?>
<main class="main-content" role="main">
  <div class="wrapper">
    <div class="section-header">
          <div class="section-header--left">
              <div class="collection-view"> 
              <a href="<?php echo HOME;?>" class="collection-view--active curs_pointer" title="Grid view">Home  &nbsp;<span> &gt;</span>&nbsp;&nbsp;</a>              <a class="bred_cum collection-view--active" title="Grid view">Compare &nbsp;</div>
            </div>
          
        </div>
      
      <div class="col-md-12 wish_list_header">
        <div class="col-md-2" style="width:185px; float:left;"></div>
        <div class="" style="width:925px; float:left;">
         <div class="wishlist_header">

          <div class="wishlist_header-left">
              <div class="collection-view"> <a title="Grid view" class="collection-view--active" href="#">Comparing [<?php if(!empty($arr_compare)) { echo count($arr_compare); } else { echo "0";} ?>] Products</a> </div>
            </div>
          <div class="wishlist_header-right">
           <?php if ( $the_query->have_posts() && !empty($arr_compare) ) { ?>
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
<?php
global $current_user;
				$res = $wpdb->get_results("select product_id from add_to_wishlist where user_id=".$current_user->ID);
				$my_wish_arr = array();
				foreach($res as $result){
					$my_wish_arr[] = $result->product_id;
				}
//echo count($arr_compare);exit;

//echo "<pre>"; print_r($the_query);exit;
$postid_array = array();
?>
<?php if(!empty($arr_compare)){?>
     <?php while ( $the_query->have_posts() ) : $the_query->the_post();
	 $postid_array[] = $post->ID; ?>
		
<?php $terms = wp_get_post_terms( $post->ID, 'pa_brand', $args );?>    
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <?php $meta_values = get_post_meta( $post->ID, '_product_url' );
					      $product_url = $meta_values[0]; ?>
        <div class="product-image-wrapper"> <a href="<?php echo $product_url; ?>" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <?php do_action( 'woocommerce_before_shop_loop_item_thumbnail' ); ?> </a>
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

                        <li> <a title="Click to View Product Details." href="<?php the_permalink();?>" class="link-compare"><i class="cart_comp"></i></a></li>
                      </ul>
                    </div>
                    
                  </div>
                                    <?php $sale_price = get_post_meta( $post->ID, '_sale_price', true );?>
                  <?php   $regular_price = get_post_meta( $post->ID, '_regular_price', true );
				  $_price = get_post_meta( $post->ID, '_price', 'true' );?>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                      <?php if($sale_price && ($sale_price != $regular_price)){?>
                    <p class="old-price"><span class="price"> $ <?php echo $sale_price;?> </span><span class="related_product"> $ <?php echo $regular_price;?> </span> </p>
                    <?php }else { ?>
                       <p class="old-price"><span class="price"> $ <?php echo $_price;?> </span></p>
                       <?php } ?>
                      <p class="special-price"><?php echo get_short_content(ucfirst(strtolower($post->post_title)),70); ?> </p>
                    </div>
                  </div>
                  </div>
                  
                   <?php endwhile; } ?>
                   
                  <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="images/product-list/slide7.jpg" > </a>
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
                    </div>
                  </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="images/product-list/slide7.jpg" > </a>
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
                    </div>
                  </div>
                  </div>-->
        
    </div>  
    <?php $attributes = array('_color' => 'Color','_size' => 'Size','_condition' => 'Condition','_currency' => 'Currency','_weight' => 'Weight (mg)','_length' => 'Length (mm)','_width' => 'Width (mg)','_height' => 'Height (mm)');
         $_color = get_post_meta( $post->ID, '_color', 'true' );
		 $_features = get_post_meta( $post->ID, '_features', 'true' );
		 $feature = unserialize($_features);
		 $_manufacturer = get_post_meta( $post->ID, '_manufacturer', 'true' );
		 $_model = get_post_meta( $post->ID, '_model', 'true' );
		 $_brand = get_post_meta( $post->ID, '_brand', 'true' );
		 $_size = get_post_meta( $post->ID, '_size', 'true' );
		 $_condition = get_post_meta( $post->ID, '_condition', 'true' );
		 $_shipping = get_post_meta( $post->ID, '_shipping', 'true' );
		 $_currency = get_post_meta( $post->ID, '_currency', 'true' );
		 $_weight = get_post_meta( $post->ID, '_weight', 'true' );
		 $_length = get_post_meta( $post->ID, '_length', 'true' );
		 $_width = get_post_meta( $post->ID, '_width', 'true' );
		 $_height = get_post_meta( $post->ID, '_height', 'true' );?>  
         <?php if ( $the_query->have_posts() && !empty($arr_compare)) { ?> 
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Review:</li>
                  <?php foreach($postid_array as $post_id){?>
                  <li> <?php echo do_shortcode( '[ratings id="'.$post_id.'"]' );?></li>
                  <?php } ?>
                  </ul>
    </div>
    <?php foreach($attributes as $key => $attr){?>
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li><?php echo $attr;?>:</li>
                  <?php foreach($postid_array as $post_id){
					  $$key = get_post_meta( $post_id, $key, 'true' );?>
                  <li><?php if(!empty($$key)){ echo $$key; } else { echo "NA";}?></li>
                  <?php } ?>
                  </ul>
    </div>
    <?php }  ?>
              <?php $attribute_taxonomies = wc_get_attribute_taxonomies();
$taxonomy_terms = array();
$needed_terms = array('brand','manufacturer','model','merchant','condition','shipping','seller');
if ( $attribute_taxonomies ) {
    foreach ($attribute_taxonomies as $tax) {
		if(in_array($tax->attribute_name,$needed_terms)){?>
           <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li><?php echo ucfirst($tax->attribute_name);?>:</li>
                  <?php foreach($postid_array as $post_id){?>
                  <?php $taxonomy_terms[$tax->attribute_name] =  wp_get_post_terms($post_id, 'pa_'.$tax->attribute_name);?>
                  <li><?php if($taxonomy_terms[$tax->attribute_name][0]->name){ echo $taxonomy_terms[$tax->attribute_name][0]->name; } else { echo "NA";}?></li>
                  <?php } ?>
                  </ul>
    </div>
         <!-- <li><span class="attr_label"><?php echo ucfirst($tax->attribute_name);?> </span><span style="display:inline-block; width:27px;">:</span><span class="linked-list"><a><?php echo $taxonomy_terms[$tax->attribute_name][0]->name;?></a></span></li>-->
          <?php } } } }?>
    <!--<div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Model:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Brand:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Size:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Condition:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Shipping:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Currency:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Weight:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Length:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Width:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>
    <div class="price_list col-md-12">
    <ul class="wishlist_review">
                  <li>Height:</li>
                  <li>Review:</li>
                  <li>Length:</li>
                  <li>Width:</li>
                  </ul>
    </div>-->    
  </div>
  
  
  
  </div>
</main>
</div>
<?php get_footer();?>