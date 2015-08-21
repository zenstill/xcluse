<?php
/*

  Template Name: shop-by-room Template

 */
 get_header();?>
  
  <div class="clean-banners"></div>
   <!-- list of items first start -->  
  
  
<div class="wrapper home-blocks-top ">
  <div class="section-header clear-title">
    <p class="h1">Shop by rooms</p>
  </div>
  <div class="grid-uniform featured-row">
                  <?php
	$args1 = array(
	'type'                     => 'product',
	'child_of'                 => false,
	'parent'                   => 130,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '10',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories1 = get_categories( $args1 );
//print_r($categories1);

foreach($categories1 as $cat1){
$products = get_posts(array(
    'post_type' => 'product',
	'posts_per_page'   => 1,
    'tax_query' => array(
        array(
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' => $cat1->term_id)
    ))
);
$product_id = $products[0]->ID;

$thumbnail_url = get_post_meta( $product_id, '_thumbnail_ext_url', 'true' );
?>
    <div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews"><?php echo $cat1->name;?></span> 
            <a href="<?php echo HOME;?>product-category/<?php echo $cat1->slug;?>/">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p><?php echo $cat1->category_description;?></p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo $thumbnail_url;?>" alt="Sample Black Skirt"> </a> </div>
          </div>
       </div>
      </div>
    </div>
      <?php } ?>    
          
          

    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Bedroom</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide19.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
          
          
          
        </div>
      </div>
    </div>-->
    
    
    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Kitchen</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide1.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
          
          
          
        </div>
      </div>
    </div>-->
    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Dining Room</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide2.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
          
          
          
        </div>
      </div>
    </div>-->
    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Office</span> <a href="#">
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
    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Bathroom</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide4.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
          
          
          
        </div>
      </div>
    </div>-->
    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Utility Room</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide5.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
          
          
          
        </div>
      </div>
    </div>-->
    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Kid's Room</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide6.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
          
          
          
        </div>
      </div>
    </div>-->
    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Patio & Outdoor</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide7.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
          
          
          
        </div>
      </div>
    </div>-->
    <!--<div class="grid-item large--one-fifth medium--one-third small--one-half on-sale">
      <div class="grid-item-wrapper">
        <div class="product-grid-item">
          <div class="product-grid-image">
            <div class="product-grid-image--centered"> <span class="sale-tag medium--right has-reviews">Gym</span> <a href="#">
              <div class="additional-text">
                <div class="rating"> <i class="fa fa-eye"></i> <span class="shopify-product-reviews-badge" data-id="322077367"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet libero nec felis ultricies...</p>
                </div>
              </div>
              <img class="product-pic" src="<?php echo get_template_directory_uri();?>/images/product-list/slide8.jpg" alt="Sample Black Skirt"> </a> </div>
          </div>
          
        </div>
      </div>
    </div>-->
  </div>
</div>
  <?php get_footer();?>