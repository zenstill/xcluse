<?php $term_id = get_queried_object_id();?>
<aside class="left-grid-border-width_perform col-xs-4 col-md-2 col-sm-2 col-lg-2 widget woocommerce widget_price_filter">
       <?php get_sidebar('usedscripts');?>
  <div id="filter-wrapper" class="grid-uniform col-sidebar white-popup">
    <div class="advanced-filters-wrapper filters-left">

      <?php if(is_user_logged_in()){ 
			  $res = $wpdb->get_results("select * from saved_search where user_id=".$current_user->ID);
			  if(!empty($res))?>
      <h3>Saved Searches</h3>
      <form name="saved_search" id="saved_search_form" action="" method="post">
        <div class="list-search">
          <ul>
            <?php if(!empty($res)){?>
            <?php foreach($res as $saved_result){?>
            <li><span><a href="javascript:void(0)" class="only_for_view" id="<?php echo $saved_result->id;?>"><?php echo implode(',',unserialize($saved_result->keywords));?></a><a href="javascript:void(0)" class="saved_search_delete" data-id="<?php echo $saved_result->id;?>"><i class="fa fa-times"></i></a></span></li>
            <?php } }?>
            <!--   <li><span>Black, Metal, Chairs<i class="fa fa-times"></i></span></li>
              <li><span>Simple Living, Cocktail Table<i class="fa fa-times"></i></span></li>-->
            <li class="for_save_search_append">
              <a class="search-bar-btn" id="save_search_submit" href="javascript:void(0)">Save this search</a>
            </li>
          </ul>
        </div>
        <?php if($_GET['s']!=""){?>
        <input type="hidden" name="save_keyword[]" value="<?php echo $_GET['s'];?>" />
        <?php } ?>
        <?php if($_GET['q']!=""){?>
                   <?php 	$inner_search = array_filter(explode(":", $_GET['q']));
                  foreach($inner_search as $key_word){ ?>
        <input type="hidden" name="save_keyword[]" value="<?php echo $key_word;?>" />
        <?php } } ?>
                  		<?php  
						$attribute_taxonomies = wc_get_attribute_taxonomies();
        foreach ($attribute_taxonomies as $tax) {
            if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) { ?>
        <?php if($_GET[$tax->attribute_name]!=""){
			foreach($_GET[$tax->attribute_name] as $resul){?>
        <input type="hidden" name="save_keyword[]" value="<?php $term = get_term( $resul, 'pa_'.$tax->attribute_name );echo $term->name;?>" />
        <?php } } } } ?>
        <input type="hidden" name="save_submit" value="1" />
      </form>
      <?php } ?>

      <?php dynamic_sidebar( 'sidebar-widgets' ); ?>

          <form action="#" method="get" class="search-bar-product" role="search" id="filter_form">
      <!--<h3>Search</h3>-->
      <div class="list-fun">
        <div class="serch-fuction for_my_filter">
        <div class="sub_btn">

            <!--<input type="search" value="" placeholder="Narrow Your Results" aria-label="Search all products" class="text_search" />-->
            <!--<input type="search" name="q" value="" placeholder="Narrow Your Results" aria-label="Search all products">-->
           
            <input type="hidden" name="s"  value="" class="s" />

             <input type="hidden" name="q" id="q" value="" class="q" />
              <?php if($term_id){ ?>
             <input type="hidden" name="main_cat" id="main_cat" value="<?php echo $term_id;?>" class="main_cat_for" />
              <?php } ?>
             
              <?php if($_POST['sale_id']){ ?>
            <input type="hidden" name="sale" id="sale" value="1" />
            <?php } ?>
           <?php if($_POST['new_id']){ ?>
            <input type="hidden" name="new" id="new" value="1" />
            <?php } ?>

            <!--<button type="submit" class="search-bar--submit icon-fallback-text"> <i class="fa fa-plus"></i> </button>-->
</div>
<div class="for_delete_int">
          </div>

        </div>
      </div>
<!-----For Sidebar filter------------->
<?php $price_range = $round_price/10;
      //$max_price = max_meta_value();
	  //$price_range = 100;
	  //$round_price = $max_price / $price_range;?>

  <ul  class="mtree transit mtree_mainwidth">
              <li class="mtree-node mtree-closed" style="opacity: 1; transform: translateY(0px);-webkit-transform: -webkit-translateY (85px);"><a href="javascript:void(0)" style="cursor: pointer;">Price</a>
                    <ul class="brand advanced-filters  brand_filter mtree-level-1" style="overflow: hidden; height: 0px; display: none;">
                    <?php for($start=0; $start < $max_price; $start+=$price_range){?>
                        <li><span class="side_checkbox"> <input type="checkbox" value="<?php echo $start;?>-<?php echo $start+$price_range;?>" name="price[]"></span>$<?php echo $start;?> - $ <?php echo $start+$price_range;?><!--</a>--></li>
						<?php } ?>
                           </ul>
             </li>
    <li class="mtree-node mtree-closed" style="opacity: 1; transform: translateY(0px);-webkit-transform: -webkit-translateY (85px);"><a href="javascript:void(0)" style="cursor: pointer;">Sale</a>
                    <ul class="brand advanced-filters  brand_filter mtree-level-1" style="overflow: hidden; height: 0px; display: none;">
                        <li><span class="side_checkbox"> <input type="checkbox" value="1" name="offered_price"></span>Offers</li>
                           </ul>
             </li>
             
        <?php if(!isset($new_id) && empty($new_id) && !isset($sale_id) && empty($sale_id)){?>
 <?php $cur_term_option = get_option($term_id);
 //print_r($cur_term_option); ?>
 <?php } ?>
 <?php if(isset($new_id) && !empty($new_id)){ ?>
  <?php $cur_term_option = get_option('new_excluse');
 // echo "<pre>"; print_r($cur_term_option);exit; ?>
 <?php } ?>
 <?php if(isset($sale_id) && !empty($sale_id)){ ?>
 <?php $cur_term_option = get_option('sale_xcluse'); ?>
 <?php } ?>
 <?php $all_filters = unserialize($cur_term_option);?>  
           <?php $attribute_taxonomies = wc_get_attribute_taxonomies();?>
       <?php if(!empty($attribute_taxonomies)){?>
        <?php foreach ($attribute_taxonomies as $tax) {?>
        <?php if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name)) && $tax->attribute_name != 'availability' && $tax->attribute_name != 'currency' && $tax->attribute_name != 'seller' && $tax->attribute_name != 'condition' && $tax->attribute_name != 'manufacturer' && $tax->attribute_name != 'model') {?>
 
             <?php if(!empty($all_filters[$tax->attribute_name])){ ?>
  <li <?php if($_GET[$tax->attribute_name]){?>class="<?php echo $tax->attribute_name;?> mtree-node mtree-active mtree-open"<?php } ?>><a href="javascript:void(0)"><?php echo $tax->attribute_name;?></a>
          <?php //$tax_terms = get_terms( wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0' );
			    //echo "<pre>";print_r($tax_terms);exit;?>
          <ul class="<?php echo $tax->attribute_name;?> advanced-filters <?php if($_GET[$tax->attribute_name]){?> filter_block <?php } ?> brand_filter">
            <?php foreach ($all_filters[$tax->attribute_name] as $term_id) {
				$term_name_obj = get_term_by('id', $term_id, 'pa_'.$tax->attribute_name); ?>
            <li><span class="side_checkbox"> <input type="checkbox" name="<?php echo $tax->attribute_name;?>[]" value="<?php echo $term_id;?>" id="<?php echo $term_id;?>" /></span><?php echo $term_name_obj->name;?><!--</a>--></li>
            <?php } ?>
              </ul>
               </li>
            <?php } ?>
            <?php } ?>
                    
             <?php } } ?>

      </ul>

<!-----For Sidebar filter------------->
          </form>
      <?php //dynamic_sidebar( 'sidebar-widget-recent-views' ); ?>
    </div>
  </div>
     <?php
	 if(!empty( $_COOKIE['woocommerce_recently_viewed'])){
  $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
		$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );

		if ( empty( $viewed_products ) ) {
			return;
		}

		ob_start();

	    $query_args = array( 'posts_per_page' => 15, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product', 'post__in' => $viewed_products, 'orderby' => 'rand' );

		$query_args['meta_query']   = array();
	    $query_args['meta_query'][] = WC()->query->stock_status_meta_query();
	    $query_args['meta_query']   = array_filter( $query_args['meta_query'] );

		$r = new WP_Query( $query_args );
		if ( $r->have_posts() ) { ?>
  <div  class="grid-uniform side_recently_viewed">
   <h3 class="related_fun">Recently viewed products <button type="button" class="close recent_btn_clear rec_vis_clear" data-dismiss="modal">&times;</button></h3>
  <div class="scroll_fuction">

  <ul>
  	<?php while ( $r->have_posts() ) {
				$r->the_post();?>
                <?php global $product; ?>
    <li class="left_recent_product"><a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>"><?php echo $product->get_image(); ?> </a></li>
    <?php } ?>
   
  </ul>
  </div>
   
  <!--<button class="rec_vis_clear">Clear</button>-->
  </div>
  <?php } } ?>
</aside>