<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $arr_compare ,$current_user ;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
	
	$arr_compare = explode(",", $_COOKIE['compare']);
	
	$res = $wpdb->get_results("select product_id from add_to_wishlist where user_id=".$current_user->ID);
				$my_wish_arr = array();
				foreach($res as $result){
					$my_wish_arr[] = $result->product_id;
				}
?>
<?php if(isset($_COOKIE['change_size']) && $_COOKIE['change_size'] == 'four'){?>
<li class="item first col-xs-6 col-md-3 col-sm-4 col-lg-3 for_spcl">
<?php } elseif((isset($_COOKIE['change_size']) && $_COOKIE['change_size'] != 'four') || $_COOKIE['change_size'] == ''){?>
<li class="item first col-xs-6 col-md-3 col-sm-4 col-lg-2 for_spcl">
<?php } ?>
                  <div class="product-image-wrapper">
                  <div class="hover-eff">
                           <?php $meta_values = get_post_meta( $post->ID, '_product_url' );
					      $product_url = $meta_values[0];
						    ?>
                          <?php if($product_url){?>
                  <a href="<?php echo $product_url; ?>" target="_blank"><?php do_action( 'woocommerce_before_shop_loop_item_thumbnail' ); ?></a>
                  <?php } else { ?>
                     <a href="<?php the_permalink();?>"><?php do_action( 'woocommerce_before_shop_loop_item_thumbnail' ); ?></a>
                  <?php } ?> <!--<a href="wishlist.html" title="Lunar Lounger, Silver/Black" class="productimage" target="_blank"> <img id="product-collection-image-1" src="<?php echo get_template_directory_uri();?>/images/product-list/slide7.jpg" > </a>-->
                  <div class="display-onhover">
                      
                      <ul class="add-to-links woocommerce product compare-button">
                        <?php if(!is_user_logged_in()){ ?>
                 <li><a title="Add to Wishlist" href="javascript:void(0)" class="link-wishlist" data-toggle="modal" data-target="#myModal" id="for_account"><i class="wish_comp"></i></a></li>
                 <?php } else { ?>
                       <?php if (in_array($post->ID, $my_wish_arr) && !empty($my_wish_arr)) {?>
						 <li><a title="Added to Wishlist" href="<?php echo HOME;?>mywishlist" class="addedtowishlist"><i class="added_wish_comp" title="Added to wishlist"></i></a></li>
                        <?php } else { ?>
                        <li><a title="Add to Wishlist" href="javascript:void(0)" class="addtowishlist" data-productid="<?php echo $post->ID;?>" data-request="add" ><i class="wish_comp"></i><?php //echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );?></a></li>
						 <?php } } ?>
                        <?php if (in_array($post->ID, $arr_compare) && !empty($_COOKIE['compare'])) {?>
                         <li><a title="Added to Compare" href="<?php echo HOME;?>compare" class="link-wishlist addtocompare" data-productid="<?php echo $post->ID;?>" data-request="add"><i class="added_comp"></i></a></li>
                         <?php } else { ?>
                         <li><a title="Add to Compare" href="javascript:void(0)" class="link-wishlist addtocompare" data-productid="<?php echo $post->ID;?>" data-request="add"><i class="level_comp"></i></a></li>
                         <?php } ?>
                      <!-- <li><?php //echo do_shortcode( "[yith_compare_button]" );?> </li>-->

                        <li> <a title="View more" href="<?php the_permalink();?>" class="link-compare"><i class="cart_comp"></i></a></li>


                      </ul>
                    </div>
                    </div>
                  </div>
                  
                  <?php $sale_price = get_post_meta( $post->ID, '_sale_price', 'true' );?>
                  <?php $regular_price = get_post_meta( $post->ID, '_regular_price', 'true' );
				  $_price = get_post_meta( $post->ID, '_price', 'true' );?>
                  <div class="product-desc-bestsales">
                    <div class="price-box">
                    <?php if($sale_price && ($sale_price != $regular_price)){?>
                    <p class="old-price"><span class="price"> $ <?php echo number_format((float)$sale_price, 2, '.', '');?> </span><span class="related_product"> $ <?php echo number_format((float)$regular_price, 2, '.', '');?> </span> </p>
                    <?php }else { ?>
                       <p class="old-price"><span class="price"> $ <?php echo number_format((float)$_price, 2, '.', '');?></span></p>
                       <?php } ?>
                      <!--<p class="old-price"><?php do_action( 'woocommerce_after_shop_loop_item_price' ); ?>  </p>-->
                      <p class="special-price"><a href="<?php echo $product_url; ?>" target="_blank"><?php echo get_short_content(ucfirst(strtolower($post->post_title)),35); ?></a> </p>
                    </div>
                  </div>
</li>