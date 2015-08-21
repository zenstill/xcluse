<?php
add_action( 'wp_ajax_nopriv_view_savesearchajax', 'view_savesearchajax' );  
add_action( 'wp_ajax_view_savesearchajax', 'view_savesearchajax' ); 
function view_savesearchajax(){
	global $wpdb,$current_user;
	$saved_id  = $_POST['saved_id'];
	$res = $wpdb->get_results("select * from saved_search where id = ".$saved_id." and user_id=".$current_user->ID);
	$formdata = unserialize($res[0]->urls);
	
    $s = $formdata['s'];
	$q = $formdata['q'];
	$size = $formdata['size'];
	if(isset($_POST['page_no']))
	{
		$paged = $_POST['page_no'];
	}else{
		$paged = 1;
	}
	$main_cat = $formdata['main_cat'];
	if($main_cat){
	$tax_query[] = array(
					    'taxonomy' 		=>  'product_cat',
						'terms' 		=> $main_cat,
						'field' 		=> 'term_id',
						'operator' 		=> 'IN'
					);
	}
	if($s){
		$q = $s.','.$q;
	}
		$attribute_taxonomies = wc_get_attribute_taxonomies();
		if(isset($attribute_taxonomies)){
			$tax_query[] = array('relation' => 'OR',);
        foreach ($attribute_taxonomies as $tax) {
            if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) {

		 if(isset($formdata[$tax->attribute_name]) && $formdata[$tax->attribute_name]!=''){
			 
			 			$tax_query[] = array(
					    'taxonomy' 		=>  'pa_'.$tax->attribute_name,
						'terms' 		=> $formdata[$tax->attribute_name],
						'field' 		=> 'term_id',
						'operator' 		=> 'IN'
					);
		 }}
		 }
		  //$query->set('tax_query',$tax_query);
		}
		//print_r($tax_query);exit;
	$args = array(
	'post_type' => 'product',
	'posts_per_page' => 24,
	'post_status'  => 'publish',
	'paged' => $paged,
	's' => $q,
	'tax_query' =>  $tax_query
);
$the_query = new WP_Query( $args );
//echo "<pre>";print_r($the_query);exit;
?>
 <div class="grid-border-width_perform col-xs-8 col-md-10 col-sm-10 col-lg-10">
      <!--<div class="grid-item large--three-quarters">-->
        
        <div class="section-header">
          <div class="section-header--left">
              <div class="collection-view"> <?php do_action( 'woocommerce_bredcrumbs' );?><!--<a title="Grid view" class="collection-view--active" href="#">Living Room  <span> &gt;</span> </a> <a title="List view" class="change-view" data-view="list">Tables</a>--> </div>
            </div>
          <div class="section-header--right">
            <div class="form-horizontal">
              <select class="orderby" name="orderby">
					<option value="mostviewed">Popularity</option>
					<option value="rating">Average rating</option>
					<option value="newness">Newness</option>
					<option value="pricelowtohigh">Price: low to high</option>
					<option value="pricehightolow">Price: high to low</option>
			</select>
             
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
        <!--<div class="shop_loading">
        <img src="<?php echo get_template_directory_uri();?>/images/shop-loading.gif" />
                 </div>-->
        <?php if ( $the_query->have_posts() ) : ?>
                <ul class="products-grid hover-effect products">
         <?php $arr_compare = explode(",", $_COOKIE['compare']);
		    //print_r($arr_compare);exit;?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
                 <div class="for_next_prev">
                  <?php $prev_page = $paged-1;
				        $next_page = $paged+1;
						$max_pages = $the_query->max_num_pages; ?>
                        <?php if($paged != 1){?>
<div class="prev_pages"><a class="my_pageno" href="javascript:void(0)" data-no="<?php echo $prev_page;?>"> Previous Page</a></div>
<?php } ?>
<?php if($max_pages != $paged && $paged < $max_pages){?>
<div class="next_pages"><a class="my_pageno" href="javascript:void(0)" data-no="<?php echo $next_page;?>">Next Page </a></div>
<?php } ?>
</div>
            <nav class="woocommerce-pagination">
	<?php
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'       => '',
			'add_args'     => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $the_query->max_num_pages,
			'prev_text'    => false,
			'next_text'    => false,
			'type'         => '',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) );
	?>
</nav>
           

        </div>
      </div>
<?php
	exit;
	}?>