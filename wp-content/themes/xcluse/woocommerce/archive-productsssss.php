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
global $wp_query;
wp_reset_query();
get_header( 'shop' ); ?>
<script>
	 $(window).load(function() {
		 $(".products").css("display", "show");
	     $(".shop_loading").css("display", "none");
       });
	 $(window).unload(function() {
		$(".products").css("display", "none");
		$(".shop_loading").css("display", "block");
	  });
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
   $('.six').on( "click", function() {

	    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'change_size',  
					action_id:'six',
					},
					context: this,  
					success: function(data){
				}
 	});				
	
	 $('.for_spcl').removeClass( "col-lg-3" );
	 $('.for_spcl').addClass( "col-lg-2" );
	 $('.layout-picker-four').removeClass( "active" );
	 $('.layout-picker').addClass( "active" );
});
   $('.four').click(function (e) {
       $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'change_size',  
					action_id:'four',
					},
					context: this,  
					success: function(data){
					}
 	});	
	 $('.for_spcl').removeClass( "col-lg-2" );
	 $('.for_spcl').addClass( "col-lg-3" );
	 $('.layout-picker').removeClass( "active" );
	 $('.layout-picker-four').addClass( "active" );
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
<div class="clean-banners"></div>
<!-- list of items first start -->

<main class="main-content" role="main">
  <div class="wrapper1">
    
    <div class="grid grid-border-width">
      <?php get_sidebar();?>
       <div class="grid-border-width_perform col-xs-8 col-md-10 col-sm-10 col-lg-10">
      <!--<div class="grid-item large--three-quarters">-->
        
        <div class="section-header">
          <div class="section-header--left">
              <div class="collection-view"> <?php do_action( 'woocommerce_bredcrumbs' );?><!--<a title="Grid view" class="collection-view--active" href="#">Living Room  <span> &gt;</span> </a> <a title="List view" class="change-view" data-view="list">Tables</a>--> </div>
            </div>
          <div class="section-header--right">
            <div class="form-horizontal">
               <?php do_action( 'woocommerce_before_shop_loop_order' );?>
             
            </div>
            <div class="size_grid"><span class="six">
            <div class="layout-picker <?php if((isset($_COOKIE['change_size']) && $_COOKIE['change_size'] != 'four') || $_COOKIE['change_size'] == ''){?>active<?php } ?>">
            <div class="six_size_selected"></div>
            <div class="six_size_selected"></div>
            <div class="six_size_selected"></div>
            <div class="six_size_selected"></div>
            <div class="six_size_selected"></div>
            <div class="six_size_selected"></div>
            <div class="six_size_selected"></div>
            <div class="six_size_selected"></div>
            <div class="six_size_selected"></div>
            </div></span>
            
            <span class="four">
            <div class="layout-picker-four <?php if(isset($_COOKIE['change_size']) && $_COOKIE['change_size'] == 'four'){?>active <?php } ?>">
            <div class="four_size_selected"></div>
            <div class="four_size_selected"></div>
           <div class="four_size_selected"></div>
            <div class="four_size_selected"></div>
            </div>
            
            </span></div>
            </div>
        </div>
        <div class="for_main">
        <div class="shop_loading">
        <img src="<?php echo get_template_directory_uri();?>/images/shop-loading.gif" />
                 </div>
        <?php if ( have_posts() ) : ?>
                <ul class="products-grid hover-effect products">
         <?php $arr_compare = explode(",", $_COOKIE['compare']);
		    //print_r($arr_compare);exit;?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>
                              </ul>
                	<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
               
        <?php wp_reset_postdata();?>
        </div>
        




		<?php $page_no = get_query_var( 'paged' );?>
          <div class="section-header <?php if($wp_query->max_num_pages > 1){ ?>pagination-border-top <?php } ?>">
        <?php //if($page_no != 0){?>
          <!--<div class="section-header--left"> <span class="medium--hide small--hide">Page <?php echo get_query_var( 'paged' );?> of <?php echo $wp_query->max_num_pages;?></span> </div>--><?php //} ?>
          <!--<div class="section-header--right">-->
          <?php //if(!isset($_GET['new']) && $_GET['new'] != 1){?>
                  <div>
<div class="prev_pages"><?php previous_posts_link( ' Previous Page' ); ?></div>
<div class="next_pages"><?php next_posts_link( 'Next Page ', '' ); ?></div>
</div>
           <?php do_action( 'woocommerce_after_shop_loop' );?>
           <?php //} ?>

        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer();?>