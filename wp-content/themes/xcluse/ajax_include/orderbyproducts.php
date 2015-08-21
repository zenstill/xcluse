<?php
add_action( 'wp_ajax_nopriv_orderbyproducts', 'orderbyproducts' );  
add_action( 'wp_ajax_orderbyproducts', 'orderbyproducts' ); 
function orderbyproducts(){
	global $wpdb,$current_user;
	parse_str($_POST['formdata'], $formdata);
	$orderby = $_POST['orderby'];
	$s = $formdata['s'];
	$q = $formdata['q'];
		$price = $formdata['price'];
	if($price){
    $orderby = 'meta_value';
	$meta_query['relation'] = 'OR';
	foreach($price as $cur_price){
			$price_array = explode("-",$cur_price);
			//echo "<pre>";print_r($price_array);exit;
	$min_price = $price_array[0];
	$max_price = $price_array[1];
	$meta_query[] =  array(
        'key' => '_price',
        'value' => array( $min_price, $max_price ),
        'type' => 'numeric',
        'compare' => 'BETWEEN'
    );
	}
	}
	if(isset($_POST['page_no']))
	{
		$paged = $_POST['page_no'];
	}else{
		$paged = 1;
	}
	if($s){
		$q = $s.','.$q;
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
		if($orderby == 'mostviewed'){
	$args = array(
	'post_type' => 'product',
	'posts_per_page' => 24,
	'post_status'  => 'publish',
	'paged' => $paged,
	's' => $q,
	'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
	'meta_query' => $meta_query,
	'tax_query' =>  $tax_query
);
		}
		if($orderby == 'rating'){
	$args = array(
	'post_type' => 'product',
	'posts_per_page' => 24,
	'post_status'  => 'publish',
	'paged' => $paged,
	's' => $q,
	'meta_key' => 'ratings_average',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
	'meta_query' => $meta_query,
	'tax_query' =>  $tax_query
);
		}
		if($orderby == 'newness'){
	$args = array(
	'post_type' => 'product',
	'posts_per_page' => 24,
	'post_status'  => 'publish',
	'paged' => $paged,
	's' => $q,
	'orderby' => 'date',
	'meta_query' => $meta_query,
	'tax_query' =>  $tax_query
);
		}
		if($orderby == 'pricelowtohigh'){
	$args = array(
	'post_type' => 'product',
	'posts_per_page' => 24,
	'post_status'  => 'publish',
	'paged' => $paged,
	's' => $q,
	'meta_key' => '_price',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
	'meta_query' => $meta_query,
	'tax_query' =>  $tax_query
);
		}
		if($orderby == 'pricehightolow'){
	$args = array(
	'post_type' => 'product',
	'posts_per_page' => 24,
	'post_status'  => 'publish',
	'paged' => $paged,
	's' => $q,
	'meta_key' => '_price',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
	'meta_query' => $meta_query,
	'tax_query' =>  $tax_query
);
		}

$the_query = new WP_Query( $args );
//echo "<pre>";print_r($the_query);exit;
?>
 <div class="grid-border-width_perform col-xs-8 col-md-10 col-sm-10 col-lg-10">
      <!--<div class="grid-item large--three-quarters">-->
        
        <div class="section-header">
          <div class="section-header--left">
              <div class="collection-view"> <?php //do_action( 'woocommerce_bredcrumbs' );?><a title="Grid view" class="collection-view--active" href="<?php echo HOME;?>">Home  &nbsp;<span> &gt;</span>&nbsp;&nbsp;</a> <?php if(isset($main_cat)){?><?php $term_name_cur = get_term_by('id', $main_cat, 'product_cat');
			  if($term_name_cur->parent){
			  $parent = get_term($term_name_cur->parent, 'product_cat' );
			  }
			  if($parent->parent){
			  $top_parent = get_term($parent->parent, 'product_cat' );
			  }
			  			  //print_r($parent);exit;?>
                          <?php if(!empty($top_parent) && isset($top_parent)){?>
                           <a title="Grid view" class="bred_cum collection-view--active"  data-id="<?php echo $top_parent->term_id;?>">
			  <?php echo $top_parent->name;?> &nbsp;<span> &gt;</span>&nbsp;&nbsp;</a>
						  <?php } ?>
                          <?php if(!empty($parent) && isset($parent)){?>
                           <a title="Grid view" class="bred_cum collection-view--active" data-id="<?php echo $parent->term_id;?>">
			  <?php echo $parent->name;?> <span> &gt;</span>&nbsp;&nbsp;</a>
						  <?php } ?>
                          <?php if(!empty($term_name_cur) && isset($term_name_cur)){?>
                          <a title="Grid view" class="collection-view--active">
			  <?php echo $term_name_cur->name;?> </a><?php } } ?> </div>
            </div>
          <div class="section-header--right">
            <div class="form-horizontal">
               <select class="orderby" name="orderby">
					<option value="mostviewed" <?php if($orderby=="mostviewed"){?> selected="selected"<?php } ?>>Popularity</option>
					<option value="rating" <?php if($orderby=="rating"){?> selected="selected"<?php } ?>>Average rating</option>
					<option value="newness" <?php if($orderby=="newness"){?> selected="selected"<?php } ?>>Newness</option>
					<option value="pricelowtohigh" <?php if($orderby=="pricelowtohigh"){?> selected="selected"<?php } ?>>Price: low to high</option>
					<option value="pricehightolow" <?php if($orderby=="pricehightolow"){?> selected="selected"<?php } ?>>Price: high to low</option>
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
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$_price = get_post_meta(get_the_ID(),'_price',true);
		if(!empty($_price) && isset($_price)){ ?>
        <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php } endwhile; // end of the loop. ?>
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