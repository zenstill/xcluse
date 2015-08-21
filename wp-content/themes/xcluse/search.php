<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 *
 * @author 		Jegadeesh
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="clean-banners"></div>
<!-- list of items first start -->

<main class="main-content" role="main">
  <div class="wrapper">
    
    <div class="grid grid-border">
      <?php get_sidebar();?>
      <div class="grid-item large--three-quarters">
        
        <div class="section-header sorting-filters">
          <div class="section-header--left">
              <div class="collection-view"> <?php do_action( 'woocommerce_bredcrumbs' );?><!--<a title="Grid view" class="collection-view--active" href="#">Living Room  <span> &gt;</span> </a> <a title="List view" class="change-view" data-view="list">Tables</a>--> </div>
            </div>
          <div class="section-header--right">
            <div class="form-horizontal">
               <?php do_action( 'woocommerce_before_shop_loop_order' );?>
             <!-- <select name="sortBy" id="sortBy">
                <option value="title-descending">Lowest Price</option>
                <option value="price-ascending">Price, low to high</option>
                <option value="price-descending">Price, high to low</option>
                <option value="created-descending">Date, new to old</option>
                <option value="created-ascending">Date, old to new</option>
              </select>-->
            </div>
            <!--<a class="btn right toggle-filters open-filters" href="#filter-wrapper">Filters</a>--> </div>
        </div>
        <div class="for_main">
        <?php if ( have_posts() ) : ?>
                <ul class="products-grid hover-effect products">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php wc_get_template_part( 'content', 'product' ); ?>
                <!--<li class="item first col-sm-4">
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
                    </div>
                  </div>
                </li>-->
                <?php endwhile; // end of the loop. ?>
                              </ul>
                	<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
                <!--<li class="item first col-sm-4">
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
                    </div>
                  </div>
                </li>
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide1.jpg" > </a>
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
                </li>
                <li class="item first col-sm-4">
                  <div class="product-image-wrapper"> <a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide11.jpg" > </a>
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
                </li>-->
        
        </div>
        
        <?php $page_no = get_query_var( 'paged' );?>
          <div class="section-header <?php if($page_no != 0){?>pagination-border-top<?php } ?>">
        <?php if($page_no != 0){?>
          <div class="section-header--left"> <span class="medium--hide small--hide">Page <?php echo get_query_var( 'paged' );?> of <?php echo $wp_query->max_num_pages;?></span> </div><?php } ?>
          <!--<div class="section-header--right">-->
           <?php do_action( 'woocommerce_after_shop_loop' );?>
            <!--<ul class="pagination-custom">
              <li class="disabled"><span>&larr;</span></li>
              <li class="active"><span>1</span></li>
              <li> <a href="#" title="">2</a> </li>
              <li><a href="#" title="Next &raquo;">&rarr;</a></li>
            </ul>-->
          <!--</div>-->
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer();?>