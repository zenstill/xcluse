<?php
/*

  Template Name: filternew Template

*/
global $wpdb;

$attribute_taxonomies = wc_get_attribute_taxonomies();

 $as = array();
 		    $curre_posts = $wpdb->get_col("SELECT SQL_CALC_FOUND_ROWS  wp_posts.ID FROM wp_posts  WHERE 1=1  AND wp_posts.post_type = 'product' AND ((wp_posts.post_status = 'publish'))  ORDER BY wp_posts.post_date DESC LIMIT 0, 16");
 if(!empty($attribute_taxonomies)){
	  foreach ($attribute_taxonomies as $tax) {
		  // $brand_ids = get_terms( 'pa_'.$tax->attribute_name, 'orderby=id&hide_empty=0&fields=ids' );
		   //brand_ids = implode(",", $brand_ids);
		   // echo "<pre>"; print_r($brand_ids);
		   
		//echo "<pre>"; print_r($curre_posts);
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
			update_option('new_excluse',serialize($as));
 }

?>