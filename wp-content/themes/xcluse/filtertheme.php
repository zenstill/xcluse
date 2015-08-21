<?php
/*

  Template Name: filtertheme Template

*/
global $wpdb;
/*
$result =  $wpdb->get_results("SELECT * FROM `add_to_wishlist`");
print_r($result);exit;*/
	ini_set('max_input_time',2800); 
	ini_set('max_execution_time',2800); 
	set_time_limit(2800);
$attribute_taxonomies = wc_get_attribute_taxonomies();
$args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories = get_categories( $args ); 
//echo "<pre>";print_r($categories);exit;
foreach($categories as $cat){
  //$curr_term_id = $cat->term_id;
  $curr_term_id = 37284;
 $termchildren = get_term_children( $curr_term_id, 'product_cat' );
 if(!empty($termchildren)){
 $curr_termchild_id = implode(',',$termchildren).','.$curr_term_id;
 }else
 {
	 $curr_termchild_id = $curr_term_id;
 }

 $as = array();
 if(!empty($attribute_taxonomies)){
	  foreach ($attribute_taxonomies as $tax) {
		   $brand_ids = get_terms( 'pa_'.$tax->attribute_name, 'orderby=id&hide_empty=0&fields=ids' );
		   $brand_ids = implode(",", $brand_ids);
		   // echo "<pre>"; print_r($brand_ids);
		   
		    $curre_posts = $wpdb->get_col("SELECT SQL_CALC_FOUND_ROWS  wp_posts.ID FROM wp_posts
		INNER JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)  
		INNER JOIN wp_term_relationships AS tt1 ON (wp_posts.ID = tt1.object_id) 
		WHERE 1=1  
		AND (    wp_term_relationships.term_taxonomy_id IN (".$curr_termchild_id.")    
		AND    tt1.term_taxonomy_id IN (".$brand_ids.") ) 
		AND wp_posts.post_type = 'product' 
		AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'private') 
		GROUP BY wp_posts.ID 
		ORDER BY wp_posts.post_date DESC");
		//echo "<pre>"; print_r($curre_posts);exit;
		$cur_brand_term = array();
			foreach($curre_posts as $cur_post){
				$term_lists = wp_get_post_terms($cur_post, 'pa_'.$tax->attribute_name, array("fields" => "ids"));
				foreach($term_lists as $term_list){
					if (!in_array($term_list, $cur_brand_term)) {
					$cur_brand_term[] = $term_list;
					}
				}
			}
			if(!empty($cur_brand_term)){
			$as[$tax->attribute_name] = $cur_brand_term;
			}
	  }
	 // echo "<pre>"; print_r($as);exit;
			update_option($curr_term_id,serialize($as));
			exit;
 }
 }
?>