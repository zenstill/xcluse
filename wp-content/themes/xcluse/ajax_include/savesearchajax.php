<?php
add_action( 'wp_ajax_nopriv_savesearchajax', 'savesearchajax' );  
add_action( 'wp_ajax_savesearchajax', 'savesearchajax' ); 
function savesearchajax(){
	global $wpdb,$current_user;
	parse_str($_POST['formdata'], $formdata);
	//print_r($formdata);exit;
	$s = $formdata['s'];
	$q = $formdata['q'];
	$size = $formdata['size'];
	
	if($s){
		$q = $s.','.$q;
	}
	$urls = array();
	$main_cat = $formdata['main_cat'];
	if($main_cat){
          $urls['main_cat'] = $formdata['main_cat'];
	}
	if(isset($_POST['page_no']))
	{
		$paged = $_POST['page_no'];
	}else{
		$paged = 1;
	}
	$urls['q'] = $q;
	if($q){
		$sdsdsf = explode(",",$q);
		foreach($sdsdsf as $dfdsfdsf){
			$keywords[] = $dfdsfdsf;
		}
	}
	//print_r($q);exit;
		$attribute_taxonomies = wc_get_attribute_taxonomies();
		if(isset($attribute_taxonomies)){
        foreach ($attribute_taxonomies as $tax) {
            if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) {

		 if(isset($formdata[$tax->attribute_name]) && $formdata[$tax->attribute_name]!=''){
			 $urls[$tax->attribute_name] = $formdata[$tax->attribute_name];
			 
			 			foreach($formdata[$tax->attribute_name] as $attri_id){
							$term = get_term( $attri_id, 'pa_'.$tax->attribute_name );
							$keywords[] = $term->name;
							
						}
		 }}
		 }
/*print_r($merged_array);
$merged_results = array_merge($merged_array);
print_r($merged_results);exit;*/
		}
		if($keywords){
 $wpdb->insert( 'saved_search', array('user_id' => $current_user->ID ,'keywords' => serialize($keywords),'urls' => serialize($urls),'saved_date' => date('Y-m-d H:i:s')));
 $saved_id = $wpdb->insert_id;
 
             echo '<li><span><a href="javascript:void(0)" id="'.$saved_id.'" class="only_for_view">'.implode(',',$keywords).'</a><a href="javascript:void(0)" data-id="'.$saved_id.'" class="saved_search_delete"><i class="fa fa-times"></i></a></span></li>';
		}
	exit; 
	}?>