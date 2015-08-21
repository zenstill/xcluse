<?php
/*

  Template Name: filtersale Template

*/
global $wpdb;
/*
$result =  $wpdb->get_results("SELECT * FROM `add_to_wishlist`");
print_r($result);exit;*/
$attribute_taxonomies = wc_get_attribute_taxonomies();

 $as = array();
 if(!empty($attribute_taxonomies)){
	  foreach ($attribute_taxonomies as $tax) {
		   $brand_ids = get_terms( 'pa_'.$tax->attribute_name, 'orderby=id&hide_empty=0&fields=ids' );
		   $brand_ids = implode(",", $brand_ids);
		   // echo "<pre>"; print_r($brand_ids);
		   
		   $curre_posts = $wpdb->get_col("SELECT SQL_CALC_FOUND_ROWS  wp_posts.ID FROM wp_posts  INNER JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id ) WHERE 1=1  AND ( 
  wp_term_relationships.term_taxonomy_id IN (".$brand_ids.")
) AND ( 
  ( wp_postmeta.meta_key = '_sale_price' AND CAST(wp_postmeta.meta_value AS SIGNED) > '0' )
) AND wp_posts.post_type = 'product' AND ((wp_posts.post_status = 'publish')) GROUP BY wp_posts.ID ORDER BY wp_posts.post_date DESC");
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
			update_option('sale_xcluse',serialize($as));
 }
?>