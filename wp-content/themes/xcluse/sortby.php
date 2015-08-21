 <?php
/*

  Template Name: sortbytheme Template

*/
global $wpdb;
 $all_posts = $wpdb->get_col("SELECT SQL_CALC_FOUND_ROWS  wp_posts.ID FROM wp_posts
		WHERE 1=1  
		AND wp_posts.post_type = 'product' 
		AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'private') 
		GROUP BY wp_posts.ID 
		ORDER BY wp_posts.post_date DESC");
foreach($all_posts as $post_id){
	update_post_meta($post_id, 'post_views_count', '0');
}
exit;
		?>