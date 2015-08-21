<?php get_header();?>
<div class="j_full_page home_bg_img">
<div id="myCarousel"  class="col-sm-12  carousel slide margin_fuction"  data-ride="carousel"> 
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?php $home_banner = $wpdb->get_results("select * from banner");
  	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir ['baseurl'];
	$n = 1;?>
  <?php foreach($home_banner as $banner){?>
    <div class="item <?php if($n==2){?>active<?php } ?>"> <img src="<?php _e($upload_path.'/home_banner/'.$banner->image);?>">
    <div class="slider_banner_con">
        <h3 class="header-slider-content"><?php echo $banner->title;?></h3>
        <p><?php echo $banner->description;?></p>
        <span><a href="<?php echo $banner->link;?>">Shop Now</a></span>
      </div> </div>
    <?php $n++;}?>
    <!--<div class="item active"> <img src="<?php echo get_template_directory_uri();?>/images/slider_2.jpg"> </div>
    <div class="item"> <img src="<?php echo get_template_directory_uri();?>/images/slider_3.jpg"> </div>-->
  </div>
  
  <!-- Left and right controls --> 
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>  
  <div class="clean-banners"></div>

  <div class="wrapper home-blocks-top">
  <div class="section-header clear-title">
  </div>
  <div class="grid-uniform featured-row">
  	<?php  //$menu = wp_get_nav_menu_object ('mainmenu');
	//$menu_items = wp_get_nav_menu_items($menu->term_id);
	$cat_banner = $wpdb->get_results("select * from homecat_banner");
	$i=1;
	foreach($cat_banner as $banner){
		//echo "<pre>"; print_r($menu_item);exit;
		/*if($menu_item->menu_item_parent ==0){
			$object_id = $menu_item->object_id;
			$object_url = $menu_item->url;
			$object_title = $menu_item->title;
			
			$cat_banner = $wpdb->get_results("select * from homecat_banner where cat_id=".$object_id);*/
			?>
            <?php if($i<4){?>
    <div class="col-xs-4 col-sm-4 col-lg-4 header_product_fun">
    
  
              <a href="<?php echo $banner->url;?>" data-url="<?php echo $object_url;?>">
              <div class="additional-text"></div>
              <img class="product-pic" src="<?php _e($upload_path.'/homecat_banner/'.$banner->image);?>" alt="<?php echo $object_title;?>">
              <span class="offer_tag_index product_title_head"><?php echo $banner->condition;?></span>
              <span class="sale-tag medium--right has-reviews product_title_head product_img_width"><?php echo  substr($banner->title, 0, 70); ?></span>
               
               </a>
             
      </div>
    
    <?php } else{ ?>
    <div class="col-xs-3 col-sm-3 col-lg-3">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image back_bg_product">
            <div class="product-grid-image--centered">  <a href="<?php echo $banner->url;?>" data-url="<?php echo $object_url;?>">
              <div class="additional-text">
                
              </div>
              <img class="product-pic" src="<?php _e($upload_path.'/homecat_banner/'.$banner->image);?>" alt="<?php echo $object_title;?>">
              <span class="offer_tag_index product_title_head"><?php echo $banner->condition;?></span>
              <span class="sale-tag medium--right has-reviews product_title_head"><?php echo  substr($banner->title, 0, 70); ?></span>
               
               </a>
               </div>
              
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    
    
    <?php  $i++;} ?>
 <!--   <div class="col-xs-3col-sm-3 col-lg-3">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Bedroom</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide3.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
        </div>
      </div>
    </div>-->
   
  </div>
</div>
   <!-- list of items first start -->  

</div>
  <?php get_footer();?>