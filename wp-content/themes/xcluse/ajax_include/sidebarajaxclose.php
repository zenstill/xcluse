<?php
add_action( 'wp_ajax_nopriv_sidebarajaxclose', 'sidebarajaxclose' );  
add_action( 'wp_ajax_sidebarajaxclose', 'sidebarajaxclose' ); 
function sidebarajaxclose(){
	global $wpdb,$current_user;
	parse_str($_POST['formdata'], $formdata);
	//print_r($formdata);exit;
	$s = $formdata['s'];
	$q = $formdata['q'];
	$size = $formdata['size'];
	
	if($s){
		$q = $s.','.$q;
	}
	if($q){
		$sdsdsf = explode(",",$q);
		foreach($sdsdsf as $dfdsfdsf){
			echo '<span class="delete_q rtetert"><a href="javascript:void(0)" class="rtretet" data-value="'.$dfdsfdsf.'">'.$dfdsfdsf.'<i class="fa fa-times"></i></a></span>';
		}
	}
	//print_r($q);exit;
		$attribute_taxonomies = wc_get_attribute_taxonomies();
		if(isset($attribute_taxonomies)){
			$tax_query[] = array('relation' => 'OR',);
        foreach ($attribute_taxonomies as $tax) {
            if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) {

		 if(isset($formdata[$tax->attribute_name]) && $formdata[$tax->attribute_name]!=''){
			 
			 			foreach($formdata[$tax->attribute_name] as $attri_id){
							$term = get_term( $attri_id, 'pa_'.$tax->attribute_name );
							echo '<span class="delete_attri rtetert"><a href="javascript:void(0)" class="rtretet" data-value="'.$attri_id.'">'.$term->name.'<i class="fa fa-times"></i></a></span>';
						}
		 }}
		 }
/*print_r($merged_array);
$merged_results = array_merge($merged_array);
print_r($merged_results);exit;*/
		}

	exit; 
	}?>